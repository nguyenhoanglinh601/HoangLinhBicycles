<?php
include_once "Connect.php";

class product{
    var $MaSanPham=null;
    var $TenSanPham=null;
    var $GiaNhap=null;
    var $GiaBan=null;
    var $ThuongHieu=null;
    var $Mau=null;
    var $XuatXu=null;
    var $SoLuongTon=null;
    var $NamSanXuat=null;
    var $NhaCungCap=null;
    var $HinhAnh="image/product/";

    public function __construct(){
        /*if(func_num_args() == 11){
            $this->masp = func_get_arg(0);
            $this->tensp = func_get_arg(1);
            $this->gianhap = func_get_arg(2);
            $this->giaban = func_get_arg(3);
            $this->thuonghieu = func_get_arg(4);
            $this->mau = func_get_arg(5);
            $this->xuatxu = func_get_arg(6);
            $this->soluongton = func_get_arg(7);
            $this->namsanxuat = func_get_arg(8);
            $this->nhacungcap = func_get_arg(9);
            $this->hinhanh = func_get_arg(10);
        }*/
    }

    function getListProduct($kind,$name,$min_price,$max_price,$color_product,$year_product,$start,$limit){
        $db=new connect();
        $select="SELECT * FROM `sanpham` WHERE masp LIKE '$kind%' AND tensp LIKE '%$name%' AND giaban>$min_price-1 AND giaban<$max_price AND mau LIKE '%$color_product%' AND namsanxuat LIKE '%$year_product%' ORDER BY masp DESC LIMIT $start,$limit";
        $result=$db->getList($select);
        return $result;
    }

    function getListPage($from,$to){
        $db=new connect();
        $select="select * from sanpham limit $from,$to";
        $result=$db->getList($select);
        return $result;
    }

    function getProductById($masp){
        $db=new connect();
        $select="select * from sanpham where masp='$masp'";
        $result=$db->getInstance($select);
        return $result;
    }

    function getTotalProduct($kind,$name,$min_price,$max_price,$color_product,$year_product){
        $db=new connect();
        $select="SELECT COUNT(masp) AS total FROM sanpham WHERE masp LIKE '$kind%' AND tensp LIKE '%$name%' AND giaban>$min_price-1 AND giaban<$max_price AND mau LIKE '%$color_product%' AND namsanxuat LIKE '%$year_product%'";
        $result=$db->getInstance($select);
        return $result;
    }

    function getTotalProductByKind($kind){
        $db=new connect();
        $select="SELECT COUNT(masp) AS total FROM sanpham WHERE masp LIKE '".$kind."%'";
        $result=$db->getInstance($select);
        return $result;
    }

    function getTotalProductByName($name){
        $db=new connect();
        $select="SELECT COUNT(masp) AS total FROM sanpham WHERE tensp LIKE '%".$name."%'";
        $result=$db->getInstance($select);
        return $result;
    }

    function getTotalProductByPrice($min_price,$max_price){
        $db=new connect();
        $select="SELECT COUNT(masp) AS total FROM sanpham WHERE giaban>$min_price-1 AND giaban<$max_price";
        $result=$db->getInstance($select);
        return $result;
    }

    function getPrice($value){
        $result="";
        $j=0;
        for($i=strlen($value)-1;$i>=0;$i--){
            $result=substr($value,$i,1)."$result";
            $j++;
            if($j%3==0 && $i!=0){
                $result=".".$result;
            }
        }
        return $result;
    }

    function getPriceDiscount($value){
        $pro= new product();
        if($value<=100000)	$value=$value-30000;
        elseif( $value>100000 && $value<=500000)    $value=$value-50000;
        elseif( $value>500000 && $value<=1000000)   $value=$value-100000;
        elseif( $value>1000000) $value=$value-300000;
        return $pro->getPrice($value);
    }

    function getPriceDiscount1($value){
        $pro= new product();
        if($value<=100000)	$value=$value-30000;
        elseif( $value>100000 && $value<=500000)    $value=$value-50000;
        elseif( $value>500000 && $value<=1000000)   $value=$value-100000;
        elseif( $value>1000000) $value=$value-300000;
        return $value;
    }

    //
    static function getList(){
        $db = new connect();
        $query = "select * from sanpham";
        return $db->getList($query);
    }

    function insert($masp,$tensp,$gianhap,$giaban,$thuonghieu,$mau,$xuatxu,$soluongton,$namsanxuat,$nhacungcap,$hinhanh){
        $db = new connect();
        $query = "insert into sanpham values('".$masp."','" .$tensp . "',";
        $query .= $gianhap . "," . $giaban . ",'";
        $query .= $thuonghieu . "','" . $mau . "','";
        $query .= $xuatxu . "'," . $soluongton . ",'";
        $query .= $namsanxuat . "','" . $nhacungcap . "','";
        $query .= $hinhanh . "')";
       
        $db->execute($query);


    }

    function update($masp,$tensp,$gianhap,$giaban,$thuonghieu,$mau,$xuatxu,$soluongton,$namsanxuat,$nhacungcap,$hinhanh){
        $db = new connect();
        $query = sprintf("update sanpham set tensp = '%s', gianhap = %d, giaban = %d, thuonghieu = '%s'," .
                                            "mau = '%s', xuatxu = '%s', soluongton = %d, " .
                                            "namsanxuat = '%s', nhacungcap = '%s', hinhanh = '%s'" .
                        " WHERE masp = '%s'",
                         $tensp, $gianhap, $giaban,  $thuonghieu, $mau,
                         $xuatxu , $soluongton, $namsanxuat, $nhacungcap, $hinhanh,
                         $masp);

        $db->execute($query);
    }

    function delete($masp){
        $db = new connect();
        $query = sprintf("delete from sanpham where masp = '%s'", $masp);
        $db->execute($query);
    }

    function deleteProduct($masp){
        $db = new connect();
        $query = sprintf("delete from sanpham where masp = '%s'", $masp);
        $db->execute($query);
    }
}
?>