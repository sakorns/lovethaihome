<div class="row">
    <div class="col-lg-12">
        <!-- Hover Table -->
        <div class="card">
            <div class="card-header">
                <div class="card-actions">
                    <?= $this->Html->link('<i class="fa fa-plus-circle"></i> เพิ่มทรัพย์สิน', ['action' => 'add'], ['escape' => false]) ?>
                </div>
            </div>
            <div class="card-block card-block-full">
                <?= $this->Form->create('', ['class' => 'form-horizontal', 'novalidate' => true]) ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-2">
                            <?= $this->Form->input('code', ['class' => 'form-control', 'label' => 'รหัสสินทรัพย์', 'placeholder' => '','value'=>  isset($code)?$code:null]); ?>
                        </div>
                        <div class="col-xs-5">
                            <?= $this->Form->input('name', ['class' => 'form-control', 'label' => 'ชื่อสินทรัพย์', 'placeholder' => '','value'=>  isset($name)?$name:null]); ?>
                        </div>
                        <div class="col-xs-4">
                            <?= $this->Form->input('user_id', ['options' => $users, 'empty' => true, 'class' => 'form-control', 'label' => 'พนักงานขาย','default'=>isset($user_id)?$user_id:null]); ?>
                        </div>

                    </div>


                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12">
                            <?= $this->Form->button('Search', ['class' => 'btn btn-app']) ?>
                            <?= $this->Html->link($this->Form->button('Clear', ['class' => 'btn btn-app-light','type'=>'button']),['controller'=>'AdminAsset','action'=>'clear'],['escape' => false])?>
                        </div>

                    </div>
                </div>

                <?= $this->Form->end() ?>

            </div>
            <div class="card-block">
                <table class="table table-hover">
                    <thead>
                        <tr class="f-color-red">
                            <th style="width: 50px;" class="text-center">#</th>
                            <th>รหัสทรัพย์สิน</th>
                            <th class="">ชื่อ</th>
                            <th style="width: 180px;">พนักงานขาย</th>
                            <th style="width: 150px;">ประเภท</th>
                            <th style="width: 140px;">วันที่สร้าง</th>
                            <th style="width: 70px;" class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($assets as $a): ?>
                            <tr>
                                <td class="text-center"><?= $seq++ ?></td>
                                <td><strong><?= h($a->code) ?></strong></td>
                                <td><?= $this->Html->link($a->name, ['action' => 'edit', $a->id], ['escape' => false]) ?></td>
                                <td><?= h($a->user->firstname.' '.$a->user->lastname) ?></td>
                                <td><?= h($a->asset_type->name) ?></td>
                                <td class="hidden-xs"><?= h(date("d-m-Y H:m", strtotime($a->created))) ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <?= $this->Html->link(BUTTON_EDIT, ['action' => 'edit', $a->id], ['escape' => false]) ?>
                                        <?= $this->Form->postLink(BUTTON_DELETE, ['action' => 'delete', $a->id], ['confirm' => __('คุณต้องการลบ {0}?', $a->name), 'escape' => false]) ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                    </ul>
                    <p><?= $this->Paginator->counter() ?></p>
                </div>
            </div>
        </div>
    </div>
</div>