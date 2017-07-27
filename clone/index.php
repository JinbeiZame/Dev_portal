<!DOCTYPE html>
<?php    
$image = "/img/email.png";
?>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Web Service</title>
    
    
    
    
        <link rel="stylesheet" href="css/style.css">

           <?php
ob_start();
session_start();
session_destroy();

session_start();
?>
 <?php
  include("lib/nusoap.php");
        $client = new nusoap_client("http://thaisecuremail.com/WebServiceServer.php?wsdl",true); 
  
  
?>
 
  
    
  </head>

  <body>
<center>  <h1>Develop Portal</h1> <br>
 <!-- <a href="./WebServiceServer.php?wsdl">WEB SERVICE HERE</a>-->
    <!--Google Font - Work Sans-->
<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link rel="import" href="https://www.polymer-project.org/0.5/components/paper-ripple/paper-ripple.html">

<div class="container hoverable">
  <div class="profile">
    <button class="profile__avatar" id="toggleProfile">
     <img src="<?php echo $image;  ?>" alt="Avatar" /> 
    </button>
    <div class="profile__form">
     <form method="get" action="index.php">
        <div class="profile__fields">
        <div class="field">
            
          <input name="username" type="text" id="fieldUser" class="input" required pattern=.*\S.* />
          <label for="fieldUser" class="label">Username</label>
        </div>
        <div class="field">
          <input name="password" type="password" id="fieldPassword" class="input" required pattern=.*\S.* />
          <label for="fieldPassword" class="label">Password</label>
        </div>
        <div class="profile__footer">
         <button class="button raised blue"  type="submit">
             <div class="center" fit>Connect</div>
            <paper-ripple fit></paper-ripple>
               
             </button>
        
        </div>
    
     </div>
        
        </form>
  </div>
</div>
    <?php
  $a = $_GET['username'];
  $b = $_GET['password'];

        $data = $client->call("login",array('uname'=>$a , 'pass'=>$b)); 
  
  if($data) {
    
  # echo " <a hret=\"http://thaisecuremail.com/WebServiceServer.php?wsdl\"></a>" ;
   #window.open("http://thaisecuremail.com/WebServiceServer.php?wsdl");
   echo "<a href=\"http://thaisecuremail.com/WebServiceServer.php?wsdl\" target=\"_blank\">Web Service</a>"; 

    }
  else
  {
    echo "";
  }
  
?>
        <script src="js/index.js"></script>

     <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

    
    
  </body>
</html>
