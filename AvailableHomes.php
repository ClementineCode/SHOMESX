$featured_specs = get_field('community_specs');

if ($featured_specs): ?>
    <div class="trilister" style="">
        <?php foreach ($featured_specs as $spec):

            // Check if the ACF field 'status' is true for the current post
            $status = get_field('status', $spec);
            if ($status === true): // Assuming 'status' is a true/false ACF field

                // Setup this post for WP functions (variable must be named $post).
                setup_postdata($spec); ?>
                <div class="indispec">
						<div class="spechead">
				<img src="<?php echo get_field('spec_header_image', $spec); ?>" width="100%" heigth="auto">
                        <?php if ($home_promo_callout = get_field('home_promo_callout', $spec)) : ?>
                            <div class="promogreen">
                                <span><?php echo get_field('home_promo_callout', $spec); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <h3><?php echo get_the_title($spec); ?></h3>
                    <h4>Homesite <?php echo get_field('homesite_number', $spec); ?></h4>
<?php if (get_field('home_status', $spec) == "Under Construction"
) { ?><span><?php echo get_field('price_of_home', $spec); ?></span><?php } ?>
<?php if (get_field('home_status', $spec) == "Move-In Ready"
) { ?><span><?php echo get_field('price_of_home', $spec); ?></span><?php } ?>
<?php if (get_field('home_status', $spec) == "Reserved"
) { ?>Reserved<?php } ?>
<?php if (get_field('home_status', $spec) == "Sold: Under Contract") { ?>Under Contract<?php } ?>
<?php if (get_field('home_status', $spec) == "Sold: Closed") { ?>Sold<?php } ?>
                    <span><?php echo get_field('floorplan_square_footage', $spec); ?> Sq. Ft. | <?php echo get_field('floorplan_bedrooms', $spec); ?> BD, <?php echo get_field('floorplan_bathrooms', $spec); ?> BA | <?php 
// Ensure $spec is defined and correctly references the post ID or options page
$rawlot = get_field('lot_size', $spec); 

// Check if $rawlot is a valid number
if ($rawlot) {
    // Convert to acres
    $lotacres = $rawlot / 43560; 

    // Echo the lot size in acres, formatted to 2 decimal places
    echo number_format($lotacres, 2); 
} else {
    // Optional: Handle the case where 'lot_size' field is empty or not set
    echo '-';
}
?> Acres</span>
                    <a href="<?php the_permalink($spec); ?>">See More </a>
                </div>
            <?php endif;
        endforeach; ?>
    </div>
    <?php
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata();
endif;
