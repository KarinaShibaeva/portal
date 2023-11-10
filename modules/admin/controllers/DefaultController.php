<?php

namespace app\modules\admin\controllers;

use app\models\Records;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public $layout='admin';

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query'=>Records::find()->where(['user_id'=>Yii::$app->user->getId()])
        ]);
        return $this->render('index', ['dataProvider'=>$dataProvider]);
    }


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['*'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->isAdmin();
                        }
                    ],
                ],
            ],
        ];
    }

}
