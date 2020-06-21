<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Journalizations1 */

$this->title = 'Create Journalizations1';
$this->params['breadcrumbs'][] = ['label' => 'Journalizations1', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journalizations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
