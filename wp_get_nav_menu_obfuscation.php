<?php

 /**
   * Obfuscation des liens du menu Wordpress
   * in Parallele, paste this in your JS code :
   */

   /*
   $('.js-obf-link').on('click', function(){
      var dest = $(this).data('link');
      var target = $(this).data('target');
      var decodeDest  = atob(dest);
      if(target == '_blank'){
          window.open(decodeDest, '_blank');
      }else{
          window.location.href = decodeDest;
      }
  });
  */

  // Get our nav locations (ici un menu de footer)
  
  $menuLocations = get_nav_menu_locations(); 
  // This returns an array of menu locations ([LOCATION_NAME] = MENU_ID);
  $menuID = $menuLocations['footer-legal']; // Get the *primary* or another menu ID
  $menuNav = wp_get_nav_menu_items($menuID); // Get the array of wp objects, the nav items for our queried location.
  if (!empty($menuNav)) {
      echo '<div class="wp-nav-menu-obf order-xl-2 d-flex flex-column flex-lg-row">';
      foreach ( $menuNav as $navItem ) {
          $encodeLink = base64_encode($navItem->url);
          echo '<span class="link text-underline js-obf-link" data-link="'. $encodeLink .'" data-target="'. $navItem->target . '">'. $navItem->title .'</span>';
      }
      echo '</div>';
  }
?>
