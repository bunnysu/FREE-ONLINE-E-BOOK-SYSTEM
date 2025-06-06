<?php
include "connection.php";
session_start();

if (isset($_GET['id'])) {
    $bookid = intval($_GET['id']);
    $studentid = isset($_SESSION['studentid']) ? intval($_SESSION['studentid']) : NULL;

    $query = "SELECT * FROM books WHERE bookid = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $bookid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();


        $download_query = "INSERT INTO download (bookid, studentid, down_date) VALUES (?, ?, NOW())";
        $download_stmt = $db->prepare($download_query);
        $download_stmt->bind_param("ii", $bookid, $studentid);
        $download_stmt->execute();

        $file_path = "uploads/files/" . $row['file'];
        if (file_exists($file_path)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file_path));
            flush(); 
            readfile($file_path);
            exit;
        } else {
            echo "File not found.";
        }
    } else {
        echo "Book not found.";
    }

    $stmt->close();
} else {
    echo "Invalid book ID.";
}

$db->close();
?>
