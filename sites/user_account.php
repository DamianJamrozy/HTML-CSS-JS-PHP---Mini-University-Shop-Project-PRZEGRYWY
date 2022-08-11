<html>
<head>
	<title>Prze-gry.wy</title>
	<link rel="Shortcut icon" href="../img/icons/icon.ico" />

	<meta http-equiv="content-type" content="text/php"; charset="UTF-8"/> 
	<meta name="keywords" content="firma,Damian Jamroży, Rafał Iwańczyk, prze-gry, prze-gry.wy, gry, zakupy internetowe, web designer,">
	<meta name="description" content="Prze-gry.wy to firma założona przez 2 osoby o ogromnej pasji do gier cyfrowych. U nas znajdziesz najlepsze tytuły w najlepszych cenach!">
	<link rel="stylesheet" href="../style/bootstrap.min.css">
	<link rel="stylesheet" href="../style/style.css" type="text/css" />
	<link rel="stylesheet" href="../style/style_games.css" type="text/css" />
	<link rel="stylesheet" href="../style/style_box.css" type="text/css" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="../style/style_messenger.css" type="text/css" />

	<?php
		session_start();
		include('../php/edit_user.php');
		include('../php/db_connection.php');

		
		// Ukrywanie błędu (brak zmiennej login)
		error_reporting(0);
		ini_set('display_errors', 0);
		
	?>
	
	<style>
		#zamowienia{
			display:none;
		}
		#changeme2{
			display:none;
		}
		
		.table-striped{
		}
		table{
			color:white;
		}
		.table{
			color:white;
			
		}
		.table-striped>tbody>tr:nth-of-type(odd){
			background: linear-gradient(0deg,rgba(0,0,0,0.3),rgba(0,0,0,0.3));
		}
	</style>
	
