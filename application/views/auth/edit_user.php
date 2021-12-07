<!-- Default box -->
<div class="box">

    <div class="box-header with-border">
        <h3 class="box-title"><?php echo lang('edit_user_heading');?></h3>
        <p><?php echo lang('edit_user_subheading');?></p>
        <div id="infoMessage"><?php echo $message;?></div>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i>
            </button>
        </div>
    </div>

    <?php echo form_open(uri_string());?>

    <div class="box-body">
        <!-- Start creating your amazing application! -->

        <div class="row form-group">
            <?php echo lang('edit_user_fname_label', 'first_name', 'class="col-sm-2 control-label"');?>
            <div class="col-sm-3">
                <?php echo form_input($first_name, '', 'class="form-control"');?>
            </div>
        </div>

        <div class="row form-group">
            <?php echo lang('edit_user_lname_label', 'last_name', 'class="col-sm-2 control-label"');?>
            <div class="col-sm-3">
                <?php echo form_input($last_name, '', 'class="form-control"');?>
            </div>
        </div>



        <p>
              <?php echo lang('edit_user_company_label', 'company');?> <br />
              <?php echo form_input($company);?>
        </p>

        <p>
              <?php echo lang('edit_user_phone_label', 'phone');?> <br />
              <?php echo form_input($phone);?>
        </p>

        <p>
              <?php echo lang('edit_user_password_label', 'password');?> <br />
              <?php echo form_input($password);?>
        </p>

        <p>
              <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
              <?php echo form_input($password_confirm);?>
        </p>

        <?php if ($this->ion_auth->is_admin()): ?>

            <h3><?php echo lang('edit_user_groups_heading');?></h3>
            <?php foreach ($groups as $group):?>
                <label class="checkbox">
                <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>" <?php echo (in_array($group, $currentGroups)) ? 'checked="checked"' : null; ?>>
                <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                </label>
            <?php endforeach?>

        <?php endif ?>

        <?php echo form_hidden('id', $user->id);?>
        <?php echo form_hidden($csrf); ?>

        <p><?php echo form_submit('submit', lang('edit_user_submit_btn'));?></p>

    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <!-- Footer -->
    </div>
    <!-- /.box-footer-->

    <?php echo form_close();?>

</div>
<!-- /.box -->

<h1><?php echo lang('edit_user_heading');?></h1>
<p><?php echo lang('edit_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string());?>

      <p>
            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </p>

      <p>
            <?php echo lang('edit_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </p>

      <p>
            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </p>

      <p>
            <?php echo lang('edit_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
            <?php echo form_input($password_confirm);?>
      </p>

      <?php if ($this->ion_auth->is_admin()): ?>

          <h3><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
              <label class="checkbox">
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>" <?php echo (in_array($group, $currentGroups)) ? 'checked="checked"' : null; ?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
          <?php endforeach?>

      <?php endif ?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

      <p><?php echo form_submit('submit', lang('edit_user_submit_btn'));?></p>

<?php echo form_close();?>
