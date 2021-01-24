<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" type="text/css" href="../webbanxedap.View/css/style.css">
</head>
<body>
<div class="top-nav">
		<a href="#" class="top-nav" target="_self">
			<img class="top-nav" src="image/pin.png">
		</a>
		<a href="#" class="top-nav" target="_self">
			<img class="top-nav" src="image/facebook.png">
		</a>
		<a href="#" class="top-nav" target="_self">
			<img class="top-nav" src="image/instagram.png">
		</a>
		<a href="#" class="top-nav" target="_self">
			<img class="top-nav" src="image/linkedin.png">
		</a>
	</div>

	<div class="row">
	  	<div class="col-3 header">
			<a class="top-nav" href="./controller.php">
			  	<div class="logo">
					<img class="logo1" src="image/logo-non-bor-non-bg.png">
			  	</div>
		  	</a>
	  	</div>

	  	<div class="col-5 search" align="right">
		  	<form action="../webbanxedap.Controller/Controller.php" method="post">
				<input class="search" type="text" name="name_product" placeholder="Search for products..." required>
				<input type="hidden" name="action" value="search_name"/>  
				<button class="search" type="submit">
				<img src="image/search.png" height="15px"></button></input> 
			</form>
	  	</div>

	  	<div class="col-4 right-big hotline">
		  	<a href="#" target="_self"><img class="hotline" src="image/Untitled.png"></a>
		  	&nbsp;
		  	<a href="?action=show_cart" target="_self"><img class="top-nav" src="image/shopping-bag.png"></a>
			<a href="#" target="_self"><img class="top-nav" src="image/like.png"></a>
	  	</div>
		<script>
				function show_hide(){
					var click = document.getElementById("drop-content");
					if(click.style.display==="none"){
						click.style.display="block";
						}else{
						click.style.display="none";
					}
				}
				
				function show_hide1(){
					var click = document.getElementById("sub_menu_content");
					if(click.style.display==="none"){
						click.style.display="block";
						}else{
						click.style.display="none";
					}
				}
				
				function show_hide2(){
					var click = document.getElementById("sub_menu_content1");
					if(click.style.display==="none"){
						click.style.display="block";
						}else{
						click.style.display="none";
					}
				}
		</script>
	
	<div class="col-1 right-medium">
			<a href="#" target="_self"><img class="hotline" src="image/Untitled.png"></a>
		  	&nbsp;
		  	<a href="?action=show_cart" target="_self"><img class="top-nav1" src="image/shopping-bag.png"></a>
			<a href="#" target="_self"><img class="top-nav1" src="image/like.png"></a>
			<button onClick="show_hide()" class="menu button"><img class="logomenu" src="image/menu.png"></button>
			<div style="display: none;" id="drop-content">
				<div class="menu-dropdown" href="#">MENU</div>
					<a href="./controller.php">HOME</a>
				<div class="sub_menu">
					<a href="#">
							PRODUCT
							<button onClick="show_hide1()" class="menu-dropdown">
									<img class="menu-dropdown" src="image/add.png">
							</button>
							<div class="sub_menu_content" style="display: none;" id="sub_menu_content">Product
							   <a href="./controller.php?action=search_kind&product=xd">Xe đạp</a> 
								<a href="./controller.php?action=search_kind&product=pk">Phụ kiện</a>
								<a href="./controller.php?action=search_kind&product=pt">Phụ tùng</a>
			  				</div>
					</a>
				</div>
				   <a href="#">SALE</a>
				   <a href="#">NEWS</a>
					<div class="sub_menu1">
					<a href="#">
							PROMOTION
							<button onClick="show_hide2()" class="menu-dropdown">
									<img class="menu-dropdown" src="image/add.png">
							</button>
							<div class="sub_menu_content" style="display: none;" id="sub_menu_content1">Promotion
								<a href="#">Gift</a>
							   <a href="#">Event</a>
			  				</div>
					</a>
				</div>
					<a href="#">RECRUITMENT</a>
			</div>
	</div>
	<div class="col-1 right-small">
		<a href="?action=show-cart" target="_self"><img class="top-nav1" src="image/shopping-bag.png"></a>
		<a href="./" target="_self"><img class="top-nav1" src="image/like.png"></a>
		<div class="sub_menu_small">
			<button onClick="show_hide_small()" class="menu button"><img class="logomenu" src="image/menu.png"></button>
			<div style="display: none;" id="sub_menu_content_small">
				<div class="sub-menu-mall-title">MENU</div>
					   <a href="./controller.php">HOME</a>
					   <a href="./controller.php">
						   PRODUCT
						   <button onClick="show_hide1()" class="menu-dropdown">
									<img class="menu-dropdown" src="image/add.png">
							</button>
						</a>
					   <a href="#">SALE</a>
					   <a href="#">NEWS</a>
						<a href="#">
							PROMOTION
							<button onClick="show_hide1()" class="menu-dropdown">
									<img class="menu-dropdown" src="image/add.png">
							</button>
						</a>
					   <a href="#">RECRUITMENT</a>
						<a href="?action=show_cart">GIỎ HÀNG</a> 
				  </div>
			 </div>	
		</div>
		<script>
		function show_hide_small(){
			var click = document.getElementById("sub_menu_content_small");
			if(click.style.display==="none"){
				click.style.display="block";
			}else{
				click.style.display="none";
			}
		}
	</script>
	
	<div class="col-3 search-small" align="right">
			  <input class="search" type="search" placeholder="Search for products..."><button class="search" type="submit"><img src="image/search.png" height="15px"></button></input>
	</div>
	
	<div class="clear"></div>
