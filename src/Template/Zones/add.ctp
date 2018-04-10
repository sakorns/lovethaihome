<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-actions">
                    <?= $this->Html->link('<i class="ion-android-arrow-back"></i> กลับ', ['action' => 'index'], ['escape' => false]) ?>
                </div>
            </div>
            <div class="card-block">
                <?= $this->Form->create($zone) ?>
                <div class="form-group">
                    <label for="">ชื่อ <?= REQ_FIELD ?></label>
                    <?= $this->Form->input('name', ['class' => 'form-control', 'label' => false]); ?>
                </div>
                <div class="form-group">
                    <label for="">รายละเอียด <?= REQ_FIELD ?></label>
                    <?= $this->Form->input('description', ['class' => 'form-control', 'label' => false]); ?>
                </div>
                <div class="form-group m-b-0">
                    <?= $this->Form->button('บันทึก', ['class' => 'btn btn-app']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>