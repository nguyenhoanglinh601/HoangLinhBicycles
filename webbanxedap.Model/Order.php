<?php
    class order {
        public function __construct() {}
        public function createOrder($customerId) {
            $db = new connect();
            $date = new DateTime("now");
            $dateCreate = $date->format("Y-m-d");
            $query = "insert into Order(OrderId,DateCreate,Total) values (NULL,'$dateCreate',0)";
            $db->execute($query);
            $int = $db->getInstance("select OrderId from Order order by OrderId desc limit 1");
            return $int[0];
        }

        public function insertOrderDetail($proid,$orderid,$price,$quantity,$total) {
            $db = new connect();
            $query = "insert into OrderDetail values('$proid','$orderid','$price','$quantity','$total')";
            $db->execute($query);
        }

        public function updateOrderDetail($orderid,$total) {
            $db = new connect();
            $query = "update Order set Total = '$total' where OrderId = '$orderid'";
            $db->execute($query);
        }

        function getOrder($orderid) {
            $db = new connect();
            $select = "select OrderId,DateCreate,Total from OrderDetail where orderid=$orderid";
            $result = $db->getInstance($select);
            return $result;
        }

        function getOrderDetail($orderid) {
            $db = new connect();
            $select = "select p.masp,tensp,giaban,soluong from OrderDetail od inner join sanpham p on od.ProId = p.masp where orderid=$orderid";
            $result = $db->getList($select);
            return $result;
        }
    }
?>