<?php
  $defects=mysqli_query($con, "SELECT `id`,`problem_note`,`created_at` FROM `defects` WHERE `status`='0' ORDER BY `id` DESC LIMIT 5");
  while($row=@mysqli_fetch_assoc($defects)) {
    $result_defects_notif[] = $row;
  }
  $total_defects=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `defects` WHERE `status` = '0'"));
  $requests=mysqli_query($con, "SELECT `message_requests`.`id` as `id`, `message_requests`.`email` as `email`, `message_requests`.`sms` as `sms`, `message_requests`.`notification` as `notification`, `message_requests`.`content` as `content`, `message_requests`.`created_at` as `created_at`, `dealers`.`title` as `title`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname` FROM `message_requests` INNER JOIN `dealers` ON `message_requests`.`dealer_id`=`dealers`.`id` INNER JOIN `customers` ON `customers`.`id` = `message_requests`.`customer_id` WHERE `message_requests`.`status` = '0' GROUP BY `message_requests`.`id` ORDER BY `message_requests`.`created_at` DESC LIMIT 5");
  while($row=@mysqli_fetch_assoc($requests)) {
    $result_requests_notif[] = $row;
  }
  $total_requests=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `message_requests` WHERE `status` = '0'"));
?>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<nav class="navbar navbar-default yamm navbar-fixed-top" id="header"> <div class="container-fluid padding-l-r">
<div class="left-part">
    <button type="button" class="navbar-minimalize minimalize-styl-2  pull-left "><i class="fa fa-bars"></i></button>

    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
      </div>
</div>
<div id="navbar" class="navbar-collapse collapse">
    <div class="search" style="display: none;">
        <form method="post" action="<?=ADMIN_URL?>search/">
            <input type="text" name="search" class="form-control" autocomplete="off" placeholder="Arama yapmak için birşeyler yazın" style="color:white;">
            <span class="search-close"><i class="fa fa-times"></i></span>
        </form>
    </div>
    <ul class="nav navbar-nav navbar-right navbar-top-drops">
        <li> <span class="search-icon"><i class="fa fa-search"></i></span>
        </li>
        <li class="dropdown"><a href="#" class="dropdown-toggle button-wave" data-toggle="dropdown"><i class="fa fa-envelope"></i> <span class="badge badge-xs badge-info"><?php if (!empty($result_requests_notif)) { echo $total_requests['total']; } ?></span></a>
            <ul class="dropdown-menu dropdown-lg animated flipInX">
                <li class="notify-title">
                    <?php if (!empty($result_requests_notif)) { echo $total_requests['total'].' bekleyen istek!'; } ?>
                </li>
                <?php if (!empty($result_requests_notif)) {
                  foreach ($result_requests_notif as $res) { ?>
                <li class="clearfix">
                    <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>requests/','none','<?=$res['id']?>','0')">
                        <span class="block">
                            <strong>Bayi:</strong> <?=$res['title']?>
                        </span>
                        <br />
                        <span class="block">
                            <strong>Müşteri:</strong> <?=$res['firstname']?> <?=$res['lastname']?>
                        </span>
                        <span class="media-body">
                            <?=$res['content']?>
                            <em><?=date("d/m H:i", $res['created_at'])?></em>
                        </span>
                    </a>
                </li>
                <?php } unset($result_requests_notif); } else { ?>
                  <li class="clearfix">
                        <span class="media-body" style="padding: 12px 20px;">Bekleyen istek yok.</span>
                      </li>
                    <?php } ?>
                <li class="read-more"><a href="<?=ADMIN_URL?>requests/">Tüm mesaj istekleri <i class="fa fa-angle-right"></i></a></li>
            </ul>
        </li>
        <li class="dropdown"><a href="#" class="dropdown-toggle button-wave" data-toggle="dropdown"><i class="fa fa-bell"></i> <span class="badge badge-xs badge-warning"><?php if (!empty($result_defects_notif)) { echo $total_defects['total']; } ?></span></a>
            <ul class="dropdown-menu dropdown-lg animated flipInX">
                <li class="notify-title">
                  <?php if (!empty($result_defects_notif)) { echo $total_defects['total'].' çözülmemiş arıza!'; } ?>
                </li>
                <?php if (!empty($result_defects_notif)) {
                  foreach ($result_defects_notif as $res) { ?>
                <li class="clearfix">
                  <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>defects/','none','<?=$res['id']?>','0')">
                    <span class="pull-left">
                      <i class="fa fa-wrench"></i>
                    </span>
                    <span class="media-body">
                      <?=$res['problem_note']?>
                      <em><?=date("d/m H:i", $res['created_at'])?></em>
                    </span>
                  </a>
                </li>
              <?php } } else { ?>
                <li class="clearfix">
                  <span class="media-body" style="padding: 12px 20px;">Çözülmemiş arıza yok.</span>
                </li>
              <?php } ?>
                <li class="read-more"><a href="<?=ADMIN_URL?>defects/">Tüm arıza kayıtları <i class="fa fa-angle-right"></i></a></li>
            </ul>
        </li>
        <li class="dropdown"><a href="#" class="dropdown-toggle button-wave" data-toggle="dropdown"><i class="fa fa-user"></i></a>
            <ul class="dropdown-menu dropdown-lg animated flipInX profile">
                <li><a href="<?=ADMIN_URL?>logs/"><i class="fa fa-barcode"></i>Giriş Logları</a></li>
                <li class="divider"></li>
                <li><a href="<?=ADMIN_URL?>change_pass/"><i class="fa fa-lock"></i>Şifre Değiştir</a></li>
                <li><a href="<?=ADMIN_URL?>logout/"><i class="fa fa-key"></i>Çıkış Yap</a></li>
            </ul>
        </li>
        <li><a href="#" class="button-wave right-sidebar-toggle waves-effect waves-button waves-light"><i class="fa fa-comment" aria-hidden="true"></i></a>
        </li>
    </ul>
</div><!--/.nav-collapse -->
</div><!--/.container-fluid -->
</nav>
