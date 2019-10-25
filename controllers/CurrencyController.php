<?php

namespace app\controllers;

use app\models\Currency;

use yii\rest\ActiveController;

class CurrencyController extends ActiveController
{
    public $modelClass = 'app\models\Currency';
}
