<div class="row">
    <div class="order-view-box col-md-12">
        <h3>Firma Detayları</h3>
        <div class="col-md-4">
            <form class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-4"><strong>ID:</strong></div>
                    <div class="col-sm-8">
                        #<?=$result_company['id']?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Firma:</strong></div>
                    <div class="col-sm-8">
                        <?=$result_company['name']?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Kullanıcı Adı:</strong></div>
                    <div class="col-sm-8">
                        <?=$result_company['username']?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Telefon:</strong></div>
                    <div class="col-sm-8">
                        <?=$result_company['phone']?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>E-Posta:</strong></div>
                    <div class="col-sm-8">
                        <?=$result_company['email']?>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <form class="form-horizontal">
               <div class="form-group">
                   <div class="col-sm-4"><strong>Website:</strong></div>
                   <div class="col-sm-8">
                       <?=$result_company['website']?>
                   </div>
               </div>
              <div class="form-group">
                  <div class="col-sm-4"><strong>Vergi Dairesi:</strong></div>
                  <div class="col-sm-8">
                      <?=$result_company['tax_office']?>
                  </div>
              </div>
             <div class="form-group">
                 <div class="col-sm-4"><strong>Vergi No:</strong></div>
                 <div class="col-sm-8">
                     <?=$result_company['tax_number']?>
                 </div>
             </div>
             <div class="form-group">
                 <div class="col-sm-4"><strong>Ülke:</strong></div>
                 <div class="col-sm-8">
                     <?=$get_country['title']?>
                 </div>
             </div>
             <div class="form-group">
                 <div class="col-sm-4"><strong>Dil:</strong></div>
                 <div class="col-sm-8">
                     <?=$get_language['title']?>
                 </div>
             </div>
            </form>
        </div>
        <div class="col-md-4">
            <form class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-4"><strong>Son Giriş:</strong></div>
                    <div class="col-sm-8">
                        <?php if ($result_company['online_at']!=0) { ?><?=date("d/m/Y H:i:s", $result_company['online_at']);?><?php } else { ?>-<?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Oluşturulma:</strong></div>
                    <div class="col-sm-8">
                        <?php if ($result_company['created_at']!=0) { ?><?=date("d/m/Y H:i:s", $result_company['created_at']);?><?php } else { ?>-<?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Güncellenme:</strong></div>
                    <div class="col-sm-8">
                        <?php if ($result_company['updated_at']!=0) { ?><?=date("d/m/Y H:i:s", $result_company['updated_at']);?><?php } else { ?>-<?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Silinme:</strong></div>
                    <div class="col-sm-8">
                        <?php if ($result_company['deleted_at']!=0) { ?><?=date("d/m/Y H:i:s", $result_company['deleted_at']);?><?php } else { ?>-<?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"><strong>Durum:</strong></div>
                    <div class="col-sm-8">
                        <?php if ($result_company['status']==1) { ?><span class="text-success">Aktif</span><?php } else { ?><span class="text-warning">Pasif</span><?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30 ">
          <div class="panel-heading">
            <h6 class="panel-title" style="padding: 0px !important;line-height: normal;">Kayıtlı Bayiler</h6>
          </div>
            <div class="panel-body">
                <table id="basic-datatables" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Bayi Kodu</th>
                            <th>Bayi Adı</th>
                            <th>Kayıtlı Firma</th>
                            <th>Müşterileri</th>
                            <th>Kullanıcı Adı</th>
                            <th>Telefon</th>
                            <th>E-Posta</th>
                            <th>Şehir</th>
                            <th>Son Giriş</th>
                            <th>Eklenme Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($result_dealer)) {
                            foreach($result_dealer as $res) { ?>
                        <tr>
                            <td><?=$res['id']?></td>
                            <td><?=$res['dealer_code']?></td>
                            <td>
                              <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/dealer','none','<?=$res['id']?>','0')"><?=$res['title']?></a>
                            </td>
                            <td>
                              <a onclick="goto('<?=ADMIN_URL?>dealer/','company_id','<?=$res['id']?>')" href="javascript:void(0)">
                                <?=$res['company_name']?>
                              </a>
                            </td>
                            <td><?=$res['count']?></td>
                            <td><?=$res['username']?></td>
                            <td><?=$res['gsm']?></td>
                            <td><?=$res['email']?></td>
                            <td><?=$res['city']?></td>
                            <td><?=date("d/m/Y", $res['online_at'])?></td>
                            <td><?=date("d/m/Y", $res['created_at'])?></td>
                            <td>
                              <div class="icon-container">
                                <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/dealer','none','<?=$res['id']?>','0')"><span class="ti-search"></span></a>
                              </div>
                              <div class="icon-container">
                                <a href="<?=ADMIN_URL?>_modal/_get_dealer_edit.php?id=<?=$res['id']?>" data-toggle="modal" data-target="#dealer_edit" data-placement="top" title="Düzenle" data-original-title="Düzenle"><span class="ti-pencil"></span></a>
                              </div>
                              <div class="icon-container">
                                <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>dealer/','delete','<?=$res['id']?>','1')"><span class="ti-trash"></span></a>
                              </div>
                            </td>
                        </tr>
                      <?php } } else { ?>
                      <tr>
                        <td colspan="12">
                          <?=$lang['no_record']?>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="dealer_info" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    </div>
  </div>
</div>
<div class="modal fade" id="dealer_edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    </div>
  </div>
</div>
