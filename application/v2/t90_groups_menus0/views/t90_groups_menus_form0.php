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
        <h2 style="margin-top:0px">T90_groups_menus <?php echo $button ?></h2> -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $this->uri->segment(2) == 'create' ? 'Tambah' : 'Ubah' ?></h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
                <div class="box-body">
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="mediumint">Idgroups </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="idgroups" id="idgroups" placeholder="Idgroups" value="<?php echo $idgroups; ?>" /> <?php echo form_error('idgroups') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="int">Idmenus </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="idmenus" id="idmenus" placeholder="Idmenus" value="<?php echo $idmenus; ?>" /> <?php echo form_error('idmenus') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="int">Rights </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="rights" id="rights" placeholder="Rights" value="<?php echo $rights; ?>" /> <?php echo form_error('rights') ?>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('t90_groups_menus') ?>" class="btn btn-default">Batal</a>
                </div>

				<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
			</form>
        </div>
    <!-- </body>
</html> -->