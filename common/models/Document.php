<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\UploadedFile;

/**
 * This is the model class for table "document".
 *
 * @property int $id
 * @property string $name
 * @property string $hash
 * @property string $password
 * @property string $descr
 * @property int $active
 * @property string $document_name
 * @property int $created_by
 * @property string $created_at
 * @property int $updated_by
 * @property string $updated_at
 * @property string $dir_name
 *
 * @property DepartmenDocument[] $departmenDocuments
 * @property Department[] $departmens
 * @property User $createdBy
 * @property User $updatedBy
 * @property LogRevs[] $logRevs
 */
class Document extends \yii\db\ActiveRecord
{
    public $PDF;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'hash', 'password', 'descr', 'document_name','dir_name'], 'required'],
            [['active', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'descr', 'dir_name'], 'string', 'max' => 100],
            [['hash', 'password'], 'string', 'max' => 256],
            [['document_name'], 'string', 'max' => 40],
            [['PDF'], 'file', 'extensions'=>'pdf'],
            [['active', 'name'], 'unique', 'targetAttribute' => ['active', 'name']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
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
            'hash' => Yii::t('app', 'Hash'),
            'password' => Yii::t('app', 'Password'),
            'descr' => Yii::t('app', 'Descr'),
            'active' => Yii::t('app', 'Active'),
            'document_name' => Yii::t('app', 'Document Name'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'dir_name' => Yii::t('app', 'Dir Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartmenDocuments()
    {
        return $this->hasMany(DepartmenDocument::className(), ['id_document' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartmens()
    {
        return $this->hasMany(Department::className(), ['id' => 'id_departmen'])->viaTable('departmen_document', ['id_document' => 'id']);
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
    public function getLogRevs()
    {
        return $this->hasMany(LogRevs::className(), ['id_document' => 'id']);
    }

    public function uploadPDF() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $PDF = UploadedFile::getInstance($this, 'PDF');

        // if no image was uploaded abort the upload
        if (empty($PDF)) {
            return false;
        }

        // store the source file name
        $this->document_name = $PDF->name;
        $ext = end((explode(".", $PDF->name)));
        $this->hash = Yii::$app->security->generateRandomString();
        $this->password = Yii::$app->security->generateRandomString();
        // generate a unique file name
        //$this->avatar = Yii::$app->security->generateRandomString().".{$ext}";
        mkdir(dirname(dirname(__DIR__))."/pdfs/".$this->hash,0755);
        $this->dir_name ="/pdfs/".$this->hash."/".$PDF->name;
        // the uploaded image instance
        return $PDF;
    }
}
