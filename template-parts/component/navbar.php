<?php
function get_menu_items_recursive($menu_items, $parent_id = 0)
{
  $menu_array = array();

  foreach ($menu_items as $menu_item) {
    if ($menu_item->menu_item_parent == $parent_id) {
      $children = get_menu_items_recursive($menu_items, $menu_item->ID);

      $menu_array[] = array(
        'ID' => $menu_item->ID,
        'title' => $menu_item->title,
        'url' => $menu_item->url,
        'children' => $children,
      );
    }
  }

  return $menu_array;
}

$menu_name = 'menu'; // Ganti dengan nama menu yang ingin Anda ambil
$menu_items = wp_get_nav_menu_items($menu_name);
$menus = get_menu_items_recursive($menu_items);
?>

<nav class="top-navbar shadow-lg fixed w-full z-20 top-0 left-0 bg-background-75 dark:bg-background-900">
  <div class="max-w-screen-xl flex flex-wrap items-center mx-auto py-2 px-4 md:p-4">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center logo">
      <?php
      $custom_logo_id = get_theme_mod('custom_logo');
      $logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
      ?>
      <?php if (has_custom_logo()) : ?>
        <img src="<?= esc_url($logo_image[0]) ?>" class="h-8 mr-3" alt="<?= get_bloginfo('name') ?>">
      <?php else : ?>
        <img src="<?= esc_url(get_template_directory_uri()) ?>/images/logo.svg" alt="<?= get_bloginfo('name') ?>" class="h-8 mr-3">
      <?php endif; ?>
    </a>

    <div class="order-5 md:order-1 hidden w-full md:block md:w-auto ml-auto" id="navbar-multi-level">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-0 md:mt-0 md:border-0 dark:border-gray-700">
        <?php foreach ($menus as $menu) : ?>
          <li>
            <?php if (count($menu['children']) === 0) : ?>
              <a href="<?= $menu['url'] ?>" class="block py-2 px-2 pl-3 pr-4 rounded md:px-3 md:py-2 dark:hover:bg-background-925" aria-current="page"><?= $menu['title'] ?></a>
            <?php else : ?>
              <button id="dropdownNavbarLink-<?= $menu["ID"] ?>" data-dropdown-toggle="dropdownNavbar-<?= $menu["ID"] ?>" class="flex items-center justify-between w-full py-2 pl-3 pr-4 rounded md:px-3 md:py-2 md:w-auto dark:text-white dark:focus:text-white dark:hover:bg-background-925">
                <?= $menu['title'] ?>
                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                </svg></button>
              <!-- Dropdown menu -->
              <div id="dropdownNavbar-<?= $menu["ID"] ?>" class="duration-0 z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-background-925 dark:divide-gray-600">
                <ul class="py-2" aria-labelledby="dropdownLargeButton">
                  <?php foreach ($menu["children"] as $child) : ?>
                    <?php if (count($child["children"]) === 0) : ?>
                      <li>
                        <a href="<?= $child['url'] ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-background-900"><?= $child['title'] ?></a>
                      </li>
                    <?php else : ?>
                      <li aria-labelledby="dropdownNavbarLink-<?= $menu["ID"] ?>">
                        <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-background-900">
                          <?= $child["title"] ?>
                          <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                          </svg></button>
                        <div id="doubleDropdown" class="duration-0 z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-background-925">
                          <ul class="py-2" aria-labelledby="doubleDropdownButton">
                            <?php foreach ($child["children"] as $gc) : ?>
                              <li>
                                <a href="<?= $gc["url"] ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-background-900"><?= $gc['title'] ?></a>
                              </li>
                            <?php endforeach; ?>
                          </ul>
                        </div>
                      </li>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </ul>

              </div>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <select id="language" class="order-2 ml-auto md:ml-3 skiptranslate bg-background-50 border border-background-300 text-background-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-background-900 dark:border-background-600 dark:placeholder-background-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 max-w-[5.5rem]">
      <option value="id" selected>IDN</option>
      <option value="en">ENG</option>
      <option value="ar">ARB</option>
      <option value="fr">FRA</option>
      <option value="de">GER</option>
    </select>

    <button type="button" class="order-3 theme-toggle ml-2 hover:bg-background-200 dark:hover:bg-background-925 w-11 rounded-md aspect-square flex items-center justify-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="dark:hidden w-5 h-5 -m-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
      </svg>

      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden dark:inline w-5 h-5 -m-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
      </svg>
    </button>

    <button data-collapse-toggle="navbar-multi-level" type="button" class="order-4 ml-2 inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-multi-level" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>

  </div>
</nav>

<div class="w-full top-navbar-ghost"></div>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelector(".top-navbar-ghost").style.height = `${document.querySelector(".top-navbar").offsetHeight}px`;
  })
</script>