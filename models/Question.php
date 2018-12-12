<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property int $category_id
 * @property string $level
 * @property string $question_text
 * @property string $opt_1
 * @property string $opt_2
 * @property string $opt_3
 * @property string $opt_4
 * @property int $correct_opt
 *
 * @property Category $category
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'required'],
            [['category_id', 'correct_opt'], 'integer'],
            [['level'], 'string'],
            [['question_text', 'opt_1', 'opt_2', 'opt_3', 'opt_4'], 'string', 'max' => 255],
            [['question_text'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'level' => 'Level',
            'question_text' => 'Question Text',
            'opt_1' => 'Option 1',
            'opt_2' => 'Option 2',
            'opt_3' => 'Option 3',
            'opt_4' => 'Option 4',
            'correct_opt' => 'Correct Opt',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
