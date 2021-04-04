<?php

    $first = $_POST['ism'];
    $mailFrom = 'avazbekrahmatovich@gmail.com';
    $last = $_POST['familiya'];
    $tel = $_POST['tel'];
    $subject = "Yangi o'quvchi";

    $to = 'avazbeknematov01@gmail.com';

    $headers = "From:".$mailFrom;
    $txt = "Yangi o'quvchi ma'lumot yubordi \n\n Ismi: ".$first. "\n Familiyasi: ". $last."\n\n Tel: ".$tel;

    $mail_status =  mail($to,$subject,$txt,$headers);
    header("Location: submitted.html?");
