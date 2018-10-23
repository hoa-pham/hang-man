<?php
    
    #display_errors = on;

    
    // starting a new session
    session_start();

    if(isset($_POST['uname'], $_POST['psw'])){
        
        $uname= "my_admin";
        $psw = "password";
        
        if($_POST['uname'] == $uname && $_POST['psw'] == $psw) {
        
            $_SESSION["uname"] = "my_admin";
            $_SESSION["psw"] = "password";
            
            header('Location:hangman.php');
            
            # array holds errors
            $errors = array();
            
        # validation starts here
        if(empty($_POST['uname'])){
            $errors['uname1'] = "Your name cannot be empty";
        }
        
            # check strlength
        if(strlen($_POST['uname']) < 6){
            $errors['uname2'] = "Must be longer than 6 characters";
        }
        
            # check username
        if ($_POST['uname'] !== "my_admin"){
            $errors['uname3'] = "You are not the admin";

        }
        
        if($_POST['uname'] == "my_admin" &&  $_POST['psw'] == "password"){
            header('Location:hangman.php');
            exit();
        }else{
            $errors['uname4'] = "Please try again";
        }
        
        
        if(empty($_POST['psw'])){
            $errors['psw1'] = "Your password cannot be empty";
        }
        
        if(strlen($_POST['psw']) < 6){
            $errors['psw2'] = "Must be longer than 6 characters";
        }
        
        if($_POST['psw'] !== "password"){
            $errors['ps3'] = "AH AH AH thats not it";
        }else{
            header('Location:hangman.php');
            exit();
        }
        
        
        if(count($errors) == 0){
            # redirect to the game page
            header('Location:hangman.php');
            exit();
        }
    }
}
    
    ?>


<!DOCTYPE html>

<head>
<title>Hangman Home Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="home.css">

</head>

<body>


<div class="header">
<div class="a">Hangman</div>
</div>
<div class="topnav">
<a href="http://codd.cs.gsu.edu/~ttran119/project2/home.html">Home</a>
<a href="http://codd.cs.gsu.edu/~ttran119/project2/howtoplay.html">How to Play</a>
<a href="http://codd.cs.gsu.edu/~ttran119/project2/gamepage.html">Game Page</a>
<a href="http://codd.cs.gsu.edu/~ttran119/project2/aboutus.html">About Us</a>
<a href="http://codd.cs.gsu.edu/~ttran119/index.html">Codd Home</a>
</div>
<br>
<br>
<br>
<!--column start here -->
<div class="hi">
<table id="leader">
<tr>
<th><img src="crown.gif"></th>
</tr>
<tr>
<td>Leader Board</td>
</tr>
<tr>
<td>1nd. Ali : 3 Guesses</td>
</tr>
<tr>
<td>2rd. Hoa : 4 Guesses</td>
</tr>
<tr>
<td>3th. Tien : 5 Guesses</td>
</tr>
</table>
</div>
<!-- form start here -->
<br><br>
<div class="b">Think You Can Beat #1 ?</div>

<center><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Play Now!!!</button></center>

<div id="id01" class="modal">
<form method="post" class="modal-content animate">

<div class="imgcontainer">
<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
<img src="hang1.gif" alt="logo" class="avatar">
</div>


<div class="container">
</p>

<label for="uname"><b>Username</b></label>
<input type="text" placeholder="Enter Username" name="uname">
<p>
<?php if(isset($errors['uname1']))
        echo $errors['uname1'];  ?>
</p>
<p>
<?php if(isset($errors['uname2']))
        echo $errors['uname2'];  ?>
</p>
<p>
<?php if(isset($errors['uname3']))
        echo $errors['uname3'];  ?>
</p>
<p>
<?php if(isset($errors['uname4']))
    echo $errors['uname4'];  ?>
</p>




<label for="psw"><b>Password</b></label>
<input type="password" placeholder="Enter Password" name="psw">
<p>
<?php if(isset($errors['psw1'])) echo $errors['psw1'];  ?>
</p>
<p>
<?php if(isset($errors['psw2'])) echo $errors['psw2'];  ?>
</p>
<?php if(isset($errors['psw3'])) echo $errors['psw3'];  ?>
</p>

<button name="check" type="submit" value="submit">Login</button>
</div>
</form>

</body>

</html>

