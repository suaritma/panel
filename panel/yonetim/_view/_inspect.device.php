<div class="row">
    <div class="order-view-box col-md-12">
        <h3>Ürün/Cihaz Detayları</h3>
        <div class="col-md-4">
            <form class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-12">
                      <img src="<?=UPLOAD_URL?>devices/<?=$result_device['id']?>.tmp" style="height:240px" />
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <form class="form-horizontal">
            <div class="form-group">
                <div class="col-sm-4"><strong>ID:</strong></div>
                <div class="col-sm-8">
                    #<?=$result_device['id']?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4"><strong>Kategori:</strong></div>
                <div class="col-sm-8">
                    <?=$get_category['title']?>
                </div>
            </div>
              <div class="form-group">
                  <div class="col-sm-4"><strong>Adı:</strong></div>
                  <div class="col-sm-8">
                      <?=$result_device['name']?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-4"><strong>Ücret:</strong></div>
                    <div class="col-sm-8">
                      <?=$result_device['price']?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-4"><strong>Seri:</strong></div>
                    <div class="col-sm-8">
                      <?=$result_device['code']?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-4"><strong>Stok:</strong></div>
                    <div class="col-sm-8">
                      <?=$result_device['stack']?>
                    </div>
                  </div>
                  <div class="form-group">
                      <div class="col-sm-4"><strong>Desi:</strong></div>
                      <div class="col-sm-8">
                          <?=$result_device['weight']?>
                      </div>
                  </div>
            </form>
        </div>
        <div class="col-md-4">
            <form class="form-horizontal">
              <div class="form-group">
                 <div class="col-sm-4"><strong>Marka:</strong></div>
                 <div class="col-sm-8">
                     <?=$result_device['manufacturer']?>
                   </div>
                 </div>
                 <div class="form-group">
                   <div class="col-sm-4"><strong>Oluşturulma:</strong></div>
                   <div class="col-sm-8">
                     <?=date("d/m/Y H:i:s", $result_device['created_at'])?>
                   </div>
                 </div>
                 <div class="form-group">
                     <div class="col-sm-4"><strong>Güncellenme:</strong></div>
                     <div class="col-sm-8">
                         <?php if ($result_device['updated_at']!=0) { ?><?=date("d/m/Y H:i:s", $result_device['updated_at']);?><?php } else { ?>-<?php } ?>
                     </div>
                 </div>
                 <div class="form-group">
                     <div class="col-sm-4"><strong>Silinme:</strong></div>
                     <div class="col-sm-8">
                         <?php if ($result_device['deleted_at']!=0) { ?><?=date("d/m/Y H:i:s", $result_device['deleted_at']);?><?php } else { ?>-<?php } ?>
                     </div>
                 </div>
                 <div class="form-group">
                     <div class="col-sm-4"><strong>Durum:</strong></div>
                     <div class="col-sm-8">
                         <?php if ($result_device['status']==1) { ?><span class="text-success">Aktif</span><?php } else { ?><span class="text-warning">Pasif</span><?php } ?>
                     </div>
                 </div>
           <div class="form-group">
             <div class="col-sm-4"><strong>Açıklama:</strong></div>
             <div class="col-sm-8">
               <?=$result_device['description']?>
             </div>
           </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30 ">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Bu Cihazı Kullanan Müşteriler (En Yeni 100)</h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Firma/Bayi</th>
                            <th>Ad Soyad</th>
                            <th>E-Posta</th>
                            <th>Gsm</th>
                            <th>İl</th>
                            <th>İlçe</th>
                            <th>Eklenme Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($result_customer)) {
                            foreach($result_customer as $res) { ?>
                        <tr>
                            <td><?=$res['id']?></td>
                            <td><?=$res['company_name']?> / <?=$res['dealer_title']?></td>
                            <td><a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/customer','none','<?=$res['id']?>','0')"><?=$res['firstname']?> <?=$res['lastname']?></a></td>
                            <td><?=$res['email']?></td>
                            <td><?=$res['gsm']?></td>
                            <td class="city"><?=$res['city']?></td>
                            <td class="town"><?=$res['town']?></td>
                            <td><?=date("d/m/Y", $res['created_at'])?></td>
                            <td>
                              <div class="icon-container">
                                <a href="javascript:void(0);" onclick="goto('<?=CUSTOMER_URL?>_external_login/','admin_to_customer','<?=$res['id']?>','0')"><span class="ti-share-alt"></span></a>
                              </div>
                              <div class="icon-container">
                                <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>inspect/customer','none','<?=$res['id']?>','0')"><span class="ti-search"></span></a>
                              </div>
                              <div class="icon-container">
                                <a href="<?=ADMIN_URL?>_modal/_get_customer_edit.php?id=<?=$res['id']?>" data-toggle="modal" data-target="#customer_edit" data-placement="top" title="Düzenle" data-original-title="Düzenle"><span class="ti-pencil"></span></a>
                              </div>
                              <div class="icon-container">
                                <a href="javascript:void(0);" onclick="goto('<?=ADMIN_URL?>customer/','delete','<?=$res['id']?>','1')"><span class="ti-trash"></span></a>
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