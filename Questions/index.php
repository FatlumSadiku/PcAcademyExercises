<?php
    //Session starts and destroys previous sessions

    session_start();
    session_destroy();

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Indovina e vinci</title>
        <link rel="stylesheet" href="style.css">

    </head>
  <body>
    <div class="index">
    <h1 class="title1">Welcome, Please Log In To Play</h1>
    <main>
     <form action="login.php" method="post">
      <input type="text" id="username" name="username" placeholder="Username" required>
      <input type="password" id="password" name="password" placeholder="Password" required>
      <input type="submit" value="Log In" id="loginbutton">
     </form> 
    </main>
    </div>

  </body>



</html>