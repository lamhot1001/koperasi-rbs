<?php
if (!function_exists('jin_date_ina')) {
	function jin_date_ina($date_sql, $tipe = 'full', $time = false) {
		$date = '';
		if($tipe == 'full') {
			$nama_bulan = array(1=>"Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		} else {
			$nama_bulan = array(1=>"Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des");
		}
		if($time) {
			$exp = explode(' ', $date_sql);
			$exp = explode('-', $exp[0]);
			if(count($exp) == 3) {
				$bln = $exp[1] * 1;
				$date = $exp[2].' '.$nama_bulan[$bln].' '.$exp[0];
			}		
			$exp_time = $exp = explode(' ', $date_sql);
			$date .= ' jam ' . substr($exp_time[1], 0, 5);
		} else {
			$exp = explode('-', $date_sql);
			if(count($exp) == 3) {
				$bln = $exp[1] * 1;
				if($bln > 0) {
					$date = $exp[2].' '.$nama_bulan[$bln].' '.$exp[0];
				}
			}
		}
		return $date;
	}
}

if (!function_exists('jin_nama_bulan')) {
	function jin_nama_bulan($bln, $tipe='full') {
		$bln = $bln * 1;
		if($tipe == 'full') {
			$nama_bulan = array(1=>"Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		} else {
			$nama_bulan = array(1=>"Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des");
		}
		return $nama_bulan[$bln];
	}
}

if(!function_exists('my_date_show')){
        function my_date_show($date){

            if($date != ''){
                $date2 = date_create($date);
                $date_new = date_format($date2,"d M Y");
                return $date_new;
            }else{
                return '';
            }
        }
    }

if(!function_exists('rbs_round')){
    function rbs_round($x){
        return $x;
    }
}