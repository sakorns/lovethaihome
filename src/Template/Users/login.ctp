<div class="page-content">
    <div class="container">
        <div class="row">
            <!-- Login card -->
            <div class="col-md-6 col-md-offset-3">
                <?= $this->Flash->render('auth') ?>
                <?= $this->Flash->render() ?>

                <div class="card">
                    <h3 class="card-header h4">Login</h3>
                    <div class="card-block">
                        <?= $this->Form->create('Users', ['class' => '','novalidate' => true]) ?>
                        <div class="form-group">
                            <?= $this->Form->input('email', ['class' => 'form-control', 'placeholder' => '']) ?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->input('password', ['class' => 'form-control', 'placeholder' => '']) ?>
                        </div>
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="<?=$site_key?>"></div>
                        </div>
                        <?= $this->Form->button(__('Login'), ['class' => 'btn btn-app btn-block']) ?>
                        <?= $this->Form->end() ?>
                        
                        <div class="form-group p-t-md">
                            <?= $this->Html->link('Forgot Your Password?', '/users/forgot') ?>
                        </div>
                    </div>
                    <!-- .card-block -->
                </div>
                <!-- .card -->
            </div>
            <!-- .col-md-6 -->
            <!-- End login -->

        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</div>