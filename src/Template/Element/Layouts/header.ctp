<!-- Slider Start -->
<?php
$arrLogo = ['alt' => '', 'class' => 'img-responsive'];
?>
<section id="main-slider" class="carousel">
    <div class="carousel slide">
        <div class="carousel-inner">
            <div class="item active banner-1">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content">
                                <div class="header-logo-title">
                                    <div class="row ">
                                        <div class="col-md-12 text-left ">  
                                            <?= $this->Html->image('header_bar.png', $arrLogo) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider-text  animated-item-5 pull-right">
                                    <?= $this->Html->image('announce_icon.png', $arrLogo) ?>
                                    <div class="box-heading animated-item-1">
                                        <div class="box-item">
                                            <p>คุณจุ๋ม</p>
                                            <h1>081-442-1251</h1>
                                        </div>

                                        <div class="box-item">
                                            <p>คุณชาญวิทย์</p>
                                            <h1>081-565-2025</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.item-->

            <div class="item banner-2" >
                <div class="container text-center">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="carousel-content">
                                <div class="header-logo-title">
                                    <div class="row ">
                                        <div class="col-md-12 text-left">  
                                            <?= $this->Html->image('header_bar.png', $arrLogo) ?>
                                        </div>

                                    </div>
                                </div>

                                <div class="slider-text animation animated-item-4">
                                    <?= $this->Html->image('announce_icon.png', $arrLogo) ?>
                                    <div class="box-heading animated-item-1">
                                        
                                        <div class="box-item">
                                            <p>คุณจุ๋ม</p>
                                            <h1>081-442-1251</h1>
                                        </div>

                                        <div class="box-item">
                                            <p>คุณชาญวิทย์</p>
                                            <h1>081-565-2025</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.item-->

            <div class="item banner-3">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content">
                                <div class="header-logo-title">
                                    <div class="row ">
                                        <div class="col-md-12 text-left">  
                                            <?= $this->Html->image('header_bar.png', $arrLogo) ?>
                                        </div>

                                    </div>
                                </div>

                                <div class="slider-text animation animated-item-1 pull-right">
                                    <?= $this->Html->image('announce_icon.png', $arrLogo) ?>
                                    <div class="box-heading animated-item-1">
                                        <div class="box-item">
                                            <p>คุณจุ๋ม</p>
                                            <h1>081-442-1251</h1>
                                        </div>

                                        <div class="box-item">
                                            <p>คุณชาญวิทย์</p>
                                            <h1>081-565-2025</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.item--> 
        </div>
    </div>
    <!--/.carousel--> 
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev"> <i class="fa fa-chevron-left"></i> </a> <a class="next hidden-xs" href="#main-slider" data-slide="next"> <i class="fa fa-chevron-right"></i> </a> 
</section>
<!-- Slider Ends --> 


<div class="container">
    <div class="row ">
        <div class="col-md-12 text-center">

            <div class="centerDiv">
                <ul class="centerUL">
                    <?php
                    $objArr = ['class' => '', 'target' => '', 'escape' => false];
                    ?>
                    <li><?= $this->Html->link('หน้าหลัก', HOME_URL, $objArr); ?></li>
                    <li><?= $this->Html->link('รับฝากขายบ้าน-ที่ดิน', SALES_HOME_URL, $objArr); ?></li>
                    <li><?= $this->Html->link('ฝากหาบ้าน-ที่ดิน', PURCHASE_HOME_URL, $objArr); ?></li>
                    <li><?= $this->Html->link('แผนบริการ', SERVICE_URL, $objArr); ?></li>
                    <li><?= $this->Html->link('ข้อดีของการฝากขาย', ADVAN_URL, $objArr); ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>