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
                'posts_per_page' => 1,
                'post__not_in' => array($thumb_id),
                'update_post_term_cache' => false,
            ) );

            ?>
            <div class="singleimg">
                <h1><?php the_title(); // Заголовок ?></h1>
                <hr class="hr">
                <div class="editpost">
                    <?php
                    if( current_user_can( 'edit_posts' ) ) {
                        echo '<a href="'. get_edit_post_link(1) .'">Изменить</a>';
                    }
                    ?>
                </div>
                <?php

                foreach ($images->posts as $image)
                {
                    echo '<a href="'.get_permalink($image->ID).'">'.wp_get_attachment_image( $image->ID, array(450,450)).'</a>';
                }
                ?>
            </div>
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); // Начало цикла ?>

                <div class="textsingle">
                    <?php the_content()?>
                </div>

                <?php the_tags( 'Тэги: ', ' | ', '' ); // Выводим тэги(метки) поста ?>
            <?php endwhile; // Конец цикла
            wp_reset_postdata();
            ?>
            <?php comments_template( '', true ); // Комментарии ?>
        </div>
    </section>
<?php get_sidebar(); // Подключаем сайдбар ?>
<?php get_footer(); // Подключаем футер ?>