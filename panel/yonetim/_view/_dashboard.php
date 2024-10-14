<div class="row row-md">
  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
      <div class="box box-block  tile-2  widget-box clearfix height-auto">
          <div class="t-icon right"><i class="ti-bar-chart"></i></div>
          <div class="t-content">
              <h1 class="m-b-1">% <?=$stats_monthly['growth_rate']?></h1>
              <h6 class="text-uppercase">Büyüme Oranı</h6>
          </div>
      </div>
  </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
        <div class="box box-block  tile-2  widget-box clearfix height-auto ">
            <div class="t-icon right"><i class="ti-shopping-cart-full"></i></div>
            <div class="t-content">
                <h1 class="m-b-1"><?=number_format($stats_daily['total_customer'])?></h1>
                <h6 class="text-uppercase">Toplam Müşteri</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block  tile-2  widget-box clearfix height-auto">
            <div class="t-icon right"><i class="ti-package"></i></div>
            <div class="t-content">
                <h1 class="m-b-1"><?=number_format($stats_daily['total_device'])?></h1>
                <h6 class="text-uppercase">Toplam Cihaz</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
        <div class="box box-block  tile-2  widget-box clearfix height-auto">
            <div class="t-icon right"><i class="ti-receipt"></i></div>
            <div class="t-content">
                <h1 class="m-b-1"><?=number_format($stats_daily['total_dealer'])?></h1>
                <h6 class="text-uppercase">Toplam Bayi</h6>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card ">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Harita üzerinde istatistikler</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-7">
                        <div id="world-map" style="width: 100%; height: 280px"></div>
                    </div>
                    <div class="col-md-5">
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
        </div><!-- End .panel -->
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-card recent-activites">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Takvim</h4>
                <div class="panel-actions">
                    <form class="form-inline" role="form" method="post" action="<?=ADMIN_URL?>dashboard/" name="customer-form">
                        <div class="form-group">
                          <select name="cities" id="filter-cities" class="form-control">
                          </select>
                        </div>
                        <div class="form-group">
                            <select name="towns" id="filter-towns" class="form-control" disabled=""></select>
                        </div>
                        <div class="form-group">
                          <select name="streets[]" id="option-droup-demo" class="form-control" multiple="multiple" style="display: none;"></select>
                        </div>
                        <div class="form-group">
                          <input class="btn btn-primary" type="submit" value="FİLTRELE">
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel-body text-center">
              <div id="main-calendar" class="col-md-12 home-calendar fc fc-unthemed fc-ltr"></div>
            </div>
        </div><!-- End .panel -->
    </div>
    <div class="col-sm-12">
      <p class="text-center"><span style="color:#42f465">►</span> - Servis Bakımı Yapılmış <span style="color:#f44242">►</span> - Servis Bakımı Gecikmiş <span style="color:#42a4f4">►</span> - Servis Bakımı Gelmemiş</p>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-card recent-activites">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Mevcut Ürünler</h4>
            </div>
            <div class="panel-body text-center">
                <div id="pdata" ></div>
            </div>
        </div><!-- End .panel -->
    </div>
    <div class="col-lg-8">
        <div class="panel panel-card recent-activites">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Son 10 Online Ödeme</h4>
            </div>
            <div class="panel-body text-center">
                <div class="table-responsive table-commerce">
                    <table id="basic-datatables" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width:80px">
                                    <strong>ID</strong>
                                </th>
                                <th>
                                    <strong>BAYİ</strong>
                                </th>
                                <th>
                                    <strong>MİKTAR</strong>
                                </th>
                                <th>
                                    <strong>TAKSİT</strong>
                                </th>
                                <th>
                                    <strong>TARİH</strong>
                                </th>
                                <th class="text-center">
                                    <strong>DURUM</strong>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php if (!empty($result_payment)) {
                            foreach ($result_payment as $res) { ?>
                            <tr>
                                <td><?=$res['transaction_id']?></td>
                                <td><?=$res['title']?></td>
                                <td><?=$res['amount']?></td>
                                <td><?php if ($res['installment']>1) { ?><?=$res['installment']?> Taksit<?php } else { ?>Peşin<?php } ?></td>
                                <td><?=date("d/m/Y H:i", $res['created_at'])?></td>
                                <td class="text-center">
                                  <?php if ($res['completed']==1) { ?>
                                    <span class="label label-success">Başarılı<?php if ($res['refunded']==1) { ?>(İade)<?php } ?></span>
                                  <?php } else { ?>
                                    <span class="label label-danger">Başarısız<?php if ($res['refunded']==1) { ?>(İade)<?php } ?></span>
                                  <?php } ?>
                                </td>
                            </tr>
                          <?php } } else { ?>
                          <tr>
                              <td colspan="6">Kayıt Bulunamadı.</td>
                          </tr>
                          <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- End .panel -->
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-card recent-activites">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title"> Servisler</h4>
            </div>
            <div class="panel-body text-center">
                <div id="morris-line-chart"></div>
            </div>
        </div><!-- End .panel -->
    </div>
    <div class="col-lg-6">
        <div class="panel panel-card recent-activites">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title"> Satışlar</h4>
            </div>
            <div class="panel-body text-center">
                <div id="morris-bar-chart"></div>
            </div>
        </div><!-- End .panel -->
    </div>
</div>
<div id="fullCalModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="fullCalModalBody" class="modal-body ">
      </div>
    </div>
  </div>
</div>
