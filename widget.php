<?php

class Native_Fullscreen_Widget extends WP_Widget {

	public function __construct() {
		// widget actual processes
		parent::__construct(
	 		'native_fullscreen_widget', // Base ID
			'Fullscreen Button', // Name
			array('description' => 'A simple button to go fullscreen.') // Args
		);
	}

 	public function form($instance) {
		// outputs the options form on admin
		$target = isset($instance['target']) ? $instance['target'] : '#page';
		$text = isset($instance['text']) ? $instance['text'] : 'Go Fullscreen';
		?>
		<p>
			<label for="<?php echo $this->get_field_id('target'); ?>"><?php _e('Target:'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('target'); ?>" name="<?php echo $this->get_field_name('target'); ?>" type="text" value="<?php echo esc_attr($target); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:'); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo esc_attr($text); ?>" />
		</p>
		<?php
	}

	public function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = array();
		$instance['target'] = strip_tags($new_instance['target']);
		$instance['text'] = strip_tags($new_instance['text']);
		return $instance;
	}

	public function widget($args, $instance) {
		// outputs the content of the widget
		echo $before_widget;
		echo Native_Fullscreen::get_button($instance);
		echo $after_widget;
	}
}
add_action('widgets_init', create_function('', 'register_widget("native_fullscreen_widget");'));

?>