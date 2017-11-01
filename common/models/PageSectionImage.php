<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\UploadedFile;


/**
 * This is the model class for table "page_section_image".
 *
 * @property int $id
 * @property int $id_page_section
 * @property string $dir_name
 * @property string $tittle
 * @property int $position
 * @property int $created_by
 * @property string $created_at
 *
 * @property User $createdBy
 * @property PageSections $pageSection
 */
class PageSectionImage extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page_section_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_page_section', 'dir_name','position'], 'required'],
            [['id_page_section', 'position', 'created_by'], 'integer'],
            [['created_at','hash'], 'safe'],
            [['dir_name', 'tittle'], 'string', 'max' => 45],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['id_page_section'], 'exist', 'skipOnError' => true, 'targetClass' => PageSections::className(), 'targetAttribute' => ['id_page_section' => 'id']],
        ];
    }
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
            'blame' => [
                'class' => 'yii\behaviors\BlameableBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_by'],
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
            'id_page_section' => Yii::t('app', 'Id Page Section'),
            'dir_name' => Yii::t('app', 'Dir Name'),
            'tittle' => Yii::t('app', 'Tittle'),
            'position' => Yii::t('app', 'Position'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageSection()
    {
        return $this->hasOne(PageSections::className(), ['id' => 'id_page_section']);
    }
    public function uploadImage() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $image = UploadedFile::getInstance($this, 'image');

        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }

        // store the source file name
        //$this->document_name = $image->name;
        //$ext = end((explode(".", $PDF->name)));
        $this->tittle = '';
        $this->hash = Yii::$app->security->generateRandomString();
        // generate a unique file name
        //$this->avatar = Yii::$app->security->generateRandomString().".{$ext}";
        mkdir(dirname(dirname(__DIR__))."/pagesection/".$this->hash,0755);
        $this->dir_name = $image->name;
        // the uploaded image instance
        return $image;
    }
}
