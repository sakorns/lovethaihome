<div class="row">
    <div class="col-lg-12">
        <!-- Hover Table -->
        <div class="card">
            <div class="card-header">
                <h4>ลูกค้าฝากหาบ้าน-ที่ดิน</h4>
                <div class="card-actions">
                    
                </div>
            </div>
            <div class="card-block">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 50px;" class="text-center">#</th>
                            <th>ชื่อลูกค้า</th>
                            <th class="">เบอร์โทร</th>
                            <th class="">ประเภท</th>
                            <th class="">วันที่สร้าง</th>
                            <th style="width: 100px;" class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customerAssets as $a): ?>
                            <tr>
                                <td class="text-center"><?= $seq++ ?></td>
                                <td><?= $this->Html->link($a->customer->fullname, ['action' => 'view_purchase', $a->id], ['escape' => false]) ?></td>
                                <td><?= h($a->customer->tel) ?></td>
                                <td><?= h($a->asset_type->name) ?></td>
                                <td class="hidden-xs"><?= h(date("d-m-Y H:m", strtotime($a->created))) ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <?= $this->Html->link(BUTTON_VIEW, ['action' => 'view_purchase', $a->id], ['escape' => false]) ?>
                                        <?= $this->Form->postLink(BUTTON_DELETE, ['action' => 'delete', $a->id,'P'], ['confirm' => __('คุณต้องการลบ {0}?', $a->name), 'escape' => false]) ?>
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