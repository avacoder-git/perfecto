<?php
require_once("includes/init.php");
$clients = Reference::find_all();
if (!$session->is_signed_in()){redirect("login.php");}


if (isset($_POST['export'])) {


    $output = '
<table border="1">';


    $output.= '<tr>
                        <th scope="col">#</th>
                        <th scope="col">Ismi Famiyasi</th>
                        <th scope="col">Telefon raqami</th>
                        <th scope="col">Mamlakati</th>
                        <th scope="col">Time</th>
                    </tr>';

    foreach ($clients as $client) :
        $output .= "<tr>
                        <td>{$client->id}</td>
                        <td>{$client->name}</td>
                        <td>{$client->phone}</td>
                        <td>{$client->target}</td>
                        <td>{$client->date}</td>
                    </tr>
            ";
    endforeach;


    $output .= '</table>';

    header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header("Content-Disposition: attachment; filename=download.xls");
    echo $output;
}



if (isset($_POST['clear']))
{
    Reference::delete_all();
    redirect("./references.php");
}




?>