<?php 
require 'includes/header.php'
?>

<main>

<?php 
if (isset($_SESSION['uid'])){ //as long as nothing is null go to profile
    include 'html/profile.html';
}else{
    header("Location: login.php"); //else return to login screen
    exit();//check with incognito 127.0.0.1:3000profile.php says
}

?>

</main>