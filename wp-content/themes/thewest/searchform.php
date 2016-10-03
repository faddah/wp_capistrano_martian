<?php
/**
 * This file defines the markup of the search form.
 */
?>
<div class="search_section">
    <div class="blue_border"></div>
    <i class="fa fa-search"></i>
    <h2><?php _e('Need to find something?', 'thewest'); ?></h2>
    <form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input class="subscribe" placeholder="<?php _e('Start typing...', 'thewest'); ?>" name="s" type="text">
        <input class="subscribe_btn" value="<?php _e('SUBMIT', 'thewest'); ?>" name="" type="submit">
    </form>
</div>