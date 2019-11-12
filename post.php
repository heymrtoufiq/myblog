<?php include 'inc/header.php';?>

<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL){
    header("Location:404.php");
}else{
    $id = $_GET['id'];
}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
                <?php
                $query = "select * from tbl_post where id= $id";
                $post = $db->select($query);

                    if($post){
                    while ($result = $post->fetch_assoc()){
                ?>

				<h2><?php echo $result['title']?></h2>
				<h4>April 10, 2016, 12:30 PM, By Delowar</h4>
                <img src="admin/<?php echo $result['image']?>"
				<p><?php echo $result['body']?></p>

				<div class="relatedpost clear">
					<h2>Related articles</h2>
                    <?php
                        $catid = $result['cat'];

                        $queryrelated = "select * from tbl_post where cat= '$catid' order by rand() limit 6";
                        $relatedpost = $db->select($queryrelated);

                    if($relatedpost){
                    while ($rresult = $relatedpost->fetch_assoc()){
                ?>
					<a href="post.php?id=<?php echo $rresult['id']?>"><img src="admin/<?php echo $rresult['image']?>" alt="post image"/></a>
			        <?php } } else{
                        echo "No Related Post Available!!";
                    }?>
                    <?php  } } else{ header("Location:404.php");}?>
                </div>
	</div>

		</div>
<?php include "inc/sidebar.php";?>
<?php include "inc/footer.php";?>