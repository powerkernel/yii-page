<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */

namespace powerkernel\yiipage\models;

use powerkernel\yiicommon\behaviors\UTCDateTimeBehavior;
use powerkernel\yiicommon\Core;
use powerkernel\yiiuser\models\User;
use Yii;
use yii\helpers\Markdown;


/**
 * This is the model class for Page.
 *
 * @property \MongoDB\BSON\ObjectID $_id
 * @property string $slug
 * @property string $language
 * @property string $title
 * @property string $description
 * @property string $body_html
 * @property string $body_md
 * @property string $keywords
 * @property string $thumbnail_square
 * @property string $thumbnail_md
 * @property string $thumbnail_lg
 * @property string $status
 * @property boolean $show_description
 * @property boolean $show_update_date
 * @property string $created_by
 * @property string $updated_by
 * @property \MongoDB\BSON\UTCDateTime $created_at
 * @property \MongoDB\BSON\UTCDateTime $updated_at
 */
class Page extends \yii\mongodb\ActiveRecord
{

    const STATUS_ACTIVE = 'STATUS_ACTIVE';
    const STATUS_INACTIVE = 'STATUS_INACTIVE';


    /**
     * get status list
     * @param null $e
     * @return array
     */
    public static function getStatusOption($e = null)
    {
        $option = [
            self::STATUS_ACTIVE => Yii::t('page', 'Active'),
            self::STATUS_INACTIVE => Yii::t('page', 'Inactive'),
        ];
        if (is_array($e))
            foreach ($e as $i)
                unset($option[$i]);
        return $option;
    }

    /**
     * get status text
     * @param null $status
     * @return string
     */
    public function getStatusText($status = null)
    {
        if ($status === null)
            $status = $this->status;
        switch ($status) {
            case self::STATUS_ACTIVE:
                return Yii::t('page', 'Active');
                break;
            case self::STATUS_INACTIVE:
                return Yii::t('page', 'Inactive');
                break;
            default:
                return Yii::t('page', 'Unknown');
                break;
        }
    }

    /**
     * @inheritdoc
     * @inheritdoc
     */
    public static function collectionName()
    {
        return 'page_db';
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function attributes()
    {
        return [
            '_id',
            'slug',
            'title',
            'language',
            'description',
            'body_html',
            'body_md',
            'keywords',
            'thumbnail_square',
            'thumbnail_md',
            'thumbnail_lg',
            'status',
            'show_description',
            'show_update_date',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['show_description', 'show_update_date'], 'default', 'value' => true],

            [['slug', 'title', 'language', 'description', 'body_md', 'keywords', 'thumbnail_square', 'thumbnail_md', 'thumbnail_lg', 'status'], 'required'],

            [['show_description', 'show_update_date'], 'boolean'],

            [['slug'], 'string', 'max' => 100],
            [['slug'], 'unique', 'on' => ['create']],

            [['title', 'description', 'keywords'], 'string', 'max' => 180],

            [['language'], 'string', 'max' => 5],

            [['thumbnail_square', 'thumbnail_md', 'thumbnail_lg'], 'url'],

            [['status'], 'string', 'max' => 20],

            [['created_by'], 'exist', 'targetClass' => User::class, 'targetAttribute' => ['created_by' => '_id']],
            [['updated_by'], 'exist', 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => '_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'slug' => Yii::t('page', 'Slug'),
            'language' => Yii::t('page', 'Language'),
            'title' => Yii::t('page', 'Title'),
            'description' => Yii::t('page', 'Description'),
            'body_html' => Yii::t('page', 'Body HTML'),
            'body_md' => Yii::t('page', 'Body Markdown'),
            'keywords' => Yii::t('page', 'Keywords'),
            'thumbnail_square' => Yii::t('page', 'Thumbnail Square'),
            'thumbnail_md' => Yii::t('page', 'Thumbnail Medium'),
            'thumbnail_lg' => Yii::t('page', 'Thumbnail Large'),
            'status' => Yii::t('page', 'Status'),
            'show_description' => Yii::t('page', 'Show Description'),
            'show_update_date' => Yii::t('page', 'Show Update Date'),
            'created_by' => Yii::t('page', 'Created By'),
            'updated_by' => Yii::t('page', 'Updated By'),
            'created_at' => Yii::t('page', 'Created At'),
            'updated_at' => Yii::t('page', 'Updated At'),
        ];
    }

    /**
     * get id
     * @return \MongoDB\BSON\ObjectID|string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            UTCDateTimeBehavior::class,
        ];
    }

    /**
     * @return int timestamp
     */
    public function getCreatedAt()
    {
        return $this->created_at->toDateTime()->format('U');
    }

    /**
     * @return int timestamp
     */
    public function getUpdatedAt()
    {
        return $this->updated_at->toDateTime()->format('U');
    }

    /**
     * @inheritdoc
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (!is_a(Yii::$app, '\yii\console\Application')) {
            if ($insert) {
                $this->created_by = (string)Yii::$app->user->id;
            }
            $this->updated_by = (string)Yii::$app->user->id;
        }
        /* convert md to html */
        $this->body_html=Core::translateMessage(Markdown::process($this->body_md, 'gfm'), [
            '{APP_DOMAIN}'=>Yii::$app->params['domain'],
            '{APP_NAME}'=>Yii::$app->name
        ]);
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }


}
