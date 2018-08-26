<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Write your application</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  </head>
  <body>
    <section id="apply">
      <?php

      //Gen tables
      include('database.php');
      $abfrage = "CREATE TABLE IF NOT EXISTS supporter (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
status VARCHAR(10),
name VARCHAR(30),
username VARCHAR(30),
age VARCHAR(20),
lang VARCHAR(100),
onlinetime VARCHAR(50),
why VARCHAR(2000),
experience VARCHAR(2000),
others VARCHAR(512),
created_at VARCHAR(100)
) ";

      $abfrage2 = "CREATE TABLE IF NOT EXISTS developer (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
status VARCHAR(10),
name VARCHAR(30),
username VARCHAR(30),
age VARCHAR(20),
since VARCHAR(20),
lang VARCHAR(255),
online VARCHAR(50),
why VARCHAR(2000),
experience VARCHAR(2000),
others VARCHAR(512),
created_at VARCHAR(100)
) ";


      $abfrage3 = "CREATE TABLE IF NOT EXISTS builder (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
status VARCHAR(10),
name VARCHAR(30),
username VARCHAR(30),
age VARCHAR(20),
since VARCHAR(20),
online VARCHAR(50),
why VARCHAR(2000),
experience VARCHAR(2000),
example VARCHAR(512),
others VARCHAR(512),
created_at VARCHAR(100)
) ";

    $abfrage4 = "CREATE TABLE IF NOT EXISTS accounts(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
username VARCHAR(30),
email VARCHAR(100),
password VARCHAR(255),
rank VARCHAR(10),
ban VARCHAR(10),
token VARCHAR(100),
created_at VARCHAR(100),
lastlogin VARCHAR(100)
)";

