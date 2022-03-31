<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e('New Address', 'crud-plugin');?></h1>
    <a href="<?php echo admin_url('admin.php?page=crud-plugin')?>" class="page-title-action">Back</a>

    <form action="" method="post">
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row">
                    <label for="name"><?php _e('Name', 'crud-plugin')?></label>
                </th>
                <td>
                    <input type="text" name="name" id="name" class="regular-text" value="">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for=Address"><?php _e('Address', 'crud-plugin')?></label>
                </th>
                <td>
                    <textarea name="address" id="address" class="regular-text"></textarea>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="phone"><?php _e('Phone', 'crud-plugin')?></label>
                </th>
                <td>
                    <input type="number" name="phone" id="phone" class="regular-text" value="">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="email"><?php _e('Email', 'crud-plugin')?></label>
                </th>
                <td>
                    <input type="text" name="email" id="email" class="regular-text" value="">
                </td>
            </tr>
            </tbody>
        </table>
        <?php wp_nonce_field('new-address')?>
        <?php submit_button(__('Add Address', 'crud-plugin'), 'primary', 'submit_address');?>
    </form>
</div>