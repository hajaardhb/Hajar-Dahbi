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
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = trim(htmlspecialchars($_POST['full_name']));
    $address = trim(htmlspecialchars($_POST['address']));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $cart = $_POST['cart'];
    $total = (float) $_POST['total'];

    if (empty($full_name) || empty($address) || empty($phone) || empty($cart)) {
        $_SESSION['error'] = "Please fill all fields!";
        header("Location: checkout.php");
        exit();
    }

    $decodedCart = json_decode($cart, true);

    if (!$decodedCart || count($decodedCart) == 0) {
        $_SESSION['error'] = "Cart is empty!";
        header("Location: checkout.php");
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO orders (full_name, address, phone, cart, total) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }

    $stmt->bind_param("ssssd", $full_name, $address, $phone, $cart, $total);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Order placed successfully!";
    } else {
        $_SESSION['error'] = "Failed to place order!";
    }

    $stmt->close();

    header("Location: checkout.php");
    exit();
}

if (isset($_SESSION['success'])) {
    $message = $_SESSION['success'];
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
    $message = $_SESSION['error'];
    $error = true;
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout</title>

<style>
*{margin:0;padding:0;box-sizing:border-box}
body{color:#fff;display:flex;flex-direction:column}
body::before{content:"";position:fixed;inset:0;background:url("rato.jpg") center/cover no-repeat;filter:blur(10px);transform:scale(1.1);z-index:-2}
body::after{content:"";position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:-1}
header{background:#7b1a1a;display:flex;justify-content:space-between;padding:10px 40px}
nav ul{display:flex;list-style:none;gap:25px}
nav a{color:#fff;text-decoration:none}
.container{width:90%;max-width:800px;margin:30px auto;display:flex;flex-direction:column;gap:20px;flex:1}
.box{background:rgba(255,255,255,.95);color:#000;padding:20px;border-radius:15px}
.item{display:flex;align-items:center;gap:15px;padding:10px;border-bottom:1px solid #eee}
.item img{width:70px;height:70px;object-fit:cover;border-radius:10px}
.price{color:#7b1a1a;font-weight:bold}
.btn{background:#7b1a1a;color:#fff;border:none;padding:10px 15px;border-radius:25px;cursor:pointer}
.total{text-align:right;font-size:22px;font-weight:bold;color:#7b1a1a}
form{display:flex;flex-direction:column;gap:15px}
form input{padding:12px;border-radius:8px;border:1px solid #ccc}
.message{text-align:center;padding:10px;border-radius:10px}
.success{background:#d4edda;color:#155724}
.error{background:#f8d7da;color:#721c24}
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
<li><a href="bookatable.php">Book A Table</a></li>
</ul>
</nav>
</header>

<div class="container">

<?php if (!empty($message)): ?>
<div class="message <?php echo $error ? 'error' : 'success'; ?>">
<?php echo $message; ?>
</div>
<?php endif; ?>

<div class="box">
<h2>Your Order</h2>
<div id="cartBox"></div>
<div class="total" id="total"></div>
</div>

<div class="box">
<h2>Customer Information</h2>

<form method="POST" onsubmit="return validateForm()">
<input type="text" id="name" name="full_name" placeholder="Full Name" required>
<input type="text" id="address" name="address" placeholder="Address" required>
<input type="text" id="phone" name="phone" placeholder="Phone Number" required>

<input type="hidden" name="cart" id="cartInput">
<input type="hidden" name="total" id="totalInput">

<button class="btn" type="submit">Confirm Order</button>
</form>

</div>

</div>

<script>
let cart = JSON.parse(localStorage.getItem("cart")) || {};

const images = {
"Remy Burger":"burger.jpg",
"Pizza Margherita":"pizza.jpg",
"Chicken Tacos":"tacos.jpg",
"Caesar Wrap":"wrap.jpg",
"Alfredo Pasta":"pasta.jpg",
"Steak Fries":"steak.jpg",
"Grilled Salmon":"salmon.jpg",
"Fresh Salad":"salade.jpg",
"Chocolate Brownie":"brownie.jpg",
"Cheesecake":"cheesecake.jpg",
"Tiramisu":"tiramisu.jpg",
"Vanilla Milkshake":"milkshake-vanille.jpg",
"Chocolate Milkshake":"milkshake-chocolat.jpg",
"Strawberry Milkshake":"milkshake-fraise.jpg",
"Coca-Cola":"coca.jpg",
"Fanta Orange":"fanta.jpg",
"Sprite":"sprite.jpg",
"Water":"eau.jpg"
};

function loadCart(){
let box=document.getElementById("cartBox");
let total=0;
box.innerHTML="";
if(cart.length===0){box.innerHTML="<p>Your cart is empty</p>";}
cart.forEach((item,index)=>{
total+=item.price;
box.innerHTML+=`<div class="item" ><img src="${images[item.name]||'burger.jpg'}"><div><h3>${item.name}</h3><p class="price">${item.price} DH</p></div><button class="btn" onclick="removeItem(${index})">Remove</button></div>`;
});
document.getElementById("total").innerText="Total: "+total+" DH";
}

function removeItem(index){
cart.splice(index,1);
localStorage.setItem("cart",JSON.stringify(cart));
loadCart();
}

function validateForm(){
if(!document.getElementById("name").value||!document.getElementById("address").value||!document.getElementById("phone").value){alert("Please fill all fields!");return false;}
if(cart.length===0){alert("Cart is empty!");return false;}
document.getElementById("cartInput").value=JSON.stringify(cart);
document.getElementById("totalInput").value=cart.reduce((s,i)=>s+i.price,0);
return true;
}

loadCart();
</script>

</body>
</html>