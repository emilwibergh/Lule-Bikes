<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

$conn = mysqli_connect('localhost', 'root', 'Password123#@!', 'Bike_databas');

if(isset($_POST['logout'])) {
	session_unset();
	session_destroy();
	header("Location: index.php");
}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bike Rental Checkout</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<h1>Bike Rental Checkout</h1>
	</header>

	<?php 
$username = $_SESSION['username'];
$userid_query = "SELECT id FROM accounts WHERE username = '$username'";
$userid_result = mysqli_query($conn, $userid_query);
$userid_row = mysqli_fetch_assoc($userid_result);
$userid = $userid_row['id'];

$sql = "SELECT * FROM cart WHERE userid = '$userid' ";
$result = $conn->query($sql);

?>


<section class="cart">
    <h2>Cart</h2>
    <table>
        <tr>
            <th>Bike</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Subtotal</th>
			<th>Action</th>
        </tr>
        <?php
        $sql = "SELECT * FROM cart WHERE userid = '$userid' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
				$itemid = $row["id"];
                $bikeid = $row["bikeid"];
                $quantity = 1; // Assuming quantity is fixed at 1 for each booking
                $price = 500; // Assuming a fixed price of $30 per bike per day
                $startDate = new DateTime($row["startDate"]);
                $endDate = new DateTime($row["endDate"]);
                $days = $endDate->diff($startDate)->days ; // Calculate the number of days for which the bike was rented
                $subtotal = $days * $price; // Calculate the subtotal based on the number of days and price per bike
                echo "<tr>";
                echo "<td>$bikeid</td>";
                echo "<td>$quantity</td>";
                echo "<td>$$price</td>";
                echo "<td>$$subtotal</td>";
				echo "<td><form method='post' action='delete_cart_item.php'><input type='hidden' name='itemid' value='$itemid'><button type='submit'>Remove</button></form></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No items in cart</td></tr>";
        }
        ?>
        <tr>
            <td colspan="3">Total:</td>
            <td>
                <?php
                $sql = "SELECT SUM(DATEDIFF(endDate, startDate) ) AS days FROM cart WHERE userid = '$userid'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $total_days = $row["days"];
                $total_price = $total_days * 500; // Assuming a fixed price of $30 per bike per day
                echo "$$total_price";
                ?>
            </td>
        </tr>
    </table>
</section>
	<section class="checkout">
		<h2>Checkout</h2>
		<form>
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" required>

			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required>

			<label for="phone">Phone:</label>
			<input type="tel" id="phone" name="phone" required>

			<label for="address">Address:</label>
			<textarea id="address" name="address" required></textarea>

			<label for="credit-card">Credit Card Number:</label>
			<input type="text" id="credit-card" name="credit-card" required>

			<label for="expiration-date">Expiration Date:</label>
			<input type="text" id="expiration-date" name="expiration-date" required>

			<label for="cvv">CVV:</label>
			<input type="text" id="cvv" name="cvv" required>

			<input type="submit" value="Submit">
		</form>
	</section>

	<footer>
		<p>&copy; 2023 Bike Rental Co.</p>
	</footer>
</body>
</html>