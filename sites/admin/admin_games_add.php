<html>
<head>
	
	<link rel="stylesheet" href="../../style/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>

	<link rel="stylesheet" href="../../style/style.css" type="text/css" />
	<link rel="stylesheet" href="../../style/style_admin.css" type="text/css" />
	
	<?php
		session_start();
		if(!isset($_SESSION['zalogowany']) || $_SESSION['admin'] != 1){
			echo ('<script>alert("Nie jesteś zalogowany. \nAby zarządzać zamówieniami, zaloguj się na swoje konto administracyjne"); window.location = "login.php";</script>');
		}
		include('../../php/edit_user.php');
		include('../../php/root.php');
		
		
	?>
	
	<style>
		.file-caption-main {
			width: 70%;
		}
		.input-group-btn:not(:first-child)>.btn, .input-group-btn:not(:first-child)>.btn-group {
			margin-left: -2px;
			margin-right: -179px;
			height: 0px;
		}
		.iput-group, .file-caption-main, .file-caption, .form-control, .kv-fileinput-caption{
			display:none;
		}
		
		
	</style>


</head>
<body style="overflow:hidden; color:white;">
	<center><font size="6px">PANEL ADMINISTRACYJNY</font><br><br></center>
	<br>
	
	<div id="container">
		<center><font size="4px">Dodaj grę:</font><br><br></center>
	
	
		<div style="width:80%; margin:0 auto;">
			<div class="left">
				&nbsp;
			</div>
			<div class="center">
				<form method="POST" action="../../php/root.php" id="add" enctype="multipart/form-data">
					<h3>Nazwa gry:</h3><br>
					<input type="text" name="Select_game_name" style='width:100%; text-transform:none;' placeholder="Tytuł gry - bez znaków specjalnych" class="btn_buy" style='width:100%;' required><br><br>
				
					<h3>Opis gry:</h3><br>
					<textarea class="btn_buy" rows="4" style='width:100%; text-transform:none;' name="Select_opis" placeholder="Opis gry - bez znaków specjalnych" form="add" required></textarea><br><br>
				
					<h3>Pegi:</h3><br>
					<select class="select" id="get_val" name="Select_pegi" style="width:100%; height:40px;" required>  
						<option>Wybierz oznaczenie PEGI</option>  
						<?php 
							$i = 0;
							while($length_pegi!=$i){
								print_r("<option>".$peg[$i]."</option>  "); 
								$i++;
							}
						?>
					</select><br><br>
				
					<div class="row">
						<h3>Wybierz okładkę gry:</h3><br>
							<div class="form-group" style="width:100%;">
							<div id="dropContainer">
								<div class="file-loading">
									<input id="file-1" type="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
								</div>
							</div>          
					</div>
				<br><br>
				<br><br>
				
				<div style="margin-top:35px;">
				   Plik:
				   <input type="file" id="fileInput" name="Select_photo"/>
				</div>
				  
				</div>
				<br><br>
				<h3>Czas przejścia:</h3><br>
					<input type="number" step='0.01' name="Select_time" style='width:100%; text-transform:none;' placeholder="xx.yy" class="btn_buy" style='width:100%;' required><br><br>
				<h3>Data premiery:</h3><br>
					<input type="date" name="Select_data" style='width:100%; text-transform:none;' class="btn_buy" style='width:100%;' required><br><br>
				
				
					<h3>Wydawca:</h3><br>
					<select class="select" id="get_val" name="Select_wyd" style="width:100%; height:40px;" required>  
						<option>Wybierz nazwę wydawcy</option>  
						<?php 
							$i = 0;
							while($length_wyd!=$i){
								print_r("<option>".$nazwa_wydawcy[$i]."</option>  "); 
								$i++;
							}
						?>
					</select><br><br>
					
					<h3>Studio:</h3><br>
					<select class="select" id="get_val" name="Select_stud1" style="width:100%; height:40px;" required>  
						<option>Wybierz studio</option>  
						<?php 
							$i = 0;
							while($length_stud!=$i){
								print_r("<option>".$nazwa_studia[$i]."</option>  "); 
								$i++;
							}
						?>
					</select><br><br>
						<div id="stud2">
							<select class="select" id="get_val" name="Select_stud2" style="width:100%; height:40px;" required>  
								<option>Wybierz studio</option>  
								<?php 
									$i = 0;
									while($length_stud!=$i){
										print_r("<option>".$nazwa_studia[$i]."</option>  "); 
										$i++;
									}
								?>
							</select>
							<br><br>
						</div>
						<div id="stud3">
							<select class="select" id="get_val" name="Select_stud3" style="width:100%; height:40px;" required>  
								<option>Wybierz studio</option>  
								<?php 
									$i = 0;
									while($length_stud!=$i){
										print_r("<option>".$nazwa_studia[$i]."</option>  "); 
										$i++;
									}
								?>
							</select>
							<br><br>
						</div>
						<div id="stud4">
							<select class="select" id="get_val" name="Select_stud4" style="width:100%; height:40px;" required>  
								<option>Wybierz studio</option>  
								<?php 
									$i = 0;
									while($length_stud!=$i){
										print_r("<option>".$nazwa_studia[$i]."</option>  "); 
										$i++;
									}
								?>
							</select>
							<br><br>
						</div>
						<div id="stud5">
							<select class="select" id="get_val" name="Select_stud5" style="width:100%; height:40px;" required>  
								<option>Wybierz studio</option>  
								<?php 
									$i = 0;
									while($length_stud!=$i){
										print_r("<option>".$nazwa_studia[$i]."</option>  "); 
										$i++;
									}
								?>
							</select>
							<br><br>
						</div>
						<div id="stud6">
							<select class="select" id="get_val" name="Select_stud6" style="width:100%; height:40px;" required>  
								<option>Wybierz studio</option>  
								<?php 
									$i = 0;
									while($length_stud!=$i){
										print_r("<option>".$nazwa_studia[$i]."</option>  "); 
										$i++;
									}
								?>
							</select>
							<br><br>
						</div>
						<div id="stud7">
							<select class="select" id="get_val" name="Select_stud7" style="width:100%; height:40px;" required>  
								<option>Wybierz studio</option>  
								<?php 
									$i = 0;
									while($length_stud!=$i){
										print_r("<option>".$nazwa_studia[$i]."</option>  "); 
										$i++;
									}
								?>
							</select>
							<br><br>
						</div>
						<div id="stud8">
							<select class="select" id="get_val" name="Select_stud8" style="width:100%; height:40px;" required>  
								<option>Wybierz studio</option>  
								<?php 
									$i = 0;
									while($length_stud!=$i){
										print_r("<option>".$nazwa_studia[$i]."</option>  "); 
										$i++;
									}
								?>
							</select>
							<br><br>
						</div>
						<div id="stud9">
							<select class="select" id="get_val" name="Select_stud9" style="width:100%; height:40px;" required>  
								<option>Wybierz studio</option>  
								<?php 
									$i = 0;
									while($length_stud!=$i){
										print_r("<option>".$nazwa_studia[$i]."</option>  "); 
										$i++;
									}
								?>
							</select>
							<br><br>
						</div>
						<div id="stud10">
							<select class="select" id="get_val" name="Select_stud10" style="width:100%; height:40px;" required>  
								<option>Wybierz studio</option>  
								<?php 
									$i = 0;
									while($length_stud!=$i){
										print_r("<option>".$nazwa_studia[$i]."</option>  "); 
										$i++;
									}
								?>
							</select><br><br>
						</div>
						
						<a href="#stud10" onclick="show_stud_2()" id="stud1_link">Dodaj kolejne studio</a><br><br>
						
					
					<h3>Gatunek:</h3><br>
					<select class="select" id="get_val" name="Select_gatunek" style="width:100%; height:40px;" required>  
						<option>Wybierz gatunek</option>  
						<?php 
							$i = 0;
							while($length_gat!=$i){
								print_r("<option>".$gat[$i]."</option>  "); 
								$i++;
							}
						?>
					</select><br><br>
				
					<h3>Status:</h3><br>
					<select class="select" id="get_val" name="Select_status" style="width:100%; height:40px;" required>  
						<option>Wybierz status dostępności</option>  
						<?php 
							$i = 0;
							while($length_doste!=$i){
								print_r("<option>".$stat_doste[$i]."</option>  "); 
								$i++;
							}
						?>
					</select><br><br>
				
					<h3>Edycje:</h3><br>
					<?php
						$i=0;
						while($i<$length_edit){
							print_r("<input type='checkbox' name='Select_edition".$i."'> ".$typ_edycji[$i]." <br>"); 
							$i++;
						}
					?>
					<br><br>
					
					<h3>Wersje:</h3><br>
					<?php
						$i=0;
						while($i<$length_ver){
							print_r("<input type='checkbox' name='Select_version".$i."'> ".$typ_wersji[$i]." <br>"); 
							$i++;
						}
					?>
					<br><br>
					
					<h3>Tryb gry:</h3><br>
					<?php
						$i=0;
						while($i<$length_trybu){
							print_r("<input type='checkbox' name='Select_tryb".$i."'> ".$tryb_rozgrywki[$i]." <br>"); 
							$i++;
						}
					?>
					<br><br>
					
					<h3>Platformy:</h3><br>
					<table style="width:110%;">
					<?php
						$i=0;
						while($i<$length_platf){
							print_r("<tr><th style='width:105px;'><input type='checkbox' name='Select_platform".$i."'>".$typ_platformy[$i]."</th><th style='width:25px;'><input type='number' placeholder='cena' step='0.01' class='select' name='Select_cena".$i."'></th><th style='width:25px;'><input type='number' placeholder='ilość kopii' class='select' name='Select_ile".$i."'></th></tr>"); 
							$i++;
						}
					?>
					</table>
					<br><br>
					<input type="submit" class="btn_buy" value="Dodaj" name="add_game" style='width:100%;'><br><br>
				</form>
				
			</div>

		</div>
		<br><br><br>
		</center>
	</div>
		
		
		<div id="foter" style="margin:0; padding:0;">
		<center>
		<p id="fast">Szybkie linki:</p><br>
		<a href="#">O projekcie</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="https://damianjamrozy.000webhostapp.com/index.php/rodo/">RODO</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="https://github.com/UR-INF/20-21-ai-projekt-projekt-ai-jamrozy-iwanczyk" target="_blank">Dokumentacja</a>
		<br><br><br><br><br>
		@2020 <a href="https://damianjamrozy.000webhostapp.com/">Damian Jamroży</a> & Rafał Iwańczyk. <a href="LICENSE.pdf">Wszelkie prawa zastrzeżone.</a>
		</center>
