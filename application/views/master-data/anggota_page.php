<style type="text/css">
td, div {
	font-family: "Verdana","​Helvetica","​sans-serif";
}
.datagrid-header-row * {
	font-weight: bold;
}
.messager-window * a:focus, .messager-window * span:focus {
	color: blue;
	font-weight: bold;
}
.daterangepicker * {
	font-family: "Source Sans Pro","Arial","​Helvetica","​sans-serif";
	box-sizing: border-box;
}
.glyphicon	{font-family: "Glyphicons Halflings"}
</style>

<?php 
# buaat tanggal sekarang
//$tanggal = date('Y-m-d h:i');
//$tanggal_arr = explode(' ', $tanggal);
//$txt_tanggal = jin_date_ina($tanggal_arr[0]);
//$txt_tanggal .= ' - ' . $tanggal_arr[1];


# ambil suku bunga
//foreach ($suku_bunga as $row) {
//	$bunga = $row->opsi_val;
//}
# ambil biaya admin
//foreach ($biaya as $row) {
//	$biaya_adm = $row->opsi_val;
//}

?>


<table id="dg" class="easyui-datagrid" title="Data Anggota" style="width:auto; height: auto;" url="<?php echo site_url('anggota/ajax_list'); ?>" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" collapsible="true"
sortName="tgl_daftar" sortOrder="DESC" toolbar="#tb" striped="true">
<thead>
    <tr>
        <th data-options="field:'id',halign:'center', align:'center'" hidden="true">ID</th>
        <th data-options="field:'id_anggota_txt', width:'auto'">ID Anggota </th>
        <th data-options="field:'nm_anggota',halign:'center',align:'center'" hidden="true">Nama Anggota</th>
        <th data-options="field:'nm_anggota_txt', width:'auto'">Nama Anggota</th>
        <th data-options="field:'identitas', width:'auto', halign:'center', align:'center',">Identitas Anggota</th>
        <th data-options="field:'alamat', width:'auto', halign:'center', align:'center',">Tempat Tinggal</th>
        <th data-options="field:'berkas', width:'auto', halign:'center', align:'center',">Data Anggota</th>
    </tr>
</thead>
</table>

<div id="tb" style="height: 35px;">
	<div style="vertical-align: middle; display: inline; padding-top: 15px;">
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="create()">Tambah </a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="update()">Edit</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" plain="true" onclick="hapus()">Hapus</a>
	</div>
	<div class="pull-right" style="vertical-align: middle;">
		<div id="filter_tgl" class="input-group" style="display: inline;">
			<button class="btn btn-default" id="daterange-btn">
				<i class="fa fa-calendar"></i> <span id="reportrange"><span>Tanggal</span></span>
				<i class="fa fa-caret-down"></i>
			</button>
		</div>
<!--
		<select id="cari_status" name="cari_status" style="width:170px; height:27px" >
			<option value=""> -- Status Pinjaman --</option>	
			<option value="Belum">Belum Lunas</option>	
			<option value="Lunas">Sudah Lunas</option>			
		</select>
-->
		<span>Cari :</span>
		<input name="kode_anggota" id="id_anggota" size="23" placeholder="Id Anggota" style="line-height:22px;border:1px solid #ccc">
		<input name="cari_nama" id="cari_nama" size="23" placeholder="Nama Anggota" style="line-height:22px;border:1px solid #ccc">
        
		<a href="javascript:void(0);" id="btn_filter" class="easyui-linkbutton" iconCls="icon-search" plain="false" onclick="doSearch()">Cari</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" plain="false" onclick="cetak_laporan()">Cetak Laporan</a>
		<a href="javascript:void(0);" class="easyui-linkbutton" iconCls="icon-clear" plain="false" onclick="clearSearch()">Hapus Filter</a>
	</div>
</div>

<div id="dialog-form" class="easyui-dialog" show= "blind" hide= "blind" modal="true" resizable="false" style="width:1024px; height:auto; padding-left: 15px; padding-top:20px" closed="true" buttons="#dialog-buttons" style="display: none;">
		<form id="form" method="post" novalidate>
		<table>
			<tr>
				<td>
					<table>
						<tr style="height:35px">
<!--
							<td>Tanggal Masuk</td>
							<td>:</td>
							<td>
-->
<!--								<div class="input-group date dtpicker col-md-5" style="z-index: 9999 !important;">-->
                            
                                              <div class="form-group">
                                <label class="col-md-12">Tanggal Masuk</label>
                                <div class="input-group date dtpicker" style="z-index: 9999 !important;">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" class="form-control" id="tgl_daftar_txt" name="tgl_daftar_txt" required="true" readonly>
                                <input type="hidden" name="tgl_daftar" id="tgl_daftar" />
                                </div>
                             </div> 
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-road"></i></span>
                                <input type="text" class="form-control" id="tmpatlahir" name="tempatlahir" placeholder="Tempat Lahir" required>
                                </div>    
                            </div>
                            
                          <div class="form-group">
                                <label>Alamat</label>
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-road"></i></span>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-road"></i></span>
                                <input type="text" class="form-control" id="kel" name="kel" placeholder="Masukkan Kelurahan" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Nomor Handphone</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                    <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Masukkan No Hp" required>
                                </div>
                            </div>
                        
                        
