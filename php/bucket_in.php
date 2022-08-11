<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "baza_przegrywy";
	
	$database = new mysqli('localhost', $username, $password, $dbname) or die("Nie można połączyć z bazą danych. Upewnij się że używasz php w wersji 7.0 lub nowszej.");

	// Pobieranie danych - rodzaje dostawy
	$sql1_dost = mysqli_query($database, "SELECT * FROM dostawy");

	while($row = mysqli_fetch_array($sql1_dost)) {
		$typ_dostawy[] = $row['typ_dostawy'];
		$cena_dostawy[] = $row['cena_dostawy'];
	}
	$length_dost = count($typ_dostawy);
	
	// Pobieranie danych - rodzaje płatności
	$sql1_pla = mysqli_query($database, "SELECT * FROM typ_platnosci");

	while($row = mysqli_fetch_array($sql1_pla)) {
		$typ_platnosci[] = $row['typ_platnosci'];
		$koszt_platnosci[] = $row['koszt_platnosci'];
	}
	$length_pla = count($typ_platnosci);
	
	// Pobieranie danych - sklepy
	$sql1_sklep = mysqli_query($database, "SELECT * FROM sklepy");

	while($row = mysqli_fetch_array($sql1_sklep)) {
		$id_sklepu[] = $row['id_sklepu'];
		$miasto_sklepu[] = $row['miasto_sklepu'];
		$ulica_sklepu[] = $row['ulica_sklepu'];
		$nr_lokalu[] = $row['nr_lokalu'];
		$kod_pocztowy_sklepu[] = $row['kod_pocztowy_sklepu'];
		$miejscowosc_poczty_sklepu[] = $row['miejscowosc_poczty_sklepu'];
		$numer_telefonu_sklepu[] = $row['numer_telefonu_sklepu'];
		$email_sklepu[] = $row['email_sklepu'];
		
	}
	$length_sklep = count($miasto_sklepu);
	
	
	
	//Pobieranie danych - karta lojalnościowa
	$loyality = $_SESSION['id_karty_lojalnosciowej'];
	$sql1_loj = mysqli_query($database, "SELECT * FROM karty_lojalnosciowe WHERE id_karty_lojalnosciowej=$loyality");

	while($row = mysqli_fetch_array($sql1_loj)) {
		$rabat_lojalnosciowy[] = $row['rabat_lojalnosciowy'];
		$dostawa_znizka[] = $row['dostawa_znizka'];
	}
	$length_loyal = count($typ_dostawy);
	
?>