</div>




</body>
<?php
	include('../../php/sprawdzanie_sesji.php');
	include('../../php/root.php');
?>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>



<script>
	$("#file-1").fileinput({
    theme: 'fa',
    uploadUrl: '#',
    allowedFileExtensions: ['jpg', 'png', 'gif'],
    overwriteInitial: false,
    maxFileSize:2000,
    maxFilesNum: 10,
    slugCallback: function (filename) {
        return filename.replace('(', '_').replace(']', '_');
		}
	});
	
	
	let stud2 = document.getElementById("stud2");
	let stud3 = document.getElementById("stud3");
	let stud4 = document.getElementById("stud4");
	let stud5 = document.getElementById("stud5");
	let stud6 = document.getElementById("stud6");
	let stud7 = document.getElementById("stud7");
	let stud8 = document.getElementById("stud8");
	let stud9 = document.getElementById("stud9");
	let stud10 = document.getElementById("stud10");
	let stud1_link = document.getElementById("stud1_link");
	
	let i = 1;
	function show_stud_2(){
		i++;
		if(i==2){
			stud2.style.display = "block";
		}
		else if (i==3){
			stud3.style.display = "block";
		}
		else if (i==4){
			stud4.style.display = "block";
		}
		else if (i==5){
			stud5.style.display = "block";
		}
		else if (i==6){
			stud6.style.display = "block";
		}
		else if (i==7){
			stud7.style.display = "block";
		}
		else if (i==8){
			stud8.style.display = "block";
		}
		else if (i==9){
			stud9.style.display = "block";
		}
		else{
			stud10.style.display = "block";
			stud1_link.style.display = "none";
		}
	}
</script>

<script>
dropContainer.ondragover = dropContainer.ondragenter = function(evt) {
  evt.preventDefault();
};

dropContainer.ondrop = function(evt) {
  // pretty simple -- but not for IE :(
  fileInput.files = evt.dataTransfer.files;

  // If you want to use some of the dropped files
  const dT = new DataTransfer();
  dT.items.add(evt.dataTransfer.files[0]);
  dT.items.add(evt.dataTransfer.files[3]);
  fileInput.files = dT.files;

  evt.preventDefault();
};
</script>

</html>