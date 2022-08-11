<html>
<head>
	<title>Prze-gry.wy</title>
	<link rel="Shortcut icon" href="../img/icons/icon.ico" />

	<meta http-equiv="content-type" content="text/php"; charset="UTF-8"/> 
	<meta name="keywords" content="firma,Damian Jamroży, Rafał Iwańczyk, prze-gry, prze-gry.wy, gry, zakupy internetowe, web designer,">
	<meta name="description" content="Prze-gry.wy to firma założona przez 2 osoby o ogromnej pasji do gier cyfrowych. U nas znajdziesz najlepsze tytuły w najlepszych cenach!">
	<link rel="stylesheet" href="../style/style.css" type="text/css" />
	<link rel="stylesheet" href="../style/style_games.css" type="text/css" />
	<link rel="stylesheet" href="../style/style_messenger.css" type="text/css" />
	<?php
		session_start();
		include('../php/db_connection.php');
	?>
	<script type="text/javascript" src="../js/script_open_game_in.js"></script>
	
	<?php
		include('../php/game_data.php');
		
		// Database info
		$db_host     = "localhost";
		$db_username = "root";
		$db_password = "";

		// Połączenie
		$connection = mysqli_connect($db_host, $db_username, $db_password) or die("Error " . mysqli_error());

		// Wybranie odpowiedniej tabeli w bazie
		$db = mysqli_select_db($connection, "baza_przegrywy") or die("Error " . mysqli_error());
	?>
	
	<style>
		select{
			background-color: #00a2e8;
			width: 60%;
			height: 3%;
			border-radius: 2%;
			color: white;
			font-weight: 700;
		}
		
		option:checked{ 
			background-color: #d9d9e0; 
		}
		
		select:focus{
			-webkit-box-shadow: 0px 0px 26px 2px rgba(0,162,232,1);
			-moz-box-shadow: 0px 0px 26px 2px rgba(0,162,232,1);
			box-shadow: 0px 0px 26px 2px rgba(0,162,232,1);
			   /*
		   -webkit-box-shadow: 0px 0px 10px 2px rgba(204,204,204,0.9);
		   -moz-box-shadow: 0px 0px 10px 2px rgba(204,204,204,0.9);
		   box-shadow: 0px 0px 10px 2px rgba(204,204,204,0.9);
		   */
		   border: 2px solid #A5CDA5;
		   background-color: #f2fbff;
		   color: #00a2e8;
		}
	
	</style>
	
