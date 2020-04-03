<?php
require_once 'dropDownList.php';

if ($_POST['cityTo'] != '') {
    echo json_encode(getCity($db, $_POST['cityTo']));
}
