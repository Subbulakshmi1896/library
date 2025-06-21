<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: userlogin.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_db";
$conn = new mysqli($servername, $username, $password, $dbname);

if (!isset($_GET['location'])) {
    die("Location not specified!");
}

$location = $_GET['location'];
$databases = [
    "medavakkam" => "books_medavakkam",
    "perungudi" => "books_perungudi",
    "semmancheri" => "books_semmancheri"
];

if (!array_key_exists($location, $databases)) {
    die("Invalid location!");
}

$table = $databases[$location];
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library - <?php echo ucfirst($location); ?></title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        h2 { text-align: center; margin-top: 20px; }
        table { width: 80%; margin: 20px auto; border-collapse: collapse; background: white; box-shadow: 0px 0px 10px #ccc; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: center; }
        th { background: turquoise; color: white; }
        .available { color: green; font-weight: bold; }
        .not-available { color: red; font-weight: bold; }
        .button { padding: 8px 15px; color: white; border: none; cursor: pointer; text-decoration: none; }
        .borrow { background: green; }
        .request { background: orange; }
    </style>
</head>
<body>
    <h2>Books in <?php echo ucfirst($location); ?></h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Book Name</th>
            <th>Author</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td class="<?php echo strtolower(str_replace(' ', '-', $row['status'])); ?>">
                <?php echo $row['status']; ?>
            </td>
            <td>
                <?php if ($row['status'] == 'Available'): ?>
                    <a href="borrow.php?book_id=<?php echo $row['id']; ?>&location=<?php echo $location; ?>" class="button borrow">Borrow</a>
                <?php else: ?>
                    <a href="request.php?book_id=<?php echo $row['id']; ?>&location=<?php echo $location; ?>" class="button request">Request</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
