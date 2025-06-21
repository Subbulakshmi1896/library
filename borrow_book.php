<?php
session_start();
$conn = new mysqli("localhost", "root", "", "library_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['username'])) {
    header("Location: userlogin.php");
    exit();
}

if (isset($_GET['id']) && isset($_GET['location'])) {
    $book_id = $_GET['id'];
    $location = $_GET['location'];
    $table_name = "books_" . strtolower($location);

    // Update book availability
    $update_query = "UPDATE $table_name SET availability='Not Available' WHERE id=$book_id";
    
    if ($conn->query($update_query) === TRUE) {
        echo "<script>alert('Book borrowed successfully!'); window.location.href='books_list.php?location=$location';</script>";
    } else {
        echo "<script>alert('Error borrowing book!'); window.history.back();</script>";
    }
} else {
    header("Location: user_dashboard.php");
}
?>
