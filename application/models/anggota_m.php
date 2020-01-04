<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anggota_m extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    function get_data_anggota_ajax($offset, $limit, $q='', $sort, $order) {
        $sql = "SELECT * FROM tbl_anggota ";
        $where = " WHERE aktif = 'Y' OR aktif = 'N' ";
        if(is_array($q)) {
             if($q['kode_anggota'] != '') {
                    $q['kode_anggota'] = str_replace('AG','',$q['kode_anggota']);
                    $q['kode_anggota'] = $q['kode_anggota'] * 1;
                    $where .=" AND id LIKE '%".$q['kode_anggota']."%' OR id_anggota LIKE '%".$q['kode_anggota']."%' ";
                } else {
                    if($q['cari_nama'] != '') {
                        $where .=" AND tbl_anggota.nama LIKE '%".$q['cari_nama']."%' ";
                    }
                    if($q['cari_status'] != ''){
                        $where .=" AND aktif LIKE '%".$q['cari_status']."%' ";
                    }
                    if($q['tgl_dari'] != '' && $q['tgl_sampai'] != '') {
                        $where .=" AND DATE(tgl_daftar) >= '".$q['tgl_dari']."' ";
                        $where .=" AND DATE(tgl_daftar) <= '".$q['tgl_sampai']."' ";
                    }
                }
            }
        $sql .= $where;
        $result['count'] = $this->db->query($sql)->num_rows();
        $sql .= " ORDER BY {$sort} {$order} ";
        $sql .= " LIMIT {$offset},{$limit} ";
        $result['data'] = $this->db->query($sql)->result();
        return $result;
    }
}
