<?php

namespace app\models;

use Yii;
use app\models\Skills;


/**
 * This is the model class for table "userskills".
 *
 * @property int $id
 * @property int $user_id
 * @property int $skill_id
 */
class Userskills extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userskills';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'skill_id'], 'required'],
            [['user_id', 'skill_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'skill_id' => 'Skill ID',
        ];
    }

    // public function getUsers()
    // {
    //     return $this->hasOne(User::className(), ['id' => 'user_id']);
    // }
    // public function getSkillname()
    // {
    //     return $this->hasMany(Skills::className(), ['id' => 'skill_id']);
    // }
}
