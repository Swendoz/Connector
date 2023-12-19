<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Connector by Swendoz</title>
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<div class="container">
		<h1>Connector</h1>

		<div class="new-connect-box">
			<form action="./php/create.php" method="post">
				<h3>Send a new connect</h3>

				<?php if (isset($_GET['status']) && $_GET['status'] != null) {
					$getStatus = explode('-', $_GET["status"]);
				?>
					<div class='<?php echo "status {$getStatus[0]}"; ?>'>
						<?php echo $getStatus[1] ?> </div>
				<?php } ?>

				<div class="input-box">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" placeholder="Swendoz" />
				</div>

				<div class="input-box">
					<label for="message">Message</label>
					<textarea name="message" id="message" rows="10" placeholder="Your message..." maxlength="255"></textarea>
				</div>

				<button type="submit" class="send-button">Send</button>
			</form>
		</div>

		<div class="connects" id="connects">
			<?php

			include "./db/db_conn.php";

			$sql = "SELECT * FROM connects ORDER BY date DESC";
			$stmt = $pdo->query($sql);

			while ($row = $stmt->fetch()) {
				echo "<div class='connect'>
			    <h5 class='connect-title'>{$row['username']}</h5>
			    <p class='connect-message'>
			      {$row['message']}
			    </p>
				<div class='connect-date'>{$row['date']}</div>
			</div>";
			}
			?>
			<!-- <div class="connect">
                <h5 class="connect-title">Name</h5>
                <p class="connect-message">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed, deserunt. Ipsum aliquam, porro, totam
                    quasi tempora eligendi incidunt sequi sit, quisquam temporibus fugit distinctio! Ipsum obcaecati
                    reiciendis suscipit odio maiores non aspernatur distinctio iste fuga accusantium eos, quia facilis
                    necessitatibus nemo earum explicabo error deserunt, ad nostrum nisi ea incidunt adipisci porro?
                    Tenetur blanditiis incidunt debitis vitae deleniti, illum repellendus soluta quod provident minus
                    odio maxime. Incidunt consequuntur aliquid repellat beatae eaque dolorum molestias laborum eligendi
                    odio vitae quas laudantium ad blanditiis nam illum, nostrum tempore eos fugit debitis voluptate,
                    officiis, dolores aliquam? Excepturi rem delectus atque vitae, natus nostrum ducimus modi
                    repudiandae fugit neque perferendis adipisci repellat facere id quisquam eius esse blanditiis, nisi
                    nobis ad assumenda. Totam, quia? Nisi obcaecati odit consequatur. Aperiam nam voluptate voluptas
                    laboriosam corrupti aliquid saepe non. Et ipsa ipsum dolore incidunt odio animi error perspiciatis,
                    amet veniam optio, magnam eius qui assumenda officia minus eaque libero aliquid aperiam quis quae
                    aliquam esse aspernatur, sunt ratione? Obcaecati maiores eaque quisquam quidem eligendi dolor facere
                    minus distinctio consequatur aperiam, ipsa, eius nostrum totam dignissimos! Ullam nobis quasi
                    numquam dolore. Animi enim, expedita voluptate commodi sint maiores dolores minima sed eius. Dolor
                    adipisci quo veritatis fuga eius cumque consequatur magnam velit voluptatem dolores sapiente aperiam
                    distinctio tenetur reiciendis voluptas esse nobis, rerum explicabo autem soluta voluptate sequi
                    aliquid consectetur! Non, asperiores aut temporibus corporis nihil eum velit aperiam accusantium
                    deserunt, veniam dignissimos voluptates quis quod itaque. Deserunt soluta repellendus atque sunt
                    nesciunt voluptas delectus perferendis tempore, quia, voluptate neque distinctio consequatur.
                </p>
                <div class="connect-date">05-02-2005</div>
            </div> -->
		</div>
	</div>
	<script src="script.js"></script>
</body>

</html>