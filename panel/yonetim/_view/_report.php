<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-9">
                  <p>Servis periyodu gelen ve bildirim açık olan toplam <?=$rep['service_notification_all']?> müşterileri bulunmakta</p>
                  <p>E-posta Bildirimi: <?=$rep['service_notification_email']?> üye</p>
                  <p>Sms Bildirimi: <?=$rep['service_notification_sms']?> üye</p>
                  <p>Mobil Bildirimi: <?=$rep['service_notification_mobile']?> üye</p>
                </div>
                <div class="col-md-3">
                  <div class="buttons-column" style="margin-bottom:0px">
                    <a href="javascript:void(0)" class="btn btn-default btn-3d btn-block disabled" role="button" aria-disabled="true">SMS GÖNDER <i class="fa fa-envelope"></i></a>
                    <br />
                    <a href="javascript:void(0)" class="btn btn-default btn-3d btn-block disabled" role="button" aria-disabled="true">E-POSTA GÖNDER <i class="fa fa-comment"></i></a>
                    <br />
                    <a href="javascript:void(0)" class="btn btn-default btn-3d btn-block disabled" role="button" aria-disabled="true">BİLDİRİM GÖNDER <i class="fa fa-mobile"></i></a>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-9">
                  <p>Bugün doğum günü olan ve bildirim açık olan <?=$rep['birthday_all']?> müşterileri bulunmakta</p>
                  <p>E-posta Bildirimi: <?=$rep['birthday_email']?> üye</p>
                  <p>Sms Bildirimi: <?=$rep['birthday_sms']?> üye</p>
                  <p>Mobil Bildirimi: <?=$rep['birthday_mobile']?> üye</p>
                </div>
                <div class="col-md-3">
                  <div class="buttons-column" style="margin-bottom:0px">
                    <a href="javascript:void(0)" class="btn btn-default btn-3d btn-block disabled" role="button" aria-disabled="true">SMS GÖNDER <i class="fa fa-envelope"></i></a>
                    <br />
                    <a href="javascript:void(0)" class="btn btn-default btn-3d btn-block disabled" role="button" aria-disabled="true">E-POSTA GÖNDER <i class="fa fa-comment"></i></a>
                    <br />
                    <a href="javascript:void(0)" class="btn btn-default btn-3d btn-block disabled" role="button" aria-disabled="true">BİLDİRİM GÖNDER <i class="fa fa-mobile"></i></a>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-9">
                  <p>Bayram / Özel Gün için bildirim açık olan toplam <?=$rep['special_day_all']?> müşterileri bulunmakta</p>
                  <p>E-posta Bildirimi: <?=$rep['special_day_email']?> üye</p>
                  <p>Sms Bildirimi: <?=$rep['special_day_sms']?> üye</p>
                  <p>Mobil Bildirimi: <?=$rep['special_day_mobile']?> üye</p>
                </div>
                <div class="col-md-3">
                  <div class="buttons-column" style="margin-bottom:0px">
                    <a href="javascript:void(0)" onclick="goto('<?=ADMIN_URL?>report/', 'send', '1_7', '0')" class="btn btn-default btn-3d btn-block">SMS GÖNDER <i class="fa fa-envelope"></i></a>
                    <br />
                    <a href="javascript:void(0)" onclick="goto('<?=ADMIN_URL?>report/', 'send', '2_7', '0')" class="btn btn-default btn-3d btn-block">E-POSTA GÖNDER <i class="fa fa-comment"></i></a>
                    <br />
                    <a href="javascript:void(0)" onclick="goto('<?=ADMIN_URL?>report/', 'send', '3_7', '0')" class="btn btn-default btn-3d btn-block">BİLDİRİM GÖNDER <i class="fa fa-mobile"></i></a>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-9">
                  <p>Müşteri Özel - Kampanya için bildirim açık olan toplam <?=$rep['campaign_all']?> müşterileri bulunmakta</p>
                  <p>E-posta Bildirimi: <?=$rep['campaign_email']?> üye</p>
                  <p>Sms Bildirimi: <?=$rep['campaign_sms']?> üye</p>
                  <p>Mobil Bildirimi: <?=$rep['campaign_mobile']?> üye</p>
                </div>
                <div class="col-md-3">
                  <div class="buttons-column" style="margin-bottom:0px">
                    <a href="javascript:void(0)" onclick="goto('<?=ADMIN_URL?>report/', 'send', '1_9', '0')" class="btn btn-default btn-3d btn-block">SMS GÖNDER <i class="fa fa-envelope"></i></a>
                    <br />
                    <a href="javascript:void(0)" onclick="goto('<?=ADMIN_URL?>report/', 'send', '2_9', '0')" class="btn btn-default btn-3d btn-block">E-POSTA GÖNDER <i class="fa fa-comment"></i></a>
                    <br />
                    <a href="javascript:void(0)" onclick="goto('<?=ADMIN_URL?>report/', 'send', '3_9', '0')" class="btn btn-default btn-3d btn-block">BİLDİRİM GÖNDER <i class="fa fa-mobile"></i></a>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-9">
                  <p>Bayi Özel - Sisteme kayıtlı toplam <?=$rep['company']?> Firma ve <?=$rep['dealer']?> Bayi bulunmakta</p>
                </div>
                <div class="col-md-3">
                  <div class="buttons-column" style="margin-bottom:0px">
                    <a href="javascript:void(0)" onclick="goto('<?=ADMIN_URL?>report/', 'send', '1_8', '0')" class="btn btn-default btn-3d btn-block">SMS GÖNDER <i class="fa fa-envelope"></i></a>
                    <br />
                    <a href="javascript:void(0)" onclick="goto('<?=ADMIN_URL?>report/', 'send', '2_8', '0')" class="btn btn-default btn-3d btn-block">E-POSTA GÖNDER <i class="fa fa-comment"></i></a>
                    <br />
                    <a href="javascript:void(0)" onclick="goto('<?=ADMIN_URL?>report/', 'send', '3_8', '0')" class="btn btn-default btn-3d btn-block">BİLDİRİM GÖNDER <i class="fa fa-mobile"></i></a>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
