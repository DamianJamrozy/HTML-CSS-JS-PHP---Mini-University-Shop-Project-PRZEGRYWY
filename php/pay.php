<?php

	session_start();
	$user = 'root';
	$pass = '';
	$db = 'baza_przegrywy';

	$database = new mysqli('localhost', $user, $pass, $db) or die("Nie można połączyć z bazą danych. Upewnij się że używasz php w wersji 7.0 lub nowszej.");
	// Ukrywanie błędu (brak zmiennej login)
		error_reporting(0);
		ini_set('display_errors', 0);
	
    if (isset($_POST['pay']))
    {
        $Select_dostawa = $_SESSION['Select_dostawa'];
		$Select_platnosc = $_SESSION['Select_platnosc'];
		$id_sklepu = $_SESSION['id_sklepu'];
		$kod_rabatowy = $_SESSION['kod_rabatowy'];
		$login = $_SESSION['login'];
		//$suma = $_SESSION['suma'];
		$suma = $_SESSION['zaplata'];
		$ulica=$_SESSION['ul_zam'];
		$nr_domu=$_SESSION['nr_dom_zam'];
		$nr_mieszkania=$_SESSION['nr_m_zam'];
		$kod_pocztowy=$_SESSION['k_poczt_zam'];
		$poczta=$_SESSION['poczt_zam'];
		$email=$_SESSION['email_zam'];
		$miejscowosc=$_SESSION['mias_zam'];
		$tel=$_SESSION['tel'];
		$imie=$_SESSION['imie'];
		$nazwisko=$_SESSION['nazwisko'];
		$suma=round($suma, 2);

		
		if($id_sklepu==NULL){
			$id_sklepu='1';
		}
		
		// Pobieranie danych - id_usera
		$sql_login_to_id = mysqli_query($database, "SELECT id_uzytkownika FROM uzytkownicy WHERE login='".$login."'");

		while($row = mysqli_fetch_array($sql_login_to_id)) {
			$id_user[] = $row['id_uzytkownika'];
		}
		$id_usera=$id_user[0];
		
		
		
		
		
		// Pobieranie danych - id_dostawy
		$sql_id_dost = mysqli_query($database, "SELECT id_dostawy FROM dostawy WHERE typ_dostawy='".$Select_dostawa."'");
		
		while($row = mysqli_fetch_array($sql_id_dost)) {
			$id_dost[] = $row['id_dostawy'];
		}
		$id_dostawy=$id_dost[0];
		
		if($kod_rabatowy!=''){
			// Pobieranie danych - id kodu rabatowego
			$sql_id_k_rab = mysqli_query($database, "SELECT id_kodu_rabatowego FROM kod_rabatowy WHERE kod='".$kod_rabatowy."'");
			
			while($row = mysqli_fetch_array($sql_id_k_rab)) {
				$id_rab[] = $row['id_kodu_rabatowego'];
			}
			$id_k_rab=$id_rab[0];
		}else{
			$id_k_rab='NULL';
		}
		
		
		// Pobieranie danych - id typu płatności
		$sql_id_t_plat = mysqli_query($database, "SELECT id_typu_platnosci FROM typ_platnosci WHERE typ_platnosci='".$Select_platnosc."'");
		
		while($row = mysqli_fetch_array($sql_id_t_plat)) {
			$id_plat[] = $row['id_typu_platnosci'];
		}
		$id_platnosci=$id_plat[0];
		
		$t=time();
		$date = date("Y-m-d",$t);
		
		// echo($id_usera." ". $id_dostawy." ". $id_k_rab." ".$id_platnosci." ".$id_sklepu." 1 ".$date." ".$suma." ".$ulica." ".$miejscowosc." ".$nr_domu." ".$kod_pocztowy." ".$poczta." ".$nr_mieszkania." ".$email);
		
		
		//Dodanie do bazy - zamówienia
		$sql="INSERT INTO `zamowienia` (`id_zamowienia`, `id_uzytkownika`, `id_dostawy`, `id_kodu_rabatowego`, `id_typ_platnosci`, `id_sklepu`, `id_statusu`, `data_zamowienia`, `koszt_zamowienia`, `ulica_dostawy`, `miasto_dostawy`, `nr_domu_dostawy`, `kod_pocztowy_dostawy`, `poczta`, `nr_lokalu`, `email`, `telefon`, `imie`, `nazwisko`) VALUES (NULL, '".$id_usera."', '".$id_dostawy."', ".$id_k_rab.", '".$id_platnosci."', '".$id_sklepu."', '1', '".$date."', '".$suma."', '".$ulica."', '".$miejscowosc."', '".$nr_domu."', '".$kod_pocztowy."', '".$poczta."', '".$nr_mieszkania."', '".$email."', '".$tel."', '".$imie."', '".$nazwisko."')";
		
		

		// Wstawianie danych do tabel
		//$sql_k_rab = mysqli_query($database, $sql);
		
		
		if ($database->query($sql) === TRUE) {
		  echo "";
		} else {
		  echo "Error: " . $sql . "<br>" . $database->error;
		}

		
		
		
		
		$i=0;
		while($i<$_SESSION['count_store']){
			
			// print_r("".$_SESSION['del'][$i]." >");
			
			$sql1 = "SELECT id_zamowienia FROM zamowienia ORDER BY id_zamowienia DESC LIMIT 1";
			$sql1_1 = mysqli_query($database, $sql1);
			while($row = mysqli_fetch_array($sql1_1)) {
				$id_zamowienia = $row['id_zamowienia'];
			}

			
			// Dodawanie połączeń
			$sql2 = "INSERT INTO `zamowienia_gry` (`id_zamowienia`, `id_gry`,`ilosc_kopii`,`platforma`,`wersja_gry`,`edycje_gry`)VALUES(".$id_zamowienia.",".$_SESSION['id_gry'][$i].",".$_SESSION['Ilosc_kopii'][$i].",'".$_SESSION['Platforma'][$i]."','".$_SESSION['Wersja'][$i]."','".$_SESSION['Edycja'][$i]."')";
			
			if ($database->query($sql2) === TRUE) {
			  echo "";
			} else {
			  echo "Error: " . $sql2 . "<br>" . $database->error;
			}
			
			
			// Wypisanie ilości sprzedanych kopii
			$sql3 = "SELECT ilosc_sprzedanych FROM gry WHERE id_gry=".$_SESSION['id_gry'][$i]."";
			$sql3_1 = mysqli_query($database, $sql3);
			while($row = mysqli_fetch_array($sql3_1)) {
				$ilosc_sprzedanych[] = $row['ilosc_sprzedanych'];
			}
			
			
			// Aktualizacja ilości sprzedanych kopii
			$ilosc_sprzedanych_ost = $ilosc_sprzedanych[0] + $_SESSION['Ilosc_kopii'][$i];
			$sql4 = "UPDATE `gry` SET ilosc_sprzedanych=".$ilosc_sprzedanych_ost." WHERE id_gry=".$_SESSION['id_gry'][$i].";";
			
			if ($database->query($sql4) === TRUE) {
			  echo "";
			} else {
			  echo "Error: " . $sql4 . "<br>" . $database->error;
			}
			
			
			// Wypisanie ilości obecnych kopii
			$sql5 = "SELECT ilosc_sztuk FROM platformy_gry WHERE id_gry=".$_SESSION['id_gry'][$i]."";
			$sql5_1 = mysqli_query($database, $sql5);
			while($row = mysqli_fetch_array($sql5_1)) {
				$ilosc_obecnych[] = $row['ilosc_sztuk'];
			}
			
			echo($_SESSION['Platforma'][$i]);
			// Wypisanie id_platformy
			$sql6 = "SELECT id_platformy FROM platformy WHERE typ_platformy='".$_SESSION['Platforma'][$i]."'";
			$sql6_1 = mysqli_query($database, $sql6);
			while($row = mysqli_fetch_array($sql6_1)) {
				$id_platformy[] = $row['id_platformy'];
			}
			
			
			// Aktualizacja ilości sprzedanych kopii
			$ilosc_obecnych_ost = $ilosc_obecnych[0] - $_SESSION['Ilosc_kopii'][$i];
			$sql7 = "UPDATE `platformy_gry` SET ilosc_sztuk=".$ilosc_obecnych_ost." WHERE id_gry=".$_SESSION['id_gry'][$i]." AND id_platformy=".$id_platformy[0].";";
			
			if ($database->query($sql7) === TRUE) {
			  echo "";
			} else {
			  echo "Error: " . $sql7 . "<br>" . $database->error;
			}
			
			
			$i++;
		}
		
		
		
		$login = $_SESSION['login'];
		
		// Pobieranie imienia
		$sql1 = mysqli_query($database, "SELECT * FROM uzytkownicy WHERE login = '$login'");

		while($row = mysqli_fetch_array($sql1)) {
			$log[] = $row['login'];
		}
		
		$loginn = $log[0];
		
		
		
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
		$_SESSION['imie'] = '';
		$_SESSION['nazwisko']='';
			
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
		

		echo('<script> 
			alert("Zamówienie zostało dodane pomyślnie.");
			window.location = "../Index.php";
			</script>');
		
	}else{
		echo('<script> 
			 alert("Brak gier w koszyku.");
			 window.location = "../Index.php";
			 </script>');
	}
	
	
    
    
?>