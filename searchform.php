<?php
/*
 * -----------------------------------------------------------
 * Custom Temnplate for Search-form
 * -----------------------------------------------------------
 */

?>
<form id="search-form" class="search-form" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
  <div class="input-group">
    <input id="s" class="input-search" type="search"  name="s" value="<?php the_search_query(); ?>" placeholder="<?php esc_html_e('Search...', 'dimakin'); ?>"/>
    <button id="search-submit" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
  </div>
</form>
