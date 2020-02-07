
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Verifying User</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
    <h2>Verify</h2>
  </div>
   
  <form method="post" action="verify.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email"  >
    </div>
     <div class="input-group">
      <label>verification code</label>
      <input type="code" name="code"  >
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="verify_user">Submit</button>
    </div>
    
  </form>
</body>
</html>