<?php
$conn = new mysqli("localhost", "root", "", "library_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $genre = $_POST["genre"];
    $year = $_POST["year"];
    $availability = $_POST["availability"];

    $stmt = $conn->prepare("INSERT INTO books_medavakkam (title, author, genre, year, availability) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssis", $title, $author, $genre, $year, $availability);

    if ($stmt->execute()) {
        header("Location: books_medavakkam.php");
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
