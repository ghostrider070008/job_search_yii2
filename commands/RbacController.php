<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $role = Yii::$app->authManager->createRole('admin');
        $role->description = 'Администратор';
        Yii::$app->authManager->add($role);

        $role = Yii::$app->authManager->createRole('work');
        $role->description = 'Работадатель';
        Yii::$app->authManager->add($role);

        $role = Yii::$app->authManager->createRole('vacant');
        $role->description = 'Соискатель';
        Yii::$app->authManager->add($role);

        $role = Yii::$app->authManager->createRole('manager');
        $role->description = 'менеджер';
        Yii::$app->authManager->add($role);
    }
}

