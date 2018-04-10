<section style="padding: 0 !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="bxslider paddin-0">
                     <li><?= $this->Html->image('footer_slide/8.jpg', []) ?></li>
                    <li><?= $this->Html->image('footer_slide/9.jpg', []) ?></li>
                    <li><?= $this->Html->image('footer_slide/1.jpg', []) ?></li>
                    <li><?= $this->Html->image('footer_slide/2.jpg', []) ?></li>
                    <li><?= $this->Html->image('footer_slide/5.jpg', []) ?></li>
                    <li><?= $this->Html->image('footer_slide/6.jpg', []) ?></li>
                    <li><?= $this->Html->image('footer_slide/7.jpg', []) ?></li>
                    <li><?= $this->Html->image('footer_slide/3.jpg', []) ?></li>
                    <li><?= $this->Html->image('footer_slide/4.jpg', []) ?></li>
                
                    <li><?= $this->Html->image('footer_slide/10.jpg', []) ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<footer id="footer"><!--Footer-->
    <div class="footer-widget f-color-white">
        <div class="container">

            <div class="row">
                <div class="col-sm-4">
                    <div class="single-widget">
                        <h2>ABOUT US</h2>
                        <p>
                            บริษัทเบสท์แลนด์ แอนด์ เฮ้าส์ซิ่ง จำกัด  บริการให้คำปรึกษา เรื่องซื้อ-รับฝากขายบ้าน รับฝากขายที่ดิน และอสังหาริมทรัพย์อื่นๆ ในเขตกรุงเทพฯ และปริมณฑล
                        </p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-widget">
                        <h2>GET IN TOUCH</h2>
                        <table>
                            <tr valign="top">
                                <td align="left" style="padding-right: 10px;"><strong>Address</strong></td>
                                <td>257/6-7 ซอยลาดพร้าว101 ถนนลาดพร้าว แขวงคลองเจ้าคุณสิงห์ เขตวังทองหลาง กรุงเทพมหานคร 10310</td>
                            </tr>
                            <tr valign="top">
                                <td align="left"><strong>Phone</strong></td>
                                <td>081-442-1251 (คุณจุ๋ม)<br/> 081-565-2025 (คุณชาญวิทย์)</td>
                            </tr>
                            <tr valign="top">
                                <td align="left"><strong>Email</strong></td>
                                <td>lovethaihome@gmail.com</td>
                            </tr>
                        </table>
                    </div>
                </div>


                <div class="col-sm-4">
                    <div class="single-widget">
                        <h2>SOCIAL MEDIA</h2>
                       <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FLovethaihomeera&tabs=timeline&width=340&height=200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="340" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                    </div>
            </div>

            <div class="row ">
                <div class="col-md-12 text-center">

                    <div class="foorter-menu">
                        <ul class="foorter-menu-ul">
                            <?php
                            $objArr = ['class' => '', 'target' => '', 'escape' => false];
                            ?>
                            <li><?= $this->Html->link('หน้าหลัก', HOME_URL, $objArr); ?></li>
                            <li><?= $this->Html->link('รับฝากขายบ้าน-ที่ดิน', SALES_HOME_URL, $objArr); ?></li>
                            <li><?= $this->Html->link('ฝากหาบ้าน-ที่ดิน', PURCHASE_HOME_URL, $objArr); ?></li>
                            <li><?= $this->Html->link('แผนบริการ', SERVICE_URL, $objArr); ?></li>
                            <li><?= $this->Html->link('ข้อดีของการฝากขาย', ADVAN_URL, $objArr); ?></li>
                            <li><?= $this->Html->link('สมัครงาน', JOB_URL, $objArr); ?></li>
                            <li><?= $this->Html->link('รายชื่อตัวแทนขาย', SELLER_URL, $objArr); ?></li>
                            <li><?= $this->Html->link('เข้าสู่ระบบ', LOGIN_URL, $objArr); ?></li>
                            <li><?= $this->Html->link('ติดต่อเรา', CONTACT_URL, $objArr); ?></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row text-center">
                <p class="">Copyright © 2017 <a href="http://www.lovethaihome.com/">lovethaihome.com</a> All rights reserved. | Developed by: <a href="https://www.fdtech.co.th" target="_blank">FDTech LTD.,</a></p>
            </div>
        </div>
    </div>
</footer>

<script>
    $('.bxslider').bxSlider({
        minSlides: 8,
        maxSlides: 8,
        slideWidth: 600,
        slideMargin: 0,
        ticker: true,
        tickerHover:true,
        speed: 20000,
        responsive:true
    });
</script>