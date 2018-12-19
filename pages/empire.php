<?php

include '../mysql.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Florian Francois Web</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- Les fichiers Tools -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../index.css">

</head>
<body>
	<div class="topnav">
		<label for="toggle-1" class="toggle-menu">
			<ul>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</label>
	<input type="checkbox" id="toggle-1">
	<nav>
		<ul>
			<li class="col-md-2 no-padding"><a href="../index.html">Le coté Lumineux</a></li>
			<li class="col-md-2 no-padding"><a href="darkside.html">Le coté Obscur</a></li>
			<li class="col-md-2 no-padding"><a href="">L'empire</a></li>
			<li class="col-md-2 no-padding"><a href="">Les Droïdes</a></li>
			<li class="col-md-2 no-padding"><a href="">Les Ewoks</a></li>
			<li class="col-md-2 no-padding"><a href="">Jabba le Hutt</a></li>
		</ul>
	</nav>
	</div>

	<div class="img-iwantyou">
	</div>

	<div class="container">
		<div class="row">
		<?php
			// define variables and set to empty values
			$nameErr = $ageErr = $origineErr = "";
			$name = $age = $origine = $abilities = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if (empty($_POST["name"])) {
					$nameErr = "Name is required";
				} else {
					$name = test_input($_POST["name"]);
				}
				
				if (empty($_POST["age"])) {
					$ageErr = "Age is required";
				} else {
					$age = test_input($_POST["age"]);
				}
					
				if (empty($_POST["origine"])) {
					$origineErr = "Origine is required";
				} else {
					$origine = test_input($_POST["origine"]);
				}
				
				$abilities = test_input($_POST["abilities"]);
			}

			function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		?>

		<h2>Join the Empire</h2>
		<p><span class="error">* required field</span></p>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Name : <input type="text" name="name">
		<span class="error">* <?php echo $nameErr;?></span>
		<br><br>
		Age : <select type="int" name="age">
			<option value="">---</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
			<option value="25">25</option>
			<option value="26">26</option>
			<option value="27">27</option>
			<option value="28">28</option>
			<option value="29">29</option>
			<option value="30">30</option>
			<option value="31">31</option>
			<option value="32">32</option>
			<option value="33">33</option>
			<option value="34">34</option>
			<option value="35">35</option>
		</select>
		<span class="error">* <?php echo $ageErr;?></span>
		<br><br>
		Origine : <select type="text" name="origine">
			<option value="">---</option>
			<option value="Alderaan">Alderaan</option>
			<option value="Bilbringi">Bilbringi</option>
			<option value="Chandrila">Chandrila</option>
			<option value="D'Qar">D'Qar</option>
			<option value="Endor">Endor</option>
			<option value="Fondor">Fondor</option>
			<option value="Ghorman">Ghorman</option>
			<option value="Hoth">Hoth</option>
			<option value="Iego">Iego</option>
			<option value="Jelucan">Jelucan</option>
			<option value="Kinyen">Kinyen</option>
			<option value="Lotho Minor">Lotho Minor</option>
			<option value="Mandalore">Mandalore</option>
			<option value="Naboo">Naboo</option>
			<option value="Orto Plutonia">Orto Plutonia</option>
			<option value="Pantora">Pantora</option>
			<option value="Quarzite">Quarzite</option>
			<option value="Ruusan">Ruusan</option>
			<option value="Stewjon">Stewjon</option>
			<option value="Tatooine">Tatooine</option>
			<option value="Utapau">Utapau</option>
			<option value="Velusia">Velusia</option>
			<option value="Wynkahthu">Wynkahthu</option>
			<option value="Yavin">Yavin</option>
			<option value="Zygerria">Zygerria</option>
		</select>
		<span class="error">* <?php echo $origineErr;?></span>
		<br><br>
		Abilities : <textarea name="abilities" rows="3" cols="25"></textarea>
		<br><br>
		<input type="submit" name="submit" value="Submit">
		</form>

		<?php
			echo "<h2> Your Input :</h2>";
			echo $name;
			echo "<br>";
			echo $age;
			echo "<br>";
			echo $origine;
			echo "<br>";
			echo $abilities;
			echo "<br>";
			echo "<br>";
		?>
		</div>
	</div>
</body>
</html>
