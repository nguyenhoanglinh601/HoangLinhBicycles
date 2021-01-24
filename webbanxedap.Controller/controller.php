<?php
include_once "../webbanxedap.Model/Product.php";
include_once "../webbanxedap.Model/Connect.php";
include_once "../webbanxedap.Model/Cart.php";

session_start();

if(isset($_GET["action"]))  $action=$_GET["action"];
elseif(isset($_POST["action"])) $action=$_POST["action"];
else $action="home";

if(isset($_GET['product'])){
    $_SESSION['product']=$_GET['product'];
}

if(isset($_GET['name_product'])){
    $_SESSION['name_product']=$_GET['name_product'];
}

else if(isset($_POST['name_product'])){
    $_SESSION['name_product']=$_POST['name_product'];
}

if(isset($_GET['page'])){
    $_SESSION['page']=$_GET['page'];
}

if(isset($_GET['min_price'])){
    if($_GET['min_price']==""){
        $_SESSION['min_price']=0;
    }
    else{
        $_SESSION['min_price']=$_GET['min_price'];
    }
}

if(isset($_GET['max_price'])){
    if($_GET['max_price']==""){
        $_SESSION['max_price']=100000000;
    }
    else{
        $_SESSION['max_price']=$_GET['max_price'];
    }
}

if(isset($_GET['color_product'])){
    $_SESSION['color_product']=$_GET['color_product'];
}

if(isset($_GET['year_product'])){
    $_SESSION['year_product']=$_GET['year_product'];
}


