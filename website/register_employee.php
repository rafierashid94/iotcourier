<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Employee sign up form</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>


  
  
<link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <form action="insert_emp.php" method="POST">
  <h1>Employee Sign up</h1><br/>

  <span class="input"></span>
  <input type="text" name="username" placeholder="Employee Username" title="Format: Xx[space]Xx (e.g. Alex Cican)" autofocus autocomplete="off" required />
  <span class="input"></span>
  <input type="text" name="name" placeholder="Full Name" required />
  <span class="input"></span>
  <input type="text" name="emplo_id" placeholder="Employee ID" required>
  <span id="passwordMeter"></span>
  <input type="password" name="password" id="password" placeholder="Password" title="Password min 8 characters. At least one UPPERCASE and one lowercase letter" required />
  <button type="submit" value="Sign Up" title="Submit form" class="icon-arrow-right"><span>Sign up</span></button>
</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
