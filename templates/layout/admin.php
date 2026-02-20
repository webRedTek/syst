<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Control Plane Admin</title>

    <?= $this->Html->css('/adminlte/dist/css/adminlte.min.css') ?>
    <?= $this->fetch('css') ?>
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">

    <nav class="app-header navbar navbar-expand bg-body">
        <div class="container-fluid">
            <a class="navbar-brand" href="/admin/sites">Control Plane</a>
        </div>
    </nav>

    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <div class="sidebar-brand p-3">
            <a href="/admin/sites" class="brand-link text-decoration-none text-white">Admin</a>
        </div>
        <div class="sidebar-wrapper">
            <nav class="mt-2">
                <ul class="nav sidebar-menu flex-column">
                    <li class="nav-item">
                        <a href="/admin/sites" class="nav-link">
                            <p>Sites</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/site-pages" class="nav-link">
                            <p>Pages</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <main class="app-main">
        <div class="app-content p-3">
            <?= $this->fetch('content') ?>
        </div>
    </main>

</div>

<?= $this->Html->script('/adminlte/dist/js/adminlte.min.js') ?>
<?= $this->fetch('script') ?>
</body>
</html>
  
