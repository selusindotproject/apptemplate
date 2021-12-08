<?php




function numDB($value)
{
    // $value = substr($value, 4); // mengambil hanya angka, tanpa mengambil 'Rp.'
    $value = str_replace('.','', $value); // menghilangkan titik
	$value = str_replace(',','.', $value); // mengganti koma dengan titik
    return $value;
}




/**
 * mengubah format tanggal
 * menjadi format dd-mm-yyyy
 */
function dateIndo($value)
{
    return date_format(date_create($value), 'd-m-Y');
}




/**
 * mengubah format tanggal
 * menjadi format yyyy-mm-dd
 */
function dateMysql($value)
{
    return date('Y-m-d', strtotime(str_replace('/', '-', $value)));
}




/**
 * create hak akses for new groups
 */
function createHakAkses($idgroups)
{
    // set variable $this
    $ci =& get_instance();

    /**
     * collect data menus
     */
    $q = "select * from " . TABLE_MENU . " where nama <> '#'";
    $dataMenu = $ci->db->query($q)->result();

    foreach($dataMenu as $row) {
        $data = array(
            'idgroups' => $idgroups,
            'idmenus' => $row->id,
            'rights' => 0,
        );
        $ci->db->insert(TABLE_HAKAKSES, $data);
    }
}




/**
 * get hak akses berdasarkan idusers = user_id dan idmenus
 */
function getHakAkses($modulName)
{
    // set variable $this
    $ci =& get_instance();

    // ambil nilai id menu dari tabel master menu
    $ci->db->where('kode', $modulName);
    $idMenus = $ci->db->get('t89_menus')->row()->id;

    // ambil nilai id groups sesuai user yang login
    $idGroups = $ci->ion_auth->get_users_groups()->row()->id;

    // ambil nilai hak akses
    $ci->db->where('idgroups', $idGroups);
    $ci->db->where('idmenus', $idMenus);
    $row = $ci->db->get('t90_groups_menus')->row();
    $hakAkses = array('tambah' => false, 'ubah' => false, 'hapus' => false, 'laporan' => false);

    // tentukan hak akses
    if ($row) {
        // nilai rights digit pertama
        switch (substr($row->rights, 0, 1)) {
            case 1:
                $hakAkses = array('tambah' => true, 'ubah' => false, 'hapus' => false);
                break;
            case 2:
                $hakAkses = array('tambah' => false, 'ubah' => true, 'hapus' => false);
                break;
            case 3:
                $hakAkses = array('tambah' => true, 'ubah' => true, 'hapus' => false);
                break;
            case 4:
                $hakAkses = array('tambah' => false, 'ubah' => false, 'hapus' => true);
                break;
            case 5:
                $hakAkses = array('tambah' => true, 'ubah' => false, 'hapus' => true);
                break;
            case 6:
                $hakAkses = array('tambah' => false, 'ubah' => true, 'hapus' => true);
                break;
            case 7:
                $hakAkses = array('tambah' => true, 'ubah' => true, 'hapus' => true);
                break;
        }

        // nilai rights digit kedua
        switch (substr($row->rights, 1, 1)) {
            case 1:
                $hakAkses['laporan'] = true;
                break;
        }
    }
    return $hakAkses;
}
