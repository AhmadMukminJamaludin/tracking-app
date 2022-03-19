<?php

function hashEncrypt($input){

	$hash = password_hash($input, PASSWORD_DEFAULT);
	
	return $hash;
}
	
function hashEncryptVerify($input, $hash){
	
	if(password_verify($input, $hash)){
	  return true;
	}else{
	  return false;
	}
}

function is_login($is_true = false)
{
    $CI =& get_instance();
    if (!@$CI->session->is_login && !$is_true) {
        redirect('auth');
    } elseif ($CI->session->is_login && $is_true) {
        redirect('admin');
    }

    return;
}
	
function is_admin()
{
	$CI =& get_instance();
	
	if($CI->session->userdata('role_id') != 1){
		redirect('errors');
	}
}

function is_petugas()
{
	$CI =& get_instance();
	
	if($CI->session->userdata('role_id') != 3){
		redirect('errors');
	}
}

function hariindo($hariInggris)
{
	switch ($hariInggris) {
		case 'Sunday':
			return 'Minggu';
		case 'Monday':
			return 'Senin';
		case 'Tuesday':
			return 'Selasa';
		case 'Wednesday':
			return 'Rabu';
		case 'Thursday':
			return 'Kamis';
		case 'Friday':
			return 'Jumat';
		case 'Saturday':
			return 'Sabtu';
		default:
			return 'hari tidak valid';
	}

	// cara panggil hari: hariindo(date('l')) 
}

function bulanindo($bulaninggris)
{
	switch ($bulaninggris) {
		case 'January':
			return 'Januari';
		case 'February':
			return 'Februari';
		case 'March':
			return 'Maret';
		case 'April':
			return 'April';
		case 'May':
			return 'Mei';
		case 'June':
			return 'Juni';
		case 'July':
			return 'Juli';
		case 'August':
			return 'Agustus';
		case 'September':
			return 'September';
		case 'October':
			return 'Oktober';
		case 'November':
			return 'November';
		case 'December':
			return 'Desember';
		default:
			return 'Bulan tidak valid';
	}
}