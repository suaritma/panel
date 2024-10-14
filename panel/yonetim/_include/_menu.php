<?php
  $stats_monthly=mysqli_fetch_assoc(mysqli_query($con, "SELECT `growth_rate`, `customer_surplus`, `service_surplus`, `dealer_surplus` FROM `stats_monthly` ORDER BY `id` DESC LIMIT 1"));
?>
            <nav class="navbar-aside navbar-static-side " id="menu">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="active">
                          <a href="<?=ADMIN_URL?>dashboard/"><i class="fa fa-th-large"></i> <span class="nav-label">Konsol </span></a>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-laptop"></i> <span class="nav-label">Cihaz İşlemleri</span><span class="fa fa-plus"></span></a>
                          <ul class="nav nav-second-level collapse">
                            <li><a href="<?=ADMIN_URL?>category/">Kategori Listele/Ekle</a></li>
                            <li><a href="<?=ADMIN_URL?>device/">Cihaz Listele/Ekle</a></li>
                          </ul>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Bayi İşlemleri</span><span class="fa fa-plus"></span></a>
                          <ul class="nav nav-second-level collapse">
                            <li><a href="<?=ADMIN_URL?>company/">Firma Listele/Ekle</a></li>
                            <li><a href="<?=ADMIN_URL?>dealer/">Bayi Listele/Ekle</a></li>
                            <li><a href="<?=ADMIN_URL?>permission/">Yetki Ayarları</a></li>
                          </ul>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-comment"></i> <span class="nav-label">SMS İşlemleri</span><span class="fa fa-plus"></span></a>
                          <ul class="nav nav-second-level collapse">
                            <li><a href="<?=ADMIN_URL?>sms/source">SMS Kaynakları</a></li>
                            <li><a href="<?=ADMIN_URL?>sms/service">Servis Ayarları</a></li>
                          </ul>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">E-Posta İşlemleri</span><span class="fa fa-plus"></span></a>
                          <ul class="nav nav-second-level collapse">
                            <li><a href="<?=ADMIN_URL?>email/source">E-Posta Kaynakları</a></li>
                            <li><a href="<?=ADMIN_URL?>email/service">Servis Ayarları</a></li>
                          </ul>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-bell"></i> <span class="nav-label">Bildirim İşlemleri</span><span class="fa fa-plus"></span></a>
                          <ul class="nav nav-second-level collapse">
                            <li><a href="<?=ADMIN_URL?>notification/source">Bildirim Kaynakları</a></li>
                            <li><a href="<?=ADMIN_URL?>notification/service">Bildirim Ayarları</a></li>
                          </ul>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-credit-card"></i> <span class="nav-label">Ödeme İşlemleri</span><span class="fa fa-plus"></span></a>
                          <ul class="nav nav-second-level collapse">
                            <li><a href="<?=ADMIN_URL?>payment/pay">Ödeme Listesi</a></li>
                            <li><a href="<?=ADMIN_URL?>payment/bank">Bankalar ve Apiler</a></li>
                            <li><a href="<?=ADMIN_URL?>payment/card">Kartlar ve Taksitler</a></li>
                            <li><a href="<?=ADMIN_URL?>payment/config">Genel Ayarlar</a></li>
                          </ul>
                        </li>
                        <li>
                          <a href="<?=ADMIN_URL?>customer/"><i class="fa fa-users"></i> <span class="nav-label">Tüm Müşteriler</span></a>
                        </li>
                        <li>
                          <a href="<?=ADMIN_URL?>location/"><i class="fa fa-map"></i> <span class="nav-label">Konum Ayarları</span></a>
                        </li>
                        <li>
                          <a href="<?=ADMIN_URL?>report/"><i class="fa fa-tasks"></i> <span class="nav-label">Raporlar</span></a>
                        </li>
                        <?php if ($_SESSION['admin_super']==1) { ?>
                        <li>
                          <a href="<?=ADMIN_URL?>system/"><i class="fa fa-cog"></i> <span class="nav-label">Sistem Ayarları</span></a>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-trash"></i> <span class="nav-label">Çöp Kutusu</span><span class="fa fa-plus"></span></a>
                          <ul class="nav nav-second-level collapse">
                            <li><a href="<?=ADMIN_URL?>trash/customer">Müşteriler</a></li>
                            <li><a href="<?=ADMIN_URL?>trash/category">Kategoriler</a></li>
                            <li><a href="<?=ADMIN_URL?>trash/device">Cihazlar</a></li>
                            <li><a href="<?=ADMIN_URL?>trash/company">Firmalar</a></li>
                            <li><a href="<?=ADMIN_URL?>trash/dealer">Bayiler</a></li>
                          </ul>
                        </li>
                        <?php } ?>
                    </ul>
                    <div class="row">
                        <div class="left-bar">
                            <div class="map_progress">
                                <h4>Müşteri Artışı</h4>
                                <span><small>Geçen aya göre %<?=$stats_monthly['customer_surplus']?> artış</small></span>
                                <div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="<?=$stats_monthly['customer_surplus']?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$stats_monthly['customer_surplus']?>%"></div></div>

                                <h4>Servis Artışı</h4>
                                <span><small>Geçen aya göre %<?=$stats_monthly['service_surplus']?> artış</small></span>
                                <div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="<?=$stats_monthly['service_surplus']?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$stats_monthly['service_surplus']?>%"></div></div>

                                <h4>Bayi Artışı</h4>
                                <span><small>Geçen aya göre %<?=$stats_monthly['dealer_surplus']?> artış</small></span>
                                <div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="<?=$stats_monthly['dealer_surplus']?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$stats_monthly['dealer_surplus']?>%"></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
