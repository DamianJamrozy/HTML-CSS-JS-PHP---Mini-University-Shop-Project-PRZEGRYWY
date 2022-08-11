<html>
<head>
	<title>Prze-gry.wy</title>
	<link rel="Shortcut icon" href="../img/icons/icon.ico" />

	<meta http-equiv="content-type" content="text/php"; charset="UTF-8"/> 
	<meta name="keywords" content="firma,Damian Jamroży, Rafał Iwańczyk, prze-gry, prze-gry.wy, gry, zakupy internetowe, web designer,">
	<meta name="description" content="Prze-gry.wy to firma założona przez 2 osoby o ogromnej pasji do gier cyfrowych. U nas znajdziesz najlepsze tytuły w najlepszych cenach!">
	<link rel="stylesheet" href="../style/style.css" type="text/css" />
	<link rel="stylesheet" href="../style/style_bucket.css" type="text/css" />
	<link rel="stylesheet" href="../style/style_messenger.css" type="text/css" />
	<?php
		session_start();
		include('../php/db_connection.php');
		// Ukrywanie błędu (brak zmiennej login)
		error_reporting(0);
		ini_set('display_errors', 0);

	include('../php/bucket_in.php');
	?>
	
</head>
<body>
	<div id="header">
		<div id="left_head">
			<div id="left_ban"><a href="../Index.php"><img src="../img/Logo-project2.png"  id="log"></a></div>
			<b><a href="admin.php"><div class="side_right" id="admin_panel"> <center><style="padding-top: 14%;"><img class="icon_hed" src="../img/icon/price.png" width="25%"><br><br>ADMIN PANEL</center></div></a>
			<b><a href="user_account.php"><div class="side_right" id="client_panel"> <center><img class="icon_hed" src="../img/icon/client.png" width="25%"><br><br>MOJE KONTO</center></div></a>
			<b><a href="moderator/messenger_moderator.php"><div class="side_right" id="moderator_panel"> <center><img class="icon_hed" src="../img/icon/clients.png" width="25%"><br><br>Wiadomości</center></div></a>
			
		</div>
		
		<div id="right_head">
			<a href="me.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/me.png" width="25%"><br><br>O SKLEPIE</center></div></a>
			<a href="../Index.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/home.png" width="25%"><br><br>HOME</center></div></a>
			<a href="contact.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/phone.png" width="25%"><br><br>KONTAKT</center></div></a>
			<a href="brand.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/game.png" width="25%"><br><br>PRODUKTY</center></div></a>
			<a href="bucket.php"><div class="side active_men"> <center><img class="icon_hed" src="../img/icon/bucket.png" width="25%"><br><br>KOSZYK</center></div></a>
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
	
	<center><div id="content">
		<font size="300px">Koszyk</font><br><br>
		<div id="empty">
			Niestety twój koszyk jest pusty. Przejdź do zakładki produkty i dodaj coś do koszyka!
		</div>
		<div id="not_empty">
			<?php 
				
				$i=0;
				//$ii=0;
				if (isset($_SESSION['count_store']) && $_SESSION['count_store']>0){
					
					print_r("<table style='color:white; font-weight:700;'>");
					print_r("<tr><th>Okładka gry</th><th>Id Gry</th><th>Nazwa Gry</th><th>Platforma</th><th>Edycja</th><th>Wersja</th><th>Ilość kopii</th><th>Cena</th><th>Anuluj zamówienie</th></tr>");
					
					while($i<$_SESSION['count_store']){
						print_r("<tr><th><hr></th><th><hr></th><th><hr></th><th><hr></th><th><hr></th><th><hr></th><th><hr></th><th><hr></th><th><hr></th> </tr>");
						print_r("<tr><form method='POST' action='../php/bucket_cancel_script.php'>");
						print_r("<th><img src='data:image/jpg;charset=utf8;base64," .base64_encode($_SESSION['grafika'][$i])."' height='150px'> </th>");
						print_r("<th>".$_SESSION['id_gry'][$i]." </th>");
						print_r("<th>".$_SESSION['game'][$i]." </th>");
						print_r("<th>".$_SESSION['Platforma'][$i]." </th>");
						print_r("<th>".$_SESSION['Edycja'][$i]." </th>");
						print_r("<th>".$_SESSION['Wersja'][$i]." </th>");
						print_r("<th>".$_SESSION['Ilosc_kopii'][$i]." </th>");
						print_r("<th>".$_SESSION['Cena_ogolna'][$i]." </th>");
						print_r("<th><center>".$_SESSION['del'][$i]." </th></tr>");
						print_r("</form>");
						$i++;
						print_r("<script>console.log('".$i."')</script>");
						print_r("<style>#del".$i."{display:none;}</style>");
					}
					print_r("</table>");
					
					print_r("<form method='POST' action='sum_bucket.php'>");
					// Liczenie sumy zamówienia
					$j=0;
					$suma = 0;
					while($j<$_SESSION['count_store']){
						$suma = $suma + $_SESSION['Cena_ogolna'][$j];
						$j++;
					}
					$sum_no_loyal = $suma;
					$suma = $suma - $suma * $rabat_lojalnosciowy[0]/100;
					$suma = round($suma, 2);
					
					
					$_SESSION['suma']=$suma;
					
					if($_SESSION['id_karty_lojalnosciowej']>0){
						print_r("<h2><p id='cena'>Cena zamówienia: <p id='cens' style='display:inline-block;'>".$suma."</p> PLN</p>");
						print_r("<p><h5>Do twojego zamówienia doliczyliśmy rabaty lojalnościowe.<br>Więcej informacji na temat programu lojalościowego znajdziesz <a href='loyality.php'>tutaj</a>.</h5></p><br><br><br>");
					}else{
						print_r("<h2><p id='cena'>Cena zamówienia: <p id='cens'>".$suma."</p></p><br><br><br>");
					}
					
				}
				
				
				
			?>
			
			<div class='left' id='ll'>
				<h3>Wybierz rodzaj dostawy</h3>
				<select class='select' name='Select_dostawa' id='get_dost' required>  
				<option>Rodzaj dostawy</option>
					<?php 
						$j=0;
						$dostawa = FALSE;
						while($j<$_SESSION['count_store']){
							if($_SESSION['Wersja'][$j]=='Pudełkowa'){
								$dostawa = TRUE;
							}
							$j++;
						}
						if($dostawa == TRUE){
							$ii = 1;
							while($length_dost!=$ii){
								print_r("<option id='pay_dos".$ii."'>".$typ_dostawy[$ii]."</option>  "); 
								$ii++;
							}
							
						}else if($dostawa == FALSE){
							$ii=0;
							while($length_dost!=$ii){
								print_r("<option id='pay_dos".$ii."'>".$typ_dostawy[$ii]."</option>  "); 
								$ii++;
							}
						}
					
						
					?>
				</select>	
			</div>
			<div class='right' id='rr'>
				<h3>Wybierz typ płatności</h3>
				<select class='select' name='Select_platnosc' id='get_pla' required>  
				<option>Typ płatności</option>
					<?php 
						$ii = 0;
						while($length_pla!=$ii){
							if($koszt_platnosci[$ii]==1){
								print_r("<option id='pay_op".$ii."'>".$typ_platnosci[$ii]."</option>"); 
							}
							else{
								print_r("<option id='pay_op".$ii."'>".$typ_platnosci[$ii]."</option>"); 
							}
							$ii++;
						}
					?>
				</select>
			</div>
			
			<div class='center_bucket' id='cc'>
				<input type='radio' name='auto' id='auto' onclick='autofill()'>Autouzupełnienie danych<br><br>
				<h5>Kod rabatowy: <input type="text" name="kod_rabatowy" vakue=" " placeholder="RA8AT"></h5> 
			</div>
			
			<div class='left' id='ll2'>
				<h3>Imię</h3>
				<input class='inpu' type='text' name='imie' id='imie' placeholder='Imię' pattern="(?=.*[a-z])(?=.*[A-z-9ąęźżśóćńł]).{}" required>
				<h3>Nr. telefonu</h3>
				<input class='inpu' type='text' name='tel' id='telefon' maxlength="9" placeholder="123456789" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
				<div id='dostawal'>
					
				</div>
			</div>
			
			<div class='right' id='rr2'>
				<h3>Nazwisko</h3>
				<input class='inpu' type='text' name='nazwisko' id='nazwisko' placeholder='Nazwisko' pattern="(?=.*[a-z])(?=.*[A-z-9ąęźżśóćńł]).{}" required>
				<h3>E-mail</h3>
				<input class='inpu' type='text' name='email' id='email' placeholder="email@domain.com" required>
				<div id='dostawar'>
		
				</div>
			</div>
			
			<div id='sklep' class='center_bucket'>
				
			</div>
			
			<div id='sklep2' class='center_bucket'>
				
			</div>
			<div id='accept_form' class='center_bucket'>
				
			</div>
			
			
		</div>
	</div></center>
	
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

	let element = document.getElementById("get_dost");
	let element2 = document.getElementById("get_pla");
	let dostawal = document.getElementById("dostawal");
	let dostawar = document.getElementById("dostawar");
	let sklep = document.getElementById("sklep");
	let sklep2 = document.getElementById("sklep2");
	let accept_form = document.getElementById("accept_form");
	let cena = document.getElementById("cens");
	let auto = document.getElementById("auto");


	// Ilość sztuk vs platforma
	element.onchange = function() {
	  console.log(element.value);
		if (element.value=='Kurierem' || element.value=='Kurierem za pobraniem'){
			let op = document.getElementById("pay_op2");
			op.disabled = false ;
			dostawal.innerHTML = "<h3>Ulica</h3><input id='ulica' class='inpu' type='text' name='ulica' placeholder='Ulica'><h3>Nr. domu</h3><input id='nr_domu' class='inpu' type='text' name='nr_domu' placeholder='Nr. domu' required><h3>Kod pocztowy</h3><input id='kod_pocztowy' name='kod_pocztowy' class='inpu' type='text' placeholder='Kod-pocztowy' pattern='^[0-9]{2}-[0-9]{3}$' required>";
			dostawar.innerHTML ="<h3>Miejscowość</h3><input id='miejscowosc' name='miejscowosc' class='inpu' type='text' placeholder='Miejscowość' required><h3>Nr. mieszkania</h3><input id='nr_mieszkania' name='nr_mieszkania' class='inpu' type='text' placeholder='Nr. mieszkania'><h3>Poczta</h3><input id='poczta' name='poczta' class='inpu' type='text' placeholder='Poczta' required>";
			sklep.innerHTML = "";
			sklep2.innerHTML = "";
			if(element.value=='Kurierem'){
				let op = document.getElementById("pay_op2");
				op.disabled = true ;
				<?php
				$dost = 15 - 15 * $dostawa_znizka[0]/100;
				$suma_transp = $suma + $dost;
				?>
				cena.innerHTML = <?php print_r($suma_transp)?>;
			}
			else{
				<?php
				$dost = 25 - 25 * $dostawa_znizka[0]/100;
				$suma_transp = $suma + $dost;
				?>
				cena.innerHTML = <?php print_r($suma_transp)?>;
			}
			if(element2.value=='SMS'){
				if(element.value=='Kurierem'){
				<?php
				$dost = 15 - 15 * $dostawa_znizka[0]/100;
				$suma_transp = $suma *2 + $dost;
				?>
				cena.innerHTML = <?php print_r($suma_transp)?>;
				}
				else if(element.value=='Kurierem za pobraniem'){
					<?php
					$dost = 25 - 25 * $dostawa_znizka[0]/100;
					$suma_transp = $suma*2 + $dost;
					?>
					cena.innerHTML = <?php print_r($suma_transp)?>;
				}
				else{
					<?php
					$suma_transp = $suma*2;
					?>
					cena.innerHTML = <?php print_r($suma_transp)?>;
				}
			}
			
			accept_form.innerHTML = "<br><input type=submit class=btn value=akceptuj name=zamowienie_platnosc><br><br><br></form>";
		}
		else if (element.value=='Odbiór w sklepie'){
			let op = document.getElementById("pay_op2");
			op.disabled = false ;
			sklep.innerHTML = "<h3>Wybierz lokalizację sklepu</h3><br><select class='select' name='Select_shop' id='get_shop' required>  <option>Lokalizacja sklepu</option><?php $ii = 0; while($length_sklep!=$ii){print_r('<option>'.$miasto_sklepu[$ii].'</option>');$ii++;}?></select>";
			dostawar.innerHTML = "";
			dostawal.innerHTML = "";
			sklep2.innerHTML = "";
			if(element2.value=='SMS'){
				<?php
				$suma_transp = $suma*2;
				?>
				cena.innerHTML = <?php print_r($suma_transp)?>;
			}else{
				cena.innerHTML = <?php print_r($suma)?>;
			}
			
			accept_form.innerHTML = "<br><input type=submit class=btn value=akceptuj name=zamowienie_platnosc_sklep><br><br><br></form>";
			
			// 
			let element3 = document.getElementById("get_shop");
			element3.onchange = function() {
			  console.log(element3.value);
			  let x = document.getElementById("get_shop").value;
			  let z=0;
			  <?php 
				$z=0;
				while($z<$length_sklep){
					$test = '
						if("'.$miasto_sklepu[$z].'" == x){
							console.log("'.$ulica_sklepu[$z].'");
							console.log("'.$nr_lokalu[$z].'");
							console.log("'.$kod_pocztowy_sklepu[$z].'");
							console.log("'.$miejscowosc_poczty_sklepu[$z].'");
							console.log("'.$numer_telefonu_sklepu[$z].'");
							console.log("'.$email_sklepu[$z].'");
							sklep2.innerHTML = "<input type=hidden value='.$id_sklepu[$z].' name=id_sklepu><br><br><h3>Adres: '.$miasto_sklepu[$z].'  '.$ulica_sklepu[$z].'  '.$nr_lokalu[$z].'<br>  '.$kod_pocztowy_sklepu[$z].'  '.$miejscowosc_poczty_sklepu[$z].'</h3><h3>Telefon:  '.$numer_telefonu_sklepu[$z].'</h3><h3>E-mail:  '.$email_sklepu[$z].'</h3>";
							accept_form.innerHTML = "<br><input type=submit class=btn value=akceptuj name=zamowienie_platnosc_sklep><br><br><br></form>";
					}';
					print_r($test);
					$z++;
				}
			  ?>
			}
			
			function updateInput(ish){
				document.getElementById("get_shop").value = ish;
			}
		}else if (element.value=='CK-KEY - Mail'){
			let op = document.getElementById("pay_op2");
			op.disabled = true ;
			sklep.innerHTML = "";
			sklep2.innerHTML = "";
			dostawar.innerHTML = "";
			dostawal.innerHTML = "";
			accept_form.innerHTML = "<br><input type=submit class=btn value=akceptuj name=zamowienie_platnosc_cd><br><br><br></form>";
		}
		
	}

	function updateInput(ish){
		document.getElementById("get_dost").value = ish;
	}
	
	element2.onchange = function(){
		console.log(element2.value);
		if(element2.value=='SMS'){
			if(element.value=='Kurierem'){
				let op = document.getElementById("pay_op2");
				op.disabled = true ;
			<?php
			$dost = 15 - 15 * $dostawa_znizka[0]/100;
			$suma_transp = $suma *2 + $dost;
			?>
			cena.innerHTML = <?php print_r($suma_transp)?>;
			}
			else if(element.value=='Kurierem za pobraniem'){
				<?php
				$dost = 25 - 25 * $dostawa_znizka[0]/100;
				$suma_transp = $suma *2 + $dost;
				?>
				cena.innerHTML = <?php print_r($suma_transp)?>;
			}
			else{
				<?php
				$suma_transp = $suma*2;
				?>
				cena.innerHTML = <?php print_r($suma_transp)?>;
			}
		}else{
			if(element.value=='Kurierem'){
			<?php
				$dost = 15 - 15 * $dostawa_znizka[0]/100;
				$suma_transp = $suma + $dost;
			?>
			cena.innerHTML = <?php print_r($suma_transp)?>;
			}
			else if(element.value=='Kurierem za pobraniem'){
				<?php
				$dost = 25 - 25 * $dostawa_znizka[0]/100;
				$suma_transp = $suma + $dost;
				?>
				cena.innerHTML = <?php print_r($suma_transp)?>;
			}
			else{
				cena.innerHTML = <?php print_r($suma)?>;
			}
		}
		
		if(element2.value=='Gotówka'){
			let opp = document.getElementById("pay_dos0");
			let opp2 = document.getElementById("pay_dos2");
			opp.disabled = true ;
			opp2.disabled = true ;
		}else{
			let opp = document.getElementById("pay_dos0");
			let opp2 = document.getElementById("pay_dos2");
			opp.disabled = false ;
			opp2.disabled = false ;
		}
	}
	
	function updateInput(ish){
		document.getElementById("get_pla").value = ish;
	}
	
	function autofill(){
		document.getElementById("imie").value = "<?php print_r($_SESSION['imie']); ?>";
		document.getElementById("nazwisko").value = "<?php  print_r($_SESSION['nazwisko']); ?>";
		document.getElementById("telefon").value = "<?php  print_r($_SESSION['telefon']); ?>";
		document.getElementById("email").value = "<?php  print_r($_SESSION['email']); ?>";
		if(element.value=='Kurierem za pobraniem' || element.value=='Kurierem'){
			document.getElementById("ulica").value = "<?php print_r($_SESSION['ulica_uzytkownika']); ?>";
			document.getElementById("nr_domu").value = "<?php  print_r($_SESSION['nr_domu']); ?>";
			document.getElementById("miejscowosc").value = "<?php  print_r($_SESSION['miasto_uzytkownika']); ?>";
			document.getElementById("nr_mieszkania").value = "<?php  print_r($_SESSION['nr_lokalu']); ?>";
			document.getElementById("poczta").value = "<?php  print_r($_SESSION['miejscowosc_poczty']); ?>";
			document.getElementById("kod_pocztowy").value = "<?php  print_r($_SESSION['kod_pocztowy']); ?>";
		}
	console.log("Automatyczne dodawanie treści aktywowane");
	}
	
</script>

<?php
	if (isset($_SESSION['count_store']) && $_SESSION['count_store']>0){
		echo('<script> 
			let empty = document.getElementById("empty");
			let not_empty = document.getElementById("not_empty");
			let ll = document.getElementById("ll");
			let rr = document.getElementById("rr");
			let rr2 = document.getElementById("rr2");
			let ll2 = document.getElementById("ll2");
			let cc = document.getElementById("cc");

			ll.style.display = "block";
			rr.style.display = "block";
			rr2.style.display = "block";
			ll2.style.display = "block";
			cc.style.display = "block";
			
			
			empty.style.display = "none";
			not_empty.style.display = "block";
			ll.style.display = "block";
			rr.style.display = "block";
			</script>');
	}else{
		echo('<script> 
			let ll = document.getElementById("ll");
			let rr = document.getElementById("rr");
			let rr2 = document.getElementById("rr2");
			let ll2 = document.getElementById("ll2");
			let cc = document.getElementById("cc");

			ll.style.display = "none";
			rr.style.display = "none";
			rr2.style.display = "none";
			ll2.style.display = "none";
			cc.style.display = "none";
			</script>');
	}
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