<DOCTYPE! html>
    <html>

    <head>
        <title>Q10</title>
        <style>
            body {
                background-color: #9999;
            }

            h1 {
                text-align: center;
            }

            h2 {
                text-align: center;
            }

            table {
                border: 1px solid black;
                text-align: center;
                width: 50%;
                margin: 0 auto;
            }

            td {
                border: 1px solid black;
            }

            div {
                margin: 0 auto;
                width: 50%;
            }
        </style>
    </head>

    <body>
        <h1>Compound Interest</h1>
        <?php
        $p = $_GET['principal'];
        $n = $_GET['years'];
        $r = $_GET['rate'];

        function compoundInterest($p, $n, $r)
        {
            return round($p * pow((1 + $r / 100), $n), 2);
        }

        print "<h2>Principal: $$p</h2>";
        print "<h2>Years: $n</h2>";
        print "<h2>Rate: $r%</h2>";

        ?>
        <div>
            <table>
                <tr>
                    <th>Year</th>
                    <th>Balance</th>
                </tr>

                <?php
                print "<tr>";
                print "<td>0</td>";
                print "<td>$$p</td>";
                for ($i = 1; $i <= $n; $i++) {
                    print "<tr>";
                    print "<td>$i</td>";
                    print "<td>$" . compoundInterest($p, $i, $r) . "</td>";
                    print "</tr>";
                }
                ?>
            </table>
        </div>
    </body>

    </html>