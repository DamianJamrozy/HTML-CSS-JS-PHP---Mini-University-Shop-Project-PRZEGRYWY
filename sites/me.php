<html>
<head>
	<title>Prze-gry.wy</title>
	<link rel="Shortcut icon" href="../img/icons/icon.ico" />

	<meta http-equiv="content-type" content="text/php"; charset="UTF-8"/> 
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
			<a href="me.php"><div class="side active_men"> <center><img class="icon_hed" src="../img/icon/me.png" width="25%"><br><br>O SKLEPIE</center></div></a>
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
					include("../php/bubble_messenger.php"); 
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
		
				<div id="left">
			<h1>Coś więcej o sklepie</h1>
           Sklep internetowy Prze-gry.wy został utworzony w marcu 2021 roku. <br>
			 Jego założycielami są: Damian Jamroży oraz Rafał Iwańczyk. <br>
			 Dwójkę studentów informatyki, którzy dzielili wspólną pasję do gier wideo połączył również wspólny cel - zaliczenie przedmiotu Bazy Danych.<br>
			 Za zadanie obrali sobie utworzenie najlepszego sklepu internetowego <br>z grami wideo na całym świecie. <br><br>
			 Strategia sklepu od samego początku opierała się na bardzo prostych, lecz skutecznych założeniach: <br>
			 
			 <ul>
			    <li>Dostarczania użytkownikom gier zarówno na konsole <br>(PlayStation, Xbox), jak i na komputery osobiste (PC)</li><br>
			    <li>Umożliwienie wyboru wersji każdej możliwej pozycji <br>(cyfrowa lub pudełkowa)</li><br>
			    <li>Zapewnienie dostępności ekskluzywnych edycji kolekcjonerskich</li><br>
			    <li>Polityce benefitów członkowskich <br>(kart lojalnościowych oraz kodów rabatowych)</li><br>
			    <li>Różnorodności sposobów płatności oraz dostaw</li>
			 </ul>
			 <hr style="border: 1px inset #00a2e8;">
			 
			 <p>Aktualnie nasz sklep oferuje dla każdej gry 3 możliwe edycje do wyboru:</p>
			 <b>Edycja podstawowa:</b><br>
			 <ul>
			    <li>Podstawowa edycje gry (edycje pudełkowa lub cyfrowa)</li>
			    
			 </ul>
			 			 
			 <b>Edycja Gracza:</b><br>
			 <ul>
			    <li>Podstawowa edycja gry (edycja pudełkowa lub cyfrowa)</li>			    
			    <li>Dodatkowe drobne gadżety związane z tematyką danej gry</li>			    
			 </ul>
			 <b>Edycja Prze-Grywa:</b><br>
			 <ul>
			    <li>Podstawowa edycja gry (edycja pudełkowa lub cyfrowa)</li>			    
			    <li>Dodatkowe drobne gadżety związane z tematyką danej gry</li>			    
			    <li>Figurka z motywem gry</li>			    
			    <li>Plakat z motywem gry</li>			    
			 </ul><br>
			 
			 
			 Chcesz dowiedzieć się czegoś więcej? <br>
           Skontaktuj się z nami <a href="contact.php" style="color: #ba1d63;">tutaj</a><br><br><br>
			  
		</div>
		
		<div id="right">
			<center><img  id="collors" src="../img/other/4.jpg" height="85%"></center>
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
<script type="text/javascript">
    let title = document.getElementById("collors");
    title.classList.add("colpink");
    setInterval("moja_funkcja()",5000); 
    
    function moja_funkcja(){
        
        if (title.className=='colpink'){
            title.classList.remove("colpink");
            title.classList.add("colblue");
        }
        
        else {
            title.classList.remove("colblue");
            title.classList.add("colpink");
        }
        
    }
</script>

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