<?php require_once __DIR__ . "/config.php"; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        <?php echo isset($titre_page) ? $titre_page : APP_NAME; ?>
    </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom Premium CSS -->
    <link rel="stylesheet" href="<?php echo url('css/style.css'); ?>">
</head>

<body>
    <?php include __DIR__ . '/nav.php'; ?>

    <?php if (isset($show_hero) && $show_hero): ?>
        <!-- Hero section can be added here if needed for all pages -->
    <?php endif; ?>

    <main class="<?php echo isset($main_class) ? $main_class : 'container mt-5'; ?>">