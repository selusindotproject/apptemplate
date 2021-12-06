<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo 'Edit' ?></h3>
    </div>
    <!-- <form action="<?php echo $action; ?>" method="post" class="form-horizontal"> -->
    <?php //echo form_open(uri_string(), 'class="form-horizontal"');?>
    <?php echo form_open(current_url(), 'class="form-horizontal"');?>
        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar"><?php echo lang('edit_group_name_label', 'group_name');?></label>
                <div class="col-sm-3">
                    <?php echo form_input($group_name, '', 'class="form-control"');?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar"><?php echo lang('edit_group_desc_label', 'description');?></label>
                <div class="col-sm-3">
                    <?php echo form_input($group_description, '', 'class="form-control"');?>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <?php echo form_submit('submit', lang('edit_group_submit_btn'), 'class="btn btn-primary"');?>
            <a href="<?php echo site_url('auth') ?>" class="btn btn-default">Cancel</a>
        </div>

    <?php echo form_close();?>
</div>
