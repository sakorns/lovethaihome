<div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <?php
                    $objArr = ['class' => '', 'target' => '', 'escape' => false];
                    ?>
                    <li><?= $this->Html->link('หน้าหลัก', HOME_URL, $objArr); ?></li>
                    <li><?= $this->Html->link('เลือกโซน', '/assets', $objArr); ?></li>
                    <li class="active">รายการทรัพย์สิน</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 property-detail-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?= h($asset->name) ?></h2>
                    </div>
                    <div class="col-md-12">
                        <h3>
                            <?=($asset->issale==='Y'?'ขาย  ':'') ?>
                            <?=($asset->isrent==='Y'?'ให้เช่า  ':'') ?>
                            <?=($asset->issellout==='Y'?'เซ้ง  ':'') ?>
                            <?=($asset->issaledown==='Y'?'ขายดาวน์':'') ?>
                        </h3>
                    </div>
                    
                    <div class="col-md-6">
                        <h4 class="f-color-red">รหัสสินทรัพย์: <?= h($asset->code) ?></h4>
                    </div>
                    <div class="col-md-6">
                        <h4 class="f-color-red">ราคา: <?= $this->Number->currency($asset->price_amounnt, 'THB', ['precision' => 1]) ?></h4>
                    </div>
                    <?php if (!is_null($asset->price_per_wah) && $asset->price_per_wah != '') { ?>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <h4 class="f-color-red">ราคาต่อตารางวา: <?= $this->Number->currency($asset->price_per_wah, 'THB', ['precision' => 1]) ?></h4>
                        </div>
                    <?php } ?>
                        
                     <?php if (!is_null($asset->price_rent) && $asset->price_rent != '') { ?>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <h4 class="f-color-red">ให้เช่า: <?= $this->Number->currency($asset->price_rent, 'THB', ['precision' => 1]) ?></h4>
                        </div>
                    <?php } ?>
                        
                    <?php if ($asset->description != '') { ?>
                        <div class="col-md-12">
                            <p><?= nl2br($asset->description) ?></p>
                        </div>
                    <?php } ?>
                </div>
                <div class="row">
                    
                    <div class="col-md-12">
                        <h4>รูปภาพ</h4>
                        <div class="col-md-12 text-center">
                            <?= $this->element('asset_image_slide'); ?>
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h4>รายละเอียด</h4>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">ประเภททรัพย์สิน</div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value"><?= h($asset->asset_type->name) ?></div>

                            <?php if (!(is_null($asset->price_per_wah) || $asset->price_per_wah == '' || $asset->price_per_wah == 0)) { ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">ราคาต่อตารางวา</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value"><?= h($asset->price_per_wah . ' บาท') ?></div>
                            <?php } ?>

                            <?php if (!(is_null($asset->area_rai) || $asset->area_rai == '')) { ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">พื้นที่</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value"><?= h($asset->area_rai . ' ไร่') ?></div>
                            <?php } ?>

                            <?php if (!(is_null($asset->area_ngan) || $asset->area_ngan == '')) { ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">พื้นที่</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value"><?= h($asset->area_ngan . ' งาน') ?></div>
                            <?php } ?>

                            <?php if (!(is_null($asset->area_wah) || $asset->area_wah == '')) { ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">พื้นที่</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value"><?= h($asset->area_wah . ' ตารางวา') ?></div>
                            <?php } ?>

                            <?php if (!(is_null($asset->area_meter) || $asset->area_meter == '')) { ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">พื้นที่</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value"><?= h($asset->area_meter . ' ตารางเมตร') ?></div>
                            <?php } ?>


                            <?php if (!(is_null($asset->area_width) || $asset->area_width == '')) { ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">หน้ากว้าง</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value"><?= h($asset->area_width . ' เมตร') ?></div>
                            <?php } ?>

                            <?php if (!(is_null($asset->area_long) || $asset->area_long == '')) { ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">ลึก</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value"><?= h($asset->area_long . ' เมตร') ?></div>
                            <?php } ?>
                                
                             <?php if (!(is_null($asset->direction) || $asset->direction == '')) { ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">หันหน้าไปทาง</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value"><?= h($asset->direction) ?></div>
                            <?php } ?>
                                

                            <?php if ($asset->iscovering == 'Y' && $asset->iscovering != '') { ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">ถมแล้ว</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value">ใช่</div>
                            <?php } ?>

                            <?php if (!(is_null($asset->floor_total) || $asset->floor_total == '')) { ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">จำนวนชั้น</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value"><?= h(is_null($asset->floor_total) ? '-' : $asset->floor_total) ?></div>
                            <?php } ?>
                                
                            <?php if (!(is_null($asset->floor) || $asset->floor == '')) { ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">อยู่ชั้นที่</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value"><?= h(is_null($asset->floor) ? '-' : $asset->floor) ?></div>
                            <?php } ?>

                            <?php if (!(is_null($asset->bedroom) || $asset->bedroom == '')) { ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">ห้องนอน</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value"><?= h(is_null($asset->bedroom) ? '-' : $asset->bedroom) ?></div>
                            <?php } ?>

                            <?php if (!(is_null($asset->bathroom) || $asset->bathroom == '')) { ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">ห้องน้ำ</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value"><?= h(is_null($asset->bathroom) ? '-' : $asset->bathroom) ?></div>
                            <?php } ?>

                            <?php if (!(is_null($asset->kitchen_room) || $asset->kitchen_room == '')) { ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">ห้องครัว</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value"><?= h(is_null($asset->kitchen_room) ? '-' : $asset->kitchen_room ) ?></div>
                            <?php } ?>

                            <?php if (!(is_null($asset->reception_room) || $asset->reception_room == '')) { ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">ห้องรับแขก</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value"><?= h(is_null($asset->reception_room) ? '-' : $asset->reception_room) ?></div>
                            <?php } ?>

                            <?php if (!(is_null($asset->dining_room) || $asset->dining_room == '')) { ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">ห้องทานอาหาร</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value"><?= h(is_null($asset->dining_room) ? '-' : $asset->dining_room ) ?></div>
                            <?php } ?>

                            <?php if (!(is_null($asset->maid_room) || $asset->maid_room == '')) { ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">ห้องแม่บ้าน</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value"><?= h(is_null($asset->maid_room) ? '-' : $asset->maid_room) ?></div>
                            <?php } ?>

                            <?php if (!(is_null($asset->parking) || $asset->parking == '')) { ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">ที่จอดรถ</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value"><?= h(is_null($asset->parking) ? '-' : $asset->parking) ?></div>
                            <?php } ?>
                            <?php if ($asset->isdweller != 'N' && $asset->isdweller != '') { ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 inofrmaition-label">มีผู้อยู่อาศัย</div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 information-value">ใช่</div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h4>สิ่งอำนวยความสะดวก</h4>
                        <div class="row amenities-info">
                            <?php foreach ($asset['asset_options'] as $a): ?>
                                <?php if ($a['option']['type'] === 'FACI') { ?>
                                    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 inofrmaition-label"><i aria-hidden="true" class="fa fa-check"></i></div>
                                    <div class="col-lg-11 col-md-11 col-sm-10 col-xs-10 information-value"><?= h($a['option']['name']) ?></div>
                                <?php } ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h4>สถานที่ใกล้เคียง</h4>
                        <div class="row amenities-info">
                            <?php foreach ($asset['asset_options'] as $a): ?>
                                <?php if ($a['option']['type'] === 'PLAC') { ?>
                                    <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 inofrmaition-label"><i aria-hidden="true" class="fa fa-check"></i></div>
                                    <div class="col-lg-11 col-md-11 col-sm-10 col-xs-10 information-value"><?= h($a['option']['name']) ?></div>
                                <?php } ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>แผนที่</h4>
                        <?= $this->Form->input('latitude', ['type' => 'hidden', 'label' => false, 'value' => $asset->latitude]); ?>
                        <?= $this->Form->input('longitude', ['type' => 'hidden', 'label' => false, 'value' => $asset->longitude]); ?>
                        <?= $this->element('google_map'); ?>
                    </div>
                </div>



            </div>
            <div class="col-md-4">
                <div class="agent-contact-sidebar">
                    <div class="agent-profile-sidebar"> 

                        <?php $image_name = isset($asset->user->useimages[0]->image->name) ? 'upload/' . $asset->user->useimages[0]->image->name : 'blog_thumb_1.jpg'; ?>
                        <?= $this->Html->image($image_name, ['alt' => '', 'class' => '']) ?>
                        <h4><?= $this->Html->link(h($asset->user->firstname . ' ' . $asset->user->lastname), '/assets/seller/' . $asset->user->id) ?></h4>
                        <p>ตัวแทนขาย</p>
                    </div>
                    <div class="agent-contact-detail-sidebar">
                        <p><i class="fa fa-phone"> </i> <?= h($asset->user->phone) ?></p>
                        <p><i class="fa fa-envelope"></i> <?= h($asset->user->email) ?></p>
                        <p>Line ID: <?= h($asset->user->lineid) ?></p>
                    </div>
                    <div class="agent-contact-form-sidebar asset_address">
                        <h4 class="f-color-red">ที่อยู่ของทรัพย์สิน</h4>
                        <?php
                        if (!(is_null($asset->address->address1) || $asset->address->address1 == ''))
                            echo '<p>หมู่บ้าน: ' . $asset->address->address1 . '</p>';

                        if (!(is_null($asset->address->soi) || $asset->address->soi == ''))
                            echo '<p>ซอย: ' . $asset->address->soi . '</p>';

                        if (!(is_null($asset->address->moo) || $asset->address->moo === ''))
                            echo '<p>หมู่: ' . $asset->address->moo . '</p>';

                        if (!(is_null($asset->address->street) || $asset->address->street == ''))
                            echo '<p>ถนน: ' . $asset->address->street . '</p>';

                        if (!(is_null($asset->address->district) || $asset->address->district == ''))
                            echo '<p>ตำบล/แขวง: ' . $asset->address->district . '</p>';

                        if (!(is_null($asset->address->amphur) || $asset->address->amphur === ''))
                            echo '<p>อำเภอ/เขต: ' . $asset->address->amphur . '</p>';

                        if (!(is_null($asset->address->province->province_name) || $asset->address->province->province_name == ''))
                            echo '<p>จังหวัด: ' . $asset->address->province->province_name . '</p>';
                        ?>
                    </div>

                </div>
                <div class="col-md-12 padding-top-20 asset_address">

                </div>
                <?= $this->element('Layouts/side_menu'); ?>
            </div>
        </div>
        </div>