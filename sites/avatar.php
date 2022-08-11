<html>
<head>
	<title>Avatars</title>
	<link rel="Shortcut icon" href="../img/icons/icon.ico" />

	<meta http-equiv="content-type" content="text/php"; charset="UTF-8"/> 
	<meta name="keywords" content="firma,Damian Jamroży, Rafał Iwańczyk, prze-gry, prze-gry.wy, gry, zakupy internetowe, web designer,">
	<meta name="description" content="Prze-gry.wy to firma założona przez 2 osoby o ogromnej pasji do gier cyfrowych. U nas znajdziesz najlepsze tytuły w najlepszych cenach!">
	<link rel="stylesheet" href="../style/style.css" type="text/css" />
	
	
	<?php
	print_r("<style>
	
			@media all and (min-width:770px) {
				.avatars{
					
					float: left;
					width:150px;
					height:150px;
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
			  .avatars {
				float: left;
				width:150px;
				height:150px;
				text-align: center;
				padding: 3px 1%;
				display: block;
				margin-left: 17%;
				margin-right: 1%;
				margin-bottom: 3%;
			  }
		</style>");
		
		
	
	?>
</head>
<body>

<?php
	
	ob_start();
	session_start();
	$user = 'root';
	$pass = '';
	$db = 'baza_przegrywy';

	$database = new mysqli('localhost', $user, $pass, $db) or die("Nie można połączyć z bazą danych. Upewnij się że używasz php w wersji 7.0 lub nowszej.");
	
	// Ukrywanie błędu (brak zmiennej login)
	error_reporting(0);
	ini_set('display_errors', 0);
	
	
	$login=$_SESSION['login'];

	$sqllll = "SELECT K.kod FROM zamowienia Z INNER JOIN uzytkownicy U ON Z.id_uzytkownika = U.id_uzytkownika INNER JOIN kod_rabatowy K ON Z.id_kodu_rabatowego = K.id_kodu_rabatowego WHERE U.login = '$login';";
	$sqlzap = mysqli_query($database, $sqllll);
	

		while($row = mysqli_fetch_array($sqlzap)) {
		$kod[] = $row['kod'];

		}
		// Ilość pobranych elementów
		$lengthkey = count($kod);
		
		$event=FALSE;
		$k=0;
		while($k<$lengthkey){
			if($kod[$k]=='przegrywy'){
				$event=TRUE;
			}
			$k++;
		}
	
	
	
	
	

	echo("<br><p style='color: white; font-weight:700; text-align:center;'>Wybierz swój nowy avatar.</p>");
	if($_SESSION['id_karty_lojalnosciowej']==1){
		$i = 1;
		// Get image data from database 
		$result = $database->query("SELECT upload FROM avatary WHERE pakiet='1'"); 
		 if($result->num_rows > 0){ 
			while($row = $result->fetch_assoc()){
				print_r("<center><form method='post' id='".$i."'><input type='hidden' name='form' value='".$i."'></input><a href='#' onclick='document.getElementById(sub".$i.".jpg).click();'></a><input type='submit' name='ava' id='sub'".$i." value='' class='avatars' style='
				background: url(data:image/jpg;charset=utf8;base64," .base64_encode($row['upload'])."); 
				background-repeat: no-repeat;
				background-position: center;
				background-size: cover;
				'></form></center>");
				$i++;
				}
				
			// Get image data from database 
				if($event==TRUE){
					$z=61;
					$result1 = $database->query("SELECT upload FROM avatary WHERE pakiet='6'"); 
					if($result1->num_rows > 0){ 
						while($row = $result1->fetch_assoc()){
							print_r("<center><form method='post' id='".$z."'><input type='hidden' name='form' value='".$z."'></input><a href='#' onclick='document.getElementById(sub".$z.".jpg).click();'></a><input type='submit' name='ava' id='sub'".$z." value='' class='avatars' style='
							background: url(data:image/jpg;charset=utf8;base64," .base64_encode($row['upload'])."); 
							background-repeat: no-repeat;
							background-position: center;
							background-size: cover;
							'></form></center>");
							$z++;
						}
					}
				}
				
		 }
			else{ 
			print_r('<p class="status error">Image(s) not found...</p> ');
			}
	}
	
	else if($_SESSION['id_karty_lojalnosciowej']==2){
		$i = 1;
		// Get image data from database 
		$result = $database->query("SELECT upload FROM avatary WHERE pakiet='1' OR pakiet='2'"); 
		 if($result->num_rows > 0){ 
			while($row = $result->fetch_assoc()){
				print_r("<center><form method='post' id='".$i."'><input type='hidden' name='form' value='".$i."'></input><a href='#' onclick='document.getElementById(sub".$i.".jpg).click();'></a><input type='submit' name='ava' id='sub'".$i." value='' class='avatars' style='
				background: url(data:image/jpg;charset=utf8;base64," .base64_encode($row['upload'])."); 
				background-repeat: no-repeat;
				background-position: center;
				background-size: cover;
				'></form></center>");
				$i++;
				} 
				
				// Get image data from database 
				if($event==TRUE){
					$z=61;
					$result1 = $database->query("SELECT upload FROM avatary WHERE pakiet='6'"); 
					if($result1->num_rows > 0){ 
						while($row = $result1->fetch_assoc()){
							print_r("<center><form method='post' id='".$z."'><input type='hidden' name='form' value='".$z."'></input><a href='#' onclick='document.getElementById(sub".$z.".jpg).click();'></a><input type='submit' name='ava' id='sub'".$z." value='' class='avatars' style='
							background: url(data:image/jpg;charset=utf8;base64," .base64_encode($row['upload'])."); 
							background-repeat: no-repeat;
							background-position: center;
							background-size: cover;
							'></form></center>");
							$z++;
						}
					}
				}
		 }else{ 
			print_r('<p class="status error">Image(s) not found...</p> ');
			}
	}
	
	else if($_SESSION['id_karty_lojalnosciowej']==3){
		$i = 1;
		// Get image data from database 
		$result = $database->query("SELECT upload FROM avatary WHERE pakiet='1' OR pakiet='2' OR pakiet='2'"); 
		 if($result->num_rows > 0){ 
			while($row = $result->fetch_assoc()){
				print_r("<center><form method='post' id='".$i."'><input type='hidden' name='form' value='".$i."'></input><a href='#' onclick='document.getElementById(sub".$i.".jpg).click();'></a><input type='submit' name='ava' id='sub'".$i." value='' class='avatars' style='
				background: url(data:image/jpg;charset=utf8;base64," .base64_encode($row['upload'])."); 
				background-repeat: no-repeat;
				background-position: center;
				background-size: cover;
				'></form></center>");
				$i++;
				} 
				// Get image data from database 
				if($event==TRUE){
					$z=61;
					$result1 = $database->query("SELECT upload FROM avatary WHERE pakiet='6'"); 
					if($result1->num_rows > 0){ 
						while($row = $result1->fetch_assoc()){
							print_r("<center><form method='post' id='".$z."'><input type='hidden' name='form' value='".$z."'></input><a href='#' onclick='document.getElementById(sub".$z.".jpg).click();'></a><input type='submit' name='ava' id='sub'".$z." value='' class='avatars' style='
							background: url(data:image/jpg;charset=utf8;base64," .base64_encode($row['upload'])."); 
							background-repeat: no-repeat;
							background-position: center;
							background-size: cover;
							'></form></center>");
							$z++;
						}
					}
				}
		 }else{ 
			print_r('<p class="status error">Image(s) not found...</p> ');
			}
	}
	
	else if($_SESSION['id_karty_lojalnosciowej']==4){
		$i = 1;
		// Get image data from database 
		$result = $database->query("SELECT upload FROM avatary WHERE pakiet='1' OR pakiet='2' OR pakiet='2' OR pakiet='4'"); 
		 if($result->num_rows > 0){ 
			while($row = $result->fetch_assoc()){
				print_r("<center><form method='post' id='".$i."'><input type='hidden' name='form' value='".$i."'></input><a href='#' onclick='document.getElementById(sub".$i.".jpg).click();'></a><input type='submit' name='ava' id='sub'".$i." value='' class='avatars' style='
				background: url(data:image/jpg;charset=utf8;base64," .base64_encode($row['upload'])."); 
				background-repeat: no-repeat;
				background-position: center;
				background-size: cover;
				'></form></center>");
				$i++;
				} 
				// Get image data from database 
				if($event==TRUE){
					$z=61;
					$result1 = $database->query("SELECT upload FROM avatary WHERE pakiet='6'"); 
					if($result1->num_rows > 0){ 
						while($row = $result1->fetch_assoc()){
							print_r("<center><form method='post' id='".$z."'><input type='hidden' name='form' value='".$z."'></input><a href='#' onclick='document.getElementById(sub".$z.".jpg).click();'></a><input type='submit' name='ava' id='sub'".$z." value='' class='avatars' style='
							background: url(data:image/jpg;charset=utf8;base64," .base64_encode($row['upload'])."); 
							background-repeat: no-repeat;
							background-position: center;
							background-size: cover;
							'></form></center>");
							$z++;
						}
					}
				}
		 }else{ 
			print_r('<p class="status error">Image(s) not found...</p> ');
			}
	}
	
	else if($_SESSION['id_karty_lojalnosciowej']==5){
		$i = 1;
		// Get image data from database 
		$result = $database->query("SELECT upload FROM avatary WHERE pakiet='1' OR pakiet='2' OR pakiet='3' OR pakiet='4' OR pakiet='5'"); 
		 if($result->num_rows > 0){ 
			while($row = $result->fetch_assoc()){
				print_r("<center><form method='post' id='".$i."'><input type='hidden' name='form' value='".$i."'></input><a href='#' onclick='document.getElementById(sub".$i.".jpg).click();'></a><input type='submit' name='ava' id='sub'".$i." value='' class='avatars' style='
				background: url(data:image/jpg;charset=utf8;base64," .base64_encode($row['upload'])."); 
				background-repeat: no-repeat;
				background-position: center;
				background-size: cover;
				'></form></center>");
				$i++;
				} 
				// Get image data from database 
				if($event==TRUE){
					$z=61;
					$result1 = $database->query("SELECT upload FROM avatary WHERE pakiet='6'"); 
					if($result1->num_rows > 0){ 
						while($row = $result1->fetch_assoc()){
							print_r("<center><form method='post' id='".$z."'><input type='hidden' name='form' value='".$z."'></input><a href='#' onclick='document.getElementById(sub".$z.".jpg).click();'></a><input type='submit' name='ava' id='sub'".$z." value='' class='avatars' style='
							background: url(data:image/jpg;charset=utf8;base64," .base64_encode($row['upload'])."); 
							background-repeat: no-repeat;
							background-position: center;
							background-size: cover;
							'></form></center>");
							$z++;
						}
					}
				}
		 }else{ 
			print_r('<p class="status error">Image(s) not found...</p> ');
			}
		}
	
	// Niszczenie sesji i tworzenie na nowo
	 if (isset($_POST['ava'])){
		
		$login = $_SESSION['login'];
		
		// Pobieranie imienia
		$sql1 = mysqli_query($database, "SELECT * FROM uzytkownicy WHERE login = '$login'");

		while($row = mysqli_fetch_array($sql1)) {
			$log[] = $row['login'];
		}
		 
		$av = $_POST['form'];
		$_SESSION['id_avatar'] = $av;
		$loginn = $log[0];
		
		echo($av);
		echo($log[0]);
		
		$sql_e = "UPDATE uzytkownicy SET id_avatar='$av' WHERE login='$log[0]'";
		$res_e = mysqli_query($database, $sql_e);
		
		$_SESSION['zalogowany']=false;
		$_SESSION['login'] = '';
		$_SESSION['admin'] = 0;
		$_SESSION['imie'] = '';
		$_SESSION['nazwisko'] = '';
		$_SESSION['ulica_uzytkownika'] = '';
		$_SESSION['miasto_uzytkownika'] = '';
		$_SESSION['nr_domu'] = '';
		$_SESSION['nr_lokalu'] = '';
		$_SESSION['kod_pocztowy'] = '';
		$_SESSION['miejscowosc_poczty'] = '';
		$_SESSION['email'] = '';
		$_SESSION['telefon'] = '';
		$_SESSION['id_avatar'] = '';
		$_SESSION['nr_karty'] = '';
			
		session_regenerate_id();
		session_unset();	
		
		// Otworzenine sesji na nowo w celu wprowadzenia zmian w profilu - inaczej trzeba by logować się ponownie w celu wprowadzenia zmian
		
		$_SESSION['zalogowany'] = true;
        $_SESSION['login'] = $log[0];
		// Jeżeli jest admin to przyznaj mu dostęp do admin panelu
			if (mysqli_num_rows(mysqli_query($database,"SELECT login FROM uzytkownicy WHERE login = '$log[0]' AND typ_konta='admin'")) > 0){
				$_SESSION['admin'] = 1;
			}
			else{
				$_SESSION['admin'] = 0;
			}
		// Pobieranie imienia
			$sql1 = mysqli_query($database, "SELECT * FROM uzytkownicy WHERE login = '$login'");

			while($row = mysqli_fetch_array($sql1)) {
				$names1[] = $row['imie'];
				$names2[] = $row['nazwisko'];
				$names3[] = $row['ulica_uzytkownika'];
				$names4[] = $row['miasto_uzytkownika'];
				$names5[] = $row['nr_domu'];
				$names6[] = $row['nr_lokalu'];
				$names7[] = $row['kod_pocztowy'];
				$names8[] = $row['miejscowosc_poczty'];
				$names9[] = $row['email'];
				$names10[] = $row['telefon'];
				$names11[] = $row['id_karty_lojalnosciowej'];
				$names12[] = $row['ilosc_logowan'];
				$names13[] = $row['id_avatar'];
				$names14[] = $row['nr_karty'];
			}
			$_SESSION['imie'] = $names1[0];
			$_SESSION['nazwisko'] = $names2[0];
			$_SESSION['ulica_uzytkownika'] = $names3[0];
			$_SESSION['miasto_uzytkownika'] = $names4[0];
			$_SESSION['nr_domu'] = $names5[0];
			$_SESSION['nr_lokalu'] = $names6[0];
			$_SESSION['kod_pocztowy'] = $names7[0];
			$_SESSION['miejscowosc_poczty'] = $names8[0];
			$_SESSION['email'] = $names9[0];
			$_SESSION['telefon'] = $names10[0];
			$_SESSION['id_karty_lojalnosciowej'] = $names11[0];
			$_SESSION['id_avatar'] = $names13[0];
			$_SESSION['nr_karty'] = $names14[0];
		
			echo($av);
			echo($log[0]);
		
		echo("<script>
			if (confirm('Avatar zmieniony, wszelkie zmiany zostaną wprowadzone po odświeżeniu strony. Chcesz opóścić okno wyboru?')) {
			// Save it!
			
			
			window.close();
			}</script>");
		
	}
	
?>


</body>
</html>