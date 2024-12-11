<?php
// continue session
session_start();
// if username and password are not valid then send back to log in page
if(!isset($_POST['username']) && !isset($_POST['password'])){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guess and Win</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
// function to mix an array
function shuffleArray($array)
{
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
// create two variables that contain Username and Password inserted by the user
$username = $_POST['username'];
$password = $_POST['password'];

// create an array that contains username and password for the login
$login=array("username"=>"admin", "password"=>"admin");
// an If statement to check username and password required are the same as the ones put in by the user
if($username == $login['username'] && $password == $login['password']) {
    $_SESSION['login_approved']=true;
    // create an multidimensional array containing questions and answers
    $_SESSION["questions"]=array(array("question" => "How many months have 28 days?", "answer" => "All months"),
                         array("question" => "What is the longest river in the world?", "answer" => "The Nile"),
                         array("question" => "Who is the author of Game of Thrones?", "answer" => "George R.R. Martin"),
                         array("question" => "Who introduced the special theory of relativity?", "answer" => "Albert Einstein"),
                         array("question" => "Who painted the Mona Lisa?", "answer" => "Leonardo da Vinci"),
                         array("question" => "What album is considered the best Hip-Hop album of all times?", "answer" => "Illmatic"),
                         array("question" => "What sport has Naismith invented?", "answer" => "Basketball"),
                         array("question" => "What italian team has won most Champions Leagues?", "answer" => "Milan"),
                         array("question" => "What country has won the  1982 World Cup beating West Germany with the score of 3-1 in the finals?", "answer" => "Italy"),
                         array("question" => "What is the best selling manga of all time?", "answer" => "One Piece"));
    // call function to shuffle the array so that the order of the questions differs everytime
    $_SESSION["questions"]=shuffleArray($_SESSION["questions"]);
    
    echo '<div class="origin">
        <h1 class="titlelogin">Proceed to play or Log Out</h1>
        <div class="button1">
        <form action="play.php" method="post">
        <input type="submit" value="Proceed to the game" id="play">
        </form>
        </div>
        <div class="button2">
        <form action="logout.php" method="post">
        <input type="submit" value="Log Out" id="logout">
        </form>
        </div>
        </div>';
} else {// if username and password are not the same as the ones put in by the user
    echo "Access denied";
    echo '<form action="logout.php" method="post">
          <input type=submit value="Invalid username or password" id="button">
          </form>';
}
?>


    </body>
    </html>

