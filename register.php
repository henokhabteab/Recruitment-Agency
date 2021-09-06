<?php
session_start();
require_once("component/component.php");
require_once("component/operation.php");
$islogIn = false;
$formValues = [
    "firstName" => "",
    "lastName" => "",
    "gender" => "",
    "profession" => "",
    "address" => "",
    "email" => "",
    "phone" => "",

];
if((isset($_SESSION['eid']) && $_SESSION['eid'] != '')){
    $employeeData = getEmployeeData();
    if($employeeData != null){
        $islogIn = true;
       $formValues['firstName']=$employeeData['fName'];
       $formValues['lastName']=$employeeData['lName'];
       $formValues['gender']=$employeeData['gender'];
       $formValues['profession']=$employeeData['profession'];
       $formValues['address']=$employeeData['address'];
       $formValues['email']=$employeeData['email'];
       $formValues['phone']=$employeeData['phone'];

    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employment</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fa fa-industry"></i> Welcome <?php echo  $formValues['firstName']; ?></h1>

        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="py-2">
                    <?php inputElement("<i class='fas fa-id-card-alt'></i>","EmployeeID", "employeeid",setID()); ?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("<i class='fas fa-portrait'></i>","First Name","fName",$formValues['firstName']); ?>
                    </div>
                    <div class="col">
                        <?php inputElement("<i class='fas fa-portrait'></i>","Last Name","lName",$formValues['lastName']); ?>
                    </div>
                </div>

                <div class="pt-2">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text bg-warning" for="inputGroupSelect01"><i class="fas fa-venus-mars"></i></label>
                        </div>
                        <select class="custom-select" name="gender" id="inputGroupSelect01">
                            <option selected>Gender...</option>
                            <option value="male" <?php if($formValues['gender']=='male'){echo 'selected';} ?>>Male</option>
                            <option value="female" <?php if($formValues['gender']=='female'){echo 'selected';} ?>>Female</option>
                        </select>
                    </div>
                </div>

                <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <label class="input-group-text bg-warning" for="inputGroupSelect01"><i class="fa fa-industry"></i></label>
                        </div>
                        <select class="custom-select" name="profession" id="inputGroupSelect01">
                            <option selected>Profession...</option>
                            <option value="web developer" <?php if($formValues['profession']=='web developer'){echo 'selected';} ?>>web developer</option>
                            <option value="mechanic" <?php if($formValues['profession']=='mechanic'){echo 'selected';} ?>>mechanic</option>
                            <option value="engineer" <?php if($formValues['profession']=='engineer'){echo 'selected';} ?>>engineer</option>
                            <option value="electrician" <?php if($formValues['profession']=='electrician'){echo 'selected';} ?>>electrician</option>
                        </select>
                    </div>

                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-address-card'></i>","Address","address",$formValues['address']); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-envelope-square'></i>","Email","email",$formValues['email']); ?>
                </div>

                <!-- password -->
                <?php 
                if($islogIn == false){
                ?>
                
                <div class="pt-2">
                <?php
                inputElementPassword("<i class='fas fa-envelope-square'></i>","Password","password","","password");?>
                 </div>
                 <?php
                }
                ?>

                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("<i class='fas fa-phone'></i>","Phone Number","phone",$formValues['phone']); ?>
                    </div>
                </div>

                <div class="d-flex">
                    
                    <?php if(!$islogIn){buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","data-toggle='tooltip'data-placement='bottom'title='Create");}  ?>
                    <!-- <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","data-toggle='tooltip'data-placement='bottom'title='Read");  ?> -->
                    <?php if($islogIn){buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","data-toggle='tooltip'data-placement='bottom'title='Update"); } ?>
                </div>
            </form>
        </div>

        <button class="btn btn-dark"><a href="logout.php">Back to Home...</a></button>
    </div>
</main>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="../employment/component/main.js"></script>

</body>
</html>
