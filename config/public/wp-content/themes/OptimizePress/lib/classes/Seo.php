<?php
class OpSeo {

    function OpTitle()
    {
        global $shortname, $post, $seo_options;
		$get_options = get_option($shortname.'_seo_settings');

        foreach ( $seo_options as $value ) {
            $$value['id'] = $get_options[ $value['id'] ]; 
        }

        if ( is_home() || is_front_page() ) {
            $category_title = $this->getCategoryName( $post->ID );
            $authordata = get_userdata($post->post_author);
            if( $seohometitle != '' ) {

                $hometitle = str_replace('<%site_title%>', get_bloginfo('name'), $seohometitle );
                $hometitle = str_replace('<%site_desc%>', get_bloginfo('description'), $hometitle );
                $hometitle = str_replace('<%post_title%>', '', $hometitle );
                $hometitle = str_replace('<%page_title%>', '', $hometitle );
                $hometitle = str_replace('<%category_title%>', $category_title, $hometitle );
                $hometitle = str_replace('<%date%>', '', $hometitle );
                $hometitle = str_replace('<%tag%>', '', $hometitle );
                $hometitle = str_replace('<%keyword%>', '', $hometitle );
                $hometitle = str_replace('<%request_words%>', '', $hometitle );

                $hometitle = str_replace('<%author_nicename%>', $authordata->user_nicename, $hometitle );
                $hometitle = str_replace('<%author_firstname%>', $authordata->first_name, $hometitle );
                $hometitle = str_replace('<%author_lastname%>', $authordata->last_name, $hometitle );
                $hometitle = str_replace('<%author_login%>', $authordata->user_login, $hometitle );

            } else {

                $page_title = '';
                if ( get_option('show_on_front') == 'page' && is_front_page() ) {
                    $page_title = get_post_meta(get_option('page_on_front'), 'seo_title', true);
                } else if ( get_option('show_on_front') == 'page' && is_home() ) {
                    $page_title = get_post_meta(get_option('page_for_posts'), 'seo_title', true);
                } 

                if ( $page_title != '' ) {
                    $format = get_option('seopage_title_format');
                } else {
                    $format = get_bloginfo('name') . ' | ' . get_bloginfo('description');
                }

                $hometitle = str_replace('<%site_title%>', get_bloginfo('name'), $format );
                $hometitle = str_replace('<%site_desc%>', get_bloginfo('description'), $hometitle );
                $hometitle = str_replace('<%post_title%>', $page_title, $hometitle );
                $hometitle = str_replace('<%page_title%>', $page_title, $hometitle );

                $hometitle = str_replace('<%category_title%>', $category_title, $hometitle );
                $hometitle = str_replace('<%date%>', '', $hometitle );
                $hometitle = str_replace('<%tag%>', '', $hometitle );
                $hometitle = str_replace('<%keyword%>', '', $hometitle );
                $hometitle = str_replace('<%request_words%>', '', $hometitle );

                $hometitle = str_replace('<%author_nicename%>', $authordata->user_nicename, $hometitle );
                $hometitle = str_replace('<%author_firstname%>', $authordata->first_name, $hometitle );
                $hometitle = str_replace('<%author_lastname%>', $authordata->last_name, $hometitle );
                $hometitle = str_replace('<%author_login%>', $authordata->user_login, $hometitle );


            }
            
            $this->title = $hometitle;

        } else if ( is_single() || is_page() ) {

			$postcustom = get_post_custom($post->ID);  
            $title = $postcustom['_seo_customtitletag'][0];
            $authordata = get_userdata($post->post_author);

            if ( is_page() ) {
                $posttitle = str_replace('<%site_title%>', get_bloginfo('name'), $seopage_title_format);
            } else {
                $posttitle = str_replace('<%site_title%>', get_bloginfo('name'), $seopost_title_format);
            }

            $posttitle = str_replace('<%site_desc%>', get_bloginfo('description'), $posttitle );    

            if( $title != '' ) {
                $posttitle = str_replace('<%post_title%>', $title, $posttitle );
                $posttitle = str_replace('<%page_title%>', $title, $posttitle );
            } else {
                $posttitle = str_replace('<%post_title%>', $post->post_title, $posttitle );
                $posttitle = str_replace('<%page_title%>', $post->post_title, $posttitle );
            }

            $category_title = $this->getCategoryName( $post->ID );

            $posttitle = str_replace('<%category_title%>', $category_title, $posttitle );
            $posttitle = str_replace('<%date%>', '', $posttitle );
            $posttitle = str_replace('<%tag%>', '', $posttitle );
            $posttitle = str_replace('<%keyword%>', '', $posttitle );
            $posttitle = str_replace('<%request_words%>', '', $posttitle );

            $posttitle = str_replace('<%author_nicename%>', $authordata->user_nicename, $posttitle );
            $posttitle = str_replace('<%author_firstname%>', $authordata->first_name, $posttitle );
            $posttitle = str_replace('<%author_lastname%>', $authordata->last_name, $posttitle );
            $posttitle = str_replace('<%author_login%>', $authordata->user_login, $posttitle );

            $this->title = $posttitle;

        } else if ( is_category() ) {
            
            $cattitle = str_replace('<%site_title%>', get_bloginfo('name'), $seocat_title_format);

            

            $cattitle = str_replace('<%site_desc%>', get_bloginfo('description'), $cattitle );

            

            $cattitle = str_replace('<%post_title%>', '', $cattitle );
            $cattitle = str_replace('<%page_title%>', '', $cattitle );
        
            

            $category_title = $this->getCategoryName( $post->ID );

            $cattitle = str_replace('<%category_title%>', $category_title, $cattitle );

            $cattitle = str_replace('<%date%>', '', $cattitle );
            $cattitle = str_replace('<%tag%>', '', $cattitle );
            $cattitle = str_replace('<%keyword%>', '', $cattitle );
            $cattitle = str_replace('<%request_words%>', '', $cattitle );

            $cattitle = str_replace('<%author_nicename%>', '', $cattitle );
            $cattitle = str_replace('<%author_firstname%>', '', $cattitle );
            $cattitle = str_replace('<%author_lastname%>', '', $cattitle );
            $cattitle = str_replace('<%author_login%>', '', $cattitle );
            
            $this->title = $cattitle;

        } else if ( is_tag() ) {

            global $wp_query;
            $tag = $this->getTag( $wp_query );

            $tagtitle = str_replace('<%site_title%>', get_bloginfo('name'), $seotag_title_format);
            $tagtitle = str_replace('<%site_desc%>', get_bloginfo('description'), $tagtitle );
            $tagtitle = str_replace('<%post_title%>', '', $tagtitle );
            $tagtitle = str_replace('<%page_title%>', $this->request_as_words($_SERVER['REQUEST_URI']), $tagtitle );
    
            $category_title = $this->getCategoryName( $post->ID );

            $tagtitle = str_replace('<%category_title%>', $category_title, $tagtitle );
            $tagtitle = str_replace('<%date%>', '', $tagtitle );
            $tagtitle = str_replace('<%tag%>', $tag, $tagtitle );
            $tagtitle = str_replace('<%keyword%>', '', $tagtitle );
            $tagtitle = str_replace('<%request_words%>', '', $tagtitle );

            $tagtitle = str_replace('<%author_nicename%>', '', $tagtitle );
            $tagtitle = str_replace('<%author_firstname%>', '', $tagtitle );
            $tagtitle = str_replace('<%author_lastname%>', '', $tagtitle );
            $tagtitle = str_replace('<%author_login%>', '', $tagtitle );

            $this->title = $tagtitle;

        } else if ( is_search() ) {

            $searchtitle = str_replace('<%site_title%>', get_bloginfo('name'), $seosearch_title_format);
            $searchtitle = str_replace('<%site_desc%>', get_bloginfo('description'), $searchtitle );
            $searchtitle = str_replace('<%post_title%>', '', $searchtitle );
            $searchtitle = str_replace('<%page_title%>', '', $searchtitle );
            $searchtitle = str_replace('<%category_title%>', '', $searchtitle );
            $searchtitle = str_replace('<%date%>', '', $searchtitle );
            $searchtitle = str_replace('<%tag%>', '', $searchtitle );

            $keyword = attribute_escape( get_search_query() );

            $searchtitle = str_replace('<%keyword%>', $keyword, $searchtitle );
            $searchtitle = str_replace('<%request_words%>', '', $searchtitle );

            $searchtitle = str_replace('<%author_nicename%>', '', $searchtitle );
            $searchtitle = str_replace('<%author_firstname%>', '', $searchtitle );
            $searchtitle = str_replace('<%author_lastname%>', '', $searchtitle );
            $searchtitle = str_replace('<%author_login%>', '', $searchtitle );

            $this->title = $searchtitle;

        } else if ( is_404() ) {

            $notfoundtitle = str_replace('<%site_title%>', get_bloginfo('name'), $seo404_title_format);
            $notfoundtitle = str_replace('<%site_desc%>', get_bloginfo('description'), $notfoundtitle );
            $notfoundtitle = str_replace('<%post_title%>', '', $notfoundtitle );
            $notfoundtitle = str_replace('<%page_title%>', '', $notfoundtitle );
            $notfoundtitle = str_replace('<%category_title%>', '', $notfoundtitle );
            $notfoundtitle = str_replace('<%date%>', '', $notfoundtitle );
            $notfoundtitle = str_replace('<%tag%>', '', $notfoundtitle );
            $notfoundtitle = str_replace('<%keyword%>', '', $notfoundtitle );
            $notfoundtitle = str_replace('<%request_url%>', $_SERVER['REQUEST_URI'], $notfoundtitle );
            $notfoundtitle = str_replace('<%request_words%>', $this->request_as_words( $_SERVER['REQUEST_URI'] ), $notfoundtitle );
            
            $notfoundtitle = str_replace('<%author_nicename%>', '', $notfoundtitle );
            $notfoundtitle = str_replace('<%author_firstname%>', '', $notfoundtitle );
            $notfoundtitle = str_replace('<%author_lastname%>', '', $notfoundtitle );
            $notfoundtitle = str_replace('<%author_login%>', '', $notfoundtitle );

            $this->title = $notfoundtitle;

        } else if ( is_archive() ) {
    
            $authordata = get_userdata($post->post_author);

            $archivetitle = str_replace('<%site_title%>', get_bloginfo('name'), $seoarchive_title_format);
            $archivetitle = str_replace('<%site_desc%>', get_bloginfo('description'), $archivetitle );
            $archivetitle = str_replace('<%post_title%>', '', $archivetitle );
            $archivetitle = str_replace('<%page_title%>', '', $archivetitle );
            $archivetitle = str_replace('<%category_title%>', '', $archivetitle );
            $archivetitle = str_replace('<%date%>', wp_title('', false) , $archivetitle );
            $archivetitle = str_replace('<%tag%>', '', $archivetitle );
            $archivetitle = str_replace('<%keyword%>', '', $archivetitle );
            $archivetitle = str_replace('<%request_words%>', '', $archivetitle );

            $archivetitle = str_replace('<%author_nicename%>', '', $archivetitle );
            $archivetitle = str_replace('<%author_firstname%>', '', $archivetitle );
            $archivetitle = str_replace('<%author_lastname%>', '', $archivetitle );
            $archivetitle = str_replace('<%author_login%>', '', $archivetitle );

            $this->title = $archivetitle;

        } else if ( is_author() ) {
    
            $authordata = get_userdata($post->post_author);

            $authortitle = str_replace('<%site_title%>', get_bloginfo('name'), $seoauthor_title_format);
            $authortitle = str_replace('<%site_desc%>', get_bloginfo('description'), $authortitle );
            $authortitle = str_replace('<%post_title%>', '', $authortitle );
            $authortitle = str_replace('<%page_title%>', '', $authortitle );
            $authortitle = str_replace('<%category_title%>', '', $authortitle );
            $authortitle = str_replace('<%date%>', wp_title('', false) , $authortitle );
            $authortitle = str_replace('<%tag%>', '', $authortitle );
            $authortitle = str_replace('<%keyword%>', '', $authortitle );
            $authortitle = str_replace('<%request_words%>', '', $authortitle );

            $authortitle = str_replace('<%author_nicename%>', $authordata->user_nicename, $authortitle );
            $authortitle = str_replace('<%author_firstname%>', $authordata->first_name, $authortitle );
            $authortitle = str_replace('<%author_lastname%>', $authordata->last_name, $authortitle );
            $authortitle = str_replace('<%author_login%>', $authordata->user_login, $authortitle );

            $this->title = $archivetitle;

        }

        echo $this->title;
    }

