<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */


namespace powerkernel\yiipage\controllers;


use powerkernel\yiipage\models\Page;

/**
 * Class PageController
 */
class PageController extends \powerkernel\yiicommon\controllers\RestController
{

    /**
     * view page
     * @param $lang
     * @param $slug
     * @return array|null|\yii\mongodb\ActiveRecord
     */
    public function actionView($lang, $slug)
    {
        $model = Page::find()->where([
                'status' => Page::STATUS_ACTIVE,
                'slug' => $slug,
                'language' => $lang]
        )->one();

        if ($model) {
            return $model;
        }
        return [
            'success' => false,
            'data' => [
                'error' => 404
            ]
        ];
    }
}
