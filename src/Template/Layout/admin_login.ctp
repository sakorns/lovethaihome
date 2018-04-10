<!DOCTYPE html>

<html class="app-ui">

    <head>
        <!-- Meta -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

        <!-- Document title -->
        <title><?= $this->fetch('title') ?></title>

        <meta name="description" content="AppUI - Admin Dashboard Template & UI Framework" />
        <meta name="author" content="rustheme" />
        <meta name="robots" content="noindex, nofollow" />

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="assets/img/favicons/apple-touch-icon.png" />
        <link rel="icon" href="assets/img/favicons/favicon.ico" />

        <!-- Google fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,900%7CRoboto+Slab:300,400%7CRoboto+Mono:400" />

        <!-- AppUI CSS stylesheets -->
        <?= $this->Html->css('admin/font-awesome.css', ['id' => 'css-font-awesome']) ?>
        <?= $this->Html->css('admin/ionicons.css', ['id' => 'css-ionicons']) ?>
        <?= $this->Html->css('admin/bootstrap.css', ['id' => 'css-bootstrap']) ?>
        <?= $this->Html->css('admin/app.css', ['id' => 'css-app']) ?>
        <?= $this->Html->css('admin/app-custom.css', ['id' => 'css-app-custom']) ?>
        <!-- End Stylesheets -->
        <script src='https://www.google.com/recaptcha/api.js'></script>
        
    </head>

    <body class="app-ui">
        <div class="app-layout-canvas">
            <div class="app-layout-container">
                <main class="app-layout-content">
                    <?= $this->fetch('content') ?>
                </main>
               
            </div>
        </div>


        <!-- AppUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock and App.js -->
        <?= $this->Html->script('admin/core/jquery.min.js') ?>
        <?= $this->Html->script('admin/core/bootstrap.min.js') ?>
        <?= $this->Html->script('admin/core/jquery.slimscroll.min.js') ?>
        <?= $this->Html->script('admin/core/jquery.scrollLock.min.js') ?>
        <?= $this->Html->script('admin/core/jquery.placeholder.min.js') ?>
        <?= $this->Html->script('admin/app.js') ?>
        <?= $this->Html->script('admin/app-custom.js') ?>

    </body>

</html>