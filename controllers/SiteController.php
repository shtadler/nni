<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
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
        $studentItems = [
                        '<div class="student-block">
                    <div class="center">
                        <i class="icon-apple icon-md icon-color1"></i>
                        <h4>iOS development</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>',
                        '<div class="student-block">
                    <div class="center">
                        <i class="icon-apple icon-md icon-color1"></i>
                        <h4>iOS development</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>', '<div class="student-block">
                    <div class="center">
                        <i class="icon-apple icon-md icon-color1"></i>
                        <h4>iOS development</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>',
                        '<div class="student-block">
                    <div class="center">
                        <i class="icon-apple icon-md icon-color1"></i>
                        <h4>iOS development</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>', '<div class="student-block">
                    <div class="center">
                        <i class="icon-apple icon-md icon-color1"></i>
                        <h4>iOS development</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>',
                        '<div class="student-block">
                    <div class="center">
                        <i class="icon-apple icon-md icon-color1"></i>
                        <h4>iOS development</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>', '<div class="student-block">
                    <div class="center">
                        <i class="icon-apple icon-md icon-color1"></i>
                        <h4>iOS development</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>',
                        '<div class="student-block">
                    <div class="center">
                        <i class="icon-apple icon-md icon-color1"></i>
                        <h4>iOS development</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>', '<div class="student-block">
                    <div class="center">
                        <i class="icon-apple icon-md icon-color1"></i>
                        <h4>iOS development</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>',
                        '<div class="student-block">
                    <div class="center">
                        <i class="icon-apple icon-md icon-color1"></i>
                        <h4>iOS development</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>', '<div class="student-block">
                    <div class="center">
                        <i class="icon-apple icon-md icon-color1"></i>
                        <h4>iOS development</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>',
                        '<div class="student-block">
                    <div class="center">
                        <i class="icon-apple icon-md icon-color1"></i>
                        <h4>iOS development</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>', '<div class="student-block">
                    <div class="center">
                        <i class="icon-apple icon-md icon-color1"></i>
                        <h4>iOS development</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>',
                        '<div class="student-block">
                    <div class="center">
                        <i class="icon-apple icon-md icon-color1"></i>
                        <h4>iOS development</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                    </div>
                </div>',
                    ];
        return $this->render('index', ['studentItems' => $studentItems]);
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
}