</div>

	<div id="menu" class="sticky1">
		<ul class="menu">
			<li class="home"><a class="link-menu-dd-1" href="./controller.php" target="_self">HOME</a></li>
			<li class="product"><a class="link-menu-dd-1" href="./controller.php" target="_self">PRODUCT <i class="arrow down-1"></i></a>
				<ul class="product">
					<li class="shirts"><a class="link-menu-dd" href="./controller.php?action=search_kind&product=xd" target="_self">xe đạp<i class="arrow right"></i></a>
							<ul class="shirts">
								<li><a class="link-menu-dd" href="./controller.php?action=search_kind&product=xd" target="_self">GIANT</a></li>
								<li><a class="link-menu-dd" href="./controller.php?action=search_kind&product=xd" target="_self">FASTROAD</a></li>
								<li><a class="link-menu-dd" href="./controller.php?action=search_kind&product=xd" target="_self">LIFESPORT</a></li>
								<li><a class="link-menu-dd" href="./controller.php?action=search_kind&product=xd" target="_self">BALMITON</a></li>
								<li><a class="link-menu-dd" href="./controller.php?action=search_kind&product=xd" target="_self">TRINX</a></li>
								<li><a class="link-menu-dd" href="./controller.php?action=search_kind&product=xd" target="_self">PHONIX</a></li>
							</ul>
					</li>
					<li class="t-shirts"><a class="link-menu-dd" href="./controller.php?action=search_kind&product=pt" target="_self">phụ tùng<i class="arrow right"></i></a>
							<ul class="t-shirts">
								<li><a class="link-menu-dd" href="./controller.php?action=search_kind&product=pt" target="_self">GIANT</a></li>
								<li><a class="link-menu-dd" href="./controller.php?action=search_kind&product=pt" target="_self">PHONIX</a></li>
								<li><a class="link-menu-dd" href="./controller.php?action=search_kind&product=pt" target="_self">TRINX</a></li>
								<li><a class="link-menu-dd" href="./controller.php?action=search_kind&product=pt" target="_self">BALMITON</a></li>
							</ul>
					</li>
					<li class="pants"><a class="link-menu-dd" href="./controller.php?action=search_kind&product=pk" target="_self">phụ kiện<i class="arrow right"></i></a>
							<ul class="pants">
								<li><a class="link-menu-dd" href="./controller.php?action=search_kind&product=pk" target="_self">GIANT</a></li>
								<li><a class="link-menu-dd" href="./controller.php?action=search_kind&product=pk" target="_self">PHONIX</a></li>
								<li><a class="link-menu-dd" href="./controller.php?action=search_kind&product=pk" target="_self">TRINX</a></li>
								<li><a class="link-menu-dd" href="./controller.php?action=search_kind&product=pk" target="_self">BALMITON</a></li>
							</ul>
					</li>
				</ul>
			</li>
			<li class="sale"><a class="link-menu-dd-1" href="#" target="_self">SALE</a></li>
			<li class="news"><a class="link-menu-dd-1" href="#" target="_self">NEWS</a></li>
			<li class="promotion"><a class="link-menu-dd-1" href="#" target="_self">PROMOTION<i class="arrow down-2"></i></a>
				<ul class="promotion">
					<li class="gifts"><a class="link-menu-dd" href="#" target="_self">Gifts</a></li>
					<li class="events"><a class="link-menu-dd" href="#" target="_self">Events</a></li>
				</ul>
			</li>
			<li class="recruitment"><a class="link-menu-dd-1" href="#" target="_self">RECRUITMENT</a>
				<ul class="recruitment">
					<li class="events"><a class="link-menu-dd" href="#" target="_self">News</a></li>
				</ul>
			</li>
		</ul>
	</div>

	</div>
	<div class="col-12 local">
		<a class="link" href="#" target=""><?php echo $_SESSION['location']?>
	</div>
</body>
</html>