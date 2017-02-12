<?php
use romkaChev\yii2\swiper\Swiper;
?>
<section id="main-slider" class="carousel">
    <div class="carousel-inner">
        <div class="item active">
            <div class="container">
                <div class="carousel-content">
                    <h1 class="text-uppercase">УНІВЕРСИТЕТ ДЕРЖАВНОЇ ФІСКАЛЬНОЇ СЛУЖБИ УКРАЇНИ
                        ВІННИЦЬКИЙ НАВЧАЛЬНО-НАУКОВИЙ ІНСТИТУТ</h1>
                </div>
            </div>
        </div><!--/.item-->
        <div class="item">
            <div class="container">
                <div class="carousel-content">
                    <h1>ShapeBootstrap.net</h1>
                    <p class="lead">Download free but 100% premium quaility twitter Bootstrap based WordPress and HTML themes <br>from shapebootstrap.net</p>
                </div>
            </div>
        </div><!--/.item-->
    </div><!--/.carousel-inner-->
    <a class="prev" href="#main-slider" data-slide="prev"><i class="icon-angle-left"></i></a>
    <a class="next" href="#main-slider" data-slide="next"><i class="icon-angle-right"></i></a>
</section><!--/#main-slider-->

<section id="students">
    <div class="container">
        <div class="box first">
            <div class="center gap">
                <h2>Студентам</h2>
            </div><!--/.center-->
            <div class="row row-flex">
                <div class="col-sm-8">
                <div class="col-sm-12">
                    <h3>Новини <a href="#" class="pull-right"><i class="glyphicon glyphicon-list"></i></a></h3>
                    <hr>
                </div>
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
                <h3>Документи <a href="#" class="pull-right"><i class="glyphicon glyphicon-list"></i></a></h3>
                <hr>
                    <div class="list-group">
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">List group item heading</h4>
                            <p class="list-group-item-text">Розмір: 123 kb <a href="#" class="glyphicon glyphicon-download-alt pull-right"></a></p>
                        </div>
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">List group item heading</h4>
                            <p class="list-group-item-text">Розмір: 123 kb <a href="#" class="glyphicon glyphicon-download-alt pull-right"></a></p>
                        </div>
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">List group item heading</h4>
                            <p class="list-group-item-text">Розмір: 123 kb <a href="#" class="glyphicon glyphicon-download-alt pull-right"></a></p>
                        </div>
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">List group item heading</h4>
                            <p class="list-group-item-text">Розмір: 123 kb <a href="#" class="glyphicon glyphicon-download-alt pull-right"></a></p>
                        </div>
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">List group item heading</h4>
                            <p class="list-group-item-text">Розмір: 123 kb <a href="#" class="glyphicon glyphicon-download-alt pull-right"></a></p>
                        </div>
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
                <div class="col-sm-12">
                    <h3>Інформація <a href="#" class="pull-right"><i class="glyphicon glyphicon-list"></i></a></h3>
                    <hr>
                </div>
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
                <h3>Документи <a href="#" class="pull-right"><i class="glyphicon glyphicon-list"></i></a></h3>
                <hr>
                    <div class="list-group">
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">List group item heading</h4>
                            <p class="list-group-item-text">Розмір: 123 kb <a href="#" class="glyphicon glyphicon-download-alt pull-right"></a></p>
                        </div>
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">List group item heading</h4>
                            <p class="list-group-item-text">Розмір: 123 kb <a href="#" class="glyphicon glyphicon-download-alt pull-right"></a></p>
                        </div>
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">List group item heading</h4>
                            <p class="list-group-item-text">Розмір: 123 kb <a href="#" class="glyphicon glyphicon-download-alt pull-right"></a></p>
                        </div>
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">List group item heading</h4>
                            <p class="list-group-item-text">Розмір: 123 kb <a href="#" class="glyphicon glyphicon-download-alt pull-right"></a></p>
                        </div>
                        <div class="list-group-item">
                            <h4 class="list-group-item-heading">List group item heading</h4>
                            <p class="list-group-item-text">Розмір: 123 kb <a href="#" class="glyphicon glyphicon-download-alt pull-right"></a></p>
                        </div>
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
                                <strong>Twitter, Inc.</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
                        </div>
                        <div class="col-md-6">
                            <address>
                                <strong>Twitter, Inc.</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
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