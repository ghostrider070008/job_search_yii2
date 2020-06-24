<?php
use yii\helpers\Url;
/* @var $this yii\web\View */



$this->title = 'Job Search';
?>
<div class="container">
    <div>
        <p class="statistic font">
            Число нашедших работу за последний месяц: <?
            echo $resumes->getCountStatusFind()[0];
            ?>
        </p>
        <p class="font">
            Число лиц вставших на учет за последний месяц: <?
            echo $resumes->getCountResumes()[0];
            ?>
        </p>
        <p class="font">
            Количество безработных с образованием в 11 классов: <?
            echo $resumes->getCountResumesEducations(2);
            ?>
        </p>
        <p class="font">
            Количество безработных с высшим образованием: <?
            echo $resumes->getCountResumesEducations(1);
            ?>
        </p>
        <p class="font">Количество активных вакансий:<? $vacancy = new \app\models\Vacancy();
            echo $vacancy->activeVacancy(1)[0];?>
        </p>
        <p class="font">Количество активных резюме:<?
            echo $resumes->getCountResume(1)[0];?>
        </p>
        <p class="font">Количество нашедших работу:<?
            echo $resumes->getCountResume(2)[0];?>
        </p>

    </div>
</div>
