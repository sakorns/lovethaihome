<h2><?= h($asset->name) ?></h2>
<h4 class="">รหัสสินทรัพย์: <?= h($asset->code) ?></h4>
<h4 class="">ราคา: <?= $this->Number->currency($asset->price_amounnt, 'THB', ['precision' => 1]) ?></h4>
<?php if (!is_null($asset->price_per_wah) && $asset->price_per_wah != '') { ?>
    <h4 class="">ราคาต่อตารางวา: <?= $this->Number->currency($asset->price_per_wah, 'THB', ['precision' => 1]) ?></h4>
<?php } ?>
<?php if ($asset->description != '') { ?>

    <p><?= nl2br($asset->description) ?></p>

<?php } ?>

<a href="<?= SITE_URL . 'assets/view/' . $asset->id ?>"><h4>อ่านเพิ่มเติม</h4></a>