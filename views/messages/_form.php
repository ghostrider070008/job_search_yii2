<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Messages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="messages-form">
    <?php
        $sql = 'SELECT `username`, `id` FROM `users` WHERE id!=:user_id';
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_users_recipient')->dropDownList(
        User::findBySql($sql, [':user_id' => $_SESSION['__id']])->indexBy('id')->column(),
        ['prompt'=>'Выберите получателя'])->label('Получатель:'); ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6, 'placeholder'=>'Текст сообщения...'])->label(false); ?>


    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
