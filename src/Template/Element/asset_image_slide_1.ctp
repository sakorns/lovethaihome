<?= $this->Html->css('lightslider.css') ?>

<style>
    ul{
        list-style: none outside none;
        padding-left: 0;
        margin: 0;
    }
    .demo .item{
        margin-bottom: 60px;
    }
    .content-slider li{
        background-color: #ed3020;
        text-align: center;
        color: #FFF;
    }
   
    .content-slider h3 {
        margin: 0;
        padding: 70px 0;
    }
</style>

<?= $this->Html->script('lightslider.js') ?>
<script>
    $(document).ready(function() {
        $("#content-slider").lightSlider({
            loop: true,
            keyPress: true
        });
        $('#image-gallery').lightSlider({
            gallery: true,
            item: 1,
            thumbItem: 9,
            slideMargin: 0,
            speed: 500,
            auto: true,
            loop: true,
            onSliderLoad: function() {
                $('#image-gallery').removeClass('cS-hidden');
            }
        });
    });
</script>

<?php
$assetImages = $asset->asset_images;
?>
<div class="item">            
    <div class="clearfix">
        <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
            <?php foreach ($assetImages as $a): ?>
                <?php $img = str_replace('"',"'",$this->Html->image('upload/'. $a->image->name))?>
           
                <li data-thumb="<?=$img?>"> 
                    <?= $this->Html->image('upload/' . $a->image->name, ['class' => '','width'=>'100%' ]) ?>
                </li>
            <?php endforeach; ?>

        </ul>
    </div>
</div>