</head>
<body>
	<input type="hidden" id="btnClickedValue" name="btnClickedValue" value="" />
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
			<a href="brand.php"><div class="side active_men"> <center><img class="icon_hed" src="../img/icon/game.png" width="25%"><br><br>PRODUKTY</center></div></a>
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
	
		<div class="left_g">
			<?php 
			// Wypisanie pobranych wartości - okładek gier względem ich id
				$i = 0;

				//// Get image data from database 
				$id_game = $_SESSION['id_gry2'];
				$result = $connection->query("SELECT grafika FROM gry WHERE id_gry='$id_game'"); 
				 
				if($result->num_rows > 0){ 
					while($row = $result->fetch_assoc()){
						print_r("<img class='game_inside' src='data:image/jpg;charset=utf8;base64," .base64_encode($row['grafika'])."'>"); 
					}
				}
			?>
		</div>
		
		<div class="central_g">
			<h2>Nazwa Gry</h2>
			<p id="game_name">	<?php echo($names1g[0]);?></p>
			
			<h2>Wydawca</h2>
			<p id="game_wyd">	<?php echo($names10g[0]);?></p>
			
			<h2>PEGI</h2>
			<p id="game_pegi">	<?php echo("<img class='pegi' src='".$names8g[0]."'>");?></p>
			
			<h3> <a href="#game_stud"> Więcej informacji </a></h3>
			
		</div>
		
		
		
		<!-- ROZPOCZĘCIE FORMULARZA! -->
		<form method="POST" action="../php/bucket_script.php">
		<div class="right_g">
			<h2>Platforma</h2>
			<p id="game_platform"> 
				<select class="select" onchange="val()" id="get_val" name="Select_platform" required>  
					<option>Wybierz platformę</option>  
					<?php 
						$i = 0;
						while($length1!=$i){
							print_r("<option>".$names1[$i]."</option>  "); 
							$i++;
						}
					?>
				</select>	
			</p>
		
		
		
		
			<h2>Edycja gry</h2>
			<p id="game_edition">
			<select class="select" name="Select_edition" id="get_val2" required>  
					<option>Wybierz edycję</option>  
					<?php 
						$i = 0;
						while($length3!=$i){
							print_r("<option>".$names3[$i]."</option>  "); 
							$i++;
						}
					?>
				</select>
			</p>
			
			<h2>Wersja gry</h2>
			<p id="game_type">
			<select class="select" name="Select_version" id="get_val3" required>  
					<option>Wybierz wersję</option>  
					<?php 
						$i = 0;
						while($length4!=$i){
							print_r("<option>".$names4[$i]."</option>  "); 
							$i++;
						}
					?>
				</select>
			</p>
			
			<h2>Ilość kopii gry</h2>
			<!-- Wyświetlanie ilości kopii gry dla platrofmy pc -->
			<p>
			<select class="select" id="game_types" name="Select_count" required>  
				<option>Wybierz najpierw platformę</option>  
							<!-- Skrypt na dole uzupełnia resztę -->
			</select>
			</p>
			
			
		</div>
		
		<div class="right_c_g">
			<h2>Dostępność</h2>
			<div id="game_is">
			<p id="game_is_yes"></p>
			<p id="game_count">	<?php echo($names6g[0]." Kopii Gry");?> </p>
			</div>
			
			<h1>Cena</h1>
			<p id="game_cost">	<?php echo($names5g[0]." PLN");?></p>
			<br>
			
			<button class="btn_buy" name="add_to_bucket">Dodaj do koszyka </button>
		</div>
		</form>
		<!-- ZAKOŃCZENIE FORMULARZA! -->
		
		
		<div class="bottom_g">
			<h2>Opis gry</h2>
			<p id="game_description"> <?php echo($names2g[0]);?></p>
		</div>
		
		
		<div class="more_top">
			<h2>Więcej informacji</h2>
		</div>
		
		<div class="more_left">
			<h2>Studio</h2>
			<p id="game_stud">	
					<?php 
						$i = 0;
						while($length5!=$i){
							if($length5-1>$i){
								print_r($names5[$i].", "); 
							}else{
								print_r($names5[$i]); 
							}
							
							$i++;
						}
					?> </p>
			
			<h2>Gatunek</h2>
			<p id="game_category">	<?php echo($names12g[0]);?></p>
			
			<h2>Tryb Multiplayer</h2>
			<p id="game_mp">	
				<?php 
					$i = 0;
					while($length6!=$i){
						if($length6-1>$i){
							print_r($names6[$i].", "); 
						}else{
							print_r($names6[$i]); 
						}
						
						$i++;
					}
			?> </p>
		</div>
		
		<div class="more_right">
			<h2>Rok wydania</h2>
			<p id="game_year">	<?php echo($names3g[0]);?> </p>
			
			<h2>Czas przejścia (wątek główny)</h2>
			<p id="game_time">	<?php echo($names4g[0]." h");?></p>
		</div>
			
			
	
		
	</div>
	
	<div id="foter">
		<center>
		<p id="fast">Szybkie linki:</p><br>
		<a href="O_projekcie.php">O projekcie</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="./rodo.php">RODO</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="https://github.com/UR-INF/20-21-ai-projekt-projekt-ai-jamrozy-iwanczyk">Dokumentacja</a>
		<br><br><br><br><br>
		@2020 <a href="https://damianjamrozy.000webhostapp.com/">Damian Jamroży</a> & Rafał Iwańczyk. <a href="LICENSE.pdf">Wszelkie prawa zastrzeżone.</a>
		</center>
	</div>

</body>
<!--	<script type="text/javascript" src="../js/show_count_all_games.js"></script>	-->


<script>

let element = document.getElementById("get_val");
let element2 = document.getElementById("get_val2");
let element3 = document.getElementById("get_val3");
let sel1 = document.getElementById("game_types");
let sel2 = document.getElementById("game_cost");
let sel3 = document.getElementById("game_count");
let sel4 = document.getElementById("game_is_yes");
let sel5 = document.getElementById("game_is_no");


