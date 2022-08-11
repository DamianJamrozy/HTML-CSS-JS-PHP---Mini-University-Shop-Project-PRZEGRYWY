<?php

	$user = 'root';
	$pass = '';
	$db = 'baza_przegrywy';

	$database = new mysqli('localhost', $user, $pass, $db) or die("Nie można połączyć z bazą danych. Upewnij się że używasz php w wersji 7.0 lub nowszej.");




	$sql_user_count = mysqli_query($database, "SELECT * FROM uzytkownicy WHERE typ_konta='user'");
	while($row1 = mysqli_fetch_array($sql_user_count)) {
		$users[] = $row1['id_uzytkownika'];
	}
	$users_log = sizeof($users);
	
	
	$sql_sell_count = mysqli_query($database, "SELECT * FROM zamowienia");
	while($row = mysqli_fetch_array($sql_sell_count)) {
		$sell[] = $row['id_zamowienia'];
	}
	$sell_count = sizeof($sell);
	echo("<script>
		let j = 0;
		window.onscroll = function() {myFunction()};

		function myFunction() {
			console.log('dupa1');
			if (document.body.scrollTop > 1080 && j==0 || document.documentElement.scrollTop > 1080 && j==0) {
				j++;
				var i = 0;
				  if (i == 0) {
					i = 0;
					var elem = document.getElementById('myBar');
					var elem1 = document.getElementById('myBar1');
					var width = 0;
					var width1 = 0;
					var id = setInterval(frame, 400);
					var id1 = setInterval(frame, 400);
					function frame() {
					  if (width >= ".$users_log.") {
						clearInterval(id);
						i = 0;
					  } else {
						width++;
						//elem.style.width = width + '%';
						elem.innerHTML = width  + ' osób';
					  }
					  if (width1 >= ".$sell_count.") {
						clearInterval(id1);
						i = 0;
					  } else {
						width1++;
						//elem1.style.width = width1 + '%';
						elem1.innerHTML = width1  ;
					  }
					}
				  }
			}
		}
		</script>");



?>