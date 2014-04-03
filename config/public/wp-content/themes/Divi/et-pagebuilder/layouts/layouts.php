<?php

global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' )
	add_action( 'init', 'et_pb_add_predefined_layouts' );

function et_pb_add_predefined_layouts() {
	if ( 'on' === get_theme_mod( 'et_pb_predefined_layouts_added' ) ) return;

	$et_pb_layouts = et_pb_get_predefined_layouts();

	if ( isset( $et_pb_layouts ) && is_array( $et_pb_layouts ) ) {
		foreach ( $et_pb_layouts as $et_pb_layout ) {
			et_pb_create_layout( $et_pb_layout['name'], $et_pb_layout['content'], true );
		}
	}

	set_theme_mod( 'et_pb_predefined_layouts_added', 'on' );
}

function et_pb_get_predefined_layouts() {
	$layouts = array();

	$layouts[] = array(
		'name'    => 'Homepage',
		'content' => '
[et_pb_section fullwidth="on"]
[et_pb_fullwidth_slider show_arrows="on" show_pagination="on" parallax="on" auto="off" auto_speed="7000"]
[et_pb_slide heading="Designed With Passion" background_image="http://www.elegantthemesimages.com/images/premade_bg.jpg" button_text="Join Today" background_color="#492144" button_link="http://elegantthemes.com"]No matter how you use Divi, your website is going to look great. Everything about Divi has been built beautifully and purposefully by our passionate team. We are so excited to release this labor of love to our community.[/et_pb_slide]
[et_pb_slide heading="Elegantly Responsive" button_text="Join Today" background_color="#6aceb6" button_link="http://elegantthemes.com" image="http://www.elegantthemesimages.com/images/premade_iphone_slider2.png" image_alt="Alt text for the image" alignment="bottom"]Vivamus ipsum velit, ullamcorper quis nibh non, molestie tempus sapien. Mauris ultrices, felis ut eleifend auctor, leo felis vehicula quam, ut accumsan augue nunc at nisl. Cras venenatis.[/et_pb_slide]
[/et_pb_fullwidth_slider]
[/et_pb_section]

[et_pb_section]
[et_pb_row]
[et_pb_column type="1_4"]
[et_pb_blurb image="http://www.elegantthemesimages.com/images/premade_blurb_1.png" title="Advanced Page Builder"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_blurb image="http://www.elegantthemesimages.com/images/premade_blurb_2.png" title="Elegant Shortcodes"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_blurb image="http://www.elegantthemesimages.com/images/premade_blurb_3.png" title="Fully Responsive"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_blurb image="http://www.elegantthemesimages.com/images/premade_blurb_4.png" title="Perpetual Updates"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section background_color="#f5f5f5" inner_shadow="on"]
[et_pb_row]
[et_pb_column type="2_3"]
[et_pb_image src="http://www.elegantthemesimages.com/images/premade_iphone_half.png" animation="left"][/et_pb_image]
[/et_pb_column]
[et_pb_column type="1_3"]
[et_pb_divider color="#eee" show_divider="off" height="120"][/et_pb_divider]
[et_pb_text]
<h2>It\'s Elegantly Responsive</h2>
Aenean consectetur ipsum ante, vel egestas enim tincidunt quis. Pellentesque vitae congue neque, vel mattis ante. In vitae tempus nunc. Etiam adipiscing enim sed condimentum ultrices. Cras rutrum blandit sem, molestie consequat erat luctus vel. Cras nunc est, laoreet sit amet ligula et, eleifend commodo dui. Vivamus id blandit nisi, eu mattis odio.
[/et_pb_text]
[et_pb_counters]
[et_pb_counter percent="50"]Smart[/et_pb_counter]
[et_pb_counter percent="80"]Flexible[/et_pb_counter]
[et_pb_counter percent="40"]Beautiful[/et_pb_counter]
[/et_pb_counters]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section]
[et_pb_row]
[et_pb_column type="1_4"]
[et_pb_image src="http://www.elegantthemesimages.com/images/premade_logo-1.jpg" animation="top"][/et_pb_image]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_image src="http://www.elegantthemesimages.com/images/premade_logo-2.jpg" animation="top"][/et_pb_image]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_image src="http://www.elegantthemesimages.com/images/premade_logo-3.jpg" animation="top"][/et_pb_image]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_image src="http://www.elegantthemesimages.com/images/premade_logo-4.jpg" animation="top"][/et_pb_image]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section background_color="#f5f5f5" inner_shadow="on"]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_text text_orientation="center"]
<h2>With Our Most Advanced Page Builder Yet.</h2>
Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus dolor ipsum amet sit.
[/et_pb_text]
[/et_pb_column]
[/et_pb_row]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_image src="http://www.elegantthemesimages.com/images/premade_macbook.png" animation="top"][/et_pb_image]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section background_color="#7cbec6"]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_cta title="Signup Today For Instant Access" button_url="http://elegantthemes.com/preview/Divi/join/" button_text="Join Today" background_layout="dark" background_color="none"]
Join today and get access to Divi, as well as our other countless themes and plugins.
[/et_pb_cta]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]',
	);


	$layouts[] = array(
		'name'    => 'Homepage Simple',
		'content' => '
[et_pb_section]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_slider show_arrows="on" show_pagination="on" parallax="off" auto="off" auto_speed="7000"]
[et_pb_slide heading="Divi" button_text="Join Today" background_color="#444b5d" background_image="http://www.elegantthemesimages.com/images/premade_bg.jpg" button_link="http://elegantthemes.com" image="http://www.elegantthemesimages.com/images/premade-logo.png" image_alt="Alt text for the image"]Vivamus ipsum velit, ullamcorper quis nibh non, molestie tempus sapien. Mauris ultrices, felis ut eleifend auctor, leo felis vehicula quam, ut accumsan augue nunc at nisl.[/et_pb_slide]
[et_pb_slide heading="Divi" button_text="Join Today" background_color="#144d6a" background_image="http://www.elegantthemesimages.com/images/premade_bg_2.jpg" button_link="http://elegantthemes.com"]The only theme you will ever need.[/et_pb_slide]
[/et_pb_slider]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section]
[et_pb_row]
[et_pb_column type="1_4"]
[et_pb_blurb image="http://www.elegantthemesimages.com/images/premade_blurb_1.png"  title="Advanced Page Builder"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_blurb image="http://www.elegantthemesimages.com/images/premade_blurb_2.png"  title="Elegant Shortcodes"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_blurb image="http://www.elegantthemesimages.com/images/premade_blurb_3.png"  title="Fully Responsive"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_blurb image="http://www.elegantthemesimages.com/images/premade_blurb_4.png"  title="Perpetual Updates"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[/et_pb_row]


[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_divider height="1" show_divider="on"][/et_pb_divider]
[/et_pb_column]
[/et_pb_row]

[et_pb_row]
[et_pb_column type="1_3"]
[et_pb_text]<h1 style="font-size: 32px;">STUNNING PORTFOLIOS</h1>[/et_pb_text]
[/et_pb_column]
[et_pb_column type="1_3"]
[et_pb_text]With Divi’s portfolio module, you can show off your work anywhere on your site. Choose from our premade portfolio layouts, or create one entirely from scratch![/et_pb_text]
[/et_pb_column]
[et_pb_column type="1_3"]
[et_pb_image src="http://elegantthemesimages.com/images/premade-portfolios.gif" animation="right"][/et_pb_image]
[/et_pb_column]
[/et_pb_row]

[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_divider height="1" show_divider="on"][/et_pb_divider]
[/et_pb_column]
[/et_pb_row]

[et_pb_row]
[et_pb_column type="1_3"]
[et_pb_text]<h1 style="font-size: 32px;">ECOMMERCE INTEGRATION</h1>[/et_pb_text]
[/et_pb_column]
[et_pb_column type="1_3"]
[et_pb_text]Divi has what you need to get an online store up and running in no time. We’ve included a couple of premade store layouts, and the store module lets you sell anywhere on your site.[/et_pb_text]
[/et_pb_column]
[et_pb_column type="1_3"]
[et_pb_image src="http://elegantthemesimages.com/images/premade-ecommerce.gif" animation="right"][/et_pb_image]
[/et_pb_column]
[/et_pb_row]


[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_cta title="Signup Today For Instant Access" button_url="http://elegantthemes.com/preview/Divi/join/" button_text="Join Today" background_layout="dark" background_color="#7EBEC5"]
Join today and get access to Divi, as well as our other countless themes and plugins.
[/et_pb_cta]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]',
	);


	$layouts[] = array(
		'name'    => 'Homepage Store',
		'content' => '
[et_pb_section fullwidth="on"]
[et_pb_fullwidth_slider show_arrows="on" show_pagination="on" parallax="on" auto="off" auto_speed="7000"]
[et_pb_slide heading="Welcome To Our Store" background_image="http://www.elegantthemesimages.com/images/premade_bg.jpg" button_text="View Special Offers" background_color="#492144" button_link="http://elegantthemes.com"]No matter how you use Divi, your website is going to look great. Everything about Divi has been built beautifully and purposefully by our passionate team. We are so excited to release this labor of love to our community.[/et_pb_slide]
[et_pb_slide heading="Today\'s Sale Items" button_text="Order Today" background_color="#6aceb6" button_link="http://elegantthemes.com" image="http://www.elegantthemesimages.com/images/premade_image_800x600.png" image_alt="Alt text for the image"]Vivamus ipsum velit, ullamcorper quis nibh non, molestie tempus sapien. Mauris ultrices, felis ut eleifend auctor, leo felis vehicula quam, ut accumsan augue nunc at nisl. Cras venenatis.[/et_pb_slide]
[/et_pb_fullwidth_slider]
[/et_pb_section]

[et_pb_section]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_shop posts_number="12" type="recent"][/et_pb_shop]
[/et_pb_column]
[/et_pb_row]
[et_pb_row]
[et_pb_column type="1_2"]
[et_pb_cta title="The Holiday Special Sale" button_url="http://elegantthemes.com/preview/Divi/join/" button_text="Redeem This Offer" background_layout="dark" background_color="#7ebec5"]
For a limited time only, all of our holiday products are 50% off! Don\'t miss your chance to save big on these wonderful items.[/et_pb_cta]
[/et_pb_column]
[et_pb_column type="1_2"]
[et_pb_cta title="The Holiday Special Sale" button_url="http://elegantthemes.com/preview/Divi/join/" button_text="Redeem This Offer" background_layout="light" background_color="#fff"]
For a limited time only, all of our holiday products are 50% off! Don\'t miss your chance to save big on these wonderful items.[/et_pb_cta]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section background_color="#f5f5f5" inner_shadow="on"]
[et_pb_row]
[et_pb_column type="1_2"]
[et_pb_text]
<h2>Products On Sale</h2>
Take a look at these special offers.
[/et_pb_text]
[et_pb_shop posts_number="4" type="sale" columns="2"][/et_pb_shop]
[/et_pb_column]
[et_pb_column type="1_2"]
[et_pb_text]
<h2>Top Rated Products</h2>
A list of our latest products.[/et_pb_text]
[et_pb_shop posts_number="4" type="top_rated" columns="2"][/et_pb_shop]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section background_color="#7EBEC5"]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_cta title="Signup Today For Instant Access" button_url="http://elegantthemes.com/preview/Divi/join/" button_text="Join Today" background_layout="dark" background_color="none"]
Join today and get access to Divi, as well as our other countless themes and plugins.
[/et_pb_cta]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]',
	);


	$layouts[] = array(
		'name'    => 'Contact',
		'content' => '
[et_pb_section background_color="#6aceb6" inner_shadow="on" fullwidth="on"]
[et_pb_fullwidth_header title="Contact Our Company" subhead="If you have any questions, we would love to help." background_layout="dark"][/et_pb_fullwidth_header]
[/et_pb_section]

[et_pb_section]
[et_pb_row]
[et_pb_column type="1_2"]
[et_pb_contact_form title="Get In Touch"][/et_pb_contact_form]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_text]
<h3>Contact Information</h3>
<p>Cras rutrum blandit sem, molestie consequat erat luctus vel. Cras nunc est, laoreet sit amet ligula et, eleifend commodo dui.</p>
[/et_pb_text]
[et_pb_text]
<p>
<strong>Phone:</strong> 343.554.2466
<strong>Fax:</strong> 888.343.3467
<strong>eMail:</strong> contact@somewebsite.com
</p>
[/et_pb_text]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_text]
<h3>Location & Hours</h3>
<p>Vivamus id blandit nisi, eu mattis odio. Nulla facilisi. Aenean in mi. Cras rutrum blandit sem, molestie consequat erat luctus vel.</p>
[/et_pb_text]
[et_pb_text]
<p>
<strong>Address:</strong> 4323 Divi Street
Some City, California, 33432
<strong>Hours:</strong> Mon-Fri, 9:00AM-6:00PM
</p>
[/et_pb_text]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]',
	);


	$layouts[] = array(
		'name'    => 'Join',
		'content' => '
[et_pb_section fullwidth="on"]
[et_pb_fullwidth_slider show_arrows="on" show_pagination="on" parallax="on" auto="off" auto_speed="7000"]
[et_pb_slide heading="Join Today" background_image="http://www.elegantthemesimages.com/images/premade_bg_2.jpg" button_text="Join Today" background_color="#144d6a" button_link="http://elegantthemes.com"]No matter how you use Divi, your website is going to look great. Everything about Divi has been built beautifully and purposefully by our passionate team. We are so excited to release this labor of love to our community.[/et_pb_slide]
[et_pb_slide heading="The Best Deal" button_text="Join Today" background_color="#6aceb6" button_link="http://elegantthemes.com" image="http://www.elegantthemesimages.com/images/premade_iphone_slider2.png" image_alt="Alt text for the image" alignment="bottom"]Vivamus ipsum velit, ullamcorper quis nibh non, molestie tempus sapien. Mauris ultrices, felis ut eleifend auctor, leo felis vehicula quam, ut accumsan augue nunc at nisl. Cras venenatis.[/et_pb_slide]
[/et_pb_fullwidth_slider]
[/et_pb_section]

[et_pb_section]
[et_pb_row]
[et_pb_column type="1_4"]
[et_pb_blurb image="http://www.elegantthemesimages.com/images/premade_blurb_1.png"  title="Advanced Page Builder"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_blurb image="http://www.elegantthemesimages.com/images/premade_blurb_2.png"  title="Elegant Shortcodes"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_blurb image="http://www.elegantthemesimages.com/images/premade_blurb_3.png"  title="Fully Responsive"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_blurb image="http://www.elegantthemesimages.com/images/premade_blurb_4.png"  title="Perpetual Updates"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section background_color="#f7f7f7"]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_divider height="60"][/et_pb_divider]
[et_pb_pricing_tables]
[et_pb_pricing_table title="Beginnger" currency="$" per="yr" sum="19" button_url="http://elegantthemes.com" button_text="Sign Up!"]
Access to <a href="#">All Themes</a>
Perpetual Theme Updates
-Premium Technical Support
-Access to <a href="#">All Plugins</a>
-Layered Photoshop Files
-No Yearly Fees
[/et_pb_pricing_table]
[et_pb_pricing_table title="Personal" currency="$" per="yr" sum="39" button_url="http://elegantthemes.com" button_text="Sign Up!"]
Access to <a href="#">All Themes</a>
Perpetual Theme Updates
Premium Technical Support
-Access to <a href="#">All Plugins</a>
-Layered Photoshop Files
-No Yearly Fees
[/et_pb_pricing_table]
[et_pb_pricing_table featured="on" title="Developer" subtitle="The Best Deal" currency="$" per="yr" sum="89" button_url="http://elegantthemes.com" button_text="Sign Up!"]
Access to <a href="#">All Themes</a>
Perpetual Theme Updates
Premium Technical Support
Access to <a href="#">All Plugins</a>
Layered Photoshop Files
-No Yearly Fees
[/et_pb_pricing_table]
[et_pb_pricing_table title="Lifetime" currency="$" per="yr" sum="249" button_url="http://elegantthemes.com" button_text="Sign Up!"]
Access to <a href="#">All Themes</a>
Perpetual Theme Updates
Premium Technical Support
Access to <a href="#">All Plugins</a>
Layered Photoshop Files
No Yearly Fees
[/et_pb_pricing_table]
[/et_pb_pricing_tables]
[et_pb_divider height="60"][/et_pb_divider]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section inner_shadow="on" background_color="#eeeeee"]
[et_pb_row]
[et_pb_column type="1_4"]
[et_pb_image src="http://www.elegantthemesimages.com/images/premade_logo-1.jpg" animation="top"][/et_pb_image]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_image src="http://www.elegantthemesimages.com/images/premade_logo-2.jpg" animation="top"][/et_pb_image]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_image src="http://www.elegantthemesimages.com/images/premade_logo-3.jpg" animation="top"][/et_pb_image]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_image src="http://www.elegantthemesimages.com/images/premade_logo-4.jpg" animation="top"][/et_pb_image]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_text text_orientation="center" background_layout="light"]
<h2>What Our Customers Are Saying.</h2>
Don\'t just take it from us, let our customers do the talking!
[/et_pb_text]
[/et_pb_column]
[/et_pb_row]
[et_pb_row]
[et_pb_column type="1_3"]
[et_pb_testimonial author="John Doe"]<p>"Aliquam pellentesque hendrerit commodo. Sed hendrerit blandit justo quis feugiat. Curabitur ut consequat odio. Nunc risus mi, consectetur et dolor a, dignissim vehicula nibh. Vestibulum adipiscing adipiscing consectetur. Vestibulum aliquam dignissim volutpat. Curabitur dictum, quam vitae fringilla aliquet, ligula justo placerat nisi, ut semper sapien elit eget augue. Maecenas et feugiat nisi. Nulla in velit et orci dictum gravida. Donec sagittis cursus luctus. Aliquam vel convallis leo. Donec urna sapien, suscipit et ultricies at, sodales in dui."</p>[/et_pb_testimonial]
[/et_pb_column]
[et_pb_column type="1_3"]
[et_pb_testimonial author="John Doe"]<p>"Aliquam pellentesque hendrerit commodo. Sed hendrerit blandit justo quis feugiat. Curabitur ut consequat odio. Nunc risus mi, consectetur et dolor a, dignissim vehicula nibh. Vestibulum adipiscing adipiscing consectetur. Vestibulum aliquam dignissim volutpat. Curabitur dictum, quam vitae fringilla aliquet, ligula justo placerat nisi, ut semper sapien elit eget augue. Maecenas et feugiat nisi. Nulla in velit et orci dictum gravida. Donec sagittis cursus luctus. Aliquam vel convallis leo. Donec urna sapien, suscipit et ultricies at, sodales in dui."</p>[/et_pb_testimonial]
[/et_pb_column]
[et_pb_column type="1_3"]
[et_pb_testimonial author="John Doe"]<p>"Aliquam pellentesque hendrerit commodo. Sed hendrerit blandit justo quis feugiat. Curabitur ut consequat odio. Nunc risus mi, consectetur et dolor a, dignissim vehicula nibh. Vestibulum adipiscing adipiscing consectetur. Vestibulum aliquam dignissim volutpat. Curabitur dictum, quam vitae fringilla aliquet, ligula justo placerat nisi, ut semper sapien elit eget augue. Maecenas et feugiat nisi. Nulla in velit et orci dictum gravida. Donec sagittis cursus luctus. Aliquam vel convallis leo. Donec urna sapien, suscipit et ultricies at, sodales in dui."</p>[/et_pb_testimonial]
[/et_pb_column]
[/et_pb_row]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_toggle title="Can I use the themes on multiple sites?"]
Yes, you are free to use our themes on as many websites as you like. We do not place any restrictions on how many times you can download or use a theme, nor do we limit the number of domains that you can install our themes to.
[/et_pb_toggle]
[et_pb_toggle open="on" title="What is your refund policy?"]
We offer no-questions-asked refunds to all customers within 30 days of your purchase. If you are not satisfied with our product, then simply send us an email and we will refund your purchase right away. Our goal has always been to create a happy, thriving community. If you are not thrilled with the product or are not enjoying the experience, then we have no interest in forcing you to stay an unhappy member.
[/et_pb_toggle]
[et_pb_toggle title="What are Photoshop Files?"]
Elegant Themes offers two different packages: Personal and Developer. The Personal Subscription is ideal for the average user while the Developers License is meant for experienced designers who wish to customize their themes using the original Photoshop files. Photoshop files are the original design files that were used to create the theme. They can be opened using Adobe Photoshop and edited, and prove very useful for customers wishing to change their theme\'s design in some way.
[/et_pb_toggle]
[et_pb_toggle title="Can I upgrade after signing up?"]
Yes, you can upgrade at any time after signing up. When you log in as a "personal" subscriber, you will see a notice regarding your current package and instructions on how to upgrade.
[/et_pb_toggle]
[et_pb_toggle title="Can I use your themes with WP.com?"]
Unfortunately WordPress.com does not allow the use of custom themes. If you would like to use a custom theme of any kind, you will need to purchase your own hosting account and install the free software from WordPress.org. If you are looking for great WordPress hosting, we recommend giving HostGator a try.[/et_pb_toggle]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section background_color="#7EBEC5"]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_cta title="Join Today For Instant Access." button_url="#" button_text="Contact Me" background_layout="dark" background_color="none"]
We have the best product around. Don\'t miss out on this great opportunity!
[/et_pb_cta]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]',
	);


	$layouts[] = array(
		'name'    => 'Portfolio',
		'content' => '
[et_pb_section background_color="#6aceb6" inner_shadow="on" fullwidth="on"]
[et_pb_fullwidth_header title="My Portfolio" subhead="Your subtitle goes right here." background_layout="dark"][/et_pb_fullwidth_header]
[/et_pb_section]

[et_pb_section]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_portfolio fullwidth="off"][/et_pb_portfolio]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section background_color="#7EBEC5"]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_cta title="Don\'t Be Shy. Get In Touch." button_url="#" button_text="Contact Me" background_layout="dark" background_color="none"]
If you are interested in working together, send me an inquiry and I will get back to you as soon as I can!
[/et_pb_cta]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]',
	);


	$layouts[] = array(
		'name'    => 'Shop Extended',
		'content' => '
[et_pb_section background_color="#ef8f61" inner_shadow="on" fullwidth="on"]
[et_pb_fullwidth_header title="Welcome To Our Shop" subhead="Your subtitle goes right here." background_layout="dark"][/et_pb_fullwidth_header]
[/et_pb_section]

[et_pb_section]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_shop posts_number="12" type="recent"][/et_pb_shop]
[/et_pb_column]
[/et_pb_row]
[et_pb_row]
[et_pb_column type="1_2"]
[et_pb_cta title="The Holiday Special Sale" button_url="http://elegantthemes.com/preview/Divi/join/" button_text="Redeem This Offer" background_layout="dark" background_color="#7ebec5"]
For a limited time only, all of our holiday products are 50% off! Don\'t miss your chance to save big on these wonderful items.[/et_pb_cta]
[/et_pb_column]
[et_pb_column type="1_2"]
[et_pb_cta title="The Holiday Special Sale" button_url="http://elegantthemes.com/preview/Divi/join/" button_text="Redeem This Offer" background_layout="light" background_color="#fff"]
For a limited time only, all of our holiday products are 50% off! Don\'t miss your chance to save big on these wonderful items.[/et_pb_cta]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section background_color="#f5f5f5" inner_shadow="on"]
[et_pb_row]
[et_pb_column type="1_2"]
[et_pb_text]<h2>Products On Sale</h2>
Take a look at these special offers.
[/et_pb_text]
[et_pb_shop posts_number="4" type="sale" columns="2"][/et_pb_shop]
[/et_pb_column]
[et_pb_column type="1_2"]
[et_pb_text]<h2>Top Rated Products</h2>
A list of our latest products.[/et_pb_text]
[et_pb_shop posts_number="4" type="top_rated" columns="2"][/et_pb_shop]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section background_color="#7EBEC5"]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_cta title="Signup Today For Instant Access" button_url="http://elegantthemes.com/preview/Divi/join/" button_text="Join Today" background_layout="dark" background_color="none"]
Join today and get access to Divi, as well as our other countless themes and plugins.
[/et_pb_cta]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]',
	);


	$layouts[] = array(
		'name'    => 'Shop Basic',
		'content' => '
[et_pb_section background_color="#ef8f61" inner_shadow="on" fullwidth="on"]
[et_pb_fullwidth_header title="Welcome To Our Shop" subhead="Your subtitle goes right here." background_layout="dark"][/et_pb_fullwidth_header]
[/et_pb_section]

[et_pb_section]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_shop posts_number="12" type="recent"][/et_pb_shop]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section background_color="#7EBEC5"]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_cta title="Signup Today For Instant Access" button_url="http://elegantthemes.com/preview/Divi/join/" button_text="Join Today" background_layout="dark" background_color="none"]
Join today and get access to Divi, as well as our other countless themes and plugins.
[/et_pb_cta]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]',
	);


	$layouts[] = array(
		'name'    => 'Blog Tiled',
		'content' => '
[et_pb_section background_color="#7ebec5" inner_shadow="on" fullwidth="on"]
[et_pb_fullwidth_header title="Tiled Blog Layout" subhead="Your subtitle goes right here." background_layout="dark"][/et_pb_fullwidth_header]
[/et_pb_section]

[et_pb_section]
[et_pb_row]
[et_pb_column type="2_3"]
[et_pb_blog fullwidth="off" posts_number="6" meta_date="M j, Y" show_thumbnail="on" show_content="off" show_author="on" show_date="on" show_categories="on"][/et_pb_blog]
[/et_pb_column]
[et_pb_column type="1_3"]
[et_pb_sidebar area="sidebar-1" orientation="right"][/et_pb_sidebar]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]',
	);


	$layouts[] = array(
		'name'    => 'Blog Standard',
		'content' => '
[et_pb_section background_color="#7ebec5" inner_shadow="on" fullwidth="on"]
[et_pb_fullwidth_header title="Standard Blog Layout" subhead="Your subtitle goes right here." background_layout="dark"][/et_pb_fullwidth_header]
[/et_pb_section]

[et_pb_section]
[et_pb_row]
[et_pb_column type="1_4"]
[et_pb_sidebar area="sidebar-1" orientation="left"][/et_pb_sidebar]
[/et_pb_column]
[et_pb_column type="3_4"]
[et_pb_blog fullwidth="on" posts_number="6" meta_date="M j, Y" show_thumbnail="on" show_content="off" show_author="on" show_date="on" show_categories="on"][/et_pb_blog]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]',
	);


	$layouts[] = array(
		'name'    => 'Our Team',
		'content' => '
[et_pb_section background_color="#6aceb6" inner_shadow="on" fullwidth="on"]
[et_pb_fullwidth_header title="About Our Team" subhead="Your subtitle goes right here." background_layout="dark"][/et_pb_fullwidth_header]
[/et_pb_section]

[et_pb_section]
[et_pb_row]
[et_pb_column type="1_3"]
[et_pb_image src="http://www.elegantthemesimages.com/images/premade_image_800x600.png" animation="left"][/et_pb_image]
[et_pb_text]
<h2>Nick Roach</h2>
<em>President, CEO, Theme UI/UX Designer</em>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mattis nec nisi non luctus. Donec aliquam non nisi ut rutrum. In sit amet vestibulum felis, id aliquet ipsum. Vestibulum feugiat lacinia aliquet.
[/et_pb_text]
[et_pb_counters]
[et_pb_counter percent="50"]Design & UX[/et_pb_counter]
[et_pb_counter percent="80"]Web Programming[/et_pb_counter]
[et_pb_counter percent="10"]Internet Marketing[/et_pb_counter]
[/et_pb_counters]
[/et_pb_column]

[et_pb_column type="1_3"]
[et_pb_image src="http://www.elegantthemesimages.com/images/premade_image_800x600.png" animation="top"][/et_pb_image]
[et_pb_text]
<h2>Kenny Sing</h2>
<em>Lead Graphic Designers</em>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mattis nec nisi non luctus. Donec aliquam non nisi ut rutrum. In sit amet vestibulum felis, id aliquet ipsum. Vestibulum feugiat lacinia aliquet.
[/et_pb_text]
[et_pb_counters]
[et_pb_counter percent="85"]Photoshop[/et_pb_counter]
[et_pb_counter percent="70"]After Effects[/et_pb_counter]
[et_pb_counter percent="50"]Illustrator[/et_pb_counter]
[/et_pb_counters]
[/et_pb_column]

[et_pb_column type="1_3"]
[et_pb_image src="http://www.elegantthemesimages.com/images/premade_image_800x600.png" animation="right"][/et_pb_image]
[et_pb_text]
<h2>Mitch Skolnik</h2>
<em>Community Manager</em>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent mattis nec nisi non luctus. Donec aliquam non nisi ut rutrum. In sit amet vestibulum felis, id aliquet ipsum. Vestibulum feugiat lacinia aliquet.
[/et_pb_text]
[et_pb_counters]
[et_pb_counter percent="80"]Customer Happiness[/et_pb_counter]
[et_pb_counter percent="30"]Tech Support[/et_pb_counter]
[et_pb_counter percent="50"]Community Management[/et_pb_counter]
[/et_pb_counters]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section background_color="#2d3743" inner_shadow="on"]
[et_pb_row]
[et_pb_column type="1_4"]
[et_pb_blurb background_layout="dark" image="http://www.elegantthemesimages.com/images/premade_blurb_5.png"  title="Timely Support"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_blurb background_layout="dark" image="http://www.elegantthemesimages.com/images/premade_blurb_6.png"  title="Innovative Ideas"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_blurb background_layout="dark" image="http://www.elegantthemesimages.com/images/premade_blurb_7.png"  title="Advanced Technology"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_blurb background_layout="dark" image="http://www.elegantthemesimages.com/images/premade_blurb_8.png"  title="Clear Communication"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section background_color="#f5f5f5" inner_shadow="on"]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_text text_orientation="center"]<h2>Recent Blog Posts</h2>
Learn from the top thought leaders in the industry.
[/et_pb_text]
[/et_pb_column]
[/et_pb_row]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_blog fullwidth="off" show_pagination="off" posts_number="3" meta_date="M j, Y" show_thumbnail="on" show_content="off" show_author="on" show_date="on" show_categories="on"][/et_pb_blog]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_text text_orientation="center"]<h2>Recent Projects</h2>
Learn from the top thought leaders in the industry.
[/et_pb_text]
[/et_pb_column]
[/et_pb_row]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_portfolio categories="Portfolio" fullwidth="off"][/et_pb_portfolio]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section background_color="#7EBEC5"]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_cta title="Don\'t Be Shy. Get In Touch." button_url="#" button_text="Contact Us" background_layout="dark" background_color="none"]
If you are interested in working together, send us an inquiry and we will get back to you as soon as we can!
[/et_pb_cta]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]',
	);


	$layouts[] = array(
		'name'    => 'About Me',
		'content' => '
[et_pb_section background_color="#6aceb6" inner_shadow="on" fullwidth="on"]
[et_pb_fullwidth_header title="About me" subhead="Your subtitle goes right here." background_layout="dark"][/et_pb_fullwidth_header]
[/et_pb_section]

[et_pb_section]
[et_pb_row]
[et_pb_column type="1_2"]
[et_pb_image src="http://www.elegantthemesimages.com/images/premade_image_800x600.png" animation="left"][/et_pb_image]
[/et_pb_column]
[et_pb_column type="1_2"]
[et_pb_text]
<h2>This Is My Story</h2>
Curabitur quis dui volutpat, cursus eros ut, commodo elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut id est euismod, rhoncus nunc quis, lobortis turpis. Tam sociis natoque. Curabitur quis dui volutpat, cursus eros ut, commodo elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut id est euismod, rhoncus nunc quis.
[/et_pb_text]
[et_pb_counters]
[et_pb_counter percent="50"]Counter Name[/et_pb_counter]
[et_pb_counter percent="80"]Portfolio Themes[/et_pb_counter]
[et_pb_counter percent="10"]Themes[/et_pb_counter]
[/et_pb_counters]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section background_color="#2d3743" inner_shadow="on"]
[et_pb_row]
[et_pb_column type="1_4"]
[et_pb_blurb background_layout="dark" image="http://www.elegantthemesimages.com/images/premade_blurb_5.png"  title="Timely Support"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_blurb background_layout="dark" image="http://www.elegantthemesimages.com/images/premade_blurb_6.png"  title="Innovative Ideas"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_blurb background_layout="dark" image="http://www.elegantthemesimages.com/images/premade_blurb_7.png"  title="Advanced Technology"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_blurb background_layout="dark" image="http://www.elegantthemesimages.com/images/premade_blurb_8.png"  title="Clear Communication"]Vestibulum lobortis. Donec at euismod nibh, eu bibendum quam. Nullam non gravida purus, nec eleifend tincidunt nisi. Fusce at purus in massa laoreet.[/et_pb_blurb]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section background_color="#f5f5f5"]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_text text_orientation="center"]<h2>Recent Blog Posts</h2>
Learn from the top thought leaders in the industry.
[/et_pb_text]
[/et_pb_column]
[/et_pb_row]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_blog fullwidth="off" show_pagination="off" posts_number="3" meta_date="M j, Y" show_thumbnail="on" show_content="off" show_author="on" show_date="on" show_categories="on"][/et_pb_blog]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]

