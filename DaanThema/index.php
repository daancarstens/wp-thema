<?php get_header(); ?>

<div class="container">

   <div class="row">
      <main class="col-md-9 container-fluid">

         <div class="row">
            <?php  
             if( have_posts() ) :
                while( have_posts()) : the_post(); ?>

            <div class="col-md-6">
               <h3> <a href="<?php the_permalink() ?>"><?php the_title(); ?></a> </h3>
               <div> <?php the_excerpt(); ?> </div>
               <div class="text-center p-4">
                  <a href="<?php the_permalink() ?>" class="btn btn-outline-primary">Lees meer ...</a>
               </div>
            </div>
   
   
            <?php  
               endwhile;
            else:  ?>
            <p>geen bericht gevonden</p>
            <?php endif ?>
         </div>
      </main>

      <aside class="col-md-3 bg-light p-4">
            <?php dynamic_sidebar('aside'); ?>
      </aside>
   </div>
</div>

<?php get_footer(); ?>