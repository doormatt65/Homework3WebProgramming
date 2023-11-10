<!DOCTYPE html>
<html>

<head>
    <title>Q16 - Exam</title>
    <style>
        body {
            background-color: #e09a9a;
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

    if ($conn->query("SHOW TABLES LIKE 'passcodeList'") === FALSE) {
        $flag = "new";
    } else {
        $flag = "old";
    }

    $passTable = "CREATE TABLE IF NOT EXISTS passcodeList(passcode VARCHAR(4), status VARCHAR(1) DEFAULT 'N')";

    if ($conn->query($passTable) === FALSE) {
        echo "Error creating table: " . $conn->error;
    }

    $passInit = "INSERT INTO passcodeList(passcode) VALUES ('1234'), ('4321'), ('1111'), ('2222'), ('3333'), ('4444'), ('5555'), ('6666'), ('7777'), ('8888'), ('9999')";

    //only initialize values if the table was just created
    if ($flag == "new") {
        if ($conn->query($passInit) === False) {
            echo "Error initializing  Passcodes: " . $conn->error;
        }
    }

    $table = "CREATE TABLE IF NOT EXISTS exam(p int, q1 CHAR(1), q2 CHAR(1), q3 CHAR(1), q4 CHAR(1), q5 CHAR(1))";

    if ($conn->query($table) === FALSE) {
        echo "Error creating table: " . $conn->error;
    }

    $passcode = $_POST["passcode"];

    if ($conn->query("SELECT passcode FROM passcodeList WHERE passcode = $passcode") === FALSE) {
        print "<h1>Invalid Passcode!</h1>";
    } else {

        //need to put questions in the database
    
    }






    ?>

</body>

</html>