switch($action){
    case "home":
        unset($_SESSION['year_product']);
        unset($_SESSION['color_product']);
        unset($_SESSION['min_price']);
        unset($_SESSION['max_price']);
        unset($_SESSION['product']);
        unset($_SESSION['name_product']);
        unset($_SESSION['page']);
        $_SESSION['location']="HOME";
        include "../webbanxedap.View/product.php";
    break;
    case "more":
        include "../webbanxedap.View/product.php";
    break;
    case "view_product_detail":
        $_SESSION["IdProduct"]=$_GET["IdProduct"];
        $_SESSION['location']="PRODUCT >> PRODUCT DETAIL";
        include "../webbanxedap.View/product_detail.php";
    break;
    case "search_kind":
        unset($_SESSION['color_product']);
        unset($_SESSION['min_price']);
        unset($_SESSION['max_price']);
        unset($_SESSION['name_product']);
        unset($_SESSION['page']);
        $_SESSION['location']="SEARCH >> ";
        if($_SESSION['product']=="xd"){
            $_SESSION['location']=$_SESSION['location']."xe đạp";
        }
        else if($_SESSION['product']=="pk"){
            $_SESSION['location']=$_SESSION['location']."phụ kiện";
        }
        else if($_SESSION['product']=="pt"){
            $_SESSION['location']=$_SESSION['location']."phụ tùng";
        }
        else{
            $_SESSION['location']=$_SESSION['location']."khác";
        }
        include "../webbanxedap.View/product.php";
    break;
    case "search_name":
        unset($_SESSION['color_product']);
        unset($_SESSION['min_price']);
        unset($_SESSION['max_price']);
        unset($_SESSION['product']);
        unset($_SESSION['page']);
        $_SESSION['location']="SEARCH >> ".$_SESSION['name_product'];
        include "../webbanxedap.View/product.php";
    break;
    case "search_price":
        $pro= new product();
        unset($_SESSION['product']);
        unset($_SESSION['name_product']);
        unset($_SESSION['page']);
        if($_SESSION['min_price']==0){
            $_SESSION['location']="SEARCH >> all price";
        }
        else{
            $_SESSION['location']="SEARCH >> giá từ ".$pro->getPrice($_SESSION['min_price'])."đ đến ".$pro->getPrice($_SESSION['max_price'])."đ";
        }
        include "../webbanxedap.View/product.php";
    break;
    case "search_color":
        unset($_SESSION['product']);
        unset($_SESSION['name_product']);
        unset($_SESSION['page']);
        if($_SESSION['color_product']=='all'){
            $_SESSION['location']="SEARCH >> all color";
        }
        else{
            $_SESSION['location']="SEARCH >> màu ".$_SESSION['color_product'];
        }
        include "../webbanxedap.View/product.php";
    break;
    case "search_year":
        unset($_SESSION['product']);
        unset($_SESSION['name_product']);
        unset($_SESSION['page']);
        if($_SESSION['year_product']=='all'){
            $_SESSION['location']="SEARCH >> all year";
        }
        else{
            $_SESSION['location']="SEARCH >> năm ".$_SESSION['year_product'];
        }
        include "../webbanxedap.View/product.php";
    break;
    case "add_cart":
        echo addItem($_POST['productkey'],$_POST['quantity']);
        include '../webbanxedap.View/cart_view.php';
        break;
    case "update_cart":
        $key= $_POST['productkey'];
        $qty= $_POST['newqty'];
            updateItem($key,$qty);
        include "../webbanxedap.View/cart_view.php";
        break;
    case "show_cart":
        include '../webbanxedap.View/cart_view.php';
        break;
    case "show_add_item":
        include "../webbanxedap.View/product.php";
        break;
    case "empty_cart":
        unset($_SESSION['cart']);
        include "../webbanxedap.View/cart_view.php";
        break;
    case "del_pro":
        echo delPro($_POST['productkey']);
        include "../webbanxedap.View/cart_view.php";
        break;
    case "order":
        include "../webbanxedap.View/order_view.php";
        break;
    default:
        $_SESSION['action']="home";
        include "../webbanxedap.View/product.php";
    break;
    case "productmanagement":
        include "../webbanxedap.view/productmanagement.php";
        break;
    case "insertProductForm":
    case "updateProductForm":
    case "deleteProductForm":
        include "../webbanxedap.view/viewProduct.php";
        break;
    case "insertProduct":
        $masp = $_POST["txtProductmasp"];
        $tensp = $_POST["txtProducttensp"];
        $gianhap = $_POST["txtProductgianhap"];
        $giaban = $_POST["txtProductgiaban"];
        $thuonghieu = $_POST["txtProductthuonghieu"];
        $mau = $_POST["txtProductmau"];
        $xuatxu = $_POST["txtProductxuatxu"];
        $soluongton = $_POST["txtProductsoluongton"];
        $namsanxuat = $_POST["txtProductnamsanxuat"];
        $nhacungcap = $_POST["txtProductnhacungcap"];
        $hinhanh = $_POST["txtProducthinhanh"];
        $pro = new Product();
        $pro->insert($masp,$tensp,$gianhap,$giaban,$thuonghieu,$mau,$xuatxu,$soluongton,$namsanxuat,$nhacungcap,$hinhanh);
        include("../webbanxedap.view/ProductManagement.php");
        break;
    case "updateProduct":
        $masp = $_POST["txtProductmasp"];
        $tensp = $_POST["txtProducttensp"];
        $gianhap = $_POST["txtProductgianhap"];
        $giaban = $_POST["txtProductgiaban"];
        $thuonghieu = $_POST["txtProductthuonghieu"];
        $mau = $_POST["txtProductmau"];
        $xuatxu = $_POST["txtProductxuatxu"];
        $soluongton = $_POST["txtProductsoluongton"];
        $namsanxuat = $_POST["txtProductnamsanxuat"];
        $nhacungcap = $_POST["txtProductnhacungcap"];
        $hinhanh = $_POST["txtProducthinhanh"];
        $pro = new Product();
        $pro->update($masp,$tensp,$gianhap,$giaban,$thuonghieu,$mau,$xuatxu,$soluongton,$namsanxuat,$nhacungcap,$hinhanh);
        include("../webbanxedap.view/ProductManagement.php");
        break;
    case "deleteProduct":
        $masp = $_POST["txtProductmasp"];
        $tensp = $_POST["txtProducttensp"];
        $gianhap = $_POST["txtProductgianhap"];
        $giaban = $_POST["txtProductgiaban"];
        $thuonghieu = $_POST["txtProductthuonghieu"];
        $mau = $_POST["txtProductmau"];
        $xuatxu = $_POST["txtProductxuatxu"];
        $soluongton = $_POST["txtProductsoluongton"];
        $namsanxuat = $_POST["txtProductnamsanxuat"];
        $nhacungcap = $_POST["txtProductnhacungcap"];
        $hinhanh = $_POST["txtProducthinhanh"];
        $pro = new Product($masp,$tensp,$gianhap,$giaban,$thuonghieu,$mau,$xuatxu,$soluongton,$namsanxuat,$nhacungcap,$hinhanh);
        $pro->delete($masp);
        include("../webbanxedap.view/ProductManagement.php");
        break;
    case "login":
        include("../webbanxedap.view/login.php");
    break;
    case "checkLogin":
        require_once("../webbanxedap.Model/connection.php");
	    if (isset($_POST["btn_submit"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $username = strip_tags($username);
            $username = addslashes($username);
            $password = strip_tags($password);
            $password = addslashes($password);
            if ($username == "" || $password == "") {
                echo "username hoặc password không được để trống!";
            }else{
                $sql = "select * from user where username = '$username' and password = '$password' ";
                $query = mysqli_query($conn,$sql);
                $num_rows = mysqli_num_rows($query);
                if ($num_rows==0) {
                    include("../webbanxedap.view/login.php");
                }else{
                    $_SESSION['username'] = $username;
                    $_SESSION['location']="PRODUCT >> HOME";
                    include("../webbanxedap.view/productManagement.php");
                }
            }
        }
    break;
}
?>