<!DOCTYPE html>
<html>

<head>
    <title>Q16 - Exam</title>
    <style>
        body {
            background-color: #e09a9a;
        }

        h3 {
            margin: 5px;
        }

        input {
            text-align: center;
        }

        div {
            padding: 20px;
            border-radius: 10px;
            display: block;
            text-align: center;
        }

        form {
            display: inline-block;
            text-align: left;
        }
    </style>
</head>

<body>

    <?php


    $conn = mysqli_connect(
        "localhost",
        "root",
        ""
    );

    if (mysqli_connect_errno()) {
        print "not connected";
    }

    $db = "CREATE DATABASE IF NOT EXISTS q16";

    if ($conn->query($db) === FALSE) {
        echo "Error creating database: " . $conn->error;
    }

    if ($conn->select_db("q16") === FALSE) {
        die("Error selecting database: " . $conn->error);
    }

    $tableCheck = $conn->query("SHOW TABLES LIKE 'students'");


    if ($tableCheck->num_rows == 0) {
        $flag = "new";
    } else {
        $flag = "old";
    }

    $passTable = "CREATE TABLE IF NOT EXISTS students(name VARCHAR(15),passcode VARCHAR(4), status VARCHAR(1) DEFAULT 'N',grade INT(100) DEFAULT 0)";

    $conn->query($passTable);


    $passInit = "INSERT INTO students(name,passcode) VALUES ('John','1111'),('Jane','2222'),('Joe','3333'),('Jill','4444'),('Jack','5555'),('Jen','6666'),('Jim','7777'),('Jade','8888'),('Matt','9999')";
    //only initialize values if the table was just created
    if ($flag == "new") {
        if ($conn->query($passInit) === False) {
            echo "Error initializing  Passcodes: " . $conn->error;
        }
    }

    $questionList = array("What is CSS used for?", "What is HTML used for?", "What is Python used for?", "What is JavaScript used for?", "What is SQL used for?");
    $Q1Answers = array("A. Styling", "B. Programming", "C. Markup", "D. Querying");
    $Q2Answers = array("A. Styling", "B. Programming", "C. Markup", "D. Querying");
    $Q3Answers = array("A. Styling", "B. Programming", "C. Markup", "D. Querying");
    $Q4Answers = array("A. Styling", "B. Programming", "C. Markup", "D. Querying");
    $Q5Answers = array("A. Styling", "B. Programming", "C. Markup", "D. Querying");
    $Solutions = array("A", "C", "B", "B", "D");

    $exam = "CREATE TABLE IF NOT EXISTS exam(question VARCHAR(100), a1 VARCHAR(100), a2 VARCHAR(100), a3 VARCHAR(100), a4 VARCHAR(100), solution VARCHAR(1))";

    if ($conn->query($exam) === FALSE) {
        echo "Error creating exam table: " . $conn->error;
    }

    $examInit = "INSERT INTO exam(question, a1, a2, a3, a4, solution) VALUES ('$questionList[0]', '$Q1Answers[0]', '$Q1Answers[1]', '$Q1Answers[2]', '$Q1Answers[3]', '$Solutions[0]'), ('$questionList[1]', '$Q2Answers[0]', '$Q2Answers[1]', '$Q2Answers[2]', '$Q2Answers[3]', '$Solutions[1]'), ('$questionList[2]', '$Q3Answers[0]', '$Q3Answers[1]', '$Q3Answers[2]', '$Q3Answers[3]', '$Solutions[2]'), ('$questionList[3]', '$Q4Answers[0]', '$Q4Answers[1]', '$Q4Answers[2]', '$Q4Answers[3]', '$Solutions[3]'), ('$questionList[4]', '$Q5Answers[0]', '$Q5Answers[1]', '$Q5Answers[2]', '$Q5Answers[3]', '$Solutions[4]')";

    //only initialize values if the table was just created
    if ($flag == "new") {
        if ($conn->query($examInit) === False) {
            echo "Error initializing  Exam: " . $conn->error;
        }
    }


    $passcode = $_POST["passcode"];

    if ($conn->query("SELECT passcode FROM students WHERE passcode = $passcode") === FALSE) {
        print "<h1>Invalid Passcode!</h1>";
    } else if ($conn->query("SELECT status FROM students WHERE passcode = $passcode") === "Y") {
        print "<h1>Passcode already used!</h1>";
    } else {
        print "<div>";

        print "<form action='grading.php' method='post'>";
        print "<h1>Exam</h1>";
        for ($i = 0; $i < 5; $i++) {
            $examQuestion = $conn->query("SELECT * FROM exam WHERE question = '$questionList[$i]'");
            $row = $examQuestion->fetch_assoc();

            print "<h3>$row[question]</h3>";
            print "<input type='radio' name='q$i' value='A'> $row[a1]<br>";
            print "<input type='radio' name='q$i' value='B'> $row[a2]<br>";
            print "<input type='radio' name='q$i' value='C'> $row[a3]<br>";
            print "<input type='radio' name='q$i' value='D'> $row[a4]<br>";
            print "<br>";
        }
        print "<input type='password' name='passcode'>";
        print "<input type='submit' value='Submit Exam'>";

        print "</form>";
        print "</div>";
    }






    ?>

</body>

</html>