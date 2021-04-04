<?php

include "database.php";

if (isset($_POST['export'])) {

    $result = $mysqli->query("select * from clients") or die($mysqli->error);

    $output = '
        <table class="table" border="1">
        
    ';

    while($row = $result->fetch_assoc())
        {
            $output .= '
                <tr>
                    <td>' . $row["client_id"] . '</td>
                    <td>' . $row["client_name"] . '</td>
                    <td>'. "   "   . $row["client_phone"] . '</td>
                    <td>' . $row["client_target"] . '</td>
                    <td>' . $row["date"] . '</td>
                </tr>
            ';
        }
        $output .= '</table>';
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=download.xls");
        echo $output;
}

if (isset($_POST['clear']))
{
    $mysqli->query("delete from clients") or
    die($mysqli->error);
    header("location: show_clients.php");
}

?>