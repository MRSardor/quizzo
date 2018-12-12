<?php

use yii\db\Migration;

/**
 * Handles the creation of table `question`.
 */
class m181211_122724_create_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('question', [
            'id' => $this->primaryKey(),
            'category_id' =>$this->integer()->notNull(),
            'level' =>"enum('easy','normal', 'advanced', 'genious')" ,
            'question_text'=>$this->string()->unique(),
            'opt_1' => $this->string(),
            'opt_2' =>$this->string(),
            'opt_3' =>$this->string(),
            'opt_4' =>$this ->string(),
            'correct_opt' =>$this->integer(),
        ]);

         // creates index for column `author_id`
         $this->createIndex(
            'idx-post-category_id',
            'question',
            'category_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-post-category_id',
            'question',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('question');
    }
}
