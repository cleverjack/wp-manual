<?php
/******************************
	ADD TEMPLATE :: SERVICES
*******************************/
	 add_filter( 'vc_load_default_templates', 'vc_services_template' );
	 function vc_services_template($data) {
        $template               = array();
        $template['name']       = __( '[Manual] Service Page', 'manual' );
        $template['content']    = <<<CONTENT
            [vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456111714980{margin-top: 50px !important;}"][vc_column][vc_column_text css=".vc_custom_1455039561342{margin-bottom: 27px !important;}"]
<h2 style="text-align: center;">THE BEST SOLUTION</h2>
[/vc_column_text][vc_column_text]
<h4 style="text-align: center;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</h4>
[/vc_column_text][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456489708238{margin-bottom: 60px !important;}"][vc_column width="1/4"][manual_service_table_section title="Fully Responsive" iconimage="icon-mobile" description="Choose our beautiful templates or easily create your own to start building your site" link="|title:Learn%20More|"][manual_service_option]
<ul>
	<li>Modern Design</li>
	<li>24/7 Premium Support</li>
	<li>Modern Page Layouts</li>
	<li>Fully Responsive</li>
</ul>
[/manual_service_option][/manual_service_table_section][/vc_column][vc_column width="1/4"][manual_service_table_section title="Premium Slider" iconimage="icon-picture" description="Choose our beautiful templates or easily create your own to start building your site" link="|title:Learn%20More|"][manual_service_option]
<ul>
	<li>Modern Design</li>
	<li>24/7 Premium Support</li>
	<li>Modern Page Layouts</li>
	<li>Fully Responsive</li>
</ul>
[/manual_service_option][/manual_service_table_section][/vc_column][vc_column width="1/4"][manual_service_table_section title="Page Builder" iconimage="icon-gears" description="Choose our beautiful templates or easily create your own to start building your site" link="|title:Learn%20More|"][manual_service_option]
<ul>
	<li>Modern Design</li>
	<li>24/7 Premium Support</li>
	<li>Modern Page Layouts</li>
	<li>Fully Responsive</li>
</ul>
[/manual_service_option][/manual_service_table_section][/vc_column][vc_column width="1/4"][manual_service_table_section title="Dedicated Support" iconimage="icon-chat" description="Choose our beautiful templates or easily create your own to start building your site" link="|title:Learn%20More|"][manual_service_option]
<ul>
	<li>Modern Design</li>
	<li>24/7 Premium Support</li>
	<li>Modern Page Layouts</li>
	<li>Fully Responsive</li>
</ul>
[/manual_service_option][/manual_service_table_section][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" video="show_video" video_mp4="https://s3-us-west-2.amazonaws.com/coverr/mp4/Traffic-blurred2.mp4" full_width="stretch_row" equal_height="yes" css=".vc_custom_1456489642550{margin-top: 40px !important;padding-top: 50px !important;padding-bottom: 100px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;"><span style="color: #ededed;">OUR STATUS</span></h2>
[/vc_column_text][vc_row_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="5852" text="Happy Customer" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="500" text_font_weight="500" separator="yes" digit="567" text="CUPS OF COFFEE" font_color="#ffffff" text_color="#ffffff" separator_color="#aaaaaa"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="72" text="Finished Projects" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="500" text_font_weight="500" separator="yes" digit="187" text="Staff Members" font_color="#ffffff" text_color="#ffffff" separator_color="#aaaaaa"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
        array_unshift($data, $template);
        return $data;
    }
	 
	 
/*******
	ADD TEMPLATE :: ABOUT US
********/
	 add_filter( 'vc_load_default_templates', 'vc_aboutus_template' );
	 function vc_aboutus_template($data) {
        $template               = array();
        $template['name']       = __( '[Manual] About Us Page', 'manual' );
        $template['content']    = <<<CONTENT
            [vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456998111582{margin-top: 50px !important;margin-bottom: 50px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;">Welcome To Manual</h2>
[/vc_column_text][vc_column_text]
<h4 style="text-align: center;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</h4>
[/vc_column_text][vc_separator style="double" el_width="50"][vc_row_inner][vc_column_inner width="1/2"][vc_column_text]
<h3>About Us</h3>
[/vc_column_text][vc_column_text]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis. Suspendisse consectetur fringilla luctus. Fusce id mi diam, non ornare orci. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor.[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text]
<h3 style="text-align: right;">Our Crazy Skills</h3>
[/vc_column_text][vc_progress_bar values="%5B%7B%22label%22%3A%22WEB%20DEVELOPMENT%22%2C%22value%22%3A%2295%22%7D%2C%7B%22label%22%3A%22DESIGN%22%2C%22value%22%3A%2280%22%7D%2C%7B%22label%22%3A%22MARKETING%22%2C%22value%22%3A%2270%22%7D%5D" options="striped,animated" units="%"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#e8e8e8" full_width="stretch_row" equal_height="yes" css=".vc_custom_1456998481095{margin-top: 50px !important;padding-top: 135px !important;padding-bottom: 135px !important;}"][vc_column][vc_custom_heading text="We offer a range of services for both businesses and individual companies" font_container="tag:div|font_size:45|text_align:center|color:%23ffffff" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:800%20bold%20regular%3A800%3Anormal"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#fafafa" css=".vc_custom_1456997907669{padding-top: 30px !important;padding-bottom: 40px !important;}"][vc_column][vc_column_text css=".vc_custom_1455109004925{margin-top: 40px !important;border-bottom-width: 30px !important;}"]
<h2 style="text-align: center;">Our Team Members</h2>
[/vc_column_text][vc_separator style="double" el_width="10" css=".vc_custom_1455109618064{margin-bottom: 50px !important;}"][vc_row_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Miller Johnson " team_position="Founder" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Ubon Anne" team_position="Manager" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Earnest Johnson" team_position="General Manager" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Jeshon Ambron " team_position="Programmer" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
        array_unshift($data, $template);
        return $data;
    }
	 
	 
/*******
	ADD TEMPLATE :: PRICING TABLE
********/
	 add_filter( 'vc_load_default_templates', 'vc_pricingtable_template' );
	 function vc_pricingtable_template($data) {
        $template               = array();
        $template['name']       = __( '[Manual] Pricing Table', 'manual' );
        $template['content']    = <<<CONTENT
            [vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456490436499{margin-top: 50px !important;}"][vc_column][vc_column_text css=".vc_custom_1455440864809{margin-bottom: 27px !important;}"]
<h2 style="text-align: center;">PRICING TABLES</h2>
[/vc_column_text][vc_column_text]
<h4 style="text-align: center;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</h4>
[/vc_column_text][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1455440931885{margin-top: 50px !important;margin-bottom: 60px !important;}"][vc_column width="1/4"][manual_pricing_table_section title="Premium" link="url:%23|title:PURCHEASE|target:%20_blank" active="no" show_button="yes" price="29" currency="$" price_period="/MO"][manual_pricing_option]
<ul>
	<li style="border-bottom: 1px solid #F0F0F0;">1GB Bandwidth</li>
	<li style="border-bottom: 1px solid #F0F0F0;">Free Upgrades</li>
	<li style="border-bottom: 1px solid #F0F0F0;">100GB Storage</li>
	<li style="border-bottom: 1px solid #F0F0F0;">Unlimited Users</li>
</ul>
[/manual_pricing_option][/manual_pricing_table_section][/vc_column][vc_column width="1/4"][manual_pricing_table_section title="Professional" link="url:%23|title:PURCHEASE|target:%20_blank" active="yes" show_button="yes" price="58" currency="$" price_period="/MO"][manual_pricing_option]
<ul>
	<li style="border-bottom: 1px solid #F0F0F0;">1GB Bandwidth</li>
	<li style="border-bottom: 1px solid #F0F0F0;">Free Upgrades</li>
	<li style="border-bottom: 1px solid #F0F0F0;">100GB Storage</li>
	<li style="border-bottom: 1px solid #F0F0F0;">Unlimited Users</li>
</ul>
[/manual_pricing_option][/manual_pricing_table_section][/vc_column][vc_column width="1/4"][manual_pricing_table_section title="Maximum" link="url:%23|title:PURCHEASE|target:%20_blank" active="no" show_button="yes" price="76" currency="$" price_period="/MO"][manual_pricing_option]
<ul>
	<li style="border-bottom: 1px solid #F0F0F0;">1GB Bandwidth</li>
	<li style="border-bottom: 1px solid #F0F0F0;">Free Upgrades</li>
	<li style="border-bottom: 1px solid #F0F0F0;">100GB Storage</li>
	<li style="border-bottom: 1px solid #F0F0F0;">Unlimited Users</li>
</ul>
[/manual_pricing_option][/manual_pricing_table_section][/vc_column][vc_column width="1/4"][manual_pricing_table_section title="Extreme" link="url:%23|title:PURCHEASE|target:%20_blank" active="no" show_button="yes" price="109" currency="$" price_period="/MO"][manual_pricing_option]
<ul>
	<li style="border-bottom: 1px solid #F0F0F0;">1GB Bandwidth</li>
	<li style="border-bottom: 1px solid #F0F0F0;">Free Upgrades</li>
	<li style="border-bottom: 1px solid #F0F0F0;">100GB Storage</li>
	<li style="border-bottom: 1px solid #F0F0F0;">Unlimited Users</li>
</ul>
[/manual_pricing_option][/manual_pricing_table_section][/vc_column][/vc_row]
CONTENT;
        array_unshift($data, $template);
        return $data;
    }
	 


/*******
	ADD TEMPLATE :: HOME BUSINESS - 3.0
********/
	 add_filter( 'vc_load_default_templates', 'vc_homeone_template' );
	 function vc_homeone_template($data) {
        $template               = array();
        $template['name']       = __( '[Manual] Home - Business', 'manual' );
        $template['content']    = <<<CONTENT
		
[vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456491347473{margin-top: 50px !important;margin-bottom: 50px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;">WHAT WE DO</h2>
[/vc_column_text][vc_column_text css=".vc_custom_1509823959553{margin-bottom: 55px !important;}"]
<h4 style="text-align: center; font-weight: 500;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</h4>
[/vc_column_text][vc_row_inner][vc_column_inner width="1/3"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-mobile" display_icon_position="left" use_custom_icon_size="no" title="Fully Responsive" text="Manual responsive framework ensures your content looks great on all screen sizes"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-clipboard" display_icon_position="left" use_custom_icon_size="no" title="Amazing Elements" text="Manual offers incredible elements that allow you to create a beautiful site"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-gears " display_icon_position="left" use_custom_icon_size="no" title="Dedicated Support" text="We care about your site as much as you do, you can count on us for theme support"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/3"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-layers" display_icon_position="left" use_custom_icon_size="no" title="Powerful Options" text="Manual theme options and page options allow you to take control of your website"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-refresh" display_icon_position="left" use_custom_icon_size="no" title="Free Upgrades With Value" text="We issue updates that matter; rich with amazing new features and improvements"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-browser" display_icon_position="left" use_custom_icon_size="no" title="Awesome Portfolio Layouts" text="Manual has awesome portfolio layouts that make your work stand out!"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="parallax" background_image="574" full_width="stretch_row" equal_height="yes" css=".vc_custom_1457011386388{margin-top: 40px !important;padding-top: 110px !important;padding-bottom: 110px !important;}"][vc_column][vc_row_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="5852" text="Happy Customer" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="600" text_font_weight="500" separator="yes" digit="567" text="CUPS OF COFFEE" font_color="#ffffff" text_color="#ffffff" separator_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="72" text="Finished Projects" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="600" text_font_weight="500" separator="yes" digit="187" text="Staff Members" font_color="#ffffff" text_color="#ffffff" separator_color="#ffffff"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456920201828{margin-top: 100px !important;margin-bottom: 60px !important;}"][vc_column width="1/2"][vc_row_inner][vc_column_inner][vc_column_text]
<h2>The Best Help Desk Theme</h2>
[/vc_column_text][vc_separator align="align_left" style="double" el_width="20" css=".vc_custom_1456961114174{margin-top: -10px !important;}"][vc_column_text]
<h4 style="text-align: justify; font-weight: 500;">Manual is loaded with useful, functional options that allow users to quickly and easily create stunning websites.</h4>
&nbsp;
<p style="text-align: justify;">Donec volutpat nibh sit amet libero ornare non laoreet arcu luctus. Donec id arcu quis mauris euismod placerat sit amet ut metus. Sed imperdiet fringilla sem eget euismod. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2"][vc_single_image img_size="large" alignment="center" style="vc_box_shadow" css_animation="right-to-left"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#5aa773" full_width="stretch_row" css=".vc_custom_1456918650712{padding-top: 60px !important;padding-bottom: 60px !important;}"][vc_column][vc_column_text css=".vc_custom_1456918715231{margin-top: -30px !important;}"]
<h2 style="text-align: center;"><strong><span style="color: #ededed;">THEY SAY</span></strong></h2>
[/vc_column_text][vc_separator style="double" el_width="30" css=".vc_custom_1455578284368{margin-top: -10px !important;margin-bottom: -3px !important;}"][manual_theme_testimonials number="2" order_by="title" order="DESC" custom_font_size="23px" author_text_font_weight="500" text_color="#ffffff" author_text_color="#ffffff"][/vc_column][/vc_row]

CONTENT;
        array_unshift($data, $template);
        return $data;
    }
	
	
/*******
	ADD TEMPLATE :: HOME CREATIVE - 3.0
********/
	 add_filter( 'vc_load_default_templates', 'vc_hometwo_template' );
	 function vc_hometwo_template($data) {
        $template               = array();
        $template['name']       = __( '[Manual] Home - Creative', 'manual' );
        $template['content']    = <<<CONTENT
		
[vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456702070989{padding-top: 40px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;">Welcome To Manual Theme</h2>
[/vc_column_text][vc_separator style="shadow" border_width="2" el_width="20" css=".vc_custom_1456702257588{margin-top: -20px !important;}"][vc_column_text css=".vc_custom_1509823474820{margin-bottom: 55px !important;}"]
<h4 style="text-align: center; font-weight: 500;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</h4>
[/vc_column_text][vc_single_image img_size="full" alignment="center" css_animation="bottom-to-top"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#f4f4f4" css=".vc_custom_1456702677402{margin-top: -35px !important;padding-top: 50px !important;padding-bottom: 50px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;">Find Out.. What We Do</h2>
[/vc_column_text][vc_column_text css=".vc_custom_1509823521819{margin-bottom: 55px !important;}"]
<h4 style="text-align: center; font-weight: 500;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</h4>
[/vc_column_text][vc_row_inner][vc_column_inner width="1/3"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-mobile" display_icon_position="left" use_custom_icon_size="yes" custom_icon_size="50" title="Responsive Design" title_font_weight="700" text="Manual responsive framework ensures your content looks great on all screen sizes" icon_color="#303030"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-clipboard" display_icon_position="left" use_custom_icon_size="no" title="Amazing Elements" title_font_weight="700" text="Manual offers incredible elements that allow you to create a beautiful site" icon_color="#303030"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-gears " display_icon_position="left" use_custom_icon_size="no" title="Dedicated Support" title_font_weight="700" text="We care about your site as much as you do, you can count on us for theme support" icon_color="#303030"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/3"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-layers" display_icon_position="left" use_custom_icon_size="no" title="Powerful Options" title_font_weight="700" text="Manual theme options and page options allow you to take control of your website" icon_color="#303030"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-refresh" display_icon_position="left" use_custom_icon_size="no" title="Free Upgrades With Value" title_font_weight="700" text="We issue updates that matter; rich with amazing new features and improvements" icon_color="#303030"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-browser" display_icon_position="left" use_custom_icon_size="no" title="Awesome Portfolio Layouts" title_font_weight="700" text="Manual has awesome portfolio layouts that make your work stand out!" icon_color="#303030"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#ffffff" full_width="stretch_row" equal_height="yes" css=".vc_custom_1456701452089{padding-top: 70px !important;padding-bottom: 70px !important;}"][vc_column][vc_row_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="5852" text="Happy Customer" font_color="#454545" text_color="#0a0a0a"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="700" text_font_weight="500" separator="yes" digit="567" text="CUPS OF COFFEE" font_color="#454545" text_color="#424242" separator_color="#3d3d3d"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="72" text="Finished Projects" font_color="#454545" text_color="#0a0a0a"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="700" text_font_weight="500" separator="yes" digit="187" text="Staff Members" font_color="#454545" text_color="#424242" separator_color="#3d3d3d"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="parallax" background_image="449" full_width="stretch_row" css=".vc_custom_1457011904339{padding-top: 60px !important;padding-bottom: 60px !important;}"][vc_column][vc_column_text css=".vc_custom_1509823543311{margin-top: -30px !important;}"]
<h2 style="text-align: center;"><span style="color: #f7f7f7;">They Say</span></h2>
[/vc_column_text][vc_separator style="double" el_width="30" css=".vc_custom_1455578284368{margin-top: -10px !important;margin-bottom: -3px !important;}"][manual_theme_testimonials number="2" order_by="title" order="DESC" custom_font_size="23px" author_text_font_weight="500" text_color="#ffffff" author_text_color="#ffffff"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456490199768{margin-top: 30px !important;margin-bottom: 40px !important;}"][vc_column][vc_column_text css=".vc_custom_1509823558999{margin-top: 40px !important;border-bottom-width: 30px !important;}"]
<h2 style="text-align: center;">Our Amazing Team</h2>
[/vc_column_text][vc_separator style="double" el_width="10" css=".vc_custom_1455109618064{margin-bottom: 50px !important;}"][vc_row_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Miller Johnson " team_position="Founder" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Ubon Anne" team_position="Manager" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Earnest Johnson" team_position="General Manager" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Jeshon Ambron " team_position="Programmer" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="full-width-content"][vc_column][vc_gmaps link="#E-8_JTNDaWZyYW1lJTIwc3JjJTNEJTIyaHR0cHMlM0ElMkYlMkZ3d3cuZ29vZ2xlLmNvbSUyRm1hcHMlMkZlbWJlZCUzRnBiJTNEJTIxMW0xOCUyMTFtMTIlMjExbTMlMjExZDYzMDQuODI5OTg2MTMxMjcxJTIxMmQtMTIyLjQ3NDY5NjgwMzMwOTIlMjEzZDM3LjgwMzc0NzUyMTYwNDQzJTIxMm0zJTIxMWYwJTIxMmYwJTIxM2YwJTIxM20yJTIxMWkxMDI0JTIxMmk3NjglMjE0ZjEzLjElMjEzbTMlMjExbTIlMjExczB4ODA4NTg2ZTYzMDI2MTVhMSUyNTNBMHg4NmJkMTMwMjUxNzU3YzAwJTIxMnNTdG9yZXklMkJBdmUlMjUyQyUyQlNhbiUyQkZyYW5jaXNjbyUyNTJDJTJCQ0ElMkI5NDEyOSUyMTVlMCUyMTNtMiUyMTFzZW4lMjEyc3VzJTIxNHYxNDM1ODI2NDMyMDUxJTIyJTIwd2lkdGglM0QlMjI2MDAlMjIlMjBoZWlnaHQlM0QlMjI0NTAlMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBzdHlsZSUzRCUyMmJvcmRlciUzQTAlMjIlMjBhbGxvd2Z1bGxzY3JlZW4lM0UlM0MlMkZpZnJhbWUlM0U=" css=".vc_custom_1456705128973{margin-bottom: -5px !important;}"][/vc_column][/vc_row]		

CONTENT;
        array_unshift($data, $template);
        return $data;
    }


/*******
	ADD TEMPLATE :: HOME CORPORATE - 3.0
********/
	 add_filter( 'vc_load_default_templates', 'vc_homethree_template' );
	 function vc_homethree_template($data) {
        $template               = array();
        $template['name']       = __( '[Manual] Home - Corporate', 'manual' );
        $template['content']    = <<<CONTENT
		
[vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1509823696910{margin-top: -5px !important;padding-top: 50px !important;padding-bottom: 50px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;">What We Do</h2>
[/vc_column_text][vc_column_text css=".vc_custom_1509823733439{margin-bottom: 55px !important;}"]
<h4 style="text-align: center; font-weight: 500;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</h4>
[/vc_column_text][vc_row_inner][vc_column_inner width="1/3"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-mobile" display_icon_position="left" use_custom_icon_size="yes" custom_icon_size="50" title="Responsive Design" title_font_weight="700" text="Manual responsive framework ensures your content looks great on all screen sizes" icon_color="#303030"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-clipboard" display_icon_position="left" use_custom_icon_size="no" title="Amazing Elements" title_font_weight="700" text="Manual offers incredible elements that allow you to create a beautiful site" icon_color="#303030"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-gears " display_icon_position="left" use_custom_icon_size="no" title="Dedicated Support" title_font_weight="700" text="We care about your site as much as you do, you can count on us for theme support" icon_color="#303030"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/3"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-layers" display_icon_position="left" use_custom_icon_size="no" title="Powerful Options" title_font_weight="700" text="Manual theme options and page options allow you to take control of your website" icon_color="#303030"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-refresh" display_icon_position="left" use_custom_icon_size="no" title="Free Upgrades With Value" title_font_weight="700" text="We issue updates that matter; rich with amazing new features and improvements" icon_color="#303030"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-browser" display_icon_position="left" use_custom_icon_size="no" title="Awesome Portfolio Layouts" title_font_weight="700" text="Manual has awesome portfolio layouts that make your work stand out!" icon_color="#303030"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#f8f8f8" css=".vc_custom_1457015268771{padding-top: 40px !important;padding-bottom: 40px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;">PORTFOLIO</h2>
[/vc_column_text][vc_separator style="shadow" border_width="2" el_width="20" css=".vc_custom_1456702257588{margin-top: -20px !important;}"][vc_column_text css=".vc_custom_1509823749592{margin-bottom: 55px !important;}"]
<h4 style="text-align: center; font-weight: 500;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</h4>
[/vc_column_text][manual_theme_portfolio_sc portfolio_type="Masonry" number_of_post="6" portfolio_order="DESC" portfolio_column="4" show_load_more="no"][/vc_column][/vc_row][vc_row row_type="parallax" background_image="390" full_width="stretch_row" equal_height="yes" css=".vc_custom_1457015114394{padding-top: 70px !important;padding-bottom: 70px !important;}"][vc_column][vc_row_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="5852" text="Happy Customer" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="700" text_font_weight="500" separator="yes" digit="567" text="CUPS OF COFFEE" font_color="#ffffff" text_color="#ffffff" separator_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="72" text="Finished Projects" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="700" text_font_weight="500" separator="yes" digit="187" text="Staff Members" font_color="#ffffff" text_color="#ffffff" separator_color="#ffffff"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1457015452250{padding-top: 30px !important;padding-bottom: 40px !important;}"][vc_column][vc_column_text css=".vc_custom_1509823800958{margin-top: 40px !important;border-bottom-width: 30px !important;}"]
<h2 style="text-align: center;">Our Amazing Team</h2>
[/vc_column_text][vc_separator style="double" el_width="10" css=".vc_custom_1455109618064{margin-bottom: 50px !important;}"][vc_row_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Miller Johnson " team_position="Founder" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Ubon Anne" team_position="Manager" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Earnest Johnson" team_position="General Manager" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][vc_column_inner width="1/4"][manual_our_team show_separator="yes" team_social_icon_1_target="_blank" team_social_icon_2_target="_parent" team_social_icon_3_target="_blank" team_social_icon_4_target="_blank" team_name="Jeshon Ambron " team_position="Programmer" team_social_icon_1="icon-facebook" team_social_icon_1_link="https://www.facebook.com/" team_social_icon_2=" icon-twitter" team_social_icon_2_link="https://twitter.com/" team_social_icon_3="icon-googleplus" team_social_icon_3_link="https://plus.google.com/" team_social_icon_4="icon-linkedin" team_social_icon_4_link="https://www.linkedin.com"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
		
CONTENT;
        array_unshift($data, $template);
        return $data;
    }
	
	
/*******
	ADD TEMPLATE :: HOME PORTFOLIO - 3.0
********/
add_filter( 'vc_load_default_templates', 'vc_portfolio_new_template' );
function vc_portfolio_new_template($data) {
	$template               = array();
	$template['name']       = __( '[Manual] Home - Portfolio', 'manual' );
	$template['content']    = <<<CONTENT
	
[vc_row row_type="row" stretch_row_type="no" row_content_display="in_grid" row_content_display_align="left" css=".vc_custom_1482849774378{padding-top: 50px !important;padding-bottom: 50px !important;}"][vc_column width="1/2"][vc_custom_heading text="Design Studio" font_container="tag:div|font_size:65px|text_align:left|line_height:75px" google_fonts="font_family:Josefin%20Sans%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C600%2C600italic%2C700%2C700italic|font_style:300%20light%20regular%3A300%3Anormal"][vc_custom_heading text="We are industry experts with more than 15 years of experience." font_container="tag:p|font_size:17px|text_align:left" google_fonts="font_family:Droid%20Sans%3Aregular%2C700|font_style:400%20regular%3A400%3Anormal" css=".vc_custom_1482843826580{padding-top: 12px !important;}"][/vc_column][vc_column width="1/2"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" row_content_display="full_width" row_content_display_align="left" css=".vc_custom_1509822480494{padding-bottom: 60px !important;}"][vc_column][manual_theme_portfolio_sc portfolio_type="FitRows" portfolio_title_tag="h5" portfolio_column="4" show_categories="no"][/vc_column][/vc_row]

CONTENT;
        array_unshift($data, $template);
        return $data;
    }		
	
	
/*******
	ADD TEMPLATE :: HOME LANDING - 3.0
********/
add_filter( 'vc_load_default_templates', 'vc_choosedemo_template' );
function vc_choosedemo_template($data) {
	$template               = array();
	$template['name']       = __( '[Manual] Home - Landing', 'manual' );
	$template['content']    = <<<CONTENT
	
[vc_row row_type="parallax" background_image="1234" css=".vc_custom_1509860917662{padding-top: 90px !important;padding-bottom: 90px !important;}"][vc_column][vc_custom_heading text="3.0" font_container="tag:h2|font_size:135px|text_align:center|color:%236d6d6d" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:900%20bold%20regular%3A900%3Anormal"][vc_custom_heading text="Helpful help desk theme,
the way it should be" font_container="tag:h2|font_size:50px|text_align:center|color:%236b6b6b|line_height:62px" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:900%20bold%20regular%3A900%3Anormal" css=".vc_custom_1509871594984{margin-top: 100px !important;}"][vc_custom_heading text="with Manual Theme everything in one place, a happy team, and loyal customers." font_container="tag:h2|font_size:23px|text_align:center|color:%23666666" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:500%20bold%20regular%3A500%3Anormal"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1459780703537{margin-top: 50px !important;margin-bottom: 50px !important;}"][vc_column][vc_custom_heading text="Home Page Layouts" font_container="tag:h2|font_size:40px|text_align:center|line_height:40px" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:200%20light%20regular%3A200%3Anormal"][vc_custom_heading text="Help your team be more productive and build customer loyalty." font_container="tag:p|font_size:16px|text_align:center|color:%238a8a8a" use_theme_fonts="yes" css=".vc_custom_1509856641383{padding-top: 10px !important;padding-bottom: 50px !important;}"][vc_row_inner][vc_column_inner width="1/3"][manual_theme_monitor_frame_portfolio title="Help Desk 1" link="url:http%3A%2F%2Fdemo.wpsmartapps.com%2Fthemes%2Fmanual%2Fhome4%2F|title:Help%20Desk%201|target:%20_blank|" portfoio_image="1235"][manual_theme_monitor_frame_portfolio title="Default Home Page" link="url:http%3A%2F%2Fdemo.wpsmartapps.com%2Fthemes%2Fmanual%2Fhome%2F|title:Default%20Home%20Page|target:%20_blank"][manual_theme_monitor_frame_portfolio title="KB Trending" link="url:http%3A%2F%2Fdemo.wpsmartapps.com%2Fthemes%2Fmanual%2Fhome8%2F|title:KB%20Trending%20|target:%20_blank|" portfoio_image="1240"][manual_theme_monitor_frame_portfolio title="Business" link="url:http%3A%2F%2Fdemo.wpsmartapps.com%2Fthemes%2Fmanual%2Fhome1%2F|title:Business|target:%20_blank|"][manual_theme_monitor_frame_portfolio title="Shop" link="url:http%3A%2F%2Fdemo.wpsmartapps.com%2Fthemes%2Fmanual%2Fshop%2F|title:Shop|target:%20_blank|" portfoio_image="1243"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_monitor_frame_portfolio title="Help Desk 2" link="url:http%3A%2F%2Fdemo.wpsmartapps.com%2Fthemes%2Fmanual%2Fhome5%2F|title:Help%20Desk%202|target:%20_blank|" portfoio_image="1236"][manual_theme_monitor_frame_portfolio title="KB Classic" link="url:http%3A%2F%2Fdemo.wpsmartapps.com%2Fthemes%2Fmanual%2Fhome6%2F|title:KB%20Classic|target:%20_blank|" portfoio_image="1238"][manual_theme_monitor_frame_portfolio title="KB Group Tab" link="url:http%3A%2F%2Fdemo.wpsmartapps.com%2Fthemes%2Fmanual%2Fhome9%2F|title:KB%20Group%20Tab|target:%20_blank|" portfoio_image="1241"][manual_theme_monitor_frame_portfolio title="Creative" link="url:http%3A%2F%2Fdemo.wpsmartapps.com%2Fthemes%2Fmanual%2Fhome2%2F|title:Creative|target:%20_blank|"][manual_theme_monitor_frame_portfolio title="Forum" link="url:http%3A%2F%2Fdemo.wpsmartapps.com%2Fthemes%2Fmanual%2Fforums%2F|title:Forum|target:%20_blank|"][/vc_column_inner][vc_column_inner width="1/3"][manual_theme_monitor_frame_portfolio title="Help Desk 3" link="url:http%3A%2F%2Fdemo.wpsmartapps.com%2Fthemes%2Fmanual%2Fhome-11%2F|title:Help%20Desk%203|target:%20_blank|" portfoio_image="1237"][manual_theme_monitor_frame_portfolio title="KB Modern" link="url:http%3A%2F%2Fdemo.wpsmartapps.com%2Fthemes%2Fmanual%2Fhome7%2F|title:KB%20Modern|target:%20_blank|" portfoio_image="1239"][manual_theme_monitor_frame_portfolio title="Portfolio" link="url:http%3A%2F%2Fdemo.wpsmartapps.com%2Fthemes%2Fmanual%2Fhome10%2F|title:Portfolio|target:%20_blank|" portfoio_image="1242"][manual_theme_monitor_frame_portfolio title="Corporate" link="url:http%3A%2F%2Fdemo.wpsmartapps.com%2Fthemes%2Fmanual%2Fhome3%2F|title:Corporate|target:%20_blank|"][manual_theme_monitor_frame_portfolio title="Landing" link="url:http%3A%2F%2Fdemo.wpsmartapps.com%2Fthemes%2Fmanual%2F|title:Landing|target:%20_blank|" portfoio_image="1247"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#f7f8f9" css=".vc_custom_1459902335371{padding-top: 60px !important;padding-bottom: 40px !important;}"][vc_column][vc_row_inner][vc_column_inner width="1/2"][vc_custom_heading text="Documentation" font_container="tag:div|font_size:40px|text_align:left|color:%230a0a0a|line_height:40px" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:300%20light%20regular%3A300%3Anormal" css=".vc_custom_1509865236823{padding-bottom: 20px !important;}"][vc_column_text]Easily create and manage documentation for your product. Manual has features for every need. Some of the amazing features are...[/vc_column_text][vc_column_text]
<ul style="padding-left: 18px;">
	<li style="padding-bottom: 10px; font-weight: 600;">Ajax Load Pages</li>
	<li style="padding-bottom: 10px; font-weight: 600;">Attached unlimited files, images, videos... etc per post</li>
	<li style="padding-bottom: 10px; font-weight: 600;">Allow documentation category access to only login users (on/off feature)</li>
	<li style="padding-bottom: 10px; font-weight: 600;">Allow attached files access to only login users (on/off feature)</li>
	<li style="padding-bottom: 10px; font-weight: 600;">Advance post menu system</li>
	<li style="padding-bottom: 10px; font-weight: 600;">and so much more…</li>
</ul>
[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2"][vc_single_image img_size="full" alignment="center" style="vc_box_shadow" css_animation="top-to-bottom"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1459901782969{padding-top: 60px !important;padding-bottom: 40px !important;}"][vc_column][vc_row_inner][vc_column_inner width="1/2"][vc_single_image image="1249" img_size="full" alignment="center" style="vc_box_shadow" css_animation="top-to-bottom"][/vc_column_inner][vc_column_inner width="1/2"][vc_custom_heading text="Knowledge Base" font_container="tag:div|font_size:40px|text_align:left|color:%230a0a0a|line_height:40px" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:300%20light%20regular%3A300%3Anormal" css=".vc_custom_1509865245765{padding-bottom: 20px !important;}"][vc_column_text]Easily create and manage knowledge-base for your product. Manual has features for every need. Some of the amazing features are...[/vc_column_text][vc_column_text]
<ul style="padding-left: 18px;">
	<li style="padding-bottom: 10px; font-weight: 600;">Masonry record display</li>
	<li style="padding-bottom: 10px; font-weight: 600;">Total freedom to change page layouts</li>
	<li style="padding-bottom: 10px; font-weight: 600;">Add unlimited attachments</li>
	<li style="padding-bottom: 10px; font-weight: 600;">Allow attached files access to only login users (on/off feature)</li>
	<li style="padding-bottom: 10px; font-weight: 600;">and so much more…</li>
</ul>
[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#f7f8f9" css=".vc_custom_1459904123281{padding-top: 60px !important;padding-bottom: 40px !important;}"][vc_column][vc_row_inner][vc_column_inner width="1/2"][vc_custom_heading text="Creative Portfolio" font_container="tag:div|font_size:40px|text_align:left|color:%230a0a0a|line_height:40px" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:300%20light%20regular%3A300%3Anormal" css=".vc_custom_1509865255694{padding-bottom: 20px !important;}"][vc_column_text]Show off your amazing work using manual creative portfolio layouts. Each layouts can be easily adapted for:
[/vc_column_text][vc_column_text]
<ul style="padding-left: 18px;">
	<li style="padding-bottom: 10px; font-weight: 600;">Design</li>
	<li style="padding-bottom: 10px; font-weight: 600;">Illustration</li>
	<li style="padding-bottom: 10px; font-weight: 600;">Photography</li>
	<li style="padding-bottom: 10px; font-weight: 600;">and so much more...</li>
</ul>
[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2"][vc_single_image image="1252" img_size="full" alignment="center" style="vc_box_shadow" css_animation="top-to-bottom"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1509867990638{padding-top: 50px !important;padding-bottom: 80px !important;}"][vc_column][vc_custom_heading text="Elements" font_container="tag:h2|font_size:50px|text_align:center|line_height:62px" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:800%20bold%20regular%3A800%3Anormal" css=".vc_custom_1509866649650{padding-bottom: 50px !important;}"][vc_row_inner][vc_column_inner width="1/4"][vc_single_image image="1260" img_size="full"][vc_custom_heading text="Visual Composer Included Free" use_theme_fonts="yes"][/vc_column_inner][vc_column_inner width="1/4"][vc_single_image image="1264" img_size="full"][vc_custom_heading text="WooCommerce Compatible" use_theme_fonts="yes"][/vc_column_inner][vc_column_inner width="1/4"][vc_single_image image="1261" img_size="full"][vc_custom_heading text="Revolution Slider Included Free" use_theme_fonts="yes"][/vc_column_inner][vc_column_inner width="1/4"][vc_single_image image="1259" img_size="full"][vc_custom_heading text="Beautiful Portfolio Layouts" use_theme_fonts="yes"][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1509866654408{padding-top: 50px !important;}"][vc_column_inner width="1/4"][vc_single_image image="1257" img_size="full"][vc_custom_heading text="800+ Integrated Google Web Fonts" use_theme_fonts="yes"][/vc_column_inner][vc_column_inner width="1/4"][vc_single_image image="1262" img_size="full"][vc_custom_heading text="Tons of Amazing Templates" use_theme_fonts="yes"][/vc_column_inner][vc_column_inner width="1/4"][vc_single_image image="1258" img_size="full"][vc_custom_heading text="Quick One-Click Import" use_theme_fonts="yes"][/vc_column_inner][vc_column_inner width="1/4"][vc_single_image image="1263" img_size="full"][vc_custom_heading text="Step-by-Step Tutorials" use_theme_fonts="yes"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#1b1b1b" css=".vc_custom_1509865152069{padding-top: 50px !important;padding-bottom: 5px !important;}"][vc_column][vc_custom_heading text="Create a website that will look professional" font_container="tag:div|font_size:40px|text_align:center|color:%23ffffff" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:900%20bold%20regular%3A900%3Anormal"][/vc_column][/vc_row]

CONTENT;
        array_unshift($data, $template);
        return $data;
    }
	
	
/*******
	ADD TEMPLATE :: HOME KB CLASSIC
********/
add_filter( 'vc_load_default_templates', 'vc_homefive_template' );
function vc_homefive_template($data) {
	$template               = array();
	$template['name']       = __( '[Manual] Home - KB Classic', 'manual' );
	$template['content']    = <<<CONTENT
	
[vc_row row_type="row" stretch_row_type="yes" background_color="#b8e09a" css=".vc_custom_1509789948180{margin-top: 40px !important;padding-top: 50px !important;padding-bottom: 0px !important;}"][vc_column width="1/3"][manual_theme_icon_text use_custom_icon_box_design="yes" icon_box_padding="30px 30px 30px 30px " box_css_animation="hvr-float" icon_name="icon-documents" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="60" title="Documentation" title_font_weight="700" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar" custom_top_margin_maintext_and_text="15" activate_link="yes" link_icon="box" link="url:%23|title:Check%20An%20Article|target:%20_blank" title_color="#706e6e" link_hover_icon_color="#dd3333" icon_color="#3d3b3b" icon_box_color="#f5f8fa"][/vc_column][vc_column width="1/3"][manual_theme_icon_text use_custom_icon_box_design="yes" icon_box_padding="30px 30px 30px 30px " box_css_animation="hvr-float" icon_name="icon-search" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="60" title="Frequently Asked Questions" title_font_weight="700" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar" custom_top_margin_maintext_and_text="15" activate_link="yes" link_icon="box" link="url:%23|title:Check%20An%20Article|target:%20_blank" title_color="#706e6e" link_hover_icon_color="#dd3333" icon_color="#3d3b3b" icon_box_color="#f5f8fa"][/vc_column][vc_column width="1/3"][manual_theme_icon_text use_custom_icon_box_design="yes" icon_box_padding="30px 30px 30px 30px " box_css_animation="hvr-float" icon_name="icon-chat" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="60" title="Community Forums" title_font_weight="700" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar" custom_top_margin_maintext_and_text="15" activate_link="yes" link_icon="box" link="url:%23|title:Check%20An%20Article|target:%20_blank" title_color="#706e6e" link_hover_icon_color="#dd3333" icon_color="#3d3b3b" icon_box_color="#f5f8fa"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456651550754{margin-top: 80px !important;margin-bottom: 100px !important;}"][vc_column width="2/6"][manual_theme_kb_category kb_category_title="Categories" kb_category_show_post_count="true" kb_category_show_hierarchy="true"][manual_theme_kb_popular_article title="Popular Articles" knowledgebase_article_display_type="2"][manual_theme_kb_popular_article title="Latest Articles" knowledgebase_article_display_type="1"][/vc_column][vc_column width="4/6" css=".vc_custom_1456651285007{background-color: #f5f5f5 !important;}"][manual_theme_all_knowledgebase knowledgebase_shortcode_name="KB BLOCKS" knowledgebase_column="6"][/vc_column][/vc_row]
	
CONTENT;
        array_unshift($data, $template);
        return $data;
    }
	
	
/*******
	ADD TEMPLATE :: HOME KB MODERN - 3.0
********/
	 add_filter( 'vc_load_default_templates', 'vc_homefour_template' );
	 function vc_homefour_template($data) {
        $template               = array();
        $template['name']       = __( '[Manual] Home - KB Modern', 'manual' );
        $template['content']    = <<<CONTENT
		
[vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1509794426478{padding-top: 70px !important;padding-bottom: 1px !important;}"][vc_column width="1/3"][manual_theme_icon_text use_custom_icon_box_design="yes" icon_box_padding="30px 30px 30px 30px " box_css_animation="hvr-float" icon_name="icon-documents" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="60" title="Documentation " title_font_weight="700" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar" custom_top_margin_maintext_and_text="15" activate_link="yes" link_icon="box" link="url:%23|title:Check%20An%20Article|target:%20_blank" title_color="#706e6e" link_hover_icon_color="#dd3333" icon_color="#3d3b3b" icon_box_color="#e1f9ed"][/vc_column][vc_column width="1/3"][manual_theme_icon_text use_custom_icon_box_design="yes" icon_box_padding="30px 30px 30px 30px " box_css_animation="hvr-float" icon_name="icon-search" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="60" title="Frequently Asked Questions" title_font_weight="700" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar" custom_top_margin_maintext_and_text="15" activate_link="yes" link_icon="box" link="url:%23|title:Check%20An%20Article|target:%20_blank" title_color="#706e6e" link_hover_icon_color="#dd3333" icon_color="#3d3b3b" icon_box_color="#daf5ce"][/vc_column][vc_column width="1/3"][manual_theme_icon_text use_custom_icon_box_design="yes" icon_box_padding="30px 30px 30px 30px " box_css_animation="hvr-float" icon_name="icon-chat" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="60" title="Community Forum" title_font_weight="700" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar" custom_top_margin_maintext_and_text="15" activate_link="yes" link_icon="box" link="url:%23|title:Check%20An%20Article|target:%20_blank" title_color="#706e6e" link_hover_icon_color="#dd3333" icon_color="#3d3b3b" icon_box_color="#fbf9d6"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456589519878{margin-top: 80px !important;margin-bottom: 25px !important;}"][vc_column][manual_theme_all_knowledgebase knowledgebase_shortcode_name="KB Blocks" icon_name="home page "][/vc_column][/vc_row][vc_row row_type="parallax" background_image="612" full_width="stretch_row" equal_height="yes" css=".vc_custom_1457016908138{margin-top: 40px !important;padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column][vc_row_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="5852" text="Happy Customer" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="500" text_font_weight="500" separator="yes" digit="567" text="CUPS OF COFFEE" separator_color="#ffffff" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="72" text="Finished Projects" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="500" text_font_weight="500" separator="yes" digit="187" text="Staff Members" separator_color="#ffffff" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]

CONTENT;
        array_unshift($data, $template);
        return $data;
    }
	

/*******
	ADD TEMPLATE :: HOME KB TRENDING - 3.0
********/
add_filter( 'vc_load_default_templates', 'vc_trending_knowledgebase_template' );
function vc_trending_knowledgebase_template($data) {
	$template               = array();
	$template['name']       = __( '[Manual] Home - KB Trending', 'manual' );
	$template['content']    = <<<CONTENT
	
[vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1462968409830{padding-top: 80px !important;padding-bottom: 80px !important;}"][vc_column][vc_tta_tour][vc_tta_section title="Documentation – User Manual" tab_id="1462721776263-8675e9ea-fe2a39e1-f872"][manual_theme_single_cat_knowledgebase][/vc_tta_section][vc_tta_section title="Theme Customization – User Manual" tab_id="1462721776274-99cc5bed-0ab639e1-f872"][manual_theme_single_cat_knowledgebase][/vc_tta_section][vc_tta_section title="Knowledge base – User Manual" tab_id="1463020987381-1861afca-d2b2"][manual_theme_single_cat_knowledgebase][/vc_tta_section][/vc_tta_tour][/vc_column][/vc_row]

CONTENT;
        array_unshift($data, $template);
        return $data;
    }	


/*******
	ADD TEMPLATE :: HOME KB GROUP TAB - 3.0
********/
add_filter( 'vc_load_default_templates', 'vc_group_tab_knowledgebase_template' );
function vc_group_tab_knowledgebase_template($data) {
	$template               = array();
	$template['name']       = __( '[Manual] Home - KB Group Tab', 'manual' );
	$template['content']    = <<<CONTENT
	
[vc_row row_type="row" stretch_row_type="no"][vc_column][vc_row_inner css=".vc_custom_1509805485891{border-bottom-width: 1px !important;border-bottom-color: #f4f4f4 !important;border-bottom-style: solid !important;}"][vc_column_inner width="1/3" css=".vc_custom_1509805423262{padding-top: 40px !important;padding-bottom: 20px !important;background-color: #ffffff !important;}"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-layers" display_icon_position="left" use_custom_icon_size="no" title="Live Builder" text="No coding skills required to create unique sites. Customize your site in real-time."][/vc_column_inner][vc_column_inner width="1/3" css=".vc_custom_1509805416654{padding-top: 40px !important;padding-bottom: 20px !important;background-color: #f4f4f4 !important;}"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-puzzle" display_icon_position="left" use_custom_icon_size="no" title=" Real-Time Analytics" text="No coding skills required to create unique sites. Customize your site in real-time."][/vc_column_inner][vc_column_inner width="1/3" css=".vc_custom_1509805429958{padding-top: 40px !important;padding-bottom: 20px !important;background-color: #ffffff !important;}"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-globe" display_icon_position="left" use_custom_icon_size="no" title="Secure and Reliable" text="No coding skills required to create unique sites. Customize your site in real-time."][/vc_column_inner][/vc_row_inner][vc_empty_space height="90px"][vc_tta_tabs alignment="center" active_section="1"][vc_tta_section i_icon_fontawesome="fa fa-laptop" add_icon="true" title="Theme User Manual" tab_id="1465301361288-5463cc1c-5900e319-1bd4"][vc_empty_space height="40px"][manual_theme_vc_custom_group_cat_knowledgebase category_order="DESC" kb_post_under_category="5" kb_column_type="4"][/vc_tta_section][vc_tta_section i_icon_fontawesome="fa fa-cog" add_icon="true" title="Theme Customize Manual" tab_id="1465301361305-6154e639-8ccbe319-1bd4"][vc_empty_space height="40px"][manual_theme_vc_custom_group_cat_knowledgebase category_order="DESC" kb_post_under_category="5" kb_column_type="4" kb_disable_customcat_masonry="true"][/vc_tta_section][/vc_tta_tabs][vc_empty_space height="50px"][/vc_column][/vc_row]

CONTENT;
        array_unshift($data, $template);
        return $data;
    }	
	

/*******
	ADD TEMPLATE :: HOME HELP DESK 1
********/
add_filter( 'vc_load_default_templates', 'vc_homeseven_template' );
function vc_homeseven_template($data) {
	$template               = array();
	$template['name']       = __( '[Manual] Home - Help Desk 1', 'manual' );
	$template['content']    = <<<CONTENT
	
	[vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456113715539{margin-top: 50px !important;margin-bottom: 5px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;">Quick Help Desk Link</h2>
[/vc_column_text][vc_column_text css=".vc_custom_1509816426552{margin-bottom: 55px !important;}"]
<h4 style="text-align: center; font-weight: 500;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</h4>
[/vc_column_text][vc_separator style="shadow" el_width="30" css=".vc_custom_1456119594660{margin-top: -20px !important;}"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456499594010{margin-top: 20px !important;}"][vc_column width="1/3" css=".vc_custom_1456113450674{padding-right: 5px !important;padding-left: 5px !important;}"][manual_theme_icon_text use_custom_icon_box_design="yes" box_css_animation="hvr-float" icon_name="icon-documents" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="65" title="knowledge Base" title_font_size="20" title_font_transform="capitalize" title_font_weight="500" text="No coding skills required to create unique sites. Customize your site in real-time." custom_top_margin_maintext_and_text="20" activate_link="yes" link_icon="yes" link="url:%23||target:%20_blank" title_color="#333333" link_hover_icon_color="#dd3333" icon_color="#5bc981"][/vc_column][vc_column width="1/3" css=".vc_custom_1456113495794{padding-top: 5px !important;padding-bottom: 5px !important;}"][manual_theme_icon_text use_custom_icon_box_design="yes" box_css_animation="hvr-float" icon_name="icon-envelope" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="60" title="Contact Us" title_font_size="20" title_font_transform="capitalize" title_font_weight="500" text="No coding skills required to create unique sites. Customize your site in real-time." custom_top_margin_maintext_and_text="20" activate_link="yes" link_icon="yes" link="url:%23||" title_color="#333333" icon_color="#5bc981"][/vc_column][vc_column width="1/3" css=".vc_custom_1456113503002{padding-top: 5px !important;padding-bottom: 5px !important;}"][manual_theme_icon_text use_custom_icon_box_design="yes" box_css_animation="hvr-float" icon_name="icon-chat" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="60" title="Community Forum" title_font_size="20" title_font_transform="capitalize" title_font_weight="500" text="No coding skills required to create unique sites. Customize your site in real-time." custom_top_margin_maintext_and_text="20" activate_link="yes" link_icon="yes" link="url:%23||" title_color="#333333" icon_color="#5bc981"][/vc_column][/vc_row][vc_row row_type="parallax" background_image="1219" css=".vc_custom_1509816869645{margin-top: 50px !important;padding-top: 50px !important;padding-bottom: 60px !important;}"][vc_column][vc_column_text css=".vc_custom_1509816783291{margin-bottom: 27px !important;}"]
<h2 style="text-align: center;">Frequently Ask Questions</h2>
[/vc_column_text][vc_row_inner css=".vc_custom_1456601620014{margin-top: 60px !important;}"][vc_column_inner width="1/2"][vc_single_image image="603" img_size="full" style="vc_box_outline" css_animation="none"][/vc_column_inner][vc_column_inner width="1/2"][vc_toggle title="Do I need to know coding to use wordpress?" style="round_outline" color="vista_blue" css_animation="none" custom_font_container="tag:h4|text_align:left" custom_google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:500%20bold%20regular%3A500%3Anormal" use_custom_heading="true" el_id="1456601523883-1bc79557-2ea1"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan[/vc_toggle][vc_toggle title="Theme license information" style="round_outline" color="vista_blue" css_animation="none" custom_font_container="tag:h4|text_align:left" custom_google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:500%20bold%20regular%3A500%3Anormal" use_custom_heading="true" el_id="1456601486067-dc85e133-bb63"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan[/vc_toggle][vc_toggle title="Why does wordpress only support mysql?" style="round_outline" color="vista_blue" css_animation="none" custom_font_container="tag:h4|text_align:left" custom_google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:500%20bold%20regular%3A500%3Anormal" use_custom_heading="true" el_id="1456601517885-1d383a2e-1637"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan[/vc_toggle][vc_toggle title="How do I login forum section" style="round_outline" color="vista_blue" css_animation="none" custom_font_container="tag:h4|text_align:left" custom_google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:500%20bold%20regular%3A500%3Anormal" use_custom_heading="true" el_id="1456601497393-ca8fdbae-ad47"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan[/vc_toggle][vc_toggle title="Do I need to know coding to use wordpress?" style="round_outline" color="vista_blue" css_animation="none" custom_font_container="tag:h4|text_align:left" custom_google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:500%20bold%20regular%3A500%3Anormal" use_custom_heading="true" el_id="1456602357419-7359d2d4-3d38"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan[/vc_toggle][vc_toggle title="Theme license information" style="round_outline" color="vista_blue" css_animation="none" custom_font_container="tag:h4|text_align:left" custom_google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:500%20bold%20regular%3A500%3Anormal" use_custom_heading="true" el_id="1456602367478-e9a69e0b-27ca"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan[/vc_toggle][vc_toggle title="Why does wordpress only support mysql?" style="round_outline" color="vista_blue" css_animation="none" custom_font_container="tag:h4|text_align:left" custom_google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:500%20bold%20regular%3A500%3Anormal" use_custom_heading="true" el_id="1456602373983-a997874a-9e0f"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan[/vc_toggle][vc_toggle title="How do I login forum section" style="round_outline" color="vista_blue" css_animation="none" custom_font_container="tag:h4|text_align:left" custom_google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:500%20bold%20regular%3A500%3Anormal" use_custom_heading="true" el_id="1456602398898-ddbae0de-5932"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan[/vc_toggle][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456111714980{margin-top: 50px !important;}"][vc_column][vc_column_text css=".vc_custom_1509816815922{margin-bottom: 27px !important;}"]
<h2 style="text-align: center;">The Best Solutions</h2>
[/vc_column_text][vc_column_text]
<h4 style="text-align: center; font-weight: 500;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</h4>
[/vc_column_text][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456489708238{margin-bottom: 60px !important;}"][vc_column width="1/4"][manual_service_table_section title="Fully Responsive" iconimage="icon-mobile" description="Choose our beautiful templates or easily create your own to start building your site" link="|title:Learn%20More|"][manual_service_option]
<ul>
 	<li>Modern Design</li>
 	<li>24/7 Premium Support</li>
 	<li>Modern Page Layouts</li>
 	<li>Fully Responsive</li>
</ul>
[/manual_service_option][/manual_service_table_section][/vc_column][vc_column width="1/4"][manual_service_table_section title="Premium Slider" iconimage="icon-picture" description="Choose our beautiful templates or easily create your own to start building your site" link="|title:Learn%20More|"][manual_service_option]
<ul>
 	<li>Modern Design</li>
 	<li>24/7 Premium Support</li>
 	<li>Modern Page Layouts</li>
 	<li>Fully Responsive</li>
</ul>
[/manual_service_option][/manual_service_table_section][/vc_column][vc_column width="1/4"][manual_service_table_section title="Page Builder" iconimage="icon-gears" description="Choose our beautiful templates or easily create your own to start building your site" link="|title:Learn%20More|"][manual_service_option]
<ul>
 	<li>Modern Design</li>
 	<li>24/7 Premium Support</li>
 	<li>Modern Page Layouts</li>
 	<li>Fully Responsive</li>
</ul>
[/manual_service_option][/manual_service_table_section][/vc_column][vc_column width="1/4"][manual_service_table_section title="Dedicated Support" iconimage="icon-chat" description="Choose our beautiful templates or easily create your own to start building your site" link="|title:Learn%20More|"][manual_service_option]
<ul>
 	<li>Modern Design</li>
 	<li>24/7 Premium Support</li>
 	<li>Modern Page Layouts</li>
 	<li>Fully Responsive</li>
</ul>
[/manual_service_option][/manual_service_table_section][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" video="show_video" video_mp4="http://demo.wpsmartapps.com/themes/manual/wp-content/uploads/2017/02/explore.mp4" full_width="stretch_row" equal_height="yes" css=".vc_custom_1487585434052{margin-top: 40px !important;padding-top: 50px !important;padding-bottom: 100px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;"><span style="color: #ededed;">Our Status</span></h2>
[/vc_column_text][vc_row_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="5852" text="Happy Customer" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="500" text_font_weight="500" separator="yes" digit="567" text="CUPS OF COFFEE" font_color="#ffffff" text_color="#ffffff" separator_color="#aaaaaa"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="left" font_weight="500" text_font_weight="600" separator="no" digit="72" text="Finished Projects" font_color="#ffffff" text_color="#ffffff"][/vc_column_inner][vc_column_inner width="1/4"][manual_theme_counter position="center" font_weight="500" text_font_weight="500" separator="yes" digit="187" text="Staff Members" font_color="#ffffff" text_color="#ffffff" separator_color="#aaaaaa"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
	

CONTENT;
        array_unshift($data, $template);
        return $data;
    }

/*******
	ADD TEMPLATE :: HOME HELP DESK 2 - 3.0
********/
add_filter( 'vc_load_default_templates', 'vc_homeeight_template' );
function vc_homeeight_template($data) {
	$template               = array();
	$template['name']       = __( '[Manual] Home - Help Desk 2', 'manual' );
	$template['content']    = <<<CONTENT
	
[vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456113715539{margin-top: 50px !important;margin-bottom: 5px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center;">How Do You Want To Proceed?</h2>
[/vc_column_text][vc_column_text css=".vc_custom_1509682245187{margin-bottom: 55px !important;}"]
<h4 style="text-align: center; font-weight: 500;">Easily create Documentation, Knowledge-base, FAQ, Forum and more</h4>
[/vc_column_text][vc_separator style="shadow" el_width="30" css=".vc_custom_1456119594660{margin-top: -20px !important;}"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456597253354{margin-top: 20px !important;margin-bottom: 90px !important;}"][vc_column width="1/2" css=".vc_custom_1456973540504{padding-top: 40px !important;padding-right: 35px !important;padding-bottom: 30px !important;padding-left: 35px !important;background-color: #f7f8f9 !important;}"][manual_theme_icon_text use_custom_icon_box_design="yes" icon_box_padding="10px 10px 0px 20px" box_css_animation="hvr-float" icon_name="icon-documents" display_icon_position="left" use_custom_icon_size="yes" custom_icon_size="55" custom_icon_margin="105" title="Knowledge Base" title_font_size="25" title_font_transform="capitalize" title_font_weight="700" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar" custom_top_margin_maintext_and_text="25" activate_link="yes" link_icon="no" link="url:%23|title:Go%20to%20Help%20Desk|target:%20_blank" link_hover_icon_color="#dd3333" title_color="#757373" text_color="#353535" icon_color="#353535" link_color="#46b289"][/vc_column][vc_column width="1/2" css=".vc_custom_1456974428873{padding-top: 40px !important;padding-right: 35px !important;padding-bottom: 30px !important;padding-left: 35px !important;background-color: rgba(161,223,116,0.19) !important;*background-color: rgb(161,223,116) !important;}"][manual_theme_icon_text use_custom_icon_box_design="yes" icon_box_padding="10px 10px 0px 20px" box_css_animation="hvr-float" icon_name="icon-chat" display_icon_position="left" use_custom_icon_size="yes" custom_icon_size="55" custom_icon_margin="105" title="Live Chat" title_font_size="27" title_font_transform="capitalize" title_font_weight="700" text="Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar" custom_top_margin_maintext_and_text="25" activate_link="yes" link_icon="no" link="url:%23|title:Go%20to%20live%20chat|target:%20_blank" link_hover_icon_color="#dd3333" title_color="#757373" text_color="#595959" icon_color="#595959" link_color="#46b289"][/vc_column][/vc_row][vc_row row_type="parallax" background_image="606" css=".vc_custom_1457016312930{margin-top: 50px !important;padding-top: 50px !important;padding-bottom: 110px !important;}"][vc_column][vc_column_text css=".vc_custom_1509818275829{margin-bottom: 27px !important;}"]
<h2 style="text-align: center;"><span style="color: #ffffff;">Find Out, Why People Love Us!</span></h2>
[/vc_column_text][vc_column_text]
<h4 style="text-align: center; font-weight: 500;"><span style="color: #ffffff;">Loaded with awesome features like Documentation, Knowledge-base, Forum &amp; more!</span></h4>
[/vc_column_text][vc_row_inner css=".vc_custom_1456499581827{margin-top: 60px !important;}"][vc_column_inner width="1/3" css=".vc_custom_1456598374255{background-color: #fefefe !important;}"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-gears" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="56" title="Premium Support" text="24/7 Support"][/vc_column_inner][vc_column_inner width="1/3" css=".vc_custom_1456973990728{background-color: #e8e8e8 !important;}"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-chat " display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="56" title="Online Chat " text="5 days a week"][/vc_column_inner][vc_column_inner width="1/3" css=".vc_custom_1456598384459{background-color: #fefefe !important;}"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-linegraph" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="56" title=" Customer Satisfaction " text="Happy Customers"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/3" css=".vc_custom_1456973980984{background-color: #e8e8e8 !important;}"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-briefcase" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="56" title="Online Documentation " text="Clean User Manuals"][/vc_column_inner][vc_column_inner width="1/3" css=".vc_custom_1456598395459{background-color: #fefefe !important;}"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-heart " display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="56" title="Great Products " text="Loved By 95% Users"][/vc_column_inner][vc_column_inner width="1/3" css=".vc_custom_1456597766266{background-color: #e8e8e8 !important;}"][manual_theme_icon_text use_custom_icon_box_design="no" icon_name="icon-piechart" display_icon_position="top" use_custom_icon_size="yes" custom_icon_size="56" title=" Grow Your Business" text="We Help You Grow"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" css=".vc_custom_1456662913472{padding-top: 50px !important;padding-bottom: 50px !important;}"][vc_column][vc_column_text]
<h2 style="text-align: center; text-transform: capitalize;">Support Desk Quick Links</h2>
[/vc_column_text][vc_column_text css=".vc_custom_1509818238372{margin-bottom: 55px !important;}"]
<h4 style="text-align: center; font-weight: 500;">Easily create Documentation, Knowledge-base, FAQ, Forum and more</h4>
[/vc_column_text][manual_theme_home_help_blocks title="Home Help Blocks"][/vc_column][/vc_row]

CONTENT;
        array_unshift($data, $template);
        return $data;
    }
	
	
/*******
	ADD TEMPLATE :: HOME HELP DESK 3 - 3.0
********/
add_filter( 'vc_load_default_templates', 'vc_modern_support_desk_template' );
function vc_modern_support_desk_template($data) {
	$template               = array();
	$template['name']       = __( '[Manual] Home - Help Desk 3', 'manual' );
	$template['content']    = <<<CONTENT
	
[vc_row row_type="row" stretch_row_type="no" row_content_display="in_grid" row_content_display_align="left" css=".vc_custom_1481737045763{padding-top: 70px !important;padding-bottom: 50px !important;}"][vc_column][vc_custom_heading text="Meet <strong>All Your</strong> Possibilities" font_container="tag:div|font_size:35px|text_align:center" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:300%20light%20regular%3A300%3Anormal"][vc_custom_heading text="Choose a category to find the help you need" font_container="tag:p|font_size:17px|text_align:center" use_theme_fonts="yes" css=".vc_custom_1509820601823{padding-top: 10px !important;}"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" row_content_display="in_grid" row_content_display_align="left" css=".vc_custom_1481736992443{margin-bottom: 80px !important;}"][vc_column][vc_row_inner][vc_column_inner width="1/4"][vc_custom_heading text="01." font_container="tag:h2|font_size:100px|text_align:left|color:%2399c9ec" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:800%20bold%20regular%3A800%3Anormal" css=".vc_custom_1509820726457{margin-bottom: 60px !important;}"][vc_custom_heading text="FAQ's" font_container="tag:h4|text_align:left|line_height:25px" use_theme_fonts="yes" el_class="text-transform-none" css=".vc_custom_1481646692345{margin-bottom: 15px !important;}"][vc_column_text css=".vc_custom_1509820562853{margin-bottom: -2px !important;}"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis eros lobortis, vestibulum turpis ac.[/vc_column_text][vc_empty_space height="15px"][/vc_column_inner][vc_column_inner width="1/4"][vc_custom_heading text="02." font_container="tag:h2|font_size:100px|text_align:left|color:%2382e88b" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:800%20bold%20regular%3A800%3Anormal" css=".vc_custom_1509820742483{margin-bottom: 60px !important;}"][vc_custom_heading text="Video Doc" font_container="tag:h4|text_align:left" use_theme_fonts="yes" el_class="text-transform-none" css=".vc_custom_1481646501960{margin-bottom: 15px !important;}"][vc_column_text css=".vc_custom_1481647094783{margin-bottom: -2px !important;}"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis eros lobortis, vestibulum turpis ac.[/vc_column_text][vc_empty_space height="15px"][/vc_column_inner][vc_column_inner width="1/4"][vc_custom_heading text="03." font_container="tag:h2|font_size:100px|text_align:left|color:%23d59bf9" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:800%20bold%20regular%3A800%3Anormal" css=".vc_custom_1509820759812{margin-bottom: 60px !important;}"][vc_custom_heading text="knowledge Base" font_container="tag:h4|text_align:left" use_theme_fonts="yes" el_class="text-transform-none" css=".vc_custom_1481646696951{margin-bottom: 15px !important;}"][vc_column_text css=".vc_custom_1481647100729{margin-bottom: -2px !important;}"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis eros lobortis, vestibulum turpis ac.[/vc_column_text][vc_empty_space height="15px"][/vc_column_inner][vc_column_inner width="1/4"][vc_custom_heading text="04." font_container="tag:h2|font_size:100px|text_align:left|color:%23eabf41" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:800%20bold%20regular%3A800%3Anormal" css=".vc_custom_1509820776028{margin-bottom: 60px !important;}"][vc_custom_heading text="Community Forum" font_container="tag:h4|text_align:left" use_theme_fonts="yes" el_class="text-transform-none" css=".vc_custom_1481646635895{margin-bottom: 15px !important;}"][vc_column_text css=".vc_custom_1481647106639{margin-bottom: -2px !important;}"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis eros lobortis, vestibulum turpis ac.[/vc_column_text][vc_empty_space height="15px"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="yes" background_color="#eaf9ed" row_content_display="in_grid" row_content_display_align="left" css=".vc_custom_1509821144198{padding-top: 50px !important;padding-bottom: 50px !important;}"][vc_column][vc_custom_heading text="Frequently <strong>Asked</strong> Questions" font_container="tag:div|font_size:35px|text_align:center" google_fonts="font_family:Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900|font_style:300%20light%20regular%3A300%3Anormal"][vc_custom_heading text="read some regularly asked questions" font_container="tag:p|font_size:17px|text_align:center" use_theme_fonts="yes" css=".vc_custom_1509820628441{padding-top: 10px !important;}"][/vc_column][/vc_row][vc_row row_type="row" stretch_row_type="no" row_content_display="in_grid" row_content_display_align="left" css=".vc_custom_1509821347442{padding-top: 70px !important;padding-bottom: 70px !important;}"][vc_column width="1/6"][/vc_column][vc_column width="2/3"][manual_theme_single_faq_article page_per_post="5"][/vc_column][vc_column width="1/6"][/vc_column][/vc_row]

CONTENT;
        array_unshift($data, $template);
        return $data;
    }		
					
?>