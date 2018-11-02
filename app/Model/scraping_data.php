<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class scraping_data extends Model
{
    public function home($url){
    	$ch = curl_init(); 
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0');
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	    $output = curl_exec($ch); 
	    $hasil=htmlspecialchars_decode($output);
	    $separator_pertama= strpos($hasil,'<category-list :navigation=>');
	    $potong_1=substr($output,$separator_pertama);
	    $separator_ahir= strpos($potong_1,'context-url="https://www.jakmall.com"> Kategori');
	    $potong_2=substr($potong_1,0,$separator_ahir-2); 
	    $separator_3=strpos($potong_2,'<category-list :navigation="');
	    $hasil_arr_kat=htmlspecialchars_decode(substr($potong_2,$separator_3+28));

	    $separator_pertama_cari= strpos($output,'<div class="header__search__favorite">');
	    $potong_1_cari=substr($output,$separator_pertama_cari);
	    $separator_ahir_cari= strpos($potong_1_cari,' <a href="https://www.jakmall.com/top-100?');
	    $potong_2_cari=substr($potong_1_cari,0,$separator_ahir_cari-1); 
	    preg_match_all('!href="https://www.jakmall.com/[^\s]*?&!',$potong_2_cari,$hasil_top_cari);
	    $hasil_top=array_values(array_unique($hasil_top_cari[0]));

	    $separator_pertama_barang= strpos($output,'var floors = ');
	    $potong_1_barang=substr($output,$separator_pertama_barang);
	    $separator_ahir_barang= strpos($potong_1_barang,'var recommendedStoreBanners');
	    $potong_2_barang=substr($potong_1_barang,0,$separator_ahir_barang-18); 
	    $separator_3_barang=strpos($potong_2_barang,'var floors = ');
	    $hasil_arr_barang=htmlspecialchars_decode(substr($potong_2_barang,$separator_3_barang+13));
	    // preg_match_all('!href="https://www.jakmall.com/[^\s]*?&!',$potong_2_cari,$hasil_top_cari);
	    // $hasil_top=array_values(array_unique($hasil_top_cari[0]));

	    $hasil_populer=htmlspecialchars_decode($output);
	    $separator_pertama_populer= strpos($hasil_populer,'Kategori Populer');
	    $potong_1_populer=substr($output,$separator_pertama_populer);
	    $separator_ahir_populer= strpos($potong_1_populer,'<a href="https://www.jakmall.com/top-100');
	    $potong_2_populer=substr($potong_1_populer,0,$separator_ahir_populer-3);
	    preg_match_all('!href="https://www.jakmall.com/[^\s]*!',$potong_2_populer,$hasil_arr_populer);
	    $hasil_populer=array_values(array_unique($hasil_arr_populer[0]));
	    return (object)[
	    	'hasil_arr_kat' => $hasil_arr_kat,
	    	'hasil_arr_barang' => $hasil_arr_barang,
	    	'hasil_top' => $hasil_top,
	    	'hasil_populer' => $hasil_populer
	    ];
	    // return $hasil_arr_kat;
    }

    public function barang($kategori, $page){
    	$ch = curl_init(); 
    	$url = 'https://www.jakmall.com/'.$kategori.'?page='.$page.'&cities%5B%5D=DKI%20Jakarta&in-stock=1';
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0');
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	    $output = curl_exec($ch); 
	    $hasil=htmlspecialchars_decode($output);
	    $separator_pertama= strpos($hasil,'var result =');
	    $potong_1=substr($output,$separator_pertama);
	    $separator_ahir= strpos($potong_1,'var selectedCategory');
	    $potong_2=substr($potong_1,0,$separator_ahir-3); 
	    $separator_3=strpos($potong_2,'var result');
	    $potong3=substr($potong_2,$separator_3);
	    $separator_4=strpos($potong3,'var config =');
	    $potong4=substr($potong3,13,$separator_4-22);

	    //ambil kategori
	    $hasil=htmlspecialchars_decode($output);
	    $separator_pertama= strpos($hasil,'<category-list :navigation=>');
	    $potong_1=substr($output,$separator_pertama);
	    $separator_ahir= strpos($potong_1,'context-url="https://www.jakmall.com"> Kategori');
	    $potong_2=substr($potong_1,0,$separator_ahir-2); 
	    $separator_3=strpos($potong_2,'<category-list :navigation="');
	    $hasil_arr_kat=htmlspecialchars_decode(substr($potong_2,$separator_3+28));


	    return (object)[ 
	    	'listBarang' => $potong4,
	    	'hasil_arr_kat' => $hasil_arr_kat
	    ];
    }

    public function detailBarang($url){
    	$ch = curl_init(); 
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0');
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	    $output = curl_exec($ch); 
	    $hasil=htmlspecialchars_decode($output);
	    $separator_pertama= strpos($hasil,'<div class="dp__info__wrapper mce" v-show="tabContent==1">');
	    $potong_1=substr($hasil,$separator_pertama);
	    $separator_ahir= strpos($potong_1,'<product-review v-show="tabContent==2"');
	    $potong_2=substr($potong_1,0,$separator_ahir-3); 
	    $separator_3=strpos($potong_2,'<div class="dp__info__wrapper"');
	    $potong3=substr($potong_2,$separator_3);
	    
	    $separator_detail_json= strpos($hasil,'var spdt');
	    $potong_detail_json=substr($output,$separator_detail_json);
	    $separator_ahir_detail_json= strpos($potong_detail_json,' var wlsc = [];');
	    $potong_detail_json2=substr($potong_detail_json,0,$separator_ahir_detail_json-9); 
	    $separator_d_json=strpos($potong_detail_json2,'var spdt');
	    $potong3_json=substr($potong_detail_json2,$separator_d_json+10);

	    $hasil=htmlspecialchars_decode($output);
	    $separator_pertama= strpos($hasil,'<category-list :navigation=>');
	    $potong_1=substr($output,$separator_pertama);
	    $separator_ahir= strpos($potong_1,'context-url="https://www.jakmall.com"> Kategori');
	    $potong_2=substr($potong_1,0,$separator_ahir-2); 
	    $separator_3=strpos($potong_2,'<category-list :navigation="');
	    $hasil_arr_kat=htmlspecialchars_decode(substr($potong_2,$separator_3+28));

	    return (object)[
	    	'detailBarang' => $potong3_json,
	    	'hasil_arr_kat' => $hasil_arr_kat,
	    	'informasi' => $potong3
	    ];
	}
	
	public function searchBarang($url){
		$ch = curl_init(); 
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0');
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	    $output = curl_exec($ch); 
	    $hasil=htmlspecialchars_decode($output);    
	    $separator_detail_json= strpos($hasil,'var result = ');
	    $potong_detail_json=substr($output,$separator_detail_json);
	    $separator_ahir_detail_json= strpos($potong_detail_json,'var config =');
	    $potong_detail_json2=substr($potong_detail_json,0,$separator_ahir_detail_json-10); 
	    $separator_d_json=strpos($potong_detail_json2,'var result = ');
	    $potong3_json=substr($potong_detail_json2,$separator_d_json+13);

	    $hasil=htmlspecialchars_decode($output);
	    $separator_pertama= strpos($hasil,'<category-list :navigation=>');
	    $potong_1=substr($output,$separator_pertama);
	    $separator_ahir= strpos($potong_1,'context-url="https://www.jakmall.com"> Kategori');
	    $potong_2=substr($potong_1,0,$separator_ahir-2); 
	    $separator_3=strpos($potong_2,'<category-list :navigation="');
	    $hasil_arr_kat=htmlspecialchars_decode(substr($potong_2,$separator_3+28));

	    return (object)[
	    	'listBarang' => $potong3_json,
	    	'hasil_arr_kat' => $hasil_arr_kat
	    ];
	}
}
