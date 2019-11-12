<?php
include '../lib/session.php';
Session::checkSession();
?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php
$db = new Database();
?>

<?php
if (!isset($_GET['delepage']) || $_GET['delepage'] == null){
	echo "<script>window.location='index.php';</script>";
}else{
	$pageid = $_GET['delepage'];


	$delquery = "delete from tbl_page where id = '$pageid'";
	$delPage = $db->delete($delquery);
	if ($delPage){
		echo "<script>alert('Page deleted Successfully.');</script>";
		echo "<script>window.location='index.php';</script>";
	}else{
		echo "<script>alert('Page not deleted.');</script>";
		echo "<script>window.location='index.php';</script>";
	}
}
?>
