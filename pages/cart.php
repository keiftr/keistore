<?php
session_start();

// pastikan cart ada
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// 🔥 FIX DATA LAMA (qty)
foreach ($_SESSION['cart'] as &$item) {
    if (!isset($item['qty'])) {
        $item['qty'] = 1;
    }
}

// HAPUS ITEM
if (isset($_GET['remove'])) {
    unset($_SESSION['cart'][$_GET['remove']]);
}

// TAMBAH QTY
if (isset($_POST['increase'])) {
    $_SESSION['cart'][$_POST['index']]['qty']++;
}

// KURANG QTY
if (isset($_POST['decrease'])) {
    if ($_SESSION['cart'][$_POST['index']]['qty'] > 1) {
        $_SESSION['cart'][$_POST['index']]['qty']--;
    }
}

$cart = $_SESSION['cart'];
$total = 0;
$count = count($cart);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Keranjang - Kei Store</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @keyframes bounce {
            0% { transform: scale(1); }
            30% { transform: scale(1.3); }
            60% { transform: scale(0.9); }
            100% { transform: scale(1); }
        }

        .cart-animate {
            animation: bounce 0.4s ease;
        }
    </style>
</head>

<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark px-4">
    <a href="../index.php" class="navbar-brand">Kei Store</a>

    <div>
        <a href="catalog.php" class="btn btn-outline-light me-2">
            🛍️ Katalog
        </a>

        <a href="cart.php" class="btn btn-outline-light">
            🛒 <span id="cart-icon">(<?php echo $count; ?>)</span>
        </a>
    </div>
</nav>

<div class="container mt-5">

    <h2>Keranjang 🛒</h2>

    <?php if (empty($cart)) { ?>
        <p>Keranjang kosong</p>

        <a href="catalog.php" class="btn btn-dark mt-3">
            ⬅ Kembali ke Katalog
        </a>

    <?php } else { ?>

        <?php foreach ($cart as $index => $item) { 
            $qty = $item['qty'] ?? 1;
            $subtotal = $item['price'] * $qty;
            $total += $subtotal;
        ?>

        <div class="card mb-3 p-3 shadow-sm">
            <div class="row align-items-center">

                <div class="col-md-2">
                    <img src="../assets/js/images/<?php echo $item['image']; ?>" width="80">
                </div>

                <div class="col-md-4">
                    <h5><?php echo $item['name']; ?></h5>
                    <p>Rp <?php echo number_format($item['price']); ?></p>
                </div>

                <div class="col-md-3">

                    <!-- QTY CONTROL -->
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="index" value="<?php echo $index; ?>">
                        <button name="decrease" class="btn btn-outline-dark">-</button>
                    </form>

                    <span class="mx-2"><?php echo $qty; ?></span>

                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="index" value="<?php echo $index; ?>">
                        <button name="increase" class="btn btn-outline-dark">+</button>
                    </form>

                </div>

                <div class="col-md-2">
                    <b>Rp <?php echo number_format($subtotal); ?></b>
                </div>

                <div class="col-md-1">
                    <a href="?remove=<?php echo $index; ?>" class="btn btn-danger btn-sm">X</a>
                </div>

            </div>
        </div>

        <?php } ?>

        <h4>Total: Rp <?php echo number_format($total); ?></h4>

        <div class="mt-3">
            <a href="catalog.php" class="btn btn-outline-dark">
                ⬅ Kembali Belanja
            </a>

            <a href="checkout.php" class="btn btn-dark">
                Checkout
            </a>
        </div>

    <?php } ?>

</div>

<!-- ANIMASI CART -->
<script>
function animateCart() {
    let cart = document.getElementById("cart-icon");
    cart.classList.add("cart-animate");

    setTimeout(() => {
        cart.classList.remove("cart-animate");
    }, 400);
}
</script>

</body>
</html>