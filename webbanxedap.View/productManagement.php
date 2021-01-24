<?php
    if(!isset($_SESSION['username'])){
        header("Location: ../webbanxedap.view/login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Product Management</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    <?php
    include 'view/header.php'; // nhúng nội dung trang Header.php
    ?>
    <h1>Product Management </h1>
    <?php

        if(isset($_SESSION['id'])){
            echo $_SESSION['id'];
        }
        if(isset($_SESSION['action'])){
            echo $_SESSION['action'];
        }
    ?>
    <a href="?action=insertProductForm">Insert new product</a><br/><br/>
    <table border="1" width="100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        //include '../model/Product.php';
        $result = Product::getList();//gọi phương thức lấy danh sách
        while($set = $result->fetch()){ //Duyệt danh sách
            echo "<tr>";
            echo "<td>".$set['masp']."</td>";
            echo "<td>".$set['tensp']."</td>";
            echo "<td><a href='?masp=".$set['masp']."&action=updateProductForm'>Update</a></td>";
            echo "<td><a href='?masp=".$set['masp']."&action=deleteProductForm'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    include 'view/footer.php'; // Nhúng nội dung trang Footer.php
    ?>
    </body>
</html>
    


