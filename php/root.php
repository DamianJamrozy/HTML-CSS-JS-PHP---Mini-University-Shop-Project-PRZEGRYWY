<?php


	$servername = "localhost";
	$user = "root";
	$pass = "";
	$db = "baza_przegrywy";
	
	$database = new mysqli('localhost', $user, $pass, $db) or die("Nie można połączyć z bazą danych. Upewnij się że używasz php w wersji 7.0 lub nowszej.");

	// Users
	if (isset($_POST['delete_user']))
    {
		$delete_id = $_POST['Select_id_stat_del'];
		// sql to delete a record
		  $sql = "DELETE FROM uzytkownicy WHERE login='$delete_id'";

			if ($database->query($sql) === TRUE) {
			  echo "<script>alert('Konto zostało usunięte.'); window.location = '../sites/admin/admin_uzytkownicy.php';</script>";
			} else {
			  echo "Error: " . $sql . "<br>" . $database->error;
			}
	} 
		
	
	if (isset($_POST['edit_type']))
    {
		$edit_id = $_POST['Select_id_stat'];
		$status = $_POST['Select_stat'];
		$sql = "UPDATE uzytkownicy SET typ_konta='$status' WHERE login='$edit_id'";

		 if ($database->query($sql) === TRUE) {
			   echo "<script>alert('Typ konta został pomyślnie edytowany.'); window.location = '../sites/admin/admin_uzytkownicy.php';</script>";
			} else {
			  echo "Error: " . $sql . "<br>" . $database->error;
			}
	}
	
	
	
	// Zamówienia
	if (isset($_POST['delete_order']))
    {
		$delete_id = $_POST['Select_id_stat_del'];
		// sql to delete a record
		  $sqlx = "DELETE FROM zamowienia WHERE id_zamowienia='$delete_id'";
		  $sqly = "DELETE FROM zamowienia_gry WHERE id_zamowienia='$delete_id'";
			if ($database->query($sqly) === TRUE) {
			  echo "";
			} else {
			  echo "Error: " . $sqly . "<br>" . $database->error;
			}
			if ($database->query($sqlx) === TRUE) {
			  echo "<script>alert('Zamówienie zostało usunięte.'); window.location = '../sites/admin/admin_content.php';</script>";
			} else {
			  echo "Error: " . $sqlx . "<br>" . $database->error;
			}
	} 
	
	
	
	if (isset($_POST['edit_status']))
    {
		$edit_id = $_POST['Select_id_stat'];
		$status = $_POST['Select_stat'];
		
	// Pobieranie danych - userów
		$sql = "SELECT id_statusu FROM status_zamowienia WHERE status='".$status."'";
		$sql_stats = mysqli_query($database, $sql);

		while($row = mysqli_fetch_array($sql_stats)) {
			$id_statusuu[] = $row['id_statusu'];
		}
		$id_stats = $id_statusuu[0];
		
		echo($id_stats);
		echo($edit_id);
		
		$sqls = "UPDATE zamowienia SET id_statusu='$id_stats' WHERE id_zamowienia='$edit_id'";

		if ($database->query($sqls) === TRUE) {
			  echo "<script>alert('Status zamówienia został zmieniony.'); window.location = '../sites/admin.php';</script>";
			} else {
			  echo "Error: " . $sqls . "<br>" . $database->error;
			}
		
		
	}
	
	
	// Wydawca
	if (isset($_POST['delete_wydawca']))
    {
		$delete_id = $_POST['Select_id_stat_del'];
		  $sqlx = "DELETE FROM wydawca WHERE nazwa_wydawcy='$delete_id'";
			if ($database->query($sqlx) === TRUE) {
			  echo "<script>alert('Wydawca został usunięty.'); window.location = '../sites/admin/admin_wydawca.php';</script>";
			} else {
			  echo "Error: " . $sqlx . "<br>" . $database->error;
			}
	} 
	
	
	
	if (isset($_POST['edit_wydawca']))
    {
		$edit_id = $_POST['Select_id_stat'];
		$status = $_POST['Select_stat'];
		
		$sqls = "UPDATE wydawca SET nazwa_wydawcy='$status' WHERE nazwa_wydawcy='$edit_id'";

		 if ($database->query($sqls) === TRUE) {
			  echo "<script>alert('Pomyślnie edytowano nazwę wydawcy.'); window.location = '../sites/admin/admin_wydawca.php';</script>";
			} else {
			  echo "Error: " . $sqls . "<br>" . $database->error;
			}
	}
	
	if (isset($_POST['add_wydawca']))
    {
		$edit_id = $_POST['Select_name'];
		
		$sqls = "INSERT INTO wydawca(nazwa_wydawcy) VALUES ($edit_id)";

		 if ($database->query($sqls) === TRUE) {
			  echo "<script>alert('Pomyślnie dodano wydawcę.'); window.location = '../sites/admin.php';</script>";
			} else {
			  echo "Error: " . $sqls . "<br>" . $database->error;
			}
	}
	
	
	
	// Studia
	if (isset($_POST['delete_studio']))
    {
		$delete_id = $_POST['Select_id_stat_del'];
		  $sqlx = "DELETE FROM studia WHERE nazwa_studia='$delete_id'";
			if ($database->query($sqlx) === TRUE) {
			  echo "<script>alert('Studio zostało usunięte.'); window.location = '../sites/admin/admin_wydawca.php';</script>";
			} else {
			  echo "Error: " . $sqlx . "<br>" . $database->error;
			}
	}
	
	
	
	if (isset($_POST['edit_studio']))
    {
		$edit_id = $_POST['Select_id_stat'];
		$status = $_POST['Select_stat'];
		
		
		$sqls = "UPDATE studia SET nazwa_studia='$status' WHERE nazwa_studia='$edit_id'";

		 if ($database->query($sqls) === TRUE) {
			  echo "<script>alert('Pomyślnie edytowano nazwę studia.'); window.location = '../sites/admin/admin_wydawca.php';</script>";
			} else {
			  echo "Error: " . $sqls . "<br>" . $database->error;
			}
	}
	
	if (isset($_POST['add_studio']))
    {
		$edit_id = $_POST['Select_name'];
		

		$sqls = "INSERT INTO studia(nazwa_studia) VALUES ($edit_id)";

		 if ($database->query($sqls) === TRUE) {
			  echo "<script>alert('Pomyślnie dodano studio.'); window.location = '../sites/admin.php';</script>";
			} else {
			  echo "Error: " . $sqls . "<br>" . $database->error;
			}
	}
	
	
	// Edycje
	if (isset($_POST['delete_edition']))
    {
		$delete_id = $_POST['Select_id_stat_del'];
		  $sqlx = "DELETE FROM edycje WHERE typ_edycji='$delete_id'";
			if ($database->query($sqlx) === TRUE) {
			  echo "<script>alert('Edycja została usunięta.'); window.location = '../sites/admin.php';</script>";
			} else {
			  echo "Error: " . $sqlx . "<br>" . $database->error;
			}
	}
	
	
	
	if (isset($_POST['edit_edition']))
    {
		$edit_id = $_POST['Select_id_stat'];
		$status = $_POST['Select_stat'];
		$benefits = $_POST['Select_benefit'];
		$benefits_ok = nl2br($benefits);
		
		
		$sqls = "UPDATE edycje SET typ_edycji='$status', benefity='$benefits_ok' WHERE typ_edycji='$edit_id';";

		 if ($database->query($sqls) === TRUE) {
			  echo "<script>alert('Pomyślnie edytowano edycję.'); window.location = '../sites/admin.php';</script>";
			  echo($sqls);
			} else {
			  echo "Error: " . $sqls . "<br>" . $database->error;
			}
	}
	
	if (isset($_POST['add_edition']))
    {
		$edit_id = $_POST['Select_name'];
		$status = $_POST['Select_name'];
		$benefits = $_POST['Select_benefit'];
		$benefits_ok = nl2br($benefits);

		$sqls = "INSERT INTO `edycje`(`id_edycji`, `typ_edycji`, `benefity`) VALUES ('NULL','$status','$benefits_ok');";

		 if ($database->query($sqls) === TRUE) {
			  echo "<script>alert('Pomyślnie dodano edycję.'); window.location = '../sites/admin.php';</script>";
			} else {
			  echo "Error: " . $sqls . "<br>" . $database->error;
			}
	}
	
	
	// Wersje
	if (isset($_POST['delete_version']))
    {
		$delete_id = $_POST['Select_id_stat_del'];
		  $sqlx = "DELETE FROM wersje WHERE typ_wersji='$delete_id'";
			if ($database->query($sqlx) === TRUE) {
			  echo "<script>alert('Wersja została usunięta.'); window.location = '../sites/admin.php';</script>";
			} else {
			  echo "Error: " . $sqlx . "<br>" . $database->error;
			}
	}
	
	
	
	if (isset($_POST['edit_version']))
    {
		$edit_id = $_POST['Select_id_stat'];
		$status = $_POST['Select_stat'];
		
		
		$sqls = "UPDATE wersje SET typ_wersji='$status' WHERE typ_wersji='$edit_id';";

		 if ($database->query($sqls) === TRUE) {
			  echo "<script>alert('Pomyślnie edytowano wersję.'); window.location = '../sites/admin.php';</script>";
			  echo($sqls);
			} else {
			  echo "Error: " . $sqls . "<br>" . $database->error;
			}
	}
	
	if (isset($_POST['add_version']))
    {
		$edit_id = $_POST['Select_name'];
		$status = $_POST['Select_name'];

		$sqls = "INSERT INTO `wersje`(`id_wersji`, `typ_wersji`) VALUES ('NULL','$status');";

		 if ($database->query($sqls) === TRUE) {
			  echo "<script>alert('Pomyślnie dodano wersję.'); window.location = '../sites/admin.php';</script>";
			} else {
			  echo "Error: " . $sqls . "<br>" . $database->error;
			}
	}
	
	
	// Uzupełnienie
	
	if (isset($_POST['add_supplies']))
    {
		$edit_id = $_POST['Select_id_stat'];
		$status = $_POST['Select_stat'];
		$number = $_POST['Select_number'];
		
		$sqlsup = "SELECT id_gry FROM gry WHERE nazwa_gry='$edit_id'";
		$sqlsupp = mysqli_query($database, $sqlsup); 

		while($rowz = mysqli_fetch_array($sqlsupp)) {
			$edit_name = $rowz['id_gry'];
		}
		
		$sqlsup = "SELECT id_platformy FROM platformy WHERE typ_platformy='$status'";
		$sqlsupp = mysqli_query($database, $sqlsup); 

		while($rowz = mysqli_fetch_array($sqlsupp)) {
			$id_plat = $rowz['id_platformy'];
		}
		
		// Sprawdzenie ile aktualnie jest sztuk danej gry
		$sqlsup = "SELECT ilosc_sztuk FROM platformy_gry WHERE id_gry='$edit_name' AND id_platformy='$id_plat'";
		$sqlsupp = mysqli_query($database, $sqlsup); 

		while($rowz = mysqli_fetch_array($sqlsupp)) {
			$number_old = $rowz['ilosc_sztuk'];
		}
		
		$number_sum = $number_old+$number;
		
		
		
		$sqls = "UPDATE platformy_gry SET ilosc_sztuk='$number_sum' WHERE id_gry='$edit_name' AND id_platformy='$id_plat'";

		 if ($database->query($sqls) === TRUE) {
			  echo "<script>alert('Pomyślnie zmieniono ilość kopii gry.'); window.location = '../sites/admin.php';</script>";
			} else {
			  echo "Error: " . $sqls . "<br>" . $database->error;
			}
	}
	
	if (isset($_POST['add_cost']))
    {
		$edit_id = $_POST['Select_id_stat'];
		$status = $_POST['Select_stat'];
		$number = $_POST['Select_number'];
		
		$sqlsup = "SELECT id_platformy FROM platformy WHERE typ_platformy='$status'";
		$sqlsupp = mysqli_query($database, $sqlsup); 

		while($rowz = mysqli_fetch_array($sqlsupp)) {
			$id_plat = $rowz['id_platformy'];
		}
		
		$sqlsup = "SELECT id_gry FROM gry WHERE nazwa_gry='$edit_id'";
		$sqlsupp = mysqli_query($database, $sqlsup); 

		while($rowz = mysqli_fetch_array($sqlsupp)) {
			$edit_name = $rowz['id_gry'];
		}
		
		
		
		$sqls = "UPDATE platformy_gry SET cena='$number' WHERE id_gry='$edit_name' AND id_platformy='$id_plat'";

		 if ($database->query($sqls) === TRUE) {
			  echo "<script>alert('Pomyślnie zmieniono cenę gry.'); window.location = '../sites/admin.php';</script>";
			} else {
			  echo "Error: " . $sqls . "<br>" . $database->error;
			}
	}
	
	
	
	
	
	
