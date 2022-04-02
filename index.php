<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="style/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <img src="logo.png" width="500px">
      </div>
      <div class="login-box">
      <form class="login-form" name="login" action="proses_login.php" method="POST">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Silakan Masuk</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="Masukan Username" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" name="password" id="password" type="password" placeholder="Masukan Password">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
              <label>
              <a href="#" data-toggle="flip" class="btn btn-info btn-block">Login Costumer</a>
                </label>
              </div>
             
            </div>
          </div>
          <div class="form-group btn-container">
          <button type="submit" name="login" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Login</button>
          </div>
        </form>
        <form class="forget-form" name="login1" action="proses_kustomer.php" method="POST">
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" name="username" id="username" placeholder="Masukan Username" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" name="password" id="password" type="password" placeholder="Masukan Password">
          </div>
          <div class="form-group btn-container">
          <button type="submit" name="login1" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Login</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip" ><i class="fa fa-angle-left fa-fw"></i> Kembali</a></p>
          </div>
        </form>
        
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="style/js/jquery-3.3.1.min.js"></script>
    <script src="style/js/popper.min.js"></script>
    <script src="style/js/bootstrap.min.js"></script>
    <script src="style/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="style/js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>