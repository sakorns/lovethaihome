<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                
                <div class="card-actions">
                    <?= $this->Html->link('<i class="ion-android-arrow-back"></i> กลับ', ['action' => 'sales'], ['escape' => false]) ?>
                </div>
            </div>
            <div class="card-block">
                <h3><?= h('คุณ '.$customerAsset->customer->fullname) ?></h3>
                <div class="row">
                    <div class="col-md-3">
                        <strong class="font-700">โทร</strong>
                        <p><?=h($customerAsset->customer->tel) ?></p>
                    </div>
                    <div class="col-md-3">
                        <strong class="font-700">อีแมล</strong>
                        <p><?=h($customerAsset->customer->email) ?></p>
                    </div>
                    <div class="col-md-3">
                        <strong class="font-700">Line ID</strong>
                        <p><?=h($customerAsset->customer->lineid) ?></p>
                    </div>
                    <div class="col-md-3">
                        <strong class="font-700">ต้องการคำปรึกษาในการตั้งราคาขาย</strong>
                        <p><?=h($customerAsset->isreqconsult=='Y'?'ใช่':'ไม่') ?></p>
                    </div>
                </div> 
            </div>
        </div>
        
        <div class="card">
            <div class="card-block">
                <div class="row">
                    <div class="col-md-3">
                        <strong class="font-700">ประเภทสินทรัพย์</strong>
                        <p><?=h($customerAsset->asset_type->name) ?></p>
                    </div>
                    <div class="col-md-3">
                        <strong class="font-700">ราคาที่ตั้งใจจะตั้งขาย/บาท</strong>
                        <p><?= $this->Number->format($customerAsset->price_amounnt) ?></p>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-3">
                        <strong class="font-700">พื้นที่/ไร่</strong>
                        <p><?=h($customerAsset->area_rai) ?></p>
                    </div>
                    <div class="col-md-3">
                        <strong class="font-700">พื้นที่/งาน</strong>
                        <p><?=h($customerAsset->area_ngan) ?></p>
                    </div>
                    <div class="col-md-3">
                        <strong class="font-700">พื้นที่/ตารางวา</strong>
                        <p><?=h($customerAsset->price_per_wah) ?></p>
                    </div>
                    <div class="col-md-3">
                        <strong class="font-700">พื้นที่/ตารางเมตร</strong>
                        <p><?=h($customerAsset->area_meter) ?></p>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-3">
                        <strong class="font-700">จำนวนชั้น</strong>
                        <p><?=h($customerAsset->floor_total) ?></p>
                    </div>
                    <div class="col-md-3">
                        <strong class="font-700">จำนวนห้องนอน</strong>
                        <p><?=h($customerAsset->bedroom) ?></p>
                    </div>
                    <div class="col-md-3">
                        <strong class="font-700">จำนวนห้องน้ำ</strong>
                        <p><?=h($customerAsset->bathroom) ?></p>
                    </div>
                    <div class="col-md-3">
                        <strong class="font-700">จำนวนห้องครัว</strong>
                        <p><?=h($customerAsset->kitchen_room) ?></p>
                    </div>
                </div> 
                
                <div class="row">
                    <div class="col-md-3">
                        <strong class="font-700">ที่อยู่</strong>
                        <p><?=h(isset($customerAsset->address->address1)?$customerAsset->address->address1:'-') ?></p>
                    </div>
                    <div class="col-md-3">
                        <strong class="font-700">หมู่</strong>
                        <p><?=h(isset($customerAsset->address->moo)?$customerAsset->address->moo:'-') ?></p>
                    </div>
                    <div class="col-md-3">
                        <strong class="font-700">ซอย</strong>
                        <p><?=h(isset($customerAsset->address->soi)?$customerAsset->address->soi:'-') ?></p>
                    </div>
                    <div class="col-md-3">
                        <strong class="font-700">ถนน</strong>
                        <p><?=h(isset($customerAsset->address->street)?$customerAsset->address->street:'-') ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <strong class="font-700">ตำบล</strong>
                        <p><?=h(isset($customerAsset->address->district)?$customerAsset->address->district:'-') ?></p>
                    </div>
                    <div class="col-md-3">
                        <strong class="font-700">อำเภอ</strong>
                        <p><?=h(isset($customerAsset->address->amphur)?$customerAsset->address->amphur:'-') ?></p>
                    </div>
                    <div class="col-md-3">
                        <strong class="font-700">จังหวัด</strong>
                        <p><?=h(isset($customerAsset->address->province->province_name)?$customerAsset->address->province->province_name:'-') ?></p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <strong class="font-700">รายละเอียด</strong>
                        <?= $this->Text->autoParagraph(h($customerAsset->description)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>