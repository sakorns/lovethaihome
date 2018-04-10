<!-- Drawer -->
<?php 
$control = strtolower($this->request->params['controller']);
$action = strtolower($this->request->params['action']);
?>
<aside class="app-layout-drawer">
    <!-- Drawer scroll area -->
    <div class="app-layout-drawer-scroll">
        <!-- Drawer logo -->
        <div id="logo" class="drawer-header">
            <a class="navbar-brand" href="javascript:void(0)">
                <?= $this->Html->image('admin/logo/logo-backend.png', ['alt' => '', 'class' => 'img-responsive', 'style' => 'height: 55px !important;']); ?>
            </a>
        </div>
        <!-- Drawer navigation -->
        <nav class="drawer-main">
            <ul class="nav nav-drawer">
                <?php $arr = ['class' => '', 'target' => '', 'escape' => false] ?>

                <li class="nav-item <?=($control==='adminhomes'?'active':'')?>">
                    <?= $this->Html->link('<i class="ion-ios-speedometer-outline"></i> หน้าหลัก', '/admin-homes', $arr); ?>
                </li>
                <li class="nav-item <?=(($control==='customerassets' && $action==='sales')?'active':'')?>">
                    <?= $this->Html->link('<i class="ion-ios-pricetag"></i> ลูกค้าฝากขายบ้าน-ที่ดิน', '/customer-assets/sales', $arr); ?>
                </li>
                <li class="nav-item <?=(($control==='customerassets' && $action==='purchase')?'active':'')?>">
                    <?= $this->Html->link('<i class="ion-ios-search-strong"></i> ลูกค้าฝากหาบ้าน-ที่ดิน', '/customer-assets/purchase', $arr); ?>
                </li>
                <li class="nav-item <?=(($control==='adminasset')?'active':'')?>">
                    <?= $this->Html->link('<i class="ion-android-home"></i> รายการทรัพย์สิน', '/admin-asset', $arr); ?>
                </li>
                <!--
                <li class="nav-item nav-item-has-subnav">
                    <a href="javascript:void(0)"><i class="ion-android-home"></i> รายการทรัพย์สิน</a>
                    <ul class="nav nav-subnav" style="display: none;">
                        <li>
                            <a href="base_ui_widgets.html">Widgets</a>
                        </li>

                    </ul>
                </li>
                -->

                <li class="nav-item nav-drawer-header">ข้อมูลหลัก</li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="ion-ios-paper"></i> ประเภทของทรัพย์สิน', '/asset-types', $arr); ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="ion-ios-paper"></i> โซน', '/zones', $arr); ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="ion-person-stalker"></i> ตัวแทนขาย', '/seller', $arr); ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="ion-ios-star"></i> สิ่งอำนวยความสะดวก', '/options/index/faci', $arr); ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="ion-ios-star"></i> สถานที่ใกล้เคียง', '/options/index/plac', $arr); ?>
                </li>
                <li class="nav-item nav-drawer-header">บทความ</li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="ion-ios-paper"></i> บทความ', '/articles', $arr); ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="ion-ios-paper"></i> ประเภทของบทความ', '/categories', $arr); ?>
                </li>
                <li class="nav-item nav-drawer-header">ตั้งค่า</li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="ion-ios-paper"></i> ตั้งค่าอีเมล', '/settings/mail', $arr); ?>
                </li>
                
                
                
            </ul>
        </nav>
        <!-- End drawer navigation -->
    </div>
    <!-- End drawer scroll area -->
</aside>
<!-- End drawer -->