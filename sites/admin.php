<html>
<head>
	<title>Prze-gry.wy</title>
	<link rel="Shortcut icon" href="../img/icons/icon.ico" />

	<meta http-equiv="content-type" content="text/php"; charset="UTF-8"/> 
	<meta name="keywords" content="firma,Damian Jamroży, Rafał Iwańczyk, prze-gry, prze-gry.wy, gry, zakupy internetowe, web designer,">
	<meta name="description" content="Prze-gry.wy to firma założona przez 2 osoby o ogromnej pasji do gier cyfrowych. U nas znajdziesz najlepsze tytuły w najlepszych cenach!">
	<link rel="stylesheet" href="../style/bootstrap.min.css">
	<link rel="stylesheet" href="../style/style.css" type="text/css" />
	<link rel="stylesheet" href="../style/style_admin.css" type="text/css" />
	<?php
		session_start();
		if(!isset($_SESSION['zalogowany']) || $_SESSION['admin'] != 1){
			echo ('<script>alert("Nie jesteś zalogowany. \nAby zarządzać zamówieniami, zaloguj się na swoje konto administracyjne"); window.location = "login.php";</script>');
		}
		include('../php/edit_user.php');
		include('../php/root.php');
		$_SESSION['i']=0;
	?>


</head>
<body>
	<div id="header">
		<div id="left_head">
			<div id="left_ban"><a href="../Index.php"><img src="../img/Logo-project2.png"  id="log"></a></div>
			<b><a href="admin.php"><div class="side_right active_men" id="admin_panel"> <center><img class="icon_hed" src="../img/icon/price.png" width="25%"><br><br>ADMIN PANEL</center></div></a>
			<b><a href="user_account.php"><div class="side_right" id="client_panel"> <center><img class="icon_hed" src="../img/icon/client.png" width="25%"><br><br>MOJE KONTO</center></div></a>
			
			
		</div>
		
		<div id="right_head">
			<a href="me.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/me.png" width="25%"><br><br>O SKLEPIE</center></div></a>
			<a href="../Index.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/home.png" width="25%"><br><br>HOME</center></div></a>
			<a href="contact.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/phone.png" width="25%"><br><br>KONTAKT</center></div></a>
			<a href="brand.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/game.png" width="25%"><br><br>PRODUKTY</center></div></a>
			<a href="bucket.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/bucket.png" width="25%"><br><br>KOSZYK</center></div></a>
			<div class="side_btn" id="Login"><a href="login.php"><center><button class="btn">ZALOGUJ SIĘ</button> </center></a></div>
			<div class="side_btn" id="Logout"><a href="../php/wylogowanie.php"><center><button class="btn">Wyloguj SIĘ</button> </center></a></div>

		</div>
		
	</div>
	<div id="iter">
	
	</div>
	<div id="left_bar" class="left_bar div1">
		<?php 
			$login = $_SESSION['login'];
			$result2 = $database->query("SELECT upload FROM avatary A INNER JOIN uzytkownicy U ON U.id_avatar=A.id_avatar WHERE U.login = '$login'"); 
			if($result2->num_rows > 0){ 
				while($row = $result2->fetch_assoc()){
					print_r("<img class='avatars' style='height:15%;' src='data:image/jpg;charset=utf8;base64," .base64_encode($row['upload'])."'>"); 
				}
			}
			print_r("<br>$login<br><br><br>"); 
		?>
		<b>
		<a href="#" onclick="show_hide_game()"><div id="sub_menu">
			<h3>GRY</h3>
		</div></a>
			<a href="#" onclick="show_hide_options_game()"><div class="sub_menu_hidden_game" id="g1">
				Gry
			</div></a>
				<a href="#" onclick="show_games_add()"><div class="sub_menu_hidden_game_options" id="g1_1">
					Dodaj
				</div></a>
				<a href="#" onclick="show_games_edit()"><div class="sub_menu_hidden_game_options" id="g1_2">
					Edytuj
				</div></a>
				<a href="#" onclick="show_games_delete()"><div class="sub_menu_hidden_game_options" id="g1_3">
					Usuń
					<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'></div>
				</div></a>
				
			
			
			<a href="#" onclick="show_wydawcy()"><div class="sub_menu_hidden_game" id="g2">
				Wydawcy
			</div></a>
			<a href="#" onclick="show_studio()"><div class="sub_menu_hidden_game" id="g3">
				Studia
			</div></a>
			<a href="#" onclick="show_edition()"><div class="sub_menu_hidden_game" id="g4">
				Edycje
			</div></a>
			<a href="#" onclick="show_version()"><div class="sub_menu_hidden_game" id="g5">
				Wersje
			</div></a>
			<a href="#" onclick="show_supplies()"><div class="sub_menu_hidden_game" id="g6">
				Uzupełnij asortyment
				<hr>
			</div></a>
		
		
		<a href="#" onclick="show_hide_orders_men()"><div id="sub_menu">
			<h3>ZAMÓWIENIA</h3>
		</div></a>
			<a href="#" onclick="show_order_cd()"><div class="sub_menu_hidden_game" id="o1">
				CD-KEY
			</div></a>
			<a href="#" onclick="show_order_shop()"><div class="sub_menu_hidden_game" id="o2">
				Sklep
			</div></a>
			<a href="#" onclick="show_order_delivery()"><div class="sub_menu_hidden_game" id="o3">
				Dostawa
			</div></a>
			<a href="#" onclick="show_order_archives()"><div class="sub_menu_hidden_game" id="o4">
				Archiwum
				<hr>
			</div></a>
		<a href="#" onclick="show_messenger()"><div id="sub_menu">
			<h3>MESSENGER</h3>
		</div></a>
		<a href="#" onclick="show_user()"><div id="sub_menu">
			<h3>UŻYTKOWNICY</h3>
		</div></a>
		
		
	</div>
	
	<div class="men x1" id="men" onclick="myFunction(this)">
	  <div class="bar1"></div>
	  <div class="bar2"></div>
	  <div class="bar3"></div>
	</div>
	
	
	<div id="content" class="c1">
		<div id="container">
		<!--  -->
			<iframe id="testimonials" name="testimonials" src="admin/admin_content.php" allowtransparency="true" onload="this.style.height=(this.contentDocument.body.scrollHeight+45);" scrolling="no" style="width:126%;border:none;margin-left:-15%;margin-right:-30%;"></iframe>
	
		</div>
	</div>
	

