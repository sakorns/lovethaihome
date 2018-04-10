<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="robots" content="index,follow" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <meta name="description" content="รับปรึกษาเรื่องการซื้อ-รับฝากขายบ้าน-รับฝากขายที่ดินและอสังหาฯอื่นๆ ขายบ้าน ซื้อบ้าน ขายที่ดิน ซื้อที่ดิน รับขายบ้าน รับขายที่ดิน ฝากขายบ้าน ฝากขายที่ดิน บ้านมือสอง บ้านเดี่ยว ทาวน์เฮาส์ ตึกแถว คอนโด" />
        <meta name="keywords" content="ขายบ้าน,ซื้อบ้าน,ขายที่ดิน,ซื้อที่ดิน,รับขายบ้าน,รับขายที่ดิน,ฝากขายบ้าน,ฝากขายที่ดิน,บ้านมือสอง,บ้านเดี่ยว,ทาวน์เฮาส์,ตึกแถว,คอนโด,ตำ่กว่าประเมิน,ต่ำกว่าตลาด,สมัครงานขายบ้าน ,era,ราคาถูก,ขายถูก,นายหน้าขายบ้าน,นายหน้าขายที่ดิน,บ้านย่าน,ที่ดินย่าน,ออฟฟิศ,หมู่บ้าน,ถนน,ซอย,ติดถนน" />
        <meta name="author" content="lovethaihome.com" />
        <title><?= (isset($title) ? $title : '') ?> | รับปรึกษาเรื่องการซื้อ-รับฝากขายบ้าน-รับฝากขายที่ดินและอสังหาฯอื่นๆ</title>
        <?= $this->Html->meta('icon') ?>
        <?= $this->Html->css('master.css') ?>
        <?= $this->Html->script('jquery-2.2.3.min.js') ?>
        <?= $this->Html->script('jquery.bxslider.js') ?>
        <?= $this->Html->css('jquery.bxslider.css') ?>
        <link rel="shortcut icon" href="img/heading-icon.png">
    </head>
    <body>
        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-92171168-1', 'auto');
            ga('send', 'pageview');

        </script>
        <div id="page-load" style="display: none;" class="page_loader">
            <?= $this->Html->image('page_load.gif', ['style' => 'opacity:1.0;']) ?>
        </div>


        <!-- Header Start -->
        <?= $this->element('Layouts/header'); ?>
        <!-- Header Ends --> 

        <div class="container">
            <div class="row padding-top-20">
                <div class="col-md-9">
                    <?= $this->fetch('content') ?>
                </div>
                <div class="col-md-3">
                    <?= $this->element('Layouts/side_menu'); ?>
                </div>
            </div>
        </div>


        <?= $this->element('Layouts/footer'); ?>


        <?= $this->Html->script('bootstrap.min.js') ?>
        <?= $this->Html->script('owl.carousel.min.js') ?>
        <?= $this->Html->script('wow.min.js') ?>
        <?= $this->Html->script('modernizr-2.8.3.min.js') ?>
        <?= $this->Html->script('range-Slider.min.js') ?>
        <?= $this->Html->script('selectbox-0.2.min.js') ?>
        <?= $this->Html->script('select2.min.js') ?>
        <?= $this->Html->script('megamenu.js') ?>
        <?= $this->Html->script('jquery.scrollUp.min.js') ?>
        <?= $this->Html->script('classie.js') ?>
        <?= $this->Html->script('modernizr.custom.js') ?>
        <?= $this->Html->script('custom-js.js') ?>
        <?= $this->element('social_box'); ?>
        <script>
             $(document).ready(function () {
                $(window).bind("beforeunload", function () {
                    $('#page-load').show();
                });
            });
        </script>
    </body>
</html>