// Ilość sztuk vs platforma
element.onchange = function() {
  console.log(element.value);
    if (element.value=='PC'){
		sel1.innerHTML = "<?php 
			$i = 1;
			while($g1>=$i){
				print_r('<option>'.$i.'</option>'); 
				$i++;
			}
						?>";
		sel2.innerHTML = "<?php print_r($c1[0].' PLN')?>";
		sel3.innerHTML = "<?php print_r($g1.' Kopii Gry')?>";
		sel4.innerHTML = "<?php 
			if($names17[0]!='Niedostępna' && $names17[0]!='Chwilowo niedostępna' && $g1!=0){
				print_r($names17[0]);
			}else{
				print_r('<p style=color:red>'.$names17[0].'</p>');}
				?>";
	}
	
	else if (element.value=='Xbox'){
		sel1.innerHTML = "<?php 
			$i = 1;
			while($g2>=$i){
				print_r('<option>'.$i.'</option>'); 
				$i++;
			}
						?>";
		sel2.innerHTML = "<?php print_r($c2[0].' PLN')?>";
		sel3.innerHTML = "<?php print_r($g2.' Kopii Gry')?>";
		sel4.innerHTML = "<?php 
			if($names17[0]!='Niedostępna' && $names17[0]!='Chwilowo niedostępna' && $g2!=0){
				print_r($names17[0]);
			}else{
				print_r('<p style=color:red>'.$names17[0].'</p>');}
				?>";
		
	}
	
	else if (element.value=='PlayStation'){
		sel1.innerHTML = "<?php 
			$i = 1;
			while($g3>=$i){
				print_r('<option>'.$i.'</option>'); 
				$i++;
			}
						?>";
		sel2.innerHTML = "<?php print_r($c3[0].' PLN')?>";
		sel3.innerHTML = "<?php print_r($g3.' Kopii Gry')?>";
		sel4.innerHTML = "<?php 
			if($names17[0]!='Niedostępna' && $names17[0]!='Chwilowo niedostępna' && $g3!=0){
				print_r($names17[0]);
			}else{
				print_r('<p style=color:red>'.$names17[0].'</p>');}
				?>";
	
	}
}

function updateInput(ish){
    document.getElementById("get_val").value = ish;
}


