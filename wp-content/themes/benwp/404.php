<?php
/**
 * @package WordPress
 * @subpackage Ben's Theme
 * @since 1.0
 */
?>

<?php get_header(); ?>


<section class="main-content">
    <h1 class="titre404">404 Not Found</h1>

    <p class="texte404">There's nothing here !</p>

    <p class="button404">
        <a href="<?php echo esc_url(home_url('/')); ?>">Back Home</a>
    </p>
</section>


<?php get_footer(); ?>