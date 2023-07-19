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
<html <?php language_attributes(); ?> class="<?= $_COOKIE['color-theme']?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Judul Halaman -->
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    
    <!-- Deskripsi Situs -->
    <meta name="description" content="<?php bloginfo('description'); ?>">
    
    <!-- Meta Tag untuk Penelusuran -->
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    
    <!-- Canonical URL -->
    <?php if (is_singular()) : ?>
        <link rel="canonical" href="<?php the_permalink(); ?>">
    <?php endif; ?>
    
    <!-- Sitemap XML -->
    <link rel="sitemap" type="application/xml" title="Sitemap" href="<?php echo esc_url(home_url('/sitemap_index.xml')); ?>">
    
    <!-- Favicon -->
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/favicon/favicon.ico" type="image/x-icon">
    
    <?php wp_head() ?>
</head>

<body <?php body_class('theme-habaacehbarat') ?>>
    <?php wp_body_open(); ?>

    <?= get_template_part('template-parts/component/navbar') ?> 

    <main class="flex-grow w-full md:mt-8">