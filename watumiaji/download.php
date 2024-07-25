<?php
session_start(); // Start the session for authentication

// Check if the user is authenticated (you need to implement your authentication logic)
if (empty($_SESSION['user'])) {
    header("location:../ingia.php");
}

// File path to the PDF
$filePath = '../assets/img/books/41957.pdf';

// Check if the file exists
if (file_exists($filePath)) {
    // Set the appropriate content type header for PDF
    header('Content-Type: application/pdf');

    // Set the content-disposition to inline to display the PDF in the browser
    header('Content-Disposition: inline; filename="41957.pdf"');

    // Read the file and output it to the browser
    readfile($filePath);
} else {
    // Display an error message if the file doesn't exist
    echo "File not found.";
}
?>
