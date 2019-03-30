<?php
// create custom plugin settings menu
add_action('admin_menu', 'note92_setting_theme');

function note92_setting_theme() {

	//create new top-level menu
	add_menu_page('note92 Theme Option', 'Thông số kỹ thuật 2', 'administrator', 'note92_options', 'note92_settings_page','dashicons-info');
	
	//call register settings function
	add_action( 'admin_init', 'register_note92settings' );
}


function register_note92settings() {
	//register our settings
	register_setting( 'note92-settings-group', 'note92_setting_theme' );
	register_setting( 'note92-settings-group', 'some_other_option' );
	register_setting( 'note92-settings-group', 'option_etc' );
}

function note92_settings_page() {
	$options = get_option( 'note92_setting_theme' );
?>
<div class="wrap">
    <h2>Thông số kỹ thuật</h2>
    <form method="post" action="options.php">
        <fieldset class="form-note92-options"style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px; padding: 10px 20px;">
            <legend style="margin-left:5px; padding:0 5px; color:#2481C6;text-transform:uppercase;"><strong>Form Thông số kỹ thuật 2</strong></legend>
            <?php settings_fields( 'note92-settings-group' ); ?>
            <?php do_settings_sections( 'note92-settings-group' ); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Màn hình</th>
                    <td><input type="text" size="80" name="note92_setting_theme[note92_man_hinh]" value="<?php echo $options['note92_man_hinh']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Hệ điều hành</th>
                    <td><input type="text" size="80" name="note92_setting_theme[note92_he_dieu_hanh]" value="<?php echo $options['note92_he_dieu_hanh']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Camera sau</th>
                    <td><input type="text" size="80" name="note92_setting_theme[note92_camera_sau]" value="<?php echo $options['note92_camera_sau']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Camera trước</th>
                    <td><input type="text" size="80" name="note92_setting_theme[note92_camera_truoc]" value="<?php echo $options['note92_camera_truoc']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">CPU</th>
                    <td><input type="text" size="80" name="note92_setting_theme[note92_cpu]" value="<?php echo $options['note92_cpu']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">RAM</th>
                    <td><input type="text" size="80" name="note92_setting_theme[note92_ram]" value="<?php echo $options['note92_ram']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Bộ nhớ trong</th>
                    <td><input type="text" size="80" name="note92_setting_theme[note92_bo_nho_trong]" value="<?php echo $options['note92_bo_nho_trong']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Thẻ nhớ</th>
                    <td><input type="text" size="80" name="note92_setting_theme[note92_the_nho]" value="<?php echo $options['note92_the_nho']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Thẻ SIM</th>
                    <td><input type="text" size="80" name="note92_setting_theme[note92_the_sim]" value="<?php echo $options['note92_the_sim']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Dung lượng pin</th>
                    <td><input type="text" size="80" name="note92_setting_theme[note92_dung_luong_pin]" value="<?php echo $options['note92_dung_luong_pin']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Màu sắc</th>
                    <td><input type="text" size="80" name="note92_setting_theme[note92_mau_sac]" value="<?php echo $options['note92_mau_sac']; ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </fieldset>
    </form>
</div>
<?php } ?>