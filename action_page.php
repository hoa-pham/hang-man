
<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Game Page</title>
<link rel="stylesheet" type="text/css" href="home.css">
<title>Hangman</title>
</head>

<body>
    <div class="topnav">
    <a href="http://codd.cs.gsu.edu/~hpham24/project2/home.php">Home</a>
    </div>
  </div>

<?php 

if(isset($_POST['submit'])) {
header("Location: http://codd.cs.gsu.edu/~hpham24/project2/action_page.php");
exit;
}
    include 'config.php';
    include 'functions.php';
    if (isset($_POST['newWord'])) unset($_SESSION['answer']);
    if (!isset($_SESSION['answer']))
    {
        $_SESSION['attempts'] = 0;
        $answer = fetchWordArray($WORDLISTFILE);
        $_SESSION['answer'] = $answer;
        $_SESSION['hidden'] = hideCharacters($answer);
	echo '<h1 style="color:red">';
        echo 'Attempts remaining: '.($MAX_ATTEMPTS - $_SESSION['attempts']).'<br>';
	echo '</h1>';
    }else
    {
        if (isset ($_POST['userInput']))
        {
           $userInput = $_POST['userInput'];
            $_SESSION['hidden'] = checkAndReplace(strtolower($userInput), $_SESSION['hidden'], $_SESSION['answer']);
            checkGameOver($MAX_ATTEMPTS,$_SESSION['attempts'], $_SESSION['answer'],$_SESSION['hidden']);
        }
        $_SESSION['attempts'] = $_SESSION['attempts'] + 1;
        echo '<h1 style="color:red">Attempts remaining: '.($MAX_ATTEMPTS - $_SESSION['attempts'])."<br>".'</h1>';
    }
    $hidden = $_SESSION['hidden'];
    echo '<h1 style="color: white">';
    foreach ($hidden as $char) echo $char."  ";
    echo '</h1>';
?>

<form name = "inputForm" action = "" method = "post">
<h2 style="color: pink">Your Guess:</h2>
 <input name = "userInput" type = "text" size="1" maxlength="1"  />

<a href="#"><input type = "submit"  value = "Check" onclick="return validateInput()"/></a>
<input type = "submit" name = "newWord" value = "Try another Word"/>
</form>
</body>
</html>
