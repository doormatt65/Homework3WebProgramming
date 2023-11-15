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
        ""
    );

    if (mysqli_connect_errno()) {
        print "not connected";
    }

    $conn->select_db("q16");

    $table = $conn->query("CREATE TABLE IF NOT EXISTS admin (passcode INT(5))");

    if ($table === FALSE) {
        echo "Error creating table: " . $conn->error;
    }

    $adminInit = $conn->query("INSERT INTO admin (passcode) VALUES (12345)");



    $enteredCode = $_POST["passcode"];

    if ($enteredCode != ($conn->query("SELECT passcode FROM admin")->fetch_assoc()["passcode"])) {
        print "<div>";
        print "<h3>Incorrect passcode</h3>";
        print "<a href='admin.html'>Try again</a>";
        print "</div>";
    } else {
        $studentQuery = $conn->query("SELECT * FROM students");
        print "<div>";
        print "<h3>Student grades</h3>";
        print "<table>";
        print "<tr><td>Name</td><td>ID</td><td>Completed?</td><td>Grade</td></tr>";
        for ($i = 0; $i < $studentQuery->num_rows; $i++) {
            $row = $studentQuery->fetch_assoc();
            print "<tr><td>" . $row["name"] . "</td><td>" . $row["passcode"] . "</td><td>" . $row["status"] . "</td><td>" . $row["grade"] . "</td></tr>";
        }
        print "</table>";
        print "</div>";

    }


    ?>
</body>

</html>