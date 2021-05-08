<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<nav class="navbar navbar-dark bg-dark">
	<h2 class="navbar-brand">Game Penjumlahan</h2>
</nav>
<?php
require_once('create.php');
if (isset($_POST['submit'])) {
	setcookie("name", $_POST['name'], time() + 3 * 30 * 24 * 3600, "/");
	setcookie("email", $_POST['email'], time() + 3 * 30 * 24 * 3600, "/");
	header("Location:index.php");
}

if (isset($_COOKIE['name'])) {
	echo '<div class="container"><div class="row"><div class="col">';
	echo "<p>Halo " . $_COOKIE["name"] . ", selamat datang kembali di permainan ini !!</p>
			<a href='views/game.php' class='btn btn-primary mb-3'>Mulai Permainan</a>
			<form method='POST' action='reset.php'>
				<input class='btn btn-warning' type='submit' name='reset' value='Bukan Anda ?'>
			</form>";
	echo '</div></div></div>';
} else {
?>

	<div class="container">
		<div class="row">
			<div class="col">
				<form method="POST" action="index.php">
					<div class="form-group">
						<label for="name">Masukkan Nama Anda</label>
						<input class="form-control" type="text" name="name" placeholder="Nama">
					</div>
					<div class="form-group">
						<label for="name">Masukkan Email Anda</label>
						<input class="form-control" type="email" name="email" placeholder="Email">
					</div>
					<input class="btn btn-primary btn-block" type="submit" name="submit">
				</form>
				<p class="text text-muted">Copyright Philip Purwoko, A.P - NIM K3519066 - Kelas B</p>
			</div>
		</div>
	</div>
<?php } ?>