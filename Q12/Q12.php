<DOCTYPE! html>

    <head>
        <meta charset="UTF-8" />
        <title>Resume</title>
    </head>

    <?php
    $u = $_GET['username'];
    $p = $_GET['password'];

    function login($u, $p)
    {
        if (($u == "admin" && $p == "password") || ($u == "user" && $p == "12345") || ($u == "guest" && $p == "guest") || ($u == "test" && $p == "test") || ($u == "matt" && $p == "cosc")) {
            return true;
        } else {
            return false;
        }
    }

    if (login($u, $p) == true) {
        print "<h1 style='text-align: center'>Welcome $u!</h1><hr>";
        print "  <body>
        <h1 style='text-align: center'>Matthew Braun</h1>
        <h3 style='text-align: center'>Email: mbraun3@emich.edu - Phone: 734.487.2120 - Address: 106 Halle Library</h3>
        <br>
        <h2>Education</h2>
        <p>
            <b>Eastern Michigan University</b> - Ypsilanti, MI - September 2021 to Present<br>
            Bachelor of Science - Computer Science, Applied <br>
            Expected graduation December 2023<br><br>
            <b>Jackson College</b> - Jackson, MI - January 2018 to April 2021<br>
            Associate in Arts- Liberal Arts & Sciences<br><br>
            <b>Tecumseh High School</b> - Tecumseh, MI - August 2016 to June 2021<br>
            High School Diploma
        </p>
        <h2>Computer Skills</h2>
        <p>
           Proficient in Java, Python, CSS, Cobol, Ruby, PHP, SML 
        </p>
        <h2>Projects</h2>
        <p>
            Researched and hand-coded chat-gpt and other similar chatbots with no assistance from any external resources.<br>
            Invented a new version of the Turing machine that is more than Turing complete.
        </p>
        <h2>Work Experience</h2>
        <p>
            <b>EMU IT Help Desk, Lead Senior Tech</b> - Ypsilanti, MI - May 2022 to Present<br>
            <ul><li>Rose from entry level phones to lead senior tech in less than 6 months (3 promotions)<br></li>
            <li>Performed line tests on ethernet ports across campus<br></li>
            <li>Main point of contact between the campus Department of Public Safety  and the Help Desk<br></li>
            <li>Collaborated with several departments to configure CLEMIS on new DPS computers<br></li>
            <li>Composed brief and descriptive tickets of user issues<br></li>
            <li>Responsible for diagnosing and fixing issues with University owned laptop and desktop computers<br></li>
            <li>Hardware and software<br></li>
            <li>Certified to order and replace damaged components in Dell computers for University staff<br></li>
            <li>Responsible for securely erasing user data from old equipment<br></li>
            <li>Assisted in the training and support of new employees<br></li></ul>
            <b>Gary's Quick Lube, Quick Lube Technician</b> - Tecumseh, MI - April 2017 to December 2021<br>
            <ul><li>Performed oil changes, tire rotations, and other routine maintenance on a variety of vehicles.<br></li>
            <li>Recommended additional services to customers based on inspection of their vehicles<br></li>
            <li>Maintained a clean and organized workspace<br></li>
            <li>Responsible for handling large cash transactions and making bank deposits<br></li>
            <li>Inventoried supplies to ensure appropriate quantities were available<br></li>
            <li>Performed opening and closing procedures as a keyholder<br></li></ul>
        </p>
    </body>";

    } else {
        print "<h1 style='text-align: center'>Invalid username or password!</h1><hr>";
        print "<h1 style='text-align: center'> Access Denied!</h1>";
    }