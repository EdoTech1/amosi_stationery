<?php

require_once("../includes/connection.php");

// Get the book ID from the query parameter
$bid = $_GET['bid'];

// Fetch the book details from the database
$sql = "SELECT book FROM book WHERE bid = '$bid'";
$result = mysqli_query($con, $sql);
$bookData = mysqli_fetch_array($result);

if ($bookData) {
    // Assuming $bookData['book'] contains the file path
    $filePath = '../assets/img/books/' . $bookData['book'];

    // Check if the file exists
    if (file_exists($filePath)) {
        // Encode the URL for Google Docs Viewer
        $encodedUrl = urlencode($filePath);

        // Use Google Docs Viewer within an <iframe> to embed the PDF
        echo "<iframe src='https://docs.google.com/viewer?url=$encodedUrl&embedded=true' width='100%' height='700' style='border: none;'></iframe>";
    } else {
        // Display an error message if the file is not found
        echo "Failed to load PDF document. File not found.";
    }
} else {
    // Display an error message if the book is not found
    echo "Failed to load PDF document. Book not found.";
}

mysqli_close($con); 

// require_once("../includes/connection.php");

// // Get the book ID from the query parameter
// $bid = $_GET['bid'];

// // Fetch the book details from the database
// $sql = "SELECT book FROM book WHERE bid = '$bid'";
// $result = mysqli_query($con, $sql);
// $bookData = mysqli_fetch_array($result);

// if ($bookData) {
//     // Assuming $bookData['book'] contains the file path
//     $filePath = '../assets/img/books/' . $bookData['book'];

//     // Check if the file exists
//     if (file_exists($filePath)) {
//         // Set the appropriate content type header for PDF
//         header('Content-Type: application/pdf');

//         // Output the book content to the browser
//         readfile($filePath);
//     } else {
//         // Display an error message if the file is not found
//         echo "Failed to load PDF document. File not found.";
//     }
// } else {
//     // Display an error message if the book is not found
//     echo "Failed to load PDF document. Book not found.";
// }

// mysqli_close($con);

?>
