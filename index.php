<?php
	include 'header.html';
	require_once('create.php');
	if (isset($_POST['submit'])){
		setcookie("name", $_POST['name'], time()+3*30*24*3600,"/");
		setcookie("email", $_POST['email'], time()+3*30*24*3600,"/");
		header("Location:index.php");
	}

	if(isset($_COOKIE['name'])){
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