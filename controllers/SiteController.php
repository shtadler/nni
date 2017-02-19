<?php

namespace app\controllers;

use app\models\Article;
use app\models\Document;
use app\models\Page;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'index';

        $abiturItems = $this->createSwiperSlides(Article::find()->where(['for_abitur' => 1])->all());
        $studentItems = $this->createSwiperSlides(Article::find()->where(['for_students' => 1])->all());
        $studentFiles = Document::find()
            ->joinWith('article')
            ->where(['entity_name' => Document::ARTICLE])
            ->andWhere(['article.for_students' => 1])
            ->limit(5)
            ->all();
        $abiturFiles = Document::find()
            ->joinWith('article')
            ->where(['entity_name' => Document::ARTICLE])
            ->andWhere(['article.for_abitur' => 1])
            ->limit(5)
            ->all();
        $submenu = Page::find()->where(['to_submenu' => 1])->all();
        return $this->render('index', [
            'studentItems' => $studentItems,
            'abiturItems' => $abiturItems,
            'studentFiles' => $studentFiles,
            'abiturFiles' => $abiturFiles,
            'submenu' => $submenu,
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * @param $articles
     * @return array
     */
    private function createSwiperSlides($articles) {
        $slides = [];
        if($articles) {
            foreach ($articles  as $article) {
                $slides[] = $this->view->render('/site/_swiperBody', ['article' => $article]);
            }

            return $slides;
        }

        return $slides;
    }
}
