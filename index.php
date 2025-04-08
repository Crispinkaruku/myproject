<?php
 
 
 ?>
 <!DOCTYPE html>
 
 </html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login Page</title>
     <link rel="stylesheet" href="file.css">
 </head>
 <body>
     <div class="login-container">
         <h2>Sign in</h2>
         <form action="login.php" method="POST">
             <div class="input-group">
                 <label for="username">Email</label>
                 <input type="text" id="Email" name="Email" required>
             </div>
             <div class="input-group">
                 <label for="password">Password</label>
                 <input type="password" id="password" name="password" required>
             </div>
             <button type="submit" class="login-btn">Login</button>
             <p class="register-link">Don't have an account? <a href="Register.php">Sign Up</a>
         </form>
     </div>
     
     <script src="script.js"></script>
 
 </body>
 </html>
