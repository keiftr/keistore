<?php include 'config/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kei Store</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero {
            margin-top: 80px;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark px-4">
    <span class="navbar-brand mb-0 h1">Kei Store</span>
    <a href="pages/catalog.php" class="btn btn-outline-light">Catalog</a>
</nav>

<!-- HERO SECTION -->
<div class="container text-center hero">
    <h1 class="fw-bold">Kei Store 🚀</h1>
    <p class="text-muted">Find your perfect fragrance with AI</p>
</div>

<!-- AI RECOMMENDATION FORM -->
<div class="container mt-5">
    <div class="card shadow p-4">

        <h4 class="mb-3">Cari parfum sesuai kebutuhan kamu</h4>

        <form action="ai/recommendation.php" method="POST">

            <div class="mb-3">
                <label class="form-label">Pilih kategori:</label>
                <select name="type" class="form-select">
                    <option value="hot">Cuaca Panas</option>
                    <option value="cold">Cuaca Dingin</option>
                    <option value="masculine">Masculine</option>
                    <option value="romantic">Romantic</option>
                </select>
            </div>

            <button type="submit" class="btn btn-dark w-100">
                Cari Parfum
            </button>

        </form>

    </div>
</div>

<!-- BUTTON KE KATALOG -->
<div class="container text-center mt-4">
    <a href="pages/catalog.php" class="btn btn-outline-dark">
        Lihat Semua Produk
    </a>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>