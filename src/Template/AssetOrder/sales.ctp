<div class="row">
    <div class="col-md-10 col-md-offset-1 text-center"> 
        <?= $this->Html->image('head-top.png', ['alt' => '']) ?>
        <h2 class="pading-10-0">ฝากขายบ้านที่ดิน</h2>
        <p>
            รับฝากขายบ้าน-ที่ดินสนใจฝากขายบ้านที่ดิน หรืออสังหาริมทรัพย์อื่นๆ ในเขตกรุงเทพฯ และปริมณฑลกรุณากรอกรายละเอียดข้อมูลลงแบบฟอร์มทางด้านล่างนี้ได้เลยครับ
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
        <?= $this->Form->input('customer_asset.type', ['type' => 'hidden', 'label' => false, 'value' => 'S']); ?>
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
            <div class="col-xs-3">
                <label for="">พื้นที่/ไร่</label>
                <?= $this->Form->input('customer_asset.area_rai', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
            </div>
            <div class="col-xs-3">
                <label for="">พื้นที่/งาน</label>
                <?= $this->Form->input('customer_asset.area_ngan', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
            </div>
            <div class="col-xs-3">
                <label for="">พื้นที่/ตารางวา</label>
                <?= $this->Form->input('customer_asset.area_wah', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
            </div>
            <div class="col-xs-3">
                <label for="">พื้นที่/ตารางเมตร</label>
                <?= $this->Form->input('customer_asset.area_meter', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-3">
                <label for="">จำนวนชั้น</label>
                <?= $this->Form->input('customer_asset.floor_total', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
            </div>
            <div class="col-xs-3">
                <label for="">จำนวนห้องนอน</label>
                <?= $this->Form->input('customer_asset.bedroom', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
            </div>
            <div class="col-xs-3">
                <label for="">จำนวนห้องน้ำ</label>
                <?= $this->Form->input('customer_asset.bathroom', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
            </div>
            <div class="col-xs-3">
                <label for="">จำนวนห้องครัว</label>
                <?= $this->Form->input('customer_asset.kitchen_room', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-6">
                <label for="">ราคาที่ตั้งใจจะตั้งขาย/บาท <?= REQ_FIELD ?></label>
                <?= $this->Form->input('customer_asset.price_amounnt', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
            </div>
            <div class="col-xs-6">
                <label for=""></label>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> ขอคำปรึกษาในการตั้งราคาขาย
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">

            <div class="col-xs-6">
                <label for="">ที่อยู่</label>
                <?= $this->Form->input('address.address1', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
            </div>
            <div class="col-xs-3">
                <label for="">หมู่</label>
                <?= $this->Form->input('address.moo', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
            </div>
            <div class="col-xs-3">
                <label for="">ซอย</label>
                <?= $this->Form->input('address.soi', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
            </div>
            <div class="col-xs-3">
                <label for="">ถนน</label>
                <?= $this->Form->input('address.street', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
            </div>
            <div class="col-xs-3">
                <label for="">ตำบล</label>
                <?= $this->Form->input('address.district', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
            </div>
            <div class="col-xs-3">
                <label for="">อำเภอ</label>
                <?= $this->Form->input('address.amphur', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
            </div>
            <div class="col-xs-3">
                <label for="">จังหวัด</label>
                <?= $this->Form->input('address.province_id', ['options' => $provinces, 'empty' => false, 'class' => 'form-control', 'label' => false]); ?>
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