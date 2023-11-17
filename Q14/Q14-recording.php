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

    //CREATE DATABASE q14;
    //USE q14;
    //CREATE TABLE passcodes(p VARCHAR(4),taken VARCHAR(3));
    //INSERT INTO passcodes VALUES ("0000", "no"), ("1111", "no"), ("2222", "no"), ("3333", "no"), ("4444", "no"), ("5555", "no"), ("6666", "no"), ("7777", "no"), ("8888", "no"), ("9999", "no");
    //CREATE TABLE survey(p int, q1 VARCHAR(3), q2 VARCHAR(3), q3 VARCHAR(3), q4 VARCHAR(3), q5 VARCHAR(3));
    
    $q1 = $_POST['question1'] ?? "N/A";
    $q2 = $_POST['question2'] ?? "N/A";
    $q3 = $_POST['question3'] ?? "N/A";
    $q4 = $_POST['question4'] ?? "N/A";
    $q5 = $_POST['question5'] ?? "N/A";


    $p = $_POST['passcode'] ?? "";

    if ($p == "") {
        echo "<h1>Invalid Passcode!</h1>";
    } else if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM passcodes WHERE p = $p")) == 0) {
        echo "<h1>Invalid Passcode!</h1>";
    } else if (mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM passcodes WHERE p = $p"))["taken"] == "yes") {
        echo "<h1>Passcode already used!</h1>";
    } else if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM passcodes WHERE p = $p")) > 0) {

        $sql_insert = "INSERT INTO survey (p,q1,q2,q3,q4,q5) VALUES ('$p','$q1','$q2','$q3','$q4','$q5')";


        mysqli_query($conn, $sql_insert);

        mysqli_query($conn, "UPDATE passcodes SET taken = 'yes' WHERE p = $p");
        echo "<h1>Thank you for your response!</h1>";


        $sql_select = "SELECT * FROM survey";


        $result = mysqli_query($conn, "$sql_select");

    } else {
        echo "<h1>Invalid Passcode!</h1>";
    }

    ?>

</body>

</html>