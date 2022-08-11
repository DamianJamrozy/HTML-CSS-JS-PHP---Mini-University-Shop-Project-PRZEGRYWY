<html>
<head>
	<title>Prze-gry.wy</title>
	<link rel="Shortcut icon" href="../img/icons/icon.ico" />

	<meta http-equiv="content-type" content="text/php"; charset="UTF-8"/> 
	<meta name="keywords" content="firma,Damian Jamroży, Rafał Iwańczyk, prze-gry, prze-gry.wy, gry, zakupy internetowe, web designer,">
	<meta name="description" content="Prze-gry.wy to firma założona przez 2 osoby o ogromnej pasji do gier cyfrowych. U nas znajdziesz najlepsze tytuły w najlepszych cenach!">
	<link rel="stylesheet" href="../style/style.css" type="text/css" />
	<link rel="stylesheet" href="../style/style_games.css" type="text/css" />
	<link rel="stylesheet" href="../style/style_loyal.css" type="text/css" />
	<link rel="stylesheet" href="../style/style_messenger.css" type="text/css" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />
	
	
	<?php
		session_start();
		include('../php/db_connection.php');
	?>
	
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
			<a href="brand.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/game.png" width="25%"><br><br>PRODUKTY</center></div></a>
			<a href="bucket.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/bucket.png" width="25%"><br><br>KOSZYK</center></div></a>
			<div class="side_btn" id="Login"><a href="login.php"><center><button class="btn">ZALOGUJ SIĘ</button> </center></a></div>
			<div class="side_btn" id="Logout"><a href="../php/wylogowanie.php"><center><button class="btn">Wyloguj SIĘ</button> </center></a></div>

		</div>
		
	</div>
	
	<!-- -------------------------------
	-->
	
	<!--
	<div class="container-fluid" id="pricing">
    <div class="text-center">
       <h2>Pricing</h2>
       <h4>Choose a payment plan that works for you</h4>
    </div>
    
    <div class="row">
       <div class="col-sm-4">
          <div class="panel panel-default text-center">
             <div class="panel-heading">
                <h1>Basic</h1>
             </div>
             
    <div class="panel-body">
       <p><strong>20</strong> Lorem</p>
       <p><strong>15</strong> Ipsum</p>
       <p><strong>5</strong> Dolor</p>
       <p><strong>2</strong> Sit</p>
       <p><strong>Endless</strong> Amet</p>
    </div>
    
    <div class="panel-footer">
       <h3>$19</h3>
       <h4>per month</h4>
       <button class="btn btn-lg">Sign Up</button>
    </div>
      
       </div>
      </div>
      
 <div class="col-sm-4">
    <div class="panel panel-default text-center">
       <div class="panel-heading">
       <h1>Pro</h1>
       </div>
       
    <div class="panel-body">
       <p><strong>50</strong> Lorem</p>
       <p><strong>25</strong> Ipsum</p>
       <p><strong>10</strong> Dolor</p>
       <p><strong>5</strong> Sit</p>
       <p><strong>Endless</strong> Amet</p>
    </div>
 
    <div class="panel-footer">
       <h3>$29</h3>
       <h4>per month</h4>
       <button class="btn btn-lg">Sign Up</button>
    </div>
 </div>
</div>

 <div class="col-sm-4">
    <div class="panel panel-default text-center">
       <div class="panel-heading">
       <h1>Premium</h1>
       </div>
       
    <div class="panel-body">
       <p><strong>100</strong> Lorem</p>
       <p><strong>50</strong> Ipsum</p>
       <p><strong>25</strong> Dolor</p>
       <p><strong>10</strong> Sit</p>
       <p><strong>Endless</strong> Amet</p>
    </div>
    
    <div class="panel-footer">
       <h3>$49</h3>
       <h4>per month</h4>
       <button class="btn btn-lg">Sign Up</button>
    </div>
 </div>
</div>
    </div>
</div>
	-->
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
		<center>
		<h1>Program kart lojalnościowych</h1><br><br>
		</center>
		
		<div class="loy1">
		   <div id="loy1Top">
			<h2>BRĄZ</h2>
			<h5>50 zamówień</h5>
               <hr style="border-color: #b98155;" ></div>
                  <span class="jd"><p>5% zniżki na dostawę</p><p>10 dodatkowych awatarów konta</p></span>
		</div>
		
		<div class="loy2">
		   <div id="loy2Top">
			<h2>SREBRO</h2>
			<h5>100 zamówień</h5>
              <hr style="border-color: #e2e3e2;" /></div>
               <p>
               10% zniżki na dostawę
               </p>
               <p>
			   20 dodatkowych awatarów konta
			   </p>
			   <p>
			   Świąteczne kody rabatowe
			   </p> 
			
		</div>
		
		<div class="loy3">
		   <div id="loy3Top">
			<h2>ZŁOTO</h2>
			<h5>250 zamówień</h5>
              <hr style="border-color: #c8ac00;" /></div>
               <p>
               50% zniżki na dostawę
               </p>
               <p>
               2% zniżki na całe zamówienie
               </p>
               <p>
			   40 dodatkowych awatarów konta
			   </p>
			   <p>
			   Świąteczne kody rabatowe
			   </p>
			   <p>
			   Większe zniżki kodów rabatowych
			   </p>  
			
		</div>
		
		<div class="loy4">
			<div id="loy4Top">
			<h2>PLAYTNA</h2>
			<h5>500 zamówień</h5>
               <hr style="border-color: #ebeceb;" /></div>
               <p>
               Darmowa dostawa
               </p>
               <p>
               5% zniżki na całe zamówienie
               </p>
               <p>
			   60 dodatkowych awatarów konta
			   </p>
			   <p>
			   Świąteczne kody rabatowe
			   </p>
			   <p>
			   Okresowe kody rabatowe
			   </p>
			   <p>
			   Większe zniżki kodów rabatowych
			   </p> 
			   <p>
			   Pierwszeństwo przy zakupach w przedsprzedaży
			   </p>  
			
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