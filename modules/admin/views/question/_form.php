<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList($categories,  ['prompt'=> '']) ?>

    <?= $form->field($model, 'level')->dropDownList([ 'easy' => 'Easy', 'normal' => 'Normal', 'advanced' => 'Advanced', 'genious' => 'Genious', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'question_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opt_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opt_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opt_3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opt_4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correct_opt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
