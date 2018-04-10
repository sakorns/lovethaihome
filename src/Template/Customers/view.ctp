<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customer Assets'), ['controller' => 'CustomerAssets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer Asset'), ['controller' => 'CustomerAssets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customers view large-9 medium-8 columns content">
    <h3><?= h($customer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($customer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fullname') ?></th>
            <td><?= h($customer->fullname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tel') ?></th>
            <td><?= h($customer->tel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($customer->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lineid') ?></th>
            <td><?= h($customer->lineid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($customer->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Customer Assets') ?></h4>
        <?php if (!empty($customer->customer_assets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Asset Type Id') ?></th>
                <th scope="col"><?= __('Asset Type Des') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Floor Total') ?></th>
                <th scope="col"><?= __('Bedroom') ?></th>
                <th scope="col"><?= __('Bathroom') ?></th>
                <th scope="col"><?= __('Kitchen Room') ?></th>
                <th scope="col"><?= __('Reception Room') ?></th>
                <th scope="col"><?= __('Dining Room') ?></th>
                <th scope="col"><?= __('Maid Room') ?></th>
                <th scope="col"><?= __('Parking') ?></th>
                <th scope="col"><?= __('Area Rai') ?></th>
                <th scope="col"><?= __('Area Ngan') ?></th>
                <th scope="col"><?= __('Area Wah') ?></th>
                <th scope="col"><?= __('Area Meter') ?></th>
                <th scope="col"><?= __('Price Per Wah') ?></th>
                <th scope="col"><?= __('Price Amounnt') ?></th>
                <th scope="col"><?= __('Isreqconsult') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->customer_assets as $customerAssets): ?>
            <tr>
                <td><?= h($customerAssets->id) ?></td>
                <td><?= h($customerAssets->customer_id) ?></td>
                <td><?= h($customerAssets->description) ?></td>
                <td><?= h($customerAssets->asset_type_id) ?></td>
                <td><?= h($customerAssets->asset_type_des) ?></td>
                <td><?= h($customerAssets->created) ?></td>
                <td><?= h($customerAssets->floor_total) ?></td>
                <td><?= h($customerAssets->bedroom) ?></td>
                <td><?= h($customerAssets->bathroom) ?></td>
                <td><?= h($customerAssets->kitchen_room) ?></td>
                <td><?= h($customerAssets->reception_room) ?></td>
                <td><?= h($customerAssets->dining_room) ?></td>
                <td><?= h($customerAssets->maid_room) ?></td>
                <td><?= h($customerAssets->parking) ?></td>
                <td><?= h($customerAssets->area_rai) ?></td>
                <td><?= h($customerAssets->area_ngan) ?></td>
                <td><?= h($customerAssets->area_wah) ?></td>
                <td><?= h($customerAssets->area_meter) ?></td>
                <td><?= h($customerAssets->price_per_wah) ?></td>
                <td><?= h($customerAssets->price_amounnt) ?></td>
                <td><?= h($customerAssets->isreqconsult) ?></td>
                <td><?= h($customerAssets->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CustomerAssets', 'action' => 'view', $customerAssets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CustomerAssets', 'action' => 'edit', $customerAssets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CustomerAssets', 'action' => 'delete', $customerAssets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerAssets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
