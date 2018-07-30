<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */

namespace powerkernel\yiipage\v1;

/**
 * Class Module
 * Page API Module
 */
class Module extends \yii\base\Module
{

    public $controllerNamespace = 'powerkernel\yiipage\v1\controllers';
    public $defaultRoute = 'default';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->registerTranslations();
    }

    /**
     * Register translation for the Module
     */
    public function registerTranslations()
    {
        $class = 'powerkernel\yiicommon\i18n\MongoDbMessageSource';
        \Yii::$app->i18n->translations['page'] = [
            '__class' => $class,
            'on missingTranslation' => function ($event) {
                $event->sender->handleMissingTranslation($event);
            },
        ];
    }

    /**
     * Translate message
     * @param $message
     * @param array $params
     * @param null $language
     * @return mixed
     */
    public static function t($message, $params = [], $language = null)
    {
        return \Yii::$app->getModule('page')->translate($message, $params, $language);
    }

    /**
     * Translate message
     * @param $message
     * @param array $params
     * @param null $language
     * @return mixed
     */
    public static function translate($message, $params = [], $language = null)
    {
        return \Yii::t('page', $message, $params, $language);
    }

}