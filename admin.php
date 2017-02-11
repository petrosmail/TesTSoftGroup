<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="images/icon.jpg" type="image/x-icon">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Admin | My_BloG</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/admin.css" rel="stylesheet" type="text/css">
    
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
window.onload = function()
{
CKEDITOR.replace('short_content', {toolbar: 'Basic',});
CKEDITOR.replace('full_content', {toolbar: 'Basic',});

};
</script>
</head>
<body>
   <?php 
        mysql_connect('localhost','root','') or die(mysql_error());
        mysql_select_db('MyBlog');
    
        if(isset($_POST['add_post'])) {
        $category = $_POST['select'];
        $post_date = $_POST['date'];
        $title = $_POST['title'];
        $img = $_POST['img'];
        $short_content = $_POST['short_content'];
        $full_content = $_POST['full_content'];
        
            $query = mysql_query("INSERT INTO post (post_date,title,post_img,post_short_text,post_text,category) 
                                  VALUES ('$post_date','$title','$img','$short_content','$full_content','$category')") or die(mysql_error());
        
}
    ?>
    
    
    <header>
    <div class="header">
        <div class="logo">
            <h1><a href="index.php"><i>My_BloG</i></a></h1>
        </div>
        <div class="admin_info">
            <h1><i><span class="ad_style">A</span>D<span class="ad_style">M</span>I<span class="ad_style">N</span>_<span class="ad_style">M</span>O<span class="ad_style">D</span></i></h1>
        </div>
        </div>
    </header>
    <form method="post">
    <div class="title">
        <br>
    <a href="admin.php">Створити новий пост</a>
    <h1>Добавити пост:</h1>
       <span class="cat"> <p>Категорія:</p>
        <select name="select">
        <option name="category" value="Дизайн">Дизайн</option>
        <option name="category1" value="Маркетинг">Маркетинг</option>
        <option name="category2" value="Інше">Інше</option>
           </select></span>
    </div>
        <br>
       <div class="date">
        <input type="text" name="date" placeholder="/ДАТА/" required />
    </div> 
    <div class="title">
        <input type="text" name="title" placeholder="/ЗАГОЛОВОК/" required />
    </div>
    <div class="img">
        <input type="text" name="img" placeholder="/ЦЕ МІСЦЕ ДЛЯ КАРТИНКИ (URL)/" />
        
        </div>
    <div class="textarea">
    <textarea name="short_content">Тут ви можете добавити КОРОТКИЙ текст!</textarea>
    </div>
        <div class="textarea">
          <textarea name="full_content">Тут ви можете добавити ПОВНИЙ текст!</textarea>
    </div>
    <div class="post_submit">
        
        <input type="submit" name="add_post" value="Добавити пост"/>
        
    </div>
    </form>
    </body>
</html>