<script>
    var amphurArr = <?= $amphurs ?>;
    function amphurs_filter(province_id) {
        var amphurOption = document.getElementById("amphur-id");
        amphurOption.innerHTML = "";

        amphurOption = document.getElementById("amphur-id");
        var option = document.createElement("option");
        option.value = '';
        option.text = 'เขต/อำเภอ';
        amphurOption.appendChild(option);

        for (var i = 0; i < amphurArr.length; i++) {
            if (amphurArr[i].province_id === province_id) {
                var option = document.createElement("option");
                option.value = amphurArr[i].id;
                option.text = amphurArr[i].amphur_name;
                amphurOption.appendChild(option);
            }
        }
    }
</script>

<section class="">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="text-normal-size">สำหรับผู้ที่ต้องการซื้อบ้านมือสอง, ซื้อที่ดินหรืออสังหาริมทรัยพ์อื่นๆ ท่านสามารถที่จะเข้าไปเลือกประเภทของทรัพย์สินที่ต้องการซื้อก่อนแล้วค่อยเข้าไปเลือกโซนที่ต้องการจะซื้อ ถ้าสนใจทรัพย์สินรายการไหน ก็ค่อยเข้าไปคลิ๊กดูรายละเอียดอีกที  นอกจากนั้นเรายังมีทรัพย์สินที่ขายต่ำกว่าราคาประเมินและขายต่ำกว่าราคาตลาดให้เลือกซื้ออีกมากมาย ถ้าถูกอกถูกใจรบกวนช่วยกันกด                                               ให้ด้วยนะคะ
                    ส่วนผู้ที่ต้องการฝากขายบ้าน, ฝากขายที่ดินหรืออสังหาริมทรัพย์อื่นๆ ในเขตกรุงเทพฯ และปริมณฑล ทางบริษัทเบสท์แลนด์ แอนด์ เฮ้าส์ซิ่ง จำกัด ดำเนินกิจการเป็นตัวแทนขายอสังหาริมทรัพย์โดยใช้แบรนด์ ERA เป็นแห่งแรกของประเทศไทย ดำเนินกิจการมากกว่า 30 ปี ทำหน้าที่ช่วยโฆษณาประชาสัมพันธ์ในช่องทางต่างๆ ให้กับผู้ที่ได้ทำการฝากขายทรัพย์สินนั้นๆ ไว้กับทางบริษัท โดยจะไม่มีการเก็บค่าโฆษณาประชาสัมพันธ์แต่อย่างใด (ฟรี!)  
                    ซึ่งทางบริษัทได้มีการโฆษณาเว็บไซต์ <?= $this->Html->link('www.lovethaihome.com', HOME_URL); ?> ไว้กับทาง Google AdWords และเว็บไซต์อื่นๆมากกว่า 200 เว็บ, ทำ SEO (Search Engine Optimization), ติดป้าย, ถ่ายรูปทรัพย์สินเพื่อลงโฆษณาทั้งในหนังสือขายบ้านและอินเตอร์เนท และช่วยแนะนำหาราคาขายที่เหมาะสมโดยมีพนักงานในเครือข่ายของ ERA มากกว่า 1,000 คน ช่วยกันขาย, มีบริการจัดหาสินเชื่อ (ในกรณีที่ผู้ซื้อต้องการขอสินเชื่อ), ช่วยคิดคำนวณค่าใช้จ่ายในการโอน และพาไปโอนที่สำนักงานที่ดินจนกว่าจะเสร็จ แล้วถึงค่อยคิดค่าบริการ 3% จากราคาที่ขายได้ (ไม่ใช่ราคาตั้งขาย) และจะไม่มีการบวกราคาขายโดยเด็ดขาด ถ้าทรัพย์สินที่ขายได้ต่ำกว่า 1 ล้านบาท ทางบริษัทจะคิดค่าบริการ 30,000 บาท จ่าย ณ วันโอนกรรมสิทธิ์ที่สำนักงานที่ดิน
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 padding-top-20">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/pgsxipi2RO0?rel=0&amp;controls=0&amp;showinfo=0&autoplay=1" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>

        </div>

    </div>
</section>

