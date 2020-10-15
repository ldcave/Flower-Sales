<?php
  require 'includes/header.php'
?>
<main>
  <link rel="stylesheet" href="css/login.css">
      <div class = "bg-cover">
        <div class="container" style="padding-top:20px;">
          <div id="slides" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block mx-auto" src="images/inhale.png" alt="Welcome">
              </div>
              <div class="carousel-item">
                <img class="d-block mx-auto" src="images/life.png" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block mx-auto" src="images/seeworld.png" alt="Third slide">
              </div>
      </div>

      <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="false"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#slides" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="false"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
          <div class="h-100 center-me">
              <div class ="my-auto">
                <form class ="form-signin" action="includes/login-helper.php" method="post";">  <!--LOGIN HELPER URL-->
                  <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>
                      <label for="inputEmail" class="sr-only">Username or Email</label>
                        <input type="text" id="inputEmail" name="uname" class="form-control" placeholder="Email or Username" required autofocus>

                          <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" id="inputPassword" name="pwd" class="form-control" placeholder="Password" required>

                            <div class="checkbox mb-3" style="margin:10px">
                          <label>
                          <input type="checkbox" value="remember-me"> remember me
                        </label>
                    </div>
                    <button name = "login-submit" type="submit" class="btn btn-outline-dark" style="color: black;">Sign in</button>
                    <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
                    <img src = "images/flowerstring.png" width = 180px;>
                </form>
              </div>
          </div>
        </div>
</main>
