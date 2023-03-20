<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <h1><b>DATA PRODUCTS</b></h1>

    <table border="1">
        <tr>
            <th>productCode</th>
            <th>productName</th>
            <th>productLine</th>
            <th>productScale</th>
            <th>productVendor</th>
            <th>productDescription</th>
            <th>quantityInStock</th>
            <th>buyPrice</th>
            <th>MSRP</th>
            <th colspan="2">Aksi</th>
        </tr>

<?php
    include "conn.php";

    $ambildata = mysqli_query($conn, "select * from products");
    while ($tampil = mysqli_fetch_array($ambildata)){
        echo "
        <tr>
            <td>$tampil[productCode]</td>
            <td>$tampil[productName]</td>
            <td>$tampil[productLine]</td>
            <td>$tampil[productScale]</td>
            <td>$tampil[productVendor]</td>
            <td>$tampil[productDescription]</td>
            <td>$tampil[quantityInStock]</td>
            <td>$tampil[buyPrice]</td>
            <td>$tampil[MSRP]</td>
            <td><a href = '?kode=$tampil[productCode]'>Hapus </a></td>
            <td><a href = UpdateProducts.php?kode =$tampil[productCode]'>Ubah</a></td>
        </tr>";

    }
?>
    </table>

<?php
    if (isset($_GET ['kode'])){
        mysqli_query($conn, "delete from products where productCode = '$_GET [kode]'");
        echo "Data telah terhapus";
        echo "<meta http-equiv=refresh content=2;url='Products.php'>";
    }
?>
</body>
</html>