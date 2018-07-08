<?php 

	include_once('main.php');

	$mysqli_2 = new mysqli("localhost", "root", "", "db_authorization");
    if (!$mysqli_2) die ("Невозможно подключение к MySQL");
	$mysqli_2->query("SET CHARACTER SET 'UTF8'"); 
	$mysqli_2->query("SET CHARSET 'UTF8'");  
	$mysqli_2->query("SET NAMES 'UTF8'");

	if ($result = $mysqli_2->query("SELECT * FROM questionnaire  WHERE id = '1'")) {
		$row = $result->fetch_assoc();
		if ($row) {
			$question = $row['question'];
			$answer1 = $row['answer1'];
			$answer2 = $row['answer2'];
			$answer3 = $row['answer3'];
			$answer4 = $row['answer4'];
		}
		$result->free();
		$content->set('{QUESTION}', $question);
		$content->set('{ANSWER1}', $answer1);
		$content->set('{ANSWER2}', $answer2);
		$content->set('{ANSWER3}', $answer3);
		$content->set('{ANSWER4}', $answer4);
		$content->out_content('auth.tpl');
	}

	if (isset($_POST['send'])) {
        $to_bd = $_POST['answer'];
		if ( $result = $mysqli_2->query("SELECT * FROM questionnaire  WHERE id = '1'")) {
			$row = $result->fetch_assoc();
			if ($row) {
				$value = $row[$to_bd] + 1;
			}
			$result->free();
			$mysqli_2->query("UPDATE questionnaire SET `$to_bd` = '$value' WHERE id = '1'"); 
		}
	}
