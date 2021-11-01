<?php
/**
 * The template for displaying pages
 */

get_header();
?>

<div class="section">
    <div class="section__content">
    <?php 
        $styles = array(
            'bgBlock' => array(
                'classes' =>  ' page-background_y-md'
            ),
            'textBlock' => array(
                'classes' => ' text-block_y-lg',
                'fontSize' => 'xlg',
            ),
        );    
        bgBlock('page_text-block', $styles, true); ?>
    </div>
</div>





<?php 
get_footer();
