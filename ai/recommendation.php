<?php
include '../config/db.php';

$type = $_POST['type'] ?? '';

// LOGIC AI
if ($type == "hot") {
    $query = "SELECT * FROM products 
              WHERE notes LIKE '%citrus%' 
              OR notes LIKE '%fresh%'";
    $title = "Rekomendasi untuk Cuaca Panas ☀️";
    $desc = "Aroma fresh dan ringan yang cocok digunakan saat cuaca panas.";
}
elseif ($type == "cold") {
    $query = "SELECT * FROM products 
              WHERE notes LIKE '%oud%' 
              OR notes LIKE '%vanilla%' 
              OR notes LIKE '%amber%' 
              OR notes LIKE '%iris%'";
    $title = "Rekomendasi untuk Cuaca Dingin ❄️";
    $desc = "Aroma hangat seperti oud, amber, dan vanilla yang lebih tahan lama di cuaca dingin.";
}
elseif ($type == "masculine") {
    $query = "SELECT * FROM products 
              WHERE notes LIKE '%iris%' 
              OR notes LIKE '%leather%'";
    $title = "Rekomendasi Masculine 🧑";
    $desc = "Memberikan kesan maskulin, elegan, dan sophisticated dengan dominasi iris dan leather.";
}
elseif ($type == "romantic") {
    $query = "SELECT * FROM products 
              WHERE notes LIKE '%sweet%' 
              OR notes LIKE '%vanilla%'";
    $title = "Rekomendasi Romantic ❤️";
    $desc = "Aroma manis dan hangat yang cocok untuk suasana romantic.";
}
else {
    $query = "SELECT * FROM products";
    $title = "Rekomendasi Umum";
    $desc = "";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rekomendasi - Kei Store</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color:#f8f9fa;">

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark px-4">
    <a href="../index.php" class="navbar-brand">Kei Store</a>
</nav>

<div class="container mt-5">

    <!-- HEADER -->
    <div class="text-center mb-4">
        <h2 class="fw-bold"><?php echo $title; ?></h2>
        <p class="text-muted"><?php echo $desc; ?></p>
    </div>

    <!-- HASIL -->
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
                    <p class="small"><?php echo $row['notes']; ?></p>

                    <a href="../pages/catalog.php" class="btn btn-outline-dark w-100">
                        Lihat di Catalog
                    </a>
                </div>

            </div>
        </div>

        <?php } ?>

    </div>

    <!-- BUTTON KEMBALI -->
    <div class="text-center mt-4">
        <a href="../index.php" class="btn btn-dark">
            ⬅ Kembali ke Home
        </a>
    </div>

</div>

</body>
</html>