    function OpMeta() 
    {
        global $shortname, $post, $seo_options;
		$postcustom = get_post_custom($post->ID);  
		$get_options = get_option($shortname.'_seo_settings');

		$seodisableseo = $get_options['seodisableseo'];
		if ( $seodisableseo != 'on' ) {

        foreach ( $seo_options as $value ) {
            $$value['id'] = $get_options[ $value['id'] ]; 
        }

        $this->meta  = '' . "\n";

        $robots = array();

        if ( is_home() || is_front_page() ) {


            // Meta Desc & Keywords For Home & Front Page

            $desc = '';
            $key = '';

            if ( get_option('show_on_front') == 'page' && is_front_page() ) {
                $desc = get_post_meta(get_option('page_on_front'), '_seo_metadescription', true);
                $key = get_post_meta(get_option('page_on_front'), '_seo_metakeywords', true);
            } else if ( get_option('show_on_front') == 'page' && is_home() ) {
                $desc = get_post_meta(get_option('page_for_posts'), '_seo_metadescription', true);
                $key = get_post_meta(get_option('page_for_posts'), '_seo_metakeywords', true);
            }

            $page_desc = $seohomedesc != '' ? $seohomedesc : $desc;
            $page_keywords = $seohomekeywords != '' ? $seohomekeywords : $key;

            // Meta Robots For Home & Front Page

            if ( $seosubpages_noindex == 'true' && get_query_var('paged') > 1 ) {
                $robots[] = 'noindex,follow';
            } else {
                $robots[] = 'index,follow';
            }

            if ( $seonoodp == 'true' ) {
                $robots[] = 'noodp';
            }
        
            if ( $seonoydir == 'true' ) {
                $robots[] = 'noydir';
            }
            
        } else if ( is_page() || is_single() ) {

            $meta    = get_post_custom($post->ID);
            $disable = get_post_meta($post->ID, '_seo_disabledseo', true);

            if ( !$disable ) {

                $desc = $meta['_seo_metadescription'][0];
                $key = $meta['_seo_metakeywords'][0];

                $page_desc = $desc != '' ? $desc : $post->post_title;
                $page_keywords = $key != '' ? $key : '';

                // Meta Robots For Posts & Pages

                $noindex = $meta['_seo_1'][0];
                $nofollow = $meta['_seo_2'][0];
                $noarchive = $meta['_seo_3'][0];
            
                if ( $seosubpages_noindex == 'true' && get_query_var('paged') > 1 ) {
                    
                    $robots[] = 'noindex';
                    $robots[] = $nofollow == 'yes' ? 'nofollow' : 'follow';

                    if ( $noarchive == 'yes' ) {
                        $robots[] = 'noarchive';
                    }
                    

                } else {

                    $robots[] = ( $noindex == 'yes' ) ? 'noindex' : 'index' ;
                    $robots[] = ( $nofollow == 'yes' ) ? 'nofollow' : 'follow';

                    if ( $noarchive == 'yes' ) {
                        $robots[] = 'noarchive';
                    }
                }
                
                if ( $seonoodp == 'true' ) {
                    $robots[] = 'noodp';
                }
        
                if ( $seonoydir == 'true' ) {
                    $robots[] = 'noydir';
                }

            }

        } else if ( is_category() ) {

            $robots[] = $seocat_noindex == 'true' ? 'noindex' : 'index' ;
            $robots[] = $seocat_nofollow == 'true' ? 'nofollow' : 'follow';

            if ( $seocat_noarchive == 'true' ) {
                $robots[] = 'noarchive';
            }
            
            if ( $seonoodp == 'true' ) {
                $robots[] = 'noodp';
            }
        
            if ( $seonoydir == 'true' ) {
                $robots[] = 'noydir';
            }

        } else if ( is_tag() ) {

            $robots[] = $seotag_noindex == 'true' ? 'noindex' : 'index' ;
            $robots[] = $seotag_nofollow == 'true' ? 'nofollow' : 'follow';

            if ( $seotag_noarchive == 'true' ) {
                $robots[] = 'noarchive';
            }
    
            if ( $seonoodp == 'true' ) {
                $robots[] = 'noodp';
            }
        
            if ( $seonoydir == 'true' ) {
                $robots[] = 'noydir';
            }

        } else if ( is_author() ) {

            $robots[] = $seoauthor_noindex == 'true' ? 'noindex' : 'index' ;
            $robots[] = $seoauthor_nofollow == 'true' ? 'nofollow' : 'follow';

            if ( get_option('pt_author_noarchive') == 'true' ) {
                $robots[] = 'noarchive';
            }

            if ( $seonoodp == 'true' ) {
                $robots[] = 'noodp';
            }
        
            if ( $seonoydir == 'true' ) {
                $robots[] = 'noydir';
            }

        } else if ( is_archive() ) {

            $robots[] = $seoarchive_noindex == 'true' ? 'noindex' : 'index' ;
            $robots[] = $seoarchive_nofollow == 'true' ? 'nofollow' : 'follow';

            if ( $seoarchive_noarchive == 'true' ) {
                $robots[] = 'noarchive';
            }
            
            if ( $seonoodp == 'true' ) {
                $robots[] = 'noodp';
            }
        
            if ( $seonoydir == 'true' ) {
                $robots[] = 'noydir';
            }

        }

        if ( !empty( $page_desc ) ) {
            $this->meta .= '<meta name="description" content="' . trim( wptexturize( $page_desc ) ) . '" />' . "\n";
        }

        if ( !empty( $page_keywords ) ) {
            $this->meta .= '<meta name="keywords" content="' . trim( wptexturize( $page_keywords ) ) . '" />' . "\n";
        }

        if ( count($robots) > 0 ) {
            $this->meta .= '<meta name="robots" content="' . implode(',', $robots) . '" />' . "\n\n";
        }

        echo $this->meta;
		
		}
    }

