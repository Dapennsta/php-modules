<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
	// Check to see if score is set
	if ( !isset($_SESSION['score']) ) {
		$_SESSION['score'] = 0;
	}

	if ($_POST) {
		$number = $_POST['number'];
		$selected_choice = $_POST['choice'];
		$next = $number+1;

		/*
		 *	Get total questions
		 */
		$query = "SELECT * FROM `questions`";
		$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
		$total = $results->num_rows;

		/*
		 *	Get corrent choice
		 */
		$query = "SELECT * FROM `choices`
				  WHERE question_number = $number AND is_correct = 1";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		$row = $result->fetch_assoc();
		$correct_choice = $row['id'];
		
		if ($selected_choice == $correct_choice) {
			// Answer is correct
			$_SESSION['score']++;
		}

		// Check if last question
		if ($number == $total) {
			header("Location: final.php");
			exit();
		} else {
			header("Location: question.php?n=".$next);
		}

	}
?>