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
                <?= $this->Form->create($article) ?>
                <div class="form-group">
                    <label for="">ลำดับที่ <?= REQ_FIELD ?></label>
                    <?= $this->Form->input('seq', ['class' => 'form-control', 'label' => false]); ?>

                </div>
                <div class="form-group">
                    <label for="">ชื่อ <?= REQ_FIELD ?></label>
                    <?= $this->Form->input('category_id', ['class' => 'form-control', 'label' => false,'options' => $categories]); ?>

                </div>
                <div class="form-group">
                    <label for="">ชื่อ <?= REQ_FIELD ?></label>
                    <?= $this->Form->input('name', ['class' => 'form-control', 'label' => false]); ?>

                </div>
                <div class="form-group">
                    <label for="">เนื้อหา</label>
                    <?= $this->Form->input('text', ['class' => 'form-control', 'label' => false,'rows' => '30']); ?>

                </div>
                
                <div class="form-group m-b-0">
                    <?= $this->Form->button('บันทึก', ['class' => 'btn btn-app']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>