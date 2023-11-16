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
        "",
        "q16"
    );

    if (mysqli_connect_errno()) {
        print "not connected";
    }

    //CREATE DATABASE q16;
    //CREATE TABLE students(name VARCHAR(15),passcode VARCHAR(4), status VARCHAR(1) DEFAULT 'N',grade INT(100) DEFAULT 0);
    //INSERT INTO students(name,passcode) VALUES ('John','1111'),('Jane','2222'),('Joe','3333'),('Jill','4444'),('Jack','5555'),('Jen','6666'),('Jim','7777'),('Jade','8888'),('Matt','9999'),('Tim','0000');
    //CREATE TABLE exam(question VARCHAR(100), a1 VARCHAR(100), a2 VARCHAR(100), a3 VARCHAR(100), a4 VARCHAR(100), solution VARCHAR(1));
    //INSERT INTO exam(question, a1, a2, a3, a4, solution) VALUES ('What is CSS used for?', 'A. Styling', 'B. Programming', 'C. Markup', 'D. Querying', 'A'), ('What is HTML used for?', 'A. Styling', 'B. Programming', 'C. Markup', 'D. Querying', 'C'), ('What is Python used for?', 'A. Styling', 'B. Programming', 'C. Markup', 'D. Querying', 'B'), ('What is JavaScript used for?', 'A. Styling', 'B. Programming', 'C. Markup', 'D. Querying', 'B'), ('What is SQL used for?', 'A. Styling', 'B. Programming', 'C. Markup', 'D. Querying', 'D');
    //CREATE TABLE admin (passcode INT(5));
    //INSERT INTO admin (passcode) VALUES (12345);
    
    $passcode = $_POST["passcode"];


    if (mysqli_query($conn, "SELECT passcode FROM students WHERE passcode = $passcode") === FALSE) {
        print "<h1>Invalid Passcode!</h1>";
    } else if (mysqli_fetch_assoc(mysqli_query($conn, "SELECT status FROM students WHERE passcode = $passcode"))["status"] === "Y") {
        print "<h1>Passcode already used!</h1>";
    } else {
        print "<div>";

        print "<form action='grading.php' method='post'>";
        print "<h1>Exam</h1>";
        for ($i = 0; $i < 5; $i++) {

            $examQuestion = mysqli_query($conn, "SELECT * FROM exam");


            if (mysqli_num_rows($examQuestion) > 0) {
                $i = 1;

                while ($row = mysqli_fetch_assoc($examQuestion)) {
                    print "<h3>$row[question]</h3>";
                    print "<input type='radio' name='q$i' value='A'> $row[a1]<br>";
                    print "<input type='radio' name='q$i' value='B'> $row[a2]<br>";
                    print "<input type='radio' name='q$i' value='C'> $row[a3]<br>";
                    print "<input type='radio' name='q$i' value='D'> $row[a4]<br>";
                    print "<br>";
                    $i++;
                }
            } else {
                echo "0 results";
            }
        }
        print "<input type='password' name='passcode'>";
        print "<input type='submit' value='Submit Exam'>";

        print "</form>";
        print "</div>";
    }
    ?>

</body>

</html>