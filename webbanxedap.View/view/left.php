<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Left</title>
	<link rel="stylesheet" type="text/css" href="../webbanxedap.View/css/style.css">
</head>
<body>
<div class="row">
		<div class="col-3 danhmuc">
			<div class="danhmuc-chitiet">
				<p class="product">PRODUCT</p>
				<hr color="#7C7C7C" size="1px">
				<a class="link-danhmuc-chitiet" href="./controller.php?action=search_kind&product=xd" target="_self"><p class="transform"><img src="image/triangle.png" width="10px"> Xe đạp <br></a>
				<hr width="95%" size="1px" color="#CCCCCC">
				<a class="link-danhmuc-chitiet" href="./controller.php?action=search_kind&product=pt" target="_self"><p class="transform"><img src="image/triangle.png" width="10px"> Phụ tùng <br></a>
				<hr width="95%" size="1px" color="#CCCCCC">
				<a class="link-danhmuc-chitiet" href="./controller.php?action=search_kind&product=pk" target="_self"><p class="transform"><img src="image/triangle.png" width="10px"> Phụ kiện <br></a>
				<hr width="95%" size="1px" color="#CCCCCC">
			</div>
			<div class="price">
				<p class="price">PRICE</p>
				<hr width="100%" size="1px" color="#7C7C7C">
				<form id='price' class="chitiet-gia">
					<br>
					<a class="link-danhmuc-chitiet" href="../webbanxedap.controller/controller.php?action=search_price&min_price=0&max_price=1000000000" target="_self">
						<div class="container">&nbsp;&nbsp;tất cả
							<input id="0" type="checkbox">
							<span class="checkmark"></span>
						</div>
					</a>
					<a class="link-danhmuc-chitiet" href="../webbanxedap.controller/controller.php?action=search_price&min_price=50000&max_price=990000" target="_self">
						<div class="container">&nbsp;50.000đ - 990.000đ
							<input id="50000" type="checkbox">
							<span class="checkmark"></span>
						</div>
					</a>	
					<a class="link-danhmuc-chitiet" href="../webbanxedap.controller/controller.php?action=search_price&min_price=1000000&max_price=4990000" target="_self">
						<div class="container">&nbsp;1.000.000đ - 4.990.000đ
					  		<input id="1000000" type="checkbox">
					  		<span class="checkmark"></span>
						</div>
					</a>
					<a class="link-danhmuc-chitiet" href="../webbanxedap.controller/controller.php?action=search_price&min_price=5000000&max_price=9990000" target="_self">
						<div class="container">&nbsp;5.000.000đ - 9.990.000đ
					  		<input id="5000000" type="checkbox">
					  		<span class="checkmark"></span>
						</div>
					</a>
					<a class="link-danhmuc-chitiet" href="../webbanxedap.controller/controller.php?action=search_price&min_price=10000000&max_price=14990000" target="_self">
						<div class="container">&nbsp;10.000.000đ - 14.990.000đ
					  		<input id="10000000" type="checkbox">
					  		<span class="checkmark"></span>
						</div>
					</a>
					<a class="link-danhmuc-chitiet" href="../webbanxedap.controller/controller.php?action=search_price&min_price=15000000&max_price=19990000" target="_self">
						<div class="container">&nbsp;15.000.000đ - 19.990.000đ
					  		<input id="15000000" type="checkbox">
					  		<span class="checkmark"></span>
						</div>
					</a>
					<a class="link-danhmuc-chitiet" href="../webbanxedap.controller/controller.php?action=search_price&min_price=20000000&max_price=49990000" target="_self">
						<div class="container">&nbsp;20.000.000đ - 49.990.000đ
					  		<input id="20000000" type="checkbox">
					  		<span class="checkmark"></span>
						</div>
					</a>
				</form>
			</div>
			<div class="price">
				<p class="price">COLOR</p>
				<hr width="100%" size="1px" color="#7C7C7C">
				<br>
				<form id='color' class="chitiet-gia">
					<a class="link-danhmuc-chitiet" href="../webbanxedap.controller/controller.php?action=search_color&color_product=all" target="_self">
						<div class="container">&nbsp;&nbsp;tất cả
					  		<input id="all_color" type="checkbox">
					  		<span class="checkmark"></span>
						</div>
					</a>
					<a class="link-danhmuc-chitiet" href="../webbanxedap.controller/controller.php?action=search_color&color_product=đen" target="_self">
						<div class="container">&nbsp;&nbsp;Đen
					  		<input id="đen" type="checkbox">
					  		<span class="checkmark"></span>
						</div>
					</a>
					<a class="link-danhmuc-chitiet" href="../webbanxedap.controller/controller.php?action=search_color&color_product=trắng" target="_self">
						<div class="container">&nbsp;&nbsp;Trắng
					  		<input id="trắng" type="checkbox">
					  		<span class="checkmark"></span>
						</div>
					</a>
					<a class="link-danhmuc-chitiet" href="../webbanxedap.controller/controller.php?action=search_color&color_product=đỏ" target="_self">
						<div class="container">&nbsp;&nbsp;Đỏ
					  		<input id="đỏ" type="checkbox">
					  		<span class="checkmark"></span>
						</div>
					</a>
				</form>
			</div>
			<div class="price">
				<p class="price">YEAR</p>
				<hr width="100%" size="1px" color="#7C7C7C">
				<br>
				<form id='year' class="chitiet-gia">
					<a class="link-danhmuc-chitiet" href="../webbanxedap.controller/controller.php?action=search_year&year_product=all" target="_self">
						<div class="container">&nbsp;&nbsp;tất cả
					  		<input id="all_year" type="checkbox">
					  		<span class="checkmark"></span>
						</div>
					</a>
					<a class="link-danhmuc-chitiet" href="../webbanxedap.controller/controller.php?action=search_year&year_product=2015" target="_self">
						<div class="container">&nbsp;&nbsp;2015
					  		<input id="2015" type="checkbox">
					  		<span class="checkmark"></span>
						</div>
					</a>
					<a class="link-danhmuc-chitiet" href="../webbanxedap.controller/controller.php?action=search_year&year_product=2016" target="_self">
						<div class="container">&nbsp;&nbsp;2016
					  		<input id="2016" type="checkbox">
					  		<span class="checkmark"></span>
						</div>
					</a>
					<a class="link-danhmuc-chitiet" href="../webbanxedap.controller/controller.php?action=search_year&year_product=2017" target="_self">
						<div class="container">&nbsp;&nbsp;2017
					  		<input id="2017" type="checkbox">
					  		<span class="checkmark"></span>
						</div>
					</a>
					<a class="link-danhmuc-chitiet" href="../webbanxedap.controller/controller.php?action=search_year&year_product=2018" target="_self">
						<div class="container">&nbsp;&nbsp;2018
					  		<input id="2018" type="checkbox">
					  		<span class="checkmark"></span>
						</div>
					</a>
					<a class="link-danhmuc-chitiet" href="../webbanxedap.controller/controller.php?action=search_year&year_product=2019" target="_self">
						<div class="container">&nbsp;&nbsp;2019
					  		<input id="2019" type="checkbox">
					  		<span class="checkmark"></span>
						</div>
					</a>
					<a class="link-danhmuc-chitiet" href="../webbanxedap.controller/controller.php?action=search_year&year_product=2020" target="_self">
						<div class="container">&nbsp;&nbsp;2020
					  		<input id="2020" type="checkbox">
					  		<span class="checkmark"></span>
						</div>
					</a>
				</form>
			</div>
		</div>
		<script>
			<?php 
				if(!isset($_SESSION['year_product'])){
					$_SESSION['year_product']='all';
				}
				if(!isset($_SESSION['color_product'])){
					$_SESSION['color_product']='all';
				}
				if(!isset($_SESSION['min_price'])){
					$_SESSION['min_price']=0;
				}
			?>
			
			if('<?php echo $_SESSION['year_product']?>'=='all'){
				document.getElementById('all_year').checked=true;
			}
			else{
				document.getElementById('<?php echo $_SESSION['year_product']?>').checked=true;
			}
			if('<?php echo $_SESSION['color_product']?>'=='all'){
				document.getElementById('all_color').checked=true;
			}
			else{
				document.getElementById('<?php echo $_SESSION['color_product']?>').checked=true;
			}
			if('<?php echo $_SESSION['min_price']?>'=='0'){
				document.getElementById('0').checked=true;
			}
			else{
				document.getElementById('<?php echo $_SESSION['min_price']?>').checked=true;
			}
			
			
			
		</script>
</body>
</html>