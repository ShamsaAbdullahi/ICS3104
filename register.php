<?php   
 include_once 'user.php';    
 include_once 'db.php';    
 $con = new DBConnector();    
 $pdo = $con->connectToDB();   
      
 if (isset($_POST["register"])) {              
       $fullName = $_POST['fullnames'];       
       $email = $_POST['email']; 
       $residence=$_POST['residence'];      
       $password = $_POST['password'];        
       $user = new User($email,$password);        
       $user->setFullnames($fullName);
       $user->setResidence($residence);        
       echo $user->register($pdo); 
       
       


    } 

    

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <link rel="stylesheet" href="assets/css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    </head>
    <body id="register">
        <div class="login">
            <div class="login_contents">
                <div class="login_image">
                    <img src="assets/images/teal.jpg" alt="Login Image">
                </div>
                <div class="forms">
      
                    <form action="" class="login_register block" id="login_in" method="POST">
                        <h1 class="tittle-1">Sign In</h1>
                        <?php
                        if (isset($_POST["login"])) {      
                            $email = $_POST['email1'];        
                            $password = $_POST['password1'];  
                            $user = new User($email,$password);       
                            echo $user->login($pdo);
                     
                          
                                
                         }else{
                             $error = "Wrong Details !";
                         }
                        ?>
                        <div class="login_box">
                            <i class="bx bx-user login_icon"></i>
                            <input type="text" name="email1" placeholder="Email" class="input">
                       </div>
                   <div class="login_box">
                    <i class="bx bx-lock login_icon"></i>
                   <input type="password" name="password1" placeholder="Password" class="input">
                </div>

                <a href="#" class="forgot">Forgot password?</a>
                
               <input type="submit" class="login_button" name="login" value="login" >

                <!-- <a href="#" name="submit" class="login_button">Sign In</a> -->

                   <div>
                       <span class="account">Don't have an Account?</span>
                       <span class="signin" id="sign_up">Sign Up</span>

                   </div>

                   <div class="social_icons">
                    <a href="#" class="social_icon"><i class='bx bxl-instagram' ></i></a>
                    <a href="#" class="social_icon"><i class='bx bxl-facebook' ></i></a>
                    <a href="#" class="social_icon"><i class='bx bxl-twitter' ></i></a>
                 </div>

                    </form>

                    <form action="" class="register none" id="login_up" method="POST">

                        <h1 class="tittle-1">Create Account</h1>
                        <div class="login_box">
                            <i class="bx bx-user login_icon"></i>
                            <input type="text" name="fullnames" placeholder="Full Names" class="input">
                       </div>
                       <div class="login_box">
                        <i class="bx bx-user login_icon"></i>
                        <input type="email" name="email" placeholder="Email Address" class="input">
                   </div>
                   <div class="login_box">
                    <i class="bx bxs-city login_icon" ></i>
                    <input type="text" name="residence" placeholder="City of residence" class="input">
               </div>
                   <div class="login_box">
                    <i class="bx bx-lock login_icon"></i>
                   <input type="password" name="password" placeholder="Create Password" class="input">
                </div>
               

               
                <input type="submit" class="login_button" name="register" value="Register" >
                <!-- <a href="#" name="register" class="login_button">Sign Up</a> -->

                   <div>
                       <span class="account">Already have an Account?</span>
                       <span class="signup" id="sign_in">Sign In</span>

                   </div>

                  

                    </form>
                </div>
               
            </div>

            </div>
           

         
          





       <script src="assets/js/main.js"></script> 
    </body>
</html>