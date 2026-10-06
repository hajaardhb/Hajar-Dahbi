<?php
session_start();

$host = "localhost";
$user = "root";
$password = "hajar123";
$dbname = "remy_journey";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $reservation_date = $_POST['reservation_date'];
    $guests = $_POST['guests'];

    $stmt = $conn->prepare(
        "INSERT INTO reservations (full_name, email, reservation_date, guests)
        VALUES (?, ?, ?, ?)"
    );

    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }

    $stmt->bind_param("sssi", $full_name, $email, $reservation_date, $guests);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Reservation completed successfully!";
    }

    $stmt->close();

    header("Location: bookatable.php");
    exit();
}

if (isset($_SESSION['success'])) {
    $message = $_SESSION['success'];
    unset($_SESSION['success']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book A Table</title>
    <link rel="stylesheet" href="test1.css">
</head>
<body>

<header>
    <h1>Remy's Journey</h1>

    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="checkout.php">Checkout</a></li>
            <li><a href="bookatable.php">Book A Table</a></li>
           
        </ul>
    </nav>
</header>

<div class="container">

    <form class="login-box" method="POST">

        <h1>BOOK A TABLE</h1>

        <?php if (!empty($message)): ?>
            <p class="success"><?php echo $message; ?></p>
        <?php endif; ?>

        <div class="input-group">
            <input type="text" name="full_name" placeholder="Full Name" required>
        </div>

        <div class="input-group">
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-group">
            <input type="date" name="reservation_date" required>
        </div>

        <div class="input-group">
            <input type="number" name="guests" placeholder="Guests" min="1" max="6" required>
        </div>

        <button type="submit" class="btn">BOOK NOW!</button>

    </form>

</div>

<footer>
        <div class="info">
<h3>Address:</h3><p>A hidden location</p>
<h3>Phone:</h3><p>+123 45678912</p></div>
<br>
<p>&copy; 2025 Remy's Journey. All Rights Reserved</p>
    </footer>

</body>
</html>