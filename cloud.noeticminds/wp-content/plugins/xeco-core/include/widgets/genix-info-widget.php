<?php

/**
 * Xeco Footer full Widget
 *
 *
 * @author 		themegenix
 * @category 	Widgets
 * @package 	Xeco/Widgets
 * @version 	1.0.0
 * @extends 	WP_Widget
 */
	add_action('widgets_init', 'Xeco_info_Widget');
	function Xeco_info_Widget() {
		register_widget('Xeco_info_Widget');
	}


	class Xeco_info_Widget  extends WP_Widget{

		public function __construct(){
			parent::__construct('Xeco_info_Widget',esc_html__('Xeco Info','genixcore'),array(
				'description' => esc_html__('Xeco Info Widget','genixcore'),
			));
		}

		public function widget($args, $instance){
			extract($args);
			extract($instance);

			print $before_widget;

			if ( ! empty( $title ) ) {
				print $before_title . apply_filters( 'widget_title', $title ) . $after_title;
			}
		?>

			<div class="cs-text_widget">

				<?php if( !empty($image_box_image) ): ?>
				<div class="footer-logo cs-site_branding mb-4">
					<a href="<?php print home_url(); ?>"><img src="<?php print $image_box_image; ?>" alt="<?php echo esc_attr__('Xeco','genixcore') ?>"></a>
				</div>
				<?php endif; ?>

				<?php if( !empty($description) ): ?>
					<div class="footer-text">
						<p><?php print $description; ?></p>
					</div>
				<?php endif; ?>

			</div>

            <div class="cs-social_btns cs-style1">
                <?php if( !empty($facebook) ): ?>
                    <a class="cs-center" href="<?php print esc_url($facebook); ?>"><i class="fab fa-facebook-f"></i></a>
                <?php endif; ?>

                <?php if( !empty($twitter) ): ?>
                    <a class="cs-center" href="<?php print esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a>
                <?php endif; ?>

                <?php if( !empty($instagram) ): ?>
                    <a class="cs-center" href="<?php print esc_url($instagram); ?>"><i class="fab fa-instagram"></i></a>
                <?php endif; ?>

                <?php if( !empty($youtube) ): ?>
                    <a class="cs-center" href="<?php print esc_url($youtube); ?>"><i class="fab fa-youtube"></i></a>
                <?php endif; ?>
            </div>

            <?php print $after_widget; ?>

		<?php
		}


		/**
		 * widget function.
		 *
		 * @see WP_Widget
		 * @access public
		 * @param array $instance
		 * @return void
		 */
		public function form($instance){

			$title  = isset($instance['title'])? $instance['title']:'';
			$description  = isset($instance['description'])? $instance['description']:'';
			$author_img  = isset($instance['image_box_image'])? $instance['image_box_image']:'';

			$twitter  = isset($instance['twitter'])? $instance['twitter']:'';
			$facebook  = isset($instance['facebook'])? $instance['facebook']:'';
			$instagram  = isset($instance['instagram'])? $instance['instagram']:'';
			$youtube  = isset($instance['youtube'])? $instance['youtube']:'';

			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','genixcore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">

			<p>
				<input type="button" class="button button-secondary js_custom_upload_media" id="<?= $this->id ?>" value="Upload Media"></input>
				<input type="hidden" class="img <?= $this->id ?>_url" name="<?php print esc_attr($this->get_field_name('image_box_image')); ?>" class="image_er_link" value="<?php print $author_img ; ?>">
				<div class="author-image-show">
					<img class="<?= $this->id ?>_img" src="<?php print $author_img ; ?>" alt="" width="150" height="auto">
				</div>
                <script>
                    jQuery(document).ready(function ($) {
                        function media_upload(button_selector) {
                            var _custom_media = true,
                                _orig_send_attachment = wp.media.editor.send.attachment;
                            $('body').on('click', button_selector, function () {
                                var button_id = $(this).attr('id');
                                wp.media.editor.send.attachment = function (props, attachment) {
                                    if (_custom_media) {
                                        $('.' + button_id + '_img').attr('src', attachment.url);
                                        $('.' + button_id + '_url').val(attachment.url);
                                    } else {
                                        return _orig_send_attachment.apply($('#' + button_id), [props, attachment]);
                                    }
                                }
                                wp.media.editor.open($('#' + button_id));

                                $($(this).parents()[4]).addClass('widget-dirty');
                                $('#widget-<?= $this->id ?>-savewidget').removeAttr('disabled');
                                return false;
                            });
                        }
                        media_upload('.js_custom_upload_media');
                    });
                </script>
			</p>

			<p>
				<label for="title"><?php esc_html_e('Short Description:','genixcore'); ?></label>
			</p>

			<textarea class="widefat" rows="7" cols="15" id="<?php print esc_attr($this->get_field_id('description')); ?>" value="<?php print esc_attr($description); ?>" name="<?php print esc_attr($this->get_field_name('description')); ?>"><?php print esc_attr($description); ?></textarea>

			<p>
				<label for="title"><?php esc_html_e('Facebook:','genixcore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('facebook')); ?>"  name="<?php print esc_attr($this->get_field_name('facebook')); ?>" value="<?php print esc_attr($facebook); ?>">


			<p>
				<label for="title"><?php esc_html_e('Twitter:','genixcore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('twitter')); ?>"  name="<?php print esc_attr($this->get_field_name('twitter')); ?>" value="<?php print esc_attr($twitter); ?>">

			<p>
				<label for="title"><?php esc_html_e('Instagram:','genixcore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('instagram')); ?>"  name="<?php print esc_attr($this->get_field_name('instagram')); ?>" value="<?php print esc_attr($instagram); ?>">
			<p>
				<label for="title"><?php esc_html_e('Youtube:','genixcore'); ?></label>
			</p>
			<input class="widefat" type="text" id="<?php print esc_attr($this->get_field_id('youtube')); ?>"  name="<?php print esc_attr($this->get_field_name('youtube')); ?>" value="<?php print esc_attr($youtube); ?>">
			<p></p>

			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';

			$instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
			$instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
			$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
			$instance['youtube'] = ( ! empty( $new_instance['youtube'] ) ) ? strip_tags( $new_instance['youtube'] ) : '';

			$instance['image_box_image'] = ( ! empty( $new_instance['image_box_image'] ) ) ? strip_tags( $new_instance['image_box_image'] ) : '';

			return $instance;
		}
	}