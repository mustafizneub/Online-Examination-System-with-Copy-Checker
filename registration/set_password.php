
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Password Setting</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Set Password</h2>
  </div>
   
  <form method="post" action="set_password.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password_1">
    </div>
    <div class="input-group">
      <label>Confirm password</label>
      <input type="password" name="password_2">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="set_password">Register</button>
    </div>
  </form>
</body>
</html>