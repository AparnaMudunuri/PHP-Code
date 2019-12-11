<html>
<head>
  <link rel="stylesheet" href="signup.css">
  <title>Registration</title>
</head>
<body>
  <div class="container">
    <div class="header">
      <h2>Register</h2>
    </div>
    <form action="process.php" method="post">
      
      <div class="tbox">
        <input type="text" name="username" placeholder="@username" required>
      </div>
      <div class="tbox">
        <input type="email" name="email" placeholder="@email" required>
      </div>
      <div class="tbox">
        <input type="password" name="password_1" placeholder="@password" required>
      </div>
      <div class="tbox">
        <input type="password" name="password_2" placeholder="@confirm password" required>
      </div>
    
      <button type="submit">Submit</button>
      <p>Already a user?<a href="index.php"><b>Log in</b></a></p>
    </form>
  </div>
</body>
</html>
