<html>
<head>
	<title>Prze-gry.wy</title>
	<link rel="Shortcut icon" href="../../img/icons/icon.ico" />

	<meta http-equiv="content-type" content="text/php"; charset="UTF-8"/> 
	<meta name="keywords" content="firma,Damian Jamroży, Rafał Iwańczyk, prze-gry, prze-gry.wy, gry, zakupy internetowe, web designer,">
	<meta name="description" content="Prze-gry.wy to firma założona przez 2 osoby o ogromnej pasji do gier cyfrowych. U nas znajdziesz najlepsze tytuły w najlepszych cenach!">
	<link rel="stylesheet" href="../../style/style.css" type="text/css" />
	<link rel="stylesheet" href="../../style/style_messenger.css" type="text/css" />
	<?php
		session_start();
		if(!isset($_SESSION['zalogowany']) || $_SESSION['moderator'] != 1){
			echo ('<script>alert("Nie jesteś zalogowany na konto moderatora. \nAby zarządzać zamówieniami, zaloguj się na swoje konto moderatorskie"); window.location = "../login.php";</script>');
		}
		include('../../php/db_connection.php');
	?>
</head>
<body>
	<div id="header">
		<div id="left_head">
			<div id="left_ban"><a href="../../Index.php"><img src="../../img/Logo-project2.png"  id="log"></a></div>
			<b><a href="admin.php"><div class="side_right" id="admin_panel"> <center><img class="icon_hed" src="../../img/icon/price.png" width="25%"><br><br>ADMIN PANEL</center></div></a>
			<b><a href="../user_account.php"><div class="side_right" id="client_panel"> <center><img class="icon_hed" src="../../img/icon/client.png" width="25%"><br><br>MOJE KONTO</center></div></a>
			<b><a href="#"><div class="side_right" id="moderator_panel"> <center><img class="icon_hed" src="../../img/icon/clients.png" width="25%"><br><br>Wiadomości</center></div></a>
		</div>
		
		<div id="right_head">
			<a href="../me.php"><div class="side"> <center><img class="icon_hed" src="../../img/icon/me.png" width="25%"><br><br>O SKLEPIE</center></div></a>
			<a href="../../Index.php"><div class="side"> <center><img class="icon_hed" src="../../img/icon/home.png" width="25%"><br><br>HOME</center></div></a>
			<a href="../contact.php"><div class="side active_men"> <center><img class="icon_hed" src="../../img/icon/phone.png" width="25%"><br><br>KONTAKT</center></div></a>
			<a href="../brand.php"><div class="side"> <center><img class="icon_hed" src="../../img/icon/game.png" width="25%"><br><br>PRODUKTY</center></div></a>
			<a href="../bucket.php"><div class="side"> <center><img class="icon_hed" src="../../img/icon/bucket.png" width="25%"><br><br>KOSZYK</center></div></a>
			<div class="side_btn" id="Login"><a href="../login.php"><center><button class="btn">ZALOGUJ SIĘ</button> </center></a></div>
			<div class="side_btn" id="Logout"><a href="../../php/wylogowanie.php"><center><button class="btn">Wyloguj SIĘ</button> </center></a></div>

		</div>
		
	</div>
	
		
		
	
	<div id="content">
	<div class="content_messenger">
	<?php
		
	// Ukrywanie błędu (brak zmiennej login)
	error_reporting(0);
	ini_set('display_errors', 0);
	session_start();
	
		
	$login = $_SESSION['login'];

	$sql_login_to_id = mysqli_query($database, "SELECT id_uzytkownika FROM uzytkownicy WHERE login='$login'");

		while($row = mysqli_fetch_array($sql_login_to_id)) {
			$id_moderator = $row['id_uzytkownika'];
		}
		
	

		
		$sql_id_mod = mysqli_query($database, "SELECT A.id_uzytkownika FROM uzytkownicy_messenger A WHERE A.id_wiadomosci in (SELECT B.id_wiadomosci FROM messenger B WHERE B.id_statusu_wiadomosci='1' OR B.id_statusu_wiadomosci='2')");

		while($row = mysqli_fetch_array($sql_id_mod)) {
			$id_user_mod[] = $row['id_uzytkownika'];
		}
		$length_usr_mod = count($id_user_mod);
		
		$j=0;
		
		$sql_id_mod = mysqli_query($database, "SELECT * FROM uzytkownicy WHERE id_uzytkownika='$id_user_mod[0]'");

		while($row = mysqli_fetch_array($sql_id_mod)) {
			$imie_user_mod = $row['imie'];
			$nazwisko_user_mod = $row['nazwisko'];
		}
		
		if(isset($imie_user_mod)){
			echo($id_user_mod[0].". ".$imie_user_mod." ".$nazwisko_user_mod);
		}else{
			echo("Brak nowych wiadomości.");
		}
		

		$messenger= mysqli_query($database,"SELECT A.* FROM messenger A WHERE A.id_wiadomosci in (SELECT B.id_wiadomosci FROM uzytkownicy_messenger B WHERE B.id_moderatora='$id_moderator' AND B.id_uzytkownika='$id_user_mod[0]')");
	
	 $cnt = mysqli_num_rows($messenger);
	 if ($cnt != 0){
		while($row = mysqli_fetch_array($messenger)) {
			$tresc[] = $row['tresc'];
			$data[] = $row['data'];
			$godzina[] = $row['godzina'];
			$id_statusu_wiadomosci[] = $row['id_statusu_wiadomosci'];
		}
	
		$length_messenger = count($tresc);
		
	
		$i=0;
		while($i<$length_messenger){
			if($id_statusu_wiadomosci[$i]==1){
				echo("<div class='messenger_me'>".$tresc[$i]."<br><br><span style='float:right;font-size:70%;'>".$data[$i]." ".$godzina[$i]."</span></div>");
			}
			else if($id_statusu_wiadomosci[$i]==2){
				echo("<div class='messenger_you'>".$tresc[$i]."<br><br><span style='float:right;font-size:70%;'>".$data[$i]." ".$godzina[$i]."</span></div>");
			}
			$i++;
		}
	}else{
		echo("<div class='messenger_you'>Gdy otrzymasz jakąś wiadomość pojawi się tutaj!</div>");
	}
?>
	</div>
		<div class="bubble_bottom">
			<form id='' action='../../php/bubble_messenger_moderator.php' method="POST">
				<textarea class="tresc_full" name="tresc"></textarea>
				<input type="submit" value="&raquo;" class="send_full" name="send">
			</form>
			<br><br>
			<form id='' action='../../php/bubble_messenger_moderator.php' method="POST">
				<input type="submit" value="Zakończ rozmowę" class="end" name="end" width="100%">
			</form>
			
		</div>
		
		
	</div>
	<br><br><br><br><br><br>
	<div id="foter">
		<center>
		<p id="fast">Szybkie linki:</p><br>
		<a href="O_projekcie.php">O projekcie</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="https://damianjamrozy.000webhostapp.com/index.php/rodo/">RODO</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="https://github.com/UR-INF/20-21-ai-projekt-projekt-ai-jamrozy-iwanczyk" target="_blank">Dokumentacja</a>
		<br><br><br><br><br>
		@2020 <a href="https://damianjamrozy.000webhostapp.com/">Damian Jamroży</a> & Rafał Iwańczyk. <a href="LICENSE.pdf">Wszelkie prawa zastrzeżone.</a>
		</center>
	</div>

</body>
<?php
	include('../../php/sprawdzanie_sesji.php');
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