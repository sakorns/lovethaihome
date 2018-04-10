
<div class="row">
    <div class="col-md-12 text-center"> 
        <?= $this->Html->image('head-top.png', ['alt' => '']) ?>
        <h2 class="pading-10-0">ฝากหาบ้านที่ดิน</h2>
        <p>
            ฝากหาบ้าน-ที่ดิน  หรืออสังหาริมทรัพย์ อื่นๆ ในเขตกรุงเทพฯ และปริมณฑล ในกรณีที่ท่านดูรายการทรัพย์สินของเราหมดแล้ว ยังไม่เป็นที่ถูกใจ ให้ท่านกรอกข้อมูลรายละเอียดลงแบบฟอร์ม  ทางด้านล่างนี้ได้เลยครับ  ถ้ามีทรัพย์ใหม่ๆ ที่ตรงตามความต้องการของท่านทางเราจะส่งข้อมูลไปทางอีเมลล์หรือไลน์ ตามที่ท่านได้ให้ข้อมูลไว้ครับ
        </p>
    </div>
</div>
<div class="row">
    <?= $this->Form->create($customer, ['class' => 'form-horizontal m-t-sm', 'novalidate' => true, 'enctype' => 'multipart/form-data']) ?>
    <div class="col-md-12"> 
        <h4>รายละเอียดผู้ติดต่อ</h4>
        <div class="form-group">
            <div class="col-xs-6">
                <label for="example-nf-email">ชื่อผู้ติดต่อ <?= REQ_FIELD ?></label>
                <?= $this->Form->input('fullname', ['class' => 'form-control', 'label' => false]); ?>
            </div>
            <div class="col-xs-6">
                <label for="example-nf-email">เบอร์โทรศัพท์ <?= REQ_FIELD ?></label>
                <?= $this->Form->input('tel', ['class' => 'form-control', 'label' => false]); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6">
                <label for="example-nf-email">Email (ถ้ามี)</label>
                <?= $this->Form->input('email', ['class' => 'form-control', 'label' => false]); ?>
            </div>
            <div class="col-xs-6">
                <label for="example-nf-email">Line ID (ถ้ามี)</label>
                <?= $this->Form->input('lineid', ['class' => 'form-control', 'label' => false]); ?>
            </div>
        </div>

        <h4>รายละเอียดสินทรัพย์</h4>
        <?= $this->Form->input('customer_asset.type', ['type' => 'hidden', 'label' => false, 'value' => 'P']); ?>
        <div class="form-group">
            <div class="col-xs-6">
                <label for="">ประเภทสินทรัพย์</label>
                <?= $this->Form->input('customer_asset.asset_type_id', ['options' => $assetTypes, 'empty' => true, 'class' => 'form-control', 'label' => false]); ?>
            </div>
            <div class="col-xs-6">
                <label for="">ประเภทสินทรัพย์อื่น ๆ </label>
                <?= $this->Form->input('customer_asset.asset_type_des', ['class' => 'form-control', 'label' => false]); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-xs-12">กรุณาเลือกโซนที่ต้องการซื้อ</label>
            <?php foreach ($zones as $a): ?>
                <div class="col-xs-12">
                    <div class="col-xs-12">
                        <label for="<?= $a->id ?>">
                            <p><input type="radio" name="customer_asset[zone_id]" value="<?= $a->id ?>" id="<?= $a->id ?>" checked> <?= h($a->name) ?></p>
                            <p><?= h($a->description) ?></p>
                        </label>

                    </div>

                </div>
            <?php endforeach; ?>
        </div>

        <div class="form-group">
            <label for="" class="col-xs-12">กรุณาเลือกงบประมาณ</label>
            <div class="col-xs-6">

                <?= $this->Form->input('customer_asset.budgets', ['options' => $budgets, 'empty' => true, 'class' => 'form-control', 'label' => false]); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-xs-12">รายละเอียดเพิ่มเติม</label>
            <div class="col-xs-12">
                <?= $this->Form->input('customer_asset.description', ['class' => 'form-control', 'label' => false, 'rows' => '6']); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6 col-xs-offset-3">
                <?= $this->Form->button('บันทึก', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>