[et_pb_section background_color="#7EBEC5"]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_cta title="Don\'t Be Shy. Get In Touch." button_url="#" button_text="Contact Me" background_layout="dark" background_color="none"]
If you are interested in working together, send me an inquiry and I will get back to you as soon as I can!
[/et_pb_cta]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]',
	);


	$layouts[] = array(
		'name'    => 'Page Dual Sidebars',
		'content' => '
[et_pb_section background_color="#7ebec5" inner_shadow="on" fullwidth="on"]
[et_pb_fullwidth_header title="Page With Dual Sidebars" subhead="Here is a basic page layout." background_layout="dark"][/et_pb_fullwidth_header]
[/et_pb_section]

[et_pb_section]
[et_pb_row]
[et_pb_column type="1_4"]
[et_pb_sidebar area="sidebar-1" orientation="left"][/et_pb_sidebar]
[/et_pb_column]
[et_pb_column type="1_2"]
[et_pb_text]
<h3>Just A Standard Page</h3>
<p>Nunc et vestibulum velit. Suspendisse euismod eros vel urna bibendum gravida. Phasellus et metus nec dui ornare molestie. In consequat urna sed tincidunt euismod. Praesent non pharetra arcu, at tincidunt sapien. Nullam lobortis ultricies bibendum. Duis elit leo, porta vel nisl in, ullamcorper scelerisque velit. Fusce volutpat purus dolor, vel pulvinar dui porttitor sed. Phasellus ac odio eu quam varius elementum sit amet euismod justo.</p>

<p>Sed sit amet blandit ipsum, et consectetur libero. Integer convallis at metus quis molestie. Morbi vitae odio ut ante molestie scelerisque. Aliquam erat volutpat. Vivamus dignissim fringilla semper. Aliquam imperdiet dui a purus pellentesque, non ornare ipsum blandit. Sed imperdiet elit in quam egestas lacinia nec sit amet dui. Cras malesuada tincidunt ante, in luctus tellus hendrerit at. Duis massa mauris, bibendum a mollis a, laoreet quis elit. Nulla pulvinar vestibulum est, in viverra nisi malesuada vel. Nam ut ipsum quis est faucibus mattis eu ut turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nunc felis, venenatis in fringilla vel, tempus in turpis. Mauris aliquam dictum dolor at varius. Fusce sed vestibulum metus. Vestibulum dictum ultrices nulla sit amet fermentum.</p>

<h3>Fusce feugiat quis nunc</h3>
<p>Suspendisse non lorem eget tellus posuere ornare ut in diam. Quisque dictum libero non luctus malesuada. Mauris pellentesque risus ipsum, at venenatis elit dignissim id. Aenean at porta mauris. Phasellus nec tellus aliquam, vehicula elit sed, pulvinar nulla. Sed eleifend leo adipiscing sem dictum lobortis. Praesent nunc ante, feugiat vitae dignissim vel, porta at arcu. Fusce feugiat quis nunc sit amet malesuada. Suspendisse iaculis neque sed nibh dictum, vitae tempus nisi consequat. In consectetur vitae tellus sed condimentum. Suspendisse et nulla in neque rutrum vulputate. Morbi sodales sodales hendrerit. Suspendisse potenti. Sed adipiscing ante gravida rutrum commodo. Etiam malesuada suscipit augue et cursus. Vivamus pharetra bibendum gravida.</p>

<p>Maecenas mauris urna, fringilla id risus a, pulvinar lobortis purus. Integer suscipit risus in est condimentum dapibus. Nunc aliquet, purus convallis venenatis pretium, est neque elementum risus, non accumsan orci nisl at leo. Vivamus dignissim lacus in mauris auctor aliquam. Sed a velit id nunc bibendum tincidunt. Pellentesque vitae massa nunc. Aenean sagittis nulla mauris, ut porttitor mi varius at. Nam quis congue metus. Cras consectetur fringilla ultricies. Quisque odio orci, tincidunt vitae placerat id, rhoncus sit amet sapien. In a lorem vitae justo aliquet porttitor. Vestibulum et enim commodo, vestibulum nibh ullamcorper, auctor felis. Nulla facilisi. Nullam facilisis posuere metus id imperdiet. In iaculis elementum suscipit. Praesent dignissim turpis at leo sollicitudin, eu ultricies metus consectetur.</p>
[/et_pb_text]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_sidebar area="sidebar-1" orientation="right"][/et_pb_sidebar]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]',
	);


	$layouts[] = array(
		'name'    => 'Page Left Sidebar',
		'content' => '
[et_pb_section background_color="#7ebec5" inner_shadow="on" fullwidth="on"]
[et_pb_fullwidth_header title="Page With Left Sidebar" subhead="Here is a basic page layout." background_layout="dark"][/et_pb_fullwidth_header]
[/et_pb_section]

[et_pb_section]
[et_pb_row]
[et_pb_column type="1_4"]
[et_pb_sidebar area="sidebar-1" orientation="left"][/et_pb_sidebar]
[/et_pb_column]
[et_pb_column type="3_4"]
[et_pb_text]
<h3>Just A Standard Page</h3>
<p>Nunc et vestibulum velit. Suspendisse euismod eros vel urna bibendum gravida. Phasellus et metus nec dui ornare molestie. In consequat urna sed tincidunt euismod. Praesent non pharetra arcu, at tincidunt sapien. Nullam lobortis ultricies bibendum. Duis elit leo, porta vel nisl in, ullamcorper scelerisque velit. Fusce volutpat purus dolor, vel pulvinar dui porttitor sed. Phasellus ac odio eu quam varius elementum sit amet euismod justo.</p>

<p>Sed sit amet blandit ipsum, et consectetur libero. Integer convallis at metus quis molestie. Morbi vitae odio ut ante molestie scelerisque. Aliquam erat volutpat. Vivamus dignissim fringilla semper. Aliquam imperdiet dui a purus pellentesque, non ornare ipsum blandit. Sed imperdiet elit in quam egestas lacinia nec sit amet dui. Cras malesuada tincidunt ante, in luctus tellus hendrerit at. Duis massa mauris, bibendum a mollis a, laoreet quis elit. Nulla pulvinar vestibulum est, in viverra nisi malesuada vel. Nam ut ipsum quis est faucibus mattis eu ut turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nunc felis, venenatis in fringilla vel, tempus in turpis. Mauris aliquam dictum dolor at varius. Fusce sed vestibulum metus. Vestibulum dictum ultrices nulla sit amet fermentum.</p>

<h3>Fusce feugiat quis nunc</h3>
<p>Suspendisse non lorem eget tellus posuere ornare ut in diam. Quisque dictum libero non luctus malesuada. Mauris pellentesque risus ipsum, at venenatis elit dignissim id. Aenean at porta mauris. Phasellus nec tellus aliquam, vehicula elit sed, pulvinar nulla. Sed eleifend leo adipiscing sem dictum lobortis. Praesent nunc ante, feugiat vitae dignissim vel, porta at arcu. Fusce feugiat quis nunc sit amet malesuada. Suspendisse iaculis neque sed nibh dictum, vitae tempus nisi consequat. In consectetur vitae tellus sed condimentum. Suspendisse et nulla in neque rutrum vulputate. Morbi sodales sodales hendrerit. Suspendisse potenti. Sed adipiscing ante gravida rutrum commodo. Etiam malesuada suscipit augue et cursus. Vivamus pharetra bibendum gravida.</p>

<p>Maecenas mauris urna, fringilla id risus a, pulvinar lobortis purus. Integer suscipit risus in est condimentum dapibus. Nunc aliquet, purus convallis venenatis pretium, est neque elementum risus, non accumsan orci nisl at leo. Vivamus dignissim lacus in mauris auctor aliquam. Sed a velit id nunc bibendum tincidunt. Pellentesque vitae massa nunc. Aenean sagittis nulla mauris, ut porttitor mi varius at. Nam quis congue metus. Cras consectetur fringilla ultricies. Quisque odio orci, tincidunt vitae placerat id, rhoncus sit amet sapien. In a lorem vitae justo aliquet porttitor. Vestibulum et enim commodo, vestibulum nibh ullamcorper, auctor felis. Nulla facilisi. Nullam facilisis posuere metus id imperdiet. In iaculis elementum suscipit. Praesent dignissim turpis at leo sollicitudin, eu ultricies metus consectetur.</p>

<p>Donec diam magna, adipiscing vitae mi a, aliquet condimentum nunc. Pellentesque id augue imperdiet, fringilla ante eget, ornare elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin in lectus quis dolor gravida rhoncus condimentum nec mi. Suspendisse urna massa, eleifend vel arcu ac, facilisis malesuada sem. Ut a eros ut nisl tempus luctus. Nam pharetra quis dui sed tristique. Duis ultrices cursus rhoncus. Proin tortor lorem, scelerisque quis cursus ac, sodales tempor nisl. Vestibulum posuere quis elit nec faucibus.</p>

<p>Maecenas nec lectus lacus. Proin quis lectus vitae nisi vehicula vulputate bibendum et purus. Aenean vulputate aliquet justo, quis auctor nunc. Curabitur ut mi nibh. Cras consectetur sem a felis tempor, id pretium mauris rhoncus. Sed sodales, turpis eu facilisis dapibus, lectus mi ullamcorper justo, sit amet rutrum ante ligula lobortis libero. Curabitur consequat et neque id malesuada.</p>
[/et_pb_text]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]',
	);


	$layouts[] = array(
		'name'    => 'Page Right Sidebar',
		'content' => '
[et_pb_section background_color="#7ebec5" inner_shadow="on" fullwidth="on"]
[et_pb_fullwidth_header title="Page With Right Sidebar" subhead="Here is a basic page layout." background_layout="dark"][/et_pb_fullwidth_header]
[/et_pb_section]

[et_pb_section]
[et_pb_row]
[et_pb_column type="3_4"]
[et_pb_text]
<h3>Just A Standard Page</h3>
<p>Nunc et vestibulum velit. Suspendisse euismod eros vel urna bibendum gravida. Phasellus et metus nec dui ornare molestie. In consequat urna sed tincidunt euismod. Praesent non pharetra arcu, at tincidunt sapien. Nullam lobortis ultricies bibendum. Duis elit leo, porta vel nisl in, ullamcorper scelerisque velit. Fusce volutpat purus dolor, vel pulvinar dui porttitor sed. Phasellus ac odio eu quam varius elementum sit amet euismod justo.</p>

<p>Sed sit amet blandit ipsum, et consectetur libero. Integer convallis at metus quis molestie. Morbi vitae odio ut ante molestie scelerisque. Aliquam erat volutpat. Vivamus dignissim fringilla semper. Aliquam imperdiet dui a purus pellentesque, non ornare ipsum blandit. Sed imperdiet elit in quam egestas lacinia nec sit amet dui. Cras malesuada tincidunt ante, in luctus tellus hendrerit at. Duis massa mauris, bibendum a mollis a, laoreet quis elit. Nulla pulvinar vestibulum est, in viverra nisi malesuada vel. Nam ut ipsum quis est faucibus mattis eu ut turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nunc felis, venenatis in fringilla vel, tempus in turpis. Mauris aliquam dictum dolor at varius. Fusce sed vestibulum metus. Vestibulum dictum ultrices nulla sit amet fermentum.</p>

<h3>Fusce feugiat quis nunc</h3>
<p>Suspendisse non lorem eget tellus posuere ornare ut in diam. Quisque dictum libero non luctus malesuada. Mauris pellentesque risus ipsum, at venenatis elit dignissim id. Aenean at porta mauris. Phasellus nec tellus aliquam, vehicula elit sed, pulvinar nulla. Sed eleifend leo adipiscing sem dictum lobortis. Praesent nunc ante, feugiat vitae dignissim vel, porta at arcu. Fusce feugiat quis nunc sit amet malesuada. Suspendisse iaculis neque sed nibh dictum, vitae tempus nisi consequat. In consectetur vitae tellus sed condimentum. Suspendisse et nulla in neque rutrum vulputate. Morbi sodales sodales hendrerit. Suspendisse potenti. Sed adipiscing ante gravida rutrum commodo. Etiam malesuada suscipit augue et cursus. Vivamus pharetra bibendum gravida.</p>

<p>Maecenas mauris urna, fringilla id risus a, pulvinar lobortis purus. Integer suscipit risus in est condimentum dapibus. Nunc aliquet, purus convallis venenatis pretium, est neque elementum risus, non accumsan orci nisl at leo. Vivamus dignissim lacus in mauris auctor aliquam. Sed a velit id nunc bibendum tincidunt. Pellentesque vitae massa nunc. Aenean sagittis nulla mauris, ut porttitor mi varius at. Nam quis congue metus. Cras consectetur fringilla ultricies. Quisque odio orci, tincidunt vitae placerat id, rhoncus sit amet sapien. In a lorem vitae justo aliquet porttitor. Vestibulum et enim commodo, vestibulum nibh ullamcorper, auctor felis. Nulla facilisi. Nullam facilisis posuere metus id imperdiet. In iaculis elementum suscipit. Praesent dignissim turpis at leo sollicitudin, eu ultricies metus consectetur.</p>

<p>Donec diam magna, adipiscing vitae mi a, aliquet condimentum nunc. Pellentesque id augue imperdiet, fringilla ante eget, ornare elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin in lectus quis dolor gravida rhoncus condimentum nec mi. Suspendisse urna massa, eleifend vel arcu ac, facilisis malesuada sem. Ut a eros ut nisl tempus luctus. Nam pharetra quis dui sed tristique. Duis ultrices cursus rhoncus. Proin tortor lorem, scelerisque quis cursus ac, sodales tempor nisl. Vestibulum posuere quis elit nec faucibus.</p>

<p>Maecenas nec lectus lacus. Proin quis lectus vitae nisi vehicula vulputate bibendum et purus. Aenean vulputate aliquet justo, quis auctor nunc. Curabitur ut mi nibh. Cras consectetur sem a felis tempor, id pretium mauris rhoncus. Sed sodales, turpis eu facilisis dapibus, lectus mi ullamcorper justo, sit amet rutrum ante ligula lobortis libero. Curabitur consequat et neque id malesuada.</p>
[/et_pb_text]
[/et_pb_column]
[et_pb_column type="1_4"]
[et_pb_sidebar area="sidebar-1" orientation="right"][/et_pb_sidebar]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]',
	);


	$layouts[] = array(
		'name'    => 'FAQ Page',
		'content' => '
[et_pb_section background_color="#6aceb6" inner_shadow="on" fullwidth="on"]
[et_pb_fullwidth_header title="Frequently Asked Questions" subhead="Before contacting us, please browse our FAQ." background_layout="dark"][/et_pb_fullwidth_header]
[/et_pb_section]

[et_pb_section]
[et_pb_row]
[et_pb_column type="4_4"]
[et_pb_toggle title="Can I use the themes on multiple sites?"]
Yes, you are free to use our themes on as many websites as you like. We do not place any restrictions on how many times you can download or use a theme, nor do we limit the number of domains that you can install our themes to.
[/et_pb_toggle]
[et_pb_toggle open="on" title="What is your refund policy?"]
We offer no-questions-asked refunds to all customers within 30 days of your purchase. If you are not satisfied with our product, then simply send us an email and we will refund your purchase right away. Our goal has always been to create a happy, thriving community. If you are not thrilled with the product or are not enjoying the experience, then we have no interest in forcing you to stay an unhappy member.
[/et_pb_toggle]
[et_pb_toggle title="What are Photoshop Files?"]
Elegant Themes offers two different packages: Personal and Developer. The Personal Subscription is ideal for the average user while the Developers License is meant for experienced designers who wish to customize their themes using the original Photoshop files. Photoshop files are the original design files that were used to create the theme. They can be opened using Adobe Photoshop and edited, and prove very useful for customers wishing to change their theme\'s design in some way.
[/et_pb_toggle]
[et_pb_toggle title="Can I upgrade after signing up?"]
Yes, you can upgrade at any time after signing up. When you log in as a "personal" subscriber, you will see a notice regarding your current package and instructions on how to upgrade.
[/et_pb_toggle]
[et_pb_toggle title="Can I use your themes with WP.com?"]
Unfortunately WordPress.com does not allow the use of custom themes. If you would like to use a custom theme of any kind, you will need to purchase your own hosting account and install the free software from WordPress.org. If you are looking for great WordPress hosting, we recommend giving HostGator a try.[/et_pb_toggle]
[/et_pb_column]
[/et_pb_row]
[/et_pb_section]',
	);

	return $layouts;
}