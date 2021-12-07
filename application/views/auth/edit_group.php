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
            <?php echo form_open(current_url(), 'class="form-horizontal"');?>
                <div class="box-body">

					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar"><?php echo lang('edit_group_name_label', 'group_name');?> </label>
                        <div class="col-sm-3">
                            <!-- <input type="text" class="form-control" name="ip_address" id="ip_address" placeholder="Ip Address" value="<?php echo $ip_address; ?>" /> <?php echo form_error('ip_address') ?> -->
                            <?php echo form_input($group_name, '', 'class="form-control"');?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar"><?php echo lang('edit_group_desc_label', 'description');?> </label>
                        <div class="col-sm-3">
                            <!-- <input type="text" class="form-control" name="ip_address" id="ip_address" placeholder="Ip Address" value="<?php echo $ip_address; ?>" /> <?php echo form_error('ip_address') ?> -->
                            <?php echo form_input($group_description, '', 'class="form-control"');?>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <!-- <button type="submit" class="btn btn-primary"><?php echo $button ?></button> -->
                    <!-- <a href="<?php echo site_url('t85_users') ?>" class="btn btn-default">Batal</a> -->
                    <?php echo form_submit('submit', lang('edit_group_submit_btn'), 'class="btn btn-primary"');?>
                    <a href="<?php echo site_url('auth') ?>" class="btn btn-default">Batal</a>
                </div>

			<!-- </form> -->
            <?php echo form_close();?>
        </div>
    <!-- </body>
</html> -->
