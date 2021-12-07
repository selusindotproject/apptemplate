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
                <h3 class="box-title"><?php echo $this->uri->segment(2) == 'create' ? 'Tambah' : 'Ubah' ?></h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
                <div class="box-body">
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Ip Address </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="ip_address" id="ip_address" placeholder="Ip Address" value="<?php echo $ip_address; ?>" /> <?php echo form_error('ip_address') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Username </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" /> <?php echo form_error('username') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Password </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" /> <?php echo form_error('password') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Email </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /> <?php echo form_error('email') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Activation Selector </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="activation_selector" id="activation_selector" placeholder="Activation Selector" value="<?php echo $activation_selector; ?>" /> <?php echo form_error('activation_selector') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Activation Code </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="activation_code" id="activation_code" placeholder="Activation Code" value="<?php echo $activation_code; ?>" /> <?php echo form_error('activation_code') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Forgotten Password Selector </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="forgotten_password_selector" id="forgotten_password_selector" placeholder="Forgotten Password Selector" value="<?php echo $forgotten_password_selector; ?>" /> <?php echo form_error('forgotten_password_selector') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Forgotten Password Code </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="forgotten_password_code" id="forgotten_password_code" placeholder="Forgotten Password Code" value="<?php echo $forgotten_password_code; ?>" /> <?php echo form_error('forgotten_password_code') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="int">Forgotten Password Time </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="forgotten_password_time" id="forgotten_password_time" placeholder="Forgotten Password Time" value="<?php echo $forgotten_password_time; ?>" /> <?php echo form_error('forgotten_password_time') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Remember Selector </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="remember_selector" id="remember_selector" placeholder="Remember Selector" value="<?php echo $remember_selector; ?>" /> <?php echo form_error('remember_selector') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Remember Code </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="remember_code" id="remember_code" placeholder="Remember Code" value="<?php echo $remember_code; ?>" /> <?php echo form_error('remember_code') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="int">Created On </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="created_on" id="created_on" placeholder="Created On" value="<?php echo $created_on; ?>" /> <?php echo form_error('created_on') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="int">Last Login </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="last_login" id="last_login" placeholder="Last Login" value="<?php echo $last_login; ?>" /> <?php echo form_error('last_login') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="tinyint">Active </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="active" id="active" placeholder="Active" value="<?php echo $active; ?>" /> <?php echo form_error('active') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">First Name </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>" /> <?php echo form_error('first_name') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Last Name </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>" /> <?php echo form_error('last_name') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Company </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="company" id="company" placeholder="Company" value="<?php echo $company; ?>" /> <?php echo form_error('company') ?>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-2 control-label" for="varchar">Phone </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" /> <?php echo form_error('phone') ?>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('t85_users') ?>" class="btn btn-default">Batal</a>
                </div>

				<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
			</form>
        </div>
    <!-- </body>
</html> -->