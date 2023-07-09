<?php
namespace TestAddons\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Widget 2.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Widget1 extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve widget name.
	 *
	 */
	public function get_name() {
		return 'test-addons-hover';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve  widget title.
	 */
	public function get_title() {
		return esc_html__( 'Hover Creative', 'test-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve  widget icon.
	 *
	 */
	public function get_icon() {
		return 'eicon-image-rollover';
	}



	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the  widget belongs to.
	 *
	 */
	public function get_categories() {
		return [ 'test-addons' ];
	}


	/**
	 * Get widget style depends
	 *
	 * Retrieve the list of categories the  widget belongs to.
	 *
	 */


	public function get_style_depends() {
		return [
			'widget-common-style',
			'widget-style-3',
		];
	}
	
	

	/**
	 * Register  widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.

	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'test-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'widget_image',
			[
				'label' => esc_html__( 'Choose Image', 'test-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_control(
			'widget_title',
			[
				'label' => esc_html__( 'Title', 'test-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'App Development.', 'test-addons' ),
				'placeholder' => esc_html__( 'Type your title here', 'test-addons' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'widget_desc',
			[
				'label' => esc_html__( 'Description/Category Name', 'test-addons' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Wordpress, App', 'test-addons' ),
				'placeholder' => esc_html__( 'Type your description here', 'test-addons' ),
			]
		);

		$this->add_control(
			'widget_link',
			[
				'label' => esc_html__( 'Link', 'test-addons' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'test-addons' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);


		$this->end_controls_section();


		//  STyle controls

		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Content', 'test-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		

		$this->add_control(
			'image_radius',
			[
				'label' => esc_html__( 'Image Border radius', 'test-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ele-inner-item .ele-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Title Typography', 'test-addons' ),
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ele-portfolio-content h3',
			]
		);
		// $this->add_control(
		// 	'background_color',
		// 	[
		// 		'label' => esc_html__( 'Background Color', 'test-addons' ),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'selectors' => [
		
		// 			'{{WRAPPER}} .ele-portfolio-content' => 'background-color: {{VALUE}}',
		// 		],
		// 	]
		// );
		
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'test-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ele-portfolio-content h3 a' => 'color: {{VALUE}}',
				],
			]
		);


		$this->add_control(
			'title_hover_color',
			[
				'label' => esc_html__( 'Title Hover Color', 'test-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ele-portfolio-content h3 a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Content Typography', 'test-addons' ),
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .ele-inner-item .ele-portfolio-content span',
			]
		);


		$this->add_control(
			'desc_color',
			[
				'label' => esc_html__( 'Description Color', 'test-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ele-inner-item .ele-portfolio-content span' => 'color: {{VALUE}}',
				],
			]
		);


		$this->end_controls_section();


		// content Style

		$this->start_controls_section(
			'content_style_section',
			[
				'label' => esc_html__( 'Content Box Style', 'test-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'test-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ele-hover-style-3 .inner-content:hover .ele-portfolio-content' => 'background-color: {{VALUE}}',
				],
			]
		);



		$this->add_control(
			'content_padding',
			[
				'label' => esc_html__( 'Padding', 'test-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ele-inner-item .ele-portfolio-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);



		$this->end_controls_section();

	}

	/**
	 * Render  widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();


		?>

<div class="ele-inner-item ele-hover-style-3">
    <div class="inner-content">
        <div class="ele-image">
            <a href="<?php echo esc_url($settings['widget_link']['url'],'test-addons');?>"><img
                    src="<?php echo esc_url($settings['widget_image']['url'],'test-addons');?>"
                    alt="<?php echo esc_attr($settings['widget_title'],'test-addons');?>" class="img-fluid"></a>
        </div>

        <div class="ele-portfolio-content">
            <h3><a
                    href="<?php echo esc_url($settings['widget_link']['url'],'test-addons');?>"><?php echo esc_html($settings['widget_title'],'test-addons');?></a>
            </h3>
            <span class="category"><?php echo esc_html($settings['widget_desc'],'test-addons');?></span>

            <a class="btn-icon" href="<?php echo esc_url($settings['widget_link']['url'],'test-addons');?>"><i
                    class="lni lni-arrow-right"></i></a>
        </div>
    </div>
</div>



<?php 

	}

}