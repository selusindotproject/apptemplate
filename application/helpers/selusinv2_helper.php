<?php




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
