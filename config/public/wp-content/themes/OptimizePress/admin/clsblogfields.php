<?php
    if ( !class_exists('myBlogFields') ) {

    $blogupload = new CI_Up_Mark();

	class myBlogFields {
		/**
		* @var  string  $prefix  The prefix for storing custom fields in the postmeta table
		*/
		var $prefix = '_blogpost_';
		var $i = 1; // Fix the "attachment" thing with main wp content field
		/**
		* @var  array  $customFields  Defines the custom fields available
		*/

		var $customFields =	array(
            array(
				"name"			=> "images",
				"title"			=> "Post Image",
				"description"	=> "Click browse to upload image.",
				"type"			=> "upload",
				"noborderbottom"=> "noborderbottom",
				"scope"			=>	array( "post" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "postimage_alttag",
				"title"			=> "Blog Thumbnail Alt Text",
				"description"	=> "",
				"type"			=> "text",
				"scope"			=>	array( "post" ),
				"capability"	=> "edit_pages"
			)			
		);
		/**
		* PHP 4 Compatible Constructor
		*/
		function myBlogFields() { $this->__construct(); }
		/**
		* PHP 5 Constructor
		*/
		function __construct() {
			add_action( 'admin_menu', array( &$this, 'createBlogFields' ) );
			add_action( 'save_post', array( &$this, 'saveBlogFields' ), 1, 2 );
			// Comment this line out if you want to keep default custom fields meta box
			//add_action( 'do_meta_boxes', array( &$this, 'removeDefaultBlogFields' ), 10, 3 );
		}
		/**
		* Remove the default Custom Fields meta box
		*/
		function removeDefaultBlogFields( $type, $context, $post ) {
			foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
				//remove_meta_box( 'postcustom', 'post', $context );
				//remove_meta_box( 'postcustom', 'page', $context );
				//Use the line below instead of the line above for WP versions older than 2.9.1
				//remove_meta_box( 'pagecustomdiv', 'page', $context );
			}
		}
		/**
		* Create the new Custom Fields meta box
		*/
		function createBlogFields() {
			if ( function_exists( 'add_meta_box' ) ) {
				add_meta_box( 'my-blog-fields', 'Blog Post Options', array( &$this, 'displayBlogFields' ), 'post', 'normal', 'high' );
			}
		}
		/**
		* Display the new Custom Fields meta box
		*/
		function displayBlogFields() {
			global $post;
            $templatedir = get_bloginfo('template_directory');
			?>
			<div class="form-wrap">
			<script src="<?php echo $templatedir; ?>/lib/admin/js/ajaxupload.js" type="text/javascript"></script>
            <script src="<?php echo $templatedir; ?>/lib/admin/js/adminupload.js" type="text/javascript"></script>
            	<style>
				.form-field input[type=text].color { width:85px; margin-right:5px; } 
				.form-field input[type=text].color2 { width:85px; margin-right:5px; } 
				.form-wrap div.color { float:left;margin:8px 8px -1px;width:31%;padding-bottom:10px; } 
				.form-wrap div.color2 { float:left;margin:8px 8px -1px;width:25%;padding-bottom:10px; } 
				.form-wrap div.font { float:right;margin:8px 8px -1px;width:auto;padding-bottom:10px; } 
				.form-table th, .form-wrap label { clear:both; }
				.form-wrap .form-field { margin:8px 8px -1px;padding:0 0 8px; }
				.form-wrap div.separator { border-top:1px dotted #CCCCCC;clear:both;margin-top:0;padding-top:10px;padding-bottom:10px;position:relative;z-index:999;margin-bottom:-1px; }
				.form-wrap div.noborderbottom { margin-bottom:-1px; padding-bottom:10px; }
				.form-wrap div.optinbelow { float:left;margin:8px 0 -1px 8px;width:180px;padding-bottom:10px; } 
				.form-wrap div.formurl { float:left;margin:8px 8px -1px;width:92%;padding-bottom:10px; } 
				.form-field input[type=text].optinbelow { width:112px; margin-right:5px; } 
 				.form-field input[type=text].formurl { width:350px; margin-right:5px; } 
				.form-wrap .optinbelow textarea { width:500px; margin-left:5px; vertical-align:baseline; } 
				.inside .form-wrap .extrawebformfield { padding:0; margin:5px; }
				.inside .form-wrap .extrawebformfield p { color:#333333; font-size:11px; font-style:normal; }
				.inside .form-wrap .extrawebformfield input[type=text] { width:112px; padding:3px; margin:1px 15px 1px 1px; }
               </style>
           		<script type="text/javascript" src="<?php echo $templatedir; ?>/colorpicker/jscolor/jscolor.js"></script>
           		<script type="text/javascript" src="<?php echo $templatedir; ?>/admin/optin.js"></script>		
                <script type="text/javascript">
                jQuery(document).ready(function() {
                    enhanceForm();
                });
					function show_hide_childdivs(classname) {
						jQuery("."+classname).animate({"height": "toggle"}, { duration: 175 });
					}
              		function enhanceForm() {

              			// Mutate the form to a fileupload form
              			// As usual: Special code for IE
              			if (jQuery.browser.msie) jQuery('#post').attr('encoding', 'multipart/form-data');
              			else jQuery('#post').attr('enctype', 'multipart/form-data');

              			// Ensure proper encoding
              			jQuery('#post').attr('acceptCharset', 'UTF-8');
                      }
                </script>
				<?php
                wp_nonce_field( 'my-blog-fields', 'my-blog-fields_wpnonce', false, true );
				foreach ( $this->customFields as $customField ) {
					// Check scope
					$scope = $customField[ 'scope' ];
					$output = false;
					foreach ( $scope as $scopeItem ) {
						switch ( $scopeItem ) {
							case "post": {
								// Output on any post screen
								if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php" || $post->post_type=="post" )
									$output = true;
								break;
							}
							case "page": {
								// Output on any page screen
								if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="page-new.php" || $post->post_type=="page" )
									$output = true;
								break;
							}
						}
						if ( $output ) break;
					}
					// Check capability
					if ( !current_user_can( $customField['capability'], $post->ID ) )
						$output = false;
					// Output if allowed
					if ( $output ) { ?>
						<div class="form-field form-required <?php echo $customField['class']; ?> <?php echo $customField['separator']; ?>  <?php echo $customField['noborderbottom']; ?>">
							<?php
							switch ( $customField[ 'type' ] ) {
								case 'upload':
								echo '<div id="'.$this->prefix . $customField[ 'name' ].'_upload-field" class="fieldsection">';							
									echo '<label style="float:left;padding-top:5px;padding-right:10px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<input class="field_txt uploaded_url" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" style="width:215px;" type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '"><br><br><span class="image_upload_button button " id="'.$this->prefix . $customField[ 'name' ].'_upload-btn">Upload Image</span>';
									echo '<input type="hidden" class="ajax_action_url" value="'.admin_url("admin-ajax.php").'" name="'.$this->prefix . $customField[ 'name' ].'_action">';
									
								echo '</div>';
								break;
                                case "file": {
									// Text area
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									echo '<input type="file" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '"';
                                    if($this->prefix . $customField[ 'name' ]=="_blogpost_postimage"){
                                        echo '<label>Uploaded Images:</label><img src="'.get_post_meta( $post->ID, '_blogpost_images', true ).'"  style="max-width:735px;">';
                                   }
									break;
								}
								default: {
									echo '<label style="float:left;padding-top:5px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									echo '<input style="float:left;margin-left:10px;width:350px;" class="'.$customField['class'].'" type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									echo '<br styl="clear:both;"><br styl="clear:both;">';
									break;
								}
							}
							?>
							<?php
                                $url = get_bloginfo('url');
                                //if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                            ?>
						</div>
					<?php
					}
				} ?>
			</div>
			<?php
		}
		/**
		* Save the new Custom Fields values
		*/
		function saveBlogFields( $post_id, $post ) {
            global $wpdb,$blogupload;
			$i = 1;
			if(!is_dir(WP_CONTENT_DIR .'/uploads')) {
				mkdir(WP_CONTENT_DIR .'/uploads', 0777);
			}
			if(!is_dir(WP_CONTENT_DIR .'/uploads/normal')) {
				mkdir(WP_CONTENT_DIR .'/uploads/normal', 0777);
			}
			if(!is_dir(WP_CONTENT_DIR .'/uploads/thumbs')) {
				mkdir(WP_CONTENT_DIR .'/uploads/thumbs', 0777);
			}
            $dirname = WP_CONTENT_DIR .'/uploads';
            $url = get_bloginfo('url');
            $dir = get_bloginfo('home').'/wp-content/uploads';

			if ( !wp_verify_nonce( $_POST[ 'my-blog-fields_wpnonce' ], 'my-blog-fields' ) )
				return;
			if ( !current_user_can( 'edit_post', $post_id ) )
				return;
			if ( $post->post_type != 'page' && $post->post_type != 'post' )
				return;
			foreach ( $this->customFields as $customField ) {
				if ( current_user_can( $customField['capability'], $post_id ) ) {
					if ( isset( $_POST[ $this->prefix . $customField['name'] ] ) && trim( $_POST[ $this->prefix . $customField['name'] ] ) ) {
						update_post_meta( $post_id, $this->prefix . $customField[ 'name' ], $_POST[ $this->prefix . $customField['name'] ] );
                        ///update_post_meta( $post_id, $this->prefix . $customField[ 'name' ], $_POST[ $this->prefix . $customField['name'] ] );
					} else {
						delete_post_meta( $post_id, $this->prefix . $customField[ 'name' ] );
					}

        	    }
	    	}

            //Uploading Images goes here
        	$blogupload->set_FPath($dirname."/");
            $blogupload->filepaththumb = $dirname."/thumbs/";
            $blogupload->filepathnormal = $dirname."/normal/";
        	$blogupload->set_File('_blogpost_postimage');
            $myimage = 'images';
            $blogimagename = '';
           if(!empty($_FILES['_blogpost_postimage']['name'])){
            	if($blogupload->is_ImageFile()==true){
            		$blogimagename = $blogupload->do_UploadFile();
					//echo ($this->i==1) ? $post_id.','. $this->prefix . $myimage.','. $dir.'/'.$blogimagename.'<br />' : '';
                    ($this->i==1) ? update_post_meta( $post_id, $this->prefix . $myimage, $dir.'/'.$blogimagename ) : '';
                    ($this->i==1) ? update_post_meta( $post_id, $this->prefix . $myimage.'_thumbs', $dir.'/thumbs/'.$blogimagename ) : '';
                    ($this->i==1) ? update_post_meta( $post_id, $this->prefix . $myimage.'_normal', $dir.'/normal/'.$blogimagename ) : '';
            	}
            }else{
                if ( get_post_meta( $post->ID, $this->prefix . $myimage, true ) == ""){
                    update_post_meta( $post_id, $this->prefix . $myimage, $dir.'/images/video1.jpg' );
                }
            } $this->i++;
	} // End Class
  }
} // End if class exists statement

?>