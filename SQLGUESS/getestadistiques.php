<!DOCTYPE html>
<html>
    <head>
        <style>
            .center {
                margin-left: auto;
                margin-right: auto;
            }
            table {
                width: 75%;
                border-collapse: collapse;
            }

            table, td, th {
                border: 1px solid black;
                padding: 5px;
            }

            th {text-align: left;}
        </style>
    </head>
    <body>

        <?php
        //include_once 'DatabasePDO.php';
        include_once 'DatabaseProc.php';
        //include_once 'DatabaseOOP.php';
        include_once 'EstadistiquesRow.php';

        $modalitat = intval($_GET['modalitat']);

        $db = null;
        $result = null;
        try {
            $db = new DatabaseOOP("localhost", "root", "Hockey21$", "m07uf3");
            $db->connect();
            switch ($modalitat) {
                case "1":
                    $result = $db->selectAll();
                    break;
                case "2":
                    $result = $db->selectByModalitat("Huma");
                    break;
                case "3":
                    $result = $db->selectByModalitat("Maquina");
                    break;
                default:
                    $result = $db->selectAll();
                    break;
            }

            echo DatabasePDO::TABLE_START;
            foreach (new EstadistiquesRow(new RecursiveArrayIterator($result->fetchAll())) as $key => $row) {
                echo $row;
            }
        } catch (Exception $error) {
            echo "connection failed: " . $error->getMessage();
        }
        echo DatabasePDO::TABLE_END
        ?>
    </body>
</html>


