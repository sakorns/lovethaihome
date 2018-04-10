
<div class="row">
    <div class="col-md-10 col-md-offset-1 text-center"> 
        <?= $this->Html->image('head-top.png', ['alt' => '']) ?>
        <h2 class="pading-10-0">รายชื่อตัวแทนขาย</h2>
    </div>
</div>
<div id="blog_page_information" class="blog_page_information">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php foreach ($users as $a): ?>
                    <?php $link = '/assets/lists?seller=' . $a->id; ?>
                    <div class="col-md-4 blog-thumbnail">
                        <div class="blogimage text-center">
                            <?php $image_name = isset($a->useimages[0]->image->name) ? 'upload/' . $a->useimages[0]->image->name : 'blog_thumb_1.jpg'; ?>
                            <?= $this->Html->link($this->Html->image($image_name, ['class' => 'img-responsive seller-image', 'alt' => '']), $link, ['escape' => false]) ?>
                        </div>
                        <div class="blog_info">
                            <div class="blogimagedescription">
                                <h3 class="f-color-white"><?= $this->Html->link(($a->firstname . '  ' . $a->lastname), $link, ['escape' => false]) ?></h3>
                                <p class=""><i class="fa fa-phone"></i> โทร: <?= h($a->phone) ?></p>
                                <p class=""><i class="fa fa-mobile"></i> Line ID: <?= h($a->lineid) ?></p>
                                <p class=""><i class="fa fa-envelope"> <?= h($a->email) ?></i></p>
                            </div>
                        </div>									
                    </div>	
                <?php endforeach; ?>
            </div>    
        </div> 
        <div class="col-md-12">
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                </ul>
                <p><?= $this->Paginator->counter() ?></p>
            </div>
        </div>
    </div>
</div>