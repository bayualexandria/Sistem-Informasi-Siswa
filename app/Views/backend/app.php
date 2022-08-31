<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sistem Informasi Siswa'; ?></title>
    <link rel="shortcut icon" href="https://seeklogo.com/images/D/Departemen_Pendidikan_Nasional-logo-E2BD667284-seeklogo.com.png" alt="logo" class="w-1/5" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">
    <!-- <script src="<?= base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script> -->
    <!-- <script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script> -->
    <!-- <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script> -->
</head>

<body class="scroll-smooth  <?= (url_is('/home') ? 'bg-gradient-to-r from-sky-500 to-indigo-500 h-screen ' : '') ?>" id="body">

    <div class="relative w-full border-b shadow-md">
        <!-- Start Include Navbar -->
        <?= $this->include('backend/component/navbar/navbar'); ?>
        <!-- End Include Navbar -->
        <!-- Start Include Sidebar -->
        <?= $this->include('backend/component/sidebar/sidebar'); ?>
        <!-- End Include Sidebar -->

    </div>
    <?= $this->renderSection('pages'); ?>
    <?= $this->include('backend/component/footer/footer'); ?>
    <!-- Start Include Modal Logout -->
    <?= $this->include('backend/component/modal/logout'); ?>
    <!-- End Include Modal Logout -->
    <?= $this->include('backend/component/navbar/modal_navbar'); ?>

    <script src="<?= base_url('assets/js/app.js'); ?>"></script>
    <?= $this->renderSection('script'); ?>
    <script src="<?= base_url('assets/js/scripts.js'); ?>"></script>

</body>

</html>