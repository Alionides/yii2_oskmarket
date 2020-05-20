<?php

namespace app\models;

use Yii;
use app\models\Userskills;


/**
 * This is the model class for table "skills".
 *
 * @property int $id
 * @property string $name
 */
class Skills extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'skills';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
    // public function getUserskill()
    // {
    //     return $this->hasMany(Userskills::className(), ['skill_id' => 'id']);
    // }
}