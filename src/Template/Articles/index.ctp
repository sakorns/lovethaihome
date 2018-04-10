<div class="row">
    <div class="col-lg-12">
        <!-- Hover Table -->
        <div class="card">
            <div class="card-header">
                <div class="card-actions">
                    <?=$this->Html->link('<i class="fa fa-plus-circle"></i> เพิ่ม',['action'=>'add'],['escape'=>false])?>
                </div>
            </div>
            <div class="card-block">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 50px;" class="text-center">#</th>
                            <th>ประเภท</th>
                            <th>ชื่อ</th>
                            <th class="">วันที่สร้าง</th>
                            <th style="width: 100px;" class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($articles as $a): ?>
                        <tr>
                            <td class="text-center"><?=h($a->seq)?></td>
                            <td><?= $a->category->name ?></td>
                            <td><?=h($a->name)?></td>
                            <td class="hidden-xs"><?=h(date("d-m-Y H:m", strtotime($a->created)))?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <?= $this->Html->link(BUTTON_EDIT, ['action' => 'edit', $a->id],['escape'=>false]) ?>
                                    <?= $this->Form->postLink(BUTTON_DELETE, ['action' => 'delete', $a->id], ['confirm' => __('คุณต้องการลบ {0}?', $a->name),'escape'=>false]) ?>
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