<!--
                                    <input type="text" name="tgl_daftar_txt" id="tgl_daftar_txt"  style="background:#eee; width:155px; height:23px" required="true" readonly="readonly" />
                                    <input type="hidden" name="daftar" id="tgl_daftar" />
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
-->
<!--								</div>-->
<!--							</td>	-->
						</tr>
                    </table>
                </td>
                <td width="10px"></td>
                <td valign="top">
                    <div class="form-group">
                        <label class="col-md-12">Nama Anggota</label>
                        <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        <input type="text" class="form-control" id="nmanggota" name="nmanggota" placeholder="Masukkan Nama" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <div class="input-group date dtpicker" style="z-index: 9999 !important;">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="text" class="form-control" id="tgllahir" name="tgllahir" placeholder="Tanggal Lahir" required>
                        </div>
                    </div> 
                     <div class="form-group">
                        <label>Kecamatan</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-road"></i></span>
                        <input type="text" class="form-control" id="kec" name="kec" placeholder="Masukkan Kecamatan" required>
                        </div>
                    </div>
                     <div class="form-group">
                        <label>Lingkungan</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-road"></i></span>
                        <input type="text" class="form-control" id="Link" name="Link" placeholder="Masukkan Lingkungan" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-terminal"></i></span>
                        <select class="form-control col-md-6">
                            <option>1</option>
                            <option>2</option>
                        </select>
                        </div>    
                    </div>
                </td>
                <td width="10px"></td>
                <td valign="top">
                    <div class="form-group">
                        <label>Nomor Induk KTP</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-ticket"></i></span>
                        <input type="text" class="form-control" id="nikktp" name="nik_ktp" placeholder="Masukkan Nik KTP" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-female"></i></span>
                        <select class="form-control col-md-6">
                            <option>Laki-Laki</option>
                            <option>Perempuan</option>
                        </select>
                        </div>    
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-child"></i></span>
                        <select class="form-control col-md-6">
                            <option>Kawin</option>
                            <option>Belum Kawin</option>
                        </select>
                        </div>    
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-shield"></i></span>
                        <select class="form-control col-md-6">
                            <option>1</option>
                            <option>2</option>
                        </select>
                        </div>    
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-rss-square"></i></span>
                            <select class="form-control">
                                <option>-Pilih-</option>
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
                </div>
                </td>
            </tr>
            </table>
	</form>
</div>


<div id="dialog-buttons">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="save()">Simpan</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:jQuery('#dialog-form').dialog('close')">Batal</a>
</div>

<script type="text/javascript">
$(document).ready(function(){
   $(".dtpicker").datetimepicker({
       language:  'id',
       weekStart: 1,
       autoclose: true,
       todayBtn: true,
       todayHighlight: true,
       pickerPosition: 'bottom-right',
       format: "dd MM yyyy",
       linkField: "tgl_daftar",
       linkFormat: "yyyy-mm-dd"
   });
    
}); 
</script>






















<script type="text/javascript">
var url;
function create(){
	jQuery('#dialog-form').dialog('open').dialog('setTitle','Form Tambah Anggota');
	jQuery('#form').form('clear');
	$('#id_anggota ~ span span a').show();
	$('#id_anggota ~ span input').removeAttr('disabled');
	$('#id_anggota ~ span input').focus();
    
    jQuery('#tgl_daftar_txt').val('<?php echo date('d M Y');?>');
	jQuery('#tgl_daftar').val('<?php echo date('d M Y');?>');
    
	url = '<?php echo site_url('anggota/create'); ?>';
}

function save() {
	var string = $("#form").serialize();
	//validasi teks kosong
	var anggota_id = $("input[name=anggota_id]").val();
	if(anggota_id == '') {
		$.messager.show({
			title:'<div><i class="fa fa-warning"></i> Peringatan ! </div>',
			msg: '<div class="text-red"><i class="fa fa-ban"></i> Maaf, Anggota belum dipilih. </div>',
			timeout:2000,
			showType:'slide'
		});
		$("#anggota_id").focus();
		return false;
	}
	var barang_id = $("#barang_id option:selected").val();
	if(barang_id == "0" || barang_id == "") {
		$.messager.show({
			title:'<div><i class="fa fa-warning"></i> Peringatan ! </div>',
			msg: '<div class="text-red"><i class="fa fa-ban"></i> Maaf, Barang belum dipilih. </div>',
			timeout:2000,
			showType:'slide'
		});
		$("#barang_id").focus();
		return false;
	}
	var jumlah = $("#jumlah").val();
	if(jumlah <= 0 || jumlah == '') {
		$.messager.show({
			title:'<div><i class="fa fa-warning"></i> Peringatan ! </div>',
			msg: '<div class="text-red"><i class="fa fa-ban"></i> Maaf, Jumlah harus diisi.</div>',
			timeout:2000,
			showType:'slide'
		});
		$("#barang_id").focus();
		return false;
	}

	var lama_angsuran = $("#lama_angsuran").val();
	if(lama_angsuran == 0) {
		$.messager.show({
			title:'<div><i class="fa fa-warning"></i> Peringatan ! </div>',
			msg: '<div class="text-red"><i class="fa fa-ban"></i> Maaf, Lama Angsuran belum dipilih </div>',
			timeout:2000,
			showType:'slide'
		});
		$("#lama_angsuran").focus();
		return false;
	}

	var kas = $("#kas").val();
	if(kas == 0) {
		$.messager.show({
			title:'<div><i class="fa fa-warning"></i> Peringatan ! </div>',
			msg: '<div class="text-red"><i class="fa fa-ban"></i> Maaf, Ambil dari Kas harus diisi.</div>',
			timeout:2000,
			showType:'slide'
		});
		$("#kas").focus();
		return false;
	}

	$.ajax({
		type	: "POST",
		url: url,
		data	: string,
		success	: function(result) {
			var result = eval('('+result+')');
			$.messager.show({
				title:'<div><i class="fa fa-info"></i> Informasi</div>',
				msg: result.msg,
				timeout:2000,
				showType:'slide'
			});
			if(result.ok) {
				jQuery('#dialog-form').dialog('close');
				$('#dg').datagrid('reload');
			}
		}
	});
}

