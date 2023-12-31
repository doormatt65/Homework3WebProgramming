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

        div {
            padding: 20px;
            border-radius: 10px;
            display: block;
            text-align: center;
            margin-top: 15%;
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

    $enteredCode = $_POST["passcode"];
    $q = array();
    $q[0] = $_POST["q1"] ?? "N/A";
    $q[1] = $_POST["q2"] ?? "N/A";
    $q[2] = $_POST["q3"] ?? "N/A";
    $q[3] = $_POST["q4"] ?? "N/A";
    $q[4] = $_POST["q5"] ?? "N/A";


    $answerquery = $conn->query("SELECT * FROM exam");
    $solutionArray = array();
    $studentScore = 0;

    for ($i = 0; $i < $answerquery->num_rows; $i++) {
        $row = $answerquery->fetch_assoc();
        $solutionArray[$i] = $row["solution"];
        if ($solutionArray[$i] == $q[$i]) {
            $studentScore++;
        }
    }

    print "<div>";

    $studentName = $conn->query("SELECT * FROM students WHERE passcode = $enteredCode")->fetch_assoc()["name"];

    if ($conn->query("SELECT * FROM students WHERE passcode = $enteredCode")->fetch_assoc()["status"] == "Y") {
        print "<h3>You have already taken the exam</h3>";
    } else {
        print "<h3>Grades</h3>";
        $conn->query("UPDATE students SET status = 'Y', grade = '$studentScore' WHERE passcode = $enteredCode");
        print "<p>" . $studentName . " - You got " . $studentScore . " out of 5</p>";
        print "<a href='Q16.html'>Take the exam as new student</a><br>";
        print "<a href='admin.html'>Admin - View grades</a>";
    }
    print "</div>";



    ?>
</body>

</html>