<?php
$base = "../../";
// include $base."/include/footer.php";
?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<body>
	<div class="container_fluid">
		<?php include $base . "/admin/navigation.php";
		echo '<link rel="stylesheet" type="text/css" href="' . SCRIPT_ROOT . '/css/style.css">';
		echo '<link rel="stylesheet" type="text/css" href="' . SCRIPT_ROOT . '/css/admin.css">';
		echo '<link rel="stylesheet" type="text/css" href="' . SCRIPT_ROOT . '/css/searchBar.css">';
		// $base = dirname(getcwd(), 1) ;
		// include ($base."/navigation.php");
		?>
		<div class="main_body">
			<?php
			include $base . "/include/searchBar.php";
			$pdo = new PDO('mysql:dbname=woodlands;host=localhost', 'root', '');

			// generateLetter($name, $id, $subject, $body, $foot)
			// {
			// 	$letter = '<strong>'.$name.'</strong><br>';
			// 	$letter .= '<strong>'.$id.'</strong><br><br>';
			// 	$letter .= '<p>Subject: '.$subject.'</p><br><br>';
			// 	$letter .= '<p>'.$body.'</p><br><br>';
			// 	$letter .= '<p>'.$foot.'</p>';
			// }
			$stdn = '';
			if (isset($_GET['ucId'])) {
				$stmt = $pdo->prepare("UPDATE ucas SET case_status = 1 WHERE UCAS_id = :ucId");
				$stmt->execute($_GET);

				$stmt = $pdo->prepare("INSERT INTO case_papers(UCAS_id, date_created) VALUES(:UCAS_id, :date_created)");
				$criteria = [
					'UCAS_id' => $_GET['ucId'],
					'date_created' => date('Y-m-d H:m:s'),
				];
				$res = $stmt->execute($criteria);
				if ($res) {
					echo "Case Created";
					$stmt = $pdo->prepare("SELECT * FROM ucas u JOIN case_papers c ON u.UCAS_Id = c.UCAS_Id WHERE u.UCAS_Id=:ucId");
					$stmt->execute($_GET);
					$stdn = $stmt->fetch();
					// var_dump($stdn);
				} else {
					echo "There was an error";
				}
			}

			?>
			<div class="btns">
				<button id="view_letter" class="add_btn">view</button><br>
				<button id="print" class="add_btn" onClick="printdiv('content');">Print</button>
			</div>

			<div id="letter">
				<div id="view">
					<button id="edit_letter" class="add_btn">edit</button><br>
					<div id="content">

						<?php echo $stdn['first_name']; ?>
					</div>

					<button id="done" class="add_btn" style="float: right">Done</button>
					<br><br>
				</div>

				<div id="edit_view">
					<textarea name="edited" id="edit" cols="50" rows="30">

						Dear,<br>
						Mr/Ms <?php echo $stdn['first_name'] . ' ' . $stdn['sur_name']; ?>,<br>
						<br>
						We are pleased to inform that you are admitted to the college under conditional admission. 
						Your student ID is <?php echo $stdn['case_id']; ?>.<br>
						<br>
						Please submit the remaining required files within two weeks from this date.<br>
						You will receive another e-mail once you submit all the required files.<br>
						<br>
						This invitation was intended for email(e.g. coopersheldon@gmail.com) If you were not expecting this invitation, you can ignore this email. Thank you.<br>
						<br>
						Best Regards,<br>
						Woodlands University College<br>
						<br>
						Note: This is an automated email do not reply to this email<br><br>
					</textarea>
					<br><br>
					<button id="done2" class="add_btn" style="float: right">Edit</button>
				</div>
			</div>




			<script>
				function printdiv(printpage) {
					var headstr = "<html><head><title></title></head><body>";
					var footstr = "</body>";
					var newstr = document.all.item(printpage).innerHTML;
					var oldstr = document.body.innerHTML;
					document.body.innerHTML = headstr + newstr + footstr;
					window.print();
					document.body.innerHTML = oldstr;
					return false;
				}

				function letterPop() {
					var content = document.getElementById("content");
					var let_value = document.getElementById("edit").value;
					letter.classList.toggle("pop");
					content.classList.add('show');
					content.innerHTML = let_value;
				}

				function editView() {
					var let_value = document.getElementById("edit").value;
					document.getElementById("content").innerHTML = let_value;
					document.getElementById("edit_view").classList.remove('show');
					document.getElementById("content").classList.add("show");
				}

				function showEdit() {
					document.getElementById("content").classList.remove('show');
					document.getElementById("edit_view").classList.add('show');
				}

				document.getElementById("edit_letter").addEventListener('click', showEdit);
				document.getElementById("done2").addEventListener('click', editView);
				document.getElementById("done").addEventListener('click', letterPop);
				document.getElementById("view_letter").addEventListener('click', letterPop);
			</script>

			<?php
			include($base . "/include/footer.php");
			?>