<script type="text/javascript">
    $(document).ready(function () {
        $( "#order_type,#order_by").on("change", function() {
            var current_url = document.URL;
            var params = current_url.split('&order');
            sort(params[0]);
        });
    });

    function sort(current_url) {
        var order_type = document.getElementById("order_type").value;
        var order_by = document.getElementById("order_by").value;
        current_url = current_url+"&order="+order_type+"&by="+order_by;
        window.location.href = current_url;
    }
</script>
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
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <?= $this->Html->image('banner_select_asset.png', ['alt' => '', 'class' => 'img-responsive']) ?>
    </div>
</div>

<header class="section-title">
    <h2>รายการทรัพย์สิน<?php echo is_null($page_title) ? '' : ' : ' . $page_title ?></h2>
</header>
<div class="row">
    <div class="col-md-12">
        <?= $this->Form->create('', ['url' => ['controller' => 'assets', 'action' => 'lists'], 'class' => 'form-inline']) ?>
        <div class="form-group">
            <label for="">เรียงโดย </label>
            <select class="form-control" name="order_type" id="order_type">
                <option value="P" <?php echo $order_type=='P'?'selected="selected"':''?> >ราคา</option>
                <option value="D" <?php echo $order_type=='D'?'selected="selected"':''?> >วันที่ประกาศ</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">จัดลำดับโดย </label>
            <select class="form-control" name="order_by" id="order_by">
                <option value="DESC" <?php echo $order_by=='DESC'?'selected="selected"':''?> >เรียงจากมากไปน้อย</option>
                <option value="ASC" <?php echo $order_by=='ASC'?'selected="selected"':''?> >เรียงจากน้อยไปมาก</option>
            </select>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
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
                <?php $link = ['controller'=>'assets','action'=>'view',$a->id,'title'=>$a->name]?>
                <?= $this->Html->link($this->Html->image($default_img, ['class' => 'img-responsive asset-image-list', 'alt' => '']),$link, ['escape' => false]) ?>
            </div>
            <div class="col-md-9 property-list-list-info">
                <div class="col-md-12">
                    <?= $this->Html->link('<h4>' . h($a->name) . '</h4>',$link, ['escape' => false]) ?>
                    <p class="asset-code">รหัสทรัพย์สิน: <?= h($a->code) ?></p>
                    <p><?= h($a->address->amphur == '' ? '' : $a->address->amphur . '/') ?><?= h($a->address->province->province_name) ?></p>
                </div>
                <div class="col-md-12">
                    <?php if ($a->isspecial_marketprice === 'Y' || $a->isspecial_appraised === 'Y') { ?>
                        <span class="recent-properties-address f-color-green" style="text-decoration: line-through;margin-right: 10px;"><?= $this->Number->currency($a->price_amounnt_lower, 'THB', ['precision' => 1]) ?></span> 
                        <span class="recent-properties-address f-color-red"><?= $this->Number->currency($a->price_amounnt, 'THB', ['precision' => 1]) ?></span>
                    <?php } else { ?>
                        <span class="recent-properties-address f-color-red"><?= $this->Number->currency($a->price_amounnt, 'THB', ['precision' => 1]) ?></span>
                    <?php } ?>

                    <?php
                    $name = isset($a->user->firstname) ? $a->user->firstname . ' ' . $a->user->lastname : "";
                    ?>
                    <p><strong>สนใจติดต่อ:</strong> <?= h($name) ?>  <strong style="padding-left: 20px;">โทร</strong> <?= h($a->user->phone) ?></p>
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