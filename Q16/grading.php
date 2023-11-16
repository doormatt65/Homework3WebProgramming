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
    // print phpinfo();
    
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
    $q = array();
    $q[1] = $_POST["q1"] ?? "N/A";
    $q[2] = $_POST["q2"] ?? "N/A";
    $q[3] = $_POST["q3"] ?? "N/A";
    $q[4] = $_POST["q4"] ?? "N/A";
    $q[5] = $_POST["q5"] ?? "N/A";


    $answerquery = mysqli_query($conn, "SELECT * FROM exam");
    $solutionArray = array();
    $studentScore = 0;

    for ($i = 1; $i <= mysqli_num_rows($answerquery); $i++) {
        $row = mysqli_fetch_assoc($answerquery);
        $solutionArray[$i] = $row["solution"];
        if ($solutionArray[$i] == $q[$i]) {
            $studentScore++;
        }
    }

    print "<div>";

    $studentName = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students WHERE passcode = $enteredCode"))["name"];

    if (mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students WHERE passcode = $enteredCode"))["status"] == "Y") {
        print "<h3>You have already taken the exam</h3>";
    } else {
        print "<h3>Grades</h3>";
        mysqli_query($conn, "UPDATE students SET status = 'Y', grade = '$studentScore' WHERE passcode = $enteredCode");
        print "<p>" . $studentName . " - You got " . $studentScore . " out of 5</p>";
        print "<a href='Q16.html'>Take the exam as new student</a><br>";
        print "<a href='admin.html'>Admin - View grades</a>";
    }
    print "</div>";



    ?>
</body>

</html>