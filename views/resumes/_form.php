<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\date\DatePicker;
use app\modules\admin\models\Position;


/* @var $this yii\web\View */
/* @var $model app\models\Resumes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resumes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'family')->textInput(['placeholder' => 'Ваша фамилия...','maxlength' => true])->label(false) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Ваше имя...'])->label(false) ?>

    <?= $form->field($model, 'patronomic')->textInput(['maxlength' => true, 'placeholder' => 'Ваше отчество...'])->label(false) ?>

    <?= $form->field($model, 'id_position')->dropdownList(
        Position::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Выберите должность'])->label('Желаемая должность');?>

    <?= $form->field($model, 'salary')->textInput(['placeholder' => 'Желаемая заработная плата...'])->label(false) ?>

    <?=$form->field($model,'phone')->widget(MaskedInput::className(),['mask'=>'+7 (999) 999-99-99'])->textInput(['placeholder'=>'+7 (999) 999-99-99'])->label('Ваш Телефон');?>


    <?= $form->field($model, 'e_mail')->textInput(['maxlength' => true, 'placeholder'=>'e-mail@mail.ru']) ?>

    <?= $form->field($model, 'id_citi')->dropdownList(
        \app\modules\admin\models\Cities::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Выберите город'])->label('Город');?>

    <?= $form->field($model, 'id_citizenship')->dropdownList(
        \app\modules\admin\models\Citizenship::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Ваше гражданство'])->label('Гражданство');?>

    <?= $form->field($model, 'birthday')->widget(DatePicker::className([
        'name' => 'check_issue_date',
        'value' => date('d-M-Y', strtotime('+2 days')),
        'options' => ['placeholder' => 'Select issue date ...'],
        'pluginOptions' => [
            'format' => 'dd-mm-yyyy',
            'todayHighlight' => true
        ]
    ]))->label('Дата рождения:');?>

    <?= $form->field($model, 'id_education')->dropdownList(
        \app\modules\admin\models\Educations::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Ваше образование'])->label('Образование');?>

    <?= $form->field($model, 'experience')->textarea(['rows' => 6, 'placeholder' => 'Введите Ваш опыт работы на данной должности...'])->label('Ваш опыт работы') ?>

    <?= $form->field($model, 'education')->textarea(['rows' => 6, 'placeholder' => 'Введите Ваше образование...'])->label(false) ?>

    <?= $form->field($model, 'personal_qualities')->textarea(['rows' => 6, 'placeholder'=>'Ваши личныекачества...'])->label(false) ?>

    <?= $form->field($model, 'id_status')->dropdownList(
        \app\modules\admin\models\Status::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Статус резюме'])->label('Статус резюме:');?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