    function OpRedirect()
    {
        if( is_404() ) {

             $slug = basename( $_SERVER['REQUEST_URI'] );             
            
            $exts = array('/', '.php', '.html', '.htm');
            
            foreach ( $exts as $ext ) { 
                $slug = str_replace( $ext, '', $slug ); 
                $slug = trim( $slug );
            } 

             if ( $ID = $this->checkPostExistance( $slug ) ) {

                 wp_redirect( get_permalink( $ID ), 301 );

            }
        }
    }

    function OpRss()
    {
        global $shortname, $post, $seo_options;
		$get_options = get_option($shortname.'_seo_settings');

        foreach ( $seo_options as $value ) {
                $$value['id'] = $get_options[$value['id']]; 
        }

        if( $seocustom_rss == '' ) {
            $this->rss = get_bloginfo('rss2_url');
        } else {
            $this->rss = $seocustom_rss;
        } 

        return $this->rss;
    }

    function checkPostExistance( $slug ) {

         global $wpdb;

         if( $ID = $wpdb->get_var( "SELECT ID FROM " . $wpdb->posts . " WHERE post_name = '" . $slug . "' AND post_status = 'publish'" ) ) {
            return $ID;
        } else {
            return false;
        }

    }

    function getCategoryName( $post_id ) 
    {
        $categories = get_the_category($post_id);
        $category = '';
        if (count($categories) > 0) {
            $category = $categories[0]->cat_name;
        }

        return $category;
    }

