<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customerAsset->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customerAsset->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Customer Assets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Asset Types'), ['controller' => 'AssetTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Asset Type'), ['controller' => 'AssetTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customerAssets form large-9 medium-8 columns content">
    <?= $this->Form->create($customerAsset) ?>
    <fieldset>
        <legend><?= __('Edit Customer Asset') ?></legend>
        <?php
            echo $this->Form->input('customer_id', ['options' => $customers]);
            echo $this->Form->input('description');
            echo $this->Form->input('asset_type_id', ['options' => $assetTypes]);
            echo $this->Form->input('asset_type_des');
            echo $this->Form->input('floor_total');
            echo $this->Form->input('bedroom');
            echo $this->Form->input('bathroom');
            echo $this->Form->input('kitchen_room');
            echo $this->Form->input('reception_room');
            echo $this->Form->input('dining_room');
            echo $this->Form->input('maid_room');
            echo $this->Form->input('parking');
            echo $this->Form->input('area_rai');
            echo $this->Form->input('area_ngan');
            echo $this->Form->input('area_wah');
            echo $this->Form->input('area_meter');
            echo $this->Form->input('price_per_wah');
            echo $this->Form->input('price_amounnt');
            echo $this->Form->input('isreqconsult');
            echo $this->Form->input('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
