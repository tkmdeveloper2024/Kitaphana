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

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->books->name = $_POST['name'];
            $this->books->description = $_POST['description'];
            $this->books->price = $_POST['price'];

            if ($this->books->create()) {
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
