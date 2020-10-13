<?php
if (isset($_POST['login-submit'])){ //grab input from login page -- name we gave to submit button
    require 'dbhandler.php';
    $uname_email = $_POST['uname'];
    $passw = $_POST['pwd'];

            //check if anything is empty
            if (empty($uname_email) || empty($passw)){
                header("Location: ../login.php?error=EmptyField");    //send back to login page
                exit();
            }

            $sql = "SELECT * FROM users WHERE uname=? OR email=?;";  //does this acct exist in DB
            $stmt = mysqli_stmt_init($conn);        //conn from db handler
            if (!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../login.php?error=SQLInjection"); //stmt checker?
                exit();
              }
              else{
                  mysqli_stmt_bind_param($stmt, "ss", $uname_email, $uname_email);    //grab information from DB
                  mysqli_stmt_execute($stmt);     //EXECUTE & GET RESULTS
                  $result = mysqli_stmt_get_result($stmt);    //extracting information
                  $data = mysqli_fetch_assoc($result);    //assoc array for values

                  if (empty($data)){ //check for value
                    header("Location: ../login.php?error=UserDNE");
                    exit();
                  }
                  else{
                      $pass_check = password_verify($passw, $data['password']); //grab password from before and then what was just entered

                      if($pass_check == true){
                          session_start();
                          $_SESSION['uid'] = $data['uid'];
                          $_SESSION['fname'] = $data['fname'];  //set names for array
                          $_SESSION['username'] = $data['uname'];
                          
                          header("Location: ../profile.php?login=success"); //takes you to profile if login is successful
                            exit();
                      }
                      else{ //if password does not match
                        header("Location: ../login.php?error=WrongPass");
                        exit();
                      }
                  }
              }
}
else{
    header("Location: ../login.php");
    exit();
}
