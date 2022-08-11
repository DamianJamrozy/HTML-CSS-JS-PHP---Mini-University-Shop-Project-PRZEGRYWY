<html>
<head>
	<title>Prze-gry.wy</title>
	<link rel="Shortcut icon" href="img/icons/icon.ico" />

	<meta http-equiv="content-type" content="text/php"; charset="UTF-8"/> 
	<meta name="keywords" content="firma,Damian Jamroży, Rafał Iwańczyk, prze-gry, prze-gry.wy, gry, zakupy internetowe, web designer,">
	<meta name="description" content="Prze-gry.wy to firma założona przez 2 osoby o ogromnej pasji do gier cyfrowych. U nas znajdziesz najlepsze tytuły w najlepszych cenach!">
	<link rel="stylesheet" href="style/style.css" type="text/css" />
	<link rel="stylesheet" href="style/style_messenger.css" type="text/css" />

	<?php
		session_start();
		
		include('php/db_connection.php');
		
		// Ukrywanie błędu (brak zmiennej login)
	error_reporting(0);
	ini_set('display_errors', 0);

	?>
	
	
</head>
<body>
	<div id="header">
		<div id="left_head">
			<div id="left_ban"><a href="#"><img src="img/Logo-project2.png"  id="log"></a></div>
			<b><a href="sites/admin.php"><div class="side_right" id="admin_panel"> <center><img class="icon_hed" src="img/icon/price.png" width="25%"><br><br>ADMIN PANEL</center></div></a>
			<b><a href="sites/user_account.php"><div class="side_right" id="client_panel"> <center><img class="icon_hed" src="img/icon/client.png" width="25%"><br><br>MOJE KONTO</center></div></a>
			
			<b><a href="sites/moderator/messenger_moderator.php"><div class="side_right" id="moderator_panel"> <center><img class="icon_hed" src="img/icon/clients.png" width="25%"><br><br>Wiadomości</center></div></a>
			
		</div>
		
		<div id="right_head">
			<a href="sites/me.php"><div class="side"> <center><img class="icon_hed" src="img/icon/me.png" width="25%"><br><br>O SKLEPIE</center></div></a>
			<a href="#"><div class="side active_men"> <center><img class="icon_hed" src="img/icon/home.png" width="25%"><br><br>HOME</center></div></a>
			<a href="sites/contact.php"><div class="side"> <center><img class="icon_hed" src="img/icon/phone.png" width="25%"><br><br>KONTAKT</center></div></a>
			<a href="sites/brand.php"><div class="side"> <center><img class="icon_hed" src="img/icon/game.png" width="25%"><br><br>PRODUKTY</center></div></a>
			<a href="sites/bucket.php"><div class="side"> <center><img class="icon_hed" src="img/icon/bucket.png" width="25%"><br><br>KOSZYK</center></div></a>
			<div class="side_btn" id="Login"><a href="sites/login.php"><center><button class="btn">ZALOGUJ SIĘ</button> </center></a></div>
			<div class="side_btn" id="Logout"><a href="php/wylogowanie.php"><center><button class="btn">Wyloguj SIĘ</button> </center></a></div>

		</div>
		</div>
		
		</div>
	</div>
	<a href="#" onclick="Show_bubble_text()" ><div class="messenger_bubble" id="messenger_bubble">
		<?php 
			if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true) && ($_SESSION['typ_konta']=='user')){
				$login = $_SESSION['login'];
				$result2 = $database->query("SELECT upload FROM avatary A INNER JOIN uzytkownicy U ON U.id_avatar=A.id_avatar WHERE U.login = '$login'"); 
				if($result2->num_rows > 0){ 
					while($row = $result2->fetch_assoc()){
						print_r("<img class='avatars' style='height:25%;' src='data:image/jpg;charset=utf8;base64," .base64_encode($row['upload'])."'>"); 
					}
				}
			}
		?>
	</div></a>
	
	<div class="messenger_bubble_up" id="messenger_bubble_up">
		<div class="bubble_baner">
			<div class="avatar_moderator">
			<?php 
				if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true) && ($_SESSION['typ_konta']=='user')){
					$sql_login_to_id = mysqli_query($database, "SELECT id_uzytkownika FROM uzytkownicy WHERE login='$login'");

					while($row = mysqli_fetch_array($sql_login_to_id)) {
						$id_user = $row['id_uzytkownika'];
					}
					
					$result1 = mysqli_query($database, "SELECT id_moderatora FROM uzytkownicy_messenger WHERE id_uzytkownika='$id_user'"); 
					if($result1->num_rows > 0){ 
						while($row = mysqli_fetch_array($result1)) {
							$id_moderatora = $row['id_moderatora'];
						}
					
					
						$result2 = $database->query("SELECT upload FROM avatary A INNER JOIN uzytkownicy U ON U.id_avatar=A.id_avatar WHERE U.id_uzytkownika = '$id_moderatora'"); 
						if($result2->num_rows > 0){ 
							while($row = $result2->fetch_assoc()){
								print_r("<img class='avatars' style='height:100%;' src='data:image/jpg;charset=utf8;base64," .base64_encode($row['upload'])."'>"); 
							}
						}
					}
				}
			?>
			</div>
			<div class="name_moderator">
			<?php 
				if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true) && ($_SESSION['typ_konta']=='user')){
					$result3 = $database->query("SELECT imie,nazwisko FROM uzytkownicy WHERE id_uzytkownika = '$id_moderatora'"); 
					if($result3->num_rows > 0){ 
						while($row = $result3->fetch_assoc()){
							print_r($row['imie']." ".$row['nazwisko']); 
						}
					}
				}
			?>
			</div>
			<a href="#" onclick="Hide_bubble_text()"><div id="close_messenger">
				<big><big><big><big><big>&times;</big></big></big></big></big>
			</div></a>
		</div>
		
		<div class="bubble_content">
			<?php 
				if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true) && ($_SESSION['typ_konta']=='user')){
					include('php/bubble_messenger.php'); 
				}
			?>
		</div>
		
		<div class="bubble_bottom">
			<form id='' action='php/bubble_messenger.php' method="POST">
				<textarea class="tresc" name="tresc"></textarea>
				<input type="submit" value="&raquo;" class="send" name="send">
			</form>
		</div>
	</div>


	<div id="ban">
		<div id="ban_slider">
			<div id="fade_in_ban">
				<center>
				<span style="font-size:100px;"><br>Prze-gry.wy</span><br>
				Najlepsze gry w najlepszych cenach.<br><br>
				<a href="sites/brand.php"><button class="btn">Przejdź do produktów</button></a>
				</center>
			</div>
		</div>
	</div>
	
	<div id="content">
		
		<div id="left">
			<div style="padding-left:10%; padding-right:10%;">
				<center><font size="300px">Usługi</font><br><br></center>
				
				Jesteś graczem tak jak my? Jeżeli tak to z pewnością trafiłeś na tą stronę w 
				jednym celu... Chcesz kupić najlepsze gry w najlepszej cenie! <br>
				Nasza strona Ci to umożliwi! Prze-gry.wy oferuje najlepszy wybór gier cyfrowych
				na większość dostępnych konsoli. Najnowsze gry na PC, Xboxa lub Playstation, 
				wszystko to znajduje się w naszej ofercie!<br>
				Otwórz zakładkę <a href="sites/brand.php">produkty</a> i rozpocznij przygodę już teraz!
				
				<br><br><br>
				Ceny nie wyglądają zbyt korzystnie? Nasza strona to coś więcej niż sklep. Dbamy 
				o naszych klientów znacznie bardziej niżeli robi to nasza konkurencja! Stałym 
				klientom oferujemy karty lojalnościowe, które uprawniają ich do stałych zniżek na 
				wszystkie produkty. Nadal nie brzmi kusząco? No cóż... dla nowych klientów również
				przewidujemy zniżki oraz kody rabatowe dla prawdziwych graczy!
				
				<br><br><br>
				Takich promocji nie znajdziesz u konkurencji!
				Na co czekasz? Uruchom zakładkę <a href="sites/brand.php">produkty</a> i skompletuj swoje zamówienie. Po wykonaniu tej czynności przejdź
				do zakładki <a href="sites/bucket.php">koszyk</a> i wybierz interesujące Cię opcje dostawy oraz płatności.
				<br><br><br><br>
			</div>
			<div class="cont_person">
				<center>
				Zaufało nam już:
				
				<div id="cont_person_lt">
					<br>
					<p id="user_count">
					<p id='myBar'></p>
					<?php
						include('php/stats.php');
					?>
					</p>
				</div>
				</center>
			</div>
			
			<div class="cont_person">
				<center>
				Złożonych zamówień:
				
				<div id="cont_person_rg">
					<br>
					<p id="trade_count">
					<p id='myBar1'></p>
					</p>
				</div>
				</center>
			</div>

		</div>
	
		<div id="right">
			<center><img class="img" src="img/other/1.jpg" height="75%"></center>
		</div>
	</div>
	
	<div id="foter">
		<center>
		<p id="fast">Szybkie linki:</p><br>
		<a href="sites/O_projekcie.php">O projekcie</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="./sites/rodo.php">RODO</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="https://github.com/UR-INF/20-21-ai-projekt-projekt-ai-jamrozy-iwanczyk" target="_blank">Dokumentacja</a>
		<br><br><br><br><br>
		@2020 <a href="https://damianjamrozy.000webhostapp.com/">Damian Jamroży</a> & Rafał Iwańczyk. <a href="LICENSE.pdf">Wszelkie prawa zastrzeżone.</a>
		</center>
	</div>

</body>
<?php
	include('php/sprawdzanie_sesji.php');
?>

<script>
	let messenger_bubble_up = document.getElementById("messenger_bubble_up");
	function Show_bubble_text(){
		messenger_bubble_up.style.display = "block";
	}
	function Hide_bubble_text(){
		messenger_bubble_up.style.display = "none";
	}
</script>

</html>