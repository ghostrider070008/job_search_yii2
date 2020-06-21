<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Resumes */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Резюме', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="resumes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?
    $user = new \app\models\User();
    $position = new \app\modules\admin\models\Position();
    $citizenship = new \app\modules\admin\models\Citizenship();
    $education = new \app\modules\admin\models\Educations();
    $status = new \app\modules\admin\models\Status();
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute' => 'username', 'label' => 'Имя пользователя', 'value' => $user->getUsername($model->id_user)[0] ],
            ['attribute' => 'family', 'label' => 'Фамилия'],
            ['attribute' => 'name', 'label' => 'Имя'],
            ['attribute' => 'patronomic', 'label' => 'Отчество'],
            ['attribute' => 'position_name', 'label' => 'Специальность', 'value' => $position->getPosition($model->id_position)[0] ],
            ['attribute' => 'phone', 'label' => 'Телефон'],
            ['attribute' => 'e_mail', 'label' => 'e-mail - адрес'],
            ['attribute' => 'citizenship', 'label' => 'Гражданство', 'value' => $citizenship->getCitizenship($model->id_citizenship)[0] ],
            ['attribute' => 'birthday', 'label' => 'Дата рождения'],
            ['attribute' => 'education_name', 'label' => 'Образование', 'value' => $education->getEducation($model->id_education)[0] ],
            ['attribute' => 'experience', 'label' => 'Опыт работы'],
            ['attribute' => 'education', 'label' => 'Учебные заведения'],
            ['attribute' => 'personal_qualities', 'label' => 'Личные качества'],
            ['attribute' => 'status_name', 'label' => 'Статус объявления','value' => $status->getStatus($model->id_status)[0]],
            ['attribute' => 'created_at', 'label' => 'Дата добавления', 'value' => date('d.m.Y h:m:s', $model->created_at)],/*преобразование времени из integer в обычную дату*/
        ],
    ]) ?>

</div>
