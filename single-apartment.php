<?php
/**
 * SINGLE APARTMENT PAGE TEMPLATE
 * File: single-apartment.php
 * Place this in your theme root folder: /theme-name/single-apartment.php
 * 
 * Displays single apartment with booking card on the right
 */

get_header();

// Get apartment meta fields
$location = get_post_meta(get_the_ID(), '_location', true);
$price_per_night = get_post_meta(get_the_ID(), '_price_per_night', true);
$rating = get_post_meta(get_the_ID(), '_rating', true);
$reviews_count = get_post_meta(get_the_ID(), '_reviews_count', true);
$guests = get_post_meta(get_the_ID(), '_guests', true);
$bedrooms = get_post_meta(get_the_ID(), '_bedrooms', true);
$beds = get_post_meta(get_the_ID(), '_beds', true);
$baths = get_post_meta(get_the_ID(), '_baths', true);
$airbnb_url = get_post_meta(get_the_ID(), '_airbnb_url', true);
?>

<main id="primary" class="site-main">
    
    <?php
    while (have_posts()) {
        the_post();
        ?>
        
        <article id="post-<?php the_ID(); ?>" class="apartment-single">
            
            <!-- BREADCRUMB -->
            <div class="apartment-breadcrumb">
                <div class="container">
                    <a href="<?php echo get_post_type_archive_link('apartment'); ?>">
                        <?php _e('Appartements', 'textdomain'); ?>
                    </a>
                    <span> / </span>
                    <span><?php the_title(); ?></span>
                </div>
            </div>

            <div class="container apartment-container">
                
                <!-- LEFT SIDE: Main Content -->
                <div class="apartment-content">
                    
                    <!-- Featured Image -->
                    <div class="apartment-featured-image">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('large', array('alt' => get_the_title()));
                        } else {
                            echo '<div class="no-image">' . __('Pas d\'image disponible', 'textdomain') . '</div>';
                        }
                        ?>
                    </div>

                    <!-- Title -->
                    <h1 class="apartment-single-title">
                        <?php the_title(); ?>
                    </h1>

                    <!-- Location & Basic Info -->
                    <div class="apartment-single-meta">
                        <?php if ($location) { ?>
                            <div class="apartment-meta-item">
                                <span class="meta-icon">📍</span>
                                <span><?php echo esc_html($location); ?></span>
                            </div>
                        <?php } ?>
                        
                        <?php if ($guests) { ?>
                            <div class="apartment-meta-item">
                                <span class="meta-icon">👥</span>
                                <span><?php echo intval($guests); ?> <?php _e('personnes max', 'textdomain'); ?></span>
                            </div>
                        <?php } ?>
                    </div>

                    <!-- Amenities -->
                    <div class="apartment-amenities">
                        <?php if ($bedrooms) { ?>
                            <div class="amenity">
                                <span class="amenity-icon">🛏️</span>
                                <div>
                                    <strong><?php echo intval($bedrooms); ?></strong>
                                    <p><?php _e('chambre(s)', 'textdomain'); ?></p>
                                </div>
                            </div>
                        <?php } ?>
                        
                        <?php if ($beds) { ?>
                            <div class="amenity">
                                <span class="amenity-icon">🛌</span>
                                <div>
                                    <strong><?php echo intval($beds); ?></strong>
                                    <p><?php _e('lit(s)', 'textdomain'); ?></p>
                                </div>
                            </div>
                        <?php } ?>
                        
                        <?php if ($baths) { ?>
                            <div class="amenity">
                                <span class="amenity-icon">🚿</span>
                                <div>
                                    <strong><?php echo intval($baths); ?></strong>
                                    <p><?php _e('salle(s) de bain', 'textdomain'); ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <!-- Rating -->
                    <?php if ($rating) { ?>
                        <div class="apartment-rating-large">
                            <div class="rating-header">
                                <span class="rating-stars">★★★★★</span>
                                <span class="rating-number"><?php echo number_format($rating, 1); ?>/5</span>
                            </div>
                            <?php if ($reviews_count) { ?>
                                <p class="rating-reviews">Basé sur <?php echo intval($reviews_count); ?> avis</p>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <!-- Description -->
                    <div class="apartment-description">
                        <h2><?php _e('À propos du logement', 'textdomain'); ?></h2>
                        <?php the_content(); ?>
                    </div>

                </div>

                <!-- RIGHT SIDE: Booking Card (Sticky) -->
                <aside class="apartment-booking-sidebar">
                    <div class="booking-card">
                        
                        <!-- Price -->
                        <?php if ($price_per_night) { ?>
                            <div class="booking-price">
                                <span class="price-amount"><?php echo esc_html($price_per_night); ?> DH</span>
                                <span class="price-period">par nuit</span>
                            </div>
                        <?php } ?>

                        <!-- Check-in Date -->
                        <div class="booking-field">
                            <label for="checkin-date"><?php _e('Arrivée', 'textdomain'); ?></label>
                            <input type="date" id="checkin-date" class="booking-input" data-field="checkin">
                        </div>

                        <!-- Check-out Date -->
                        <div class="booking-field">
                            <label for="checkout-date"><?php _e('Départ', 'textdomain'); ?></label>
                            <input type="date" id="checkout-date" class="booking-input" data-field="checkout">
                        </div>

                        <!-- Guests -->
                        <div class="booking-field">
                            <label for="guests-count"><?php _e('Personnes', 'textdomain'); ?></label>
                            <input type="number" id="guests-count" class="booking-input" min="1" value="1" data-field="guests">
                        </div>

                        <!-- Total Price Calculation -->
                        <div class="booking-calculation">
                            <div class="calculation-row">
                                <span class="label"><?php _e('Nuits:', 'textdomain'); ?></span>
                                <span class="value" id="nights-count">0</span>
                            </div>
                            <div class="calculation-row">
                                <span class="label"><?php _e('Prix par nuit:', 'textdomain'); ?></span>
                                <span class="value"><?php echo esc_html($price_per_night); ?> DH</span>
                            </div>
                            <div class="calculation-total">
                                <span class="label"><?php _e('Total:', 'textdomain'); ?></span>
                                <span class="value" id="total-price">0 DH</span>
                            </div>
                        </div>

                        <!-- Book Button -->
                        <?php if ($airbnb_url) { ?>
                            <button class="booking-button" id="booking-button">
                                <?php _e('Réserver maintenant', 'textdomain'); ?>
                            </button>
                        <?php } else { ?>
                            <div class="booking-unavailable">
                                <?php _e('Non disponible pour la réservation en ligne.', 'textdomain'); ?>
                            </div>
                        <?php } ?>

                        <!-- Disclaimer -->
                        <p class="booking-disclaimer">
                            <?php _e('Vous serez redirigé vers notre plateforme de réservation.', 'textdomain'); ?>
                        </p>

                    </div>
                </aside>

            </div>

        </article>

        <?php
    }
    ?>

</main>

<!-- Pass data to JavaScript -->
<script>
    window.apartmentData = {
        airbnbUrl: '<?php echo esc_js($airbnb_url); ?>',
        pricePerNight: <?php echo floatval($price_per_night); ?>,
        maxGuests: <?php echo intval($guests); ?>
    };
</script>

<?php get_footer(); ?>
