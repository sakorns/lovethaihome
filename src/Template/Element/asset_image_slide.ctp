<?= $this->Html->css('asset_slide/style.css') ?>
<style>
    .demo { margin: 30px auto; max-width:960px;}
    .demo > li {float:left;}
    .demo > li img { height:120px; margin:10px; cursor:pointer;}
    .demo .img_slide{}
</style>
<?php
$assetImages = $asset->asset_images;
?>
<?php
foreach ($assetImages as $a):
    if($a->isdefault ==='Y'){
       echo $this->Html->image('upload/' . $a->image->name, ['class' => 'img-responsive']);
       break;
    }
endforeach;
?>

<ul class="clearfix demo">

    <?php foreach ($assetImages as $a): ?>
        <?php $img = str_replace('"', "'", $this->Html->image('upload/' . $a->image->name)) ?>

        <li class="img_slide"> 
            <?= $this->Html->image('upload/' . $a->image->name, ['class' => '']) ?>
        </li>
    <?php endforeach; ?>
</ul>
<?= $this->Html->script('asset_slide/jquery.picEyes.js') ?>
<script>
    $(function() {
        $('.img_slide').picEyes();
    });
</script>