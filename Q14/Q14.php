<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Survey - Q14</title>
  <style>
    body {
      background-color: rgb(171, 137, 202);
    }

    table {
      width: 100%;
    }

    div {
      width: 50%;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    h1 {
      text-align: center;
    }

    input {
      margin: 10px;
    }
  </style>
</head>

<body>
  <h1>Question 14 Survey</h1>
  <div>
    <?php
    $conn = mysqli_connect(
      "localhost",
      "root",
      "",
      "q14"
    );
    if (mysqli_connect_errno()) {
      print "not connected";
    }
    //CREATE DATABASE q14;
    //USE q14;
    //CREATE TABLE passcodes(p VARCHAR(4),taken VARCHAR(3));
    //INSERT INTO passcodes VALUES ("0000", "no"), ("1111", "no"), ("2222", "no"), ("3333", "no"), ("4444", "no"), ("5555", "no"), ("6666", "no"), ("7777", "no"), ("8888", "no"), ("9999", "no");
    //CREATE TABLE survey(p int, q1 VARCHAR(3), q2 VARCHAR(3), q3 VARCHAR(3), q4 VARCHAR(3), q5 VARCHAR(3));
    //CREATE TABLE questions(q VARCHAR(100));
    //INSERT INTO questions VALUES ("Is CSS fun?"), ("Is HTML fun?"), ("Is PHP fun?"), ("Is JavaScript fun?"), ("Is SQL fun?");
    
    $qquery = mysqli_query($conn, "SELECT q FROM questions");
    print "<form action='Q14-recording.php' method='POST'>";
    print "<table>";

    $i = 1;
    while ($question = mysqli_fetch_assoc($qquery)) {

      $printquestion = $question['q'];
      print "<tr><td>$printquestion</td>";
      print "<td><input type='radio' name='question$i' value='Yes'>Yes</td>";
      print "<td><input type='radio' name='question$i' value='No'>No</td>";
      print "</tr><br>";
      $i++;
    }
    print "</table>";
    print "<br>";
    print "<input type='text' name='passcode' placeholder='Passcode'>";
    print "<br>";
    print "<input type='submit' value='Submit'>";
    print "<input type='reset' value='Reset'>";
    print "</form>";
    ?>
  </div>
</body>