<div class="row">
    <div class="col-md-12 text-center"> 
        <?= $this->Html->image('head-top.png', ['alt' => '']) ?>
        <h2 class="pading-20-0"><?= h($article->name) ?></h2>
         
    </div>
    <div class="col-md-12 padding-top-20">
        <p><?= nl2br($article->text) ?></p>
    </div>
</div>