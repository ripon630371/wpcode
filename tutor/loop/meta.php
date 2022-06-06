<?php
/**
 * @package TutorLMS/Templates
 * @version 1.4.3
 */

global $post, $authordata;

$profile_url = tutor_utils()->profile_url( $authordata->ID, true );
$course_duration = get_tutor_course_duration_context( get_the_ID(), true );
$course_students = tutor_utils()->count_enrolled_users_by_course();

?>


<div class="course__bottom-2 d-flex align-items-center justify-content-between">
     <div class="course__action">
        <ul>
           <?php if ( tutor_utils()->get_option( 'enable_course_total_enrolled' ) ) : ?>
           <li>
              <div class="course__action-item d-flex align-items-center">
                 <div class="course__action-icon mr-5">
                    <span>
                       <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M5.00004 5.5833C6.28592 5.5833 7.32833 4.5573 7.32833 3.29165C7.32833 2.02601 6.28592 1 5.00004 1C3.71416 1 2.67175 2.02601 2.67175 3.29165C2.67175 4.5573 3.71416 5.5833 5.00004 5.5833Z" stroke="#5F6160" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                          <path d="M9 11.0001C9 9.22632 7.20722 7.79175 5 7.79175C2.79278 7.79175 1 9.22632 1 11.0001" stroke="#5F6160" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                       </svg>
                    </span>
                 </div>
                 <div class="course__action-content">
                    <span><?php echo esc_html( $course_students ); ?></span>
                 </div>
              </div>
           </li>
           <?php endif; ?>

           <?php if(!empty($course_duration)) : ?>
           <li>
              <div class="course__action-item d-flex align-items-center">
                 <div class="course__action-icon mr-5">
                    <span>
                       <i class="tutor-icon-clock-filled"></i>
                    </span>
                 </div>
                 <div class="course__action-content">
                    <span><?php echo wp_kses_post( $course_duration ); ?></span>
                 </div>
              </div>
           </li>
           <?php endif; ?>

           <li>
              <div class="course__action-item d-flex align-items-center">
                 <div class="course__action-icon mr-5">
                    <span>
                       <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M6.86447 1.72209L7.74447 3.49644C7.86447 3.74343 8.18447 3.98035 8.45447 4.02572L10.0495 4.29288C11.0695 4.46426 11.3095 5.2103 10.5745 5.94625L9.33447 7.19636C9.12447 7.40807 9.00947 7.81637 9.07447 8.10873L9.42947 9.65625C9.70947 10.8812 9.06447 11.355 7.98947 10.7148L6.49447 9.82259C6.22447 9.66129 5.77947 9.66129 5.50447 9.82259L4.00947 10.7148C2.93947 11.355 2.28947 10.8761 2.56947 9.65625L2.92447 8.10873C2.98947 7.81637 2.87447 7.40807 2.66447 7.19636L1.42447 5.94625C0.694466 5.2103 0.929466 4.46426 1.94947 4.29288L3.54447 4.02572C3.80947 3.98035 4.12947 3.74343 4.24947 3.49644L5.12947 1.72209C5.60947 0.759304 6.38947 0.759304 6.86447 1.72209Z" stroke="#5F6160" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                       </svg>
                    </span>
                 </div>
                 <div class="course__action-content">
                    <?php
                        $course_rating = tutor_utils()->get_course_rating();
                    ?>
                    <span>
                        <?php
                            if ($course_rating->rating_avg >= 0) {
                                echo apply_filters('tutor_course_rating_average', $course_rating->rating_avg) . '';

                                echo '<span class="rating-count-gap">(' . apply_filters('tutor_course_rating_count', $course_rating->rating_count) . ') </span>';
                            }
                        ?> 
                    </span>
                 </div>
              </div>
           </li>
        </ul>
     </div>
     <div class="course__tutor-2">
        <a href="<?php echo esc_url($profile_url); ?>">
           <?php echo get_avatar(get_the_author_meta('ID'), 32) ?>
        </a>
     </div>
</div>





<div class="list-item-meta tutor-fs-7 tutor-fw-medium tutor-color-black tutor-d-flex tutor-mt-12 tutor-mb-32 d-none">
    <?php
        $course_duration = get_tutor_course_duration_context( get_the_ID(), true );
        $course_students = tutor_utils()->count_enrolled_users_by_course();
    ?>
    <?php
        if(!empty($course_duration)) { 
    ?>
    <div class="tutor-d-flex tutor-align-items-center">
        <span class="meta-icon tutor-icon-clock-filled tutor-color-muted"></span>
        <span><?php echo wp_kses_post( $course_duration ); ?></span>
    </div>
    <?php } ?>
    <?php if ( tutor_utils()->get_option( 'enable_course_total_enrolled' ) ) : ?>
    <div class="tutor-d-flex tutor-align-items-center">
        <span class="meta-icon tutor-icon-user-filled tutor-color-muted"></span>
        <span><?php echo esc_html( $course_students ); ?></span>
    </div>
    <?php endif; ?>
</div>

<div class="list-item-author tutor-d-flex tutor-align-items-center tutor-mt-auto d-none">
	<div class="tutor-avatar">
		<a href="<?php echo $profile_url; ?>"> <?php echo tutor_utils()->get_tutor_avatar($post->post_author); ?></a>
	</div>
	<div class="tutor-course-meta tutor-fs-7 tutor-color-black-60">
        <span class="tutor-course-meta-name">
            <?php esc_html_e('By', 'tutor') ?>
            <span class="tutor-fs-7 tutor-fw-medium tutor-color-black">
                <?php esc_html_e(get_the_author()); ?>
            </span>
        </span>
        <span class="tutor-course-meta-cat">
            <?php
                $course_categories = get_tutor_course_categories();
                if(!empty($course_categories) && is_array($course_categories ) && count($course_categories)){
            ?>
            <?php esc_html_e('In', 'tutor') ?>
            <span class="tutor-fs-7 tutor-fw-medium course-category tutor-color-black">
                <?php
                    foreach ($course_categories as $course_category){
                        $category_name = $course_category->name;
                        $category_link = get_term_link($course_category->term_id);
                        echo wp_kses_post("<a href='$category_link'>$category_name </a>");
                    }
                }
                ?>
            </span>
        </span>
	</div>
</div>