// Edycja gry
element2.onchange = function() {
  console.log(sel1.value);
	let c5 = sel1.value;
	let c6 = sel2.value;
	let c7 = sel3.value;
	
	if (element2.value=='Gracza'){
	
		if (element3.value=='Pudełkowa'){
			if (element.value=='PC'){
				let c_mnozenie = '<?php print_r((double)$c1[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10+20;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
			else if (element.value=='Xbox'){
				let c_mnozenie = '<?php print_r((double)$c2[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10+20;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp; PLN</p>';
			}
			else if (element.value=='PlayStation'){
				let c_mnozenie = '<?php print_r((double)$c3[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10+20;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p name="cena_ogolna" style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
		}else{
			if (element.value=='PC'){
				let c_mnozenie = '<?php print_r((double)$c1[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+20;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
			else if (element.value=='Xbox'){
				let c_mnozenie = '<?php print_r((double)$c2[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+20;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp; PLN</p>';
			}
			else if (element.value=='PlayStation'){
				let c_mnozenie = '<?php print_r((double)$c3[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+20;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p name="cena_ogolna" style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
		}
	}else if(element2.value=='Prze-gry.wy'){
		if (element3.value=='Pudełkowa'){
			if (element.value=='PC'){
				let c_mnozenie = '<?php print_r((double)$c1[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10+150;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
			else if (element.value=='Xbox'){
				let c_mnozenie = '<?php print_r((double)$c2[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10+150;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp; PLN</p>';
			}
			else if (element.value=='PlayStation'){
				let c_mnozenie = '<?php print_r((double)$c3[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10+150;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p name="cena_ogolna" style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
		}else{
			if (element.value=='PC'){
				let c_mnozenie = '<?php print_r((double)$c1[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+150;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
			else if (element.value=='Xbox'){
				let c_mnozenie = '<?php print_r((double)$c2[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+150;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp; PLN</p>';
			}
			else if (element.value=='PlayStation'){
				let c_mnozenie = '<?php print_r((double)$c3[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+150;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p name="cena_ogolna" style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
		}
	}else{
		if (element3.value=='Pudełkowa'){
			if (element.value=='PC'){
				let c_mnozenie = '<?php print_r((double)$c1[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
			else if (element.value=='Xbox'){
				let c_mnozenie = '<?php print_r((double)$c2[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp; PLN</p>';
			}
			else if (element.value=='PlayStation'){
				let c_mnozenie = '<?php print_r((double)$c3[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p name="cena_ogolna" style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
		}else{
			if (element.value=='PC'){
				let c_mnozenie = '<?php print_r((double)$c1[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
			else if (element.value=='Xbox'){
				let c_mnozenie = '<?php print_r((double)$c2[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp; PLN</p>';
			}
			else if (element.value=='PlayStation'){
				let c_mnozenie = '<?php print_r((double)$c3[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p name="cena_ogolna" style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
		}
	}
}

function updateInput(ish){
    document.getElementById("get_val2").value = ish;
}




// Wersja gry
element3.onchange = function() {
  console.log(sel1.value);
	let c5 = sel1.value;
	let c6 = sel2.value;
	let c7 = sel3.value;
	
	if (element2.value=='Gracza'){
	
		if (element3.value=='Pudełkowa'){
			if (element.value=='PC'){
				let c_mnozenie = '<?php print_r((double)$c1[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10+20;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
			else if (element.value=='Xbox'){
				let c_mnozenie = '<?php print_r((double)$c2[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10+20;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp; PLN</p>';
			}
			else if (element.value=='PlayStation'){
				let c_mnozenie = '<?php print_r((double)$c3[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10+20;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p name="cena_ogolna" style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
		}else{
			if (element.value=='PC'){
				let c_mnozenie = '<?php print_r((double)$c1[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+20;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
			else if (element.value=='Xbox'){
				let c_mnozenie = '<?php print_r((double)$c2[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+20;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp; PLN</p>';
			}
			else if (element.value=='PlayStation'){
				let c_mnozenie = '<?php print_r((double)$c3[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+20;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p name="cena_ogolna" style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
		}
	}else if(element2.value=='Prze-gry.wy'){
		if (element3.value=='Pudełkowa'){
			if (element.value=='PC'){
				let c_mnozenie = '<?php print_r((double)$c1[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10+150;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
			else if (element.value=='Xbox'){
				let c_mnozenie = '<?php print_r((double)$c2[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10+150;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp; PLN</p>';
			}
			else if (element.value=='PlayStation'){
				let c_mnozenie = '<?php print_r((double)$c3[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10+150;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p name="cena_ogolna" style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
		}else{
			if (element.value=='PC'){
				let c_mnozenie = '<?php print_r((double)$c1[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+150;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
			else if (element.value=='Xbox'){
				let c_mnozenie = '<?php print_r((double)$c2[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+150;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp; PLN</p>';
			}
			else if (element.value=='PlayStation'){
				let c_mnozenie = '<?php print_r((double)$c3[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+150;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p name="cena_ogolna" style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
		}
	}else{
		if (element3.value=='Pudełkowa'){
			if (element.value=='PC'){
				let c_mnozenie = '<?php print_r((double)$c1[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
			else if (element.value=='Xbox'){
				let c_mnozenie = '<?php print_r((double)$c2[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp; PLN</p>';
			}
			else if (element.value=='PlayStation'){
				let c_mnozenie = '<?php print_r((double)$c3[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p name="cena_ogolna" style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
		}else{
			if (element.value=='PC'){
				let c_mnozenie = '<?php print_r((double)$c1[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
			else if (element.value=='Xbox'){
				let c_mnozenie = '<?php print_r((double)$c2[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp; PLN</p>';
			}
			else if (element.value=='PlayStation'){
				let c_mnozenie = '<?php print_r((double)$c3[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie;
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p name="cena_ogolna" style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
		}
	}
}

function updateInput(ish){
    document.getElementById("get_val3").value = ish;
}



// Cena vs ilość sztuk
sel1.onchange = function() {
	console.log(sel1.value);
	let c5 = sel1.value;
	let c6 = sel2.value;
	let c7 = sel3.value;
	
	if (element2.value=='Gracza'){
	
		if (element3.value=='Pudełkowa'){
			if (element.value=='PC'){
				let c_mnozenie = '<?php print_r((double)$c1[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10+20;
				c_mnozenie_wyn = c_mnozenie_wyn.toFixed(2);
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
			else if (element.value=='Xbox'){
				let c_mnozenie = '<?php print_r((double)$c2[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10+20;
				c_mnozenie_wyn = c_mnozenie_wyn.toFixed(2);
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp; PLN</p>';
			}
			else if (element.value=='PlayStation'){
				let c_mnozenie = '<?php print_r((double)$c3[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10+20;
				c_mnozenie_wyn = c_mnozenie_wyn.toFixed(2);
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p name="cena_ogolna" style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
		}else{
			if (element.value=='PC'){
				let c_mnozenie = '<?php print_r((double)$c1[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+20;
				c_mnozenie_wyn = c_mnozenie_wyn.toFixed(2);
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
			else if (element.value=='Xbox'){
				let c_mnozenie = '<?php print_r((double)$c2[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+20;
				c_mnozenie_wyn = c_mnozenie_wyn.toFixed(2);
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp; PLN</p>';
			}
			else if (element.value=='PlayStation'){
				let c_mnozenie = '<?php print_r((double)$c3[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+20;
				c_mnozenie_wyn = c_mnozenie_wyn.toFixed(2);
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p name="cena_ogolna" style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
		}
	}else if(element2.value=='Prze-gry.wy'){
		if (element3.value=='Pudełkowa'){
			if (element.value=='PC'){
				let c_mnozenie = '<?php print_r((double)$c1[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10+150;
				c_mnozenie_wyn = c_mnozenie_wyn.toFixed(2);
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
			else if (element.value=='Xbox'){
				let c_mnozenie = '<?php print_r((double)$c2[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10+150;
				c_mnozenie_wyn = c_mnozenie_wyn.toFixed(2);
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp; PLN</p>';
			}
			else if (element.value=='PlayStation'){
				let c_mnozenie = '<?php print_r((double)$c3[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10+150;
				c_mnozenie_wyn = c_mnozenie_wyn.toFixed(2);
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p name="cena_ogolna" style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
		}else{
			if (element.value=='PC'){
				let c_mnozenie = '<?php print_r((double)$c1[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+150;
				c_mnozenie_wyn = c_mnozenie_wyn.toFixed(2);
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
			else if (element.value=='Xbox'){
				let c_mnozenie = '<?php print_r((double)$c2[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+150;
				c_mnozenie_wyn = c_mnozenie_wyn.toFixed(2);
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp; PLN</p>';
			}
			else if (element.value=='PlayStation'){
				let c_mnozenie = '<?php print_r((double)$c3[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+150;
				c_mnozenie_wyn = c_mnozenie_wyn.toFixed(2);
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p name="cena_ogolna" style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
		}
	}else{
		if (element3.value=='Pudełkowa'){
			if (element.value=='PC'){
				let c_mnozenie = '<?php print_r((double)$c1[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10;
				c_mnozenie_wyn = c_mnozenie_wyn.toFixed(2);
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
			else if (element.value=='Xbox'){
				let c_mnozenie = '<?php print_r((double)$c2[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10;
				c_mnozenie_wyn = c_mnozenie_wyn.toFixed(2);
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp; PLN</p>';
			}
			else if (element.value=='PlayStation'){
				let c_mnozenie = '<?php print_r((double)$c3[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie+10;
				c_mnozenie_wyn = c_mnozenie_wyn.toFixed(2);
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p name="cena_ogolna" style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
		}else{
			if (element.value=='PC'){
				let c_mnozenie = '<?php print_r((double)$c1[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie;
				c_mnozenie_wyn = c_mnozenie_wyn.toFixed(2);
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
			else if (element.value=='Xbox'){
				let c_mnozenie = '<?php print_r((double)$c2[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie;
				c_mnozenie_wyn = c_mnozenie_wyn.toFixed(2);
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp; PLN</p>';
			}
			else if (element.value=='PlayStation'){
				let c_mnozenie = '<?php print_r((double)$c3[0]); ?>';
				console.log(c_mnozenie);
				let c_mnozenie_wyn = c5*c_mnozenie;
				c_mnozenie_wyn = c_mnozenie_wyn.toFixed(2);
				sel2.innerHTML = '<input type="hidden" name="cena_ogolna" value="'+c_mnozenie_wyn+'"><p name="cena_ogolna" style="float:left; position:relative; margin-top:0; padding-top:0;">'+c_mnozenie_wyn+'</p><p style="float:left; position:relative;margin-top:0; padding-top:0;"> &nbsp;PLN</p>';
			}
		}
	}
}

function updateInput(ish){
    document.getElementById("game_count").value = ish;
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