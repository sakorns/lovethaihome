<?= $this->Html->script('tinymce/tinymce.min.js') ?>
<script>
    tinymce.init({
  selector: 'textarea',
  height: 500,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: '//www.tinymce.com/css/codepen.min.css'
});
</script>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-actions">
                    <?= $this->Html->link('<i class="ion-android-arrow-back"></i> กลับ', ['action' => 'index'], ['escape' => false]) ?>
                </div>
            </div>
            <div class="card-block">
                <?= $this->Form->create($asset, ['class' => 'form-horizontal m-t-sm', 'novalidate' => true]) ?>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="example-nf-email">คำอธิบายรายละเอียดทรัพย์สินแบบย่อ <?= REQ_FIELD ?></label>
                        <?= $this->Form->input('name', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="example-nf-email">รหัสสินทรัพย์ <?= REQ_FIELD ?></label>
                        <?= $this->Form->input('code', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                    <div class="col-xs-6">
                        <label for="example-nf-email">ตัวแทนขาย <?= REQ_FIELD ?></label>
                        <?= $this->Form->input('user_id', ['options' => $users, 'empty' => false, 'class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="">ประเภทสินทรัพย์ <?= REQ_FIELD ?></label>
                        <?= $this->Form->input('asset_type_id', ['options' => $assetTypes, 'empty' => false, 'class' => 'form-control', 'label' => false]); ?>
                    </div>
                    <div class="col-xs-6">
                        <label for="">โซน <?= REQ_FIELD ?></label>
                        <?= $this->Form->input('zone_id', ['options' => $zones, 'empty' => false, 'class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6 paddin-0">
                        <div class="col-xs-4">
                            <label for="">ราคา/บาท <?= REQ_FIELD ?></label>
                            <?= $this->Form->input('price_amounnt', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                        </div>
                        <div class="col-xs-4">
                            <label for="">ราคาต่อตารางวา/บาท</label>
                            <?= $this->Form->input('price_per_wah', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                        </div>
                        <div class="col-xs-4">
                            <label for="">ราคาให้เช่า/บาท</label>
                            <?= $this->Form->input('price_rent', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                        </div>

                        <div class="col-xs-6">

                            <div class="checkbox">
                                <label>
                                    <?= $this->Form->checkbox('isspecial_marketprice', ['value' => 'Y']); ?> ทรัพย์สินที่ขายต่ำกว่าราคาตลาด
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="checkbox">
                                <label>
                                    <?= $this->Form->checkbox('isspecial_appraised', ['value' => 'Y']); ?> ทรัพย์สินขายต่ำกว่าราคาประเมิน
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <label for="example-nf-email">ขายต่ำกว่าในราคา/บาท <?= REQ_FIELD ?></label>
                            <?= $this->Form->input('price_amounnt_lower', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                        </div>

                    </div>

                    <div class="col-xs-6">
                        <h5 class="f-color-red">ความต้องการการประกาศ</h5>
                        <div class="col-xs-3">
                            <div class="checkbox">
                                <label>
                                    <?= $this->Form->checkbox('issale', ['value' => 'Y']); ?> เพื่อขาย
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="checkbox">
                                <label>
                                    <?= $this->Form->checkbox('isrent', ['value' => 'Y']); ?> ให้เช่า
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="checkbox">
                                <label>
                                    <?= $this->Form->checkbox('issellout', ['value' => 'Y']); ?> เซ้ง
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="checkbox">
                                <label>
                                    <?= $this->Form->checkbox('issaledown', ['value' => 'Y']); ?> ขายดาวน์
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <h4 class="header-title">ที่อยู่</h4>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="col-xs-12">
                                <label for="">ที่อยู่</label>
                                <?= $this->Form->input('address.address1', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                            </div>
                            <div class="col-xs-6">
                                <label for="">หมู่</label>
                                <?= $this->Form->input('address.moo', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                            </div>
                            <div class="col-xs-6">
                                <label for="">ซอย</label>
                                <?= $this->Form->input('address.soi', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                            </div>
                            <div class="col-xs-6">
                                <label for="">ถนน</label>
                                <?= $this->Form->input('address.street', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                            </div>
                            <div class="col-xs-6">
                                <label for="">ตำบล</label>
                                <?= $this->Form->input('address.district', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                            </div>
                            <div class="col-xs-6">
                                <label for="">อำเภอ</label>
                                <?= $this->Form->input('address.amphur', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                            </div>
                            <div class="col-xs-6">
                                <label for="">จังหวัด</label>
                                <?= $this->Form->input('address.province_id', ['options' => $provinces, 'empty' => false, 'class' => 'form-control', 'label' => false]); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-xs-6">
                                <label for="example-nf-email">ตำแหน่งละติจูด</label>
                                <?= $this->Form->input('latitude', ['class' => 'form-control', 'label' => false]); ?>

                            </div>
                            <div class="col-xs-6">
                                <label for="example-nf-email">ตำแหน่งลองติจูด</label>
                                <?= $this->Form->input('longitude', ['class' => 'form-control', 'label' => false]); ?>
                            </div>
                            <div class="col-xs-12 text-center">
                                <?php if ($asset['latitude'] != '' && $asset['longitude'] != '') { ?>
                                    <?= $this->element('google_map'); ?>
                                <?php } else { ?>
                                    <p class="p-a-lg f-color-red">เมื่อใส่พิกัดครบทั้ง ตำแหน่งละติจูด <br/>และ ตำแหน่งลองติจูด ระบบจะแสดง Google Map</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="header-title">รายละเอียดสิ่งปลูกสร้าง</h4>
                <div class="form-group">
                    <div class="col-xs-3">
                        <label for="example-nf-email">อยู่ชั้นที่(คอนโด)</label>
                        <?= $this->Form->input('floor', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                    </div>
                    <div class="col-xs-3">
                        <label for="example-nf-email">จำนวนชั้น</label>
                        <?= $this->Form->input('floor_total', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                    </div>
                    <div class="col-xs-3">
                        <label for="example-nf-email">จำนวนห้องนอน</label>
                        <?= $this->Form->input('bedroom', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                    </div>
                    <div class="col-xs-3">
                        <label for="example-nf-email">จำนวนห้องน้ำ</label>
                        <?= $this->Form->input('bathroom', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-xs-3">
                        <label for="example-nf-email">จำนวนห้องครัว</label>
                        <?= $this->Form->input('kitchen_room', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                    </div>
                    <div class="col-xs-3">
                        <label for="example-nf-email">ห้องรับแขก</label>
                        <?= $this->Form->input('reception_room', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                    </div>
                    <div class="col-xs-3">
                        <label for="example-nf-email">ห้องทานอาหาร</label>
                        <?= $this->Form->input('dining_room', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                    </div>
                    <div class="col-xs-3">
                        <label for="example-nf-email">ห้องแม่บ้าน</label>
                        <?= $this->Form->input('maid_room', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-xs-3">
                        <label for="example-nf-email">ที่จอดรถ</label>
                        <?= $this->Form->input('parking', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                    </div>
                </div>

                <h4 class="header-title">รายละเอียดพื้นที่</h4>
                <div class="form-group">
                    <div class="col-xs-3">
                        <label for="example-nf-email">พื้นที่/ไร่</label>
                        <?= $this->Form->input('area_rai', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                    </div>
                    <div class="col-xs-3">
                        <label for="example-nf-email">พื้นที่/งาน</label>
                        <?= $this->Form->input('area_ngan', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                    </div>
                    <div class="col-xs-3">
                        <label for="example-nf-email">พื้นที่/ตารางวา</label>
                        <?= $this->Form->input('area_wah', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                    </div>
                    <div class="col-xs-3">
                        <label for="example-nf-email">พื้นที่/ตารางเมตร</label>
                        <?= $this->Form->input('area_meter', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-3">
                        <label for="">หน้ากว้าง/เมตร</label>
                        <?= $this->Form->input('area_width', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                    </div>
                    <div class="col-xs-3">
                        <label for="">ลึก/เมตร</label>
                        <?= $this->Form->input('area_long', ['class' => 'form-control', 'label' => false, 'type' => 'text']); ?>
                    </div>
                    <div class="col-xs-3">
                        <label for=""></label>
                        <div class="checkbox">
                            <label class="css-input css-checkbox css-checkbox-primary">
                                <?= $this->Form->checkbox('iscovering', ['value' => 'Y']); ?><span></span> ถมแล้ว
                            </label>
                        </div>

                    </div>
                    <div class="col-xs-3">
                        <label for=""></label>
                        <div class="checkbox">
                            <label class="css-input css-checkbox css-checkbox-primary">
                                <?= $this->Form->checkbox('isdweller', ['value' => 'Y']); ?><span></span> มีผู้อยู่อาศัย
                            </label>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-3">
                        <label for="">หันหน้าทิศ</label>
                        <?= $this->Form->input('direction', ['options' => $directions, 'empty' => 'ไม่ระบุ', 'class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>
                <h4 class="header-title">รายละเอียดอื่น ๆ</h4>
                <div class="form-group">
                    <label for="example-textarea-input" class="col-xs-12">รายละเอียด</label>
                    <div class="col-xs-12">
                        <?= $this->Form->input('description', ['class' => 'form-control', 'label' => false, 'rows' => '20']); ?>
                    </div>
                </div>

                <h4 class="header-title">สิ่งอำนวยความสะดวก</h4>
                <div class="form-group">
                    <?php foreach ($facis as $a) : ?>
                        <?php
                        $checked = '';
                        ?>
                        <div class="col-xs-3">
                            <label class="css-input css-checkbox css-checkbox-primary">
                                <?= $this->Form->checkbox('asset_option[].option_id', ['value' => $a->id, 'checked' => $checked]); ?><span></span> <?= h($a->name) ?>
                            </label>
                        </div>

                    <?php endforeach; ?>
                </div>

                <h4 class="header-title">สถานที่ใกล้เคียง</h4>
                <div class="form-group">
                    <?php foreach ($placs as $a) : ?>
                        <?php
                        $checked = '';
                        ?>
                        <div class="col-xs-3">
                            <label class="css-input css-checkbox css-checkbox-primary">
    <?= $this->Form->checkbox('asset_option[].option_id', ['value' => $a->id, 'checked' => $checked]); ?><span></span> <?= h($a->name) ?>
                            </label>
                        </div>

<?php endforeach; ?>
                </div>
                <div class="form-group">
                    <div class="col-xs-12 text-center">
<?= $this->Form->button('บันทึก', ['class' => 'btn btn-app']) ?>
                    </div>
                </div>

<?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>