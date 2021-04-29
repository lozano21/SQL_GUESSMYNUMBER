<!DOCTYPE html>
<html>
    <head>
        <style>
            #ta {
                width: 100%;
                border-collapse: collapse;
            }

            #ta, #ta td, #ta #th {
                border: 2px solid black;
                padding: 10px;
            }

            th {text-align: left;}
        </style>
    </head>
    <body>

        <?php
        $tipus = $_GET['a'];

        $db = mysqli_connect("localhost", "root", "Hockey21$", "m07uf3");
        if (!$db) {
            die('Could not connect: ' . mysqli_error($db));
        }

        if ($tipus != "ninguno") {
            $sql = "SELECT * FROM estadistiques WHERE modalitat = '" . $tipus . "'";
        } else {
            $sql = "SELECT * FROM estadistiques";
        }

        $result = mysqli_query($db, $sql);

        echo "<table id='ta'>
<tr style='background: grey;'>
<th>Id</th>
<th>Modalitat</th>
<th>Nivell</th>
<th>Data_Partida</th>
<th>Intents</th>
</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['modalitat'] . "</td>";
            echo "<td>" . $row['nivell'] . "</td>";
            echo "<td>" . $row['data_partida'] . "</td>";
            echo "<td>" . $row['intents'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($db);
        ?>
    </body>
</html>