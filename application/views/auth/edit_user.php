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
                        <label class="col-sm-2 control-label" for="varchar"><?php echo lang('edit_user_fname_label', 'first_name');?> </label>
                        <div class="col-sm-3">
                            <!-- <input type="text" class="form-control" name="ip_address" id="ip_address" placeholder="Ip Address" value="<?php echo $ip_address; ?>" /> <?php echo form_error('ip_address') ?> -->
                            <?php echo form_input($first_name, '', 'class="form-control"');?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar"><?php echo lang('edit_user_lname_label', 'last_name');?> </label>
                        <div class="col-sm-3">
                            <!-- <input type="text" class="form-control" name="ip_address" id="ip_address" placeholder="Ip Address" value="<?php echo $ip_address; ?>" /> <?php echo form_error('ip_address') ?> -->
                            <?php echo form_input($last_name, '', 'class="form-control"');?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar"><?php echo lang('edit_user_company_label', 'company');?> </label>
                        <div class="col-sm-3">
                            <!-- <input type="text" class="form-control" name="ip_address" id="ip_address" placeholder="Ip Address" value="<?php echo $ip_address; ?>" /> <?php echo form_error('ip_address') ?> -->
                            <?php echo form_input($company, '', 'class="form-control"');?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar"><?php echo lang('edit_user_phone_label', 'phone');?> </label>
                        <div class="col-sm-3">
                            <!-- <input type="text" class="form-control" name="ip_address" id="ip_address" placeholder="Ip Address" value="<?php echo $ip_address; ?>" /> <?php echo form_error('ip_address') ?> -->
                            <?php echo form_input($phone, '', 'class="form-control"');?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar"><?php echo lang('edit_user_password_label', 'password');?> </label>
                        <div class="col-sm-3">
                            <!-- <input type="text" class="form-control" name="ip_address" id="ip_address" placeholder="Ip Address" value="<?php echo $ip_address; ?>" /> <?php echo form_error('ip_address') ?> -->
                            <?php echo form_input($password, '', 'class="form-control"');?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar"><?php echo lang('edit_user_password_confirm_label', 'password_confirm');?> </label>
                        <div class="col-sm-3">
                            <!-- <input type="text" class="form-control" name="ip_address" id="ip_address" placeholder="Ip Address" value="<?php echo $ip_address; ?>" /> <?php echo form_error('ip_address') ?> -->
                            <?php echo form_input($password_confirm, '', 'class="form-control"');?>
                        </div>
                    </div>

                    <?php if ($this->ion_auth->is_admin()): ?>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar"><?php echo lang('edit_user_groups_heading');?>: </label>
                        <div class="col-sm-3">
                            <!-- <input type="text" class="form-control" name="ip_address" id="ip_address" placeholder="Ip Address" value="<?php echo $ip_address; ?>" /> <?php echo form_error('ip_address') ?> -->
                            <!-- <?php echo form_input($password_confirm, '', 'class="form-control"');?> -->
                            <?php foreach ($groups as $group):?>
                                <!-- <label class="checkbox"> -->
                                <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>" <?php echo (in_array($group, $currentGroups)) ? 'checked="checked"' : null; ?>>
                                <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                                <br>
                                <!-- </label> -->
                            <?php endforeach?>
                        </div>
                    </div>

                    <?php endif ?>

                    <?php echo form_hidden('id', $user->id);?>
                    <?php echo form_hidden($csrf); ?>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <!-- <button type="submit" class="btn btn-primary"><?php echo $button ?></button> -->
                    <!-- <a href="<?php echo site_url('t85_users') ?>" class="btn btn-default">Batal</a> -->
                    <?php echo form_submit('submit', lang('edit_user_submit_btn'), 'class="btn btn-primary"');?>
                    <a href="<?php echo site_url('auth') ?>" class="btn btn-default">Batal</a>
                </div>

			<!-- </form> -->
            <?php echo form_close();?>
        </div>
    <!-- </body>
</html> -->
