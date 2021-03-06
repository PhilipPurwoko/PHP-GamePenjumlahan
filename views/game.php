<?php
session_start();

function randomize()
{
	$angka1 = rand(1, 20);
	$angka2 = rand(1, 20);
	$kunci = $angka1 + $angka2;
	$_SESSION["angka1"] = $angka1;
	$_SESSION["angka2"] = $angka2;
	$_SESSION["kunci"] = $kunci;
}

if (!isset($_SESSION["lives"])) {
	include("resetgame.php");
	header("Location: game.php");
}

if ($_SESSION["lives"] <= 0) {
	header("Location: leaderboard.php");
}

if (!isset($_SESSION['kunci'])) {
	$_SESSION['msg'] = "tetap semangat ya... you can do the best!!";
	randomize();
	header("Location: game.php");
}

if (isset($_POST['jawab'])) {
	if ($_POST['answer'] == $_SESSION['kunci']) {
		randomize();
		$_SESSION["score"] = $_SESSION["score"] + 10;
		$_SESSION['msg'] = "Selamat jawaban Anda benar...";
		header("Location: game.php");
	} else {
		$_SESSION["score"] = $_SESSION["score"] - 2;
		$_SESSION["lives"] = $_SESSION["lives"] - 1;
		$_SESSION['msg'] = "sayang jawaban Anda salah... tetap semangat ya !!!";
		header("Location: game.php");
	}
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<nav class="navbar navbar-dark bg-dark">
	<h2 class="navbar-brand">Game Penjumlahan</h2>
</nav>
<div class="container">
	<div class="row">
		<div class="col">
			<?php
			echo "Hallo " . $_COOKIE['name'] . ", " . $_SESSION['msg'];
			echo "<br>";
			echo "Lives: " . $_SESSION['lives'] . " | Score: " . $_SESSION['score'];
			echo "<br>";
			echo "Berapakah " . $_SESSION["angka1"] . " + " . $_SESSION["angka2"];
			echo "<br>";
			?>
			<form action="game.php" method="POST">
				<div class="form-group">
					<input class="form-control" type="number" name="answer">
				</div>
				<div class="form-group">
					<input class="btn btn-primary btn-block" type="submit" name="jawab" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>