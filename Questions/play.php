<?php
session_start(); //continue session
//initialize cookie
$cookieName='gamesPlayed';
$gamesPlayed = getCookie($cookieName);
$gamesPlayed++;
valueCookie($cookieName,$gamesPlayed);
//se variabile session è false allora si torna alla pagina iniziale
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




// variabile inizializzata a 0 che tiene conto dell'indice della domanda dell'array e del punteggio
$currentQuestion=0;
if(isset($_POST["currentQuestion"])){
     $currentQuestion = $_POST["currentQuestion"];     
     if($_POST["userAnswer"] == $_SESSION["questions"][$currentQuestion]["answer"] && $currentQuestion<9){
         // se la risposta è giusta, incrementa currentQuestion e stampa messaggio
         $currentQuestion++;
         echo 'Correct, answer next question.<br><br>';

         // se tutte le domande sono corrette stampa i messaggi e mostra i pulsanti per uscire o per riprovare
       } elseif ($_POST["userAnswer"] == $_SESSION["questions"][$currentQuestion]["answer"] && $currentQuestion=9){
        $currentQuestion++;
        $_SESSION["domande"]=shuffleArray($_SESSION["questions"]);// viene mischiato di nuovo l'array cosi quando si riprova le domande saranno in ordine diverso
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


        // se invece una domanda viene sbagliata allora il quiz finisce e vengono mostrati i pulsanti per uscire o riprovare
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

