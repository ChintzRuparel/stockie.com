<?php

include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lemonada">
    <link rel="stylesheet" href="">
    <link rel = "icon" href =  "images/logo2.jpg" type = "image/x-icon"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <style>
        body{
            background-color:  rgb(103,132,190);;
            background-size: cover;
            
        }
        input{
    width: 200px;
    height: 35px;
    border-radius: 50px;
    background-color: rgba(255, 255, 255, 0.616);;
}
#submitbtn1 {
width: 100px;
height: 30px;
}
#a{
    font-size: 60px;
}
#signin :hover{
    color: rgb(204, 21, 204);
}
#homeicon{
              width: 50px;
              height: 50px;
                position: absolute;
                bottom: 30px;
                right: 30px;
            }
            
       
    </style>
</head>
</html>

<body style="font-family: Courier;">

    
    
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">  
            <form action=""  method="POST"> 
                <br>
                <center>
                    <p style="font-family: Lemonada; " id="a">stockie.com</p>
                    <br>
                <h1 style="font-family: Lemonada; ">LOGIN PAGE</h1>
                <br>
                <label for="">Please Enter Your Email-id  </label>
                <br>
                <input type="email" id="email" name="email" required>
                <br><br>
                <label for="">Please Enter Your Password  </label>
                <br>
                <input type="password" id="password" name="password" required>   
                <br><br>
                <label for="">Please Enter Secure Key  </label>
                <br>
                <input type="password" id="secure_key" name="secure_key" required>
                <br><br>
                
                <input type="submit" value="SUBMIT" id="submitbtn1" name="submitbtn1">
            
            <BR></BR>
                <?php   if(isset($_GET['error']) && $_GET['error'] == 1){ ?>
        <h5 style="color : pink">*Invalid username or password*</h5>    
       <?php } ?>
        
            <br><BR>
        </form></center>
        </div>
        
        
    </div>
</div>
</body>
<?php
$error =0;
	if(isset($_POST['submitbtn1'])){
		$password = $_POST['password'];
		$email = $_POST['email'];
        $secure_key = $_POST['secure_key'];
        echo $name.$pass.$email;
		$query = "Select * from user_details where  secure_key='$secure_key' and password='$password' and email='$email'";
		$data = mysqli_query($conn, $query);
		$totalrows = mysqli_num_rows($data);
		if($totalrows == 1){
            header('location:homepage.php');
            $_SESSION["table"] = $secure_key;
        }

	else{
        echo "Failed to Login";
        header('location:login.php?error=1');
	}
}
else{
	//echo "Failed to Login ";
}

?>