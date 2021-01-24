<?php
function addItem($MaSanPham,$quantity) {
    $pros = new product();
    $pro = $pros->getProductById($MaSanPham);
    if(isset($_SESSION['cart'][$MaSanPham])) {
        $quantity += $_SESSION['cart'][$MaSanPham]['qty'];
        updateItem($MaSanPham,$quantity);
        return;
    }
    $cost1 = $pro['giaban'];
    $cost =  $pros->getPriceDiscount1($pro['giaban']);
    $total = $cost*$quantity;
    $item = array (
        'name' =>$pro['tensp'],
        'cost1' =>$cost1,
        'cost' =>$cost,
        'qty' =>$quantity,
        'total' =>$total
    );

    $_SESSION['cart'][$MaSanPham] = $item;
}

function updateItem($MaSanPham,$quantity) {
    $quantity = (int) $quantity;
    if ($quantity <= 0) {
        unset($_SESSION['cart'][$MaSanPham]);
    }
    else {
        $_SESSION['cart'][$MaSanPham]['qty']=$quantity;
        $total=$_SESSION['cart'][$MaSanPham]['cost']*$_SESSION['cart'][$MaSanPham]['qty'];
        $_SESSION['cart'][$MaSanPham]['total']=$total;
    }
}

function getSubTotal() {
    $subTotal = 0;
    foreach($_SESSION['cart'] as $item) {
        $subTotal += $item['total'];
    }
    $subTotal = number_format($subTotal);
    return $subTotal;
}

function delPro($MaSanPham) {
    unset($_SESSION['cart'][$MaSanPham]);
}
?>
