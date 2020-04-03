<?php
require_once 'dropDownList.php';

if($_POST['cityFrom'] != '') {
    echo json_encode(getCity($db, $_POST['cityFrom']));
}
