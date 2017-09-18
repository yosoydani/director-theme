<?php
add_action('admin_menu', 'wpdocs_register_my_custom_submenu_page');
 
function wpdocs_register_my_custom_submenu_page() {

    add_submenu_page(
      'themes.php', //  The slug name for the parent menu
      'Director Theme Options', // The text to be displayed in the title tags of the page when the menu is selected.
      'Director Options', // The text to be used for the menu.
      'administrator', // The capability required for this menu to be displayed to the user.
      "theme-options" , // The slug name to refer to this menu by (should be unique for this menu).
      'director_settings_page'); // The function to be called to output the content for this page.

      //call register settings function
    add_action( 'admin_init', 'director_register_settings' );

}
 

function director_register_settings() {
  //register our settings
  register_setting( 'director-settings-group', 'director_facebook' );
  register_setting( 'director-settings-group', 'director_twitter' );
  register_setting( 'director-settings-group', 'director_rss' );
  register_setting( 'director-settings-group', 'director_logo' );
  register_setting( 'director-settings-group', 'director_analytics' );
}

function director_settings_page() {

?>

<div class="wrap">
<h2>Director Theme Settings</h2>

<form id="landingOptions" method="post" action="options.php">
    <?php settings_fields( 'director-settings-group' ); 
    do_settings_sections( 'myoption-group' );?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Logo:</th>
        <td>
          <input type="text" name="director_logo" value="<?php print get_option('director_logo'); ?>" /><br/>
          *Upload using the Media Uploader and paste the URL here.
        </td>
        </tr>
        <tr valign="top">
        <th scope="row">Facebook Link:</th>
        <td>
          <input type="text" name="director_facebook" value="<?php print get_option('director_facebook'); ?>" />
        </td>
        </tr>
          <tr valign="top">
        <th scope="row">Twitter Link:</th>
        <td>
          <input type="text" name="director_twitter" value="<?php print get_option('director_twitter'); ?>" />
        </td>
    </tr>
    <tr>
    <th scope="row">Display RSS Icon:</th>
        <td>
          <input type="checkbox" name="director_rss" <?php if(get_option('director_rss') == true){ print "checked"; } ?>  />
        </td>
        </tr>
        <tr>
        <th scope="row">Google Analytics Code:</th>
        <td>
          <textarea name="director_analytics"><?php print get_option('director_analytics'); ?></textarea>
        </td>
        </tr>      
    </table>
    <?php submit_button(); ?>

</form>
</div>
<?php } 


?>