<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use yii\httpclient\Client;
use app\models\Currency;

class ImmoController extends Controller
{
    /**
     * Обновсение курса
     * @param boolead $message  Пробный прогон
     * @return int Exit code
     */
    public function actionUpdate($dry_run=1)
    {
	$client = new Client(['baseUrl' => 'http://www.cbr.ru/scripts/XML_daily.asp',
		'responseConfig' => ['format' => Client::FORMAT_XML],]);
	$response = $client->createRequest()->setFormat(Client::FORMAT_XML)->send();
	$data = $response->getData();
	if ( !is_array($data['Valute']) ) {
        	echo "Что-то не так\n";

        	return ExitCode::OK;
	}
	foreach( $data['Valute'] as $v ) {
		echo $v['Name']."\n";
		if ($dry_run) continue;
		$c = Currency::find()->where(['name'=>$v['Name']])->one();
		if ( !count($c) ) $c = new Currency();
		$c->name = $v['Name'];
		$c->rate = $v['Value'];
		$c->save();
	}

        return ExitCode::OK;
    }
}
