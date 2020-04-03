<?php
require_once ('../../base/Inquiries.php');
require_once ('../../base/DataBase.php');
require_once ('../../models/AirModel.php');
require_once ('../../config/ConfigDataBase.php');

$post = \base\Inquiries::post($_POST);
$model = new \models\AirModel();
$db = new \base\DataBase();

if (isset($_POST)) {
    $model->registPassenger($post);
}


$user = $db->show(['max(id)'], 'passenger', null, null);

foreach ($user as $item) {
    $userId = $item['max(id)'];
}

$dateNow = date("Y-m-d h:i:s");

if(isset($_POST['id-flg'])) {
    $dataBooked[] = [
        'passenger' => $userId,
        'place' => $_POST['ticket'],
        'flight' => $_POST['id-flg'],
        'dateBooked' => $dateNow,
    ];

    $model->bookedTicket($dataBooked);
}

if(isset($_POST['id-flg-ext'])) {
    $dataBooked[] = [
        'passenger' => $userId,
        'place' => $_POST['ticket-ext'],
        'flight' => $_POST['id-flg-ext'],
        'dateBooked' => $dateNow,
    ];
    $model->bookedTicket($dataBooked);
}