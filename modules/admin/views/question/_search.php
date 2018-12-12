<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'level') ?>

    <?= $form->field($model, 'question_text') ?>

    <?= $form->field($model, 'opt_1') ?>

    <?php // echo $form->field($model, 'opt_2') ?>

    <?php // echo $form->field($model, 'opt_3') ?>

    <?php // echo $form->field($model, 'opt_4') ?>

    <?php // echo $form->field($model, 'correct_opt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
