<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30 ">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Kayıtlı Müşteriler</h4>
                <div class="panel-actions">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customer_bulk_add"> Toplu Müşteri Ekle</button>
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#customer_add"> Yeni Ekle</button>
                </div>
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
                                <a href="javascript:void(0);" onclick="goto('<?=DEALER_URL?>_external_login/','admin_to_customer','<?=$res['id']?>','0')"><span class="ti-share-alt"></span></a>
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
          <?=$pagi?>
        </div>
    </div>
</div>
<div class="modal fade" id="customer_bulk_add" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title">Toplu Müşteri Ekleme</h4>
            </div>
            <form role="form" method="post">
      		<input type="hidden" name="process" value="bulk_add" />
            <div class="modal-body">
            	<div class="row">
            		<div class="col-md-12">
            			<div class="col-md-6">
        					<div class="form-group"><span>* Örnek Excel dosyayı indirin.</span></div>
        					<div class="form-group"><span>* Müşterinin mahalle id'sini sağdaki tablodan bulabilirsiniz.</span></div>
        					<div class="form-group"><span>* Müşterinin son servis tipinin id'sini belirtmeniz gerekiyor.</span></div>
        					<div class="form-group"><span>* Montaj Servisi id: <b>1</b> | Servis Bakım id: <b>2</b></span></div>
        					<div class="form-group"><span>* Zorunlu alanlar: 'adı_soyadı', 'gsm', 'mahalle_id', 'servis_id'</span></div>
        					<div class="form-group"><a href="#" class="btn btn-default" download="">Örnek dosya indir<i class="fa fa-download"></i></a></div>
        					<div class="form-group"><select class="form-control m-b" name="company" id="company"></select></div>
        					<div class="form-group"><select class="form-control m-b" name="dealer" id="dealer" disabled></select></div>
        					<div class="form-group"><input class="form-control" name="image" type="file"></div>
            			</div>
            			<div class="col-md-6">
        					<div class="form-group"><span>* 'Mahalle Id' bulmak için bu formu kullanabilirsiniz.</span></div>
            				<div class="form-group">
							<form class="form-horizontal" id="street_search_form" action="#">
            					<div class="input-group">
            						<input name="street_search" placeholder="En az 3 karakter!" autocomplete="off" minlength="3" class="form-control" id="street_search" type="text">
            						<span class="input-group-btn">
            							<button class="btn btn-default" id="street-search-button" type="button">Seç</button>
            						</span>
            					</div>
							</form>
        					</div>
        					<div class="form-group"><select class="form-control m-b" name="city" id="cityz"></select></div>
        					<div class="form-group"><select class="form-control m-b" name="town" id="townz" disabled></select></div>
        					<div class="form-group"><select class="form-control m-b" name="district" id="districtz" disabled></select></div>
        					<div class="form-group"><select class="form-control m-b" name="street" id="streetz" disabled></select></div>
        					<div class="form-group"><input placeholder="Mahalle ID" class="form-control" name="mahalleid" id="mahalleid" type="text" readonly></div>
            			</div>
            		</div>
            	</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-accent">Yükle</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="customer_add" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title">Müşteri Ekle</h4>
      </div>
      <form role="form" method="post">
      <input type="hidden" name="process" value="customer_add" />
      <div class="modal-body">
        <div class="form-group"><select class="form-control m-b" name="company" id="company"></select></div>
        <div class="form-group"><select class="form-control m-b" name="dealer" id="dealer" disabled></select></div>
        <div class="form-group"><input placeholder="İsim" class="form-control" name="firstname" type="text"></div>
        <div class="form-group"><input placeholder="Soyisim" class="form-control" name="lastname" type="text"></div>
        <div class="form-group"><input placeholder="E-Posta" class="form-control" name="email" type="email"></div>
        <div class="form-group"><input placeholder="GSM" class="form-control" name="gsm" type="text" id="phone" tabindex="3"></div>
        <div class="form-group"><input class="form-control" name="birthdate" type="date"></div>
        <div class="form-group"><select class="form-control m-b" name="city" id="city"></select></div>
        <div class="form-group"><select class="form-control m-b" name="town" id="town" disabled></select></div>
        <div class="form-group"><select class="form-control m-b" name="district" id="district" disabled></select></div>
        <div class="form-group"><select class="form-control m-b" name="street" id="street" disabled></select></div>
        <div class="form-group"><input placeholder="Posta Kodu" class="form-control" name="postalcode" id="postalcode" type="text" readonly></div>
        <div class="form-group"><textarea placeholder="Adres" class="form-control" name="address"></textarea></div>
        <div class="form-group"><select class="form-control m-b" name="status"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
        <div class="form-group"><label> <input type="checkbox" name="welcome" value="1"><i></i> Hoşgeldin Mesajı Gönder </label></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-accent" data-dismiss="modal">Kapat</button>
        <button type="submit" class="btn btn-default">Ekle</button>
      </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="customer_edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    </div>
  </div>
</div>
