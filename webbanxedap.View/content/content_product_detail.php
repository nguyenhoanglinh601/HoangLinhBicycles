<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content</title>
	<link rel="stylesheet" type="text/css" href="../webbanxedap.View/css/style.css">
	<style>
		.tab {
  			overflow: hidden;
  			border: 1px solid #ccc;
  			background-color: #f1f1f1;
		}
		.tab button {
			background-color: inherit;
			width:25%;
			float: left;
			border: none;
			outline: none;
			cursor: pointer;
			padding: 14px 16px;
			transition: 0.3s;
			font-size: 17px;
		}
		.tab button:hover {
			background-color: #ddd;
		}
		.tab button.active {
  			background-color: #ccc;
		}
		.tabcontent {
			display: none;
			padding: 6px 12px;
			border: 1px solid #ccc;
			border-top: none;
		}
		th,td{
			border: 1px solid;
		}
		input.addCart{
			border: 0px; 
			width:60%; 
			height: 40px; 
			font-size: 20px; 
			background: #cc0000; 
			color: white;
		}
		input.addCart:hover{
			background-color: #ff3300;
		}
		input.buy{
			border: 0px; 
			width:81.5%; 
			height: 40px; 
			font-size: 20px; 
			background: #000066; 
			color: white;
		}
		input.buy:hover{
			background: #0000cc;
		}
		div.image_product{
			width: 55%;
			float:left; 
			height: 450px;
			background-size: cover; 
			background-position:center;
		}
		div.col-4{
			width: 30%;
			margin: 0;
			padding: 0;
		}
		@media only screen and (max-width: 1000px) {
			div.col-4{
				width: 100%;
				margin: 0;
				padding: 0;
			}
			div.image_product{
				width: 400px;
				float:left; 
				height: 300px;
				background-size: cover; 
				background-position:center;
			}
		}
		@media only screen and (max-width: 750px) {
			div.image_product{
				width: 350px;
				float:left; 
				height: 250px;
				background-size: cover; 
				background-position:center;
			}
		}
	</style>
	<script>
		function openCity(evt, Name) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(Name).style.display = "block";
			evt.currentTarget.className += " active";
			}
	</script>
	
