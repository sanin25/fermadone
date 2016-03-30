<?php
/**
 * Шаблон made fermerjeck
 * https://github.com/fermerjeck
 * @package WordPress
 * @subpackage fermerjeck
 */
get_header(); // Подключаем хедер?>
    <section class="singl">
        <?php if ( function_exists('yoast_breadcrumb') )
        {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
        <div class="wrap">
            <?php
            $images = new WP_Query( array(
                'post_parent' => get_the_ID(),
                'post_status' => 'inherit',
                'post_type' => 'attachment',
                'post_mime_type' => 'image',
                'order' => 'ASC',
                'orderby' => 'menu_order ID',
                'posts_per_page' => 100,
                'post__not_in' => array($thumb_id),
                'update_post_term_cache' => false,
            ) );

            ?>

                <h1><?php the_title(); // Заголовок ?></h1>
                <hr class="hr">
                <div class="editpost">
                    <?php
                    if( current_user_can( 'edit_posts' ) ) {
                        echo '<a href="'. get_edit_post_link() .'">Изменить</a>';
                    }
                    ?>
                </div>
                <div id="gallery-3" class="iwmp-gallery clearfix">
                    <?php
                        $i = 0;
                        foreach ($images->posts as $image)
                        {
                            $i += 1;
                            if($i == 1)
                                echo wp_get_attachment_link($image->ID,[450,450]);
                                echo "<figure>";
                            if ($i > 1)
                           echo  wp_get_attachment_link($image->ID,[150,150]);
                            echo "</figure>";
                        }
                    ?>
                </div>

            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); // Начало цикла ?>

               <?php the_content()?>

                <?php the_tags( 'Тэги: ', ' | ', '' ); // Выводим тэги(метки) поста ?>
            <?php endwhile; // Конец цикла
            wp_reset_postdata();
            ?>
            <?php comments_template( '', true ); // Комментарии ?>
        </div>
    </section>
<?php get_sidebar(); // Подключаем сайдбар ?>
<?php get_footer(); // Подключаем футер ?>