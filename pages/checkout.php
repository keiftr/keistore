<?php
session_start();

$cart = $_SESSION['cart'] ?? [];
$total = 0;

// HANDLE SUBMIT
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment = $_POST['payment'] ?? '';

    // kosongkan cart
    unset($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout - Kei Store</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f8f9fa;">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark px-4">
    <a href="../index.php" class="navbar-brand">Kei Store</a>
</nav>

<div class="container mt-5">

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>

    <!-- SUCCESS -->
    <div class="text-center">
        <h2 class="text-success">Pembayaran Berhasil 🎉</h2>
        <p>Metode pembayaran: <b><?php echo $payment; ?></b></p>
        <p>Terima kasih sudah belanja di Kei Store</p>

        <a href="../index.php" class="btn btn-dark mt-3">
            Kembali ke Home
        </a>
    </div>

<?php } else { ?>

    <div class="row">

        <!-- RINGKASAN -->
        <div class="col-md-6">
            <div class="card p-4 shadow">
                <h4>Ringkasan Belanja</h4>
                <hr>

                <?php if (empty($cart)) { ?>
                    <p>Keranjang kosong</p>
                <?php } else { ?>

                    <?php foreach ($cart as $item) { 
                        $qty = $item['qty'] ?? 1;
                        $subtotal = $item['price'] * $qty;
                        $total += $subtotal;
                    ?>

                        <div class="d-flex justify-content-between">
                            <span><?php echo $item['name']; ?> (x<?php echo $qty; ?>)</span>
                            <span>Rp <?php echo number_format($subtotal); ?></span>
                        </div>

                    <?php } ?>

                    <hr>
                    <h5>Total: Rp <?php echo number_format($total); ?></h5>

                <?php } ?>
            </div>
        </div>

        <!-- PEMBAYARAN -->
        <div class="col-md-6">
            <div class="card p-4 shadow">
                <h4>Metode Pembayaran</h4>
                <hr>

                <form method="POST">

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" value="Bank Transfer" required>
                        <label class="form-check-label">Bank Transfer</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" value="E-Wallet">
                        <label class="form-check-label">E-Wallet (OVO / Dana / Gopay)</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment" value="Credit Card">
                        <label class="form-check-label">Credit Card</label>
                    </div>

                    <button type="submit" class="btn btn-dark w-100 mt-4"
                        <?php if (empty($cart)) echo "disabled"; ?>>
                        Bayar Sekarang
                    </button>
                    <a href="cart.php" class="btn btn-outline-dark w-100 mt-2">
                        ⬅ Kembali ke Keranjang
                    </a>
                </form>
            </div>
        </div>

    </div>

<?php } ?>

</div>

</body>
</html>