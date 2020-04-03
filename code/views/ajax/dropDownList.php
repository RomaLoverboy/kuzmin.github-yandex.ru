<?php
require_once ('../../base/Inquiries.php');
require_once ('../../base/DataBase.php');
require_once ('../../models/AirModel.php');
require_once ('../../config/ConfigDataBase.php');
?>
<?php
$db = new \base\DataBase();

function getCity ($db, $post) {
    return $db->show(['name'], 'city', ['row' => 'name', 'condition' => $post], null);
}

?>
