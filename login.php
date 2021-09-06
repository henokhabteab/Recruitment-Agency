 <?php
 
session_start();
require_once("component/operation.php");

$msg = "Username or password is Incorrect";

  if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM employee WHERE email=? AND password=?";
    $stmt = $GLOBALS['con']->prepare($sql);
    $stmt->bind_param("ss", $email,$password);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows==1){
      $row = $result->fetch_assoc();
      session_regenerate_id();
      $_SESSION['eid'] = $row['employeeid'];
      session_write_close();
      header("location:register.php");
    }
   
    else {
      TextNode("error","Username or password is Incorrect");
    }
  }

// echo "Hello";
 ?> 

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Custom styles for this template -->
  <link href="css/font-awesome.css" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

    <title></title>
    <link rel="short icon" href="images/favicon.ico">

  </head>
  <body id="page-top" data-spy="scroll" data-target=".navbar-custom">

  <nav class="navbar navbar-expand-md navbar-custom navbar-light fixed-top" style="margin-top: 20px;">
      <div class="container">
        <div class="page-scroll">
          <button class="navbar-toggler" type="button" data-toggle="collapse"
          data-target="#navbarsExamples09" aria-controls="navbarsExamples09"
          aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
           </button>
           <a href="index.php" class="navbar-brand font-weight-bold">HR Agency</a>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarsExamples09">
          <ul class="nav navbar-nav">
            <li class="hidden">
              <a href="#page-top" class="nav-link"></a>
            </li>
            <li class="page-scroll">
              <a href="index.php#why" class="nav-link font-weight-bold">Why Us?</a>
            </li>
            <li class="page-scroll">
              <a href="index.php#who" class="nav-link font-weight-bold">Who We Are?</a>
            </li>
            <li class="page-scroll">
              <a href="index.php#clients" class="nav-link font-weight-bold">Client</a>
            </li><li class="hidden">
              <a href="index.php#contact" class="nav-link font-weight-bold">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
     <br>
     <br>
     <br>
   
     <div class="container">
       <div class="form1 col-md-4 col-md-offset-4">
         <form action="" method="POST" class="p-4">
         <div class="form-group" style="width: 22rem;">
           <input type="text" class="form-control" name="email" placeholder="Email">
         </div>
         <div class="form-group" style="width: 22rem;">
           <input type="password" class="form-control" name="password" placeholder="password">
         </div>
         <div class="form-group">
           <input type="submit" class="btn btn-info btn-login" name="login" value="Login">
         </div>
         </form>
       </div>
   
     </div>
   
   
   
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    <footer id="sticky">
      <p>HR Agency &copy; 2021, All Rights Reserved</p>
    </footer>
    

    <!-- Optional JavaScript -->
    
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>