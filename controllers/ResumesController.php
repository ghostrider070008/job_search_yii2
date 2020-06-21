<?php

namespace app\controllers;

use app\modules\admin\models\Journalizations;
use Yii;
use app\models\Resumes;
use app\models\ResumesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\db\Expression;

/**
 * ResumesController implements the CRUD actions for Resumes model.
 */
class ResumesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Resumes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ResumesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexCommon()
    {
        $searchModel = new ResumesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index_common', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Resumes model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);

    }

    public function actionMessagesCreate($id)
    {
        return $this->render('view_common', [
            'model' => $this->findModel($id),
        ]);

    }
    /*Контроллер для общиего просмотра резюме*/
    public function actionViewCommon($id)
    {
        return $this->render('view_common', [
            'model' => $this->findModel($id),
        ]);

    }

    /**
     * Creates a new Resumes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Resumes();



        if ($model->load(Yii::$app->request->post())){

            $model->id_user = $_SESSION['__id'];


            if ($model->save()) {
                $journalizations = new Journalizations();
                if ($journalizations->Oparations($_SESSION['__id'], 1,'17')) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Resumes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $journalizations = new Journalizations();
            if ($journalizations->Oparations($_SESSION['__id'], 3,'17')){
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Resumes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $journalizations = new Journalizations();
        $journalizations->Oparations($_SESSION['__id'], 2,'17');

        return $this->redirect(['index']);
    }

    /**
     * Finds the Resumes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Resumes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Resumes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
