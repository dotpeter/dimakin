<?php
/*
 * -----------------------------------------------------------
 * Header Search Form Template
 * -----------------------------------------------------------
 */

 ?>
 <div class="header-search-form-wrapper">
   <div class="container">
     <div class="row">
       <div class="col-12">
         <form id="search-form" class="search-form" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
           <div class="input-group">
             <input id="s" class="input-search" type="search"  name="s" value="<?php the_search_query(); ?>" placeholder="<?php esc_html_e('Procurar...', 'dimakin'); ?>"/>
             <button id="search-submit" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
           </div><!-- input-group -->
         </form><!--search-form -->
       </div><!-- col -->
     </div><!-- row -->
   </div><!-- container -->
 </div><!-- header-search-form-wrapper -->
