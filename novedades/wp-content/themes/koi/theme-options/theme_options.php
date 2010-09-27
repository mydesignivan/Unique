<?php
/* 
Theme options by Jon Raasch

http://jonraasch.com
http://twitter.com/jonraasch
*/

function theme_admin_init() {
    add_theme_page("Theme Options", "Theme Options", 'edit_themes', 'theme-settings', 'theme_admin');
}

add_action('admin_menu', 'theme_admin_init');

function theme_admin() {
    function process_admin_opts() {
        $theme_opts['color_scheme'] = $_POST['color_scheme'];
        $theme_opts['favicon'] = $_POST['favicon'];
        $theme_opts['exclude_pages'] = $_POST['exclude_pages'];
        $theme_opts['tracking_code'] = $_POST['tracking_code'];
        $theme_opts['social_display'] = $_POST['social_display'];
        $theme_opts['social_off'] = $_POST['social_off'] ? true : false;
        $theme_opts['no_dropdown'] = $_POST['no_dropdown'] ? true : false;
        
        $social_titles = $_POST['social_title'];
        $social_images = $_POST['social_image'];
        $social_urls = $_POST['social_url'];
        $social_rss_urls = $_POST['social_rss_url'];
        $social_customs = $_POST['social_custom'];
        
        $social_count = count($social_customs);
        
        $social = array();
        
        for( $i = 0; $i < $social_count; $i++ ) {
            if ( $social_images[$i] == 'rss' ) {
                $social_urls[$i] = $social_rss_urls[$i] ? $social_rss_urls[$i] : 'feed';
            }
            
            $social[$i] = array(
                'title'  => $social_titles[$i],
                'image'  => $social_images[$i],
                'url'    => $social_urls[$i],
                'custom' => $social_customs[$i],
            );
        }
        
        $theme_opts['social'] = $social;
        
        // update options and flash success message
        update_option('theme_opts', $theme_opts);
        
        global $ol_flash;
        
        $ol_flash = "Your Theme Options have been saved.";
        
        return $theme_opts;
    }
    
    global $ol_flash, $current_user;
    get_currentuserinfo();
    
    // process posted options
    if (isset($_POST['color_scheme'])) $theme_opts = process_admin_opts();
    else if ( isset($_POST['reset_all_opts']) ) {
        $theme_opts = theme_init_opts();
        
        $ol_flash = "The Theme Options have been reset to the default.";
    }
    else {
        $theme_opts = get_option('theme_opts');
        if ( !$theme_opts ) $theme_opts = theme_init_opts();
    }
    
    // build the scheme option output
    $schemes = array(
        array('default', 'Default'),
    );
    
    $schemeOpts = '';
    $schemeCount = count( $schemes );
    
    for ( $i = 0; $i < $schemeCount; $i++ ) {
        $schemeSlug = $schemes[$i][0];
        $schemeName = $schemes[$i][1];
        
        $schemeOpts .= '<option value="' . $schemeSlug . '"' . ( $schemeSlug == $theme_opts['color_scheme'] ? ' selected="selected"' : '' ) . '>' . $schemeName . '</option>';
    }
    
    // build the social media option output
    
    $sm = '';
    
    $social_count = count($theme_opts['social']);
    
    if ( $social_count ) :
    
        $select_opts = array(
            array('twitter', 'Twitter'),
            array('facebook', 'Facebook'),
            array('flickr', 'Flickr'),
            array('myspace', 'MySpace'),
            array('youtube', 'YouTube'),
            array('email', 'Email'),
            array('rss', 'RSS'),
            array('custom', 'Custom Button'),
        );
        $select_opts_count = count($select_opts);
        
        for( $i = 0; $i < $social_count; $i++ ) {
            $social = $theme_opts['social'][$i];
            
            $this_title = $social['title'];
            $this_image = $social['image'];
            $this_url = $social['url'];
            $this_custom = $social['custom'] ? 1 : 0;
            
            $opt_str = '';
            
            $this_select_slug = $this_custom ? 'custom' : $this_image;
            
            for ( $j = 0; $j < $select_opts_count; $j++ ) {
                $val = $select_opts[$j][0];
                $display = $select_opts[$j][1];
                
                $opt_str .= '<option value="' . $val . '"';
                if ( $val == $this_select_slug ) $opt_str .= ' selected="selected"';
                
                $opt_str .= '>' . $display . '</option>';
            }
            
            $custom_rss_url = ( $social['image'] == 'rss' && $social['url'] != 'feed' );
            
            $rss_opts = '<label>URL</label>
                <div class="regular-text">
                    <input class="social-rss-default" type="radio" ' . ( !$custom_rss_url ? 'checked ' : '' ) . ' name="social-fake-radio-' . $i . '" /> Default &nbsp;
                    <input class="social-rss-custom" type="radio" name="social-fake-radio-' . $i . '" ' . ( $custom_rss_url ? 'checked ' : '' ) . '/> Custom Feed
                </div>
                
                <label>&nbsp;</label><input class="regular-text social-rss-url" type="text" name="social_rss_url[]" ' . ( $custom_rss_url ? 'value="' . $this_url . '"' : 'disabled' ) . ' />';
            
            
            $sm .= <<<EOT
        
    <div class="social-button sb-$this_select_slug">
        <select class="social-select">
            $opt_str
        </select>
        
        <div class="social-custom-inputs">
            <label>Title</label><input class="regular-text social-title" type="text" name="social_title[]" value="$this_title" />
            <label>Image</label><input class="regular-text social-image" type="text" name="social_image[]" value="$this_image" />
            <span class="description">Dimension 32 x 32px</span>
        </div>
        
        <div class="social-rss-inputs">
            $rss_opts
        </div>
        
        <div class="social-url-inputs">
            <label>URL</label><input class="regular-text social-url" type="text" name="social_url[]" value="$this_url" />
        </div>
        
        <input class="social-custom" type="hidden" name="social_custom[]" value="$this_custom" />
        
        <br class="clear" />
        
        <a href="#" class="social-add-cta">+ Add</a>
        <a href="#" class="social-delete-cta">x Delete</a>
     </div>
        
EOT;
        }
    
    else :
        $sm .= '<a href="#" class="antisocial-cta">+ Add Social Media Button</a>';
    
    endif; // if $social_count
    
    // add social media display opts
    
    $sm .= '<strong>Display:</strong> ';
    
    $display_opts = array('image', 'both');
    
    for ( $i = 0; $i < 2; $i++ ) {
        $this_opt = $display_opts[$i];
        
        $sm .= '<input type="radio" class="input-radio" name="social_display" value="' . $this_opt . '" ' . ( $theme_opts['social_display'] == $this_opt ? ' checked="checked"' : '' ) . ' /> ';
        
        $sm .= !$i ? 'Image Only &nbsp;' : 'Image &amp; Text';
    }
    
    // define form values (for ones that can just use a string)
    
    $custom_favicon = stripslashes($theme_opts['favicon']);
    $exclude_pages = stripslashes($theme_opts['exclude_pages']);
    $tracking_code = stripslashes($theme_opts['tracking_code']);
    $social_off = $theme_opts['social_off'] ? ' checked="checked"' : '';
    $no_dropdown = $theme_opts['no_dropdown'] ? ' checked="checked"' : '';
    
    // build the page output
    $out = '';
    
    if ($ol_flash) $out .= '<div id="message"class="updated fade"><p>' . $ol_flash . '</p></div>';
    
    $out .= <<<EOT
    <div class="wrap nosubsub" id="theme-opts">
        <div id="icon-options-general" class="icon32"><br /></div>
        
        <h2>
        Theme Options
        </h2>
        
        <div>
        Theme settings by <a href="http://jonraasch.com" target="_blank">Jon Raasch</a>
        </div>
        
        <form action="" method="post" id="tbeme_form">
        <table class="form-table"><tbody>
            <tr valign="top">
                <th scope="row">
                    <label for="color-scheme">Color Scheme</label>
                </th>
                <td>
                    <select id="color-scheme" name="color_scheme">
                        $schemeOpts
                    </select>
                </td>
            </tr>
            
            <tr valign="top">
                <th scope="row">
                    <label for="custom-favicon">Custom Favicon</label>
                </th>
                <td>
                    <input type="text" class="regular-text" id="custom-favicon" value="$custom_favicon" name="favicon" />
                </td>
            </tr>
            
            <tr valign="top">
                <th scope="row">
                    <label for="exclude-pages">Exclude Pages in Menu</label>
                </th>
                <td>
                    <input type="text" class="regular-text" id="exclude-pages" value="$exclude_pages" name="exclude_pages" />
                    
                    <span class="description">
                    Enter a comma-separated list of page ID's (e.g. 2,4,16)
                    </span>
                    
                    <br />
                    
                    <input type="checkbox" name="no_dropdown" $no_dropdown /> No dropdown menu
                </td>
            </tr>
            
            <tr valign="top">
                <th scope="row">
                    <label for="social-media-buttons">Social Media Buttons</label>
                </th>
                <td>
                    
                    <div>
                        $sm
                    </div>
                    
                    <div>
                    <input id="social-media-buttons" type="checkbox" name="social_off" $social_off /> Turn Off Social Media Buttons
                    </div>
                </td>
            </tr>
            
            <tr valign="top">
                <th scope="row">
                    <label for="footer-tracking-code">Footer Tracking Code</label>
                </th>
                <td>
                    <textarea class="large-text code" id="footer-tracking-code" cols="50" rows="10" name="tracking_code">$tracking_code</textarea>
                    
                    <span class="description">
                    This code will be added to the footer before the &lt;/body&gt; closing tag
                    </span>
                </td>
            </tr>
            
            <tr valign="top">
                <th scope="row">&nbsp;</th>
                <td>
                    <div class="submit"><input type="submit" class="button-primary" value="Save Options" /> <a href="#" class="button" id="theme-opts-reset">Reset Options to Defaults</a></div>
                </td>
            </tr>
        </tbody></table>
        </form>
        
        <form action="" method="post" id="reset_form">
        <input type="hidden" name="reset_all_opts" value="true" />
        
        <input type="submit" style="display: none;" />
        </form>
    
    </div>
EOT;

    echo $out;
}