$ergebnis = mysqli_query($mysqli,$abfrage) or die(mysqli_error($mysqli));
$ergebnis2 = mysqli_query($mysqli,$abfrage2) or die(mysqli_error($mysqli));
$ergebnis3 = mysqli_query($mysqli,$abfrage3) or die(mysqli_error($mysqli));
$ergebnis4 = mysqli_query($mysqli,$abfrage4) or die(mysqli_error($mysqli));

      function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
      }

      if(isset($_GET["supporter"])){
        //Supporter Apply
        echo '
        <div class="box">

        </div>
        <div class="box">
        <h1>Apply as Supporter</h1>
        <p>Now fill out the form and send it. We wish you luck :)</p>
        <form action="apply.php?send" method="post">
          <label for="name">What is your name?</label><br>
          <input type="text" name="name" placeholder="Your name" data-value-missing="Test" required><br>
          <label for="username">What is your name in Minecraft?</label><br>
          <input type="text" name="username" placeholder="Username" required><br>
          <label for="age">How old are you?</label><br>
          <input type="text" name="age" placeholder="Age" required><br>
          <label for="lang">What languages do you speak?</label><br>
          <input type="text" name="lang" placeholder="Languages" required><br>
          <label for="online">How many weeks do you can spend in the server?</label><br>
          <input type="text" name="online" placeholder="Onlinehours per week" required><br>
          <label for="why">Why did you apply to us?</label><br>
          <textarea type="text" name="why" placeholder="Write your reasons" required></textarea><br>
          <label for="experience">Do you have experience in supporting?</label><br>
          <textarea type="text" name="experience" placeholder="Write your experience" required></textarea><br>
          <label for="others">Others</label><br>
          <textarea type="text" name="others" placeholder="When you have anything to tell us"></textarea><br>
          <input type="hidden" name="rank" value="supporter">
          <button type="submit" class="myButton">Apply</button>
        </form>
        </div>
        <div class="box">

        </div>
        ';
      } else if(isset($_GET["developer"])){
        //Developer Apply
        echo '
        <div class="box">

        </div>
        <div class="box">
          <h1>Apply as Developer</h1>
          <p>Now fill out the form and send it. We wish you luck :)</p>
          <form action="apply.php?send" method="post">
            <label for="name">What is your name?</label><br>
            <input type="text" name="name" placeholder="Your name" data-value-missing="Test" required><br>
            <label for="username">What is your name in Minecraft?</label><br>
            <input type="text" name="username" placeholder="Username" required><br>
            <label for="age">How old are you?</label><br>
            <input type="text" name="age" placeholder="Age" required><br>
            <label for="age">Since when do you develop?</label><br>
            <input type="text" name="since" placeholder="In years" required><br>
            <label for="lang">What programming languages do you use?</label><br>
            <input type="text" name="lang" placeholder="Java, PHP, ..." required><br>
            <label for="online">How many weeks do you can spend in the server?</label><br>
            <input type="text" name="online" placeholder="Onlinehours per week" required><br>
            <label for="why">Why did you apply to us?</label><br>
            <textarea type="text" name="why" placeholder="Write your reasons" required></textarea><br>
            <label for="experience">Do you have experience in developing?</label><br>
            <textarea type="text" name="experience" placeholder="Write your experience" required></textarea><br>
            <label for="others">Others</label><br>
            <textarea type="text" name="others" placeholder="When you have anything to tell us"></textarea><br>
            <input type="hidden" name="rank" value="developer">
            <button type="submit" class="myButton">Apply</button>
          </form>
        </div>
        <div class="box">

        </div>
        ';
      } else if(isset($_GET["builder"])){
        //Builder Apply
        echo '
        <div class="box">

        </div>
        <div class="box">
          <h1>Apply as Builder</h1>
          <p>Now fill out the form and send it. We wish you luck :)</p>
          <form action="apply.php?send" method="post">
            <label for="name">What is your name?</label><br>
            <input type="text" name="name" placeholder="Your name" data-value-missing="Test" required><br>
            <label for="username">What is your name in Minecraft?</label><br>
            <input type="text" name="username" placeholder="Username" required><br>
            <label for="age">How old are you?</label><br>
            <input type="text" name="age" placeholder="Age" required><br>
            <label for="age">Since when do you build?</label><br>
            <input type="text" name="since" placeholder="In years" required><br>
            <label for="online">How many weeks do you can spend in the server?</label><br>
            <input type="text" name="online" placeholder="Onlinehours per week" required><br>
            <label for="why">Why did you apply to us?</label><br>
            <textarea type="text" name="why" placeholder="Write your reasons" required></textarea><br>
            <label for="experience">Do you have experience in building from other servers?</label><br>
            <textarea type="text" name="experience" placeholder="Write your experience" required></textarea><br>
            <label for="example">Enter here imagelinks from your buildings?</label><br>
            <textarea type="text" name="example" placeholder="Links from your building" required></textarea><br>
            <label for="others">Others</label><br>
            <textarea type="text" name="others" placeholder="When you have anything to tell us"></textarea><br>
            <input type="hidden" name="rank" value="builder">
            <button type="submit" class="myButton">Apply</button>
          </form>
        </div>
        <div class="box">

        </div>
        ';
      } else if(isset($_GET["send"])){
        //Sends Apply
        if(isset($_POST["rank"])){
          include('database.php');
          if($_POST["rank"] == "supporter"){
            $name = mysqli_real_escape_string($mysqli, $_POST["name"]);
            $username = mysqli_real_escape_string($mysqli, $_POST["username"]);
            $age = mysqli_real_escape_string($mysqli, $_POST["age"]);
            $lang = mysqli_real_escape_string($mysqli, $_POST["lang"]);
            $online = mysqli_real_escape_string($mysqli, $_POST["online"]);
            $why = mysqli_real_escape_string($mysqli, $_POST["why"]);
            $experience = mysqli_real_escape_string($mysqli, $_POST["experience"]);
            $others = mysqli_real_escape_string($mysqli, $_POST["others"]);
            $time = time();
            //Data save in database
            $abfrage2 = "INSERT INTO supporter (status, name, username, age, lang, onlinetime, why, experience, others, created_at) VALUES ('0', '$name', '$username', '$age', '$lang', '$online', '$why', '$experience', '$others', $time)";
            $ergebnis2 = mysqli_query($mysqli,$abfrage2) or die(mysqli_error($mysqli));
            $genpw = generateRandomString();
            $hashpw = password_hash($genpw, PASSWORD_BCRYPT);
            $time = time();
            $abfrage3 = "INSERT INTO accounts (username, email, password, rank, ban, token, created_at, lastlogin) VALUES ('$username', 'null', '$hashpw', '0', '0', 'null', '$time', 'null')";
            $ergebnis3 = mysqli_query($mysqli,$abfrage3) or die(mysqli_error($mysqli));
            echo '<h5 class="container" style="color: green;">We have received your apply as supporter.</h5><br>';
            echo '<h1 class="container">We have generated you a account to check your apply.</h1><br>
            <h1 class="container">Username: '.$username.'</h1><br>
            <h1 class="container">Password: '.$genpw.'</h1>';
          } else if($_POST["rank"] == "developer"){
            $name = mysqli_real_escape_string($mysqli, $_POST["name"]);
            $username = mysqli_real_escape_string($mysqli, $_POST["username"]);
            $age = mysqli_real_escape_string($mysqli, $_POST["age"]);
            $since = mysqli_real_escape_string($mysqli, $_POST["since"]);
            $lang = mysqli_real_escape_string($mysqli, $_POST["lang"]);
            $online = mysqli_real_escape_string($mysqli, $_POST["online"]);
            $why = mysqli_real_escape_string($mysqli, $_POST["why"]);
            $experience = mysqli_real_escape_string($mysqli, $_POST["experience"]);
            $others = mysqli_real_escape_string($mysqli, $_POST["others"]);
            $time = time();
            //Data save in database
            $abfrage2 = "INSERT INTO developer (status, name, username, age, since, lang, online, why, experience, others, created_at) VALUES ('0', '$name', '$username', '$age', '$since', '$lang', '$online', '$why', '$experience', '$others', $time)";
            $ergebnis2 = mysqli_query($mysqli,$abfrage2) or die(mysqli_error($mysqli));
            $genpw = generateRandomString();
            $hashpw = password_hash($genpw, PASSWORD_BCRYPT);
            $time = time();
            $abfrage3 = "INSERT INTO accounts (username, email, password, rank, ban, token, created_at, lastlogin) VALUES ('$username', 'null', '$hashpw', '0', '0', 'null', '$time', 'null')";
            $ergebnis3 = mysqli_query($mysqli,$abfrage3) or die(mysqli_error($mysqli));
            echo '<h5 class="container" style="color: green;">We have received your apply as developer.</h5><br>';
            echo '<h1 class="container">We have generated you a account to check your apply.</h1><br>
            <h1 class="container">Username: '.$username.'</h1><br>
            <h1 class="container">Password: '.$genpw.'</h1>';



          } else if($_POST["rank"] == "builder"){
            $name = mysqli_real_escape_string($mysqli, $_POST["name"]);
            $username = mysqli_real_escape_string($mysqli, $_POST["username"]);
            $age = mysqli_real_escape_string($mysqli, $_POST["age"]);
            $since = mysqli_real_escape_string($mysqli, $_POST["since"]);
            $online = mysqli_real_escape_string($mysqli, $_POST["online"]);
            $why = mysqli_real_escape_string($mysqli, $_POST["why"]);
            $experience = mysqli_real_escape_string($mysqli, $_POST["experience"]);
            $example =mysqli_real_escape_string($mysqli, $_POST["example"]);
            $others = mysqli_real_escape_string($mysqli, $_POST["others"]);
            $time = time();
            //Data save in database
            $abfrage2 = "INSERT INTO builder (status, name, username, age, since, online, why, experience, example, others, created_at) VALUES ('0', '$name', '$username', '$age', '$since', '$online', '$why', '$experience', '$example', '$others', $time)";
            $ergebnis2 = mysqli_query($mysqli,$abfrage2) or die(mysqli_error($mysqli));
            $genpw = generateRandomString();
            $hashpw = password_hash($genpw, PASSWORD_BCRYPT);
            $time = time();
            $abfrage3 = "INSERT INTO accounts (username, email, password, rank, ban, token, created_at, lastlogin) VALUES ('$username', 'null', '$hashpw', '0', '0', 'null', '$time', 'null')";
            $ergebnis3 = mysqli_query($mysqli,$abfrage3) or die(mysqli_error($mysqli));
            echo '<h5 class="container" style="color: green;">We have received your apply as builder.</h5><br>';
            echo '<h1 class="container">We have generated you a account to check your apply.</h1><br>
            <h1 class="container">Username: '.$username.'</h1><br>
            <h1 class="container">Password: '.$genpw.'</h1>';
          }
        } else {
          echo '<h5 class="container" style="color: red;">An error occurred while sending the application.</h5>';
        }
      } else {
        echo '<h5 class="container" style="color: red;">No page was requested.</h5>';
      }
       ?>
    </section>
    <footer>
      &copy; 2018 Apply System developed by <a href="https://youtube.com/Tutorialwork">Tutorialwork</a> | <a href="dashboard/">Login</a>
    </footer>
  </body>
</html>
