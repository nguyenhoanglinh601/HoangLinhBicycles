<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content</title>
	<link rel="stylesheet" type="text/css" href="../webbanxedap.View/css/style.css">
	<style>
		input.addCart:hover{
			background: linear-gradient(to bottom right, #66ffff 0%, #336699 100%);
		}
		input.buy{
			border: 0px; 
			width:81.5%; 
			height: 30px; 
			font-size: 20px; 
			background: #000066; 
			color: white;
		}
		input.buy:hover{
			background: #0000cc;
		}
		div.o-trang-sanpham-truocsau{
			width: 120px;
			height: 30px;
			font-size: 16px;
			border: 1px solid #6B6B6B;
			border-radius: 5px;
			text-align: center;
			line-height: 30px;
			background: #FFFFFF;
			color: #000000;
			float: right;
			margin: 1px;
		}
		div.o-trang-sanpham-truocsau:hover{
			background: #4A4A4A;
			color: #FFFFFF;
			border: #4A4A4A;
		}
		p.name_product{
			overflow: hidden;
			text-overflow: ellipsis;
			white-space: nowrap;
			width: 100%;
			font-size: 20px;
		}
	</style>
</head>
<body>
	<div class="col-9" id="luoi-sanpham">
        <?php
			include_once "../webbanxedap.Model/Product.php";
			$pro= new product();
			$j=1;
			
			$limitProductOnPage=12;

			if(isset($_SESSION['page'])){
				$current_page=$_SESSION['page'];
			}
			else{
				$current_page=1;
			}

			if(isset($_SESSION['product'])){
				$kind_product=$_SESSION['product'];
			}
			else{
				$kind_product="";
			}

			if(isset($_SESSION['name_product'])){
				$name_product=$_SESSION['name_product'];
			}
			else{
				$name_product="";
			}

			if(isset($_SESSION['min_price']) || isset($_SESSION['max_price'])){
				if(isset($_SESSION['min_price'])){
					$min_price=$_SESSION['min_price'];;
				}
				else{
					$min_price=0;
				}

				if(isset($_SESSION['max_price'])){
					$max_price=$_SESSION['max_price'];;
				}
				else{
					$max_price=100000000;
				}
			}
			else{
				$min_price=0;
				$max_price=100000000;
			}

			if(isset($_SESSION['color_product'])){
				if($_SESSION['color_product']=='all'){
					$color_product="";
				}
				else{
					$color_product=$_SESSION['color_product'];
				};
			}
			else{
				$color_product="";
			}

			if(isset($_SESSION['year_product'])){
				if($_SESSION['year_product']=='all'){
					$year_product="";
				}
				else{
					$year_product=$_SESSION['year_product'];
				}
			}
			else{
				$year_product="";
			}

			$resultTotalProduct=$pro->getTotalProduct($kind_product,$name_product,$min_price,$max_price,$color_product,$year_product);

			$total_product=$resultTotalProduct['total'];

			$total_page=ceil($total_product/$limitProductOnPage);

			if($current_page>$total_page){
				$current_page=$total_page;
			}
			else if($current_page<1){
				$current_page=1;
			}

			$start_product_on_page=($current_page-1)*$limitProductOnPage;

			$result=$pro->getListProduct($kind_product,$name_product,$min_price,$max_price,$color_product, $year_product,$start_product_on_page, $limitProductOnPage);
		?>
		<div class="row">
			<?php
				if($total_product==0){
					echo "không tìm thấy sản phẩm";
					exit;
				}	
				while($set=$result->fetch()):
			?>
			<div class="col-3" id="sanpham" style="text-align: center;">
				<a class="ten-san-pham" href="../webbanxedap.Controller/controller.php?action=view_product_detail&IdProduct=<?php echo $set['masp']?>" target="_blank">
					<img class="san-pham" src="../Webbanxedap.view/image/product/<?php echo $set['hinhanh']?>">
					<div class="ten-san-pham">
						<p class="name_product"><?php echo $set['tensp']?></p<br>
						<p class="giam-gia"><?php echo $pro->getPrice($set['giaban']) ?>đ</p> 
						<b style="color:red; font-size: 22px;"><?php echo $pro->getPriceDiscount($set['giaban'])?>đ</b>
					</div>
				</a>
				<form action="controller.php" method="post">
					<input type='hidden' name='action' value='add_cart'/>
					<input type="hidden" name="productkey" value="<?php echo $set['masp']?>"/>
					<input type="hidden" name="quantity" value="<?php echo 1 ?>"/>
					<input class="buy" type="submit" value="Mua hàng">
				</form>
			</div>
			<?php
				if($j%3==0){
					echo "</div>";
					echo "<div class=\"row\">";
				}
				$j++;
				endwhile;
        	?>
		</div>
		<div>
		<div class="danhsach-trang-sanpham-ngoai">
			<?php
				if ($current_page < $total_page && $total_page > 1){
					echo '<a class="o-trang-sanpham" href="../webbanxedap.controller/controller.php?action=more&page='.($current_page+1).'">
							<div class="o-trang-sanpham-truocsau">trang sau</div>
						</a>';
				}

				for ($i = $current_page+1; $i >= $current_page-1; $i--){
					if ($i >= 1 && $i<= $total_page){
						if ($i == $current_page){
							echo '<a class="o-trang-sanpham" href="../webbanxedap.controller/controller.php?action=more&page='.$i.'" target="_self">
									<div class="o-trang-sanpham">'.$i.'</div>
								</a>';
						}
						else{
							echo '<a class="o-trang-sanpham" href="../webbanxedap.controller/controller.php?action=more&page='.$i.'" target="_self">
									<div class="o-trang-sanpham-none">'.$i.'</div>
								</a>';
						}
					}
				}
				
				if ($current_page > 1 && $total_page > 1){
					echo '<a class="o-trang-sanpham" href="../webbanxedap.controller/controller.php?action=more&page='.($current_page-1).'">
					<div class="o-trang-sanpham-truocsau">trang trước</div>
					</a>';
				}
			?>
		</div>
		</div>
	</div>
</body>
</html>