<div class="row text-center message-page">
    <div class="col-md-12">
        <h1 class="pading-20-0 f-color-green">เรียบร้อย!</h1>
        <?= $this->Flash->render() ?>
        <p class="padding-bottom-74"></p>
        <?= $this->Html->link('กลับสู่หน้าหลัก', HOME_URL, ['escape' => false, 'class' => 'btn btn-primary']); ?>
    </div>

</div>