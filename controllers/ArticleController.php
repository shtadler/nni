<?php

namespace app\controllers;

use app\models\Furl;
use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
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
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'main';
        $article = $this->findModel($id);

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => Html::encode($article->furl->description)
        ]);
        $this->view->title = Html::encode($article->furl->title);

        return $this->render('view', [
            'model' => $article,
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();
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
     * Updates an existing Article model.
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
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $furl = $model->furl;
        $model->delete();
        $furl->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
