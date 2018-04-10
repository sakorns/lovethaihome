
<div class="row">
    <div class="col-md-10 col-md-offset-1 text-center"> 
        <?= $this->Html->image('head-top.png', ['alt' => '']) ?>
        <h2 class="pading-10-0">ติดต่อเรา</h2>
    </div>
</div>
<div id="inner-contact-address" class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">

        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 inner-contact-border">
                <p>257/6-7 ซอยลาดพร้าว101 ถนนลาดพร้าว</p>
                <p> แขวงคลองเจ้าคุณสิงห์ เขตวังทองหลาง กรุงเทพมหานคร 10310</p>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <p>โทร : 081-442-1251 (คุณจุ๋ม), 081-565-2025 (คุณชาญวิทย์)</p>
                <p>Email : lovethaihome@gmail.com</p>
            </div>
        </div>
    </div>

</div>
<div class="inner-contact-agent-area">

    <?= $this->Form->create($contact) ?>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <?= $this->Html->image('map.jpg', ['alt' => '', 'width' => '100%']) ?>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" required="" placeholder="ชื่อ *" name="full_name">
            <input type="text" required="" placeholder="โทร *" name="tel">
            <input type="email" placeholder="อีเมล" name="email">
            <textarea required="" placeholder="ข้อความ *" name="message"></textarea>
            <input type="submit" value="ส่งข้อความ" class="send-message" name="sendmessage">
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
<div class="inner-contact-location-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1937.5172460106778!2d100.6295436074466!3d13.776793537981204!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5dcf2624cdbfecb3!2sBestland+and+Housing+Co.%2C+Ltd.!5e0!3m2!1sen!2sth!4v1481811124618" 
            width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>