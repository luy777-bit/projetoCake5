<!DOCTYPE html>
<html>
    <?= $this->element('head') ?>
<body class='hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed'>

    <main class="main">
        <div class='container' style='max-width: 100%;float: right;'>
            <div class='wrapper'>
                <?= $this->Flash->render() ?>
                <?= $this->element('preloader') ?>
                <?= $this->element('navbar') ?>
                <?= $this->element('sidebar') ?>
                <?= $this->element('contentbar') ?>
                <?= $this->element('footer') ?>
            </div>
        </div>
    </main>
</body>
</html>
