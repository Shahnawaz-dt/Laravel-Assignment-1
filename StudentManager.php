<?php

class StudentManager {
    private $filePath;

    public function __construct($fileName = 'students.json') {
        $this->filePath = $fileName;
        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, json_encode([]));
        }
    }

    private function readData() {
        $json = file_get_contents($this->filePath);
        return json_decode($json, true) ?? [];
    }

    private function saveData($data) {
        file_put_contents($this->filePath, json_encode(array_values($data), JSON_PRETTY_PRINT));
    }

    public function getStudentById($id) {
        $students = $this->readData();
        foreach ($students as $student) {
            if ($student['id'] == $id) {
                return $student;
            }
        }
        return null;
    }

    public function getAllStudents() {
        return $this->readData();
    }

    public function create($data) {
        $students = $this->readData();
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format.";
        }
        $newStudent = [
            'id'     => time(),
            'name'   => htmlspecialchars($data['name']),
            'email'  => $data['email'],
            'phone'  => $data['phone'],
            'status' => $data['status']
        ];
        $students[] = $newStudent;
        $this->saveData($students);
        return true;
    }

    public function update($id, $data) {
        $students = $this->readData();
        foreach ($students as &$student) {
            if ($student['id'] == $id) {
                $student['name']   = htmlspecialchars($data['name']);
                $student['email']  = $data['email'];
                $student['phone']  = $data['phone'];
                $student['status'] = $data['status'];
                $this->saveData($students);
                return true;
            }   
        }
        return false;
    }


    public function delete($id) {
        $students = $this->readData();
        $initialCount = count($students);
        
        $students = array_filter($students, function($s) use ($id) {
            return $s['id'] != $id;
        });

        if (count($students) < $initialCount) {
            $this->saveData($students);
            return true;
        }
        return false;
    }

    public function handleActions() {
      
        if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
            $this->delete($_GET['id']);
            header("Location: index.php");
            exit;
        }

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
            $this->update($_POST['update_id'], $_POST);
            header("Location: index.php");
            exit;
        }

        
        if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
            return $this->getStudentById($_GET['id']);
        }

        return null; 
    }
}