<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "page_sections".
 *
 * @property int $id
 * @property string $name
 * @property string $name_section
 * @property string $code_section
 * @property int $position
 * @property int $active
 * @property int $created_by
 * @property string $created_at
 * @property int $updated_by
 * @property string $updated_at
 */
class PageSections extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page_sections';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'name_section', 'code_section', 'position'], 'required'],
            [['code_section'], 'string'],
            [['created_by','updated_by','created_at', 'updated_at'], 'safe'],
            [['position', 'active'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 32],
            [['name_section'], 'string', 'max' => 20],
            [['name'], 'unique'],
            [['name_section'], 'unique'],
            [['position'], 'unique'],
        ];
    }
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
            'blame' => [
                'class' => 'yii\behaviors\BlameableBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_by', 'updated_by'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_by'],
                ],
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'name_section' => Yii::t('app', 'Name Section'),
            'code_section' => Yii::t('app', 'Code Section'),
            'position' => Yii::t('app', 'Position'),
            'active' => Yii::t('app', 'Active'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
    public function getPageSectionImages()
    {
        return $this->hasMany(PageSectionImage::className(), ['id_page_section' => 'id']);
    }
}
