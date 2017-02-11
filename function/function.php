<?php 
//function print_cat($cat){
//    $query_cat = mysql_query("SELECT * FROM post WHERE category='$cat' ");
//     
//}

function print_post($res){
while($row=mysql_fetch_array($res)) {
    ?>
<div class="one_page">
   <div class="title">
    <h1><a href="page.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></h1>
            <a><p><?php echo $row['category'] ?></p></a>
            </div>	
		<br>
        <div class="post_short_text"><?php echo $row['post_short_text'] ?>
            <br>
	       <img src="<?php echo $row['post_img'] ?>" />
        </div>
    <div class="more">
        <a href="page.php?id=<?php echo $row['id'] ?>">
    <h3>Читати далі →</h3> 
        </a>
    </div><span class="date"><?php echo $row['post_date'] ?></span>
</div>
<?php 
}
}
?>