<?php
include 'config.php';

// Get all students
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $conn->query("SELECT * FROM student");
    $students = array();

    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }

    echo json_encode($students);
}

// Add a new student
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $stdname = $data['name'];
    $stdclass = $data['class'];
    $stdsubject = $data['subject'];
    $email = $data['email'];
    $telephone = $data['telephone'];

    $sql = "INSERT INTO students (stdname, stdclass, stdsubject, email, telephone) VALUES ('$stdname', '$stdclass', '$stdsubject', '$email', '$telephone')";

    if ($conn->query($sql)) {
        echo json_encode(['msg' => 'Data Insert Successfully!', 'status' => true]);
    } else {
        echo json_encode(['msg' => 'Data Fail Successfully!', 'status' => false]);
    }
}

// Update a student
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents('php://input'), true);

    $stdid = $data['stdid'];
    $stdname = $data['stdname'];
    $stdclass = $data['stdclass'];
    $stdsubject = $data['stdsubject'];
    $email = $data['email'];
    $telephone = $data['telephone'];

    $sql = "UPDATE students SET stdname='$stdname', stdclass='$stdclass', stdsubject='$stdsubject', email='$email', telephone='$telephone' WHERE stdid='$stdid'";

    if ($conn->query($sql)) {
        echo json_encode(['msg' => 'Data Update Successfully!', 'status' => true]);
    } else {
        echo json_encode(['msg' => 'Data FailUpdate!', 'status' => false]);
    }
}
?>
