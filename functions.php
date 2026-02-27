<?php
/**
 * CUSTOM POST TYPE & META BOXES FOR APARTMENT RENTAL
 * Place this code in your theme's functions.php file
 * 
 * This registers:
 * - Custom post type "apartment"
 * - Meta boxes for apartment details
 */

// ============================================================
// 1. REGISTER CUSTOM POST TYPE "APARTMENT"
// ============================================================

add_action('init', 'register_apartment_post_type');

function register_apartment_post_type() {
    
    $args = array(
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'apartments'),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-building',
        'supports'            => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest'        => true,
        'rest_base'           => 'apartments',
        'labels'              => array(
            'name'                  => __('Appartements', 'textdomain'),
            'singular_name'         => __('Appartement', 'textdomain'),
            'menu_name'             => __('Appartements', 'textdomain'),
            'all_items'             => __('Tous les appartements', 'textdomain'),
            'add_new'               => __('Ajouter un appartement', 'textdomain'),
            'add_new_item'          => __('Ajouter un nouvel appartement', 'textdomain'),
            'edit_item'             => __('Modifier un appartement', 'textdomain'),
        ),
    );
    
    register_post_type('apartment', $args);
}

// ============================================================
// 2. REGISTER META BOXES FOR APARTMENT DETAILS
// ============================================================

add_action('add_meta_boxes', 'apartment_add_meta_boxes');

function apartment_add_meta_boxes() {
    add_meta_box(
        'apartment_details',                          // Meta box ID
        __('Détails de l\'appartement', 'textdomain'), // Meta box title
        'apartment_meta_box_callback',                // Callback function
        'apartment',                                   // Post type
        'normal',                                     // Context
        'high'                                        // Priority
    );
}

// Meta box callback function
function apartment_meta_box_callback($post) {
    // Retrieve existing meta values
    $location = get_post_meta($post->ID, '_location', true);
    $price_per_night = get_post_meta($post->ID, '_price_per_night', true);
    $rating = get_post_meta($post->ID, '_rating', true);
    $reviews_count = get_post_meta($post->ID, '_reviews_count', true);
    $guests = get_post_meta($post->ID, '_guests', true);
    $bedrooms = get_post_meta($post->ID, '_bedrooms', true);
    $beds = get_post_meta($post->ID, '_beds', true);
    $baths = get_post_meta($post->ID, '_baths', true);
    $airbnb_url = get_post_meta($post->ID, '_airbnb_url', true);
    
    // Add nonce for security
    wp_nonce_field('apartment_meta_nonce', 'apartment_nonce');
    
    ?>
    <div class="apartment-meta-fields">
        <style>
            .apartment-meta-fields {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
            }
            .apartment-meta-fields .meta-field {
                display: flex;
                flex-direction: column;
            }
            .apartment-meta-fields label {
                font-weight: 600;
                margin-bottom: 8px;
                color: #333;
            }
            .apartment-meta-fields input[type="text"],
            .apartment-meta-fields input[type="number"],
            .apartment-meta-fields input[type="url"] {
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
                font-size: 14px;
            }
            .apartment-meta-fields input[type="text"]:focus,
            .apartment-meta-fields input[type="number"]:focus,
            .apartment-meta-fields input[type="url"]:focus {
                border-color: #ff6a00;
                outline: none;
                box-shadow: 0 0 0 3px rgba(255, 106, 0, 0.1);
            }
        </style>
        
        <div class="meta-field">
            <label for="_location"><?php _e('Localisation', 'textdomain'); ?> *</label>
            <input type="text" id="_location" name="_location" value="<?php echo esc_attr($location); ?>" placeholder="ex: Centre-ville, Casablanca">
        </div>
        
        <div class="meta-field">
            <label for="_price_per_night"><?php _e('Prix par nuit (DH)', 'textdomain'); ?> *</label>
            <input type="number" id="_price_per_night" name="_price_per_night" value="<?php echo esc_attr($price_per_night); ?>" placeholder="ex: 450" step="0.01">
        </div>
        
        <div class="meta-field">
            <label for="_guests"><?php _e('Nombre de personnes', 'textdomain'); ?> *</label>
            <input type="number" id="_guests" name="_guests" value="<?php echo esc_attr($guests); ?>" placeholder="ex: 4" min="1">
        </div>
        
        <div class="meta-field">
            <label for="_bedrooms"><?php _e('Chambres', 'textdomain'); ?> *</label>
            <input type="number" id="_bedrooms" name="_bedrooms" value="<?php echo esc_attr($bedrooms); ?>" placeholder="ex: 2" min="1">
        </div>
        
        <div class="meta-field">
            <label for="_beds"><?php _e('Lits', 'textdomain'); ?> *</label>
            <input type="number" id="_beds" name="_beds" value="<?php echo esc_attr($beds); ?>" placeholder="ex: 2" min="1">
        </div>
        
        <div class="meta-field">
            <label for="_baths"><?php _e('Salles de bain', 'textdomain'); ?> *</label>
            <input type="number" id="_baths" name="_baths" value="<?php echo esc_attr($baths); ?>" placeholder="ex: 1" min="1">
        </div>
        
        <div class="meta-field">
            <label for="_rating"><?php _e('Évaluation (0-5)', 'textdomain'); ?></label>
            <input type="number" id="_rating" name="_rating" value="<?php echo esc_attr($rating); ?>" placeholder="ex: 4.8" min="0" max="5" step="0.1">
        </div>
        
        <div class="meta-field">
            <label for="_reviews_count"><?php _e('Nombre d\'avis', 'textdomain'); ?></label>
            <input type="number" id="_reviews_count" name="_reviews_count" value="<?php echo esc_attr($reviews_count); ?>" placeholder="ex: 42" min="0">
        </div>
        
        <div class="meta-field" style="grid-column: 1 / -1;">
            <label for="_airbnb_url"><?php _e('URL de référence (lien externe)', 'textdomain'); ?></label>
            <input type="url" id="_airbnb_url" name="_airbnb_url" value="<?php echo esc_attr($airbnb_url); ?>" placeholder="https://example.com">
        </div>
    </div>
    <?php
}

// ============================================================
// 3. SAVE META FIELDS
// ============================================================

add_action('save_post_apartment', 'save_apartment_meta_fields');

function save_apartment_meta_fields($post_id) {
    // Check nonce
    if (!isset($_POST['apartment_nonce']) || !wp_verify_nonce($_POST['apartment_nonce'], 'apartment_meta_nonce')) {
        return;
    }
    
    // Check if this is an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Check user permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Save meta fields
    $meta_fields = ['_location', '_price_per_night', '_rating', '_reviews_count', '_guests', '_bedrooms', '_beds', '_baths', '_airbnb_url'];
    
    foreach ($meta_fields as $field) {
        if (isset($_POST[$field])) {
            $value = sanitize_text_field($_POST[$field]);
            update_post_meta($post_id, $field, $value);
        }
    }
}

// ============================================================
// 4. ENQUEUE STYLES & SCRIPTS
// ============================================================

add_action('wp_enqueue_scripts', 'apartment_enqueue_scripts');

function apartment_enqueue_scripts() {
    // Enqueue main styles
    wp_enqueue_style('apartment-styles', get_template_directory_uri() . '/css/apartment-styles.css');
    
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    
    // Enqueue JavaScript for booking calculation
    wp_enqueue_script('apartment-booking', get_template_directory_uri() . '/js/apartment-booking.js', array(), true, true);
}

?>
