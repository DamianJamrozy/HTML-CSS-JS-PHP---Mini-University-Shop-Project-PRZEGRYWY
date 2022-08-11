<?php
	
	$user = 'root';
	$pass = '';
	$db = 'baza_przegrywy';

	$database = new mysqli('localhost', $user, $pass, $db) or die("Nie można połączyć z bazą danych. Upewnij się że używasz php w wersji 7.0 lub nowszej.");

    
    if (isset($_POST['rejestruj']))
    {
        $login = $_POST['login'];
        $haslo1 = $_POST['haslo1'];
        $haslo2 = $_POST['haslo2'];
        $email = $_POST['email'];
        $name = $_POST['firname'];
        $surname = $_POST['surname'];
        $tel = $_POST['tel'];
        $ip = $_SERVER['REMOTE_ADDR'];
        
        // sprawdzamy czy login nie jest już w bazie
		$sql_u = "SELECT * FROM uzytkownicy WHERE login='$login'";
		$sql_e = "SELECT * FROM uzytkownicy WHERE email='$email'";
		$res_u = mysqli_query($database, $sql_u);
		$res_e = mysqli_query($database, $sql_e);

		if (mysqli_num_rows($res_u) > 0) {
			$login_error = "<script>alert('Podany login jest już zajęty.'); window.location = '../sites/login.php';</script>";
			echo ($login_error);
			
		}else if(mysqli_num_rows($res_e) > 0){
			$email_error = "<script>alert('Podany email jest już zajęty.'); window.location = '../sites/login.php';</script>";
			echo ($email_error);	
			
		}else{
            if ($haslo1 == $haslo2) // sprawdzamy czy hasła takie same
            {
				$t=time();
				$date = date("Y-m-d",$t);
				$query = "INSERT INTO uzytkownicy (typ_konta,id_karty_lojalnosciowej,imie, nazwisko, telefon, login, haslo, email, data_rejestracji, data_logowania, ip_logowania) 
				VALUES ('user','1','$name', '$surname', '$tel', '$login', '".md5($haslo1)."','$email', '".$date."', '".$date."', '".$ip."')";
				
				if ($database->query($query) === TRUE) {
					
					// Zmiana sesji na zalogowano
					$_SESSION['zalogowany'] = true;
					$_SESSION['login'] = $login;
					
					// zalogowany
					echo ('<script>sessionStorage.setItem("logout", logout);</script>');
				  
					//echo("<script>alert('Gratulacje nowe konto zostało utworzone.'); setTimeout('location.href = ../sites/reg_next.php;',5000);</script>");
				  
					echo "<script>alert('Gratulacje nowe konto zostało utworzone.'); window.location = '../sites/login.php';</script>";

				} else {
				  echo "Error: " . $query . "<br>" . $database->error;
				}
				
                //echo "Konto zostało utworzone!";
            }
            else echo "Hasła nie są takie same";
        }
    }
?>