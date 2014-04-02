<?php
    if ( !class_exists('myHelpFields') ) {

	class myHelpFields {
		/**
		* PHP 4 Compatible Constructor
		*/
		function myHelpFields() { $this->__construct(); }
		/**
		* PHP 5 Constructor
		*/
		function __construct() {
			add_action( 'admin_menu', array( &$this, 'createHelpFields' ) );
            add_action( 'admin_menu', array( &$this, 'createHelpFields' ) );
		}
		/**
		* Create the new meta box
		*/
		function createHelpFields() {
			if ( function_exists( 'add_meta_box' ) ) {
				add_meta_box( 'my-help-fields', 'OptimizePress Help', array( &$this, 'displayHelpFields' ), 'page', 'side', 'high' );
				add_meta_box( 'my-help-fields', 'OptimizePress Help', array( &$this, 'displayHelpFields' ), 'post', 'side', 'high' );
			}
		}
		/**
		* Display the new meta box
		*/
		function displayHelpFields() {
			global $post;
            $templatedir = get_bloginfo('template_directory');
			?>
            <!-- In the head section of the page -->
            <script>
            <!--
            function wopen(url, name, w, h)
            {
            // Fudge factors for window decoration space.
             // In my tests these work well on all platforms & browsers.
            w += 850;
            h += 650;
             var win = window.open(url,
              name,
              'width=' + w + ', height=' + h + ', ' +
              'location=no, menubar=no, ' +
              'status=no, toolbar=no, scrollbars=1, resizable=no');
             win.resizeTo(w, h);
             win.focus();
            }
            // -->
            </script>             
			<div class="form-wrap">
            	<center><a href="http://www.optimizepress.com/members" target="_blank">Access the training dashboard</a></center><br />
                <center><a href="#" target="popup" onClick="wopen('http://www.optimizepress.com/templatelibrary', 'popup', 0, 0); return false;">View Template Gallery</a></center><br />
			</div>
			<?php
		}
		// End Class
  }
} // End if class exists statement

?>