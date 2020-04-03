<?php
require_once 'dropDownList.php';

if ($_POST['cityToExt'] != '') {
    echo json_encode(getCity($db, $_POST['cityToExt']));
}