<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\assets\AppAsset;
/* @var $this yii\web\View */

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
AppAsset::register($this);

?>
<div>
    <a href="<?= Url::to(['/admin/journalizations/index'])?>">Журнализация</a>
</div>
<div>
    <a href="<?= Url::to(['/messages/index'])?>">Сообщения</a>
</div>
<div>
    <a href="<?= Url::to(['/resumes/index'])?>">Резюме</a>
</div>
<div>
    <a href="<?= Url::to(['/vacancy/index'])?>">Вакансии</a>
</div>
<div>
    <a href="<?= Url::to(['/companyes/index'])?>">Компании</a>
</div>
