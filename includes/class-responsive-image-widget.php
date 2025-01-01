<?php
/**
 * Elementor Responsive Image Widget
 *
 * @package Elementor_Responsive_Image_Widget
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class ERIW_Responsive_Image_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'responsive_image_widget';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Responsive Image', 'elementor-responsive-image-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-image';
	}

	/**
	 * Get widget categories.
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'basic' ];
	}

	/**
	 * Register widget controls.
	 */
	protected function _register_controls() {
		// Desktop Image
		$this->start_controls_section(
			'section_desktop_image',
			array(
				'label' => __( 'Desktop Image', 'elementor-responsive-image-widget' ),
			),
		);

		$this->add_control(
			'desktop_image',
			array(
				'label'   => __( 'Choose Image', 'elementor-responsive-image-widget' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
			),
		);

		$this->add_control(
			'desktop_alt',
			array(
				'label'       => __( 'Alt Text', 'elementor-responsive-image-widget' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter alt text for desktop image', 'elementor-responsive-image-widget' ),
			),
		);

		$this->add_control(
			'desktop_title',
			array(
				'label'       => __( 'Title', 'elementor-responsive-image-widget' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter title for desktop image', 'elementor-responsive-image-widget' ),
			),
		);

		$this->add_control(
			'desktop_caption',
			array(
				'label'       => __( 'Caption', 'elementor-responsive-image-widget' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter caption for desktop image', 'elementor-responsive-image-widget' ),
			),
		);

		$this->end_controls_section();

		// Tablet Image
		$this->start_controls_section(
			'section_tablet_image',
			array(
				'label' => __( 'Tablet Image', 'elementor-responsive-image-widget' ),
			),
		);

		$this->add_control(
			'tablet_image',
			array(
				'label'   => __( 'Choose Image', 'elementor-responsive-image-widget' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
			),
		);

		$this->add_control(
			'tablet_alt',
			array(
				'label'       => __( 'Alt Text', 'elementor-responsive-image-widget' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter alt text for tablet image', 'elementor-responsive-image-widget' ),
			),
		);

		$this->add_control(
			'tablet_title',
			array(
				'label'       => __( 'Title', 'elementor-responsive-image-widget' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter title for tablet image', 'elementor-responsive-image-widget' ),
			),
		);

		$this->add_control(
			'tablet_caption',
			array(
				'label'       => __( 'Caption', 'elementor-responsive-image-widget' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter caption for tablet image', 'elementor-responsive-image-widget' ),
			),
		);

		$this->end_controls_section();

		// Mobile Image
		$this->start_controls_section(
			'section_mobile_image',
			array(
				'label' => __( 'Mobile Image', 'elementor-responsive-image-widget' ),
			),
		);

		$this->add_control(
			'mobile_image',
			array(
				'label'   => __( 'Choose Image', 'elementor-responsive-image-widget' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
			),
		);

		$this->add_control(
			'mobile_alt',
			array(
				'label'       => __( 'Alt Text', 'elementor-responsive-image-widget' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter alt text for mobile image', 'elementor-responsive-image-widget' ),
			),
		);

		$this->add_control(
			'mobile_title',
			array(
				'label'       => __( 'Title', 'elementor-responsive-image-widget' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter title for mobile image', 'elementor-responsive-image-widget' ),
			),
		);

		$this->add_control(
			'mobile_caption',
			array(
				'label'       => __( 'Caption', 'elementor-responsive-image-widget' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Enter caption for mobile image', 'elementor-responsive-image-widget' ),
			),
		);

		$this->end_controls_section();

		// Style Tab
		$this->start_controls_section(
			'section_style',
			array(
				'label' => __( 'Style', 'elementor-responsive-image-widget' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			),
		);

		$this->add_control(
			'image_width',
			array(
				'label'      => __( 'Width', 'elementor-responsive-image-widget' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					),
					'%'  => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} img' => 'width: {{SIZE}}{{UNIT}};',
				),
			),
		);

		$this->add_control(
			'image_height',
			array(
				'label'      => __( 'Height', 'elementor-responsive-image-widget' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					),
					'%'  => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} img' => 'height: {{SIZE}}{{UNIT}};',
				),
			),
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'     => 'image_border',
				'label'    => __( 'Border', 'elementor-responsive-image-widget' ),
				'selector' => '{{WRAPPER}} img',
			),
		);

		$this->add_control(
			'image_border_radius',
			array(
				'label'      => __( 'Border Radius', 'elementor-responsive-image-widget' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			),
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'image_box_shadow',
				'label'    => __( 'Box Shadow', 'elementor-responsive-image-widget' ),
				'selector' => '{{WRAPPER}} img',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$desktop_image_url = ! empty( $settings['desktop_image']['url'] ) ? esc_url( $settings['desktop_image']['url'] ) : '';
		$tablet_image_url  = ! empty( $settings['tablet_image']['url'] ) ? esc_url( $settings['tablet_image']['url'] ) : '';
		$mobile_image_url  = ! empty( $settings['mobile_image']['url'] ) ? esc_url( $settings['mobile_image']['url'] ) : '';

		$desktop_alt = ! empty( $settings['desktop_alt'] ) ? esc_attr( $settings['desktop_alt'] ) : '';
		$tablet_alt  = ! empty( $settings['tablet_alt'] ) ? esc_attr( $settings['tablet_alt'] ) : '';
		$mobile_alt  = ! empty( $settings['mobile_alt'] ) ? esc_attr( $settings['mobile_alt'] ) : '';

		$desktop_title = ! empty( $settings['desktop_title'] ) ? esc_attr( $settings['desktop_title'] ) : '';
		$tablet_title  = ! empty( $settings['tablet_title'] ) ? esc_attr( $settings['tablet_title'] ) : '';
		$mobile_title  = ! empty( $settings['mobile_title'] ) ? esc_attr( $settings['mobile_title'] ) : '';

		$desktop_caption = ! empty( $settings['desktop_caption'] ) ? esc_html( $settings['desktop_caption'] ) : '';
		$tablet_caption  = ! empty( $settings['tablet_caption'] ) ? esc_html( $settings['tablet_caption'] ) : '';
		$mobile_caption  = ! empty( $settings['mobile_caption'] ) ? esc_html( $settings['mobile_caption'] ) : '';

		if ( empty( $desktop_image_url ) && empty( $tablet_image_url ) && empty( $mobile_image_url ) ) {
			return;
		}

		echo '<picture>';

		if ( ! empty( $mobile_image_url ) ) {
			echo '<source media="(max-width: 480px)" srcset="' . esc_url( $mobile_image_url ) . '">';
		}

		if ( ! empty( $tablet_image_url ) ) {
			echo '<source media="(max-width: 768px)" srcset="' . esc_url( $tablet_image_url ) . '">';
		}

		if ( ! empty( $desktop_image_url ) ) {
			echo '<img src="' . esc_url( $desktop_image_url ) . '" alt="' . esc_attr( $desktop_alt ) . '" title="' . esc_attr( $desktop_title ) . '">';
		}

		echo '</picture>';

		if ( ! empty( $desktop_caption ) || ! empty( $tablet_caption ) || ! empty( $mobile_caption ) ) {
			echo '<div class="image-caption">';
			echo esc_html( $desktop_caption );
			echo '</div>';
		}
	}

	/**
	 * Render widget output in the editor.
	 */
	protected function _content_template() {
		?>
        <# if ( settings.desktop_image.url || settings.tablet_image.url || settings.mobile_image.url ) { #>
        <picture>
            <# if ( settings.mobile_image.url ) { #>
            <source media="(max-width: 480px)" srcset="{{ settings.mobile_image.url }}">
            <# } #>
            <# if ( settings.tablet_image.url ) { #>
            <source media="(max-width: 768px)" srcset="{{ settings.tablet_image.url }}">
            <# } #>
            <# if ( settings.desktop_image.url ) { #>
            <img src="{{ settings.desktop_image.url }}" alt="{{ settings.desktop_alt }}" title="{{ settings.desktop_title }}">
            <# } #>
        </picture>
        <# if ( settings.desktop_caption || settings.tablet_caption || settings.mobile_caption ) { #>
        <div class="image-caption">
            {{ settings.desktop_caption }}
        </div>
        <# } #>
        <# } #>
		<?php
	}
}