<?php
namespace App\Helper;
class Tanggal
{

  public static function is_tanggal($input)
  {
    $date = $input;
    @list($y, $m, $d) = explode('-', $date);
      if(@checkdate($m, $d, $y)){
       $input=Tanggal::tgl_indo($input);
      }

    return $input;
  }
  public static function time_indo($timestamp)
  {

    if ($timestamp==null) {
      return "Kosong";
    }else{
      $pecah=explode(" ",$timestamp);
    return Tanggal::tgl_indo($pecah[0])." ".$pecah[1]." WIB";
    }
  }
  public static function tgl_indo($tgl)
  {
    if($tgl=='0000-00-00'||$tgl==null)
    {
      return "<span class='label label-warning'>Kosong</span>";
    }
    else
    {
      $tanggal = substr($tgl,8,2);
      $bulan = Tanggal::getBulan(substr($tgl,5,2));
      $tahun = substr($tgl,0,4);
      return $tanggal.' '.$bulan.' '.$tahun;
    }
  }
  public static function tanggal_bulan_tahun_kata($input)
  {
    $tanggal = substr($input,8,2);
    $bulan =substr($input,5,2);
    $tahun = substr($input,0,4);
    $kata_tanggal=Uang::kekata($tanggal);
    $kata_bulan=Tanggal::getBulan($bulan);
    $kata_tahun=Uang::kekata($tahun);
    $kata=array('kata_tanggal'=>ucwords($kata_tanggal),'kata_bulan'=>$kata_bulan,'kata_tahun'=>ucwords($kata_tahun));
    return $kata;
  }

  public static function getBulan($bln){
    switch ($bln){
      case 1:
        return "Januari";
        break;
      case 2:
        return "Februari";
        break;
      case 3:
        return "Maret";
        break;
      case 4:
        return "April";
        break;
      case 5:
        return "Mei";
        break;
      case 6:
        return "Juni";
        break;
      case 7:
        return "Juli";
        break;
      case 8:
        return "Agustus";
        break;
      case 9:
        return "September";
        break;
      case 10:
        return "Oktober";
        break;
      case 11:
        return "November";
        break;
      case 12:
        return "Desember";
        break;
    }
  }
  public static function selisih_hari($mulai,$selesai)
  {
    $a=explode("-",$mulai);
    $b=explode("-",$selesai);
    $a1=mktime(0,0,0,$a[1],$a[2],$a[0]);
    $b1=mktime(0,0,0,$b[1],$b[2],$b[0]);
    $selisih=($b1 - $a1)/(3600*24);
    return $selisih;
  }
  public static function selisih_bulan($mulai,$selesai)
  {
    $a=strtotime($mulai);
    $b=strtotime($selesai);

    $selisih =1 + (date("Y",$b)-date("Y",$a))*12;
    $selisih += date("m",$b)-date("m",$a);
    return $selisih;
  }
  public static function get_hari($tanggal)
  {
    $hari=date('D',strtotime($tanggal));
    $hari_hari=array(
      "Sun"=>"Minggu",
      "Mon"=>"Senin",
      "Tue"=>"Selasa",
      "Wed"=>"Rabu",
      "Thu"=>"Kamis",
      "Fri"=>"Jum'at",
      "Sat"=>"Sabtu"
      );
    return $hari_hari[$hari];
  }

}
