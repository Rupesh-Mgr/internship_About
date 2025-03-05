<?php
/* Template Name: Booking Page */
get_header();
?>
<div class="booking-container">
    <!-- Image Section -->
    <div class="booking-image-section">
        <h1>Booking for Appointment</h1>
        <br>
        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
    </div>

    <!-- Form Section -->
    <form class="booking-form" method="post" action="">
       
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="date">Select Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="time">Select Time:</label>
        <input type="time" id="time" name="time" required>

        <label for="service">Select Service:</label>
        <select id="service" name="service" required>
            <option value="Consultation">Consultation</option>
            <option value="Support Call">Support Call</option>
            <option value="Development Meeting">Development Meeting</option>
        </select>

        <input type="submit" name="submit_booking" value="Book Now">
    </form>
</div>

<?php get_footer(); ?>