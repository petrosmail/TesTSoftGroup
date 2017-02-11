<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="images/icon.jpg" type="image/x-icon">
	<title>My BloG</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="js/function.js"></script>
    
</head>
<body>
 <?php 
    include ('function/function.php');
    mysql_connect('localhost','root','') or die(mysql_error());
    mysql_select_db('MyBlog');
    
   if(isset($_POST['enter'])) {
        $e_login = $_POST['e_login'];
        $e_password = $_POST['e_password'];
        
        $query_users = mysql_query("SELECT * FROM users WHERE login='$e_login' ");   //users
        $user_data_users = mysql_fetch_array($query_users);
        
        $query_admins = mysql_query("SELECT * FROM admins WHERE login='$e_login' ");  //admins
        $user_data_admins = mysql_fetch_array($query_admins);
        
        if($user_data_users['password'] == $e_password) {
            echo '<h1 class="for_user">Привіт , ', $e_login ,')</h1>';
            
            $avtorization = true;
            echo '<div id="ifavt" class="true" style="display: none;"><h2>',$e_name,'</h2></div>';
        }
        else
        if($user_data_admins['password'] == $e_password) {
          echo '<h1 class="for">Привіт адмін, ', $e_login ,')</h1>';
            
            
            $avtorization = true;
            $admin = true;
            
            
         //   echo (int)$admin,'   ', (int)$avtorization;
            echo '<div id="ifadmin" class="true" style="display: none;"><h2>',$e_login,'</h2></div>';
           echo '<div id="ifavt" class="true" style="display: none;"><h2>',$e_name,'</h2></div>' ;
        } else {
            echo '<div id="ifavt" class="true" style="display: none;"></div>';
              echo "<h1 class='for_user'>Не вірний логін або пароль!</h1>";
        }
    }
?> 
<script>
    $(document).ready(avt_ad);
    </script>
<header>
    <div class="header">
        <div class="logo">
            <h1><a href="index.php"><i>My_BloG</i></a></h1>
        </div>
        <div class="acreg" id="active">
            <h1 align="center">Авторизація:</h1>
            <div class="form">
                <form method="post" >
                <input type="text" name="e_login" placeholder="[Login" required /><br>
                <input type="password" name="e_password" placeholder="[Password" required /><br>
                    <span class="in"><input type="submit" name="enter" value="Увійти" /></span><a href="reg.php">Ще немає акаунта?</a>
                </form>
            </div>
            
        </div>
        <div class="butad">
<a href="admin.php"><input type="submit" name="submit" value="Адмін Меню"/></a>    
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
      
      <div class="select_cat">
          <form method="post">
       <!-- $_POST['selected'] == value    -->
        <input type="submit" name="sub_all_cat" value="Усі"></input>
     <input type="submit" name="sub_cat" value="Дизайн"></input>
     <input type="submit" name="sub_cat" value="Маркетинг"></input> 
     <input type="submit" name="sub_cat" value="Інше"></input>
        
    
          </form>
      </div>

<?php 
    
$per_page=10;
if (isset($_GET['page'])) $page=($_GET['page']-1); else $page=0;
$start= abs($page*$per_page);

$res=mysql_query("SELECT * FROM `post` LIMIT $start,$per_page");
 
  // select    
      
      
//$_POST['selected'];
  if (isset($_POST['sub_all_cat'])){    
print_post($res);
  }else 
      if (isset($_POST['sub_cat'])){
          
          $cat = $_POST['sub_cat'];
          $res = mysql_query("SELECT * FROM post WHERE category='$cat' LIMIT $start,$per_page");
          print_post($res);
      }
     //post > 
      
// дальше выводим ссылки на страницы:
$q= ("SELECT count(*) FROM `post`");
$res=mysql_query($q);
$row=mysql_fetch_row($res);
$total_rows=$row[0];

$num_pages=ceil($total_rows/$per_page);

for($i=1;$i<=$num_pages;$i++) {
  if ($i-1 == $page) {
      
    echo '<div class="pag"><span class="first_pag">' ,$i."</span></div>";
  } else {
    echo '<div class="pag"><a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i."</a></div>";
      
  }
}

    ?>
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