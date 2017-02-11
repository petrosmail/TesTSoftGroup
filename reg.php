<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="images/icon.jpg" type="image/x-icon">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Реєстрація | My_BloG</title>
    <link href="css/regstyle.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="js/functionreg.js"></script>
    </head>
<body>
  <?php
	mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('MyBlog');
	
	if(isset($_POST['submit'])) {
		$login = $_POST['login']; //
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $re_password = $_POST['re_password'];
        
        
         $query =  mysql_query("SELECT * FROM users WHERE login='$login' ");
         $user_data = mysql_fetch_array($query);
        
         $query_admins = mysql_query("SELECT * FROM admins WHERE login='$login' ");  //admins
         $user_data_admins = mysql_fetch_array($query_admins);
        
         $same_login = $user_data['login'];
         $same_ad = $user_data_admins['login'];
        
        if( ($password == $re_password)&&($login <> $same_login)&&($login <> $same_ad )) {  
            $query = mysql_query("INSERT INTO users (login, username, password) 
                                  VALUES ('$login','$username','$password')") or die(mysql_error());
            
            
            
            echo '<div class="avtreg_comp"><p>Тепер можете <a href="index.php">авторизуватися</a>=)</p></div>';
            $avtorization = true;
            echo '<div id="ifavt" class="true" style="display: none;"><h2>',$e_name,'</h2></div>';
            
        }
        else {
              
                if (($password <> $re_password)&&($login == $same_login)){
                    echo ('Такий логін вже є і да... паролі не збігаються :)');
                } else
                    
                if ($login == $same_login) {
                    die('Такий логін вже використовується');
            } else 
                    
                    if ($password <> $re_password){
                die('Паролі не збігаються!');
            
            } else 
                    if (($password <> $re_password)&&($login == $same_ad)) {
                         echo ('Такий логін вже є і да... паролі не збігаються :)');
                    
            } else 
                    if ($login == $same_ad) {
                    die('Такий логін вже використовується');
                        
            } else
                    if ($password <> $re_password){
                    die('Паролі не збігаються!');
	}
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
        </div>
    </header>
    
    
<div class="register_main">
    <div class="reg">
        <h1>Реєстрація:</h1><br>
        <form method="post"  >
            <input type="text" name="login" placeholder="[Login" required /><br>
            <input type="text" name="username" placeholder="[Username" required /><br>    
            <input type="password" name="password" placeholder="[Password" required /><br>
            <input type="password" name="re_password" placeholder="[Repeat Password" required /><br><br>
            <span class="in"><input type="submit" name="submit" value="Зареєструватися" /></span>
        </form>
        
        </div>
    </div>
    
    
    </body>
</html>