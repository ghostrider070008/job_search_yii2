<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Cities;
use app\modules\admin\models\Position;
use app\modules\admin\models\Educations;
use app\modules\admin\models\Schedule;
use yii\widgets\MaskedInput;
use \app\modules\admin\models\Status;

/* @var $this yii\web\View */
/* @var $model app\models\Vacancy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_cities')->dropdownList(
        Cities::find()->select(['name', 'id'])
            ->indexBy('id')->column(),
        ['prompt'=>'Выберите город...'])->label('Город:'); ?>

    <?= $form->field($model, 'id_companyes')->dropdownList(
        \app\models\Companyes::find()->select(['name', 'id'])
            ->where(['user_id' => $_SESSION['__id']])
            ->indexBy('id')->column(),
        ['prompt'=>'Выберите компанию...'])->label('Компания:');
    ?>

    <?= $form->field($model, 'id_positions')->dropdownList(
        Position::find()->select(['name', 'id'])
            ->indexBy('id')->column(),
        ['prompt'=>'Выберите должнгость...'])->label('Должность:'); ?>

    <?= $form->field($model, 'id_educations')->dropdownList(
        Educations::find()->select(['name', 'id'])
            ->indexBy('id')->column(),
        ['prompt'=>'Выберите образование...'])->label('Образование:'); ?>

    <?= $form->field($model, 'salary')->textInput(['placeholder' => 'Зарплата'])->label(false) ?>

    <?= $form->field($model, 'id_schedules')->dropdownList(
        Schedule::find()->select(['name', 'id'])
            ->indexBy('id')->column(),
        ['prompt'=>'Выберите график работы...'])->label('График работы:'); ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6, 'placeholder' => 'Описание вакансии...'])->label(false) ?>

    <?=$form->field($model,'phone')->widget(MaskedInput::className(),['mask'=>'+7 (999) 999-99-99'])->textInput(['placeholder'=>'+7 (999) 999-99-99'])->label('Ваш Телефон');?>

    <?= $form->field($model, 'e_mail')->textInput(['maxlength' => true, 'placeholder' => 'e-mail@mail.ru'])->label(false) ?>

    <?= $form->field($model, 'id_status')->dropdownList(
        Status::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Статус вакансии...'])->label('Статус вакансии:'); ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
