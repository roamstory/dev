<?php
require_once '../includes/db.php';

	$query = "DELETE FROM tb_todo WHERE status = 2";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$result = $mysqli->affected_rows;

	echo $json_response = json_encode($result);
?>
