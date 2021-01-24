<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content_Type" content="text/html; charset=UTF-8">
    <title>Cart</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../webbanxedap.View/css/style.css">
    <style type="text/css">
        @media screen and (max-width: 600px) {
            table#cart tbody td .form-control {
                width: 20%;
                display: inline !important;
            }

            .actions .btn {
                width: 36%;
                margin: 1.5em 0;
            }

            .actions .btn-info {
                float: left;
            }

            .actions .btn-danger {
                float: right;
            }

            table#cart thead {
                display: none;
            }

            table#cart tbody td {
                display: block;
                padding: .6rem;
                min-width: 320px;
            }

            table#cart tbody tr td:first-child {
                background: #333;
                color: #fff;
            }

            table#cart tbody td:before {
                content: attr(data-th);
                font-weight: bold;
                display: inline-block;
                width: 8rem;
            }

            table#cart tfoot td {
                display: block;
            }

            table#cart tfoot td .btn {
                display: block;
            }
        }
    </style>
</head>

<body>
    <div style="clear:both;margin-left: 5%; margin-right: 5%;">
        <h1>Giỏ hàng của bạn</h1>
        <form action="controller.php" method="post">
            <input type='hidden' name='action' value='order' />
            <input type="hidden" name="productkey" value="<?php echo $key ?>" />
            <input class="btn btn-success" type="submit" value="Thanh toán">
        </form>
        <?php if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) : ?>
            <p> Bạn chưa chọn mặt hàng</p>
            <a href="?action=show_add_item" class="btn btn-warning"></i>Mua hàng</a>
        <?php else : ?>
            <?php
            foreach ($_SESSION['cart'] as $key => $item) :
                $cost = number_format($item['cost']);
                $total = number_format($item['total']);
                $cost1 = number_format($item['cost1']);
            ?>
            <?php endforeach; ?>
            <from action="controller.php" method="post">
                <input type="hidden" name="action" value="update_cart" />
                <div style="overflow-x: auto;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Tên Sản Phẩm</>
                                <th class="text-center">Giá Bán</th>
                                <th class="text-center">Số Lượng</th>
                                <th class="text-center">Thành tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($_SESSION['cart'] as $key => $item) :
                            $cost = number_format($item['cost']);
                            $total = number_format($item['total']);
                            $cost1 = number_format($item['cost1']);
                        ?>
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                        <h4 style="margin: 0;"><?php echo $item['name']; ?></h4>
                                    </td>
                                    <td class="text-center">
                                        <p class="giam-gia"><?php echo $cost1 . "đ" ?></p>
                                        <?php echo $cost . "đ" ?>
                                    </td>
                                    <form action="controller.php" method="post" style="display: inline-flex;">
                                        <td class="text-center" style="width: 10%;">
                                            <input class="form-control text-center" type="number" name="newqty" value="<?php echo $item['qty']; ?>" />
                                        </td>
                                        <td class="text-center">
                                            <div style="text-align: center;"><?php echo $total . "đ"; ?></div>
                                        </td>
                                        <td>
                                            <input type='hidden' name='action' value='update_cart' />
                                            <input type="hidden" name="productkey" value="<?php echo $key ?>" />
                                            <input class="btn btn-primary" type="submit" value="Sửa">
                                    </form>
                                    <form action="controller.php" method="post">
                                        <input type='hidden' name='action' value='del_pro' />
                                        <input type="hidden" name="productkey" value="<?php echo $key ?>" />
                                        <input class="btn btn-danger" type="submit" value="Xóa">
                                    </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                    </table>
                </div>
            </from>
            <div style="width: 100%; display: inline-block;">
                <div style="float: right;">
                    <b>Tổng tiền:</b> <?php echo getSubtotal(); ?>
                </div>
            </div>
            <div style="width: 100%;">
                <div style="display: inline-flex; float: right; margin-left: 1%;">
                    <a href="?action=show_add_item" class="btn btn-warning"></i> Tiếp tục mua hàng</a>
                </div>
                <div style="display: inline-flex; float: right;">
                    <a href="?action=empty_cart" class="btn btn-danger">Xoá tất cả</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>