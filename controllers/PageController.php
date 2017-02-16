<?php

namespace app\controllers;

use app\models\Furl;
use Yii;
use app\models\Page;
use app\models\PageSearch;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends Controller
{
    public $layout = 'admin';
    /**
     * @inheritdoc
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
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Page model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'main';

        $page = $this->findModel($id);
        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => Html::encode($page->furl->description)
        ]);
        $this->view->title = Html::encode($page->furl->title);

        return $this->render('view', [
            'model' => $page,
        ]);
    }

    /**
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Page();
        $furl = new Furl();
        $post = Yii::$app->request->post();
        if ($model->load($post) && $furl->load($post) && $furl->save()) {
            $model->furl_id = $furl->id;
            $message = $model->save() ? 'Збереженно' : 'Помилка';
            Yii::$app->session->setFlash('alert', $message);
        }

        return $this->render('create', [
            'model' => $model,
            'furl' => $furl,
        ]);

    }

    /**
     * Updates an existing Page model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $post = Yii::$app->request->post();
        if($model->load($post) && $model->furl->load($post) && $model->furl->save()) {
            $message = $model->save() ? 'Збереженно' : 'Помилка';
            Yii::$app->session->setFlash('alert', $message);
        }

        return $this->render('update', [
            'model' => $model,
            'furl' => $model->furl
        ]);
    }

    /**
     * Deletes an existing Page model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
