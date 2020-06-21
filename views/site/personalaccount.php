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
    <? if ($_SESSION['__role_name'][0]=="vacant"){
        echo Html::a('Вакансии', [Url::to(['/vacancy/index'])]);
    }
        if ($_SESSION['__role_name'][0]=="work"){
            echo Html::a('Резюме', [Url::to(['/resumes/index'])]);
        }

    ?>
</div>
<div>
</div>
<div>
    <a href="<?= Url::to(['/companyes/index'])?>">Компании</a>
</div>
