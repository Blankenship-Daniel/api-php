<?php require_once('../layouts/header.php') ?>
<?php require_once('../db/dbConnect.php') ?>

<div class="container">
    <h1>Database Setup</h1>
    <div class="boxed">
        <?php var_dump($conn) ?>
    </div>
</div>

<?php require_once('../layouts/footer.php') ?>