//Pobieranie danych
	
	
	// Pobieranie danych - userów
		$sql_login_to_id = mysqli_query($database, "SELECT * FROM uzytkownicy");

		while($row = mysqli_fetch_array($sql_login_to_id)) {
			$id_user[] = $row['id_uzytkownika'];
			$logins[] = $row['login'];
			$imie[] = $row['imie'];
			$nazwisko[] = $row['nazwisko'];
			$typ_konta[] = $row['typ_konta'];
			$data_logowania[] = $row['data_logowania'];
			$telefon[] = $row['telefon'];
		}
		$length_user = count($logins);
		
		
		
		
	$zap2 = "SELECT * FROM status_zamowienia";
	$sql_zam2 = mysqli_query($database, $zap2); 

	while($row = mysqli_fetch_array($sql_zam2)) {
		$stat_all[] = $row['status'];	
	}
	$length_stat = count($stat_all);
		
		
	// CD-KEY
	// Pobieranie zamowien
	$zap2 = "SELECT * FROM zamowienia WHERE id_dostawy=1 AND id_statusu=1 OR id_dostawy=1 AND id_statusu=2 OR id_dostawy=1 AND id_statusu=3 OR id_dostawy=1 AND id_statusu=4 ORDER BY id_zamowienia";
	$sql_zam2 = mysqli_query($database, $zap2); 

	while($row = mysqli_fetch_array($sql_zam2)) {
		$id_zamX[] = $row['id_zamowienia'];
		$id_statX[] = $row['id_statusu'];
		$data_zamX[] = $row['data_zamowienia'];
		$koszt_zamX[] = $row['koszt_zamowienia'];
		$emailX[] = $row['email'];
	}
	
	// Pobieranie zamowien_gry
	$zap3 = "SELECT A.* FROM zamowienia_gry A WHERE A.id_zamowienia in (SELECT B.id_zamowienia FROM zamowienia B)";
	$sql_zam3 = mysqli_query($database, $zap3); 

	while($row = mysqli_fetch_array($sql_zam3)) {
		$id_zam_gryX[] = $row['id_gry'];
		$kopie_zamX[] = $row['ilosc_kopii'];
	}
	$length_zamX = count($id_zamX);
	$length_gameX = count($id_zam_gryX);
	
	// SKLEP
	// Pobieranie zamowien
	$zap2 = "SELECT * FROM zamowienia WHERE id_dostawy=2 AND id_statusu=1 OR id_dostawy=2 AND id_statusu=2 OR id_dostawy=2 AND id_statusu=3 OR id_dostawy=2 AND id_statusu=4 OR id_dostawy=2 AND id_statusu=7 ORDER BY id_zamowienia";
	$sql_zam2 = mysqli_query($database, $zap2); 

	while($row = mysqli_fetch_array($sql_zam2)) {
		$id_zamY[] = $row['id_zamowienia'];
		$id_statY[] = $row['id_statusu'];
		$data_zamY[] = $row['data_zamowienia'];
		$koszt_zamY[] = $row['koszt_zamowienia'];
		$telefonY[] = $row['telefon'];
		$id_sklepuY[] = $row['id_sklepu'];
	}
	
	// Pobieranie zamowien_gry
	$zap3 = "SELECT A.* FROM zamowienia_gry A WHERE A.id_zamowienia in (SELECT B.id_zamowienia FROM zamowienia B)";
	$sql_zam3 = mysqli_query($database, $zap3); 

	while($row = mysqli_fetch_array($sql_zam3)) {
		$id_zam_gryY[] = $row['id_gry'];
		$kopie_zamY[] = $row['ilosc_kopii'];
	}
	$length_zamY = count($id_zamY);
	$length_gameY = count($id_zam_gryY);
	
	
	
	
		
	// Pobieranie zamowien
	$zap2 = "SELECT * FROM zamowienia WHERE id_dostawy=3 AND id_statusu=1 OR id_dostawy=3 AND id_statusu=2 OR id_dostawy=3 AND id_statusu=3 OR id_dostawy=3 AND id_statusu=4 OR id_dostawy=4 AND id_statusu=1 OR id_dostawy=4 AND id_statusu=2 OR id_dostawy=4 AND id_statusu=3 OR id_dostawy=4 AND id_statusu=4 ORDER BY id_zamowienia";
	$sql_zam2 = mysqli_query($database, $zap2); 

	while($row = mysqli_fetch_array($sql_zam2)) {
		$id_zamZ[] = $row['id_zamowienia'];
		$id_statZ[] = $row['id_statusu'];
		$data_zamZ[] = $row['data_zamowienia'];
		$koszt_zamZ[] = $row['koszt_zamowienia'];
		$telefonZ[] = $row['telefon'];
		$id_sklepuZ[] = $row['id_sklepu'];
		
		$ulica_dostawyZ[] = $row['ulica_dostawy'];
		$miasto_dostawyZ[] = $row['miasto_dostawy'];
		$nr_domu_dostawyZ[] = $row['nr_domu_dostawy'];
		$nr_lokaluZ[] = $row['nr_lokalu'];
		$kod_pocztowy_dostawyZ[] = $row['kod_pocztowy_dostawy'];
		$pocztaZ[] = $row['poczta'];
	}
	
	
	// Pobieranie zamowien_gry
	$zap3 = "SELECT A.* FROM zamowienia_gry A WHERE A.id_zamowienia in (SELECT B.id_zamowienia FROM zamowienia B)";
	$sql_zam3 = mysqli_query($database, $zap3); 

	while($row = mysqli_fetch_array($sql_zam3)) {
		$id_zam_gryZ[] = $row['id_gry'];
		$kopie_zamZ[] = $row['ilosc_kopii'];
	}
	$length_zamZ = count($id_zamZ);
	$length_gameZ = count($id_zam_gryZ);
	
	
	
		
	// Archiwum
	
	
	// Pobieranie zamowien
	$zap2 = "SELECT * FROM zamowienia WHERE id_statusu=5 OR id_statusu=6 ORDER BY id_zamowienia";
	$sql_zam2 = mysqli_query($database, $zap2); 

	while($row = mysqli_fetch_array($sql_zam2)) {
		$id_zamQ[] = $row['id_zamowienia'];
		$id_statQ[] = $row['id_statusu'];
		$data_zamQ[] = $row['data_zamowienia'];
		$koszt_zamQ[] = $row['koszt_zamowienia'];
		$telefonQ[] = $row['telefon'];
		$emailQ[] = $row['email'];
		$id_sklepuQ[] = $row['id_sklepu'];
		
		$ulica_dostawyQ[] = $row['ulica_dostawy'];
		$miasto_dostawyQ[] = $row['miasto_dostawy'];
		$nr_domu_dostawyQ[] = $row['nr_domu_dostawy'];
		$nr_lokaluQ[] = $row['nr_lokalu'];
		$kod_pocztowy_dostawyQ[] = $row['kod_pocztowy_dostawy'];
		$pocztaQ[] = $row['poczta'];
	}
	
	
	// Pobieranie zamowien_gry
	$zap3 = "SELECT A.* FROM zamowienia_gry A WHERE A.id_zamowienia in (SELECT B.id_zamowienia FROM zamowienia B)";
	$sql_zam3 = mysqli_query($database, $zap3); 

	while($row = mysqli_fetch_array($sql_zam3)) {
		$id_zam_gryQ[] = $row['id_gry'];
		$kopie_zamQ[] = $row['ilosc_kopii'];
	}
	$length_zamQ = count($id_zamQ);
	$length_gameQ = count($id_zam_gryQ);
	

	
		
	// Pobieranie wydawców
	$zap2 = "SELECT * FROM wydawca";
	$sql_zam2 = mysqli_query($database, $zap2); 

	while($row = mysqli_fetch_array($sql_zam2)) {
		$id_wydawcy[] = $row['id_wydawcy'];
		$nazwa_wydawcy[] = $row['nazwa_wydawcy'];
	}
	$length_wyd = count($id_wydawcy);
	
	
	// Pobieranie studia
	$zap2 = "SELECT * FROM studia";
	$sql_zam2 = mysqli_query($database, $zap2); 

	while($row = mysqli_fetch_array($sql_zam2)) {
		$id_studia[] = $row['id_studia'];
		$nazwa_studia[] = $row['nazwa_studia'];
	}
	$length_stud = count($id_studia);
	
	
	// Pobieranie edycji
	$zap2 = "SELECT * FROM edycje";
	$sql_zam2 = mysqli_query($database, $zap2); 

	while($row = mysqli_fetch_array($sql_zam2)) {
		$id_edycji[] = $row['id_edycji'];
		$typ_edycji[] = $row['typ_edycji'];
	}
	$length_edit = count($id_edycji);
	
	// Pobieranie wersji
	$zap2 = "SELECT * FROM wersje";
	$sql_zam2 = mysqli_query($database, $zap2); 

	while($row = mysqli_fetch_array($sql_zam2)) {
		$id_wersji[] = $row['id_wersji'];
		$typ_wersji[] = $row['typ_wersji'];
	}
	$length_ver = count($id_wersji);
	
	// Pobieranie gier
	$zap2 = "SELECT * FROM gry";
	$sql_zam2 = mysqli_query($database, $zap2); 

	while($row = mysqli_fetch_array($sql_zam2)) {
		$id_gry[] = $row['id_gry'];
		$id_game[] = $row['id_gry'];
		$game_name[] = $row['nazwa_gry'];
	}
	$length_game = count($id_gry);
	
	// Pobieranie platform
	$zap2 = "SELECT * FROM platformy";
	$sql_zam2 = mysqli_query($database, $zap2); 

	while($row = mysqli_fetch_array($sql_zam2)) {
		$id_platformy[] = $row['id_platformy'];
		$typ_platformy[] = $row['typ_platformy'];
	}
	$length_platf = count($id_platformy);
	
	// Pobieranie zamowien_gry
	$zap3 = "SELECT id_zamowienia FROM zamowienia";
	$sql_zam3 = mysqli_query($database, $zap3); 

	while($row = mysqli_fetch_array($sql_zam3)) {
		$id_zam_all[] = $row['id_zamowienia'];
	}
	$length_zam_all = count($id_zam_all);
	

	// Pobieranie pegi
	$zap3 = "SELECT symbol FROM pegi";
	$sql_zam3 = mysqli_query($database, $zap3); 

	while($row = mysqli_fetch_array($sql_zam3)) {
		$peg[] = $row['symbol'];
	}
	$length_pegi = count($peg);
	
	// Pobieranie gatunku
	$zap3 = "SELECT * FROM gatunki";
	$sql_zam3 = mysqli_query($database, $zap3); 

	while($row = mysqli_fetch_array($sql_zam3)) {
		$id_gatunku[] = $row['id_gatunku'];
		$gat[] = $row['nazwa_gatunku'];
	}
	$length_gat = count($id_gatunku);
	
	// Pobieranie dostępności
	$zap3 = "SELECT * FROM dostepnosc";
	$sql_zam3 = mysqli_query($database, $zap3); 

	while($row = mysqli_fetch_array($sql_zam3)) {
		$id_dostepnosci[] = $row['id_dostepnosci'];
		$stat_doste[] = $row['status_dostepnosci'];
	}
	$length_doste = count($id_dostepnosci);
	
	// Pobieranie trybu gry
	$zap3 = "SELECT * FROM tryb_gry";
	$sql_zam3 = mysqli_query($database, $zap3); 

	while($row = mysqli_fetch_array($sql_zam3)) {
		$id_trybu_gry[] = $row['id_trybu_gry'];
		$tryb_rozgrywki[] = $row['tryb_rozgrywki'];
	}
	$length_trybu = count($id_trybu_gry);
	
	// Pobieranie zarobków
	$sql_money= mysqli_query($database, "SELECT koszt_zamowienia FROM zamowienia");

	while($row = mysqli_fetch_array($sql_money)) {
		$money_all[] = $row['koszt_zamowienia'];
	}
	$length_money = count($money_all);
	$i=0;
	$money_sum_all = 0;
	while($i<$length_money){
		$money_sum_all=$money_sum_all+$money_all[$i];
		$i++;
	}
	
	// Pobieranie zarobków z tego roku
	$sql_money= mysqli_query($database, "SELECT koszt_zamowienia FROM zamowienia WHERE EXTRACT(YEAR FROM data_zamowienia)=EXTRACT(YEAR FROM CURRENT_DATE)");

	while($row = mysqli_fetch_array($sql_money)) {
		$money_this_year[] = $row['koszt_zamowienia'];
	}
	$length_money_ty = count($money_this_year);
	$i=0;
	$money_sum_this_year = 0;
	while($i<$length_money_ty){
		$money_sum_this_year=$money_sum_this_year+$money_this_year[$i];
		$i++;
	}
	
	// Pobieranie zarobków z poprzedniego roku
	$sql_login_to_id = mysqli_query($database, "SELECT koszt_zamowienia FROM zamowienia WHERE YEAR(data_zamowienia) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 YEAR))");

		while($row = mysqli_fetch_array($sql_login_to_id)) {
			$money_last_year[] = $row['koszt_zamowienia'];
		}
	$length_money_ly = count($money_last_year);
	$i=0;
	$money_sum_last_year = 0;
	while($i<$length_money_ly){
		$money_sum_last_year=$money_sum_last_year+$money_last_year[$i];
		$i++;
	}
	
	// Pobieranie zarobków z tego miesiąca
	$sql_login_to_id = mysqli_query($database, "SELECT koszt_zamowienia FROM zamowienia WHERE EXTRACT(MONTH FROM data_zamowienia)=EXTRACT(MONTH FROM CURRENT_DATE)");

		while($row = mysqli_fetch_array($sql_login_to_id)) {
			$money_this_month[] = $row['koszt_zamowienia'];
		}
	$length_money_tm = count($money_this_month);
	$i=0;
	$money_sum_this_month = 0;
	while($i<$length_money_tm){
		$money_sum_this_month=$money_sum_this_month+$money_this_month[$i];
		$i++;
	}
	
	// Pobieranie ilości adminów
	$sql_admin = mysqli_query($database, "SELECT COUNT(*) FROM uzytkownicy WHERE typ_konta='admin'");

		while($row = mysqli_fetch_array($sql_admin)) {
			$account_admin = $row['COUNT(*)'];
		}
	// Pobieranie ilości moderatorów
	$sql_admin = mysqli_query($database, "SELECT COUNT(*) FROM uzytkownicy WHERE typ_konta='moderator'");

		while($row = mysqli_fetch_array($sql_admin)) {
			$account_moderator = $row['COUNT(*)'];
		}
	// Pobieranie ilości userów
	$sql_admin = mysqli_query($database, "SELECT COUNT(*) FROM uzytkownicy WHERE typ_konta='user'");

		while($row = mysqli_fetch_array($sql_admin)) {
			$account_user = $row['COUNT(*)'];
		}
		
		
		
		
	// Liczenie kosztu zamówień - w tym roku
	$sql_login_to_id = mysqli_query($database, "SELECT koszt_zamowienia, EXTRACT(MONTH FROM data_zamowienia) FROM zamowienia WHERE EXTRACT(YEAR FROM data_zamowienia)=EXTRACT(YEAR FROM CURRENT_DATE)");

	while($row = mysqli_fetch_array($sql_login_to_id)) {
		$koszt_zamowienia[] = $row['koszt_zamowienia'];
		$data_zamowienia[] = $row['EXTRACT(MONTH FROM data_zamowienia)'];
		
	}
	$length_dat = count($koszt_zamowienia);
	$i=0;
	$j=1;
	$suma=0;
	$x=1;
	while($x<13){
		if($data_zamowienia[$i]==$j){
			$suma=$suma+$koszt_zamowienia[$i];
		}else{
			${'suma'.$j}=$suma;
			$j++;
			$i--;
			$suma=0;
			$x++;
		}
		$i++;
	}


 
	$dataPoints = array(
		array("y" => $suma1, "label" => "Styczeń"),
		array("y" => $suma2, "label" => "Luty"),
		array("y" => $suma3, "label" => "Marzec"),
		array("y" => $suma4, "label" => "Kwiecień"),
		array("y" => $suma5, "label" => "Maj"),
		array("y" => $suma6, "label" => "Czerwiec"),
		array("y" => $suma7, "label" => "Lipiec"),
		array("y" => $suma8, "label" => "Sierpień"),
		array("y" => $suma9, "label" => "Wrzesień"),
		array("y" => $suma10, "label" => "Październik"),
		array("y" => $suma11, "label" => "Listopad"),
		array("y" => $suma12, "label" => "Grudzień")
	);
	
	
	
	// Liczenie ilości userów - rejestracje w tym roku
	$sql_login_to_id = mysqli_query($database, "SELECT id_uzytkownika, EXTRACT(MONTH FROM data_rejestracji) FROM uzytkownicy WHERE EXTRACT(YEAR FROM data_rejestracji)=EXTRACT(YEAR FROM CURRENT_DATE) ORDER BY EXTRACT(MONTH FROM data_rejestracji)");

	while($row = mysqli_fetch_array($sql_login_to_id)) {
		$data_rejestracji[] = $row['EXTRACT(MONTH FROM data_rejestracji)'];
		$rejestracje[] = $row['id_uzytkownika'];
	}
	$i=0;
	$j=1;
	$rejestr=0;
	$x=1;
	$r=0;
	while($x<13){
		if($data_rejestracji[$i]==$j){
			$rejestr++;
			$r++;
			//echo("<script>console.log($rejestr)</script>");
		}else{
			${'rejestr'.$j}=$rejestr;
			$j++;
			$i--;
			$rejestr=0;
			$x++;
			//echo("<script>console.log('dupsko')</script>");
		}
		$i++;
	}
	

	$dataPoints2 = array(
		array("y" => $rejestr1, "label" => "Styczeń"),
		array("y" => $rejestr2, "label" => "Luty"),
		array("y" => $rejestr3, "label" => "Marzec"),
		array("y" => $rejestr4, "label" => "Kwiecień"),
		array("y" => $rejestr5, "label" => "Maj"),
		array("y" => $rejestr6, "label" => "Czerwiec"),
		array("y" => $rejestr7, "label" => "Lipiec"),
		array("y" => $rejestr8, "label" => "Sierpień"),
		array("y" => $rejestr9, "label" => "Wrzesień"),
		array("y" => $rejestr10, "label" => "Październik"),
		array("y" => $rejestr11, "label" => "Listopad"),
		array("y" => $rejestr12, "label" => "Grudzień")
	);
	
		
	
	
	
		
	
	
	
	
	// Gry
		// Dodawanie gry
	if (isset($_POST['add_game']))
    {
		// Uzupełnianie encji - gry
		$Select_wyd = $_POST['Select_wyd'];
		$Select_gatunek = $_POST['Select_gatunek'];
		$Select_status = $_POST['Select_status'];
		$Select_pegi = $_POST['Select_pegi'];
		
		$Select_game_name = $_POST['Select_game_name'];
		//$Select_photo = $_POST['Select_photo'];
		$Select_opis = $_POST['Select_opis'];
		$Select_opis = nl2br($Select_opis); // Dodanie znaków <br> zamiast enterów
		$Select_data = $_POST['Select_data'];
		$Select_time = $_POST['Select_time'];
		
		$imgData = addslashes(file_get_contents($_FILES['Select_photo']['tmp_name']));
		$imageProperties = getimageSize($_FILES['Select_photo']['tmp_name']);
		
		
		//echo("pegi:".$Select_pegi."<br>");


		// Pobieranie id wydawcy
		$zap1 = "SELECT id_wydawcy FROM wydawca WHERE nazwa_wydawcy='$Select_wyd'";
		$sql1 = mysqli_query($database, $zap1); 

		while($rows1 = mysqli_fetch_array($sql1)) {
			$id_wydawcy_gry = $rows1['id_wydawcy'];
		}
		
		// Pobieranie id gatunku
		$zap2 = "SELECT id_gatunku FROM gatunki WHERE nazwa_gatunku='$Select_gatunek'";
		$sql2 = mysqli_query($database, $zap2); 

		while($rows2 = mysqli_fetch_array($sql2)) {
			$id_gatunek_gry = $rows2['id_gatunku'];
		}
		
		// Pobieranie id dostępności
		$zap3 = "SELECT id_dostepnosci FROM dostepnosc WHERE status_dostepnosci='$Select_status'";
		$sql3 = mysqli_query($database, $zap3); 

		while($rows3 = mysqli_fetch_array($sql3)) {
			$id_dostepnosci_gry = $rows3['id_dostepnosci'];
		}
		
		// Pobieranie id pegi
		$zap4 = "SELECT id_pegi FROM pegi WHERE symbol='$Select_pegi'";
		$sql4 = mysqli_query($database, $zap4); 

		while($rows4 = mysqli_fetch_array($sql4)) {
			$id_pegi_gry = $rows4['id_pegi'];
		}
		
		
			// DODANIE INFORMACJI DO ENCJI GRY
		$sqls = "INSERT INTO `gry`(`id_gry`, `id_wydawcy`, `id_gatunku`, `id_dostepnosci`, `id_pegi`, `nazwa_gry`, `grafika`, `opis_gry`, `rok_wydania`, `czas_przejscia`, `ilosc_sprzedanych`) VALUES ('NULL','$id_wydawcy_gry','$id_gatunek_gry','$id_dostepnosci_gry','$id_pegi_gry','$Select_game_name','{$imgData}','$Select_opis','$Select_data','$Select_time','0');";

		 if ($database->query($sqls) === TRUE) {
			  echo "";
			} else {
				echo "Error: " . $sqls . "<br>" . $database->error;
			}
		
		
		// Pobieranie id gry
		$zap4 = "SELECT id_gry FROM gry ORDER BY id_gry DESC";
		$sql4 = mysqli_query($database, $zap4); 

		while($rows4 = mysqli_fetch_array($sql4)) {
			$id_last[] = $rows4['id_gry'];
		}
		$id_last_game = $id_last[0];
		
		
		
		
		// Checkbox edycja
		$i=0;
		while($i<$length_edit){
			if (isset($_POST['Select_edition'.$i])){
				${"Select_edition$i"}=$_POST['Select_edition'.$i];
				//$Select_edition .$i = $_POST['Select_edition'.$i];
				//echo(${"Select_edition$i"});
				
				// Pobieranie edycji
				$zap2 = "SELECT id_edycji FROM edycje WHERE typ_edycji='$typ_edycji[$i]'";
				$sql_zam2 = mysqli_query($database, $zap2); 

				while($row = mysqli_fetch_array($sql_zam2)) {
					$id_edycji_g = $row['id_edycji'];
				}
				
				// DODANIE INFORMACJI DO ENCJI edycja_gry
				$sqls = "INSERT INTO `edycje_gry`(`id_edycji_gry`, `id_edycji`, `id_gry`) VALUES ('NULL','$id_edycji_g','$id_last_game');";

				 if ($database->query($sqls) === TRUE) {
					  //echo "<script>alert('Pomyślnie dodano grę.'); window.location = '../sites/admin.php';</script>";
					  echo "";
					} else {
						echo "Error: " . $sqls . "<br>" . $database->error;
					}
			}
			$i++;
		}
		
		// Checkbox wersja
		$i=0;
		while($i<$length_ver){
			if (isset($_POST['Select_version'.$i]))
			{
				${"Select_version$i"}=$_POST['Select_version'.$i];
				//$Select_edition .$i = $_POST['Select_edition'.$i];
				//echo(${"Select_version$i"});
				
			// Pobieranie id wersji
				$zap2 = "SELECT id_wersji FROM wersje WHERE typ_wersji='$typ_wersji[$i]'";
				$sql_zam2 = mysqli_query($database, $zap2); 

				while($row = mysqli_fetch_array($sql_zam2)) {
					$id_wersji_g = $row['id_wersji'];
				}
				
				// DODANIE INFORMACJI DO ENCJI edycja_gry
				$sqls = "INSERT INTO `wersje_gry`(`id_wersji_gry`, `id_wersji`, `id_gry`) VALUES ('NULL','$id_wersji_g','$id_last_game');";

				 if ($database->query($sqls) === TRUE) {
					  //echo "<script>alert('Pomyślnie dodano grę.'); window.location = '../sites/admin.php';</script>";
					  echo "";
					} else {
						echo "Error: " . $sqls . "<br>" . $database->error;
					}
			}
			$i++;
		}
		
		// Checkbox tryb gry
		$i=0;
		while($i<$length_trybu){
			if (isset($_POST['Select_tryb'.$i]))
			{
				${"Select_tryb$i"}=$_POST['Select_tryb'.$i];
				//$Select_edition .$i = $_POST['Select_edition'.$i];
				//echo(${"Select_tryb$i"});
				
				
				// Pobieranie id trybu gry
				$zap2 = "SELECT id_trybu_gry FROM tryb_gry WHERE tryb_rozgrywki='$tryb_rozgrywki[$i]'";
				$sql_zam2 = mysqli_query($database, $zap2); 

				while($row = mysqli_fetch_array($sql_zam2)) {
					$id_trybu_g = $row['id_trybu_gry'];
				}
				
				// DODANIE INFORMACJI DO ENCJI tryb_gry_gra
				$sqls = "INSERT INTO `tryb_gry_gra`(`id_tryb_gry_gry`, `id_gry`, `id_trybu_gry`) VALUES ('NULL','$id_last_game', '$id_trybu_g');";

				 if ($database->query($sqls) === TRUE) {
					  //echo "<script>alert('Pomyślnie dodano grę.'); window.location = '../sites/admin.php';</script>";
					  echo "";
					} else {
						echo "Error: " . $sqls . "<br>" . $database->error;
					}
			}
			$i++;
		}
		
		// Checkbox platformy
		$i=0;
		while($i<$length_trybu){
			if (isset($_POST['Select_platform'.$i]))
			{
				${"Select_platform$i"}=$_POST['Select_platform'.$i];
				//$Select_edition .$i = $_POST['Select_edition'.$i];
				$Select_cena= $_POST['Select_cena'.$i];
				$Select_ile= $_POST['Select_ile'.$i];
				//echo(${"Select_platform$i"});
			
			
			// Pobieranie id platformy
				$zap2 = "SELECT id_platformy FROM platformy WHERE typ_platformy='$typ_platformy[$i]'";
				$sql_zam2 = mysqli_query($database, $zap2); 

				while($row = mysqli_fetch_array($sql_zam2)) {
					$id_plat_g = $row['id_platformy'];
				}
				
				// DODANIE INFORMACJI DO ENCJI platformy_gry
				$sqls = "INSERT INTO `platformy_gry`(`id_platformy_gry`, `id_platformy`, `id_gry`, `cena`, `ilosc_sztuk`) VALUES ('NULL','$id_plat_g', '$id_last_game', '$Select_cena', '$Select_ile');";

				 if ($database->query($sqls) === TRUE) {
					  //echo "<script>alert('Pomyślnie dodano grę.'); window.location = '../sites/admin.php';</script>";
					  echo "";
					} else {
						echo "Error: " . $sqls . "<br>" . $database->error;
					}
			}
			$i++;
		}
		
		
		
		// Studio
		
		$Select_stud1 = $_POST['Select_stud1'];
		$Select_stud2 = $_POST['Select_stud2'];
		$Select_stud3 = $_POST['Select_stud3'];
		$Select_stud4 = $_POST['Select_stud4'];
		$Select_stud5 = $_POST['Select_stud5'];
		$Select_stud6 = $_POST['Select_stud6'];
		$Select_stud7 = $_POST['Select_stud7'];
		$Select_stud8 = $_POST['Select_stud8'];
		$Select_stud9 = $_POST['Select_stud9'];
		$Select_stud10 = $_POST['Select_stud10'];
		
		$i=1;
		while($i<11){
			$nazwa = ${"Select_stud".$i};
			if($nazwa!='Wybierz studio'){
				 
				 // Pobieranie id platformy
				$zap2 = "SELECT id_studia FROM studia WHERE nazwa_studia='$nazwa'";
				$sql_zam2 = mysqli_query($database, $zap2); 

				while($row = mysqli_fetch_array($sql_zam2)) {
					$name = $row['id_studia'];
				}

				// DODANIE INFORMACJI DO ENCJI studia_gry
				$sqls = "INSERT INTO `studia_gry`(`id_studia_gry`, `id_studia`, `id_gry`) VALUES ('NULL','$name', '$id_last_game');";

				 if ($database->query($sqls) === TRUE) {
					  //echo "<script>alert('Pomyślnie dodano grę.'); window.location = '../sites/admin.php';</script>";
					  echo "";
					} else {
						echo "Error: " . $sqls . "<br>" . $database->error;
					}
			}
			$i++;
		}
	
		echo "<script>alert('Pomyślnie dodano grę.'); window.location = '../sites/admin.php';</script>";
	}
	
	
	
	
		// Usuwanie platformy gry
	if (isset($_POST['delete_game_platform']))
    {
		$delete_id = $_POST['Select_id_game_del'];
		$Select_plat = $_POST['Select_plat'];
		
		
		// Pobieranie id_platformy
		$sql_login_to_id = mysqli_query($database, "SELECT id_platformy FROM platformy WHERE typ_platformy='$Select_plat'");

		while($row = mysqli_fetch_array($sql_login_to_id)) {
			$id_plat = $row['id_platformy'];
		}
		
		// sql to delete a record
		  $sqlx = "DELETE FROM platformy_gry WHERE nazwa_gry='$delete_id' AND id_platformy='$id_plat'";
			if ($database->query($sqlx) === TRUE) {
			  echo "<script>alert('Pomyślnie usunięto platformę gry.'); window.location = '../sites/admin.php';</script>";
			} else {
			  echo "Error: " . $sqlx . "<br>" . $database->error;
			}
	} 
	
	
	
	
		// Usuwanie gry
	if (isset($_POST['delete_game']))
    {
		$delete_name = $_POST['Select_id_game_del'];
		// sql to delete a record
		
		// Pobieranie id_gry
		$sql_login_to_id = mysqli_query($database, "SELECT id_gry FROM gry WHERE nazwa_gry='$delete_name'");

		while($row = mysqli_fetch_array($sql_login_to_id)) {
			$delete_id = $row['id_gry'];
		}
		
		
		
		  $sqlx = "DELETE FROM gry WHERE id_gry='$delete_id'";
		  $sqly = "DELETE FROM platformy_gry WHERE id_gry='$delete_id'";
		  $sqlz = "DELETE FROM tryb_gry_gra WHERE id_gry='$delete_id'";
		  $sqlq = "DELETE FROM wersje_gry WHERE id_gry='$delete_id'";
		  $sqlr = "DELETE FROM edycje_gry WHERE id_gry='$delete_id'";
		  $sqlk = "DELETE FROM studia_gry WHERE id_gry='$delete_id'";
			if ($database->query($sqly) === TRUE) {
			  echo "";
			} else {
			  echo "Error: " . $sqly . "<br>" . $database->error;
			}
			if ($database->query($sqlz) === TRUE) {
			  echo "";
			} else {
			  echo "Error: " . $sqlz . "<br>" . $database->error;
			}
			if ($database->query($sqlq) === TRUE) {
			  echo "";
			} else {
			  echo "Error: " . $sqlq . "<br>" . $database->error;
			}
			if ($database->query($sqlr) === TRUE) {
			  echo "";
			} else {
			  echo "Error: " . $sqlr . "<br>" . $database->error;
			}
			if ($database->query($sqlk) === TRUE) {
			  echo "";
			} else {
			  echo "Error: " . $sqlk . "<br>" . $database->error;
			}
			if ($database->query($sqlx) === TRUE) {
			  echo "";
			} else {
			  echo "Error: " . $sqlx . "<br>" . $database->error;
			}
			
			echo "<script>alert('Pomyślnie usunięto grę.'); window.location = '../sites/admin.php';</script>";	
	} 
	
	
	
	
	
	
	
	// Edycja gry
	if (isset($_POST['edit_game']))
    {
		// Uzupełnianie encji - gry
		$Select_wyd = $_POST['Select_wyd'];
		$Select_gatunek = $_POST['Select_gatunek'];
		$Select_status = $_POST['Select_status'];
		$Select_pegi = $_POST['Select_pegi'];
		
		$name_last_game = $_POST['Select_id_game'];
		$Select_game_name = $_POST['Select_game_name'];
		//$Select_photo = $_POST['Select_photo'];
		$Select_opis = $_POST['Select_opis'];
		$Select_opis = nl2br($Select_opis); // Dodanie znaków <br> zamiast enterów
		$Select_data = $_POST['Select_data'];
		$Select_time = $_POST['Select_time'];
		
		$imgData = addslashes(file_get_contents($_FILES['Select_photo']['tmp_name']));
		$imageProperties = getimageSize($_FILES['Select_photo']['tmp_name']);
		
		
		
		
		
		// Pobieranie id gry
		$zap1 = "SELECT id_gry FROM gry WHERE nazwa_gry='$name_last_game'";
		$sql1 = mysqli_query($database, $zap1); 

		while($rows1 = mysqli_fetch_array($sql1)) {
			$id_last_game = $rows1['id_gry'];
		}


		// Pobieranie id wydawcy
		$zap1 = "SELECT id_wydawcy FROM wydawca WHERE nazwa_wydawcy='$Select_wyd'";
		$sql1 = mysqli_query($database, $zap1); 

		while($rows1 = mysqli_fetch_array($sql1)) {
			$id_wydawcy_gry = $rows1['id_wydawcy'];
		}
		
		// Pobieranie id gatunku
		$zap2 = "SELECT id_gatunku FROM gatunki WHERE nazwa_gatunku='$Select_gatunek'";
		$sql2 = mysqli_query($database, $zap2); 

		while($rows2 = mysqli_fetch_array($sql2)) {
			$id_gatunek_gry = $rows2['id_gatunku'];
		}
		
		// Pobieranie id dostępności
		$zap3 = "SELECT id_dostepnosci FROM dostepnosc WHERE status_dostepnosci='$Select_status'";
		$sql3 = mysqli_query($database, $zap3); 

		while($rows3 = mysqli_fetch_array($sql3)) {
			$id_dostepnosci_gry = $rows3['id_dostepnosci'];
		}
		
		// Pobieranie id pegi
		$zap4 = "SELECT id_pegi FROM pegi WHERE symbol='$Select_pegi'";
		$sql4 = mysqli_query($database, $zap4); 

		while($rows4 = mysqli_fetch_array($sql4)) {
			$id_pegi_gry = $rows4['id_pegi'];
		}
		
		
			// DODANIE INFORMACJI DO ENCJI GRY
		$sqls = "UPDATE `gry` SET `id_wydawcy`='$id_wydawcy_gry', `id_gatunku`='$id_gatunek_gry', `id_dostepnosci`='$id_dostepnosci_gry', `id_pegi`='$id_pegi_gry', `nazwa_gry`='$Select_game_name', `grafika`='{$imgData}', `opis_gry`='$Select_opis', `rok_wydania`='$Select_data', `czas_przejscia`='$Select_time' WHERE `id_gry`='$id_last_game';";

		 if ($database->query($sqls) === TRUE) {
			  echo "";
			} else {
				echo "Error: " . $sqls . "<br>" . $database->error;
			}
			
			
			$sqly = "DELETE FROM platformy_gry WHERE id_gry='$id_last_game'";
			$sqlz = "DELETE FROM tryb_gry_gra WHERE id_gry='$id_last_game'";
			$sqlq = "DELETE FROM wersje_gry WHERE id_gry='$id_last_game'";
			$sqlr = "DELETE FROM edycje_gry WHERE id_gry='$id_last_game'";
			$sqlk = "DELETE FROM studia_gry WHERE id_gry='$id_last_game'";
			if ($database->query($sqly) === TRUE) {
			  echo "";
			} else {
			  echo "Error: " . $sqly . "<br>" . $database->error;
			}
			if ($database->query($sqlz) === TRUE) {
			  echo "";
			} else {
			  echo "Error: " . $sqlz . "<br>" . $database->error;
			}
			if ($database->query($sqlq) === TRUE) {
			  echo "";
			} else {
			  echo "Error: " . $sqlq . "<br>" . $database->error;
			}
			if ($database->query($sqlr) === TRUE) {
			  echo "";
			} else {
			  echo "Error: " . $sqlr . "<br>" . $database->error;
			}
			if ($database->query($sqlk) === TRUE) {
			  echo "";
			} else {
			  echo "Error: " . $sqlk . "<br>" . $database->error;
			}
			
			
		
		
		// Checkbox edycja
		$i=0;
		while($i<$length_edit){
			if (isset($_POST['Select_edition'.$i])){
				${"Select_edition$i"}=$_POST['Select_edition'.$i];
				//$Select_edition .$i = $_POST['Select_edition'.$i];
				//echo(${"Select_edition$i"});
				
				// Pobieranie edycji
				$zap2 = "SELECT id_edycji FROM edycje WHERE typ_edycji='$typ_edycji[$i]'";
				$sql_zam2 = mysqli_query($database, $zap2); 

				while($row = mysqli_fetch_array($sql_zam2)) {
					$id_edycji_g = $row['id_edycji'];
				}
				
				// DODANIE INFORMACJI DO ENCJI edycja_gry
				$sqls = "INSERT INTO `edycje_gry` (`id_edycji_gry`, `id_edycji`, `id_gry`) VALUES ('NULL','$id_edycji_g','$id_last_game');";

				 if ($database->query($sqls) === TRUE) {
					  //echo "<script>alert('Pomyślnie dodano grę.'); window.location = '../sites/admin.php';</script>";
					  echo "";
					} else {
						echo "Error: " . $sqls . "<br>" . $database->error;
					}
			}
			$i++;
		}
		
		// Checkbox wersja
		$i=0;
		while($i<$length_ver){
			if (isset($_POST['Select_version'.$i]))
			{
				${"Select_version$i"}=$_POST['Select_version'.$i];
				//$Select_edition .$i = $_POST['Select_edition'.$i];
				//echo(${"Select_version$i"});
				
			// Pobieranie id wersji
				$zap2 = "SELECT id_wersji FROM wersje WHERE typ_wersji='$typ_wersji[$i]'";
				$sql_zam2 = mysqli_query($database, $zap2); 

				while($row = mysqli_fetch_array($sql_zam2)) {
					$id_wersji_g = $row['id_wersji'];
				}
				
				// DODANIE INFORMACJI DO ENCJI edycja_gry
				$sqls = "INSERT INTO `wersje_gry`(`id_wersji_gry`, `id_wersji`, `id_gry`) VALUES ('NULL','$id_wersji_g','$id_last_game');";

				 if ($database->query($sqls) === TRUE) {
					  //echo "<script>alert('Pomyślnie dodano grę.'); window.location = '../sites/admin.php';</script>";
					  echo "";
					} else {
						echo "Error: " . $sqls . "<br>" . $database->error;
					}
			}
			$i++;
		}
		
		// Checkbox tryb gry
		$i=0;
		while($i<$length_trybu){
			if (isset($_POST['Select_tryb'.$i]))
			{
				${"Select_tryb$i"}=$_POST['Select_tryb'.$i];
				//$Select_edition .$i = $_POST['Select_edition'.$i];
				//echo(${"Select_tryb$i"});
				
				
				// Pobieranie id trybu gry
				$zap2 = "SELECT id_trybu_gry FROM tryb_gry WHERE tryb_rozgrywki='$tryb_rozgrywki[$i]'";
				$sql_zam2 = mysqli_query($database, $zap2); 

				while($row = mysqli_fetch_array($sql_zam2)) {
					$id_trybu_g = $row['id_trybu_gry'];
				}
				
				// DODANIE INFORMACJI DO ENCJI tryb_gry_gra
				$sqls = "INSERT INTO `tryb_gry_gra`(`id_tryb_gry_gry`, `id_gry`, `id_trybu_gry`) VALUES ('NULL','$id_last_game', '$id_trybu_g');";

				 if ($database->query($sqls) === TRUE) {
					  //echo "<script>alert('Pomyślnie dodano grę.'); window.location = '../sites/admin.php';</script>";
					  echo "";
					} else {
						echo "Error: " . $sqls . "<br>" . $database->error;
					}
			}
			$i++;
		}
		
		// Checkbox platformy
		$i=0;
		while($i<$length_trybu){
			if (isset($_POST['Select_platform'.$i]))
			{
				${"Select_platform$i"}=$_POST['Select_platform'.$i];
				//$Select_edition .$i = $_POST['Select_edition'.$i];
				$Select_cena= $_POST['Select_cena'.$i];
				$Select_ile= $_POST['Select_ile'.$i];
				//echo(${"Select_platform$i"});
			
			
			// Pobieranie id platformy
				$zap2 = "SELECT id_platformy FROM platformy WHERE typ_platformy='$typ_platformy[$i]'";
				$sql_zam2 = mysqli_query($database, $zap2); 

				while($row = mysqli_fetch_array($sql_zam2)) {
					$id_plat_g = $row['id_platformy'];
				}
				
				// DODANIE INFORMACJI DO ENCJI platformy_gry
				$sqls = "INSERT INTO `platformy_gry`(`id_platformy_gry`, `id_platformy`, `id_gry`, `cena`, `ilosc_sztuk`) VALUES ('NULL','$id_plat_g', '$id_last_game', '$Select_cena', '$Select_ile');";

				 if ($database->query($sqls) === TRUE) {
					  //echo "<script>alert('Pomyślnie dodano grę.'); window.location = '../sites/admin.php';</script>";
					  echo "";
					} else {
						echo "Error: " . $sqls . "<br>" . $database->error;
					}
			}
			$i++;
		}
		
		
		
		// Studio
		
		$Select_stud1 = $_POST['Select_stud1'];
		$Select_stud2 = $_POST['Select_stud2'];
		$Select_stud3 = $_POST['Select_stud3'];
		$Select_stud4 = $_POST['Select_stud4'];
		$Select_stud5 = $_POST['Select_stud5'];
		$Select_stud6 = $_POST['Select_stud6'];
		$Select_stud7 = $_POST['Select_stud7'];
		$Select_stud8 = $_POST['Select_stud8'];
		$Select_stud9 = $_POST['Select_stud9'];
		$Select_stud10 = $_POST['Select_stud10'];
		
		$i=1;
		while($i<11){
			$nazwa = ${"Select_stud".$i};
			if($nazwa!='Wybierz studio'){
				 
				 // Pobieranie id platformy
				$zap2 = "SELECT id_studia FROM studia WHERE nazwa_studia='$nazwa'";
				$sql_zam2 = mysqli_query($database, $zap2); 

				while($row = mysqli_fetch_array($sql_zam2)) {
					$name = $row['id_studia'];
				}

				// DODANIE INFORMACJI DO ENCJI studia_gry
				$sqls = "INSERT INTO `studia_gry`(`id_studia_gry`, `id_studia`, `id_gry`) VALUES ('NULL','$name', '$id_last_game');";

				 if ($database->query($sqls) === TRUE) {
					  //echo "<script>alert('Pomyślnie dodano grę.'); window.location = '../sites/admin.php';</script>";
					  echo "";
					} else {
						echo "Error: " . $sqls . "<br>" . $database->error;
					}
			}
			$i++;
		}
	
		echo "<script>alert('Pomyślnie edytowano grę.'); window.location = '../sites/admin.php';</script>";
	}
	
	
	
	
	
	
	
	
?>