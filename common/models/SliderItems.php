<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\UploadedFile;

/**
 * This is the model class for table "slider_items".
 *
 * @property int $id
 * @property int $id_slider
 * @property string $transition
 * @property string $slotamount
 * @property string $hideafterloop
 * @property string $hideslideonmobile
 * @property string $easein
 * @property string $easeout
 * @property string $masterspeed
 * @property string $thumb
 * @property string $rotate
 * @property string $fstransition
 * @property string $fsmasterspeed
 * @property string $fsslotamount
 * @property string $saveperformance
 * @property string $tittle
 * @property string $description
 * @property string $image
 * @property string $bgposition
 * @property string $bgfit
 * @property string $bgrepeat
 * @property string $paralax
 * @property string $layer2_text
 * @property string $layer3_text
 * @property string $layer4_text
 * @property int $created_by
 * @property string $created_at
 * @property int $updated_by
 * @property string $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property Slider $slider
 */
class SliderItems extends \yii\db\ActiveRecord
{
    public $slide;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_slider', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['transition', 'slotamount', 'hideafterloop', 'hideslideonmobile', 'easein', 'easeout', 'masterspeed', 'thumb', 'rotate', 'fstransition', 'fsmasterspeed', 'fsslotamount', 'saveperformance', 'tittle', 'description', 'image', 'bgposition', 'bgfit', 'bgrepeat', 'paralax', 'layer2_text', 'layer3_text', 'layer4_text'], 'string', 'max' => 45],
            [['id'], 'unique'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['id_slider'], 'exist', 'skipOnError' => true, 'targetClass' => Slider::className(), 'targetAttribute' => ['id_slider' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_slider' => Yii::t('app', 'Id Slider'),
            'transition' => Yii::t('app', 'Transition'),
            'slotamount' => Yii::t('app', 'Slotamount'),
            'hideafterloop' => Yii::t('app', 'Hideafterloop'),
            'hideslideonmobile' => Yii::t('app', 'Hideslideonmobile'),
            'easein' => Yii::t('app', 'Easein'),
            'easeout' => Yii::t('app', 'Easeout'),
            'masterspeed' => Yii::t('app', 'Masterspeed'),
            'thumb' => Yii::t('app', 'Thumb'),
            'rotate' => Yii::t('app', 'Rotate'),
            'fstransition' => Yii::t('app', 'Fstransition'),
            'fsmasterspeed' => Yii::t('app', 'Fsmasterspeed'),
            'fsslotamount' => Yii::t('app', 'Fsslotamount'),
            'saveperformance' => Yii::t('app', 'Saveperformance'),
            'tittle' => Yii::t('app', 'Tittle'),
            'description' => Yii::t('app', 'Description'),
            'image' => Yii::t('app', 'Image'),
            'bgposition' => Yii::t('app', 'Bgposition'),
            'bgfit' => Yii::t('app', 'Bgfit'),
            'bgrepeat' => Yii::t('app', 'Bgrepeat'),
            'paralax' => Yii::t('app', 'Paralax'),
            'layer2_text' => Yii::t('app', 'Layer2 Text'),
            'layer3_text' => Yii::t('app', 'Layer3 Text'),
            'layer4_text' => Yii::t('app', 'Layer4 Text'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
    public function uploadImage() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $image = UploadedFile::getInstance($this, 'slide');

        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }

        // store the source file name
        //$this->document_name = $image->name;
        //$ext = end((explode(".", $PDF->name)));
        $this->tittle = '';
        $this->thumb = $image->name;
        //$this->hash = Yii::$app->security->generateRandomString();
        // generate a unique file name
        //$this->avatar = Yii::$app->security->generateRandomString().".{$ext}";
        if(!is_dir(dirname(dirname(__DIR__))."/slider/".$this->id_slider."/")){
            mkdir(dirname(dirname(__DIR__))."/slider/".$this->id_slider."/",0755);
        }
        $this->image = $image->name;
        // the uploaded image instance
        return $image;
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
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlider()
    {
        return $this->hasOne(Slider::className(), ['id' => 'id_slider']);
    }
}
