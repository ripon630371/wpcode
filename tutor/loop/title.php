<?php
/**
 * Course loop title
 *
 * @since v.1.0.0
 * @author themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
 */
?>

<h3 class="course__title-2" title="<?php the_title(); ?>">
    <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
</h3>

