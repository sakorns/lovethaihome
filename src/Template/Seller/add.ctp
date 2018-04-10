<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <div class="card-actions">
                    <?=$this->Html->link('<i class="ion-android-arrow-back"></i> กลับ',['action'=>'index'],['escape'=>false])?>
                </div>
            </div>
            <div class="card-block">
                <?= $this->Form->create($user, ['class' => 'form-horizontal m-t-sm','novalidate' => true,'enctype' => 'multipart/form-data']) ?>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="example-nf-email">ชื่อ <?=REQ_FIELD?></label>
                        <?= $this->Form->input('firstname', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                    <div class="col-xs-6">
                        <label for="example-nf-email">นามสกุล <?=REQ_FIELD?></label>
                        <?= $this->Form->input('lastname', ['class' => 'form-control', 'label' => false]); ?>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="example-nf-email">โทร <?=REQ_FIELD?></label>
                        <?= $this->Form->input('phone', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                    <div class="col-xs-6">
                        <label for="example-nf-email">อีเมล <?=REQ_FIELD?></label>
                        <?= $this->Form->input('email', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="example-nf-email">Line ID</label>
                        <?= $this->Form->input('lineid', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                    <div class="col-xs-6">
                        <label for="example-nf-email">ตำแหน่ง</label>
                        <?= $this->Form->input('position', ['class' => 'form-control', 'label' => false]); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="example-file-input" class="col-xs-12">รูปโปรไฟล์</label>
                    <div class="col-xs-12">
                        <input type="file" name="upload_file" id="example-file-input">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <?= $this->Form->button('บันทึก', ['class' => 'btn btn-app']) ?>
                    </div>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>