<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<nav class="navbar navbar-dark bg-dark">
	<h2 class="navbar-brand">Game Penjumlahan</h2>
</nav>
<?php
session_start();
?>
<div class="container">
	<div class="row">
		<div class="col">
			<?php
			echo "<p>Hello, " . $_COOKIE["name"] . ", Sayang permainan sudah selesai. Semoga kali lain bisa lebih baik.</p>";
			echo "Skor Anda: " . $_SESSION["score"];
			echo "<br>";

			require_once "../config.php";
			$insert = "
						INSERT INTO users (name, email, score)
						VALUES ('" . $_COOKIE['name'] . "','" . $_COOKIE['email'] . "', '" . $_SESSION['score'] . "')
					";
			$update = "
						UPDATE users
						SET name = '{$_COOKIE['name']}',
							email = '{$_COOKIE['email']}',
							score = '{$_SESSION['score']}'
						WHERE email = '{$_COOKIE['email']}';
					";
			$conn->query($insert);
			if ($conn->error) {
				$conn->query($update);
				echo $conn->error;
			}
			include "resetgame.php";
			?>
			<a class="btn btn-primary" href="game.php">Main Lagi</a>
			<style type="text/css">
				table,
				tr,
				td,
				th {
					border: 1px solid black;
					padding: 5px;
				}
			</style>
			<h2>Leaderboard</h2>
			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Rank</th>
						<th scope="col">Nama</th>
						<th scope="col">Email</th>
						<th scope="col">Skor</th>
					</tr>
				</thead>
				<tbody>
					<?php
					require_once("../config.php");
					$q = $conn->query("SELECT * FROM users ORDER BY score DESC");
					$no = 0;
					while ($dt = $q->fetch_assoc()) {
						$no++;
						echo "<tr>";
						echo "<th scope='row'>" . $no . "</td>";
						echo "<td>" . $dt["name"] . "</td>";
						echo "<td>" . $dt["email"] . "</td>";
						echo "<td>" . $dt["score"] . "</td>";
						echo "</tr>";
					}
					echo "</table>";
					$conn->close();
					?>
				</tbody>
		</div>
	</div>
</div>