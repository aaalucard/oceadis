<?php
use common\models\PageSections;
?>
<?= $this->render('slider') ?>
<div id="empresa" data-spy="scroll" data-target="#list-example" data-offset="0" class="col-12 text-light p-1">
<?php
    $aux = 0;
    $pagesections = PageSections::find()->where('active = 1')->all();
    foreach ($pagesections as $pagesection) {
        
?>
    <div id="<?= $pagesection->name_section ?>" class="row p-4 border border-ligth rounded" align="center" style="background:rgba(34, 42, 53, 0.5);">
      <?php if($aux == 0) { ?>
      <div class="col-6" style="background: rgba(0,0,0,0.4);">
          <h1 class="tex-center"><?= $pagesection->name ?></h1>
          <hr class="w-100 bg-light">
          <span> <?= $pagesection->code_section ?></span>
      </div>
      <div class="col-6">
        <div id="slider<?= $pagesection->name_section ?>" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <?php foreach ($pagesection->pageSectionImages as $image) {
            ?>
                <div class="carousel-item active">
                  <img class="d-block w-100" src="<?= Yii::getAlias('@web').'/pagesection/'.$image->hash.'/'.$image->dir_name ?>" alt="First slide">
                </div>
            <?php
            }
           ?>
          </div>
        </div>
      </div>
      <?php
      $aux = 1;
      } else { ?>
      <div class="col-6">
        <div id="slider<?= $pagesection->name_section ?>" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="..." alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="..." alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="..." alt="Third slide">
            </div>
          </div>
        </div>
      </div>
      <div class="col-6" style="background: rgba(0,0,0,0.4);">
          <h1 class="tex-center"><?= $pagesection->name ?></h1>
          <hr class="w-100 bg-light">
          <span> <?= $pagesection->code_section ?></span>
      </div>
      <?php
      $aux = 0;
      } ?>
    </div>
<?php
    }
?>
</div>