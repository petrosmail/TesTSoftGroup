<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="images/icon.jpg" type="image/x-icon">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>My BloG</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
 
    
  

<header>
    <div class="header">
        <div class="logo">
            <h1><a href="index.php"><i>My_BloG</i></a></h1>
        </div>
        
        </div>
    </header>
   

    
    
    
<div class="main">
    <div class="ii">
<div class="info-img">
    <h1>Fresh news - every day!</h1><br><br>
    <p>Register and join us to perfected.<br>And your life will be better!</p>
    <br>
    <a class="button" href="reg.php">Register</a>
    </div>
</div>
</div>
    
  <div class="content">  
    
     
      
      <?php 
    mysql_connect('localhost','root','') or die(mysql_error());
    mysql_select_db('MyBlog');
    $id = (int)$_GET['id'];
    $query = ("SELECT * FROM post WHERE id='$id' "); 
    $res = mysql_query($query); 
    $row = mysql_fetch_array($res);

    ?>
    
    
    
<div class="one_page">
   
		<div class="title">
    
            <h1>
                <a href="" style="color:#1e8cbe;"><?php echo $row['category'] ?></a> → <a href=""><?php echo $row['title'] ?></a></h1>
            
            
    </div>	
		
		<br>
        
			
    <div class="post_short_text"><?php echo $row['post_text'] ?>
            
	      
    </div>
    
</div>




    </div>

    <footer>
    <div class="footer">
        <p>Зроблено для теста SoftGroup</p>
        <p>ПАРОЛЬ І ЛОГІН ДЛЯ АДМІНА разом з файлами.</p>
        <br>
        <a>petbko@outlook.com</a>
        </div>
    </footer>
    </body>
</html>
    