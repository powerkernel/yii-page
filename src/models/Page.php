<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */

namespace powerkernel\yiipage\models;

use Yii;

/**
 * This is the model class for Page.
 *
 * @property \MongoDB\BSON\ObjectID $_id
 * @property string $slug
 * @property integer $show_description
 * @property integer $show_update_date
 */
class Page extends \yii\mongodb\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'show_description', 'show_update_date'], 'required'],
            [['show_description', 'show_update_date'], 'boolean'],
            [['slug'], 'string', 'max' => 100],
            [['slug'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'slug' => Yii::t('page', 'Slug'),
            'show_description' => Yii::t('page', 'Show Description'),
            'show_update_date' => Yii::t('page', 'Show Update Date'),
        ];
    }


}
