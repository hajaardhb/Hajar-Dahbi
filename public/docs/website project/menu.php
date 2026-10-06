<?php
$conn = new mysqli("localhost", "root", "hajar123", "remy_journey");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM menu");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Remy's Journey - Menu</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      color: white;
    }

    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background: url("rato.jpg") center/cover no-repeat;
      filter: blur(10px);
      transform: scale(1.1);
      z-index: -2;
    }

    body::after {
      content: "";
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, .45);
      z-index: -1;
    }

    header {
      background: #7b1a1a;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 40px;
    }

    nav ul {
      display: flex;
      list-style: none;
      gap: 25px;
    }

    nav a {
      color: white;
      text-decoration: none;
    }

    .title {
      text-align: center;
      margin: 40px 0;
    }

    .menu {
      width: 90%;
      max-width: 1400px;
      margin: auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
      padding-bottom: 40px;
    }

    .card {
      background: white;
      color: black;
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, .25);
      display: flex;
      flex-direction: column;
      transition: .3s;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card img {
      width: 100%;
      height: 220px;
      object-fit: cover;
    }

    .card h3 {
      color: #7b1a1a;
      padding: 15px;
    }

    .card p {
      padding: 0 15px;
      color: #555;
      flex: 1;
    }

    .bottom {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px;
    }

    .price {
      font-size: 22px;
      font-weight: bold;
      color: #7b1a1a;
    }

    button {
      background: #7b1a1a;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 25px;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background: #a32222;
      transform: scale(1.05);
    }

    footer {
      background-color: rgb(123, 26, 26);
      color: white;
      text-align: center;
      padding: 15px 0;
    }

    #toast {
      position: fixed;
      bottom: 30px;
      right: 30px;
      background: #7b1a1a;
      color: white;
      padding: 12px 18px;
      border-radius: 10px;
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.4s ease;
      font-size: 14px;
      z-index: 9999;
    }

    #toast.show {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>

<body>

  <header>
    <h1>Remy's Journey</h1>

    <nav>
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="checkout.php">Checkout</a></li>
        <li><a href="bookatable.php">Book a Table</a></li>
      </ul>
    </nav>
  </header>

  <section class="title">
    <h2>Remy's Menu</h2>
    <p>Discover our dishes prepared with passion.</p>
  </section>

  <section class="menu">

    <?php while($row = $result->fetch_assoc()): ?>

      <div class="card">
        <img src="<?php echo $row['image']; ?>">

        <h3><?php echo $row['name']; ?></h3>

        <p><?php echo $row['description']; ?></p>

        <div class="bottom">
          <span class="price">
            <?php echo $row['price']; ?> DH
          </span>

          <button onclick="addToCart('<?php echo $row['name']; ?>', <?php echo $row['price']; ?>)">
            Add to cart
          </button>
        </div>
      </div>

    <?php endwhile; ?>

  </section>

  <div id="toast">Item added to cart ✓</div>

  <footer>
    <div class="info">
      <h3>Address:</h3><p>A hidden location</p>
      <h3>Phone:</h3><p>+123 45678912</p>
    </div>

    <br>

    <p>&copy; 2025 Remy's Journey. All Rights Reserved</p>
  </footer>

  <script>
    function showToast(message) {
      const toast = document.getElementById("toast");
      toast.innerText = message;
      toast.classList.add("show");

      setTimeout(() => {
        toast.classList.remove("show");
      }, 2000);
    }

    function addToCart(name, price) {
      let cart = JSON.parse(localStorage.getItem("cart")) || [];

      cart.push({ name, price });

      localStorage.setItem("cart", JSON.stringify(cart));

      showToast(name + " added to cart");
    }
  </script>

</body>
</html>