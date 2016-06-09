<?php

namespace backend\modules\planCuentas\controllers;

use yii\web\Controller;

/**
 * Default controller for the `planCuentas` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
