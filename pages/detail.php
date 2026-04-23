session_start();

if(isset($_POST['add_to_cart'])){
    $_SESSION['cart'][] = [
        "id" => $_POST['id'],
        "name" => $_POST['name'],
        "price" => $_POST['price']
    ];
}
<form method="POST">
    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
    <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
    <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
    <button name="add_to_cart">Tambah ke Keranjang</button>
</form>