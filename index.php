<?php
/**
 * The main template file
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    if (have_posts()) :
        if (is_home() && !is_front_page()) :
            ?>
            <header>
                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
            </header>
            <?php
        endif;

        /* Start the Loop */
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php
                    if (is_singular()) :
                        the_title('<h1 class="entry-title">', '</h1>');
                    else :
                        the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                    endif;

                    if ('post' === get_post_type()) :
                        ?>
                        <div class="entry-meta">
                            <?php
                            printf(
                                esc_html__('Posted on %s', 'cytonomics'),
                                '<time datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time>'
                            );
                            ?>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="entry-content">
                    <?php
                    if (is_singular()) :
                        the_content();
                    else :
                        the_excerpt();
                    endif;
                    ?>
                </div>
            </article>
            <?php
        endwhile;

        the_posts_navigation();

    else :
        ?>
        <p><?php esc_html_e('No posts found.', 'cytonomics'); ?></p>
        <?php
    endif;
    ?>
</main>

<?php
get_sidebar();
get_footer(); 