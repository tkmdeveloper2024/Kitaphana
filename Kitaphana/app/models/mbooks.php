<?php

class Books {
    private $conn;
    public $id;
    public $ady;
    public $awtory;
    public $gornusi;
    public $yyly;
    public $surat;
    public $pdf;
    public $tableName="books";
    public $pdfPath;
    public $jpgPath;
    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM books";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getSingle() {
        $query = "SELECT * FROM books WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Function to insert file paths into MySQL table
    public function create($pdfPath, $jpgPath, $tableName) {
        $pdfPath = $conn->real_escape_string($pdfPath);
        $jpgPath = $conn->real_escape_string($jpgPath);
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // if everything is ok, try to upload file
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";

                $query = "INSERT INTO $tableName SET bookName=:name, bookAuthor=:author, bookCategory=:category,bookYear=:year,bookCoverImagePath:=image,bookPagesImagePath:=page";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':name', $this->ady);
                $stmt->bindParam(':author', $this->awtory);
                $stmt->bindParam(':category', $this->gornusi);
                $stmt->bindParam(':year', $this->yyly);
                $stmt->bindParam(':image', $this->target_file);
                $stmt->bindParam(':page', $this->jpgPath);
        
                if ($stmt->execute()) {
                    return true;
                }
                return false;
               
            }
        }
        
    }

    public function update() {
        // $query = "UPDATE books SET name=:name, description=:description, price=:price WHERE id = :id";
        // $stmt = $this->conn->prepare($query);
        // $stmt->bindParam(':name', $this->name);
        // $stmt->bindParam(':description', $this->description);
        // $stmt->bindParam(':price', $this->price);
        // $stmt->bindParam(':id', $this->id);

        // if ($stmt->execute()) {
        //     return true;
        // }
        // return false;
    }

    public function delete() {
        $query = "DELETE FROM books WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
