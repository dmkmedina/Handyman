<?php

// Creating the widget
class tradesman_services_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'tradesman_services_widget',
            __('Handyman Services Widget', 'tradesman_domain'),
            array('description' => __('Services widget for the Handyman theme that appears in the sidebar. Add one service per line.', 'tradesman_domain'),)
        );
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        $services = preg_split('/$\R?^/m', $instance['services']);

        // This is where you run the code and display the output
        echo '<h3><span class="primary-color-bg-before">' . $args['before_title'] . $instance['title'] .  $args['after_title'] . '</span></h3>';
        echo '<ul class="fa-ul">';

        foreach ($services as $service) {
            echo '<li><i class="fa-li fa fa-check-square-o"></i> '.$service.'</li>';
        }

        echo '</ul>';

        echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Our Services', 'tradesman_domain');
        }

        if (isset($instance['services'])) {
            $services = $instance['services'];
        } else {
            $services = '';
        }

        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'tradesman_domain'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"
                   placeholder="e.g. Our Services"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('services'); ?>"><?php _e('Services:', 'tradesman_domain'); ?></label>
            <textarea class="widefat" rows="5" placeholder="One Service Per Line" id="<?php echo $this->get_field_id('services'); ?>" name="<?php echo $this->get_field_name('services'); ?>"><?php echo esc_attr($services); ?></textarea>
        </p>
    <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['services'] = (!empty($new_instance['services'])) ? strip_tags($new_instance['services']) : '';
        return $instance;
    }
} // Class wpb_widget ends here

// Register and load the widget
function tradesman_services_load_widget()
{
    register_widget('tradesman_services_widget');
}

add_action('widgets_init', 'tradesman_services_load_widget');