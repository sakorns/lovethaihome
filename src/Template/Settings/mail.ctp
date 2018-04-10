<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              
                <div class="card-actions">
                   
                </div>
            </div>
            <div class="card-block">
                <?= $this->Form->create($setting) ?>
                <?= $this->Form->hidden('id'); ?>
                <div class="form-group">
                    <label for="example-nf-email">ผู้รับการติดต่อจากลูกค้า ***หน้าติดต่อเรา </label>
                    <?= $this->Form->input('email_receiver_contact', ['class' => 'form-control', 'label' => false]); ?>

                </div>
                <div class="form-group">
                    <label for="example-nf-email">ผู้รับลูกค้าฝ่ายขาย </label>
                    <?= $this->Form->input('email_receiver_seller', ['class' => 'form-control', 'label' => false]); ?>

                </div>
                <div class="form-group">
                    <label for="example-nf-email">ผู้รับลูกค้าฝ่ายซื้อ </label>
                    <?= $this->Form->input('email_receiver_purchase', ['class' => 'form-control', 'label' => false]); ?>

                </div>
                <div class="form-group m-b-0">
                    <?= $this->Form->button('บันทึก', ['class' => 'btn btn-app']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>