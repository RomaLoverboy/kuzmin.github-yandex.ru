<?php
require_once 'dropDownList.php';

if ($_POST['cityFromExt'] != '') {
    echo json_encode(getCity($db, $_POST['cityFromExt']));
}
