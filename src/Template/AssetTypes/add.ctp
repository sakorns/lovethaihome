<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-actions">
                    <?= $this->Html->link('<i class="ion-android-arrow-back"></i> กลับ', ['action' => 'index'], ['escape' => false]) ?>
                </div>
            </div>
            <div class="card-block">
                <?= $this->Form->create($assetType) ?>
                <div class="form-group">
                    <label for="example-nf-email">ลำดับที่ <?= REQ_FIELD ?></label>
                    <?= $this->Form->input('seq', ['class' => 'form-control', 'label' => false]); ?>

                </div>
                <div class="form-group">
                    <label for="example-nf-email">ชื่อ <?= REQ_FIELD ?></label>
                    <?= $this->Form->input('name', ['class' => 'form-control', 'label' => false]); ?>

                </div>
                <div class="form-group m-b-0">
                    <?= $this->Form->button('บันทึก', ['class' => 'btn btn-app']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>