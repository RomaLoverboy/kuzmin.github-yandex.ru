<?php
require_once ('../../base/Inquiries.php');
require_once ('../../base/DataBase.php');
require_once ('../../models/AirModel.php');
require_once ('../../config/ConfigDataBase.php');
?>

<?php
$db = new \base\DataBase();
$result = $db->show(['place'], 'ticket', null, null);
$idPlace = $_POST['id-flg'];
$result = $db->show(['place'], 'ticket LEFT JOIN flight f ON ticket.flight = f.id WHERE f.id = ' . $idPlace, null, null);
echo json_encode($result);
?>