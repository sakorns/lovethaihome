
<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <?php
            $objArr = ['class' => '', 'target' => '', 'escape' => false];
            ?>
            <li><?= $this->Html->link('หน้าหลัก', HOME_URL, $objArr); ?></li>
            <li><?= $this->Html->link('เลือกโซน', '/assets', $objArr); ?></li>
            <li class="active">รายการทรัพย์สิน</li>
        </ol>
    </div>
</div>
<header class="section-title">
    <h2>รายการทรัพย์สินทั้งหมด<?php echo is_null($page_title) ? '' : $page_title ?></h2>
</header>

<div class="row property-list-area">
    <?php foreach ($assets as $a): ?>
        <div data-target="Residential" class="property-list-list">
           <div class="col-md-3 property-list-list-image">
                <?php $default_img = 'recent-property-1.png'; ?>
                <?php foreach ($a['asset_images'] as $img): ?>
                    <?php
                    if ($img['isdefault'] === 'Y') {
                        $default_img = 'upload/' . $img['image']['name'];
                        break;
                    }
                    ?>
                <?php endforeach; ?>
                <?= $this->Html->link($this->Html->image($default_img, ['class' => 'img-responsive asset-image-list', 'alt' => '']), '/assets/view/' . $a->id, ['escape' => false]) ?>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9 property-list-list-info">
                <div class="col-md-12">
                    <?= $this->Html->link('<h4>' . h($a->name) . '</h4>', '/assets/view/' . $a->id, ['escape' => false]) ?>
                    <p class="asset-code">รหัสทรัพย์สิน: <?= h($a->code) ?></p>
                    <p><?= h($a->address->amphur == '' ? '' : $a->address->amphur . '/') ?><?= h($a->address->province->province_name) ?></p>
                </div>
                <div class="col-md-12">
                    <span class="recent-properties-address"><?= $this->Number->currency($a->price_amounnt, 'THB', ['precision' => 1]) ?></span>
                    <?php
                    $name = isset($a->user->firstname) ? $a->user->firstname . ' ' . $a->user->lastname : "";
                    ?>
                    <p>สนใจติดต่อ: <?= h($name) ?></p>
                </div>

            </div>							
        </div>
    <?php endforeach; ?>
    <?php if (sizeof($assets) == 0) { ?>
        <div class="col-md-6 col-md-offset-3 text-center">
            <h3 class="f-color-gray">-ขออภัยค่ะ ไม่พบรายการ กรุณาลองใหม่อีกครั้ง -</h3>
        </div>

    <?php } ?>
</div>
<div class="row load_more text-center">
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>