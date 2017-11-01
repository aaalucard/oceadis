<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\PageSections;
use common\models\Department;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script src='<?php echo Yii::getAlias('@web')?>/resources/js/jquery.js'></script>
    <script src='<?php echo Yii::getAlias('@web')?>/resources/js/popper.min.js'></script>
    <script src='<?php echo Yii::getAlias('@web')?>/resources/bootstrap-4-2/js/bootstrap.min.js'></script>
    <script src='<?php echo Yii::getAlias('@web')?>/resources/fullcalendar-3.5.1/lib/moment.min.js'></script>
    <script src='<?php echo Yii::getAlias('@web')?>/resources/fullcalendar-3.5.1/fullcalendar.js'></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/3e64dc2191.css">
     <link rel='stylesheet' href='<?php echo Yii::getAlias('@web')?>/resources/fullcalendar-3.5.1/fullcalendar.css' />
    <link href="<?php echo Yii::getAlias('@web')?>/resources/bootstrap-4-2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo Yii::getAlias('@web')?>/resources/css/jquery-ui-1.10.1.css" rel="stylesheet">
     <!-- Carga de Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::getAlias('@web')?>/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::getAlias('@web')?>/revolution/fonts/font-awesome/css/font-awesome.css">
    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::getAlias('@web')?>/revolution/css/settings.css">
    <!-- REVOLUTION LAYERS STYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::getAlias('@web')?>/revolution/css/layers.css">
    <!-- REVOLUTION NAVIGATION STYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::getAlias('@web')?>/revolution/css/navigation.css">
    <style type="text/css">
        #preloader {
            position: fixed;
            top:0;
            left:0;
            right:0;
            width:100%;
            height:100%;
            bottom:0;
            background-color:#fff; /* change if the mask should have another color then white */
            z-index:9999999999; /* makes sure it stays on top */
        }

        #status {
            width:130px;
            height:300px;
            position:absolute;
            left:50%; /* centers the loading animation horizontally one the screen */
            top:50%; /* centers the loading animation vertically one the screen */
            background-image:url(<?= Yii::getAlias('@web')?>/images/preload.gif); /* path to your loading animation */
            background-repeat:no-repeat;
            background-position:center;
            margin:-150px 0 0 -65px; /* is width and height divided by two */
            text-align:center;
        }
        #status img{
            position:absolute;
            top:40px;
            left:0px;
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>
<div id="preloader">
  <div id="status"><img src="<?= Yii::getAlias('@web').'/images/casco.jpg' ?>" alt="" width="160px"></div>
</div>
<nav id="mainMenu" class="navbar navbar-expand-lg navbar-dark" style="background: rgba(0,0,0,0.5)">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link p-2 active" href="#">Inicio <span class="sr-only">(current)</span></a>
        <?php
            $pagesections = PageSections::find()->where('active = 1')->all();
            foreach ($pagesections as $pagesection) {
                
        ?>
            <a class="nav-item nav-link p-2" href="#<?= $pagesection->name_section ?>"><?= $pagesection->name ?></a>
        <?php
            }
        ?>
        <a class="nav-item nav-link p-2 active" href="<?= Url::to(['site/documents']); ?>">Manuales <span class="sr-only">(current)</span></a>
      </div>
</div>
</nav>
<div class="container" >
    <?= $content ?>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
<script type="text/javascript" src="<?php echo Yii::getAlias('@web')?>/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::getAlias('@web')?>/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::getAlias('@web')?>/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::getAlias('@web')?>/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::getAlias('@web')?>/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::getAlias('@web')?>/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::getAlias('@web')?>/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::getAlias('@web')?>/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::getAlias('@web')?>/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::getAlias('@web')?>/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::getAlias('@web')?>/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript">
  $(window).on('load',function() { // makes sure the whole site is loaded
      $('#status').fadeOut(); // will first fade out the loading animation
      $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
      $('body').delay(350).css({'overflow':'visible'});
  })
</script>
</body>
</html>
<?php $this->endPage() ?>
