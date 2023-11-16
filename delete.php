<?php
    require './config/db.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $delete_query = "DELETE FROM products WHERE id=$id";
        $delete_result = mysqli_query($db_connect, $delete_query);

        if($delete_result) {
            echo "Data produk berhasil dihapus.";
        } else {
            echo "Gagal menghapus data produk.";
        }
    } else {
        echo "ID produk tidak valid.";
    }
?>