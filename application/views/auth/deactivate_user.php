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
                <!-- <div id="infoMessage"><?php echo $message;?></div> -->
            </div>
            <!-- <form action="<?php echo $action; ?>" method="post" class="form-horizontal"> -->
            <?php echo form_open("auth/deactivate/".$user->id, 'class="form-horizontal"');?>
                <div class="box-body">

                    <p><?php echo sprintf(lang('deactivate_subheading'), $user->{$identity}); ?></p>

                    <p>
                    	<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
                        <input type="radio" name="confirm" value="yes" checked="checked" />
                        <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
                        <input type="radio" name="confirm" value="no" />
                    </p>

                    <?php echo form_hidden($csrf); ?>
                    <?php echo form_hidden(['id' => $user->id]); ?>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <!-- <button type="submit" class="btn btn-primary"><?php echo $button ?></button> -->
                    <!-- <a href="<?php echo site_url('t85_users') ?>" class="btn btn-default">Batal</a> -->
                    <?php echo form_submit('submit', lang('deactivate_submit_btn'), 'class="btn btn-primary"');?>
                    <a href="<?php echo site_url('auth') ?>" class="btn btn-default">Batal</a>
                </div>

			<!-- </form> -->
            <?php echo form_close();?>
        </div>
    <!-- </body>
</html> -->
