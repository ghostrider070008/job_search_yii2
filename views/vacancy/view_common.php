<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vacancy */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vacancies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vacancy-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?  $company = new \app\models\Companyes();
    $position = new \app\modules\admin\models\Position();
    $education = new \app\modules\admin\models\Educations();
    $schedule = new \app\modules\admin\models\Schedule();

    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute' => 'company_name', 'label' => 'Наименование компании', 'value' => $company->getCompanyName($model->id_companyes)],
            ['attribute' => 'position_name', 'label' => 'Должность', 'value' => $position->getPosition($model->id_positions)[0]],
            ['attribute' => 'education_name', 'label' => 'Образование', 'value' => $education->getEducation($model->id_educations)[0]],
            ['attribute' => 'salary', 'label' => 'Зарплата','value' => $model->salary.' рублей'],
            ['attribute' => 'schedule_name', 'label' => 'График работы', 'value' => $schedule->getScheduleName($model->id_schedules)],
            ['attribute' => 'text', 'label' => 'Описание вакансии'],
            ['attribute' => 'phone', 'label' => 'Телефон'],
            ['attribute' => 'e_mail', 'label' => 'E-mail'],
            ['attribute' => 'created_at','label' => 'Дата добавления'],
        ],
    ]) ?>

</div>
