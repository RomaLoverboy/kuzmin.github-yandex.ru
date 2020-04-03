<?php

namespace controllers;

use base\BaseController;
use base\Inquiries;
use models\AirModel;

class MainController extends BaseController
{
    public $method;
    public function actionShowMainPage()
    {
        //$dataAir->registPassenger($this->post);
        return $this->render(null,'main');
    }

    public function actionShow(){
        return 123;
    }

    public static function uploadFileToImport() {

        return 500;

    }




}