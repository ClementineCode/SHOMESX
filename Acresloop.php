?> <span><?php
// Ensure $spec is defined and correctly references the post ID or options page
$rawlotx = get_field('lot_size'); 

// Check if $rawlot is a valid number
if ($rawlotx) {
    // Convert to acres
    $lotacresx = $rawlotx / 43560; 

    // Echo the lot size in acres, formatted to 2 decimal places
    echo number_format($lotacresx, 2); 
} else {
    // Optional: Handle the case where 'lot_size' field is empty or not set
    echo '-';
}
?> Acres </span>
