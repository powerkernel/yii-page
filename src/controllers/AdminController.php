<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */


namespace powerkernel\yiipage\controllers;

use yii\filters\AccessControl;


/**
 * Class AdminController
 */
class AdminController extends \powerkernel\yiicommon\controllers\ActiveController
{
    public $modelClass = 'powerkernel\yiipage\models\Page';

    /**
     * @inheritdoc
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['access'] = [
            '__class' => AccessControl::class,
            'rules' => [
                [
                    'verbs' => ['OPTIONS'],
                    'allow' => true,
                ],
                [
                    'roles' => ['admin'],
                    'allow' => true,
                ]
            ],
        ];
        return $behaviors;
    }
}
