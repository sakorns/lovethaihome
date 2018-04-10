<section>
    <div class="container">
        <header class="section-title">
            <h2>ค้นหาสินทรัพย์ที่ต้องการ</h2>
        </header>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <?= $this->Form->create('', ['url' => ['controller' => 'assets', 'action' => 'search'], 'class' => 'form-inline']) ?>
                <h3>ขั้นตอนที่ 1 เลือกโซนที่ต้องการ</h3>
                <div class="form-group">
                    <?php foreach ($zones as $a): ?>
                        <div class="col-xs-12">
                            <div class="col-xs-12">
                                <label for="<?= $a->id ?>">
                                    <p><input type="checkbox" name="zone_id[]" value="<?= $a->id ?>" id="<?= $a->id ?>"> <?= h($a->name) ?></p>
                                </label>
                                <p class=""><?= h($a->description) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <h3>ขั้นตอนที่ 2 เลือกประเภทสินทรัพย์</h3>
                <div class="form-group">
                    <?= $this->Form->input('asset_type_id', ['options' => $assetTypes, 'empty' => 'ทั้งหมด', 'class' => 'form-control', 'label' => false]); ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputName2">เรียงโดย </label>
                    <select class="form-control" name="order_type">
                        <option value="P">ราคา</option>
                        <option value="D">วันที่ประกาศ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2">จัดลำดับโดย </label>
                    <select class="form-control" name="order_by">
                        <option value="DESC">เรียงจากมากไปน้อย</option>
                        <option value="ASC">เรียงจากน้อยไปมาก</option>
                    </select>
                </div>
                <div class="form-group">
                    <?= $this->Form->button('ค้นหา', ['class' => 'btn btn-default']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>

        </div>

    </div>
</section>

<section>
    <div class="property-listing multiple-recent-properties">
        <div class="container">
            <header class="section-title">
                <h2>ผลการค้นหา</h2>
            </header>
            <div class="row property-list-area">
                <?php foreach ($assets as $a): ?>
                    <div data-target="Residential" class="property-list-list">
                        <div class="col-xs-12 col-sm-3 col-md-3 property-list-list-image">
                            <?= $this->Html->image('recent-property-1.png', ['class' => 'img-responsive asset-image-list', 'alt' => '']) ?>
                        </div>
                        <div class="col-xs-12 col-sm-9 col-md-9 property-list-list-info">
                            <div class="col-md-12">
                                <?= $this->Html->link('<h4>' . h($a->name) . '</h4>', '/assets/view/' . $a->id, ['escape' => false]) ?>
                                <p class="asset-code">รหัสทรัพย์สิน: <?= h($a->code) ?></p>
                                <p><?= h($a->address->amphur == '' ? '' : $a->address->amphur . '/') ?><?= h($a->address->province->province_name) ?></p>
                            </div>
                            <div class="col-md-12">
                                <span class="recent-properties-address"><?= $this->Number->currency($a->price_amounnt, 'THB', ['precision' => 1]) ?></span>
                                <?php
                                $name = isset($a->user->firstname) ? $a->user->firstname . ' ' . $a->user->lastname : "";
                                ?>
                                <p>สนใจติดต่อ: <?= h($name) ?></p>
                            </div>

                        </div>							
                    </div>
                <?php endforeach; ?>
                <?php if (sizeof($assets) == 0) { ?>
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <h3 class="f-color-gray">-ขออภัยค่ะ ไม่พบรายการ กรุณาลองใหม่อีกครั้ง -</h3>
                    </div>

                <?php } ?>
            </div>
            <div class="row load_more text-center">
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
</section>