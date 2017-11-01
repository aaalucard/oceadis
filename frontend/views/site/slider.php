<?php 
use common\models\Slider;

$sliders = Slider::find()->where('active = 1')->one();
?>
<div id="home" class="page-item">
    <div id="rev_slider_467_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classic-carousel26" data-source="gallery" style="margin:0px auto;background-color:#ffffff;padding:0px;margin-top:0px;margin-bottom:0px;">
    <!-- START REVOLUTION SLIDER 5.4.1 fullwidth mode -->
    <div id="rev_slider_467_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
      <ul>  <!-- SLIDE  -->
        <?php foreach ($sliders->sliderItems as $slider) { ?>
        <li data-index="rs-100<?= $slider->id ?>" data-transition="<?= $slider->transition ?>" data-slotamount="<?= $slider->slotamount ?>" data-hideafterloop="<?= $slider->hideafterloop ?>" data-hideslideonmobile="<?= $slider->hideslideonmobile ?>"  data-easein="<?= $slider->easein ?>" data-easeout="<?= $slider->easeout ?>" data-masterspeed="<?= $slider->masterspeed ?>"  data-thumb="slider/<?=$slider->id_slider.'/'. $slider->thumb ?>"  data-rotate="<?= $slider->rotate ?>"  data-fstransition="<?= $slider->fstransition ?>" data-fsmasterspeed="<?= $slider->fsmasterspeed ?>" data-fsslotamount="<?= $slider->fsslotamount ?>" data-saveperformance="<?= $slider->saveperformance ?>"  data-title="<?= $slider->tittle ?>" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="<?= $slider->description ?>">
          <!-- MAIN IMAGE -->
          <img src="slider/<?= $slider->id_slider.'/'.$slider->image ?>"  alt=""  data-bgposition="<?= $slider->bgposition ?>" data-bgfit="<?= $slider->bgfit ?>" data-bgrepeat="<?= $slider->bgrepeat ?>" data-bgparallax="<?= $slider->paralax ?>" class="rev-slidebg" data-no-retina>
          <!-- LAYERS -->
          <div class="tp-caption tp-shape tp-shapewrapper   tp-resizeme" 
           id="slide-1687-layer-3" 
           data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
           data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                data-width="full"
          data-height="full"
          data-whitespace="normal"

          data-type="shape" 
          data-basealign="slide" 
          data-responsive_offset="on" 

          data-frames='[{"from":"opacity:0;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power3.easeInOut"}]'
          data-textAlign="['left','left','left','left']"
          data-paddingtop="[0,0,0,0]"
          data-paddingright="[0,0,0,0]"
          data-paddingbottom="[0,0,0,0]"
          data-paddingleft="[0,0,0,0]"

          style="z-index: 5;text-transform:left;background-color:rgba(0, 0, 0, 0.35);border-color:rgba(0, 0, 0, 1.00);border-width:0px;"> </div>
          <!-- LAYER NR. 2 -->
          <div class="tp-caption Newspaper-Title tp-resizeme" 
             id="slide-1687-layer-1" 
             data-x="['left','left','left','left']" data-hoffset="['50','50','50','30']" 
             data-y="['top','top','top','top']" data-voffset="['165','135','105','130']" 
                  data-fontsize="['50','50','50','30']"
            data-lineheight="['55','55','55','35']"
            data-width="['600','600','600','420']"
            data-height="none"
            data-whitespace="normal"
       
            data-type="text" 
            data-responsive_offset="on" 

            data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
            data-textAlign="['left','left','left','left']"
            data-paddingtop="[0,0,0,0]"
            data-paddingright="[0,0,0,0]"
            data-paddingbottom="[10,10,10,10]"
            data-paddingleft="[0,0,0,0]"

            style="z-index: 6; min-width: 600px; max-width: 600px; white-space: normal;text-transform:left;"><?= $slider->layer2_text ?> </div>
            <?php if($slider->layer3_text!=null){ ?>
          <!-- LAYER NR. 3 -->
          <div class="tp-caption Newspaper-Subtitle   tp-resizeme" 
             id="slide-1687-layer-2" 
             data-x="['left','left','left','left']" data-hoffset="['50','50','50','30']" 
             data-y="['top','top','top','top']" data-voffset="['140','110','80','100']" 
                  data-width="none"
            data-height="none"
            data-whitespace="nowrap"
       
            data-type="text" 
            data-responsive_offset="on" 

            data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
            data-textAlign="['left','left','left','left']"
            data-paddingtop="[0,0,0,0]"
            data-paddingright="[0,0,0,0]"
            data-paddingbottom="[0,0,0,0]"
            data-paddingleft="[0,0,0,0]"

            style="z-index: 7; white-space: nowrap;text-transform:left;"><?= $slider->layer3_text ?> </div>
          <?php } if($slider->layer4_text!=null){ ?>
          <!-- LAYER NR. 4 -->
          <div class="tp-caption Newspaper-Button rev-btn " 
             id="slide-1687-layer-5" 
             data-x="['left','left','left','left']" data-hoffset="['53','53','53','30']" 
             data-y="['top','top','top','top']" data-voffset="['361','331','301','245']" 
                  data-width="none"
            data-height="none"
            data-whitespace="nowrap"
       
            data-type="button" 
            data-responsive_offset="on" 
            data-responsive="off"
            data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 1.00);bg:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);bw:1px 1px 1px 1px;"}]'
            data-textAlign="['left','left','left','left']"
            data-paddingtop="[12,12,12,12]"
            data-paddingright="[35,35,35,35]"
            data-paddingbottom="[12,12,12,12]"
            data-paddingleft="[35,35,35,35]"

            style="z-index: 8; white-space: nowrap;text-transform:left;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;"><?= $slider->layer4_text ?> 
          </div>
          <?php } ?>
        </li>
        <?php } ?>
      </ul>
      <div class="tp-bannertimer" style="height: 7px; background-color: rgba(255, 255, 255, 0.25);"></div>  </div>
    </div><!-- END REVOLUTION SLIDER -->
    <script type="text/javascript">
      var tpj=jQuery;
      
      var revapi467;
      tpj(document).ready(function() {
        if(tpj("#rev_slider_467_1").revolution == undefined){
          revslider_showDoubleJqueryError("#rev_slider_467_1");
        }else{
          revapi467 = tpj("#rev_slider_467_1").show().revolution({
            sliderType:"carousel",
            jsFileLocation:"revolution/js/",
            sliderLayout:"fullwidth",
            dottedOverlay:"none",
            delay:9000,
            navigation: {
              keyboardNavigation:"off",
              keyboard_direction: "horizontal",
              mouseScrollNavigation:"off",
              mouseScrollReverse:"default",
              onHoverStop:"off",
              arrows: {
                style:"erinyen",
                enable:true,
                hide_onmobile:true,
                hide_under:600,
                hide_onleave:true,
                hide_delay:200,
                hide_delay_mobile:1200,
                tmp:'<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div>    <div class="tp-arr-img-over"></div> <span class="tp-arr-titleholder">{{title}}</span> </div>',
                left: {
                  h_align:"left",
                  v_align:"center",
                  h_offset:30,
                  v_offset:0
                },
                right: {
                  h_align:"right",
                  v_align:"center",
                  h_offset:30,
                  v_offset:0
                }
              }
              ,
              thumbnails: {
                style:"gyges",
                enable:true,
                width:60,
                height:60,
                min_width:60,
                wrapper_padding:0,
                wrapper_color:"transparent",
                wrapper_opacity:"1",
                tmp:'<span class="tp-thumb-img-wrap">  <span class="tp-thumb-image"></span></span>',
                visibleAmount:5,
                hide_onmobile:true,
                hide_under:800,
                hide_onleave:false,
                direction:"horizontal",
                span:false,
                position:"inner",
                space:5,
                h_align:"center",
                v_align:"bottom",
                h_offset:0,
                v_offset:20
              }
            },
            carousel: {
              horizontal_align: "center",
              vertical_align: "center",
              fadeout: "off",
              maxVisibleItems: 3,
              infinity: "on",
              space: 0,
              stretch: "off"
            },
            viewPort: {
              enable:true,
              outof:"pause",
              visible_area:"80%",
              presize:false
            },
            responsiveLevels:[1240,1024,778,480],
            visibilityLevels:[1240,1024,778,480],
            gridwidth:[1240,1024,778,480],
            gridheight:[600,600,500,400],
            lazyType:"none",
            parallax: {
              type:"mouse",
              origo:"slidercenter",
              speed:2000,
              levels:[2,3,4,5,6,7,12,16,10,50,46,47,48,49,50,55],
              type:"mouse",
            },
            shadow:5,
            spinner:"off",
            stopLoop:"off",
            stopAfterLoops:-1,
            stopAtSlide:-1,
            shuffle:"off",
            autoHeight:"off",
            hideThumbsOnMobile:"on",
            hideSliderAtLimit:0,
            hideCaptionAtLimit:0,
            hideAllCaptionAtLilmit:0,
            debugMode:false,
            fallbacks: {
              simplifyAll:"off",
              nextSlideOnWindowFocus:"off",
              disableFocusListener:false,
            }
          });
        }
      }); /*ready*/
    </script>
</div>