<?php
/* @var $this \yii\web\View */
/* @var $content string */
use app\assets\AdminAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Головна',
        'brandUrl'   => Yii::$app->homeUrl,
        'options'    => [
            'class' => 'navbar navbar-inverse',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items'   => [
            ['label' => 'Кабінет', 'url' => ['/site/index']],
            ('<li>' . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form']) .
             Html::submitButton('Вихід (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link']) .
             Html::endForm() . '</li>')
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container-fluid">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink' => [
                'label' => 'Home',
                'url' => ['admin/index'],
            ],
        ]) ?>
        <?= $content ?>
    </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
