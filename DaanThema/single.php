<?php get_header(); ?>

<div class="container-fluid">

   <div class="row">
      <main class="col-md-9">

         <div class="row">
            <?php  
             if( have_posts() ) :
                while( have_posts()) : the_post(); ?>
                  <div class="col-md-3 p-4 text-right small bg-light">
                     dit bericht is geplaatst door: 
                     <?php the_author(); ?><br>
                     op: <?php the_time('j F Y'); ?>
                     in: <?php the_category(); ?>
                     met als tags: <?php  
                     $voor = " ";
                     $sep = " | ";
                     $na = " ";
                     $id = " ";
                     $tag_list = get_the_tag_list( $before, $sep, $na, $id );
                     echo $tag_list;
                     ?>
                     <hr>
                     <?php $vorig_bericht = get_previous_post(); 
                     if ( !empty( $vorig_bericht )) : ?> vorig bericht <br>
                     <a href="<?php echo the_permalink( $vorig_bericht->ID )  ?>"> 
                     &#x25c0; <?php echo apply_filters('de_titel', $vorig_bericht->post_title ) ?></a>

                     <?php endif; ?>

                     <hr>
                     <?php $volgend_bericht = get_next_post(); 
                     if ( !empty( $volgend_bericht )) : ?> volgend bericht <br>
                     <a href="<?php echo the_permalink( $volgend_bericht->ID )  ?>"> &#x25b6; 
                     <?php echo apply_filters('de_titel', $volgend_bericht->post_title ) ?></a>

                     <?php endif; ?>

                  </div>

            <div class="col-md-9">
               <h3><?php the_title(); ?></h3>
               <div> <?php the_content(); ?> </div>
               <hr>
               <div class="bg-light p-4">
                  <?php 
                     if ( comments_open() || get_comments_number() ) :
                        comments_template();
                     endif;
                  ?>
               </div>
      
      
               <?php  
                  endwhile;
               else:  ?>
               <p>geen bericht gevonden</p>
               <?php endif ?>
            </div>
         </div>
      </main>

      <aside class="col-md-3 bg-light p-4">
            <?php dynamic_sidebar('aside'); ?>
      </aside>
   </div>
</div>

<?php get_footer(); ?>
