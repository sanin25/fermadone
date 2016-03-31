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
            <?php echo do_shortcode( '[SvenSoftSocialShareButtons]' ); ?>
                <h1><?php the_title(); // Заголовок ?></h1>
                <hr class="hr">
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); // Начало цикла ?>

               <?php the_content()?>

                <?php the_tags( 'Тэги: ', ' | ', '' ); // Выводим тэги(метки) поста ?>
            <?php endwhile; // Конец цикла
            wp_reset_postdata();
            ?>
            <?php comments_template('/comments.php'); ?>
        </div>
    </section>
<?php get_sidebar(); // Подключаем сайдбар ?>
<?php get_footer(); // Подключаем футер ?>