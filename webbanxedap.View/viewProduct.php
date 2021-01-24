<?php
    if(isset($_GET["action"])){
        if($_GET["action"] == "updateProductForm")
            $action = 1;
        else if($_GET["action"] == "deleteProductForm")
            $action = 2;
        else 
            $action = 0;
    }
    else 
        header("Location:../Controller/controller.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php 
            if($action == 1)
                echo "<title>Update Product</title>";
            else if($action == 2)
                echo "<title>Delete Product</title>";
            else
                echo "<title>Insert Product</title>";
        ?>

        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        include '../webbanxedap.view/view/header.php';
        ?>
        <?php
            if($action == 1)
                echo "<h2>Update Product</h2>";
            else if($action == 2)
                echo "<h2>Delete Product</h2>";
            else
                echo "<h2>Insert Product</h2>";
        ?>
        <?php 
            if(isset($_GET["masp"])){
                $pro = Product::getProductById($_GET["masp"]);
            }
        ?>

        <form action="controller.php" method="post" enctype="multipart/form-data">
            <?php
                if($action == 1)
                    echo "<input type='hidden' name='action' value='updateProduct'/>";
                else if($action == 2)
                    echo "<input type='hidden' name='action' value='deleteProduct'/>";
                else
                    echo "<input type='hidden' name='action' value='insertProduct'/>";
            ?>
            <table>
                <tr>
                    <th>Mã sản phẩm</th>
                    <td>
                        <input type="text" name="txtProductmasp" <?php if(isset($pro)) echo "value='".$pro["masp"]."'";?> />
                    </td>
                </tr>
                <tr>
                    <th>Tên sản phẩm</th>
                    <td><input type="text" name="txtProducttensp" 
                            <?php if(isset($pro)) echo "value='".$pro["tensp"]."'";?>
                            <?php if($action == 2) echo "readonly='readonly'";?>/>
                    </td>
                </tr>
                <tr>
                    <th>Giá nhập</th>
                    <td><input type="text" name="txtProductgianhap" 
                            <?php if(isset($pro)) echo "value=".$pro["gianhap"];?>
                            <?php if($action == 2) echo "readonly='readonly'";?>/>
                    </td>
                </tr>
                <tr>
                    <th>Giá bán</th>
                    <td><input type="text" name="txtProductgiaban" 
                            <?php if(isset($pro)) echo "value=".$pro["giaban"];?>
                            <?php if($action == 2) echo "readonly='readonly'";?>/>
                    </td>
                </tr>
                <tr>
                    <th>Thương hiệu</th>
                    <td><input type="text" name="txtProductthuonghieu" 
                            <?php if(isset($pro)) echo "value='".$pro["thuonghieu"]."'";?>
                            <?php if($action == 2) echo "readonly='readonly'";?>/>
                    </td>
                </tr>
                <tr>
                    <th>Màu sắc</th>
                    <td><input type="text" name="txtProductmau" 
                            <?php if(isset($pro)) echo "value='".$pro["mau"]."'";?>
                            <?php if($action == 2) echo "readonly='readonly'";?>/>
                    </td>
                </tr>
                <tr>
                    <th>Xuất xứ</th>
                    <td><input type="text" name="txtProductxuatxu" 
                            <?php if(isset($pro)) echo "value='".$pro["xuatxu"]."'";?>
                            <?php if($action == 2) echo "readonly='readonly'";?>/>
                    </td>
                </tr>
                <tr>
                    <th>Số lượng tồn</th>
                    <td><input type="text" name="txtProductsoluongton" 
                            <?php if(isset($pro)) echo "value='".$pro["soluongton"]."'";?>
                            <?php if($action == 2) echo "readonly='readonly'";?>/>
                    </td>
                </tr>
                <tr>
                    <th>Năm sản xuất</th>
                    <td><input type="text" name="txtProductnamsanxuat" 
                            <?php if(isset($pro)) echo "value='".$pro["namsanxuat"]."'";?>
                            <?php if($action == 2) echo "readonly='readonly'";?>/>
                    </td>
                </tr>
                <tr>
                    <th>Nhà cung cấp</th>
                    <td><input type="text" name="txtProductnhacungcap" 
                            <?php if(isset($pro)) echo "value='".$pro["nhacungcap"]."'";?>
                            <?php if($action == 2) echo "readonly='readonly'";?>/>
                    </td>
                </tr>
                <tr>
                    <th>Hình ảnh</th>
                    <td><input type="text" name="txtProducthinhanh" 
                            <?php if(isset($pro)) echo "value='".$pro["hinhanh"]."'";?>
                            <?php if($action == 2) echo "readonly='readonly'";?>/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="submit"/>
                        <input type="reset" value="reset"/>
                    </td>
                </tr>
            </table>
        </form>
        <?php
        include '../webbanxedap.view/view/footer.php';
        ?>
    </body>
</html>


                        
