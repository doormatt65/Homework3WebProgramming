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
            margin-top: 15%;
        }

        table {
            margin: auto;
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

    $enteredCode = $_POST["passcode"];

    if ($enteredCode != mysqli_query($conn, "SELECT passcode FROM admin")->fetch_assoc()["passcode"]) {
        print "<div>";
        print "<h3>Incorrect passcode</h3>";
        print "<a href='admin.html'>Try again</a>";
        print "</div>";
    } else {

        $studentQuery = mysqli_query($conn, "SELECT * FROM students");
        print "<div>";
        print "<h3>Student grades</h3>";
        print "<table>";
        print "<tr><td>Name</td><td>ID</td><td>Completed?</td><td>Grade</td></tr>";
        for ($i = 0; $i < $studentQuery->num_rows; $i++) {

            $row = mysqli_fetch_assoc($studentQuery);
            print "<tr><td>" . $row["name"] . "</td><td>" . $row["passcode"] . "</td><td>" . $row["status"] . "</td><td>" . $row["grade"] . "</td></tr>";
        }
        print "</table>";
        print "</div>";

    }


    ?>
</body>

</html>