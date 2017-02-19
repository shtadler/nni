<?php

/* @var $this \app\components\View */
/* @var $content string */
use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="УНІВЕРСИТЕТ ДЕРЖАВНОЇ ФІСКАЛЬНОЇ СЛУЖБИ УКРАЇНИ ВІННИЦЬКИЙ НАВЧАЛЬНО-НАУКОВИЙ ІНСТИТУТ - учбовий заклад">
    <meta name="Keywords" content="ВННІДФСУ, університет державної фіскальної служби україни вінницький навчально-науковий інститут, налоговий, податковий"> 
    <meta name="author" content="Andrii Shtadler">
    <?= Html::csrfMetaTags() ?>
    <title>Університет державної фіскальної служби України</title>
    <?php $this->head() ?>
</head><!--/head-->

<body data-spy="scroll" data-target="#navbar" data-offset="78">
<?php $this->beginBody() ?>
<header id="header" role="banner">
    <div class="container">
        <div id="navbar" class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <?= Html::img('@web/images/logo.png', ['class' => 'logo-img']) ?>
                    <div class="logo-label">ВННІ ДФСУ</div>
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#main-slider"><i class="icon-home"></i></a></li>
                    <li><a href="#students">Студентам</a></li>
                    <li><a href="#abiturients">Абітурієнтам</a></li>
                    <li><a href="#contact">Контакти</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Загальна інформація 
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php foreach($this->getPages() as $page) : ?>
                                <li>
                                    <?= Html::a(Html::encode($page->title), ['page/view', 'id' => $page->id])?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header><!--/#header-->
<?= $content ?>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                Головне відділення: <a target="_blank" href="https://www.nusta.edu.ua/" title="Головне відділення">https://www.nusta.edu.ua/</a>
            </div>
            <div class="col-sm-6 text-right">
                &copy; <?= date('Y')?> ВВІ ДПСУ. Всі права захищені.
            </div>
        </div>
    </div>
</footer><!--/#footer-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