<section >
    <div class="container">
        <div class="row property-list-area padding-top-20">
            <div class="active carousel slide carousel-slide-recent-property" data-target="Residential">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <?= $this->Html->image('banner_index.png', ['alt' => '', 'width' => '100%']) ?>
                        </div>
                    </div>

                    <?php $count = 1; ?>
                    <?php foreach ($assetTypes as $a): ?>
                        <?php
                        if ($count == 1 || $count % 3 == 0) {
                            echo '<div class="row">';
                        }
                        ?>
                        <div class="col-md-6 text-center">
                            <div class="image-with-label">
                                <?php
                                $pic_name = 'recent-property-1.png';
                                if ($a->pic != null) {
                                    $pic_name = 'upload/' . $a->pic;
                                }
                                ?>

                                <?= $this->Html->link($this->Html->image($pic_name, ['class' => 'img-responsive asset-image', 'alt' => '']), '/assets/index/' . $a->id, ['escape' => false]) ?>
                            </div>
                            <?= $this->Html->link('<h4>' . h($a->name) . ' [' . h(sizeof($a->assets)) . ' รายการ]' . '</h4>', '/assets/index/' . $a->id, ['escape' => false]) ?>

                        </div>

                        <?php
                        if ($count == sizeof($assetTypes) || ($count % 2 == 0 && $count != 1 )) {
                            echo '</div>';
                        }
                        ?>
                        <?php $count++; ?>
                    <?php endforeach; ?>


                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="pading-20-0">ทรัพย์สินที่น่าสนใจ</h2>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="image-with-label">
                                <?php
                                $pic_name = 'special_appraised_cover.jpg';
                                $link = '/assets/lists?selltype=special_appraised';
                                ?>
                                <?= $this->Html->link($this->Html->image($pic_name, ['class' => 'img-responsive asset-image', 'alt' => '']), $link, ['escape' => false]) ?>
                            </div>
                            <?= $this->Html->link('<h4>ทรัพย์สินขายต่ำกว่าราคาประเมิน</h4>', $link, ['escape' => false]) ?>

                        </div>
                        <div class="col-md-6 text-center">
                            <div class="image-with-label">
                                <?php
                                $pic_name = 'special_marketprice_cover.jpg';
                                $link='/assets/lists?selltype=special_marketprice';
                                ?>
                                <?= $this->Html->link($this->Html->image($pic_name, ['class' => 'img-responsive asset-image', 'alt' => '']), $link, ['escape' => false]) ?>
                            </div>
                            <?= $this->Html->link('<h4>ขายทรัพย์ต่ำกว่าราคาตลาด</h4>', $link, ['escape' => false]) ?>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="col-md-12 no-pading-left no-pading-right hidden-xs padding-bottom-64">
                        
                            <h3 class="f-color-black text-center" style="font-size: 32px !important;padding-bottom: 10px;">ค้นหาทรัพย์สิน</h3>
                            <?= $this->Form->create('', ['url' => ['controller' => 'assets', 'action' => 'formsearch'], 'class' => '']) ?>
                            <div class="form-group">
                                <?= $this->Form->input('code', ['class' => 'form-control', 'label' => false, 'placeholder' => 'รหัสทรัพย์สิน']) ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->input('asset_type_id', ['class' => 'form-control', 'label' => false, 'options' => $assetTypeList, 'empty' => 'หมวดหมู่สินทรัพย์']) ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->input('province_id', ['class' => 'form-control', 'label' => false, 'options' => $provinces, 'empty' => 'จังหวัด', 'onchange' => 'amphurs_filter(this.value)']) ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->input('amphur_id', ['class' => 'form-control', 'label' => false, 'options' => '', 'empty' => 'เขต/อำเภอ']) ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->input('user_id', ['class' => 'form-control', 'label' => false, 'options' => $users, 'empty' => 'ตัวแทนขาย']) ?>
                            </div>
                            <label class="f-color-black">ช่วงราคา</label>
                            <div class="form-group">

                                <div class="col-md-6 no-pading-left">
                                    <?= $this->Form->input('price_start', ['class' => 'form-control', 'label' => false, 'options' => $price_start, 'empty' => true]) ?>
                                </div>
                                <div class="col-md-6 no-pading-right">
                                    <?= $this->Form->input('price_end', ['class' => 'form-control', 'label' => false, 'options' => $price_end, 'empty' => true]) ?>
                                </div>
                            </div>


                            <?= $this->Form->button('ค้นหา', ['class' => 'bt-main']) ?>
                            <?= $this->Form->end() ?>
                       

                    </div>
                    <div class="menu-sidebar">
                        <?= $this->Html->link('<button type="submit">ฝากขายบ้าน-ที่ดิน</button>', SALES_HOME_URL, ['escape' => false]) ?>
                        <?= $this->Html->link('<button type="submit">ฝากหาบ้าน-ที่ดิน</button>', PURCHASE_HOME_URL, ['escape' => false]) ?>
                        <?= $this->Html->link('<button type="submit">แผนบริการ</button>', SERVICE_URL, ['escape' => false]) ?>
                        <?= $this->Html->link('<button type="submit">ข้อดีของการฝากขาย</button>', ADVAN_URL, ['escape' => false]) ?>
                        <?= $this->Html->link('<button type="submit">รายชื่อตัวแทนขาย</button>', SELLER_URL, ['escape' => false]) ?>
                        <?= $this->Html->link('<button type="submit">สมัครงาน</button>', JOB_URL, ['escape' => false]) ?>
                        <?= $this->Html->link('<button type="submit">ติดต่อเรา</button>', CONTACT_URL, ['escape' => false]) ?>
                    </div>
                    <div class="menu-sidebar">
                        <div class="col-md-12 hidden-md hidden-lg hidden-sm">
                            <div class="box-item bg-color-white" style="padding: 10px;margin-top: 20px;">
                                <h3 class="f-color-gray text-center" style="font-size: 24px !important;padding-bottom: 10px;">ค้นหาทรัพย์สิน</h3>
                                <?= $this->Form->create('', ['url' => ['controller' => 'assets', 'action' => 'formsearch'], 'class' => '']) ?>
                                <div class="form-group">
                                    <?= $this->Form->input('code', ['class' => 'form-control', 'label' => false, 'placeholder' => 'รหัสทรัพย์สิน']) ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('asset_type_id', ['class' => 'form-control', 'label' => false, 'options' => $assetTypeList, 'empty' => 'หมวดหมู่สินทรัพย์']) ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('province_id', ['class' => 'form-control', 'label' => false, 'options' => $provinces, 'empty' => 'จังหวัด', 'onchange' => 'amphurs_filter(this.value)']) ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('amphur_id', ['class' => 'form-control', 'label' => false, 'options' => '', 'empty' => 'เขต/อำเภอ']) ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('user_id', ['class' => 'form-control', 'label' => false, 'options' => $users, 'empty' => 'ตัวแทนขาย']) ?>
                                </div>
                                <label class="f-color-black">ช่วงราคา</label>
                                <div class="form-group">

                                    <div class="col-md-6 no-pading-left">
                                        <?= $this->Form->input('price_start', ['class' => 'form-control', 'label' => false, 'options' => $price_start, 'empty' => true]) ?>
                                    </div>
                                    <div class="col-md-6 no-pading-right">
                                        <?= $this->Form->input('price_end', ['class' => 'form-control', 'label' => false, 'options' => $price_end, 'empty' => true]) ?>
                                    </div>
                                </div>


                                <?= $this->Form->button('ค้นหา', ['class' => 'bt-main']) ?>
                                <?= $this->Form->end() ?>
                            </div>

                        </div>

                    </div>
                    <div class="menu-sidebar">
                        <h3 class="title">ประเภทของทรัพย์สิน</h3>
                        <ul class="list">
                            <?php foreach ($assetTypes as $a): ?>
                                <li><?= $this->Html->link(h($a->name), '/assets/index/' . h($a->id), ['escape' => false]) ?></li>
                            <?php endforeach; ?>
                        </ul>

                        <?= $this->Html->link('<button type="submit" class="blink">ทรัพย์สินขายต่ำกว่าราคาประเมิน</button>', '/assets/lists?selltype=special_appraised', ['escape' => false, 'class' => '']) ?>
                        <?= $this->Html->link('<button type="submit" class="blink">ทรัพย์สินที่ขายต่ำกว่าราคาตลาด</button>', '/assets/lists?selltype=special_marketprice', ['escape' => false]) ?>
                    </div>
                    <div class="menu-sidebar">
                        <h3 class="title">ลิงค์เว็บไซด์ที่เกี่ยวข้อง</h3>
                        <ul class="list">
                            <li><?= $this->Html->link('ตรวจสอบราคาประเมิน', 'http://property.treasury.go.th/pvmwebsite/index.asp ', ['escape' => false, 'target' => '_blank']) ?></li>
                            <li><?= $this->Html->link('ค้นหาตำแหน่งแปลงที่ดิน', 'http://dolwms.dol.go.th/tvwebp/', ['escape' => false, 'target' => '_blank']) ?></li>
                            <li><?= $this->Html->link('หนังสือมอบอำนาจของกรมที่ดิน', 'http://www.dol.go.th/dol/index.php?option=com_content&task=view&id=1158', ['escape' => false, 'target' => '_blank']) ?></li>
                        </ul>
                    </div>
                    <div class="menu-sidebar">
                        <?= $this->Html->link('<button type="submit">สัญญาแต่งตั้งตัวแทนขาย</button>', PDF_SITE_URL . 'สัญญาแต่งตั้งตัวแทนขาย.pdf', ['escape' => false, 'target' => '_blank']) ?>
                        <?= $this->Html->link('<button type="submit">สัญญาจะซื้อจะขาย</button>', PDF_SITE_URL . 'สัญญาจะซื้อจะขายหรือสัญญาวางเงินมัดจำ.pdf', ['escape' => false, 'target' => '_blank']) ?>
                        <?= $this->Html->link('<button type="submit">ที่ตั้งของบริษัท</button>', CONTACT_URL, ['escape' => false]) ?>
                    </div>

                    <div class="menu-sidebar">
                        <?php $articles = $this->request->session()->read('Articles'); ?>
                        <?php foreach ($articles as $a): ?>
                            <h3 class="title"><?= h($a->name) ?></h3>
                            <ul class="list">
                                <?php foreach ($a->articles as $b): ?>
                                    <li><?= $this->Html->link($b->name, ['controller' => 'articles', 'action' => 'view', $b->id], ['escape' => false, 'target' => '_blank']) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>