<?php
session_start();
include "connection.php";

if (isset($_POST['bookid'], $_POST['studentid'], $_POST['action'])) {
    $bookid = intval($_POST['bookid']);
    $studentid = intval($_POST['studentid']);
    $action = $_POST['action'];

    if ($action == 'add') {
        $query = "INSERT INTO favorites (bookid, studentid) VALUES (?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("ii", $bookid, $studentid);
        if ($stmt->execute()) {
            echo 'added';
        } else {
            echo 'error';
        }
    } elseif ($action == 'remove') {
        $query = "DELETE FROM favorites WHERE bookid = ? AND studentid = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("ii", $bookid, $studentid);
        if ($stmt->execute()) {
            echo 'removed';
        } else {
            echo 'error';
        }
    }
    $stmt->close();
} else {
    echo 'error';
}

$db->close();
?>
