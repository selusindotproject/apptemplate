<!-- Default box -->
<div class="box">
    <div class="box-header with-border">
		<h3 class="box-title">
			<!-- Title -->
			<?php echo lang('index_heading');?>
		</h3>
		<p><?php echo lang('index_subheading');?></p>
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

	<div class="box-body">
		<!-- Start creating your amazing application! -->
		<div class="box-body">
			<table id="mytable" class="table table-bordered table-hover display" style="width: 100%">
				<style media="screen">
					thead input {
						width: 100%;
					}
				</style>
				<thead>
					<tr>
						<th><?php echo lang('index_fname_th');?></th>
						<th><?php echo lang('index_lname_th');?></th>
						<th><?php echo lang('index_email_th');?></th>
						<th><?php echo lang('index_groups_th');?></th>
						<th><?php echo lang('index_status_th');?></th>
						<th><?php echo lang('index_action_th');?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $user):?>
						<tr>
				            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
				            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
				            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
							<td>
								<?php foreach ($user->groups as $group):?>
									<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
				                <?php endforeach?>
							</td>
							<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
							<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
    </div>
    <!-- /.box-body -->

	<div class="box-footer">
		<!-- Footer -->
		<p><?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?></p>
    </div>
    <!-- /.box-footer-->

</div>
<!-- /.box -->
