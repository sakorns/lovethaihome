<script>
    function submitform(vars) {
        var zone_id = vars.getAttribute('value');
        document.getElementById("zone_id").setAttribute('value', zone_id);
        document.forms["frm"].submit();
    }
</script>

<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <?php
            $objArr = ['class' => '', 'target' => '', 'escape' => false];
            ?>
            <li><?= $this->Html->link('หน้าหลัก', HOME_URL, $objArr); ?></li>
            <li class="active">เลือกโซน</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <?= $this->Html->image('banner_zone.png', ['alt' => '','class'=>'img-responsive']) ?>
    </div>
</div>

<div class="row">
    <?= $this->Form->create('', ['url' => ['controller' => 'assets', 'action' => 'index'], 'class' => 'form-inline', 'name' => 'frm', 'id' => 'frm']) ?>
    <div class="col-md-12 padding-bottom-74">
        <h3>เลือกประเภทสินทรัพย์</h3>
        <div class="col-md-12 padding-bottom-20">
            <div class="form-group">
                <?= $this->Form->input('asset_type_id', ['options' => $assetTypes, 'empty' => 'ทั้งหมด', 'class' => 'form-control', 'label' => false, 'default' => $assetTypeId]); ?>
            </div>
        </div>
        <h3>เลือกโซนที่ต้องการ</h3>
        <div class="col-md-12">
            <div class="col-md-8 no-padding-left-right ">
                <?= $this->Form->hidden('zone_id', ['value' => '', 'id' => 'zone_id']) ?>
                <?php foreach ($zones as $a): ?>
                    <div class="col-md-12 no-padding-left-right padding-bottom-20">
                        <?= $this->Html->link('<strong class="f-color-red">' . h($a->name) . '</strong>  ' . h($a->description), '#', ['value' => $a->id, 'escape' => false, 'onclick' => 'submitform(this);']) ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-md-4">
                <?= $this->Html->image('zone.png', ['alt' => '', 'width' => '100%']) ?>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>