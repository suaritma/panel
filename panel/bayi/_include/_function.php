<?php
if (isset($_SESSION['dealer_language'])) {
	if (file_exists('_language/'.$_SESSION['dealer_language'].'/_common.php')) {
		include('_language/'.$_SESSION['dealer_language'].'/_common.php');
	} else {
		include('../_language/'.$_SESSION['dealer_language'].'/_common.php');
  	}
} else {
	if (file_exists('_language/tr/_common.php')) {
		include('_language/tr/_common.php');
	} else {
		include('../_language/tr/_common.php');
  	}
}
$cf = @mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `configurations` WHERE `id` = '1'"));
// Maintenance
if ($cf['maintenance']) {
  header("Location: ".DEALER_URL."maintenance.php");
  exit();
}
function get_mess_type($z,$y) {
	$head=array(
	'1' => 'Montaj',
	'2' => 'Montaj',
	'3' => 'Servis Bakım',
	'4' => 'Servis Bakım',
	'5' => 'Arıza Kayıt',
	'6' => 'Arıza Kayıt',
	'7' => 'Bayram Özel',
	'8' => 'Bayram Özel',
	'9' => 'Kampanya',
	'10' => 'Kampanya',
	'11' => 'Servis Periyodu',
	'12' => 'Servis Periyodu',
	'13' => 'Doğum Günü',
	'14' => 'Doğum Günü',
	'15' => 'Arıza İşlendi',
	'16' => 'Arıza İşlendi',
	'17' => 'Ödeme (Başarılı)',
	'18' => 'Ödeme (Başarısız)',
	'19' => 'Hoşgeldin',
	'20' => 'Hoşgeldin'
	);
	return $head[''.$z.''];
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function get_last_id($tablename) {
  $row = @mysqli_fetch_assoc(mysqli_query($con, "SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME   = '$tablename'"));
  return $row['Auto_increment'];
}
function get_serial_no($tablename) {
  global $cf;
  $id=get_last_id($tablename);
  return $cf['device_code'] + $id;
}
function tempnam_sfx($path, $name, $suffix) {
  do {
    $file = $path."/".$name.$suffix;
    $fp = @fopen($file, 'x');
  }
  while(!$fp);
  fclose($fp);
  return $file;
}
function convertImage($originalImage, $outputImage, $quality) {
  $exploded = explode('.',$originalImage);
  $ext = $exploded[count($exploded) - 1];
  if (preg_match('/jpg|jpeg/i',$ext)) {
    $imageTmp=imagecreatefromjpeg($originalImage);
  } else if (preg_match('/png/i',$ext)) {
    $imageTmp=imagecreatefrompng($originalImage);
  } else if (preg_match('/gif/i',$ext)) {
    $imageTmp=imagecreatefromgif($originalImage);
  } else if (preg_match('/bmp/i',$ext)) {
    $imageTmp=imagecreatefrombmp($originalImage);
  } else {
    return 0;
  }
  imagejpeg($imageTmp, $outputImage, $quality);
  imagedestroy($imageTmp);
  return 1;
}
function ip() {
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    if(filter_var($client, FILTER_VALIDATE_IP)) {
      $ip = $client;
    } elseif(filter_var($forward, FILTER_VALIDATE_IP)) {
      $ip = $forward;
    } else {
      $ip = $remote;
    }
    return $ip;
}
function vardesigner($var,$code) {
  global ${$var};
  global $error;
  global $con;
  if ((isset($var)) && (!empty($var))) {
      ${$var}=mysqli_real_escape_string($con, $var);
  } else {
      $error = $code;
  }
}
function varsql($var) {
    if (is_array($var)) {
        return $var;
    } else {
        global $con;
        return mysqli_real_escape_string($con, $var);
    }
}
function starfunc($star) {
  $starstr="";
  for ($k=0; $k<5; $k++) {
    if ($k<$star) {
      $starstr .= '<span class="fa fa-star checkedStar"></span>';
    } else {
      $starstr .= '<span class="fa fa-star"></span>';
    }
  }
  return $starstr;
}
function breadcrumb($page,$i,$page_lang,$i_lang) {
  $result = '<li><a href="'.DEALER_URL.'">'.$lang['menu_homepage'].'</a></li><li><a href="'.DEALER_URL.'dealer/">'.$lang[$page_lang].'</a></li><li>'.$lang[$i_lang].'</li>';
}
function ins_dt_chk($date,$status) {
  global $time;
  if (($date<$time) && ($status==0)) {
    $result="text-danger";
  } elseif (($date>=$time) && ($status==0)) {
    $result="text-warning";
  } else {
    $result="text-success";
  }
  return $result;
}
function def_st_chk($stat) {
  if ($stat==1) {
    $result="text-success";
  } else {
    $result="text-danger";
  }
  return $result;
}
function defects_notif_get($zidi) {
    global $con;
    $count=mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`defects`.`id`) as `total` FROM `defects` INNER JOIN `customers` ON `customers`.`id` = `defects`.`customer_id` WHERE (`customers`.`dealer_id` = '$zidi' AND `defects`.`status` = '0') AND (`customers`.`status` = '1' AND `customers`.`deleted_at` = '0')"));
    if ($count['total']>=1) {
        return $count['total'];
    } else {
        return "OK";
    }
}
function service_notif_get($zidi) {
    global $con;
    $timer=time();
    $count=mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_service`.`id`) as `total` FROM `customers_service` INNER JOIN `customers` ON `customers`.`id` = `customers_service`.`customer_id` WHERE `customers`.`dealer_id` = '$zidi' AND (`customers_service`.`nextservice` <= '$timer' AND `customers_service`.`resolved` = '0') AND (`customers`.`status` = '1' AND `customers`.`deleted_at` = '0')"));
    if ($count['total']>=1) {
        return $count['total'];
    } else {
        return "OK";
    }
}
function paginate($item_per_page, $current_page, $total_records, $total_pages, $page_url) {
  $pagination = '';
  if ($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages) {
    $pagination .= '<div class="btn-group  pull-right ">';
    $right_links = $current_page + 5;
    $previous = $current_page - 5;
    $next = $current_page + 1;
    $first_link = true;
    if ($current_page > 1){
      $previous_link = $current_page-1;
      $pagination .= '<button onclick="pagination(\''.$page_url.'\',\'pg\',\'1\')" href="javascript:void(0)" type="button" class="btn btn-sm btn-default bg-amber" title="Sayfa 1">&laquo;</button>'; //first link
      $pagination .= '<button onclick="pagination(\''.$page_url.'\',\'pg\',\''.$previous_link.'\')" href="javascript:void(0)" type="button" class="btn btn-sm btn-default bg-amber" title="Sayfa '.$previous_link.'">&lt;</button>';
        for($i = ($current_page-2); $i < $current_page; $i++) {
          if($i > 0) {
            $pagination .= '<button onclick="pagination(\''.$page_url.'\',\'pg\',\''.$i.'\')" href="javascript:void(0)" type="button" class="btn btn-sm btn-default bg-amber" title="Sayfa '.$i.'">'.$i.'</button>';
          }
        }
      $first_link = false;
    }
    if ($first_link) {
      $pagination .= '<button type="button" class="btn btn-sm btn-default bg-amber" title="Sayfa '.$current_page.'">'.$current_page.'</button>';
    } elseif($current_page == $total_pages) {
      $pagination .= '<button type="button" class="btn btn-sm btn-default bg-amber" title="Sayfa '.$current_page.'">'.$current_page.'</button>';
    } else {
      $pagination .= '<button type="button" class="btn btn-sm btn-default bg-amber" title="Sayfa '.$current_page.'">'.$current_page.'</button>';
    }
    for ($i = $current_page+1; $i < $right_links ; $i++) {
      if($i<=$total_pages) {
        $pagination .= '<button onclick="pagination(\''.$page_url.'\',\'pg\',\''.$i.'\')" href="javascript:void(0)" type="button" class="btn btn-sm btn-default bg-amber" title="Sayfa '.$i.'">'.$i.'</button>';
      }
    }
    if ($current_page < $total_pages) {
      $next_link = $current_page+1;
      $pagination .= '<button onclick="pagination(\''.$page_url.'\',\'pg\',\''.$next_link.'\')" href="javascript:void(0)" type="button" class="btn btn-sm btn-default bg-amber" title="Sayfa '.$next_link.'">&gt;</button>';
      $pagination .= '<button onclick="pagination(\''.$page_url.'\',\'pg\',\''.$total_pages.'\')" href="javascript:void(0)" type="button" class="btn btn-sm btn-default bg-amber" title="Sayfa '.$total_pages.'">&raquo;</button>';
    }
    $pagination .= '</div>';
  }
  return $pagination;
}
?>
