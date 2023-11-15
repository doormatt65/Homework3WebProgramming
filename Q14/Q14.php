<!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8 />
    <Title>Survey - Q14</Title>
    <style>
        body {
            background-color: rgb(171, 137, 202);

        }

        h1 {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
    <?php


    $conn = mysqli_connect(
        "localhost",
        "root",
        "",
    );

    if (mysqli_connect_errno()) {
        print "not connected";
    }

    $db = "CREATE DATABASE IF NOT EXISTS q14";

    if ($conn->query($db) === FALSE) {
        echo "Error creating database: " . $conn->error;
    }

    if ($conn->select_db("q14") === FALSE) {
        die("Error selecting database: " . $conn->error);
    }

    $table = "CREATE TABLE IF NOT EXISTS survey(p int, q1 VARCHAR(3), q2 VARCHAR(3), q3 VARCHAR(3), q4 VARCHAR(3), q5 VARCHAR(3))";

    if ($conn->query($table) === FALSE) {
        echo "Error creating table: " . $conn->error;
    }

    $q1 = $_POST['question1'] ?? "N/A";
    $q2 = $_POST['question2'] ?? "N/A";
    $q3 = $_POST['question3'] ?? "N/A";
    $q4 = $_POST['question4'] ?? "N/A";
    $q5 = $_POST['question5'] ?? "N/A";
    $p = $_POST['passcode'] ?? "";


    $passcodeList = array("1234", "4321", "1111", "2222", "3333", "4444", "5555", "6666", "7777", "8888", "9999");
    if ($sql_resp = $conn->query("SELECT p FROM survey WHERE p = '$p'")->fetch_assoc()) {
        echo "<h1>Passcode already used!</h1>";

    } else if (in_array($p, $passcodeList)) {
        $sql_insert = "INSERT INTO survey (p,q1,q2,q3,q4,q5) VALUES ('$p','$q1','$q2','$q3','$q4','$q5')";

        if ($conn->query($sql_insert) === TRUE) {
            echo "<h1>Thank you for your response!</h1>";
        } else {
            echo "Error inserting data: " . $conn->error;
        }

        $sql_select = "SELECT * FROM survey";

        $result = $conn->query($sql_select);


        // if ($result->num_rows > 0) {
        //     // output data of each row
        //     while ($row = $result->fetch_assoc()) {
        //         echo $row["p"] . " " . $row["q1"] . " " . $row["q2"] . " " . $row["q3"] . " " . $row["q4"] . " " . $row["q5"] . "<br>";
        //     }
        // }
    
    } else {
        echo "<h1>Invalid Passcode!</h1>";
    }




    ?>

</body>

</html>