</body>
<?php
	include('../php/sprawdzanie_sesji.php');
	include('../php/root.php');
?>

<script>
	let container = document.getElementById("container");
	let left_bar = document.getElementById("left_bar");
	let men = document.getElementById("men");
	let content = document.getElementById("content");
	let g1 = document.getElementById("g1");
	let g2 = document.getElementById("g2");
	let g3 = document.getElementById("g3");
	let g4 = document.getElementById("g4");
	let g5 = document.getElementById("g5");
	let g6 = document.getElementById("g6");
	let o1 = document.getElementById("o1");
	let o2 = document.getElementById("o2");
	let o3 = document.getElementById("o3");
	let o4 = document.getElementById("o4");
	let iter = document.getElementById("iter");
	let g1_1 = document.getElementById("g1_1");
	let g1_2 = document.getElementById("g1_2");
	let g1_3 = document.getElementById("g1_3");
	
	
	function myFunction(x) {
		x.classList.toggle("change");
		if(left_bar.classList.contains("div2")){
			left_bar.classList.remove("div2");
			left_bar.classList.add("div3");
			men.classList.remove("x2");
			men.classList.add("x3");
			content.classList.remove("c2");
			content.classList.add("c3");
			 document.getElementById("content").style.marginLeft = "2%";
		}else{
			left_bar.classList.add("div2");
			left_bar.classList.remove("div3");
			men.classList.remove("x3");
			men.classList.add("x2");
			content.classList.remove("c3");
			content.classList.add("c2");
			document.getElementById("content").style.marginLeft = "20%";
		}
		
	}
	
	function show_hide_game(){
		if(g1.style.display == "block"){
			g1.style.display = "none";
			g2.style.display = "none";
			g3.style.display = "none";
			g4.style.display = "none";
			g5.style.display = "none";
			g6.style.display = "none";
		}else{
			g1.style.display = "block";
			g2.style.display = "block";
			g3.style.display = "block";
			g4.style.display = "block";
			g5.style.display = "block";
			g6.style.display = "block";
			o1.style.display = "none";
			o2.style.display = "none";
			o3.style.display = "none";
			o4.style.display = "none";
		}
	}
	
	
	function show_hide_options_game(){
		if(g1_1.style.display == "block"){
			g1_1.style.display = "none";
			g1_2.style.display = "none";
			g1_3.style.display = "none";
		}else{
			g1_1.style.display = "block";
			g1_2.style.display = "block";
			g1_3.style.display = "block";
		}
		container.innerHTML = '<iframe id="testimonials" name="testimonials" src="admin/admin_games.php" allowtransparency="true" onload="this.style.height=(this.contentDocument.body.scrollHeight+45);" scrolling="no" style="width:126%;border:none;margin-left:-15%;margin-right:-30%;"></iframe>';
	}
	
	function show_hide_orders_men(){
		if(o1.style.display == "block"){
			o1.style.display = "none";
			o2.style.display = "none";
			o3.style.display = "none";
			o4.style.display = "none";
		}else{
			g1.style.display = "none";
			g2.style.display = "none";
			g3.style.display = "none";
			g4.style.display = "none";
			g5.style.display = "none";
			g6.style.display = "none";
			o1.style.display = "block";
			o2.style.display = "block";
			o3.style.display = "block";
			o4.style.display = "block";
			g1_1.style.display = "none";
			g1_2.style.display = "none";
			g1_3.style.display = "none";
		}
		container.innerHTML = '<iframe id="testimonials" name="testimonials" src="admin/admin_orders.php" allowtransparency="true" onload="this.style.height=(this.contentDocument.body.scrollHeight+45);" scrolling="no" style="width:126%;border:none;margin-left:-15%;margin-right:-30%;"></iframe>';
	}
	
	
	// GRY
	function show_games(){
		container.innerHTML = '<iframe id="testimonials" name="testimonials" src="admin/admin_games.php" allowtransparency="true" onload="this.style.height=(this.contentDocument.body.scrollHeight+45);" scrolling="no" style="width:126%;border:none;margin-left:-15%;margin-right:-30%;"></iframe>';
	}
	
	function show_games_add(){
		container.innerHTML = '<iframe id="testimonials" name="testimonials" src="admin/admin_games_add.php" allowtransparency="true" onload="this.style.height=(this.contentDocument.body.scrollHeight+45);" scrolling="no" style="width:126%;border:none;margin-left:-15%;margin-right:-30%;"></iframe>';
	}
	
	function show_games_edit(){
		container.innerHTML = '<iframe id="testimonials" name="testimonials" src="admin/admin_games_edit.php" allowtransparency="true" onload="this.style.height=(this.contentDocument.body.scrollHeight+45);" scrolling="no" style="width:126%;border:none;margin-left:-15%;margin-right:-30%;"></iframe>';
	}
	
	function show_games_delete(){
		container.innerHTML = '<iframe id="testimonials" name="testimonials" src="admin/admin_games_delete.php" allowtransparency="true" onload="this.style.height=(this.contentDocument.body.scrollHeight+45);" scrolling="no" style="width:126%;border:none;margin-left:-15%;margin-right:-30%;"></iframe>';
	}
	
	
	function show_wydawcy(){
		container.innerHTML = '<iframe id="testimonials" name="testimonials" src="admin/admin_publisher.php" allowtransparency="true" onload="this.style.height=(this.contentDocument.body.scrollHeight+45);" scrolling="no" style="width:126%;border:none;margin-left:-15%;margin-right:-30%;"></iframe>';
	}
	
	function show_studio(){
		container.innerHTML = '<iframe id="testimonials" name="testimonials" src="admin/admin_studio.php" allowtransparency="true" onload="this.style.height=(this.contentDocument.body.scrollHeight+45);" scrolling="no" style="width:126%;border:none;margin-left:-15%;margin-right:-30%;"></iframe>';
	}
	
	function show_edition(){
		container.innerHTML = '<iframe id="testimonials" name="testimonials" src="admin/admin_edition.php" allowtransparency="true" onload="this.style.height=(this.contentDocument.body.scrollHeight+45);" scrolling="no" style="width:126%;border:none;margin-left:-15%;margin-right:-30%;"></iframe>';
	}
	
	function show_version(){
		container.innerHTML = '<iframe id="testimonials" name="testimonials" src="admin/admin_version.php" allowtransparency="true" onload="this.style.height=(this.contentDocument.body.scrollHeight+45);" scrolling="no" style="width:126%;border:none;margin-left:-15%;margin-right:-30%;"></iframe>';
	}
	
	function show_supplies(){
		container.innerHTML = '<iframe id="testimonials" name="testimonials" src="admin/admin_supplies.php" allowtransparency="true" onload="this.style.height=(this.contentDocument.body.scrollHeight+45);" scrolling="no" style="width:126%;border:none;margin-left:-15%;margin-right:-30%;"></iframe>';
	}
	
	
	// ZAMÓWIENIA
	function show_order_cd(){
		container.innerHTML = '<iframe id="testimonials" name="testimonials" src="admin/admin_orders_cd_key.php" allowtransparency="true" onload="this.style.height=(this.contentDocument.body.scrollHeight+45);" scrolling="no" style="width:126%;border:none;margin-left:-15%;margin-right:-30%;"></iframe>';
	}
	
	function show_order_shop(){
	container.innerHTML = '<iframe id="testimonials" name="testimonials" src="admin/admin_orders_shop.php" allowtransparency="true" onload="this.style.height=(this.contentDocument.body.scrollHeight+45);" scrolling="no" style="width:126%;border:none;margin-left:-15%;margin-right:-30%;"></iframe>';
	}
	
	function show_order_delivery(){
	container.innerHTML = '<iframe id="testimonials" name="testimonials" src="admin/admin_orders_delivery.php" allowtransparency="true" onload="this.style.height=(this.contentDocument.body.scrollHeight+45);" scrolling="no" style="width:126%;border:none;margin-left:-15%;margin-right:-30%;"></iframe>';
	}
	
	function show_order_archives(){
		container.innerHTML = '<iframe id="testimonials" name="testimonials" src="admin/admin_orders_archives.php" allowtransparency="true" onload="this.style.height=(this.contentDocument.body.scrollHeight+45);" scrolling="no" style="width:126%;border:none;margin-left:-15%;margin-right:-30%;"></iframe>';
	}
	
	// MESSENGER
	function show_messenger(){
		container.innerHTML = '<iframe id="testimonials" name="testimonials" src="admin/admin_messenger.php" allowtransparency="true" onload="this.style.height=(this.contentDocument.body.scrollHeight+45);" scrolling="no" style="width:126%;border:none;margin-left:-15%;margin-right:-30%;"></iframe>';
	}
	
	// UŻYTKOWNICY
	function show_user(){
		container.innerHTML = '<iframe id="testimonials" name="testimonials" src="admin/admin_users.php" allowtransparency="true" onload="this.style.height=(this.contentDocument.body.scrollHeight+45);" scrolling="no" style="width:126%;border:none;margin-left:-15%;margin-right:-30%;"></iframe>';
	}

</script>

</html>