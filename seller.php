<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "jitudelhi");
if(isset($_POST['signup'])) 

        { SignUp(); }

if(isset($_POST['Login'])) 

        { Login(); }


function NewUser() { $fullname = $_POST['email']; $userName = $_POST['psw']; $query = "INSERT INTO seller (email,pass) VALUES ('$email','$password')"; $data = mysql_query ($query)or die(mysql_error()); if($data) { echo "YOUR REGISTRATION IS COMPLETED..."; } }




function SignUp() { 

    if(!empty($_POST['user'])) 

    { 

    $query = mysql_query("SELECT * FROM websiteusers WHERE userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error()); 

    if(!$row = mysql_fetch_array($query) or die(mysql_error())) 
        { newuser(); } 
    else { echo "SORRY...YOU ARE ALREADY REGISTERED USER..."; }
     } 
 } 

function Login()
{
    
}






 ?>

}