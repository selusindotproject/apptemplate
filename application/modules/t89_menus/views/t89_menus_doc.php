<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>T89_menus List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode</th>
		<th>Nama</th>
		
            </tr><?php
            foreach ($t89_menus_data as $t89_menus)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t89_menus->kode ?></td>
		      <td><?php echo $t89_menus->nama ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>