// css and js for the theme options
function theme_css_js() {
    $theme_dir = get_bloginfo('template_directory');
    ?>
    
    <link rel="stylesheet" type="text/css" href="<?=$theme_dir; ?>/theme-options/theme_options.css" />
    
    <script type="text/javascript" src="<?=$theme_dir; ?>/theme-options/theme_options.js"></script>
    
    <?php
}

if ( $_GET['page'] == 'theme-settings' ) add_action('admin_head', 'theme_css_js');

// init or reset options

function theme_init_opts() {
    $theme_opts['color_scheme'] = 'yellow';
    $theme_opts['favicon'] = '';
    $theme_opts['exclude_pages'] = '';
    $theme_opts['tracking_code'] = '';
    $theme_opts['social_display'] = 'both';
    $theme_opts['social_off'] = false;
    $theme_opts['no_dropdown'] = false;
    
    $theme_opts['social'] = array(
        array(
            'title' => 'RSS',
            'url'   => 'feed',
            'image' => 'rss',
            'custom' => 0,
        ),
    );
    
    update_option('theme_opts', $theme_opts);
    
    return $theme_opts;
}


// theme stuff

function theme_header() {
    $theme_opts = get_option('theme_opts');
    if ( !$theme_opts ) $theme_opts = theme_init_opts(); //set option defaults if non existent
    
    $custom_css = $theme_opts['color_scheme'] . '.css';
    $favicon = $theme_opts['favicon'];
    
    $theme_dir = get_bloginfo('stylesheet_directory');
    
    $out = '<link rel="stylesheet" href="' . $theme_dir . '/' . $custom_css . '" type="text/css" />';
    
    if ( $favicon ) $out .= <<<EOT
    <link rel="icon" href="$favicon" type="image/x-icon" />
    <link rel="shortcut icon" href="$favicon" type="image/x-icon" />
EOT;
    
    echo $out;
}

function theme_footer() {
    $theme_opts = get_option('theme_opts');
    
    echo $theme_opts['tracking_code'];
}

add_action('wp_head', 'theme_header');
add_action('wp_footer', 'theme_footer');