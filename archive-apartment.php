<?php
/**
 * ARCHIVE APARTMENT PAGE TEMPLATE
 * File: archive-apartment.php
 * Place this in your theme root folder: /theme-name/archive-apartment.php
 * 
 * Displays all apartments in a responsive grid (3 cols desktop, 1 col mobile)
 */

get_header();
?>

<style>
    /* HEADER NAVBAR STYLING */
    .site-header {
        background-color: white !important;
        border-bottom: 1px solid #e5e5e5 !important;
        padding: 8px 0 !important;
        position: sticky !important;
        top: 0 !important;
        z-index: 100 !important;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1) !important;
    }

    .header-content {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
    }

    .site-logo {
        font-size: 24px !important;
        font-weight: 700 !important;
        color: #FFD700 !important;
        text-decoration: none !important;
        display: flex !important;
        align-items: center !important;
    }

    .logo-image {
        height: 80px !important;
        width: auto !important;
        object-fit: contain !important;
    }

    .site-nav ul {
        display: flex !important;
        list-style: none !important;
        gap: 12px !important;
    }

    .site-nav a {
        color: #333 !important;
        text-decoration: none !important;
        font-weight: 500 !important;
        font-size: 14px !important;
        transition: color 0.3s ease !important;
    }

    .site-nav a:hover,
    .site-nav a.active {
        color: #FFD700 !important;
    }

    .container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 20px !important;
    }
</style>

    <!-- HEADER -->
    <header class="site-header">
        <div class="container">
            <div class="header-content">
                <a href="index.html" class="site-logo"><img src="https://i.ibb.co/7J6jxy1L/stay.png" alt="Logo" class="logo-image"></a>
                <nav class="site-nav">
                    <ul>
                        <li><a href="index.html">Accueil</a></li>
                        <li><a href="archive-apartment.php" class="active">Appartements</a></li>
                        <li><a href="about.html">À propos</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

<main id="primary" class="site-main">
    
    <!-- HERO SECTION -->
    <section class="apartment-hero">
        <div class="container">
            <h1 class="apartment-hero-title">
                <?php
                    if ( is_tax() ) {
                        single_term_title();
                    } else {
                        post_type_archive_title();
                    }
                ?>
            </h1>
            <p class="apartment-hero-subtitle"><?php _e('Découvrez nos 15 appartements disponibles à Casablanca', 'textdomain'); ?></p>
        </div>
    </section>

    <!-- APARTMENTS GRID -->
    <section class="apartment-archive">
        <div class="container">
            
            <?php
            if (have_posts()) {
                ?>
                <div class="apartment-grid">
                    <?php
                    while (have_posts()) {
                        the_post();
                        
                        // Get meta fields
                        $location = get_post_meta(get_the_ID(), '_location', true);
                        $price_per_night = get_post_meta(get_the_ID(), '_price_per_night', true);
                        $rating = get_post_meta(get_the_ID(), '_rating', true);
                        $reviews_count = get_post_meta(get_the_ID(), '_reviews_count', true);
                        
                        ?>
                        <div class="apartment-card">
                            <!-- Featured Image -->
                            <div class="apartment-card-image">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium', array('alt' => get_the_title()));
                                } else {
                                    echo '<div class="no-image">' . __('Pas d\'image', 'textdomain') . '</div>';
                                }
                                ?>
                            </div>

                            <!-- Card Content -->
                            <div class="apartment-card-content">
                                
                                <!-- Title -->
                                <h2 class="apartment-card-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <!-- Location -->
                                <?php if ($location) { ?>
                                    <div class="apartment-card-location">
                                        <span class="location-icon">📍</span>
                                        <?php echo esc_html($location); ?>
                                    </div>
                                <?php } ?>

                                <!-- Rating -->
                                <?php if ($rating) { ?>
                                    <div class="apartment-card-rating">
                                        <span class="rating-stars">★</span>
                                        <span class="rating-value"><?php echo number_format($rating, 1); ?></span>
                                        <?php if ($reviews_count) { ?>
                                            <span class="reviews-count">(<?php echo intval($reviews_count); ?> avis)</span>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                                <!-- Price -->
                                <?php if ($price_per_night) { ?>
                                    <div class="apartment-card-price">
                                        <span class="price-amount"><?php echo esc_html($price_per_night); ?> DH</span>
                                        <span class="price-period"><?php _e('par nuit', 'textdomain'); ?></span>
                                    </div>
                                <?php } ?>

                                <!-- View Button -->
                                <a href="<?php the_permalink(); ?>" class="apartment-card-button">
                                    <?php _e('Voir le logement', 'textdomain'); ?> →
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <!-- Pagination -->
                <div class="apartment-pagination">
                    <?php
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => __('← Précédent', 'textdomain'),
                        'next_text' => __('Suivant →', 'textdomain'),
                    ));
                    ?>
                </div>
                <?php
            } else {
                ?>
                <div class="no-apartments">
                    <p><?php _e('Aucun appartement trouvé.', 'textdomain'); ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
