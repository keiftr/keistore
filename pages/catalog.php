<?php
session_start();
include '../config/db.php';

$result = mysqli_query($conn, "SELECT * FROM products");

// TAMBAH KE CART
if (isset($_POST['add_to_cart'])) {

    $_SESSION['cart'][] = [
        "id" => $_POST['id'],
        "name" => $_POST['name'],
        "price" => $_POST['price'],
        "image" => $_POST['image'],
        "qty" => 1
    ];

    // 🔥 trigger animasi + toast
    $_SESSION['animate_cart'] = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Catalog - Kei Store</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background:#f8f9fa;
        }

        /* 🔥 animasi cart */
        @keyframes bounce {
            0% { transform: scale(1); }
            30% { transform: scale(1.5); }
            60% { transform: scale(0.9); }
            100% { transform: scale(1); }
        }

        .cart-animate {
            animation: bounce 0.5s ease;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark px-4">
    <a href="../index.php" class="navbar-brand">Kei Store</a>

    <div>
        <a href="../index.php" class="btn btn-outline-light me-2">
            🏠 Home
        </a>

        <a href="cart.php" class="btn btn-outline-light">
            <span id="cart-icon">🛒</span>
        </a>
    </div>
</nav>
    <a href="../index.php" class="navbar-brand">Kei Store</a>

    <a href="cart.php" class="btn btn-outline-light">
        <span id="cart-icon">🛒</span>
    </a>
</nav>

<div class="container mt-5">

    <h2 class="text-center mb-4">Catalog Parfum</h2>

    <div class="row">

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <div class="col-md-4 mb-4">
            <div class="card shadow h-100">

                <img src="../assets/js/images/<?php echo $row['image']; ?>"
                     class="card-img-top"
                     style="height:250px; object-fit:cover;">

                <div class="card-body text-center">
                    <h5><?php echo $row['name']; ?></h5>
                    <p class="text-muted"><?php echo $row['brand']; ?></p>
                    <p><b>Rp <?php echo number_format($row['price']); ?></b></p>

                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                        <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                        <input type="hidden" name="image" value="<?php echo $row['image']; ?>">

                        <button name="add_to_cart" class="btn btn-dark w-100">
                            + Keranjang
                        </button>
                    </form>

                </div>
            </div>
        </div>

        <?php } ?>

    </div>
</div>

<!-- 🔥 TOAST -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="cartToast" class="toast align-items-center text-bg-dark border-0">
    <div class="d-flex">
      <div class="toast-body">
        ✅ Produk berhasil ditambahkan ke keranjang
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- 🔥 SCRIPT ANIMASI + TOAST -->
<script>
window.onload = function() {

    <?php if (isset($_SESSION['animate_cart'])) { ?>

        // animasi cart
        let cart = document.getElementById("cart-icon");
        if (cart) {
            cart.classList.add("cart-animate");

            setTimeout(() => {
                cart.classList.remove("cart-animate");
            }, 500);
        }

        // tampilkan toast
        let toastEl = document.getElementById('cartToast');
        let toast = new bootstrap.Toast(toastEl);
        toast.show();

    <?php unset($_SESSION['animate_cart']); } ?>

};
</script>

</body>
</html>