<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content_Type" content="text/html; charset=UTF-8">
    <title>Order</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../webbanxedap.View/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .input-info {
            width: 30%;
        }

        @media only screen and (max-width: 800px) {
            .input-info {
                width: 50%;
            }
        }

        @media only screen and (max-width: 400px) {
            .input-info {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <h2 style="margin-left: 5%; font-weight: 600;">Thông tin khách hàng</h2>
    <form action="" onsubmit="Validate()" method="post">
        <div class="row" style="border: 1px black; margin: 0 5%;">
            <div style="width:100%;">
                <label for="ten">Tên:</label>
                <input type="text" class="form-control input-info" id="ten" placeholder="Tên khách hàng" name="ten">
            </div>
            <div style="width:100%;">
                <label for="dc">Địa chỉ:</label>
                <textarea class="form-control input-info" id="dc" placeholder="Địa chỉ" name="dc"></textarea>
            </div>
            <div style="width:100%;">
                <label for="sdt">Số điện thoại:</label>
                <input type="text" class="form-control input-info" id="sdt" placeholder="Số điện thoại" name="sdt">
            </div>


            <script>
                function checkname(event) {
                    var tname = document.getElementById('ten').value;
                    var name = /^(?=.*[A-Za-z])$/;

                    if (tname == '') {
                        document.getElementById('ten').style.backgroundColor = '#04a08c';
                        alert('Bạn chưa nhập tên');
                    }
                    if (!tname == name) {
                        document.getElementById('ten').style.backgroundColor = '#04a08c';
                        alert('Bạn chỉ nhập được ký tự');
                    }
                    return 1;
                }

                function Checksdt(event)

                {
                    event.preventDefault();
                    var letter = /((09|03|07|08|05)+([0-9]{8})\b)/g;
                    var sdt = document.getElementById('sdt').value;
                    if (sdt == '') {
                        document.getElementById('sdt').style.backgroundColor = '#04a08c';
                        alert('sdt ko được để trống ');
                    } else if (!sdt.match(letter)) {
                        document.getElementById('sdt').style.backgroundColor = '#04a08c';
                        alert('sdt nhập sai định dạng');
                    }
                    return 1;
                }

                function Validate() {
                    checkname(event);
                    Checksdt(event);
                }
            </script>
            <br>
            <div>
                <a>Ngày Lập:</a>
                <p id="hvn"></p>
            </div>
            <script>
                var today = new Date();
                var date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
                var time = today.getHours() + ":" + today.getMinutes();
                var dateTime = time + '  ' + date;

                document.getElementById("hvn").innerHTML = dateTime;
            </script>
            <div>
                <from action="" method="post">
                    <input type="hidden" name="action" value="order" />
                    <table id="cart" class="table table-hover table-condensed">
                        <tr>
                            <th style="width:17%">mã sản phẩm</th>
                            <th style="width:40%">Tên Sản Phẩm</th>
                            <th style="width:13%">Giá Bán</th>
                            <th style="width:8%">Số Lượng</th>
                            <th style="width:22%" class="text-center">Thành tiền</th>
                        </tr>
                        <?php
                        foreach ($_SESSION['cart'] as $key => $item) :
                            $cost = number_format($item['cost']);
                            $total = number_format($item['total']);
                        ?>
                            <tr>
                                <td>
                                    <?php echo $key; ?>
                                <td>
                                    <?php echo $item['name']; ?>
                                </td>
                                <td>
                                    <?php echo $cost . "đ" ?>
                                </td>
                                <td>
                                    <?php echo $item['qty']; ?>
                                </td>
                                <td>
                                    <div style="text-align: center;"><?php echo $total . "đ"; ?></div>
                                </td>

                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </table>
                </from>
            </div>
            <div style="width:100%; padding-right: 5%;">
                <div style="width: 100%;">
                    <p style="float: right;"><?php echo ' ' . getSubtotal() . 'đ'; ?></p>
                    <b style="float: right;">Tổng tiền:</b>
                </div>
            </div>
            <br><br>
            <div style="width:100%; padding-right: 5%;">
                <input style="float: right;" type="submit" id="submit" class="btn btn-primary" value="In Hóa Đơn">
            </div>
        </div>
    </form>
</body>

</html>