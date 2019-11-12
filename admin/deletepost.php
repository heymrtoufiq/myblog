<?php
include '../lib/session.php';
Session::checkSession();
?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php include '../helpers/Format.php';?>
<?php
$db = new Database();
?>

<?php
if (!isset($_GET['delpostid']) || $_GET['delpostid'] == null){
    echo "<script>window.location='postlist.php';</script>";
}else{
    $postid = $_GET['delpostid'];
    $query = "select * from tbl_post where id ='$postid'";
    $getData = $db->select($query);
    if ($getData){
        while ($delimg = $getData->fetch_assoc()){
            $dellink = $delimg['image'];
            unlink($dellink);
        }
    }

    $delquery = "delete from tbl_post where id = '$postid'";
    $delData = $db->delete($delquery);
    if ($delData){
        echo "<script>alert('Data deleted Successfully.');</script>";
        echo "<script>window.location='postlist.php';</script>";
    }else{
        echo "<script>alert('Data not deleted.');</script>";
        echo "<script>window.location='postlist.php';</script>";
    }
}
?>
