<html>
<head>
<link rel="stylesheet" href="../../style/style_messenger.css" type="text/css" />
</head>
<body>
<?php
	include('db_connection.php');
		
	// Ukrywanie błędu (brak zmiennej login)
	//error_reporting(0);
	//ini_set('display_errors', 0);
	session_start();
	
	if (isset($_POST['send'])){
		//session_start();
		$login = $_SESSION['login'];
		$wiadomosc = $_POST['tresc'];
		$wiadomosc = nl2br($wiadomosc);
		//echo($wiadomosc);
		$t=time();
		$date = date("Y-m-d",$t);
		$czas=date("H:i:s");
		
		// Pozyskiwanie id_usera
		$sql_login_to_id = mysqli_query($database, "SELECT id_uzytkownika FROM uzytkownicy WHERE login='$login'");

		while($row = mysqli_fetch_array($sql_login_to_id)) {
			$id_moderator = $row['id_uzytkownika'];
		}
		
		// Pozyskiwanie id moderatora
		$sql_id_mod = mysqli_query($database, "SELECT id_uzytkownika FROM uzytkownicy WHERE typ_konta='user'");

		while($row = mysqli_fetch_array($sql_id_mod)) {
			$id_user[] = $row['id_uzytkownika'];
		}
		$length_moderator = count($id_user);
		
		
		// Pozyskiwanie ilości wiadomości danego moderatora
		$i=0;
		while($i<$length_moderator){
			$sql_id_mod = mysqli_query($database, "SELECT COUNT(DISTINCT `id_uzytkownika`) FROM `uzytkownicy_messenger` WHERE `id_moderatora`='$id_moderator';");
			while($row = mysqli_fetch_array($sql_id_mod)) {
				$count_messages[] = $row['COUNT(DISTINCT `id_uzytkownika`)'];
			}
			$i++;
		}
		
		
		
				$sql2 = "INSERT INTO `messenger`(`id_wiadomosci`, `tresc`, `data`, `godzina`, `id_statusu_wiadomosci`) VALUES ('NULL','$wiadomosc','$date','$czas','2')";

				if ($database->query($sql2) === TRUE) {
				  //echo("<script>history.back()</script>");
				  echo("");
				} else {
				  echo "Error: " . $sql2 . "<br>" . $database->error;
				}
				
				
				$sql_id_mess = mysqli_query($database, "SELECT id_wiadomosci FROM messenger WHERE tresc='$wiadomosc' ORDER BY id_wiadomosci");

				while($row = mysqli_fetch_array($sql_id_mess)) {
					$id_wiadomosci = $row['id_wiadomosci'];
				}
				
				$sql_id_mod = mysqli_query($database, "SELECT A.id_uzytkownika FROM uzytkownicy_messenger A WHERE A.id_moderatora='$id_moderator' AND A.id_wiadomosci in (SELECT B.id_wiadomosci FROM messenger B WHERE B.id_statusu_wiadomosci='1' OR B.id_statusu_wiadomosci='2')");

				while($row = mysqli_fetch_array($sql_id_mod)) {
					$id_user_mod[] = $row['id_uzytkownika'];
				}
						
				
				$sql3 = "INSERT INTO `uzytkownicy_messenger`(`id_uzytkownicy_messenger`, `id_uzytkownika`, `id_moderatora`, `id_wiadomosci`) VALUES ('NULL','$id_user_mod[0]','$id_moderator','$id_wiadomosci')";

				if ($database->query($sql3) === TRUE) {
				  echo("<script>history.back()</script>");
				} else {
				  echo "Error: " . $sql3 . "<br>" . $database->error;
				}
	}
	
	
	if (isset($_POST['end'])){
		$login = $_SESSION['login'];
		
		$sql_login_to_id = mysqli_query($database, "SELECT id_uzytkownika FROM uzytkownicy WHERE login='$login'");

		while($row = mysqli_fetch_array($sql_login_to_id)) {
			$id_moderator = $row['id_uzytkownika'];
		}

		
		$sql_id_mod = mysqli_query($database, "SELECT A.id_uzytkownika FROM uzytkownicy_messenger A WHERE A.id_moderatora='$id_moderator' AND A.id_wiadomosci in (SELECT B.id_wiadomosci FROM messenger B WHERE B.id_statusu_wiadomosci='1' OR B.id_statusu_wiadomosci='2')");

		while($row = mysqli_fetch_array($sql_id_mod)) {
			$id_user_mod[] = $row['id_uzytkownika'];
		}
		$length_usr_mod = count($id_user_mod);
		

		$sql_id_mod = mysqli_query($database, "SELECT id_wiadomosci FROM uzytkownicy_messenger WHERE id_uzytkownika='$id_user_mod[0]'");

		while($row = mysqli_fetch_array($sql_id_mod)) {
			$id_wiadomosci[] = $row['id_wiadomosci'];
		}
		$length_id_wiadomosci = count($id_wiadomosci);
		
		
		$j=0;
		while($j<$length_id_wiadomosci){
			$sql_id_stat= mysqli_query($database, "SELECT id_statusu_wiadomosci FROM messenger WHERE id_wiadomosci='$id_wiadomosci[$j]'");

			while($row = mysqli_fetch_array($sql_id_stat)) {
				$id_stat[] = $row['id_statusu_wiadomosci'];
			}
			$j++;
		}
		$j=0;
		while($j<$length_id_wiadomosci){
			if($id_stat[$j]==1){
				$sql3 = "UPDATE `messenger` SET `id_statusu_wiadomosci`='3' WHERE id_wiadomosci='$id_wiadomosci[$j]'";

				if ($database->query($sql3) === TRUE) {
				  //echo("<script>history.back()</script>");
				} else {
				  echo "Error: " . $sql3 . "<br>" . $database->error;
				}
			}else{
				$sql3 = "UPDATE `messenger` SET `id_statusu_wiadomosci`='4' WHERE id_wiadomosci='$id_wiadomosci[$j]'";

				if ($database->query($sql3) === TRUE) {
				  //echo("<script>history.back()</script>");
				} else {
				  echo "Error: " . $sql3 . "<br>" . $database->error;
				}
			}
			$j++;
		}
		echo("<script>history.back()</script>");
	}
?>
</body>
</html>
