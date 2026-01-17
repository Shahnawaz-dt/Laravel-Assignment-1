<?php
require_once 'StudentManager.php';
$manager = new StudentManager();

// Get the ID from the URL (e.g., edit.php?id=17055123)
$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id) {
    // We pass the ID and the whole $_POST array to the class method
    if ($manager->updateStudent($id, $_POST)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: Could not update student.";
    }
}

// Fetch student data to pre-fill the form
$student = $manager->getStudentById($id);
if (!$student) { die("Student not found."); }
?>