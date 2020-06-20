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

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?
    $user = new \app\models\User();
    $position = new \app\modules\admin\models\Position();
    echo "Имя пользователя:". $user->getUsername($model->id)[0];
    ?>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute' => 'username', 'label' => 'Имя пользователя', 'value' => $user->getUsername($model->id)[0] ],
            ['attribute' => 'family', 'label' => 'Фамилия'],
            ['attribute' => 'name', 'label' => 'Имя'],
            ['attribute' => 'patronomic', 'label' => 'Отчество'],
            ['attribute' => 'position_name', 'label' => 'Специальность', 'value' => $position->getPosition($model->id_position)[0] ],
            'patronomic',
            'id_position',
            'salary',
            'phone',
            'e_mail',
            'id_citi',
            'id_citizenship',
            'birthday',
            'id_education',
            'experience:ntext',
            'education:ntext',
            'personal_qualities:ntext',
            'id_status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
