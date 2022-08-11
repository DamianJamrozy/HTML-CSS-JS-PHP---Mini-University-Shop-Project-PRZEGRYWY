<html>
<head>
	
	<link rel="stylesheet" href="../../style/bootstrap.min.css">
	<link rel="stylesheet" href="../../style/sb-admin-2.css" type="text/css" />
	<link rel="stylesheet" href="../../style/sb-admin-2.min.css" type="text/css" />
	<link rel="stylesheet" href="../../style/style.css" type="text/css" />
	<link rel="stylesheet" href="../../style/style_admin.css" type="text/css" />
	<?php
		session_start();
		if(!isset($_SESSION['zalogowany']) || $_SESSION['admin'] != 1){
			echo ('<script>alert("Nie jesteś zalogowany. \nAby zarządzać zamówieniami, zaloguj się na swoje konto administracyjne"); window.location = "login.php";</script>');
		}
		include('../../php/edit_user.php');
		include('../../php/root.php');
		$_SESSION['i']=0;
	
?>
	
	

<style>
	.table-striped{
	}
	table{
		color:white;
	}
	.table{
		color:white;
		
	}
	.table-striped>tbody>tr:nth-of-type(odd){
		background: linear-gradient(0deg,rgba(0,0,0,0.3),rgba(0,0,0,0.3));
	}
</style>

<script>
window.onload = function () {
 
	var chart1 = new CanvasJS.Chart("chartContainer", {
		title: {
			text: "Przychody z obecnego roku"
		},
		axisY: {
			title: "Kwota w PLN"
		},
		data: [{
			type: "line",
			dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chart1.render();
	
	var chart2 = new CanvasJS.Chart("chartContainer2", {
		title: {
			text: "Użytkownicy - Rejestracje"
		},
		axisY: {
			title: "Ilość rejestracji w tym roku"
		},
		data: [{
			type: "line",
			dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chart2.render();
	
	

 
}
</script>


</head>
<body style="overflow:hidden; color:white;">
	
	<center><font size="6px">PANEL ADMINISTRACYJNY</font><br><br></center>
	<br>
	
	<div id="container" style="height:80%;">
		<center><font size="4px">Statystyki:</font><br><br></center>
			<!-- Content Row -->
		<div class="row" style="width:90%; margin-left:5%;">

		<!-- Wszyscy użytkownicy -->
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
			  <div class="row no-gutters align-items-center">
				<div class="col mr-2">
				  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Zarobki za obecny miesiąc (PLN)</div>
					<div class="h5 mb-0 font-weight-bold text-gray-800"><?php print_r($money_sum_this_month);?></div>
				</div>
				<div class="col-auto">
				  <i class="fas fa-calendar fa-2x text-gray-300"></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>

		<!-- Wszystkie zarobki -->
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
			  <div class="row no-gutters align-items-center">
				<div class="col mr-2">
				  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Zarobki ogólne (PLN)</div>
				  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php print_r($money_sum_all);?></div>
				</div>
				<div class="col-auto">
				  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>

		<!-- Obecne zarobki -->
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
			  <div class="row no-gutters align-items-center">
				<div class="col mr-2">
				  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Przychód obecnoroczny (PLN)</div>
					<div class="h5 mb-0 font-weight-bold text-gray-800"><?php print_r($money_sum_this_year);?></div>
				</div>
				<div class="col-auto">
				  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>

		<!-- Zarobki z ubiegłego roku -->
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
			  <div class="row no-gutters align-items-center">
				<div class="col mr-2">
				  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Przychód zeszłoroczny (PLN)</div>
				  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php print_r($money_sum_last_year);?></div>
				</div>
				<div class="col-auto">
				  <i class="fas fa-comments fa-2x text-gray-300"></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>
		</div>

		<!-- Content Row -->
				
				
		<center>
			<div id="chartContainer" class="card border-left-primary shadow h-150 py-2" style="height: 370px; width: 70%; border-left: .25rem solid #4e73df!important; margin-bottom:150px; margin-top:40px;"></div>
		</center>
			
			
				<!-- Content Row -->
		<div class="row" style="width:90%; margin-left:5%;">

		<!-- Wszyscy użytkownicy -->
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
			  <div class="row no-gutters align-items-center">
				<div class="col mr-2">
				  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Zarejestrowani użytkownicy</div>
				  <div class="h5 mb-0 font-weight-bold text-gray-800">
				   <h4>Użytkownicy: <?php print_r($length_user);?></h4>
				  </div>
				</div>
				<div class="col-auto">
				  <i class="fas fa-calendar fa-2x text-gray-300"></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>

		<!-- Admini -->
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
			  <div class="row no-gutters align-items-center">
				<div class="col mr-2">
				  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Administratorzy</div>
				   <div class="h5 mb-0 font-weight-bold text-gray-800">
				   <h4>Użytkownicy: <?php print_r($account_admin);?></h4>
				  </div>
				</div>
				<div class="col-auto">
				  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>

		<!-- Moderatorzy -->
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
			  <div class="row no-gutters align-items-center">
				<div class="col mr-2">
				  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Moderatorzy</div>
					 <div class="h5 mb-0 font-weight-bold text-gray-800">
				   <h4>Użytkownicy: <?php print_r($account_moderator);?></h4>
				  </div>
				</div>
				<div class="col-auto">
				  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>

		<!-- Zwykli użytkownicy -->
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
			  <div class="row no-gutters align-items-center">
				<div class="col mr-2">
				  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Użytkownicy</div>
				   <div class="h5 mb-0 font-weight-bold text-gray-800">
				   <h4>Użytkownicy: <?php print_r($account_user);?></h4>
				  </div>
				</div>
				<div class="col-auto">
				  <i class="fas fa-comments fa-2x text-gray-300"></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>
		</div>

  <!-- Content Row -->
  
		<center>
			<div id="chartContainer2" class="card border-left-primary shadow h-150 py-2" style="height: 370px; width: 70%; border-left: .25rem solid #4e73df!important; margin-bottom:80px; margin-top:40px;"></div>
			
			
			
		</center>
		
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
</div>




<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
<?php
	include('../../php/sprawdzanie_sesji.php');
	include('../../php/root.php');
?>



</html>