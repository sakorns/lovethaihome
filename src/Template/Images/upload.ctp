<?= $this->Form->create('',['enctype' => 'multipart/form-data']) ?>
<input type="file" id="upload_file" name="upload_file[]" multiple/>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>