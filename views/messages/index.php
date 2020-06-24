<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сообщения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messages-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Написать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?
    $user = new \app\models\User();
    $messages = new \app\models\Messages();
    $message = $messages->getMessages($_SESSION['__id']);

    foreach ($message as $value){
    }
    ?>
    <?
    $content = '<table class="table table-striped table-bordered"><tr><td>Отправитель</td><td>Получатель</td><td>Сообщение</td><td>Дата</td><td>Действие</td></tr>';
    foreach ($message as $value) {
        $content .= '<tr><td>'
            .$user->getUsername($value['id_users_sender'])[0]
        .'</td><td>'
            .$user->getUsername($value['id_users_recipient'])[0]
        .'</td><td>'
        .$value['text']
        .'</td><td>'
        .$value['created_at']
        .'</td><td>'
            .Html::a('Удалить', ['delete', 'id' => $value['id']], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы действительно хотите удалить данную запись?',
                    'method' => 'post',
                ],
            ])
        .'</td>';

            }
    $content .= '</table>';
    echo $content;


    ?>
    <div>

    </div>





</div>
