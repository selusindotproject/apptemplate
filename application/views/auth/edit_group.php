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
            <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">&nbsp;</label>
                <div class="col-sm-3">
                    <a href="#" onclick="showModal(<?php echo $this->uri->segment(3) ?>)">Access Rights</a>
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

<div class="modal fade" id="modal-show">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- <h4 class="modal-title">Default Modal</h4> -->
            </div>
            <div class="modal-body">

                <!-- <p>One fine body&hellip;</p> -->
                <div id="tampil_modal">
                    <!-- Data akan di tampilkan disini-->
                </div>

            </div>
            <div class="modal-footer">
            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">

    function showModal(id) {
        // var jurnalid = $(this).attr("jurnalid");
        $.ajax({
            url: '<?php echo base_url() ?>t90_groups_menus/update2/'+id,
            method: 'post',
            data: {id:id},
            success:function(data){
                $('#modal-show').modal("show");
                $('#tampil_modal').html(data);
                // document.getElementById("judul").innerHTML='Edit Data';
            }
        });
    }

</script>
