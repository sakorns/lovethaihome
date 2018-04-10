<script>
    var amphurArr = <?= $amphurs ?>;
    function amphurs_filter(province_id) {
        var amphurOption = document.getElementById("amphur_id");
        amphurOption.innerHTML = "";

        amphurOption = document.getElementById("amphur_id");
        var option = document.createElement("option");
        option.value = '';
        option.text = 'เขต/อำเภอ';
        amphurOption.appendChild(option);

        for (var i = 0; i < amphurArr.length; i++) {
            if (amphurArr[i].province_id === province_id) {
                var option = document.createElement("option");
                option.value = amphurArr[i].id;
                option.text = amphurArr[i].amphur_name;
                amphurOption.appendChild(option);
            }
        }
    }

    function reset_combo(amphur_id) {
        var province_id = document.getElementById('province_id').value;
        if(province_id !== null && province_id !==''){
            amphurs_filter(province_id);
        }
        if(amphur_id !==''){
            document.getElementById('amphur_id').value = amphur_id;
        }
    }
</script>
<header class="section-title">
    <h2>ค้นหาสินทรัพย์</h2>
</header>
<div class="row">
    <?= $this->Form->create('', ['url' => ['controller' => 'assets', 'action' => 'formsearch'], 'class' => 'form-horizontal m-t-sm']) ?>
    <div class="col-md-10 col-md-offset-1">
        <div class="form-group">
            <div class="col-xs-4">
                <?= $this->Form->input('code', ['class' => 'form-control', 'label' => false, 'placeholder' => 'รหัสทรัพย์สิน']) ?>
            </div>
            <div class="col-md-4">
                <?= $this->Form->input('asset_type_id', ['class' => 'form-control', 'label' => false, 'options' => $assetTypeList, 'empty' => 'หมวดหมู่สินทรัพย์']) ?>
            </div>
            <div class="col-md-4">

            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-4">
                <?= $this->Form->input('province_id', ['id'=>'province_id','class' => 'form-control', 'label' => false, 'options' => $provinces, 'empty' => 'จังหวัด', 'onchange' => 'amphurs_filter(this.value)']) ?>
            </div>
            <div class="col-xs-4">
                <?= $this->Form->input('amphur_id', ['id'=>'amphur_id','class' => 'form-control', 'label' => false, 'options' => '', 'empty' => 'เขต/อำเภอ']) ?>
            </div>
            <div class="col-xs-4">
                <?= $this->Form->input('user_id', ['class' => 'form-control', 'label' => false, 'options' => $users, 'empty' => 'ตันแทนขาย']) ?>
            </div>
        </div>
        <label class="f-color-black">ช่วงราคา</label>
        <div class="form-group">
            <div class="col-xs-4">
                <?= $this->Form->input('price_start', ['class' => 'form-control', 'label' => false, 'options' => $price_start, 'empty' => true]) ?>
            </div>
            <div class="col-xs-4">
                <?= $this->Form->input('price_end', ['class' => 'form-control', 'label' => false, 'options' => $price_end, 'empty' => true]) ?>
            </div>
            <div class="col-xs-4">

            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-4">
                <?= $this->Form->button('ค้นหา', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>

<header class="section-title" onload="reset_combo()">
    <h2>ผลการค้นหา</h2>
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
        <div class="col-md-12 text-center">
            <h3 class="f-color-gray">- ขออภัยค่ะ ไม่พบรายการ กรุณาลองใหม่อีกครั้ง -</h3>
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

<script>
    var amphur_id = '<?=$amphur_id?>';
    $(document).ready(function () {
        reset_combo(amphur_id);
    });

   
</script>