</head>
<body>
	<input type="hidden" id="btnClickedValue" name="btnClickedValue" value="" />
	<div id="header">
		<div id="left_head">
			<div id="left_ban"><a href="../Index.php"><img src="../img/Logo-project2.png"  id="log"></a></div>
			<b><a href="admin.php"><div class="side_right" id="admin_panel"> <center><img class="icon_hed" src="../img/icon/price.png" width="25%"><br><br>ADMIN PANEL</center></div></a>
			<b><a href="#"><div class="side_right active_men" id="client_panel"> <center><img class="icon_hed" src="../img/icon/client.png" width="25%"><br><br>MOJE KONTO</center></div></a>
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
	
		<div class="left_g"><center>
		
			<?php 
				$login = $_SESSION['login'];
				$result2 = $database->query("SELECT upload FROM avatary A INNER JOIN uzytkownicy U ON U.id_avatar=A.id_avatar WHERE U.login = '$login'"); 
				if($result2->num_rows > 0){ 
					while($row = $result2->fetch_assoc()){
						print_r("<img class='avatars' style='height:25%;' src='data:image/jpg;charset=utf8;base64," .base64_encode($row['upload'])."'>"); 
					}
				}
			?>
			<br><br><br><a href="#" onclick="avatars()">Edytuj avatar.</a><br><br><br>
			<a href="#" onclick="edit_password()">Zmień hasło.</a></center>
		</div>
		
		<div class="central_c">
			<h2> Imię & Nazwisko <a href="#" onclick="edit_name()"><img src="../img/icon/options2.png" width="3.25%"></a></h2>
			
			<p>	<?php echo($_SESSION['imie']." ". $_SESSION['nazwisko']);?></p><br>
			
			<h2>Adres zamieszkania <a href="#" onclick="edit_address()"><img src="../img/icon/options2.png" width="3.25%"></a></h2>
			<p>	<?php echo($_SESSION['miasto_uzytkownika']." ". $_SESSION['ulica_uzytkownika']." ".$_SESSION['nr_domu']." / ". $_SESSION['nr_lokalu']);?></p>
			<p>	<?php echo($_SESSION['kod_pocztowy']." ". $_SESSION['miejscowosc_poczty']);?></p><br>
			
			<h2>Kontakt <a href="#" onclick="edit_contact()"><img src="../img/icon/options2.png" width="3%"></a></h2>
			<p>	Telefon: <?php echo($_SESSION['telefon']);?> </p>
			<p> Email: <?php echo($_SESSION['email']);?> </p>
			
			
			
		</div>
		
		
		<div class="right_c">
	
			<h2>Nr. karty <a href="#" onclick="edit_k_bank()"><img src="../img/icon/options2.png" width="5%"></a></h2>
			<p>	<?php echo($_SESSION['nr_karty']);?> </p>
			
		</div>
		
		<div class="right_c_g">
			<h2>Wartość twoich gier</h2>
			<p>	<?php print_r($cost_end." PLN"); ?> </p>
			
			<h2>Ilość zamówień</h2>
			<p>	<?php print_r($length_zam); ?> </p>
			
		</div>
		
		<div class="bottom_g">
			<div class="loj_left">
				<?php 
					if($_SESSION['id_karty_lojalnosciowej']>1){
						$loj = $_SESSION['id_karty_lojalnosciowej'];
 
						$result3 = $database->query("SELECT upload FROM karty_lojalnosciowe A INNER JOIN uzytkownicy U ON U.id_karty_lojalnosciowej=A.id_karty_lojalnosciowej WHERE U.login = '$login'"); 
						if($result3->num_rows > 0){ 
							while($row = $result3->fetch_assoc()){
								print_r("<img class='avatars' style='height:20%;' src='data:image/jpg;charset=utf8;base64," .base64_encode($row['upload'])."'>"); 
							}
						}
					}
				?>
			</div>
				<?php 
					if($_SESSION['id_karty_lojalnosciowej']>1){
						if($_SESSION['id_karty_lojalnosciowej']==2){
							$loj_stat = "Brązowy";
						}
						else if($_SESSION['id_karty_lojalnosciowej']==3){
							$loj_stat = "Srebrny";
						}
						else if($_SESSION['id_karty_lojalnosciowej']==4){
							$loj_stat = "Złoty";
						}
						else if($_SESSION['id_karty_lojalnosciowej']==5){
							$loj_stat = "Platynowy";
						}
						
						echo("<div class='loj_right'>
							<h2>Karta lojalnościowa</h2>
							<p>Gratulacje! Dołączyłeś/aś do lojalnych członków naszego sklepu!</p>
							<p>Aktualny stopień członkostwa: ".$loj_stat."</p>
							<h5>Więcej informacji na temat programu lojalnościowego znajdziesz <a href='loyality.php'><u>tutaj</u></a>.</h5>
							</div>");
					}
					
				?>
		</div>
		
		<div class="bottom_g">
			<div id='changeme'><a href="#zamowienia" onclick='show_me_zamowienia()'><h2>Zamówienia&nbsp;&darr;</h2></a></div>
			<div id='changeme2'><a href="#zamowienia" onclick='hidden_me_zamowienia()'><h2>Zamówienia&uarr;</h2></a></div>
			<div id='zamowienia'>
			
			
			<div style="width:100%; margin:0 auto;">



				<table class="table table-striped table-bordered">
				<thead>
				<tr>
				<th style='width:50px;'>ID</th>
				<th style='width:400px;'>Produkty</th>
				<th style='width:150px;'>Platforma</th>
				<th style='width:150px;'>Ilość Kopii</th>
				<th style='width:150px;'>Edycja</th>
				<th style='width:150px;'>Wersja</th>
				<th style='width:150px;'>Koszt</th>
				<th style='width:150px;'>Data Zamówienia</th>
				<th style='width:150px;'>Status</th>
				</tr>
				</thead>
				<tbody>
				<?php
				if (isset($_GET['page_no']) && $_GET['page_no']!="") {
					$page_no = $_GET['page_no'];
					} else {
						$page_no = 1;
						}

					$total_records_per_page = 5;
					$offset = ($page_no-1) * $total_records_per_page;
					$previous_page = $page_no - 1;
					$next_page = $page_no + 1;
					$adjacents = "2"; 

					$result_count = mysqli_query($database,"SELECT COUNT(*) As total_records FROM `zamowienia` WHERE id_uzytkownika='".$id[0]."' ");
					$total_records = mysqli_fetch_array($result_count);
					$total_records = $total_records['total_records'];
					$total_no_of_pages = ceil($total_records / $total_records_per_page);
					$second_last = $total_no_of_pages - 1; // total page minus 1


						
						
						
						
						// Pobieranie zamowien
					$zap2 = "SELECT * FROM zamowienia WHERE id_uzytkownika='".$id[0]."' LIMIT $offset, $total_records_per_page";
					$sql_zam2 = mysqli_query($database, $zap2); 

					
					while($row = mysqli_fetch_array($sql_zam2)) {
						$i=$_SESSION['i'];
						echo ("<tr>
							   <td>".$row['id_zamowienia']."</td>
							   <td>");
							unset($game_id_table);
								
					   $i=0;
					   $zapxx4 = "SELECT id_gry FROM zamowienia_gry WHERE id_zamowienia='".$row['id_zamowienia']."' ORDER BY id_zamowienia_gry;";
						$sql_zamxx4 = mysqli_query($database, $zapxx4); 
						while($rowx3 = mysqli_fetch_array($sql_zamxx4)) {
							$game_id_table[]=$rowx3['id_gry'];
							echo("<script>console.log('elo');</script>");
							//echo($game_id_table[$i]);
							$i++;
							
						}
							   
							   
							   $it = 0;
							   
						while($it<$i){
							// Pobieranie gier
							$zap4 = "SELECT A.nazwa_gry FROM gry A WHERE A.id_gry=$game_id_table[$it];";
							$sql_zam4 = mysqli_query($database, $zap4); 
							while($row2 = mysqli_fetch_array($sql_zam4)) {	
								echo($row2['nazwa_gry']."<br><br>");
							}
							$it++;
						}  
						
					   
					echo("</td>");
					echo("<td>");
					
					
					
					// Pobieranie platform

						$zapx4 = "SELECT A.platforma FROM zamowienia_gry A WHERE A.id_zamowienia in (SELECT B.id_zamowienia FROM zamowienia B WHERE B.id_zamowienia='".$row['id_zamowienia']."') ORDER BY A.id_zamowienia_gry;";
						$sql_zamx4 = mysqli_query($database, $zapx4); 
						while($row3 = mysqli_fetch_array($sql_zamx4)) {
							echo($row3['platforma']."<br><br>");
						}

					echo("</td>");
					
					 echo("<td>");	
								
						// Pobieranie ilosci kopii

							$zap4 = "SELECT A.ilosc_kopii FROM zamowienia_gry A WHERE A.id_zamowienia in (SELECT B.id_zamowienia FROM zamowienia B WHERE B.id_zamowienia='".$row['id_zamowienia']."') ORDER BY A.id_zamowienia_gry;";
							$sql_zam4 = mysqli_query($database, $zap4); 
							$i=0;
							while($row4 = mysqli_fetch_array($sql_zam4)) {	
								echo($row4['ilosc_kopii']."<br><br>");
							}


							echo("</td>");	
					
					echo("<td>");	
						
						// Pobieranie edycji

						$zap4 = "SELECT A.edycje_gry FROM zamowienia_gry A WHERE A.id_zamowienia in (SELECT B.id_zamowienia FROM zamowienia B WHERE B.id_zamowienia='".$row['id_zamowienia']."') ORDER BY A.id_zamowienia_gry;";
						$sql_zam4 = mysqli_query($database, $zap4); 
						$i=0;
						while($row5 = mysqli_fetch_array($sql_zam4)) {	
							echo($row5['edycje_gry']."<br><br>");
						}


							 echo("</td>");	
							 
					 echo("<td>");	
						
						// Pobieranie wersji

						$zap6 = "SELECT A.wersja_gry FROM zamowienia_gry A WHERE A.id_zamowienia in (SELECT B.id_zamowienia FROM zamowienia B WHERE B.id_zamowienia='".$row['id_zamowienia']."') ORDER BY A.id_zamowienia_gry;";
						$sql_zam6 = mysqli_query($database, $zap6); 
						$i=0;
						while($row6 = mysqli_fetch_array($sql_zam6)) {	
							echo($row6['wersja_gry']."<br><br>");
						}


							 echo("</td>");
							
								
							   echo ("
							   <td>".$row['koszt_zamowienia']." PLN</td>
							   <td>".$row['data_zamowienia']."</td>
							   ");
							   // Status zamówienia
								$zap5 = "SELECT A.status FROM zamowienia Z INNER JOIN status_zamowienia A ON A.id_statusu = Z.id_statusu WHERE Z.id_zamowienia='".$row['id_zamowienia']."' ORDER BY Z.id_zamowienia";
	
								// Pobieranie statusu
								$sql_zam5 = mysqli_query($database, $zap5); 

								while($row = mysqli_fetch_array($sql_zam5)) {
									echo ("<td>".$row['status']."</td>");
								}
									}
						
					mysqli_close($database);
					?>
				</tbody>
				</table>

				<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
				<strong>Strona <?php echo $page_no." z ".$total_no_of_pages; ?></strong>
				</div>
				<center>
				<ul class="pagination">
					<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
					
					<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
					<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Poprzednia</a>
					</li>
					   
					<?php 
					if ($total_no_of_pages <= 10){  	 
						for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
							if ($counter == $page_no) {
						   echo "<li class='active'><a>$counter</a></li>";	
								}else{
						   echo "<li><a href='?page_no=$counter'>$counter</a></li>";
								}
						}
					}
					elseif($total_no_of_pages > 10){
						
					if($page_no <= 4) {			
					 for ($counter = 1; $counter < 8; $counter++){		 
							if ($counter == $page_no) {
						   echo "<li class='active'><a>$counter</a></li>";	
								}else{
						   echo "<li><a href='?page_no=$counter'>$counter</a></li>";
								}
						}
						echo "<li><a>...</a></li>";
						echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
						echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
						}

					 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
						echo "<li><a href='?page_no=1'>1</a></li>";
						echo "<li><a href='?page_no=2'>2</a></li>";
						echo "<li><a>...</a></li>";
						for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
						   if ($counter == $page_no) {
						   echo "<li class='active'><a>$counter</a></li>";	
								}else{
						   echo "<li><a href='?page_no=$counter'>$counter</a></li>";
								}                  
					   }
					   echo "<li><a>...</a></li>";
					   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
					   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
							}
						
						else {
						echo "<li><a href='?page_no=1'>1</a></li>";
						echo "<li><a href='?page_no=2'>2</a></li>";
						echo "<li><a>...</a></li>";

						for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
						  if ($counter == $page_no) {
						   echo "<li class='active'><a>$counter</a></li>";	
								}else{
						   echo "<li><a href='?page_no=$counter'>$counter</a></li>";
								}                   
								}
							}
					}
				?>
					
					<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
					<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Następna</a>
					</li>
					<?php if($page_no < $total_no_of_pages){
						echo "<li><a href='?page_no=$total_no_of_pages'>Ostatnia &rsaquo;&rsaquo;</a></li>";
						} ?>
				</ul>

		</div>
			
			
			
			
			
			
			
			</div>
			<br><br>
		</div>
		
		<!-- Edycja Imienia & Nazwiska -->
		<div class="more_top_name" id="more_top_name">
			<h2>Edycja danych</h2>
			<center>
			<form method="POST" action="../php/edit_user.php">
				<div class="more_left">
					<font size="5px">Wpisz Imię</font><br><br>
					<input type="text" name="firname" class="inpu" placeholder="<?php echo($_SESSION['imie'])?>" pattern="(?=.*[a-z])(?=.*[A-z-9ąęźżśóćńł]).{}" required>
					<br><br><br>
				</div>
				
				<div class="more_right">
					<font size="5px">Wpisz Nazwisko</font><br><br>
					<input type="text" name="surname" class="inpu" placeholder="<?php echo($_SESSION['nazwisko'])?>" pattern="(?=.*[a-z])(?=.*[A-z-9ąęźżśóćńł]).{}" required>
					<br><br><br>
				</div>
			
				<div class="form_name">
					<input type="submit" class="btn" value="ZATWIERDŹ" name="edit_name_button">
				</div>
			</form>
			</center>
		</div>
		
		<!-- Edycja adresu zamieszkania -->
		<div class="more_top_address" id="more_top_address">
			<center>
			<h2>Edycja danych</h2>
			<form method="POST" action="../php/edit_user.php">
				<div class="more_left">
					<font size="5px">Wpisz Ulicę</font><br><br>
					<input type="text" name="ulica_uzytkownika" class="inpu" placeholder="<?php echo($_SESSION['ulica_uzytkownika'])?>" pattern="(?=.*[a-z])(?=.*[A-z-9ąęźżśóćńł]).{}" >
					<br><br><br>
					
					<font size="5px">Wpisz Numer Domu</font><br><br>
					<input type="text" name="nr_domu" class="inpu" placeholder="<?php echo($_SESSION['nr_domu'])?>" pattern="(?=.*[a-z])(?=.*[A-z-9ąęźżśóćńł]).{}" required>
					<br><br><br>
				
					<font size="5px">Wpisz Kod Pocztowy</font><br><br>
					<input type="text" name="kod_pocztowy" class="inpu" placeholder="<?php echo($_SESSION['kod_pocztowy'])?>" pattern="^[0-9]{2}-[0-9]{3}$" required>
					<br><br><br>
					
				</div>
				
				<div class="more_right">
					<font size="5px">Wpisz Miejscowość</font><br><br>
					<input type="text" name="miasto_uzytkownika" class="inpu" placeholder="<?php echo($_SESSION['miasto_uzytkownika'])?>" pattern="(?=.*[a-z])(?=.*[A-z-9ąęźżśóćńł]).{}" required>
					<br><br><br>
					
					<font size="5px">Wpisz Numer Mieszkania</font><br><br>
					<input type="text" name="nr_lokalu" class="inpu" placeholder="<?php echo($_SESSION['nr_lokalu'])?>" pattern="(?=.*[0-9]).{}">
					<br><br><br>
					
					<font size="5px">Wpisz Pocztę</font><br><br>
					<input type="text" name="miejscowosc_poczty" class="inpu" placeholder="<?php echo($_SESSION['miejscowosc_poczty'])?>" pattern="(?=.*[a-z])(?=.*[A-z-9ąęźżśóćńł]).{}" required>
					<br><br><br>
					
				</div>
			
				<div class="form_name">
					<input type="submit" class="btn" value="ZATWIERDŹ" name="edit_address_button">
				</div>
			</form>
			</center>
		</div>
		
		<!-- Edycja Kontaktu -->
		<div class="more_top_contact" id="more_top_contact">
			<h2>Edycja danych</h2>
			<center>
			<form method="POST" action="../php/edit_user.php">
				<div class="more_left">
					<font size="5px">Wpisz Telefon</font><br><br>
					<input type="text" maxlength="9" name="tel" class="inpu" placeholder="<?php echo($_SESSION['telefon'])?>"  pattern="[0-9]{3}[0-9]{3}[0-9]{3}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
					<br><br><br>
				</div>
				
				<div class="more_right">
					<font size="5px">Wpisz Email</font><br><br>
					<input type="text" name="email" class="inpu" placeholder="<?php echo($_SESSION['email'])?>" required>
					<br><br><br>
				</div>
			
				<div class="form_name">
					<input type="submit" class="btn" value="ZATWIERDŹ" name="edit_contact_button">
				</div>
			</form>
			</center>
		</div>
		
		<!-- Edycja Karty -->
		<div class="more_top_contact" id="more_top_card">
			<h2>Edycja danych</h2>
			<center>
			<form method="POST" action="../php/edit_user.php">
				<div class="more" style="height: 20%;">
					<font size="5px">Wpisz Numer Karty</font><br><br>
					<input type="text" name="card" maxlength="16" minlength="16" class="inpu" placeholder="<?php echo($_SESSION['nr_karty'])?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
					<br><br><br>
				</div>
				<div class="form_name">
					<input type="submit" class="btn" value="ZATWIERDŹ" name="edit_card_button">
				</div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="../js/script_account_edit.js"></script>
