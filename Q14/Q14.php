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
        "q14"
    );

    if (mysqli_connect_errno()) {
        print "not connected";
    }

    //CREATE DATABASE q14
    //use q14
    //CREATE TABLE survey(p int, q1 VARCHAR(3), q2 VARCHAR(3), q3 VARCHAR(3), q4 VARCHAR(3), q5 VARCHAR(3))
    

    $q1 = $_POST['question1'] ?? "N/A";
    $q2 = $_POST['question2'] ?? "N/A";
    $q3 = $_POST['question3'] ?? "N/A";
    $q4 = $_POST['question4'] ?? "N/A";
    $q5 = $_POST['question5'] ?? "N/A";
    $p = $_POST['passcode'] ?? "";


    $passcodeList = array("1234", "4321", "1111", "2222", "3333", "4444", "5555", "6666", "7777", "8888", "9999");
    $hasTaken = mysqli_query($conn, "SELECT p FROM survey WHERE p = '$p'");
    if (mysqli_num_rows($hasTaken) > 0) {
        echo "<h1>Passcode already used!</h1>";



    } else if (in_array($p, $passcodeList)) {
        $sql_insert = "INSERT INTO survey (p,q1,q2,q3,q4,q5) VALUES ('$p','$q1','$q2','$q3','$q4','$q5')";

        mysqli_query($conn, $sql_insert);
        echo "<h1>Thank you for your response!</h1>";


        $sql_select = "SELECT * FROM survey";


        $result = mysqli_query($conn, "$sql_select");




    } else {
        echo "<h1>Invalid Passcode!</h1>";
    }




    ?>

</body>

</html>