</head>
<body>
	<?php
		include_once "../webbanxedap.Model/Product.php";
		include_once "../webbanxedap.Model/Connect.php";
		$id=$_SESSION["IdProduct"];
		$pro=new product();
		$result=$pro->getProductById($id);
	?>	
	<div class="col-9" id="luoi-sanpham" >
		<div class="row">
			<div class="image_product" style="background-image: url('../Webbanxedap.view/image/product/<?php echo $result['hinhanh']?>');">
			</div>
			<div class="col-4" style="margin: 5% 0% 0% 0%; float:left; text-align: center;">
				<div style="width: 100%; margin: 0% 0% 0% 2%; font-size: 35px; font-weight: 600;"><?php echo $result['tensp']?></div>
				<br>
				<div>
					<p style="font-size: 30px;" class="giam-gia"><?php echo $pro->getPrice($result['giaban'])?>đ</p><br>  
					<b style="font-size: 40px; color: red;">
						<?php echo $pro->getPriceDiscount($result['giaban'])?>đ
					</b>
				</div>
				<div style="margin-top:5%; line-height: 60px;">
					<form action="controller.php" method="post">
						<input type='hidden' name='action' value='add_cart'/>
						<input type="hidden" name="productkey" value="<?php echo $id?>"/>
						<input style="width: 20%; height: 40px; text-align: center; font-size: 20px;" type="number" name="quantity" value="1"/>
						<input class="buy" type="submit" value="Mua ngay">
					</form>
				</div>
			</div>
			<div style="margin-top: 2%; width: 100%; float:left;">
				<div class="tab">
					<button class="tablinks" onclick="openCity(event, 'ThongTin')" id="defaultOpen"><b>THÔNG TIN SẢN PHẨM</b></button>
					<button class="tablinks" onclick="openCity(event, 'ChinhSach')"><b>CHÍNH SÁCH</b></button>
					<button class="tablinks" onclick="openCity(event, 'TraGop')"><b>MUA TRẢ GÓP</b></button>
					<button class="tablinks" onclick="openCity(event, 'ThanhToan')"><b>THANH TOÁN</b></button>
				</div>
				
				<div style="font-size: 20px;" id="ThongTin" class="tabcontent">
						Hãng sản xuất: <b><?php echo $result['thuonghieu']?></b><br>
						Mã sản phẩm: <b><?php echo $result['masp']?></b><br>
						Tên sản phẩm: <b><?php echo $result['tensp']?></b><br>
						Bảo hành: <b>1 năm chính hãng</b><br>
						Tình trạng: <b>Brand New 100%</b><br>
						Bán tại hệ thống: <b>GOLDEN CYCLE & Hệ thống website TMDT</b><br>
						Kèm theo: <b>Hóa đơn, phiếu bảo hành, hướng dẫn sử dụng</b><br>
						Số lượng còn: <b><?php echo $result['soluongton']?></b><br>
						Sản phẩm có tại: <b>45 Lê Trọng Tấn, Quận Tân Phú, TP.Hồ Chí Minh</b><br>
						Mở cửa: <b>8h-20h (T2-CN)</b><br>
						HotLine: <b style="color: red; font-size: 30px;">0969076447</b>
				</div>

				<div id="ChinhSach" class="tabcontent">
					<div><?php include "../Webbanxedap.view/other/chinhsach.html"?></div>
				</div>

				<div id="TraGop" class="tabcontent">
					<div style="width: 20%; float:left; line-height: 25px; text-align: left;">
						<b>Quý khách vui lòng chọn % Trả trước:</b><br>
						Tổng số tiền xe:<br>
						Số tiền trả trước:<br>
						Số tiền còn lại:<br>
						Lãi suất:<br>
					</div>
					<div  style="width: 60%; float: left; line-height: 25px;">
						<?php 
							if($result['giaban']<=100000)	$set=$result['giaban']-30000;
							elseif( $result['giaban']>100000 && $result['giaban']<=500000) $set=$result['giaban']-50000;
							elseif( $result['giaban']>500000 && $result['giaban']<=1000000) $set=$result['giaban']-100000;
							elseif( $result['giaban']>1000000) $set=$result['giaban']-300000;
						?>
						<br>
						<input id="phan-tram-tra-truoc" type="number" value="10" onchange="tinhTienTraTruoc(),soTienConLai()">%<br>
						<input type="text" value="<?php echo $set?>" readonly>đ<br>
						<input id="so-tien-tra-truoc" type="text" value="" readonly>đ<br>
						<input id="so-tien-con-lai" type="text" value="" readonly>đ<br>
						<input id="lai-suat" type="text" value="1.48" readonly>%<br>
					</div>
						<table style="border: 1px solid; margin-top: 15%; width:100%; text-align: center; line-height: 30px;" cellspacing="0" cellpadding="0">
							<tr>
								<th></th>
								<th>6 tháng</th>
								<th>9 tháng</th>
								<th>12 tháng</th>
							</tr>
							<tr>
								<td>Tổng số tiền</td>
								<td><?php echo $set?></td>
								<td><?php echo $set?></td>
								<td><?php echo $set?></td>
							</tr>
							<tr>
								<td>Trả trước</td>
								<td class="tra-truoc"></td>
								<td class="tra-truoc"></td>
								<td class="tra-truoc"></td>
							</tr>
							<tr>
								<td>Còn lại</td>
								<td class="con-lai"></td>
								<td class="con-lai"></td>
								<td class="con-lai"></td>
							</tr>
							<tr>
								<td>Lãi hàng tháng</td>
								<td class="tien-lai"></td>
								<td class="tien-lai"></td>
								<td class="tien-lai"></td>
							</tr>
							<tr>
								<td>Trả hàng tháng</td>
								<td class="tien-hang-thang"></td>
								<td class="tien-hang-thang"></td>
								<td class="tien-hang-thang"></td>
							</tr>
							<tr>
								<td>Tổng tiền trả</td>
								<td class="tong-tien"></td>
								<td class="tong-tien"></td>
								<td class="tong-tien"></td>
							</tr>
						</table>
				</div>

				<div id="ThanhToan" class="tabcontent">
					<div><?php include "../Webbanxedap.view/other/thanhtoan.html"?></div>
				</div>
			</div>
		</div>
	</div>
	<script>
		var phantram=document.getElementById("phan-tram-tra-truoc").value;
		document.getElementById("so-tien-tra-truoc").value=(phantram/100)*<?php echo $set?>;
		var mangTraTruoc=document.getElementsByClassName("tra-truoc");
		for(var i=0;i<3;i++){
			mangTraTruoc[i].innerHTML=parseInt((phantram/100)*<?php echo $set?>);
		}
		function tinhTienTraTruoc(){
			var phantram=document.getElementById("phan-tram-tra-truoc").value;
			document.getElementById("so-tien-tra-truoc").value=(phantram/100)*<?php echo $set?>;
			var mangTraTruoc=document.getElementsByClassName("tra-truoc");
			for(var i=0;i<3;i++){
				mangTraTruoc[i].innerHTML=parseInt((phantram/100)*<?php echo $set?>);
			}
		}
		
		var sotien=document.getElementById("so-tien-tra-truoc").value;
		document.getElementById("so-tien-con-lai").value=<?php echo $set?>-sotien;
		var mangConLai=document.getElementsByClassName("con-lai");
		var mangTienLai=document.getElementsByClassName("tien-lai");
		var mangTienHangThang=document.getElementsByClassName("tien-hang-thang");
		var mangTongTien=document.getElementsByClassName("tong-tien");
		var j=6;
		for(var i=0;i<3;i++){
			mangConLai[i].innerHTML=<?php echo $set?>-sotien;
			mangTienLai[i].innerHTML=parseInt(mangConLai[i].innerHTML*(1.48/100));
			mangTienHangThang[i].innerHTML=parseInt(mangTienLai[i].innerHTML)+parseInt(mangConLai[i].innerHTML/j);
			mangTongTien[i].innerHTML=parseInt(mangTienHangThang[i].innerHTML*j)+parseInt(mangTraTruoc[i].innerHTML);
			j=j+3;
		}
		function soTienConLai(){
			var sotien=document.getElementById("so-tien-tra-truoc").value;
			document.getElementById("so-tien-con-lai").value=<?php echo $set?>-sotien;
			var j=6;
			for(var i=0;i<3;i++){
				mangConLai[i].innerHTML=<?php echo $set?>-sotien;
				mangTienLai[i].innerHTML=parseInt(mangConLai[i].innerHTML*(1.48/100));
				mangTienHangThang[i].innerHTML=parseInt(mangTienLai[i].innerHTML)+parseInt(mangConLai[i].innerHTML/j);
				mangTongTien[i].innerHTML=parseInt(mangTienHangThang[i].innerHTML*j)+parseInt(mangTraTruoc[i].innerHTML);
				j=j+3;
			}
		}

		document.getElementById("defaultOpen").click();
	</script>
</body>
</html>