<?php

if(session_status()==PHP_SESSION_ACTIVE)session_destroy();
session_start();

$cart = [];

// Initialize the cart as an empty array
if(isset($_SESSION["cart"])) {
    $cart = $_SESSION["cart"];
}

// Sample product data
$products = [
    ['id' => 1, 'name' => 'Product A', 'price' => 10.99],
    ['id' => 2, 'name' => 'Product B', 'price' => 14.99],
    ['id' => 3, 'name' => 'Product C', 'price' => 19.99]
];

// Add to cart if add_to_cart is clicked
if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];

    // Check if the product is already in the cart
    if (isset($cart[$productId])) {
        // Update the quantity
        $cart[$productId]['quantity'] += 1;
    } else {
        // Add the product to the cart
        $product = $products[$productId - 1];
        $cart[$productId] = [
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => 1
        ];
    }

    $_SESSION['cart'] = $cart;
}

if(isset($_POST['view_cart'])) 
{
    $_SESSION['cart'] = $cart;
    header('Location: view_cart.php');
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
<h1>Product List</h1>

<ul>
    <?php foreach ($products as $product) { ?>
        <li>
            <form method="post">
                <?php echo $product['name']; ?> - $<?php echo $product['price']; ?>
                <input name="product_id" value="<?php echo $product['id']; ?>">
                <input type="submit" name="add_to_cart" value="Add to Cart">
            </form>
        </li>
    <?php } ?>
</ul>

<form method="post">
    <input type="submit" name="view_cart" value="View Cart">
</form>
</body>
</html>
