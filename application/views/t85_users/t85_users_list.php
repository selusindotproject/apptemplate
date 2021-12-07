<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <style>
            .dataTables_wrapper {
                min-height: 500px
            }
            .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <!-- <h2 style="margin-top:0px">T85_users List</h2> -->
                <?php if ($hakAkses['tambah']) { ?>
                <?php echo anchor(site_url('t85_users/create'), 'Tambah', 'class="btn btn-primary"'); ?>
                <?php } ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <!-- <?php echo anchor(site_url('t85_users/create'), 'Tambah', 'class="btn btn-primary"'); ?> -->
				<?php echo anchor(site_url('t85_users/excel'), 'Excel', 'class="btn btn-primary"'); ?>
				<?php echo anchor(site_url('t85_users/word'), 'Word', 'class="btn btn-primary"'); ?>
		    </div>
        </div>
        <div class="box">
            <div class="box-body">
                <table id="mytable" class="table table-bordered table-hover display" style="width: 100%">
                    <style media="screen">
                        thead input {
                            width: 100%;
                        }
                    </style>
                    <thead>
                        <tr>
                            <th>No</th>
							<th>Ip Address</th>
							<th>Username</th>
							<th>Password</th>
							<th>Email</th>
							<th>Activation Selector</th>
							<th>Activation Code</th>
							<th>Forgotten Password Selector</th>
							<th>Forgotten Password Code</th>
							<th>Forgotten Password Time</th>
							<th>Remember Selector</th>
							<th>Remember Code</th>
							<th>Created On</th>
							<th>Last Login</th>
							<th>Active</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Company</th>
							<th>Phone</th>
							<th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>	
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").DataTable({
                    paging: true,
                    lengthChange: false,
                    ordering: true,
                    info: true,
                    autoWidth: true,
                    searching: false,
                    fixedHeader: true,
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                            .off('.DT')
                            .on('keyup.DT', function(e) {
                                if (e.keyCode == 13) {
                                    api.search(this.value).draw();
                                }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "t85_users/json", "type": "POST",
                        "data": function(data) {
                            data.ip_address = $('#ip_address').val();
                            data.username = $('#username').val();
                            data.password = $('#password').val();
                            data.email = $('#email').val();
                            data.activation_selector = $('#activation_selector').val();
                            data.activation_code = $('#activation_code').val();
                            data.forgotten_password_selector = $('#forgotten_password_selector').val();
                            data.forgotten_password_code = $('#forgotten_password_code').val();
                            data.forgotten_password_time = $('#forgotten_password_time').val();
                            data.remember_selector = $('#remember_selector').val();
                            data.remember_code = $('#remember_code').val();
                            data.created_on = $('#created_on').val();
                            data.last_login = $('#last_login').val();
                            data.active = $('#active').val();
                            data.first_name = $('#first_name').val();
                            data.last_name = $('#last_name').val();
                            data.company = $('#company').val();
                            data.phone = $('#phone').val();
                        }
                    },
                    columns: [
                        {
                            "data": "id",
                            "orderable": false
                        },
						{"data": "ip_address"},
						{"data": "username"},
						{"data": "password"},
						{"data": "email"},
						{"data": "activation_selector"},
						{"data": "activation_code"},
						{"data": "forgotten_password_selector"},
						{"data": "forgotten_password_code"},
						{"data": "forgotten_password_time"},
						{"data": "remember_selector"},
						{"data": "remember_code"},
						{"data": "created_on"},
						{"data": "last_login"},
						{"data": "active"},
						{"data": "first_name"},
						{"data": "last_name"},
						{"data": "company"},
						{"data": "phone"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[1, 'asc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });

                $('#mytable thead tr').clone(true).appendTo( '#mytable thead' );
                const aName = ['', 'ip_address', 'username', 'password', 'email', 'activation_selector', 'activation_code', 'forgotten_password_selector', 'forgotten_password_code', 'forgotten_password_time', 'remember_selector', 'remember_code', 'created_on', 'last_login', 'active', 'first_name', 'last_name', 'company', 'phone', ''];
                $('#mytable thead tr:eq(1) th').each( function (i) {
                    var title = $(this).text();
                    if (aName[i] == '') {
                        $(this).html( '&nbsp;' );
                    } else {
                        $(this).html( '<input type="text" placeholder="Search '+title+'" id="'+aName[i]+'" name="'+aName[i]+'" />' );
                        $( 'input', this ).on( 'keyup change', function () {
                            t.draw();
                        });
                    }
                });

            });
        </script>
    <!-- </body>
</html> -->