function update(){
	var row = jQuery('#dg').datagrid('getSelected');
	if(row){
		jQuery('#dialog-form').dialog('open').dialog('setTitle','Edit Data Pinjaman');
		jQuery('#form').form('load',row);

		$('#anggota_id ~ span input').attr('disabled', true);
		$('#anggota_id ~ span input').css('background-color', '#fff');
		$('#anggota_id ~ span span a').hide();

		$('#barang_id').attr('disabled', true);
		$('#barang_id').css('background-color', '#fff');

		url = '<?php echo site_url('pinjaman/update'); ?>/' + row.id;

	}else {
		$.messager.show({
			title:'<div><i class="fa fa-warning"></i> Peringatan !</div>',
			msg: '<div class="text-red"><i class="fa fa-ban"></i> Maaf, Data harus dipilih terlebih dahulu </div>',
			timeout:2000,
			showType:'slide'
		});		}
	}

	function hapus(){  
		var row = $('#dg').datagrid('getSelected');  
		if (row){ 
			$.messager.confirm('Konfirmasi','Apakah anda yakin akan menghapus data pinjaman <code>' + row.id_txt + '</code>  dan Seluruh data angsurannya?',function(r){  
				if (r){  
					$.ajax({
						type	: "POST",
						url		: "<?php echo site_url('pinjaman/delete'); ?>",
						data	: 'id='+row.id,
						success	: function(result){
							var result = eval('('+result+')');
							$.messager.show({
								title:'<div><i class="fa fa-info"></i> Informasi</div>',
								msg: result.msg,
								timeout:2000,
								showType:'slide'
							});
							if(result.ok) {
								$('#dg').datagrid('reload');
							}

						},
						error : function (){
							$.messager.show({
								title:'<div><i class="fa fa-warning"></i> Peringatan !</div>',
								msg: '<div class="text-red"><i class="fa fa-ban"></i> Maaf, Terjadi kesalahan koneksi, silahkan muat ulang !!</div>',
								timeout:2000,
								showType:'slide'
							});
						}
					});  
				}  
			});  
		}  else {
			$.messager.show({
				title:'<div><i class="fa fa-warning"></i> Peringatan !</div>',
				msg: '<div class="text-red"><i class="fa fa-ban"></i> Maaf, Data harus dipilih terlebih dahulu </div>',
				timeout:2000,
				showType:'slide'
			});	
		}
		$('.messager-button a:last').focus();
	} 


	function form_select_clear() {
		$('select option')
		.filter(function() {
			return !this.value || $.trim(this.value).length == 0;
		})
		.remove();
		$('select option')
		.first()
		.prop('selected', true);	
	}

	function doSearch(){
		$('#dg').datagrid('load',{
			cari_status : $('#cari_status').val(),
			kode_transaksi: $('#kode_transaksi').val(),
			cari_nama: $('#cari_nama').val(),
			tgl_dari: 	$('input[name=daterangepicker_start]').val(),
			tgl_sampai: $('input[name=daterangepicker_end]').val()
		});
	}

	function clearSearch(){
		location.reload();
	}

	function cetak_laporan () {
		var cari_status	 	= $('#cari_status').val();
		var kode_transaksi 	= $('#kode_transaksi').val();
		var tgl_dari			= $('input[name=daterangepicker_start]').val();
		var tgl_sampai			= $('input[name=daterangepicker_end]').val();
		

		var win = window.open('<?php echo site_url("lap_pinjaman/cetak_laporan/?cari_status=' + cari_status + '&kode_transaksi=' + kode_transaksi + '&tgl_dari=' + tgl_dari + '&tgl_sampai=' + tgl_sampai + '"); ?>');
		if (win) {
			win.focus();
		} else {
			alert('Popup jangan di block');
		}
}
</script>