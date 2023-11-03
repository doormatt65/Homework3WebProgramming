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


    mysqli_connect(
        "127.0.0.1",
        "root",
        "",
        "database"
    );
    if (mysqli_connect_errno())
        print "not connected";
    else
        print "connected";


    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];
    $p = $_POST['passcode'];

    $passcodeList = array("1234", "4321", "1111", "2222", "3333", "4444", "5555", "6666", "7777", "8888", "9999");

    if ($p == "1234") {
        print "<h1>Thank You For Submitting</h1>";
    } else {
        print "<h1>Invalid passcode</h1>";
    }


    ?>

</body>

</html>