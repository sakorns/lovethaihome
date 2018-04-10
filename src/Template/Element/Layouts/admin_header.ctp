<header class="app-layout-header">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <button class="pull-left hidden-lg hidden-md navbar-toggle" type="button" data-toggle="layout" data-action="sidebar_toggle">
                    <span class="sr-only">Toggle drawer</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-page-title">
                    <?php 
                        if(isset($title)){
                            $this->assign('title', $title); 
                        }
                    ?>
                    <?= $this->fetch('title') ?>
                </span>
            </div>

            <div class="collapse navbar-collapse" id="header-navbar-collapse">
                <ul class="nav navbar-nav navbar-right navbar-toolbar hidden-sm hidden-xs">

                    <li class="dropdown dropdown-profile">
                        <a href="javascript:void(0)" data-toggle="dropdown">
                            <span class="m-r-sm"><?= h($this->request->session()->read('Auth.User.username')) ?> <span class="caret"></span></span>
                            <?= $this->Html->image('admin/avatars/avatar3.jpg', ['alt' => '', 'class' => 'img-avatar img-avatar-48']); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <?=
                                $this->Html->link('LOGOUT', '/users/logout', ['class' => '', 'target' => '', 'escape' => false]
                                );
                                ?>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- .navbar-right -->
            </div>
        </div>
        <!-- .container-fluid -->
    </nav>
    <!-- .navbar-default -->
</header>