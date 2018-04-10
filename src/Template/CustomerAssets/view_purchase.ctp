<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                
                <div class="card-actions">
                    <?= $this->Html->link('<i class="ion-android-arrow-back"></i> กลับ', ['action' => 'purchase'], ['escape' => false]) ?>
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
                        <strong class="font-700">งบประมาณ/บาท</strong>
                        <p><?= h($customerAsset->budgets.' ล้านบาท') ?></p>
                    </div>
                </div> 
                
                <div class="row">
                    <div class="col-md-12">
                        <strong class="font-700">โซน</strong>
                        <p><?=h($customerAsset->zone->name) ?></p>
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