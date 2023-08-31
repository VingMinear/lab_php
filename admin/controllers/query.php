<?php
function queryData($query)
{
	include "../config/db.php";
	$sql = $query;
	$result = mysqli_query($conn, $sql); //or die("Error in Selecting DB")
	if (!$result) {
		alertMsgStyle('Insert data error >' . mysqli_error($conn) . ' ', "error");
	}
	mysqli_close($conn);
	return $result;
}
