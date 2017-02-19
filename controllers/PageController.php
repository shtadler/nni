<?php

namespace app\controllers;

use app\models\Document;
use app\models\Furl;
use Yii;
use app\models\Page;
use app\models\PageSearch;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

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
            $message = $this->savePage($model);
            Yii::$app->session->setFlash('alert', $message);
        }

        return $this->render('create', [
            'model' => $model,
            'furl' => $furl,
        ]);

    }

    public function actionDeleteDocument($hash)
    {
        /** @var Document $document */
        if($document = Document::find()->where(['hash_name' => $hash])->one()) {
            unlink(Yii::getAlias("@webroot/uploads/{$document->hash_name}.{$document->extension}"));
            $document->delete();
            return true;
        }

        return Json::encode(['error' => 'Виникла помилка']);
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
            $message = $this->savePage($model);
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
        $model = $this->findModel($id);
        $furl = $model->furl;
        $model->delete();
        $furl->delete();

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

    /**
     * @param Page $model
     * @return string
     */
    private function savePage($model) {
        $message =  'Помилка';
        if($model->save()) {
            $message = 'Збереженно';
            foreach (UploadedFile::getInstances($model, 'file') as $instance) {
                $hashName = Yii::$app->security->generateRandomString();
                $fileName = 'uploads/' . $hashName . '.' . $instance->extension;
                if($instance->saveAs($fileName)) {
                    $document = new Document();
                    $document->entity_id = $model->id;
                    $document->entity_name = Document::PAGE;
                    $document->name = "{$instance->baseName}.{$instance->extension}";
                    $document->hash_name = $hashName;
                    $document->size = $instance->size;
                    $document->extension = $instance->extension;
                    $document->mime = $instance->type;
                    $document->save();
                }
            }

            return $message;
        }

        return $message;
    }
}
