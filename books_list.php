<?php
$conn = new mysqli("localhost", "root", "", "library_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if "location" is set in the URL
if (!isset($_GET['location']) || empty($_GET['location'])) {
    die("Error: Location not specified.");
}

$location = $_GET['location'];
$table_name = "books_" . $location; // Example: books_medavakkam

// Validate if the table exists
$check_table = $conn->query("SHOW TABLES LIKE '$table_name'");
if ($check_table->num_rows == 0) {
    die("Error: Table '$table_name' does not exist.");
}

// Fetch books
$result = $conn->query("SELECT * FROM $table_name");

// Fetch unique genres for filter dropdown
$genres_result = $conn->query("SELECT DISTINCT genre FROM $table_name");
$genres = [];
while ($row = $genres_result->fetch_assoc()) {
    $genres[] = $row['genre'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucfirst($location); ?> Library Books</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles1.css"> <!-- Your Custom Styles -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container">
    <h1>📚 Books in <?php echo ucfirst($location); ?> Library</h1>
    <a href="user_dashboard_page.php" class="back-btn">⬅ Back</a>

    <!-- Search & Filter Section -->
    <div class="filter-section">
        <input type="text" id="searchInput" class="form-control" placeholder="🔍 Search by title or author">
        
        <select id="genreFilter" class="form-select">
            <option value="">📌 Filter by Genre</option>
            <?php foreach ($genres as $genre): ?>
                <option value="<?= htmlspecialchars($genre); ?>"><?= htmlspecialchars($genre); ?></option>
            <?php endforeach; ?>
        </select>

        <select id="availabilityFilter" class="form-select">
            <option value="">📌 Filter by Availability</option>
            <option value="Available">Available</option>
            <option value="Not Available">Not Available</option>
        </select>
    </div>

    <table id="booksTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Availability</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= htmlspecialchars($row['title']); ?></td>
                    <td><?= htmlspecialchars($row['author']); ?></td>
                    <td><?= htmlspecialchars($row['genre']); ?></td>
                    <td><?= $row['year']; ?></td>
                    <td class="<?= (!empty($row['availability']) && $row['availability'] == 'Available') ? 'available' : 'not-available'; ?>">
    <?= !empty($row['availability']) ? $row['availability'] : 'Not Available'; ?>
</td>

                    <td>
                        <?php if ($row['availability'] == 'Available'): ?>
                            <a href="borrow_book.php?id=<?= $row['id']; ?>&location=<?= $location; ?>" class="borrow-btn">📖 Borrow</a>
                        <?php else: ?>
                            <a href="request_book.php?id=<?= $row['id']; ?>&location=<?= $location; ?>" class="request-btn">🔔 Request</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $("#searchInput, #genreFilter, #availabilityFilter").on("input change", function() {
            var search = $("#searchInput").val().toLowerCase();
            var genre = $("#genreFilter").val().toLowerCase();
            var availability = $("#availabilityFilter").val().toLowerCase();

            $("#booksTable tbody tr").each(function() {
                var title = $(this).find("td:nth-child(2)").text().toLowerCase();
                var author = $(this).find("td:nth-child(3)").text().toLowerCase();
                var bookGenre = $(this).find("td:nth-child(4)").text().toLowerCase();
                var bookAvailability = $(this).find("td:nth-child(6)").text().toLowerCase();

                if (
                    (title.includes(search) || author.includes(search)) &&
                    (genre === "" || bookGenre === genre) &&
                    (availability === "" || bookAvailability === availability)
                ) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>

</body>
</html>
