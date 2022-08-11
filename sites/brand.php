<html>
<head>
	<title>Prze-gry.wy</title>
	<link rel="Shortcut icon" href="../img/icons/icon.ico" />

	<meta http-equiv="content-type" content="text/php"; charset="UTF-8"/> 
	<meta name="keywords" content="firma,Damian Jamroży, Rafał Iwańczyk, prze-gry, prze-gry.wy, gry, zakupy internetowe, web designer,">
	<meta name="description" content="Prze-gry.wy to firma założona przez 2 osoby o ogromnej pasji do gier cyfrowych. U nas znajdziesz najlepsze tytuły w najlepszych cenach!">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../style/style.css" type="text/css" />
	<link rel="stylesheet" href="../style/style_games.css" type="text/css" />
	<link rel="stylesheet" href="../style/style_messenger.css" type="text/css" />
	<?php
		session_start();
		include('../php/db_connection.php');
		// Ukrywanie błędu (brak zmiennej login)
		error_reporting(0);
		ini_set('display_errors', 0);
		
		// Database info
		$db_host     = "localhost";
		$db_username = "root";
		$db_password = "";

		// Połączenie
		$connection = mysqli_connect($db_host, $db_username, $db_password) or die("Error " . mysqli_error());

		// Wybranie odpowiedniej tabeli w bazie
		$db = mysqli_select_db($connection, "baza_przegrywy") or die("Error " . mysqli_error());
		
		print_r("<style>
	
			@media all and (min-width:770px) {
				.books_mini{
					
					float: left;
					min-height: 210px;
					min-width: 150px;
					text-align: center;
					padding: 3px 1%;
					display: inline-block;
					margin-left: 1%;
					margin-right: 1%;
					margin-bottom: 1%;
					position: relative;
				}
			}
			@media all and (max-width:769px) {
			  .books_mini {
				float: left;
				height: 260px;
				width: 200px;
				text-align: center;
				padding: 3px 1%;
				display: block;
				margin-left: 17%;
				margin-right: 1%;
				margin-bottom: 3%;
				text-align: center;
			  }
			}
			  
			  @media all and (min-width:770px) {
				.books_mini_best{
					
					float: left;
					text-align: center;
					min-height: 300px;
					min-width: 210px;
					text-align: center;
					padding: 3px 1%;
					display: inline-block;
					margin-left: 2%;
					margin-right: 1%;
					margin-bottom: 1%;
					position: relative;
				}
			}
			@media all and (max-width:769px) {
			  .books_mini_best {
				float: left;
				height: 260px;
				width: 200px;
				text-align: center;
				padding: 3px 1%;
				display: block;
				margin-left: 17%;
				margin-right: 1%;
				margin-bottom: 3%;
			  }
		</style>");
		
		// Zapytanie o wybranie wszystkich informacji z tabeli gry
		$sql = mysqli_query($connection, "SELECT * FROM gry");

		// Dodawanie rekordów z bazy do listy
		while($row = mysqli_fetch_array($sql)) {
			$names[] = $row['id_gry'];
		}
		
		$length = count($names);
		
		
		// Zapytanie o wybranie id_gry
		$sql_best = mysqli_query($connection, "SELECT * FROM gry ORDER BY  ilosc_sprzedanych DESC;");

		// Dodawanie rekordów z bazy do listy
		while($row = mysqli_fetch_array($sql_best)) {
			$names_best[] = $row['id_gry'];
			$names_best_grap[] = $row['grafika'];
		}
		
		$length1 = count($names_best);
		
	?>
</head>
<body>
	<div id="header">
		<div id="left_head">
			<div id="left_ban"><a href="../Index.php"><img src="../img/Logo-project2.png"  id="log"></a></div>
			<b><a href="admin.php"><div class="side_right" id="admin_panel"> <center><img class="icon_hed" src="../img/icon/price.png" width="25%"><br><br>ADMIN PANEL</center></div></a>
			<a href="user_account.php"><div class="side_right" id="client_panel"> <center><img class="icon_hed" src="../img/icon/client.png" width="25%"><br><br>MOJE KONTO</center></div></a></b>
			<b><a href="moderator/messenger_moderator.php"><div class="side_right" id="moderator_panel"> <center><img class="icon_hed" src="../img/icon/clients.png" width="25%"><br><br>Wiadomości</center></div></a>
		</div>
		
		<div id="right_head"><b>
			<a href="me.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/me.png" width="25%"><br><br>O SKLEPIE</center></div></a>
			<a href="../Index.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/home.png" width="25%"><br><br>HOME</center></div></a>
			<a href="contact.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/phone.png" width="25%"><br><br>KONTAKT</center></div></a>
			<a href="brand.php"><div class="side active_men"> <center><img class="icon_hed" src="../img/icon/game.png" width="25%"><br><br>PRODUKTY</center></div></a>
			<a href="bucket.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/bucket.png" width="25%"><br><br>KOSZYK</center></div></a>
			<div class="side_btn" id="Login"><a href="login.php"><center><button class="btn">ZALOGUJ SIĘ</button> </center></a></div>
			<div class="side_btn" id="Logout"><a href="../php/wylogowanie.php"><center><button class="btn">Wyloguj SIĘ</button> </center></a></b></div>
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
	
	<div class="game_filter" id="game_filter">
		<div class="search" id="search">
		<form method="POST" action="#" class="search_form">
			<input type="text" name="phrase" placeholder="Wyszukaj grę">
			<button type="submit"><i class="fa fa-search"></i></button>
		</form><br><br><br>
		<div id="ss">
		<?php
				// Wyszukiwarka
			
			// usunięcie niepotrzebnych białych znaków
			$_POST['phrase']=trim($_POST['phrase']);
			// sprawdzenie, czy użytkownik wpisał dane
			if(empty($_POST['phrase']))
			// jeśli nie, to wyświetl komunikat i zakończ działanie skryptu
			echo('');
			// jeśli jednak dane są wpisane poprawnie
			else
			{
				
				
				// połączenie z bazą danych, NIE ZAPOMINJ USTAWIĆ WŁASNYCH DANYCH!
				$base=mysqli_connect('localhost','root','','baza_przegrywy');
				
				$query="Select * From gry Where nazwa_gry Like '%{$_POST['phrase']}%' Or opis_gry Like '%{$_POST['phrase']}%'";
				// wysłanie zapytania do bazy danych
				$result=mysqli_query($base,$query);
				// ustalenie ilości wyszukanych obiektów
				$obAmount=mysqli_num_rows($result);
				// wyswietlenie ilości wyszukanych obiektów
				if($obAmount>16){
					echo'<span id="gam">Znaleziono: '.$obAmount.' (MAX 16)<br></span>';
				}else{
					echo'<span id="gam">Znaleziono: '.$obAmount.'<br></span>';
				}
				
				
				echo("<div id='gam1'>");
				// wyświetlenie wyników w pętli
				if($obAmount<=6){
					for($x=0;$x<$obAmount;$x++){
					// przekształcenie danych na tablicę
					$row=mysqli_fetch_assoc($result);
					$game_name = $row['nazwa_gry'];

					$query2 = mysqli_query($connection, "SELECT * FROM gry ORDER BY id_gry");
					unset($name_game_all);
					while($rowq = mysqli_fetch_array($query2)) {
						$name_game_all[] = $rowq['nazwa_gry'];
						$grap = $rowq['id_gry'];
					}
					$length_game_all = count($name_game_all);
					
					$i=0;
					while($i<$length_game_all){
						if($name_game_all[$i]===$game_name){
							break;
						}
						$i++;
					}
					
					
						$result_pc = mysqli_query($connection,"SELECT cena FROM platformy_gry WHERE id_gry=$grap AND id_platformy=1"); 
						$result_xb = mysqli_query($connection,"SELECT cena FROM platformy_gry WHERE id_gry=$grap AND id_platformy=2"); 
						$result_ps = mysqli_query($connection,"SELECT cena FROM platformy_gry WHERE id_gry=$grap AND id_platformy=3"); 
						$pc=0;
						$xb=0;
						$ps=0;
						while($row1 = mysqli_fetch_array($result_pc)) {
							$pc = $row1['cena'];
						}
						while($row2 = mysqli_fetch_array($result_xb)) {
							$xb = $row2['cena'];
						}
						while($row3 = mysqli_fetch_array($result_ps)) {
							$ps = $row3['cena'];
						}
						$q=0;
						$Ceny='';
						if($pc>0){
							$Ceny=$Ceny.'PC:'.$pc;
							if($xb>0){
								$Ceny=$Ceny.'| ';
							}
						}
						if($xb>0){
							$Ceny=$Ceny.'XB:'.$xb;
							if($ps>0){
								$Ceny=$Ceny.'| ';
							}
						}
						if($ps>0){
							if($xb==0 && $pc>0){
								$Ceny=$Ceny.'| ';
							}
							$Ceny=$Ceny.'PS:'.$ps;
						}
					
					
					
					
					
					
					print_r("<center><form action='product.php' method='get' class='top' id='".$names[$i]."'><input type='hidden' name='form' value='".$names[$i]."'></input><a href='#' onclick='document.getElementById(sub".$names[$i].".jpg).click();'></a><input type='submit' id='sub'".$names[$i]." value='$Ceny' class='books_mini_best anim' style='
									background-image: linear-gradient(0deg, rgba(0,0,0,0.955641631652661) 0%, rgba(31,31,31,0.7735688025210083) 14%, rgba(98,87,64,0) 28%, rgba(253,187,45,0) 100%),url(data:image/jpg;charset=utf8;base64," .base64_encode($row['grafika']).");
									background-repeat: no-repeat;
									background-position: center;
									background-size: cover;
									'></form></center>");
					}
				}else{
					for($x=0;$x<16;$x++){
						if($x>=$obAmount){
							break;
						}
					// przekształcenie danych na tablicę
					$row=mysqli_fetch_assoc($result);
					$game_name = $row['nazwa_gry'];
					

					$query2 = mysqli_query($connection, "SELECT * FROM gry ORDER BY id_gry");
					unset($name_game_all);
					while($rowq = mysqli_fetch_array($query2)) {
						$name_game_all[] = $rowq['nazwa_gry'];
						$grap = $row['id_gry'];
					}
					$length_game_all = count($name_game_all);
					
					$i=0;
					while($i<$length_game_all){
						if($name_game_all[$i]===$game_name){
							break;
						}
						$i++;
					}
					
						$result_pc = mysqli_query($connection,"SELECT cena FROM platformy_gry WHERE id_gry=$grap AND id_platformy=1"); 
						$result_xb = mysqli_query($connection,"SELECT cena FROM platformy_gry WHERE id_gry=$grap AND id_platformy=2"); 
						$result_ps = mysqli_query($connection,"SELECT cena FROM platformy_gry WHERE id_gry=$grap AND id_platformy=3"); 
						$pc=0;
						$xb=0;
						$ps=0;
						while($row1 = mysqli_fetch_array($result_pc)) {
							$pc = $row1['cena'];
						}
						while($row2 = mysqli_fetch_array($result_xb)) {
							$xb = $row2['cena'];
						}
						while($row3 = mysqli_fetch_array($result_ps)) {
							$ps = $row3['cena'];
						}
						$q=0;
						$Ceny='';
						if($pc>0){
							$Ceny=$Ceny.'PC:'.$pc;
							if($xb>0){
								$Ceny=$Ceny.'| ';
							}
						}
						if($xb>0){
							$Ceny=$Ceny.'XB:'.$xb;
							if($ps>0){
								$Ceny=$Ceny.'| ';
							}
						}
						if($ps>0){
							if($xb==0 && $pc>0){
								$Ceny=$Ceny.'| ';
							}
							$Ceny=$Ceny.'PS:'.$ps;
						}
					
					print_r("<center><form action='product.php' method='get' class='rest' id='".$names[$i]."'><input type='hidden' name='form' value='".$names[$i]."'></input><a href='#' onclick='document.getElementById(sub".$names[$i].".jpg).click();'></a><input type='submit' id='sub'".$names[$i]." value='$Ceny' class='books_mini anim' style='
									background-image: linear-gradient(0deg, rgba(0,0,0,0.955641631652661) 0%, rgba(31,31,31,0.7735688025210083) 14%, rgba(98,87,64,0) 28%, rgba(253,187,45,0) 100%),url(data:image/jpg;charset=utf8;base64," .base64_encode($row['grafika']).");
									background-repeat: no-repeat;
									background-position: center;
									background-size: cover;
									'></form></center>");
					}
				}
				echo("</div>");
				echo('<script>
					game_filter.classList.add("c3");
					document.getElementById("content").style.marginTop = "2%";</script>');
					
					echo("<div class='arrow' id='arr'><a href='#' onclick='myFunction()'><span style='font-size:500%;'>&#8686;</span></a></div>");
			}
		?>
		</div>
		
		</div>
	</div>
	
	<div id="content" style="padding-top: 0%;">
		<center>
		<div class="text_col">
		<font size="200px">BEST SELLER</font>
		<br><br><br><br><br>
		</div>
		
		<div class="top_games" id="">
			<?php 
				// Wypisanie pobranych wartości - okładek gier względem ich id
				$i = 0;

				//// Get image data from database 
				$result = $connection->query("SELECT grafika, id_gry FROM gry ORDER BY ilosc_sprzedanych DESC"); 
				
				 if($result->num_rows > 0){ 
					while($row = $result->fetch_assoc()){
						$grap = $row['id_gry'];
						$result_pc = mysqli_query($connection,"SELECT cena FROM platformy_gry WHERE id_gry=$grap AND id_platformy=1"); 
						$result_xb = mysqli_query($connection,"SELECT cena FROM platformy_gry WHERE id_gry=$grap AND id_platformy=2"); 
						$result_ps = mysqli_query($connection,"SELECT cena FROM platformy_gry WHERE id_gry=$grap AND id_platformy=3"); 
						$pc=0;
						$xb=0;
						$ps=0;
						while($row1 = mysqli_fetch_array($result_pc)) {
							$pc = $row1['cena'];
						}
						while($row2 = mysqli_fetch_array($result_xb)) {
							$xb = $row2['cena'];
						}
						while($row3 = mysqli_fetch_array($result_ps)) {
							$ps = $row3['cena'];
						}
						$q=0;
						$Ceny='';
						if($pc>0){
							$Ceny=$Ceny.'PC:'.$pc;
							if($xb>0){
								$Ceny=$Ceny.'| ';
							}
						}
						if($xb>0){
							$Ceny=$Ceny.'XB:'.$xb;
							if($ps>0){
								$Ceny=$Ceny.'| ';
							}
						}
						if($ps>0){
							if($xb==0 && $pc>0){
								$Ceny=$Ceny.'| ';
							}
							$Ceny=$Ceny.'PS:'.$ps;
						}
						
						
					print_r("<center><form class='top' action='product.php' method='get' id='".$names_best[$i]."'><input type='hidden' name='form' value='".$names_best[$i]."'></input><a href='#' onclick='document.getElementById(sub".$names_best[$i].".jpg).click();'></a><input type='submit' id='sub'".$names_best[$i]." value='$Ceny' class='books_mini_best' style='
							background-image: linear-gradient(0deg, rgba(0,0,0,0.955641631652661) 0%, rgba(31,31,31,0.7735688025210083) 14%, rgba(98,87,64,0) 28%, rgba(253,187,45,0) 100%),url(data:image/jpg;charset=utf8;base64," .base64_encode($row['grafika']).");
							background-repeat: no-repeat;
							background-position: center;
							background-size: cover;
							'></form></center>");
					$i++;
					if($i==6){
						break;
					}
						
					}
				 }
			?>
		</div>
		
		
		<div class="text_col">
		<font size="200px">WSZYSTKIE GRY</font>
		<br><br><br><br><br>
		</div>
		
		
		<div class="all_games" id="">
			<!--<a href=""><img class="games_visual" src="../img/games/6.jpg"></a> -->
			
			<?php 
				$i = 0;
				//// Get image data from database 
				$result = $connection->query("SELECT grafika,id_gry FROM gry"); 
				 if($result->num_rows > 0){ 
					while($row = $result->fetch_assoc()){
						$grap = $row['id_gry'];
						$result_pc = mysqli_query($connection,"SELECT cena FROM platformy_gry WHERE id_gry=$grap AND id_platformy=1"); 
						$result_xb = mysqli_query($connection,"SELECT cena FROM platformy_gry WHERE id_gry=$grap AND id_platformy=2"); 
						$result_ps = mysqli_query($connection,"SELECT cena FROM platformy_gry WHERE id_gry=$grap AND id_platformy=3"); 
						$pc=0;
						$xb=0;
						$ps=0;
						while($row1 = mysqli_fetch_array($result_pc)) {
							$pc = $row1['cena'];
						}
						while($row2 = mysqli_fetch_array($result_xb)) {
							$xb = $row2['cena'];
						}
						while($row3 = mysqli_fetch_array($result_ps)) {
							$ps = $row3['cena'];
						}
						$q=0;
						$Ceny='';
						if($pc>0){
							$Ceny=$Ceny.'PC:'.$pc;
							if($xb>0){
								$Ceny=$Ceny.'| ';
							}
						}
						if($xb>0){
							$Ceny=$Ceny.'XB:'.$xb;
							if($ps>0){
								$Ceny=$Ceny.'| ';
							}
						}
						if($ps>0){
							if($xb==0 && $pc>0){
								$Ceny=$Ceny.'| ';
							}
							$Ceny=$Ceny.'PS:'.$ps;
						}
						print_r("<center><form class='rest' action='product.php' method='get' id='".$names[$i]."'><input type='hidden' name='form' value='".$names[$i]."'></input><a href='#' onclick='document.getElementById(sub".$names[$i].".jpg).click();'></a><input type='submit' id='sub'".$names[$i]." value='$Ceny' class='books_mini' style='
							background-image: linear-gradient(0deg, rgba(0,0,0,0.955641631652661) 0%, rgba(31,31,31,0.7735688025210083) 14%, rgba(98,87,64,0) 28%, rgba(253,187,45,0) 100%),url(data:image/jpg;charset=utf8;base64," .base64_encode($row['grafika']).");
							background-repeat: no-repeat;
							background-position: center;
							background-size: cover;
							'></form></center>");
							$i++;
					}
						
				 }
				
			?>
		</div>
		
		</center>
		
	</div>
	
	<div id="foter">
		<center>
		<p id="fast">Szybkie linki:</p><br>
		<a href="O_projekcie.php">O projekcie</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="./rodo.php">RODO</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="https://github.com/UR-INF/20-21-ai-projekt-projekt-ai-jamrozy-iwanczyk" target="_blank">Dokumentacja</a>
		<br><br><br><br><br>
		@2020 <a href="https://damianjamrozy.000webhostapp.com/">Damian Jamroży</a> & Rafał Iwańczyk. <a href="LICENSE.pdf">Wszelkie prawa zastrzeżone.</a>
		</center>
	</div>

<script type="text/javascript" src="../js/script.js"></script>
</body>

<script type="text/javascript" src="../js/script_open_game.js"></script>
<script>
	function myFunction(){
		let arr = document.getElementById("arr");
		let gam = document.getElementById("gam");
		let gam1 = document.getElementById("gam1");
		let ss = document.getElementById("ss");
		game_filter.classList.remove("c3");
		game_filter.classList.add("c2");
		arr.classList.add("c4");
		gam.classList.add("c4");
		gam1.classList.add("c4");
		setTimeout(function(){ ss.innerHTML ='';; }, 3000);
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