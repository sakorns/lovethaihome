<h2><?= h($subject) ?></h2>
<h4>คุณ <?=h($customer->fullname)?></h4>
<h3>ประเภทสินทรัพย์ <?=h($customerAsset->asset_type->name)?></h3>

<a href="<?= $site_to_view ?>"><h4>อ่านเพิ่มเติม</h4></a>