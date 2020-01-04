<?php if ( ! defined('BASEPATH')) exits('No direct script access allowed');

class Anggota extends OperatorController{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('fungsi');
        $this->load->model('anggota_m');
    }
    
    public function index(){
        $this->data['judul_browser'] = 'Anggota';
        $this->data['judul_utama'] = 'Data';
        $this->data['judul_sub'] = 'Anggota';
        
        $this->data['css_files'][] = base_url() . 'assets/component/easyui/themes/default/easyui.css';
        $this->data['css_files'][] = base_url() . 'assets/component/easyui/themes/icon.css';
       
        $this->data['js_files'][] = base_url() . 'assets/component/easyui/jquery.easyui.min.js';
        
        $this->data['css_files'][] = base_url() . 'assets/component/extra/bootstrap_date_time/css/bootstrap-datetimepicker.min.css';
		$this->data['js_files'][] = base_url() . 'assets/component/extra/bootstrap_date_time/js/bootstrap-datetimepicker.min.js';
		$this->data['js_files'][] = base_url() . 'assets/component/extra/bootstrap_date_time/js/locales/bootstrap-datetimepicker.id.js';
		
        
		#include daterange
		$this->data['css_files'][] = base_url() . 'assets/component/theme_admin/css/daterangepicker/daterangepicker-bs3.css';
		$this->data['js_files'][] = base_url() . 'assets/component/theme_admin/js/plugins/daterangepicker/daterangepicker.js';

		//number_format
		$this->data['js_files'][] = base_url() . 'assets/component/extra/fungsi/number_format.js';

        $this->data['isi'] = $this->load->view('master-data/anggota_page',$this->data,TRUE);
        $this->load->view('layout/home_page',$this->data);
    }
    
    function ajax_list(){
        /* Default request pagar params dari jeasyUI */
        $offset = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $limit = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
        $sort = isset($_POST['sort']) ? $_POST['sort'] : 'tgl_daftar';
        $order = isset($_POST['order']) ? $_POST['order'] : 'desc';
        
        $kode_anggota = isset($_POST['kode_anggota']) ? $_POST['kode_anggota'] : '';
        $cari_status = isset($_POST['cari_status']) ? $_POST['cari_status'] : '';
        $cari_nama = isset($_POST['cari_nama']) ? $_POST['cari_nama'] : '';
        $tgl_dari = isset($_POST['tgl_dari']) ? $_POST['tgl_dari'] : '';
        $tgl_sampai = isset($_POST['tgl_sampai']) ? $_POST['tgl_sampai'] : '';
        $search = array('kode_anggota' => $kode_anggota,
                        'cari_status' => $cari_status,
                        'cari_nama' => $cari_nama,
                        'tgl_dari' => $tgl_dari,
                        'tgl_sampai' => $tgl_sampai);
        
        $offset = ($offset-1) * $limit;
        $data   = $this->anggota_m->get_data_anggota_ajax($offset, $limit, $search, $sort, $order);
        $i      = 0;
        $rows   = array();
        foreach ($data['data'] as $r) {
            $txt_tgl_lahir = my_date_show($r->tgl_lahir);
            $txt_tgl_masuk = my_date_show($r->tgl_daftar);
            $jenis_jk = '';
            if($r->jk == 'L'){
                $jenis_jk = 'Laki-Laki';
            }else
            {
                $jenis_jk = 'Perempuan';
            }
            $sts_aktif = '';
            if($r->aktif == 'Y'){
                $sts_aktif = 'Aktif';
            }else
            {
                $sts_aktif = 'Inactive';
            }
                    
            
            $rows[$i]['id'] = $r->id;
            $rows[$i]['id_anggota_txt'] = 'AG - ' . sprintf('%05d', $r->id) . '';
            $rows[$i]['nm_anggota'] = $r->nama;
            $rows[$i]['nm_anggota_txt'] = $r->nama;
            $rows[$i]['identitas'] = '<table>
                        <tr>
                            <td width="100px" align="left">Nomor KTP</td>
                            <td width="10px" align="center">:</td>
                            <td width="75px" align="center">'.$r->nomor_ktp.'</td>
                        </tr>
                        <tr>
                            <td width="100px" align="left">Tempat Lahir</td>
                            <td width="10px" align="center">:</td>
                            <td width="75px" align="left">'.$r->tmp_lahir.'</td>
                        </tr>
                        <tr>
                            <td width="100px" align="left">Tanggal Lahir</td>
                            <td width="10px" align="center">:</td>
                            <td width="75px" align="left">'.$txt_tgl_lahir.'</td>
                        </tr>
                        <tr>
                            <td width="100px" align="left">Jenis Kelamin</td>
                            <td width="10px" align="center">:</td>
                            <td width="75px" align="left">'.$jenis_jk.'</td>
                        </tr>
                        <tr>
                            <td width="100px" align="left">Status Perkawinan</td>
                            <td width="10px" align="center">:</td>
                            <td width="75px" align="left">'.$r->status.'</td>
                        </tr>
                        
                        <tr>
                            <td width="100px" align="left">Agama</td>
                            <td width="10px" align="center">:</td>
                            <td width="75px" align="left">'.$r->agama.'</td>
                        </tr>
                        <tr>
                            <td width="100px" align="left">Pekerjaan</td>
                            <td width="10px" align="center">:</td>
                            <td width="75px" align="left">'.$r->pekerjaan.'</td>
                        </tr>
                        </table>';
            
            $rows[$i]['alamat'] = '<table>
                        <tr>
                            <td width="100px" align="left">Address</td>
                            <td width="5px" align="center">:</td>
                            <td width="75px" align="left">'.$r->alamat.'</td>
                        </tr>
                        <tr>
                            <td width="100px" align="left">Kecamatan</td>
                            <td width="5px" align="center">:</td>
                            <td width="75px" align="left">'.$r->kec.'</td>
                        </tr>
                        <tr>
                            <td width="100px" align="left">Kelurahan</td>
                            <td width="5px" align="center">:</td>
                            <td width="75px" align="left">'.$r->kel.'</td>
                        </tr>
                        <tr>
                            <td width="100px" align="left">Lingkungan</td>
                            <td width="5px" align="center">:</td>
                            <td width="75px" align="left">'.$r->lingk.'</td>
                        </tr>
                        <tr>
                            <td width="100px" align="left">No Handphone</td>
                            <td width="5px" align="center">:</td>
                            <td width="75px" align="left">'.$r->nohp.'</td>
                        </tr>
                        </table>';
                $rows[$i]['berkas'] = '<table>
                        <tr>
                            <td width="autp" align="left">Masuk</td>
                            <td width="auto" align="center">:</td>
                            <td width="auto" align="left">'.$txt_tgl_masuk.'</td>
                        </tr>
                        <tr>
                            <td width="autp" align="left">Kategori</td>
                            <td width="auto" align="center">:</td>
                            <td width="auto" align="left">'.$r->kateg_id.'</td>
                        </tr>
                        <tr>
                            <td width="autp" align="left">Jaminan</td>
                            <td width="auto" align="center">:</td>
                            <td width="auto" align="left">'.$r->jaminan_id.'</td>
                        </tr>
                         <tr>
                            <td width="autp" align="left">Status</td>
                            <td width="auto" align="center">:</td>
                            <td width="auto" align="left">'.$sts_aktif.'</td>
                        </tr>
                        </table>';
               
                $i++;
        }
        $result = array('total' => $data['count'],'rows' => $rows);
        echo json_encode($result);
    }
    
    public function create(){
        if(!isset($_POST)){
            show_404();
        }
        
        if($this->anggota_m->create()){
			echo json_encode(array('ok' => true, 'msg' => '<div class="text-green"><i class="fa fa-check"></i> Data berhasil disimpan </div>'));
		} else {
			echo json_encode(array('ok' => false, 'msg' => '<div class="text-red"><i class="fa fa-ban"></i> Gagal menyimpan data, pastikan nilai lebih dari <strong>0 (NOL)</strong>. </div>'));
		}
    }
    
}