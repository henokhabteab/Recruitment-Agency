<?php

require_once("db.php");
require_once ("component.php");

$con = Createdb();

if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['update'])){
    UpdateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}

if(isset($_POST['deleteall'])){
    deleteAll();
}


function createData(){
    $firstname = textboxValue("fName");
    $lastname = textboxValue("lName");
    $gender = textboxValue("gender");
    $profession = textboxValue("profession");
    $address = textboxValue("address");
    $email = textboxValue("email");
    $password = textboxValue("password");
    $phone = textboxValue("phone");

    if($firstname&&$lastname&&$gender&&$profession&&$address&&$email&&$password&&$phone){

        $sql = "INSERT INTO employee(fName,lName,gender,profession,address,email,password,phone)
                VALUES('$firstname','$lastname','$gender','$profession','$address','$email','$password','$phone')";

        if(mysqli_query($GLOBALS['con'],$sql)){
            TextNode("success","Record Successfully Inserted...!");
        }else{
            echo "Error";
        }
    }else{
         TextNode("error","Provide data in the text boxes");
    }
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}


//Messages
function TextNode($classname,$msg){
    $element="<h6 class='$classname'>$msg</h6>";
    echo $element;
}

//get data from mysql database
function getData(){
    $sql = "SELECT * FROM employee";

    $result = mysqli_query($GLOBALS['con'],$sql);

    if(mysqli_num_rows($result)>0){
       return $result;
    }
}

function getEmployeeData(){
    $sql = "SELECT * FROM employee WHERE employeeid=?";
    $stmt = $GLOBALS['con']->prepare($sql);
    $stmt->bind_param("s", $_SESSION['eid']);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows==1){
        $row = $result->fetch_assoc();
        return $row;
      }
   return null;
  
}

//update data
function UpdateData(){
    
    $id =  $_SESSION['eid'];
    $firstname = textboxValue("fName");
    $lastname = textboxValue("lName");
    $gender = textboxValue("gender");
    $profession = textboxValue("profession");
    $address = textboxValue("address");
    $email = textboxValue("email");
    // $password = textboxValue("password");
    $phone = textboxValue("phone");
    
    if($firstname && $lastname && $gender && $profession && $address && $email && $phone){
        $sql="
           UPDATE employee SET fName='$firstname',lName='$lastname',gender='$gender'
                             ,profession='$profession',address='$address',email='$email',
                              phone='$phone' WHERE employeeid='$id'
        ";

        if(mysqli_query($GLOBALS['con'],$sql)){
            TextNode("success","Data Successfully Updated");
        }else{
            TextNode("error","Unable to Update Data");
        }
    }else{
        TextNode("error","Select Data Using Edit Icon");
    }
}


//Delete Record
function deleteRecord(){
    $id = (int)textboxValue("employeeid");

    $sql = "DELETE FROM employee WHERE employeeid=$id";

    if(mysqli_query($GLOBALS['con'],$sql)){
        TextNode("success","Record Deleted Successfully...!");
    }else{
        TextNode("error","Unable to delete record.");
    }
}

function deleteBtn(){
    $result = getData();
    $i = 0;
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $i++;
            if($i > 3){
                buttonElement("btn-deleteall", "btn btn-danger" ,"<i class='fas fa-trash'></i> Delete All", "deleteall", "");
                return;
            }
        }
    }
}

function deleteAll(){
    $sql = "DROP TABLE employee";

    if(mysqli_query($GLOBALS['con'],$sql)){
        TextNode("success","All Records Deleted Successfully...!");
        createDb();
    }else{
        TextNode("error","Something Went Wrong. Records cannot be deleted.");
    }
}

//Set id to textbox
function setID(){
    $getid = getData();
    $id = 0;
    if($getid){
        while($row = mysqli_fetch_assoc($getid)){
            $id = $row['employeeid'];
        }
    }
    return($id + 1);
}