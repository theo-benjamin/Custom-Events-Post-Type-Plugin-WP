<!-- This file contains the HTML for the Splice Events Shortcode -->
<section>
    <!--HTML Table Structure-->
    <h1>Events</h1>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Sign Up Link</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody>
                <?php

                //Get all published events , limits events to 12 per page
                $args = array(
                    'post_type' => 'event',
                    'post_status' => ['publish'],
                    'posts_per_page' => 50,
                );
                
                //Run the query to fetch the events post
                $events = new WP_Query($args);

                //Loop through events post and display fields
                while ($events->have_posts()) {

                    $events->the_post();
                    $post_id = get_the_ID();
                    $start_time = new DateTime(get_post_meta($post_id, 'cpt_event_start_time', true));
                    $end_time = new DateTime(get_post_meta($post_id, 'cpt_event_end_time', true));



                ?>



                    <tr>
                        <td><?php echo the_title() ?></td>
                        <td><?php echo get_post_meta($post_id, 'cpt_event_description', true) ?></td>
                        <td><?php echo $start_time->format('d-m-Y H:i') ?></td>
                        <td><?php echo $end_time->format('d-m-Y H:i') ?></td>
                        <!-- URL sometimes too lon to the fit in assigned table cell,sovled the problem by using the URL as a link and using the 
                        the title attned -->
                        <td><a href='<?php echo get_post_meta($post_id, 'cpt_event_signup_link', true) ?>'> Attend</a></td>
                    </tr>



                <?php

                }
                ?>

            </tbody>
        </table>
    </div>
</section>