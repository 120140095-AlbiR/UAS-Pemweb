<?php
session_start();
include 'db.php';

class Book {
    public $title;
    public $author;
    public $genre;
    public $published;
    public $available;

    public function __construct($title, $author, $genre, $published, $available) {
        $this->title = $title;
        $this->author = $author;
        $this->genre = $genre;
        $this->published = $published;
        $this->available = $available;
    }

    public function save() {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO books (title, author, genre, published, available, browser, ip_address) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $this->title, $this->author, $this->genre, $this->published, $this->available, $_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR']);
        return $stmt->execute();
    }
}

function validate($data) {
    // Add your server-side validation logic here
    return true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $published = $_POST['published'];
    $available = isset($_POST['available']) ? 1 : 0;

    if (validate($_POST)) {
        $book = new Book($title, $author, $genre, $published, $available);
        if ($book->save()) {
            echo json_encode(['success' => true, 'book' => $book]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to save book']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Validation failed']);
    }
}

// Fetch books from the database
$books = [];
$result = $conn->query("SELECT * FROM books");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Book Management</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Book Management</h1>
        <form id="bookForm">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" required>
            </div>
            <div class="form-group">
                <label for="published">Published</label>
                <input type="date" class="form-control" id="published" name="published" required>
            </div>
            <div class="form-group">
                <label for="available">Available</label>
                <input type="checkbox" id="available" name="available">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <table class="table mt-4" id="bookTable">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Published</th>
                    <th>Available</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                <tr>
                    <td><?php echo htmlspecialchars($book['title']); ?></td>
                    <td><?php echo htmlspecialchars($book['author']); ?></td>
                    <td><?php echo htmlspecialchars($book['genre']); ?></td>
                    <td><?php echo htmlspecialchars($book['published']); ?></td>
                    <td><?php echo $book['available'] ? 'Yes' : 'No'; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="book.js"></script>
</body>
</html>