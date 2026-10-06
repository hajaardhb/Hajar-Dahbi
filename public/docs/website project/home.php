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

    header("Location: home.php");
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
    <title>Remy's Journey - Home</title>
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
            <li><a href="bookatable.php">Book A table</a></li>
             
        </ul>
    </nav>
</header>

<div class="home">
    <h1>He's dying to be a chef</h1>
    <h2>Chef Rat</h2>
</div>

<div class="about-us">
    <div class="about-image">
        <img src="wp3348680-ratatouille-wallpaper-hd.jpg" width="50%">
    </div>
    <div class="about-text">
        <h2>About Us</h2>
        <p>This is a website created for people who enjoy the movie "Ratatouille". <br>
            A rat named Remy dreams of becoming a great chef despite his family's wishes <br>
            and the obvious problem of being a rat in a decidedly rodent-phobic profession. <br>
            When fate places Remy in the streets of Paris... <br><br>
            Everyone is welcomed here!</p>
    </div>
</div>

<div class="title"><h1>Our Chefs</h1></div>

<div class="chefs">
    <div class="hajar">
        <img src="hajar.jpg" width="50%">
        <h4>Hajar Dahbi</h4>
        <p>Turning simple ingredients into art</p>
    </div>

    <div class="amira">
        <img src="amira.jpg" width="50%">
        <h4>Amira Rami</h4>
        <p>Where passion meets perfection</p>
    </div>
</div>

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
            <input type="number" name="guests" placeholder="Number of the guests" required>
        </div>

        <button type="submit" class="btn">BOOK NOW!</button>

    </form>

</div>

<footer>
  <div class="info">
    <h3>Address:</h3><p>A hidden location</p>
    <h3>Phone:</h3><p>+123 45678912</p>
  </div>

  <br>

  <p>&copy; 2025 Remy's Journey. All Rights Reserved</p>
</footer>

</body>
</html>