<script>
	function avatars(){
		okno = window.open('avatar.php','Avatary','width=800,height=400');
	}
	
	function show_me_zamowienia(){
		let show = document.getElementById("zamowienia");
		let change = document.getElementById("changeme");
		let change2 = document.getElementById("changeme2");
		
		show.style.display = "block";
		change2.style.display = "block";
		change.style.display = "none";
		
		if(hehe>=30){
			show.innerHTML = 'Error: Administratorzy strony Prze-gry.wy wykryli usterkę. Trwa proces naprawy, proszę o cierpliwość...';
		}
		else if(30>hehe && hehe>20){
			show.innerHTML = 'Przestań spamować! Jestem błędem aplikacji... Jak będziesz spamować to mnie znajdą i moje kody rabatowe przestaną działać! :(';
		}
		else if(20>hehe && hehe>12){
			show.innerHTML = 'Muszę się ukryć bo programiści mnie szukają... Udanych zakupów!';
			hehe++;
		}
		else if(hehe==12){
			show.innerHTML = 'Kod nie działa? Upss... No tak ten kod nie daje rabatu. Użyj tego: "AI-LOVE", a otrzymasz 15% zniżki.';
			hehe++;
		}
		else if(hehe==11){
			show.innerHTML = '';
			hehe++;
		}
		else if(hehe==10){
			show.innerHTML = 'Okej... niech Ci będzie... Przy zamówieniu użyj kodu "przegrywy" to dostaniesz rabat.';
			hehe++;
		}
		else if(10>hehe>7){
			show.innerHTML = '';
			hehe++;
		}
		else if(hehe==7){
			show.innerHTML = 'No nic... to ja już sobie pójdę.';
			hehe++;
		}
		else if(hehe==6){
			show.innerHTML = 'Dobra, to już się robi nudne.';
			hehe++;
		}
		else if(hehe==5){
			show.innerHTML = 'Ehh';
			hehe++;
		}
		else if(hehe==4){
			show.innerHTML = 'Tutaj serio nic nie ma... Kup coś to się pojawi. Obiecuję...';
			hehe++;
		}
		else if(hehe==3){
			show.innerHTML = 'Dobrze się bawisz?';
			hehe++;
		}
		else if(hehe==2){
			show.innerHTML = 'Mhym...';
			hehe++;
		}
		else if(hehe==1){
			show.innerHTML = 'Serio... Tutaj nadal jest pusto, wróć po zakupach...';
			hehe++;
		}else{
			show.innerHTML = 'Przykro mi ale nie masz jeszcze zamówień. Przejdź do zakładki produkty i wybierz coś dla siebie!';
			hehe++;
		}
	}
	
	function hidden_me_zamowienia(){
		let show = document.getElementById("zamowienia");
		let change = document.getElementById("changeme");
		let change2 = document.getElementById("changeme2");
		
		show.style.display = "none";
		change2.style.display = "none";
		change.style.display = "block";
	}
	
</script>
<?php
	include('../php/edit_user.php');
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