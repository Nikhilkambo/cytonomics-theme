<?php
/**
 * The template for displaying search results pages
 *
 * @package Cytonomics
 */

get_header();
?>

<div class="search-results-page">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">
                <?php
                printf(
                    /* translators: %s: search query */
                    esc_html__('Search Results for: %s', 'cytonomics'),
                    '<span>' . get_search_query() . '</span>'
                );
                ?>
            </h1>
        </header>

        <div class="search-results-grid">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('search-result-item'); ?>>
                        <div class="search-result-content">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="search-result-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="search-result-text">
                                <header class="entry-header">
                                    <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
                                    
                                    <?php if ('post' === get_post_type()) : ?>
                                        <div class="entry-meta">
                                            <span class="posted-on">
                                                <?php echo get_the_date(); ?>
                                            </span>
                                            <span class="post-category">
                                                <?php
                                                $categories = get_the_category();
                                                if ($categories) {
                                                    echo esc_html($categories[0]->name);
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                </header>

                                <div class="entry-summary">
                                    <?php the_excerpt(); ?>
                                </div>

                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    <?php esc_html_e('Read More', 'cytonomics'); ?>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>

                <?php the_posts_pagination(array(
                    'prev_text' => '<i class="fas fa-chevron-left"></i>',
                    'next_text' => '<i class="fas fa-chevron-right"></i>',
                )); ?>

            <?php else : ?>
                <div class="no-results">
                    <h2><?php esc_html_e('No Results Found', 'cytonomics'); ?></h2>
                    <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cytonomics'); ?></p>
                    
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="search-input-wrapper">
                            <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Try another search...', 'placeholder', 'cytonomics'); ?>" value="<?php echo get_search_query(); ?>" name="s" required>
                            <button type="submit" class="search-submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
/* Search Results Page Styles */
.search-results-page {
    padding: 4rem 0;
}

.page-header {
    text-align: center;
    margin-bottom: 3rem;
}

.page-title {
    font-size: 2.5rem;
    color: var(--dark-color);
    margin: 0;
}

.page-title span {
    color: var(--primary-color);
}

.search-results-grid {
    display: grid;
    gap: 2rem;
    margin-top: 2rem;
}

.search-result-item {
    background: var(--light-color);
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.search-result-item:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
}

.search-result-content {
    display: grid;
    grid-template-columns: 300px 1fr;
    gap: 2rem;
}

.search-result-thumbnail {
    height: 100%;
}

.search-result-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.search-result-text {
    padding: 2rem;
}

.entry-title {
    font-size: 1.5rem;
    margin: 0 0 1rem;
}

.entry-title a {
    color: var(--dark-color);
    text-decoration: none;
    transition: color 0.3s ease;
}

.entry-title a:hover {
    color: var(--primary-color);
}

.entry-meta {
    display: flex;
    gap: 1rem;
    font-size: 0.9rem;
    color: #666;
    margin-bottom: 1rem;
}

.entry-summary {
    color: #444;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.read-more {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.read-more:hover {
    gap: 0.75rem;
}

/* Pagination */
.navigation.pagination {
    margin-top: 3rem;
    text-align: center;
}

.nav-links {
    display: inline-flex;
    gap: 0.5rem;
}

.page-numbers {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: var(--light-color);
    border-radius: 8px;
    color: var(--dark-color);
    text-decoration: none;
    transition: all 0.3s ease;
}

.page-numbers.current {
    background: var(--primary-color);
    color: var(--light-color);
}

.page-numbers:hover:not(.current) {
    background: #f0f0f0;
}

/* No Results */
.no-results {
    text-align: center;
    padding: 4rem 0;
}

.no-results h2 {
    font-size: 2rem;
    margin-bottom: 1rem;
}

.no-results p {
    color: #666;
    margin-bottom: 2rem;
}

.no-results .search-form {
    max-width: 600px;
    margin: 0 auto;
}

/* Responsive */
@media (max-width: 1024px) {
    .search-result-content {
        grid-template-columns: 200px 1fr;
    }
}

@media (max-width: 768px) {
    .search-results-page {
        padding: 2rem 0;
    }

    .page-title {
        font-size: 2rem;
    }

    .search-result-content {
        grid-template-columns: 1fr;
    }

    .search-result-thumbnail {
        height: 200px;
    }

    .search-result-text {
        padding: 1.5rem;
    }
}
</style>

<?php
get_footer(); 