<?php
/**
 * @var $this \yii\web\View
 * @var $studentItems Article[]|array
 * @var $abiturItems Article[]|array
 * @var $abiturFiles \app\models\Document[]
 * @var $studentFiles \app\models\Document[]
 * @var $submenu \app\models\Page[]
 * @var $firstAddress string
 * @var $secondAddress string
 * @var $mainSlides \app\models\MainSlider[]
 */
use app\models\Article;
use romkaChev\yii2\swiper\Swiper;
use app\assets\SiteIndexAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;

SiteIndexAsset::register($this);
?>
<section id="main-slider" class="carousel">
    <div class="carousel-inner">
        <?php foreach($mainSlides as $slide) : ?>
            <div class="item <?= $mainSlides[0]->id == $slide->id? 'active':''?>">
                <div class="container">
                    <div class="carousel-content">
                        <h1 class="text-uppercase"><?= $slide->title?></h1>
                        <p class="lead"><?= $slide->description?></p>
                    </div>
                </div>
            </div><!--/.item-->
        <?php endforeach ?>
    </div><!--/.carousel-inner-->
    <a class="prev" href="#main-slider" data-slide="prev"><i class="icon-angle-left"></i></a>
    <a class="next" href="#main-slider" data-slide="next"><i class="icon-angle-right"></i></a>
</section><!--/#main-slider-->

<section>
    <div class="container">
        <div id="students" class="box first">
            <?php if($submenu) : ?>
                <div class="row submenu">
                    <?php foreach ($submenu as $item) {
                        echo Html::a(Html::encode($item->title), ['page/view', 'id' => $item->id], [
                            'class' => 'submenu-item'
                        ]);
                    } ?>
                </div>
            <?php endif; ?>
            <div class="center gap">
                <h2>Студентам</h2>
            </div><!--/.center-->
            <div class="row">
                <div class="col-sm-8">
                    <h3>Новини
                        <a href="<?= Url::to([
                            'site/all-articles',
                            'for' => Article::ABITUR
                        ])?>" class="pull-right">
                            <i class="glyphicon glyphicon-list"></i>
                        </a>
                    </h3>
                    <hr>
                <?= Swiper::widget( [
                    'items'         => $studentItems,
                    'behaviours'    => [
                        Swiper::BEHAVIOUR_NEXT_BUTTON,
                        Swiper::BEHAVIOUR_PREV_BUTTON
                    ],
                    'pluginOptions' => [
                        Swiper::OPTION_SLIDES_PER_VIEW      => 2,
                        Swiper::OPTION_SPACE_BETWEEN        => 15,
                        Swiper::OPTION_SLIDES_PER_COLUMN => 2
                    ]
                ] );
                ?>
                </div>
                <div class="col-sm-4 row">
                <h3>
                    Документи
                    <a href="<?= Url::to([
                        'site/all-documents',
                        'for' => Article::STUDENT
                    ])?>" class="pull-right">
                        <i class="glyphicon glyphicon-list"></i>
                    </a>
                </h3>
                <hr>
                    <div class="list-group">
                        <?php foreach($studentFiles as $file) : ?>
                            <div class="list-group-item">
                                <h4 class="list-group-item-heading"><?= Html::encode($file->name)?></h4>
                                <p class="list-group-item-text">
                                    Розмір: <?= Yii::$app->formatter->asShortSize($file->size, 1)?>
                                    <?= Html::a('', Yii::getAlias("@web/uploads/{$file->hash_name}.{$file->extension}"), [
                                        'class' => 'glyphicon glyphicon-download-alt pull-right',
                                        'download' => Html::encode($file->name),
                                    ])?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div><!--/.row-->
        </div><!--/.box-->
    </div><!--/.container-->

</section><!--/#services-->
<section id="abiturients">
    <div class="container">
        <div class="box">
            <div class="center gap">
                <h2>Абітурієнтам</h2>
            </div><!--/.center-->
            <div class="row row-flex">
                <div class="col-sm-8">
                    <h3>Інформація
                        <a href="<?= Url::to([
                            'site/all-articles',
                            'for' => Article::ABITUR
                        ])?>" class="pull-right">
                            <i class="glyphicon glyphicon-list"></i>
                        </a>
                    </h3>
                    <hr>
                <?= Swiper::widget( [
                    'items'         => $abiturItems,
                    'behaviours'    => [
                        Swiper::BEHAVIOUR_NEXT_BUTTON,
                        Swiper::BEHAVIOUR_PREV_BUTTON
                    ],
                    'pluginOptions' => [
                        Swiper::OPTION_SLIDES_PER_VIEW      => 2,
                        Swiper::OPTION_SPACE_BETWEEN        => 15,
                        Swiper::OPTION_SLIDES_PER_COLUMN => 2
                    ]
                ] );
                ?>
                </div>
                <div class="col-sm-4 row">
                <h3>Документи
                    <a href="<?= Url::to([
                        'site/all-documents',
                        'for' => Article::ABITUR
                    ])?>" class="pull-right">
                        <i class="glyphicon glyphicon-list"></i>
                    </a>
                </h3>
                <hr>
                    <div class="list-group">
                        <?php foreach($abiturFiles as $file) : ?>
                            <div class="list-group-item">
                                <h4 class="list-group-item-heading"><?= Html::encode($file->name)?></h4>
                                <p class="list-group-item-text">
                                    Розмір: <?= Yii::$app->formatter->asShortSize($file->size, 1)?>
                                    <?= Html::a('', Yii::getAlias("@web/uploads/{$file->hash_name}.{$file->extension}"), [
                                        'class' => 'glyphicon glyphicon-download-alt pull-right',
                                        'download' => Html::encode($file->name),
                                    ])?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div><!--/.row-->
        </div><!--/.box-->
    </div><!--/.container-->
</section><!--/#portfolio-->

<section id="contact">
    <div class="container">
        <div class="box last">
            <div class="row">
                <div class="col-sm-6 gmap-holder">
                    <iframe src="https://www.google.com/maps/d/embed?mid=1JiBtcFWDQQieItPlUwuzQCusFkk" width="100%" height="100%"></iframe>
                </div><!--/.col-sm-6-->
                <div class="col-sm-6">
                    <h1>Наша адреса</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <?= $firstAddress ?>
                            </address>
                        </div>
                        <div class="col-md-6">
                            <address>
                                <?= $secondAddress ?>
                            </address>
                        </div>
                    </div>
                    <h1>Connect with us</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="social">
                                <li><a href="#"><i class="icon-facebook icon-social"></i> Facebook</a></li>
                                <li><a href="#"><i class="icon-google-plus icon-social"></i> Google Plus</a></li>
                                <li><a href="#"><i class="icon-pinterest icon-social"></i> Pinterest</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="social">
                                <li><a href="#"><i class="icon-linkedin icon-social"></i> Linkedin</a></li>
                                <li><a href="#"><i class="icon-twitter icon-social"></i> Twitter</a></li>
                                <li><a href="#"><i class="icon-youtube icon-social"></i> Youtube</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!--/.col-sm-6-->
            </div><!--/.row-->
        </div><!--/.box-->
    </div><!--/.container-->
</section><!--/#contact-->