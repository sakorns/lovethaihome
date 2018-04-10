<!DOCTYPE html>
<html class="app-ui">
    <head>
        <!-- Meta -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <!-- Document title -->
        <title><?= $this->fetch('title') ?></title>
        <meta name="description" content="" />
        <meta name="author" content="sakorn.s" />
        <meta name="robots" content="noindex, nofollow" />
        <?= $this->Html->meta('icon') ?>
        <!-- Google fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,900%7CRoboto+Slab:300,400%7CRoboto+Mono:400" />
        <!-- AppUI CSS stylesheets -->
        <?= $this->Html->css('admin/font-awesome.css', ['id' => 'css-font-awesome']) ?>
        <?= $this->Html->css('admin/ionicons.css', ['id' => 'css-ionicons']) ?>
        <?= $this->Html->css('admin/bootstrap.css', ['id' => 'css-bootstrap']) ?>
        <?= $this->Html->css('admin/app.css', ['id' => 'css-app']) ?>
        <?= $this->Html->css('admin/app-custom.css', ['id' => 'css-app-custom']) ?>
        <?= $this->Html->css('admin/admin.css') ?>
        <!-- End Stylesheets -->
    </head>
    <body class="app-ui layout-has-drawer layout-has-fixed-header">
        <div class="app-layout-canvas">
            <div class="app-layout-container">
                <?= $this->element('Layouts/admin_leftbar'); ?>
                <!-- Header -->
                <?= $this->element('Layouts/admin_header'); ?>
                <!-- End header -->
                <main class="app-layout-content">
                    <!-- Page Content -->
                    <div class="container-fluid p-y-md">
                        <div class="row">
                            <div class="col-md-12">
                                <?= $this->Flash->render() ?>
                            </div>
                        </div>
                        <?= $this->fetch('content') ?>
                    </div>
                    <!-- End Page Content -->
                </main>
            </div>
            <!-- .app-layout-container -->
        </div>
        <!-- .app-layout-canvas -->
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