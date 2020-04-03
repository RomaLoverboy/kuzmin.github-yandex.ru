<?php
require_once('../../base/Inquiries.php');
require_once('../../base/DataBase.php');
require_once('../../models/AirModel.php');
require_once('../../config/ConfigDataBase.php');
?>

<?php
$db = new \base\DataBase();
$airModel = new \models\AirModel();

$city1 = $db->show(['id'], 'city', null, ['name' => $_POST['cityFromExt']]);
$city2 = $db->show(['id'], 'city', null, ['name' => $_POST['cityToExt']]);
$date = $_POST['dateInExt'];

$flight = $db->show(['id', 'whereFrom', 'whereTo', 'dateIn'], 'flight', null, ['whereFrom' => $city1[0]['id'], 'whereTo' => $city2[0]['id'], 'mainDate' => $date]);

foreach($flight as $item) {
    $item['tickets'] = \models\AirModel::getPlaces();
    $result[] = $item;
}

if (empty($result)) {
    $result = ['info' => 'null'];
    echo json_encode($result);
} else {
    echo json_encode($result);
}

?>

