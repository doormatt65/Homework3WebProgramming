<!DOCTYPE html>
<html>

<head>
    <title>Q14 - Admin</title>
    <style>
        body {
            background-color: rgb(171, 137, 202);
        }

        div {
            width: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        h1 {
            text-align: center;
        }

        input {
            margin: 10px;
        }

        table {
            margin: 10px;
            margin-left: 25%;
            width: 50%;
            text-align: center;
            background-color: gray;
            color: #fff;
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



    $p = $_POST['password'];

    $pwd = 'admin';

    if ($p == $pwd) {
        print "<h1>Survey Results</h1>";
        $sql_select = "SELECT * FROM survey";

        $result = mysqli_query($conn, "$sql_select");
        print "<table border='1'>";
        print "<tr>
    <td>Question:</td>
    <td>Yes%</td>
    <td>No%</td>
    </tr>";

        $q1y = $q1n = $q2y = $q2n = $q3y = $q3n = $q4y = $q4n = $q5y = $q5n = $q1c = $q2c = $q3c = $q4c = $q5c = 0;


        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
            $row = mysqli_fetch_assoc($result);

            if ($row['q1'] == 'Yes') {
                $q1y++;
                $q1c++;
            } else if ($row['q1'] == 'No') {
                $q1n++;
                $q1c++;
            }

            if ($row['q2'] == 'Yes') {
                $q2y++;
                $q2c++;
            } else if ($row['q2'] == 'No') {
                $q2n++;
                $q2c++;
            }
            if ($row['q3'] == 'Yes') {
                $q3y++;
                $q3c++;
            } else if ($row['q3'] == 'No') {
                $q3n++;
                $q3c++;
            }
            if ($row['q4'] == 'Yes') {
                $q4y++;
                $q4c++;
            } else if ($row['q4'] == 'No') {
                $q4n++;
                $q4c++;
            }
            if ($row['q5'] == 'Yes') {
                $q5y++;
                $q5c++;
            } else if ($row['q5'] == 'No') {
                $q5n++;
                $q5c++;
            }


        }

        $q1y = round(($q1y / $q1c) * 100, 2);
        $q1n = round(($q1n / $q1c) * 100, 2);
        $q2y = round(($q2y / $q2c) * 100, 2);
        $q2n = round(($q2n / $q2c) * 100, 2);
        $q3y = round(($q3y / $q3c) * 100, 2);
        $q3n = round(($q3n / $q3c) * 100, 2);
        $q4y = round(($q4y / $q4c) * 100, 2);
        $q4n = round(($q4n / $q4c) * 100, 2);
        $q5y = round(($q5y / $q5c) * 100, 2);
        $q5n = round(($q5n / $q5c) * 100, 2);

        print "<tr><td>Is HTML Cool?</td><td>$q1y%</td><td>$q1n%</td></tr>";
        print "<tr><td>Is CSS Cool?</td><td>$q2y%</td><td>$q2n%</td></tr>";
        print "<tr><td>Is JS Cool?</td><td>$q3y%</td><td>$q3n%</td></tr>";
        print "<tr><td>Is PHP Cool?</td><td>$q4y%</td><td>$q4n%</td></tr>";
        print "<tr><td>Is SQL Cool?</td><td>$q5y%</td><td>$q5n%</td></tr>";
    } else {
        echo "<h1>Invalid Password!</h1>";
    }



    ?>
</body>

</html>