    function getTag( $query ) 
    {
        $tag = $query->query_vars['tag'];

        return ucwords($tag);
    }

    function request_as_words($request) 
    {
        $request = htmlspecialchars($request);
        $request = str_replace('.html', ' ', $request);
        $request = str_replace('.htm', ' ', $request);
        $request = str_replace('.', ' ', $request);
        $request = str_replace('/', ' ', $request);
        $request_a = explode(' ', $request);
        $request_new = array();
        foreach ($request_a as $token) {
            $request_new[] = ucwords(trim($token));
        }
        $request = implode(' ', $request_new);
        return $request;
    }
}
function op_seo_header()
{
    $seo = new OpSeo;
    $seo->OpMeta();
}

function op_seo_title()
{	
	global $shortname;
	$get_options = get_option($shortname.'_seo_settings');
	
	$seodisableseo = $get_options['seodisableseo'];
    if ( $seodisableseo != 'on' ) {
        $seo = new OpSeo;
        if ( is_page() || is_single() ) {
            global $post;
            $meta = get_post_meta($post->ID, '_seo_disabledseo', true);

            if ( get_post_meta($post->ID, '_seo_disabledseo') != 'on' ) {
                $seo->OpTitle();
            } else {
                wp_title('&laquo;', true, 'right');
                bloginfo('name');
            }
		} elseif ( is_tag() ) {
			$tagtitle = ucwords(single_tag_title( '', false ));
			echo $tagtitle.' | '.get_bloginfo('name');
        } else {
            $seo->OpTitle();
        }
    } else {
        wp_title('&laquo;', true, 'right');
        bloginfo('name');
    }
}

