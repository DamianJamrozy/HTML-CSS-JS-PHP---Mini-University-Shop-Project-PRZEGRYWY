<html>
<head>
	<title>Prze-gry.wy</title>
	<link rel="Shortcut icon" href="../img/icons/icon.ico" />

	<meta http-equiv="content-type" content="text/php" charset="utf-8"/> 
	<meta name="keywords" content="firma,Damian Jamroży, Rafał Iwańczyk, prze-gry, prze-gry.wy, gry, zakupy internetowe, web designer,">
	<meta name="description" content="Prze-gry.wy to firma założona przez 2 osoby o ogromnej pasji do gier cyfrowych. U nas znajdziesz najlepsze tytuły w najlepszych cenach!">
	<link rel="stylesheet" href="../style/style.css" type="text/css" />
	<link rel="stylesheet" href="../style/style_messenger.css" type="text/css" />
	<?php
		session_start();
		include('../php/db_connection.php');
	?>

</head>
<body>
	<div id="header">
		<div id="left_head">
			<div id="left_ban"><a href="../Index.php"><img src="../img/Logo-project2.png"  id="log"></a></div>
			<b><a href="admin.php"><div class="side_right" id="admin_panel"> <center><img class="icon_hed" src="../img/icon/price.png" width="25%"><br><br>ADMIN PANEL</center></div></a>
			<b><a href="user_account.php"><div class="side_right" id="client_panel"> <center><img class="icon_hed" src="../img/icon/client.png" width="25%"><br><br>MOJE KONTO</center></div></a>
			<b><a href="moderator/messenger_moderator.php"><div class="side_right" id="moderator_panel"> <center><img class="icon_hed" src="../img/icon/clients.png" width="25%"><br><br>Wiadomości</center></div></a>
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
					include('../php/bubble_messenger.php'); 
				}
			?>
		</div>
		
		<div class="bubble_bottom">
			<form id='' action='../php/bubble_messenger.php' method="POST">
				<textarea class="tresc" name="tresc"></textarea>
				<input type="submit" value="&raquo;" class="send" name="send">
			</form>
		</div>
	</div>
	
	
	<div id="content">
		<center> <font size="7px">Logowanie</font></center><br><br><br><br>
		<div id="left">
			<center>
			<font size="7px">Zaloguj się:</font><br><br><br><br>
			
			<form method="POST" action="../php/logowanie.php">
			
				<font size="5px">Wpisz Login</font><br><br>
				<input type="text" name="login" class="inpu" placeholder="user" pattern="(?=.*[a-z])(?=.*[A-z]).{}" required>
				<br><br><br>
				<font size="5px">Wpisz Hasło</font><br><br>
				<input type="password" name="haslo" class="inpu" placeholder="zaq1@WSX" required>
				<br><br><br>
				<input type="submit" value="Zaloguj" name="loguj" class="btn">
			</form>
				
			</center>
		</div>
		
		<div id="right">
			<center>
			<font size="7px">Zarejestruj się:</font><br><br><br><br>
			
			<form method="POST" action="../php/rejestracja.php">
				<font size="5px">Wpisz Imię</font><br><br>
				<input type="text" name="firname" class="inpu" placeholder="Jan" pattern="(?=.*[a-z])(?=.*[A-z-9ąęźżśóćńł]).{}" required>
				<br><br><br>
				<font size="5px">Wpisz Nazwisko</font><br><br>
				<input type="text" name="surname" class="inpu" placeholder="Kowalski" pattern="(?=.*[a-z])(?=.*[A-z-9ąęźżśóćńł]).{}" required>
				<br><br><br>
				<font size="5px">Wpisz Email</font><br><br>
				<input type="email" name="email" class="inpu" placeholder="email@domain.com" required>
				<br><br><br>
				<font size="5px">Wpisz Numer Telefonu</font><br><br>
				<input type="tel" name="tel" class="inpu" id="num" maxlength="9" placeholder="123456789" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
				<br><br><br>
				<font size="5px">Wpisz Login</font><br><br>
				<input type="text" class="inpu" name="login" placeholder="login"><br><br>
				<br>
				<font size="5px">Wpisz Hasło</font><br><br>
				<input type="password" class="inpu" name="haslo1" placeholder="zaq1@WSX">
				<br><br><br>
				<font size="5px">Powtórz hasło</font><br><br>
				<input type="password" class="inpu" name="haslo2" placeholder="zaq1@WSX">
				<br><br><br>
				<input type="submit" class="btn" value="Utwórz konto" name="rejestruj">
			</form>
			</center>
		</div>
		
	</div>
	
	<div id="foter">
		<center>
		<p id="fast">Szybkie linki:</p><br>
		<a href="O_projekcie.php">O projekcie</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="./rodo.php">RODO</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="https://github.com/UR-INF/20-21-ai-projekt-projekt-ai-jamrozy-iwanczyk" target="_blank">Dokumentacja</a>
		<br><br><br><br><br>
		@2020 <a href="https://damianjamrozy.000webhostapp.com/">Damian Jamroży</a> & Rafał Iwańczyk. <a href="LICENSE.pdf">Wszelkie prawa zastrzeżone.</a>
		</center>
	</div>

</body>
<?php
	include('../php/sprawdzanie_sesji.php');
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