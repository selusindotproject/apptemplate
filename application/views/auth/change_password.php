<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T85_users <?php echo $button ?></h2> -->
        <div class="box box-info">
            <div class="box-header with-border">
                <!-- <h3 class="box-title"><?php echo $this->uri->segment(2) == 'create' ? 'Tambah' : 'Ubah' ?></h3> -->
                <div id="infoMessage"><?php echo $message;?></div>
            </div>
            <!-- <form action="<?php echo $action; ?>" method="post" class="form-horizontal"> -->
            <?php echo form_open(uri_string(), 'class="form-horizontal"');?>
                <div class="box-body">

					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar"><?php echo lang('change_password_old_password_label', 'old_password');?> </label>
                        <div class="col-sm-3">
                            <!-- <input type="text" class="form-control" name="ip_address" id="ip_address" placeholder="Ip Address" value="<?php echo $ip_address; ?>" /> <?php echo form_error('ip_address') ?> -->
                            <?php echo form_input($old_password, '', 'class="form-control"');?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label>
                        <div class="col-sm-3">
                            <!-- <input type="text" class="form-control" name="ip_address" id="ip_address" placeholder="Ip Address" value="<?php echo $ip_address; ?>" /> <?php echo form_error('ip_address') ?> -->
                            <?php echo form_input($new_password, '', 'class="form-control"');?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar"><?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> </label>
                        <div class="col-sm-3">
                            <!-- <input type="text" class="form-control" name="ip_address" id="ip_address" placeholder="Ip Address" value="<?php echo $ip_address; ?>" /> <?php echo form_error('ip_address') ?> -->
                            <?php echo form_input($new_password_confirm, '', 'class="form-control"');?>
                        </div>
                    </div>

                    <?php echo form_input($user_id);?>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <!-- <button type="submit" class="btn btn-primary"><?php echo $button ?></button> -->
                    <!-- <a href="<?php echo site_url('t85_users') ?>" class="btn btn-default">Batal</a> -->
                    <?php echo form_submit('submit', lang('change_password_submit_btn'), 'class="btn btn-primary"');?>
                    <a href="<?php echo site_url() ?>" class="btn btn-default">Batal</a>
                </div>

			<!-- </form> -->
            <?php echo form_close();?>
        </div>
    <!-- </body>
</html> -->
