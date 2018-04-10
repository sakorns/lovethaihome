<script type="text/javascript">
    $(document).ready(function () {
        $( "#closesocialbox" ).click(function() {
            $( ".social-box" ).remove();
        });
    });

</script>

<div class="social-box">
    <div class="closesocialbox-bt">
        <a href="javascript:void(0)" name="closesocialbox" class="closesocialbox-bt" id="closesocialbox">CLOSE</a>
    </div>
    
    <div class="box">
        <a class="" href="https://www.facebook.com/Lovethaihomeera" target="_blank">
            <?= $this->Html->image('social_icon/1482860802_facebook.png', []); ?>
        </a>
    </div>
    <div class="box">
        <a class="" href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal">
            <?= $this->Html->image('social_icon/1482860750_line.png', []); ?>
        </a>
    </div>
    <div class="box">
        <a class="" href="https://twitter.com/CharnwitEra" target="_blank">
            <?= $this->Html->image('social_icon/1482861087_twitter.png', []); ?>
        </a>
    </div>
    <div class="box">
        <a class="" href="https://www.instagram.com/lovethaihome/" target="_blank">
            <?= $this->Html->image('social_icon/1482861124_instagram.png', []); ?>
        </a>
    </div>
    <div class="box">
        <a class="" href="https://www.youtube.com/channel/UCT-gc8mqDNfTHrV9uALFaYQ" target="_blank">
            <?= $this->Html->image('social_icon/1482860820_youtube.png', []); ?>
        </a>
    </div>
    <div class="box">
        <a class="" href="https://plus.google.com/u/0/communities/116688121039261255491" target="_blank">
            <?= $this->Html->image('social_icon/1482861180_google_plus.png', []); ?>
        </a>
    </div>
    <div class="box">
    <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FLovethaihomeera&width=100&layout=button&action=like&size=large&show_faces=false&share=false&height=30&appId" width="100" height="30" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>    
    <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fwww.facebook.com%2FLovethaihomeera&layout=button&size=large&mobile_iframe=true&width=100&height=30&appId" width="100" height="30" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"></h4>
            </div>
            <div class="modal-body">
                <h4>Line ID: 0815652025</h4>
                <?= $this->Html->image('social_icon/line_qr.png', []); ?>
            </div>

        </div>
    </div>
</div>