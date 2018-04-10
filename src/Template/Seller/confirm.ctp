<div class="row">
    <div class="col-lg-12">
        <!-- Hover Table -->
        <div class="card">
            <div class="card-header">
               
            </div>
            <div class="card-block">
                <h3>คุณต้องการลบ "<?=h($user->firstname.' '.$user->lastname)?>" พร้อมกับรายการทรัพย์สินด้านล่าง ใช่หรือไม่?</h3>
                <?= $this->Form->create('user') ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->button('ตกลง', ['class' => 'btn btn-app']) ?>
                            <?= $this->Html->link('<button class="btn btn-app-red" type="button">ยกเลิก</button>',['controller'=>'seller','action'=>'index'],['escape'=>false] ) ?>
                        </div>
                    </div>
                <?= $this->Form->end() ?>
                <ol>
                    <?php foreach ($assets as $a): ?>                   
                        <li><?= $this->Html->link($a->code.': '.$a->name, ['controller'=>'admin-asset','action' => 'edit', $a->id], ['escape' => false]) ?></li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </div>
</div>