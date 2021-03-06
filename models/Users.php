<?php

namespace app\models;

use Yii;
use app\models\City;
use app\models\Userskills;
use app\models\Skills;


/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property int $city_id
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'city_id'], 'required'],
            [['city_id'], 'integer'],
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
            'city_id' => 'City ID',
        ];
    }

    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    
    public function getUserskills()
    {
        return $this->hasMany(Userskills::className(), ['user_id' => 'id']);
    }

   

    public function getUserskillsname()
    {
        return $this->hasMany(Skills::className(), ['id' => 'skill_id'])
            ->via('userskills');
    }
}
