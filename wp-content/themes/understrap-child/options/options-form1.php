<?php
// create custom plugin settings menu
add_action('admin_menu', 'note91_setting_theme');

function note91_setting_theme() {

	//create new top-level menu
	add_menu_page('note91 Theme Option', 'Thông số kỹ thuật 1', 'administrator', 'note91_options', 'note91_settings_page','dashicons-info');
	
	//call register settings function
	add_action( 'admin_init', 'register_note91settings' );
}


function register_note91settings() {
	//register our settings
	register_setting( 'note91-settings-group', 'note91_setting_theme' );
	register_setting( 'note91-settings-group', 'some_other_option' );
	register_setting( 'note91-settings-group', 'option_etc' );
}

function note91_settings_page() {
	$options = get_option( 'note91_setting_theme' );
?>
<div class="wrap">
    <h2>Thông số kỹ thuật</h2>
    <form method="post" action="options.php">
        <fieldset class="form-note91-options"style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px; padding: 10px 20px;">
            <legend style="margin-left:5px; padding:0 5px; color:#2481C6;text-transform:uppercase;"><strong>Form Thông số kỹ thuật 1</strong></legend>
            <?php settings_fields( 'note91-settings-group' ); ?>
            <?php do_settings_sections( 'note91-settings-group' ); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Tên sản phẩm</th>
                    <td><input type="text" size="80" name="note91_setting_theme[note91_name_product]" value="<?php echo $options['note91_name_product']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Màn hình</th>
                    <td><input type="text" size="80" name="note91_setting_theme[note91_man_hinh]" value="<?php echo $options['note91_man_hinh']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Hệ điều hành</th>
                    <td><input type="text" size="80" name="note91_setting_theme[note91_he_dieu_hanh]" value="<?php echo $options['note91_he_dieu_hanh']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Camera sau</th>
                    <td><input type="text" size="80" name="note91_setting_theme[note91_camera_sau]" value="<?php echo $options['note91_camera_sau']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Camera trước</th>
                    <td><input type="text" size="80" name="note91_setting_theme[note91_camera_truoc]" value="<?php echo $options['note91_camera_truoc']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">CPU</th>
                    <td><input type="text" size="80" name="note91_setting_theme[note91_cpu]" value="<?php echo $options['note91_cpu']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">RAM</th>
                    <td><input type="text" size="80" name="note91_setting_theme[note91_ram]" value="<?php echo $options['note91_ram']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Bộ nhớ trong</th>
                    <td><input type="text" size="80" name="note91_setting_theme[note91_bo_nho_trong]" value="<?php echo $options['note91_bo_nho_trong']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Thẻ nhớ</th>
                    <td><input type="text" size="80" name="note91_setting_theme[note91_the_nho]" value="<?php echo $options['note91_the_nho']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Thẻ SIM</th>
                    <td><input type="text" size="80" name="note91_setting_theme[note91_the_sim]" value="<?php echo $options['note91_the_sim']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Dung lượng pin</th>
                    <td><input type="text" size="80" name="note91_setting_theme[note91_dung_luong_pin]" value="<?php echo $options['note91_dung_luong_pin']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Màu sắc</th>
                    <td><input type="text" size="80" name="note91_setting_theme[note91_mau_sac]" value="<?php echo $options['note91_mau_sac']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Bộ sản phẩm gồm</th>
                    <td><input type="text" size="80" name="note91_setting_theme[note91_phu_kien]" value="<?php echo $options['note91_phu_kien']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Bảo hành</th>
                    <td><textarea  type="text" size="80" name="note91_setting_theme[note91_bao_hanh]" ><?php if(!empty($options['note91_bao_hanh'])) {echo $options['note91_bao_hanh'];}  ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Đặc điểm nổi bật</th>
                    <td><textarea  type="text" size="80" name="note91_setting_theme[note91_noi_bat]" ><?php if(!empty($options['note91_noi_bat'])) {echo $options['note91_noi_bat'];}  ?></textarea></td>
                </tr>
                <tr valign="top">
                    <th scope="row" style="color:rgba(12,53,117,1)">Giá chưa giảm</th>
                    <td><input type="number" size="80" name="note91_setting_theme[note91_price]" value="<?php echo $options['note91_price']; ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row" style="color:red">Giá sản phẩm</th>
                    <td><input type="number" size="80" name="note91_setting_theme[note91_price_sale]" value="<?php echo $options['note91_price_sale']; ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </fieldset>
    </form>
</div>
<?php } ?>
<?php 

if(!function_exists('sale_product')){
    function sale_product(){
        $options = get_option( 'note91_setting_theme' );
        if (isset($options['note91_price_sale']) && isset($options['note91_price'])){ 
            $price = $options['note91_price'];
            $sale = $options['note91_price_sale'];
            $percentageSale = round(100- ($sale /$price) *100) . '%';
            return $percentageSale;
        }
    }
    add_shortcode('PERCENTAGE', 'sale_product');
}

?>