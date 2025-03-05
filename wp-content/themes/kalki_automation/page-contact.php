<?php
/* Template name: Contact Us*/
get_header();?>

<div class="contact-container">
   
        <div class="contact-header"> <?php the_title();?></div>
        <div class="contact-content"> <?php the_content();?></div>
</div>
<!-- <div class="contact-info-box">
            
            <div class="contact-details">
                <?php if ($phone = get_field('phone_number')) : ?>
                    <p><i class="fas fa-phone-alt"></i> <?php echo esc_html($phone); ?></p>
                <?php endif; ?>
                <?php if ($email = get_field('_email_address_')) : ?>
                    <p><i class="fas fa-envelope"></i> <?php echo esc_html($email); ?></p>
                <?php endif; ?>
                <?php if ($address = get_field('address_')) : ?>
                    <p><i class="fas fa-map-marker-alt"></i> <?php echo esc_html($address); ?></p>
                <?php endif; ?>
            </div>
        </div> -->
<?php get_footer();?>