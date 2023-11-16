<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <?php
        require './config/db.php';

        if(isset($_GET['id'])) {
            $id = $_GET['id'];

        
            $result = mysqli_query($db_connect, "SELECT * FROM products WHERE id=$id");
            $row = mysqli_fetch_assoc($result);

            if(!$row) {
                echo "Produk tidak ditemukan!";
                exit;
            }

        
            if(isset($_POST['submit'])) {
                $name = $_POST['name'];
                $price = $_POST['price'];

                $update_query = "UPDATE products SET name='$name', price=$price WHERE id=$id";
                $update_result = mysqli_query($db_connect, $update_query);

                if($update_result) {
                    echo "Data produk berhasil diupdate.";
                } else {
                    echo "Gagal mengupdate data produk.";
                }
            }
    ?>
            <h1>Edit Produk</h1>
            <form method="post" action="">
                <label for="name">Nama Produk:</label>
                <input type="text" name="name" value="<?=$row['name'];?>" required><br>

                <label for="price">Harga:</label>
                <input type="number" name="price" value="<?=$row['price'];?>" required><br>

                <input type="submit" name="submit" value="Update">
            </form>
    <?php
        } else {
            echo "ID produk tidak valid.";
        }
    ?>
</body>
</html>