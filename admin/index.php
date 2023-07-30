<?php
$page = "overview.php";

if (isset($_GET['page'])) {
	$slider = false;
	$routePage = $_GET['page'];
	switch ($routePage) {
		case "docs":
			$page = "docs.php";
			break;
		case "orders":
			$page = "orders.php";
			break;
		case "service":
			$page = "service.php";
			break;
		default:
		$page = "overview.php";
			break;
	}
}
?>
<?php include "../config/db.php" ?>
<!DOCTYPE html>
<html lang="en">

<?php include "includes/head.php" ?>

<body class="app">
	<!--------------- NavBar -------------->
	<?php include "includes/nav_bar.php" ?>
	<!-----------------end---------------->
	<!--------------- Body -------------->
	<?php include "pages/$page" ?>
	<!-----------------end---------------->

</body>
<?php include "includes/javascript.php" ?>

</html>