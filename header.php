<?php
function wp_is_tablet()
{
    // Mendapatkan user agent
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    // Daftar kata kunci untuk mendeteksi perangkat tablet
    $tablet_keywords = array(
        'iPad',
        'Android',
        'Kindle',
        'Silk',
        'PlayBook',
        'BlackBerry',
        'HP TouchPad',
        'IEMobile',
        'Tablet',
        'Nexus',
        'Xoom',
    );

    // Memeriksa apakah user agent mengandung kata kunci tablet
    foreach ($tablet_keywords as $keyword) {
        if (stripos($user_agent, $keyword) !== false) {
            return true;
        }
    }

    return false;
}

$is_tablet = wp_is_tablet();
$is_mobile = wp_is_mobile() && !$is_tablet;
$is_desktop = !$is_mobile && !$is_tablet;
?>

<!DOCTYPE html>
<html lang="en" class="<?= $_COOKIE['color-theme']?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head() ?>
</head>

<body <?php body_class('theme-habaacehbarat') ?>>
    <?php wp_body_open(); ?>

    <?= get_template_part('template-parts/component/navbar') ?> 

    <main class="flex-grow w-full md:mt-8">