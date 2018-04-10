<?php
$assetTypes = $this->request->session()->read('AssetTypes');
$articles = $this->request->session()->read('Articles');
?>

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
    <?php foreach ($articles as $a): ?>
        <h3 class="title"><?= h($a->name) ?></h3>
        <ul class="list">
             <?php foreach ($a->articles as $b): ?>
                <li><?= $this->Html->link($b->name, ['controller'=>'articles','action'=>'view',$b->id], ['escape' => false, 'target' => '_blank']) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
</div>