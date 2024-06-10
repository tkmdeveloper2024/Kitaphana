<?php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../models/mbooks.php';

class BookController {
    private $db;
    private $books;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->books = new Books($this->db);
    }

    public function index() {
        $result = $this->books->getAll();
        include_once __DIR__ . '/../views/books/index.php';
    }

    public function show($id) {
        $this->books->id = $id;
        $books = $this->books->getSingle();
        include_once __DIR__ . '/../views/books/show.php';
    }
    // Function to convert PDF to JPG using ImageMagick
    public function convertPDFtoJPG($pdfPath, $outputDir) {
        $imagick = new Imagick();
        $imagick->setResolution(300, 300);
        $imagick->readImage($pdfPath . '[0]'); // Convert first page only
        $imagick->setImageFormat('jpg');
        
        $outputFile = $outputDir . '/' . basename($pdfPath, '.pdf') . '.jpg';
        $imagick->writeImage($outputFile);
        
        return $outputFile;
    }
    // Check if form is submitted
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Directory where the file will be uploaded
            $target_dir = "covers/";
            // Create uploads directory if it doesn't exist
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            // Get the file name and its target path
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is an actual image or fake image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size (limit to 5MB)
            if ($_FILES["image"]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            $allowed_types = array("jpg", "jpeg", "png", "gif");
            if (!in_array($imageFileType, $allowed_types)) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            $this->books->ady = $_POST['ady'];
            $this->books->awtory = $_POST['awtory'];
            $this->books->gornusi = $_POST['gornusi'];
            $this->books->yyly = $_POST['yyly'];
            $pdfFile = $_FILES["pdf"]["tmp_name"];
            $pdfFileName = $_FILES["pdf"]["name"];
            $outputDir = "uploads";
            $tableName = "pdf_images"; // Change to your table name
            // Create uploads directory if not exists
            if (!file_exists($outputDir)) {
                mkdir($outputDir, 0777, true);
            }
            
            // Upload PDF file
            move_uploaded_file($pdfFile, $outputDir . "/" . $pdfFileName);
            
            // Convert PDF to JPG
            $jpgPath = convertPDFtoJPG($outputDir . "/" . $pdfFileName, $outputDir);
            
            // Insert file paths into database
            if ($this->books->create($outputDir . "/" . $pdfFileName, $jpgPath, $tableName)) {
                header("Location: index.php");
            }
        }
        include_once __DIR__ . '/../views/books/create.php';
    }

    public function edit($id) {
        $this->books->id = $id;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->books->name = $_POST['name'];
            $this->books->description = $_POST['description'];
            $this->books->price = $_POST['price'];

            if ($this->books->update()) {
                header("Location: index.php");
            }
        }

        $books = $this->books->getSingle();
        include_once __DIR__ . '/../views/books/edit.php';
    }

    public function delete($id) {
        $this->books->id = $id;

        if ($this->books->delete()) {
            header("Location: index.php");
        }
    }
}
?>
