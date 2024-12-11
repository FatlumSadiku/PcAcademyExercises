<?php
session_start(); //continue session
//initialize cookie
$cookieName='gamesPlayed';
$gamesPlayed = getCookie($cookieName);
$gamesPlayed++;
valueCookie($cookieName,$gamesPlayed);
//if session variable is false then access is denied and send back to log in page
if(!isset($_SESSION['login_approved'])||!$_SESSION['login_approved']){
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device
  <link rel="stylesheet" href="style.css">
</head>
<body class="whole">

  <?php

function getCookie($cookieName){
  return isset($_COOKIE[$cookieName]) ? $_COOKIE[$cookieName] : 0;
}

function valueCookie($cookieName, $value){
  setcookie($cookieName, $value, time()+86400, '/');
}
// function to shuffle an array
function shuffleArray($array){
      $count = count($array);
    $indi = range(0,$count-1);
    shuffle($indi);
    $newarray = array($count);
    $i = 0;
    foreach ($indi as $index)
    {
        $newarray[$i] = $array[$index];
        $i++;
    }
    return $newarray;
}





$currentQuestion=0;
if(isset($_POST["currentQuestion"])){
     $currentQuestion = $_POST["currentQuestion"];     
     if($_POST["userAnswer"] == $_SESSION["questions"][$currentQuestion]["answer"] && $currentQuestion<9){
        
         $currentQuestion++;
         echo 'Correct, answer next question.<br><br>';

         // if all answers are correct then show the messages and buttons
       } elseif ($_POST["userAnswer"] == $_SESSION["questions"][$currentQuestion]["answer"] && $currentQuestion=9){
        $currentQuestion++;
        $_SESSION["domande"]=shuffleArray($_SESSION["questions"]);
        $gamesPlayed++;
        echo "Congratulations, you answered all the questions correctly";
        echo "<br>Your score is ".$currentQuestion."/10<br>";
        echo '<br><form action="play.php" method="GET">
              <input type="submit" value="Try again">
              </form><br>
              <form action="index.php" method="GET">
              <input type="submit" value="Log out">
              </form>';
        return;


        //if one answer is wrong then stop the quiz and show the score and the buttons
       } else {
        $_SESSION["questions"]=shuffleArray($_SESSION["questions"]);// viene mischiato di nuovo l'array cosi quando si riprova le domande saranno in ordine diverso
        $gamesPlayed++;
        echo "Wrong answer!";
        echo "<br>You answered correctly ".$currentQuestion." questions";
        echo '<br><form action="play.php" method="POST">
              <input type="submit" value="Try again">
              </form>
              <form action="logout.php" method="POST">
              <input type="submit" value="Log out">
              </form>';
        return;

       }
}


?>

<form method="POST" action="">
    <label for="question" class="buba"><?php echo ($currentQuestion+1).". ". $_SESSION["questions"][$currentQuestion]["question"];?></label>
    <input type="hidden" name="currentQuestion" value="<?php echo $currentQuestion;?>">
    <input type="text" name="userAnswer" value="">
    <input type="submit">
</form>

</body>
</html>

