<?php
  if(isset($_POST['signup-submit'])){   //make sure user submits a signup form. isset checks for null.
    require 'dbhandler.php';      //THIS EST CONNECTION WITH DB!! brings it in

    $username = $_POST['uname'];
    $email = $_POST['email'];
    $passw = $_POST['pwd'];
    $pass_rep = $_POST['con-pwd'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
      //grabbing all user input data

      if ($passw !== $pass_rep){    //make sure passwords are equal
        header("Location: ../signup.php?error=diffPasswords&fname=".$fname."&lname=".$lname."&uname=".$username); //if not reload signup page
        exit();
      }
      else {      //passwords good
        $sql = "SELECT uname FROM users WHERE uname=?;";     //select uname field from table and iterate through so no duplicates
        $stmt = mysqli_stmt_init($conn); //connect to database
        
        if (!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../signup.php?error=SQLInjection");
          exit();
        }
        else{
          mysqli_stmt_bind_param($stmt,"s", $username); //s placeholder
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);
          $check = mysqli_stmt_num_rows($stmt);

          if($check > 0){
            header("Location: ../signup.php?error=UsernameTaken");
            exit();
          }

          else{
            $sql = "INSERT INTO users (lname, fname, email, uname, password) VALUES (?, ?, ?, ?, ?)"; //fields in paranth
            $stmt = mysqli_stmt_init($conn); //conn refers to db connection init in handler

            if (!mysqli_stmt_prepare($stmt, $sql)){
              header("Location: ../signup.php?error=SQLInjection");
              exit();
            }

            else{
              $hashedPass = password_hash($passw, PASSWORD_BCRYPT); //var hashedpass produces hashed password
              mysqli_stmt_bind_param($stmt,"sssss",$lname, $fname, $email, $username, $hashedPass); //s placeholder
              mysqli_stmt_execute($stmt);
              mysqli_stmt_store_result($stmt);

              $sqlImg = "INSERT INTO profile (uname) VALUES ('$username')"; //pulling username var defined above and put into DB
              mysqli_query($conn, $sqlImg); //combines statements

              header("Location: ../signup.php?signup=success"); //produce success Message --DOESNT STORE
              exit();

            }
          }
        }
        mysqli_stmt_close($stmt); //frees up resources
        mysqli_close($conn);
      }

  }
  else{ //the first if
    header("Location: ../signup.php");    //header takes user back to specific page
    exit();   //exit php script
  }
