<div class="col-md-12">
  <?php if (($cf_pay['maintenance']!=1) && ((!isset($_POST['process'])) || ($_POST['process']!="pay"))) { ?>
    <div id="payment_form">
      <div class="col-md-8 col-md-offset-2">
        <form id="inputForm" class="form-horizontal" method="post">
          <input type="hidden" name="process" value="pay" />
          <input type="hidden" name="taksit" id="cr" value="" />
          <div class="form-group">
            <div class="card-wrapper"></div>
          </div>
          <div id="extCardSelector">
            <div style="margin-bottom: 0;" class="form-group">
              <div class="table-responsive">
                <table class="table table-bordered table-condensed table-striped">
                  <thead>
                    <tr class="primary">
                      <td></td>
                      <?php if ($c[1]==1) { ?>
                        <td class="text-center">
                          <span class="hidden-xs">Tek çekim</span>
                          <span class="visible-xs">Tek ç.</span>
                        </td>
                      <?php } ?>
                      <?php if ($c[2]==1) { ?>
                        <td class="text-center">2</td>
                      <?php } ?>
                      <?php if ($c[3]==1) { ?>
                        <td class="text-center">3</td>
                      <?php } ?>
                      <?php if ($c[4]==1) { ?>
                        <td class="text-center">4</td>
                      <?php } ?>
                      <?php if ($c[5]==1) { ?>
                        <td class="text-center">5</td>
                      <?php } ?>
                      <?php if ($c[6]==1) { ?>
                        <td class="text-center">6</td>
                      <?php } ?>
                      <?php if ($c[7]==1) { ?>
                        <td class="text-center">7</td>
                      <?php } ?>
                      <?php if ($c[8]==1) { ?>
                        <td class="text-center">8</td>
                      <?php } ?>
                      <?php if ($c[9]==1) { ?>
                        <td class="text-center">9</td>
                      <?php } ?>
                      <?php if ($c[10]==1) { ?>
                        <td class="text-center">10</td>
                      <?php } ?>
                      <?php if ($c[11]==1) { ?>
                        <td class="text-center">11</td>
                      <?php } ?>
                      <?php if ($c[12]==1) { ?>
                        <td class="text-center">12</td>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($result_payment)) {
                      foreach ($result_payment as $res) { ?>
                      <tr>
                        <td class="text-center">
                          <?php if (!file_exists(UPLOAD_URL."cards/".$res['id'].".tmp")) { ?>
                            <img src="<?=UPLOAD_URL?>cards/<?=$res['id']?>.tmp" style="height:40px" />
                          <?php } else { ?>
                            <?=$res['title']?>
                          <?php } ?>
                        </td>
                        <?php for ($t=1; $t<=12; $t++) { ?>
                          <?php if ($res['i_'.$t]>=0) { ?>
                            <td class="td-value">
                              <label>
                                <input name="installment" id="<?=$res['id']?>_<?=$t?>" value="<?=$res['i_'.$t]?>" type="radio" class="pay_checkers" data-iframe="<?php if ($t==1) { echo $res['ext_iframe']; } else { echo $res['iframe']; } ?>" />
                                <span class="installmentPercent"><?php if ($res['i_'.$t]>0) { ?><?=$res['i_'.$t]?>&nbsp;%<?php } ?></span><br>
                                <span data-value="<?=$res['i_'.$t]?>" data-taksit="<?=$t?>" data-inst="<?=$res['id']?>" data-bank="<?=$res['bank_id']?>" id="span_<?=$res['id']?>_<?=$t?>" class="amountPerInst hidden-xs">0&nbsp;TL</span>
                              </label>
                            </td>
                          <?php } elseif ($c[$t]==1) { ?>
                            <td class="td-value"></td>
                          <?php } ?>
                        <?php } ?>
                      </tr>
                    <?php } } else { ?>
                      <tr>
                        <p>
                          <?=$lang['no_record']?>
                        </p>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="form-group">
              <label for="amount_whole" class="control-label col-md-4">
                Tutar&nbsp;<span class="ast">*</span>
              </label>
              <div class="col-md-8">
                <div class="input-group">
                  <input name="amount_whole" min="<?=$cf_pay['min']?>" max="<?=$cf_pay['max']?>" placeholder="1000" required="required" id="amount_whole" aria-describedby="basic-addon" class="form-control" type="number">
                  <span id="basic-addon" class="input-group-addon">TL</span>
                </div>
              </div>
            </div>
            <div id="editfn" class="form-group">
              <label for="nameInput" class="control-label col-md-4">
                Isim Soyisim&nbsp;<span class="ast">*</span>
              </label>
              <div class="col-md-8">
                <input id="fullname" name="fullname" required="required" value="" placeholder="İsim Soyisim" class="form-control" type="text">
              </div>
            </div>
            <div id="editkk" class="form-group">
              <label for="numberInput" class="control-label col-md-4">
                Kredi Kart No&nbsp;<span class="ast">*</span>
              </label>
              <div class="col-md-8">
                <input id="card_code" name="card_code" maxlength="16" placeholder="Kredi Kart No" class="form-control" type="text">
              </div>
            </div>
            <div id="editcc" class="form-group">
              <label for="numberInput" class="control-label col-md-4">
                Ay / Yıl / CVC&nbsp;<span class="ast">*</span>
              </label>
              <div class="col-md-3">
                <select id="month" name="month" class="form-control">
                <?php for ($t=1; $t<=12; $t++) { ?>
                  <option value="<?=$t?>"><?=$t?></option>
                <?php } ?>
                </select>
              </div>
              <div class="col-md-3">
                <select id="year" name="year" class="form-control">
                <?php for ($t=0; $t<=10; $t++) { ?>
                  <option value="<?=date('Y', $time)+$t?>"><?=date('Y', $time)+$t?></option>
                <?php } ?>
                </select>
              </div>
              <div class="col-md-2">
                <div class="input-group">
                  <input name="cvc" id="cvc" maxlength="4" value="" placeholder="CVC *" class="form-control" type="text">
                  <span class="input-group-btn">
                    <a tabindex="0" role="button" data-container="body" data-toggle="popover" data-trigger="focus" data-placement="top" title="" data-content="<img src='https://www.aquacora.com.tr/bayi/assets/images/card_cvc.png' alt='asd' /><br><br>Kredi Kartın arkasındaki 3 veya 4 haneli sayı." class="btn btn-default" data-original-title="CVC">?</a>
                  </span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <label class="control-label col-md-5">
                  <input name="payment_type" value="1" type="radio"> Karttan Çekilecek Tutar
                </label>
                <label class="control-label col-md-5">
                  <input name="payment_type" checked="checked" value="2" type="radio"> Hesaba Geçecek Tutar
                </label>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-bordered table-condensed table-striped">
                    <thead>
                      <tr class="text-center dataPaymentHead">
                        <td>
                          <span class="hidden-xs">Komisyon oranı</span>
                          <span class="visible-xs">Kom.</span>
                        </td>
                        <td>
                          <span class="hidden-xs">Taksit</span>
                          <span class="visible-xs">Tak.</span>
                        </td>
                        <td>
                          <span class="hidden-xs">Karttan çekilecek</span>
                          <span class="visible-xs">Kart.çek.</span>
                        </td>
                        <td>
                          <span class="hidden-xs">Hesaba geçecek</span>
                          <span class="visible-xs">Hes.geç.</span>
                        </td>
                        <td>
                          <span class="hidden-xs">Komisyon tutarı</span>
                          <span class="visible-xs">Kom.tut.</span>
                        </td>
                      </tr>
                    </thead>
                    <tbody>
                    <tr class="text-center dataPaymentBody">
                      <td>0 %</td>
                      <td>1 Taksit</td>
                      <td>0&nbsp;TL</td>
                      <td>0&nbsp;TL</td>
                      <td>0 TL</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="control-label col-md-4">E-posta</label>
            <div class="col-md-8">
              <input id="email" name="email" value="<?=$info['email']?>" class="form-control" type="email">
            </div>
          </div>
          <div class="form-group">
            <label for="txtTelefon" class="control-label col-md-4">Telefon</label>
            <div class="col-md-8">
              <input id="phone" value="<?=$info['gsm']?>" name="phone" class="form-control" type="tel">
            </div>
          </div>
          <div class="form-group">
            <label for="note" class="control-label col-md-4">Not</label>
            <div class="col-md-8">
              <textarea name="note" rows="2" cols="2" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4">Satış Sözleşme <span class="ast">*</span></label>
            <div class="col-md-8">
              <label>
                <input name="confirmation" type="checkbox">&nbsp;
                  <a href="#" data-toggle="modal" data-target="#contract">Mesafeli satış sözleşmesini kabul ediyorum.</a>
                </label>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
                <input name="name" id="submitButton" data-loading-text="Gönderiliyor.." value="Ödeme Yap" class="btn btn-primary btn-block" type="submit">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div id="extFrameManager" style="display:none" class="col-md-8 col-md-offset-2">
        <div class="form-group">
          <input id="extBackButton2" data-loading-text="Gönderiliyor.." value="Geri Dön" class="btn btn-primary btn-block" type="button">
        </div>
        <iframe name="extFrame" src="#" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:600px;width:100%;position:relative;top:0px;left:0px;right:0px;bottom:0px" width="100%" height="600" frameborder="0"></iframe>
      </div>
    </div>
  <?php } else { ?>
  	<?php if ($cf_pay['maintenance']==1) { ?>
    	<p>ÖDEME SİSTEMİMİZ ŞUANDA BAKIMA ALINMIŞTIR! LÜTFEN DAHA SONRA TEKRAR DENEYİNİZ!</p>
    <?php } else { ?>
    	<?php if ($result_payment==0) { ?><p>YÖNLENDİRİLİYORSUNUZ...</p><?php } ?>
    <?php eval($eval_command); } ?>
  <?php } ?>
</div>
<div class="modal fade" id="contract" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Sözleşme</h4>
      </div>
      <div class="modal-body">
        <p><strong>HİZMET / &Uuml;R&Uuml;N SATIŞ S&Ouml;ZLEŞMESİ</strong></p>
        <p><strong>TARAFLAR :</strong></p>
        <p>&nbsp;</p>
        <p><strong>1) Hizmet &amp; &Uuml;r&uuml;n Veren / Satıcı / Edit&ouml;r :</strong></p>
        <p>www.aquacora.com.tr web sitesini işleten ve sahibi olan AQUACORA Su Arıtma Sistemleri(OStim osb mah. 1213. sokak no:1/19 Yenimahalle Ankara) işbu s&ouml;zleşmede "EDİT&Ouml;R" olarak anılacaktır.&nbsp;</p>
        <p><strong>2) Hizmet &amp; &Uuml;r&uuml;n Alan / Alıcı / M&uuml;şteri :</strong></p>
        <p>www.aquacora.com.tr sitesinde yer alan info@aquacora.com.tr e-posta adresine g&ouml;ndererek veya site &uuml;zerinde başvuru formunu doldurarak web sitesinde sunulan hizmetlerden faydalanmak isteyen ya da &uuml;r&uuml;nleri satın almak isteyen t&uuml;ketici ise, bu s&ouml;zleşmede &ldquo;M&Uuml;ŞTERİ" olarak anılacaktır.</p>
        <p>&nbsp;</p>
        <p><strong>KONU:</strong></p>
        <p>İşbu s&ouml;zleşmenin konusu, M&Uuml;ŞTERİ tarafından EDİT&Ouml;R'e başvurularak, &ldquo;aquacora.com.tr sumakinesi.com suaritmasepeti.com&rdquo; web sitesi i&ccedil;eriğinde sunulan hizmetlerden ve &uuml;r&uuml;nlerden faydalanmak istenilmesi halinde taraflar arasındaki hukuki, mali ve ticari şartları, tarafların karşılıklı hak, yetki ve y&uuml;k&uuml;ml&uuml;l&uuml;kleri ile bu y&uuml;k&uuml;ml&uuml;l&uuml;klerden doğan hukuki ve cezai sorumlulukları belirlemektir.</p>
        <p>&nbsp;</p>
        <p><strong>AMA&Ccedil;:</strong></p>
        <p>İşbu s&ouml;zleşmenin amacı, M&Uuml;ŞTERİ tarafından EDİT&Ouml;R'e başvurularak, &ldquo;aquacora.com.tr&rdquo; web sitesi i&ccedil;eriğinde sunulan hizmetlerden ve &uuml;r&uuml;nlerden faydalanmak istenilmesi halinde taraflar arasındaki hukuki, mali ve ticari şartları, tarafların karşılıklı hak, yetki ve y&uuml;k&uuml;ml&uuml;l&uuml;kleri, bu y&uuml;k&uuml;ml&uuml;l&uuml;klerden doğan hukuki ve cezai sorumlulukları kayıt altına almayı, bu suretle T&uuml;rk Hukuk sisteminin  &ouml;ng&ouml;rd&uuml;ğ&uuml;, aradığı her t&uuml;rl&uuml; hukuki ve mali şartları yerine getirerek, taraflar arasında mağduriyeti ortadan kaldırmayı, hukuki hak arama s&uuml;reci esaslarını belirlemeyi ama&ccedil;lamaktadır.</p>
        <p>&nbsp;</p>
        <p><strong>KAVRAMLAR :</strong></p>
        <p>İşbu s&ouml;zleşmede ge&ccedil;en aşağıdaki kavramlardan</p>
        <p>1. web sitesi, www.aquacora.com.tr isimli web sayfasını</p>
        <p>2. Sanal ortam, internet ortamını&nbsp;</p>
        <p>3. Satıcı / Edit&ouml;r, E-Pazarlama&nbsp;</p>
        <p>4. Alıcı / M&uuml;şteri, web sitesinden hizmet ve / veya &uuml;r&uuml;n almak &uuml;zere başvuruda bulunan ger&ccedil;ek ya da t&uuml;zel kişiyi</p>
        <p>5. S&ouml;zleşme, işbu hizmet / &uuml;r&uuml;n satış s&ouml;zleşmesini</p>
        <p>6. Banka, m&uuml;şterinin sanal ortamda kredi kartı, sanal kart yada diğer nakit transferi yoluyla yaptığı &ouml;demelerin ger&ccedil;ekleştiği Edit&ouml;r&rsquo;&uuml;n anlaşmalı bankasını&nbsp;</p>
        <p>7. Mevzuat, T&uuml;rk hukuk mevzuatını</p>
        <p>8. Gizlilik Anlaşması, s&ouml;zleşme i&ccedil;inde yer verilen bir madde h&uuml;km&uuml;, alınan ya da g&ouml;nderilen e mail eklerinde ya da ayrı bir s&ouml;zleşme ile taraflar arasında kişisel verilerin korunması şartlarını belirleyen anlaşmayı</p>
        <p>9. T&uuml;ketici mevzuatı, t&uuml;ketici hakları ile ilgili T&uuml;rk hukukunda y&uuml;r&uuml;rl&uuml;kte olan d&uuml;zenlemeleri&nbsp;</p>
        <p>10. &Uuml;r&uuml;n, web sitesine m&uuml;şterilere word, jpg, excel gibi değişik formatlarda sunulan hukuki metinleri, ticari bilgileri, hukuki verileri, mevzuatı ve matbu yazıları&nbsp;</p>
        <p>11. Hizmet, web sitesinde m&uuml;şterilere sunulan, araştırma, sorgulama ve raporlama faaliyetlerini&nbsp;</p>
        <p>12. &Uuml;cret, web sayfasında sunulan hizmet ya da &uuml;r&uuml;nler i&ccedil;in &ouml;nceden belirlenmiş, m&uuml;şterilerin &ouml;demeyi kabul ve taahh&uuml;t ettikleri &uuml;creti&nbsp;</p>
        <p>13. Mesai g&uuml;nleri, haftanın pazartesi ve Cuma g&uuml;nleri arasındaki g&uuml;nler olup, T&uuml;rkiye&rsquo;de resmi ve dini bayram g&uuml;nleri dışında kalan g&uuml;nlerdir.&nbsp;</p>
        <p>İfade eder.</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p><strong>GENEL ŞARTLAR:</strong></p>
        <p>Madde 1- M&Uuml;ŞTERİ, EDİT&Ouml;R tarafından web sitesinde sunduğu hizmetler ve &uuml;r&uuml;nler karşılığında, belirtilen bedeli &ouml;demek sureti ile yararlanmayı kabul etmektedir. EDİT&Ouml;R &lsquo;&uuml;n sunduğu hizmet ve &uuml;r&uuml;nlerle ilgili M&Uuml;ŞTERİ ye karşı &uuml;cretsiz hizmet verme, &uuml;r&uuml;n sunma gibi bir zorunluluğu, hukuki ve yasal bir sorumluluğu yoktur&nbsp;</p>
        <p>M&Uuml;ŞTERİ, web sitesinden satın aldığı &uuml;r&uuml;n ve hizmetlerin FSEK anlamında birer eser olduğunu, bu &uuml;r&uuml;nler &uuml;zerindeki t&uuml;m fikri ve sınai m&uuml;lkiyet haklarının EDİT&Ouml;R&rsquo;e ait olduğunu, EDİT&Ouml;R &lsquo;&uuml;n yazılı izni olmadan, hi&ccedil;bir yol ve y&ouml;ntemle, internet, yazılı ya da g&ouml;rsel basın, interaktif ortamlarda, bu &uuml;r&uuml;n ve hizmetler &uuml;zerindeki manevi ve mali telif haklarına, haksız rekabet kurallarına, marka,   patent ve benzeri haklara aykırı davranmamayı, bu &uuml;r&uuml;n ve hizmetleri kişisel kullanım haricinde kullanmamayı, ticari ama&ccedil;la, yasa dışı ama&ccedil;larla kullanmamayı ya da &uuml;&ccedil;&uuml;nc&uuml; şahıslarla paylaşmamayı yahut da bu eylemleri andıran herhangi bir eylem ya da işlemde bulunmamayı taahh&uuml;t ve kabul eder.&nbsp;</p>
        <p>Aksi takdirde su&ccedil; oluşturan bu eylemler karşısında EDİT&Ouml;R &lsquo;&uuml;n her t&uuml;rl&uuml; cezai ya da hukuki başvuru yapma, tazminat talep etme, şikayette bulunma hakkı vardır.</p>
        <p>Madde 2 - M&Uuml;ŞTERİ, EDİT&Ouml;R'den istediği hizmet ve &uuml;r&uuml;nleri s&ouml;zleşme, yasa, toplumsal ve ahlaki sorumluluklar, iyiniyet kuralları &ccedil;er&ccedil;evesinde kullanmayı, taahh&uuml;t ve kabul eder.&nbsp;</p>
        <p>M&Uuml;ŞTERİ, EDİT&Ouml;R'den talep ettiği &uuml;r&uuml;n ya da hizmetlerin kendisine teslim edilmesinden sonra, m&uuml;şteri tarafından k&ouml;t&uuml; ama&ccedil;larla kullanılması, kişisel veri g&uuml;venliği kurallarının ihlal edilmesi veya değişik şekillerde suistimal edilmesi, şikayete konu olması veya 3. kişilere karşı &ccedil;eşitli zararlar vermesi halinde her t&uuml;rl&uuml; hukuki, cezai,yasal ve maddi sorumluluğu tek başına, kendisi &uuml;stlenmeyi kabul ve taahh&uuml;t eder.</p>
        <p>Madde 3- EDİT&Ouml;R, M&Uuml;ŞTERİ tarafından kendisinden talep edilen &uuml;r&uuml;n ya da hizmeti, s&ouml;z konusu &uuml;r&uuml;n ya da hizmet talebini yerine getirip getirmeme ya da teslim edip etmemek M&Uuml;ŞTERİ &lsquo;nin taleplerini kabul edip, etmeme hakkına ve yetkisine sahiptir. EDİT&Ouml;R, M&Uuml;ŞTERİ'ye hi&ccedil;bir gerek&ccedil;e g&ouml;stermeksizin sunulan hizmeti geri &ccedil;evirmek, gerekli g&ouml;rd&uuml;ğ&uuml; anda hizmete ilişkin başlamış olan faaliyetleri durdurmak  ve vereceği hizmeti iptal etmek hakkına sahiptir.</p>
        <p>Madde 4- M&Uuml;ŞTERİ, EDİT&Ouml;R'den talep ettiği ve aldığı &uuml;r&uuml;n ve hizmetler karşılığında, aldığı &uuml;r&uuml;nler ya da hizmetleri beğenmeme, yeterli g&ouml;rmeme ya da verilen hizmetin ve teslim alınan hizmetin beklentilerini karşılamaması durumunda veya elde ettiği &uuml;r&uuml;n ve hizmetlerin hukuki ve teknik niteliği hakkında EDİT&Ouml;R'den hi&ccedil;bir maddi ya da manevi tazminat talep etmeyeceğini ve hizmet karşılığı &ouml;dediği &uuml;creti geri isteyemeceğini, kabul   ve taahh&uuml;d eder.</p>
        <p>Madde 5- Taraflar işbu s&ouml;zleşme &ccedil;er&ccedil;evesinde ortaya &ccedil;ıkması muhtemel uyuşmazlıklarda, işbu s&ouml;zleşme h&uuml;k&uuml;mlerini, bu h&uuml;k&uuml;mler &ccedil;er&ccedil;evesinde elektronik ortamda yapılan yazışmaları, kabul, teyit ve onama anlamına gelen her t&uuml;rl&uuml; imzalı, imzasız ya da e-imzalı yazışmaları, doldurulan e-formları, faks ya da diğer her t&uuml;rl&uuml; belgelerin delil niteliği taşıdığını şmdiden kabul ve taahh&uuml;t ederleri .</p>
        <p>M&uuml;şteri tarafından yapılan ilk başvuru e mail adresi ile ilgili kişisel sahiplik bilgileri kendisine ait olmasa dahi EDİT&Ouml;R tarafından bu bilinen e-mail adresiyle yapılmış her t&uuml;rl&uuml; yazışmalar M&Uuml;ŞTERİ tarafından kabul edilmiş ve onaylanmış yazışma olarak kabul edilir.&nbsp;</p>
        <p>Madde 6- Web sitesi nin ayrı bir b&ouml;l&uuml;m&uuml;nde ya da işbu s&ouml;zleşmenin herhangi bir yerinde gizlilik anlaşması h&uuml;k&uuml;mleri, t&uuml;ketici haklarına ilişkin yasal zorunluluklar nedeni ile konulan her t&uuml;rl&uuml; uyarı h&uuml;k&uuml;mleri iş bu s&ouml;zleşmenin ayrılmaz bir par&ccedil;ası olup, bu h&uuml;k&uuml;mlere ve uyarı notlarına aykırı davranışlar işbu s&ouml;zleşme h&uuml;k&uuml;mlerine aykırılık teşkil eder.&nbsp;</p>
        <p>İŞLEYİŞ, &Ouml;DEME VE HİZMETTEN CAYMA HALİ</p>
        <p>Madde 7- M&Uuml;ŞTERİ ve EDİT&Ouml;R arasında hizmet verme ve/veya &uuml;r&uuml;n satış s&uuml;recinin başlayabilmesi i&ccedil;in M&Uuml;ŞTERİ &ouml;ncelikle işbu s&ouml;zleşmeyi www.aquacora.com.tr web sitesinin ilgili sayfasından, tam olarak okuduğunu, anladığını ve kabul ettiğini onaylayarak; talep ettiği hizmet ve/veya &uuml;r&uuml;nlerin ne olduğu hakkındaki bilgileri i&ccedil;eren formu tam ve eksiksiz olarak doldurmakla y&uuml;k&uuml;ml&uuml;d&uuml;r. Hizmet prosed&uuml;rleri ve yasal   gereklilikler nedeniyle, M&Uuml;ŞTERİ'nin aynı form i&ccedil;inde "isim, soyad, (T&uuml;rk Vatandaşları i&ccedil;in) TC Kimlik Numarası, Vergi Numarası, e-posta adresi, telefon numarası ve fatura adresini" beyan etmesi zorunludur.&nbsp;</p>
        <p>S&ouml;z konusu verilerin teknik veya başka bir nedenden dolayı, EDİT&Ouml;R'e hi&ccedil; ulaşmaması ya da eksik olarak ulaşması halinde, EDİT&Ouml;R, M&Uuml;ŞTERİ'den bu veri ve bilgileri net ve tam olarak yollamasını isteme hak ve yetkisine sahiptir.</p>
        <p>Madde 8- M&Uuml;ŞTERİ talep ettiği &uuml;r&uuml;n ve /veya hizmet t&uuml;r&uuml;ne ilişkin bilgiler ile 7. maddede belirtilen bilgileri ilettikten sonra, hizmet ve / veya &uuml;r&uuml;n i&ccedil;in &ouml;ng&ouml;r&uuml;len &uuml;creti EDİT&Ouml;R'&uuml;n banka hesabına havale, EFT, kredi kartı ya da sanal pos ile yatırır. M&Uuml;ŞTERİ s&ouml;z konusu &ouml;demenin detay bilgilerini e-posta ya da web sitesi &uuml;zerinden EDİT&Ouml;R'e bildirir.</p>
        <p>Madde 9- M&Uuml;ŞTERİ tarafından yapılan &ouml;demenin banka hesabına ge&ccedil;mesinin ardından EDİT&Ouml;R, talep edilen hizmet ile ilgili faaliyetlere en kısa s&uuml;re i&ccedil;inde başlayıp, &ouml;ng&ouml;r&uuml;len s&uuml;re i&ccedil;inde M&Uuml;ŞTERİ&rsquo;ye teslim eder. Hizmet talebine ilişkin faaliyetler sırasında s&uuml;re uzaması s&ouml;z konusu olduğunda EDİT&Ouml;R &ouml;nceden belirtilen s&uuml;reyi uzatma hakkına sahiptir.&nbsp;</p>
        <p>M&Uuml;ŞTERİ, EDİT&Ouml;R den web sitesinde sunulan hizmet ve &uuml;r&uuml;nler dışında, ek ya da başkaca hizmet ve &uuml;r&uuml;n istediği takdirde ya da sunulan hizmet ve &uuml;r&uuml;nler i&ccedil;in ek terc&uuml;me hizmeti talep etmesi halinde bu hizmet ve &uuml;r&uuml;nlerin M&Uuml;ŞTERİ ye sunulması ve / veya teslimi ya da ek terc&uuml;me işlemleri i&ccedil;in EDİT&Ouml;R ek s&uuml;re ve &uuml;cret isteme hakkına sahiptir.&nbsp;</p>
        <p>M&Uuml;ŞTERİ&rsquo;nin EDİT&Ouml;R&rsquo;den mesai g&uuml;nleri dışında acil olarak istediği hizmet ve &uuml;r&uuml;nler i&ccedil;in EDİT&Ouml;R &uuml;n ek &uuml;cret ve s&uuml;re isteme hakkı saklıdır. EDİT&Ouml;R'e iletilen her t&uuml;rl&uuml; taleplerde ve yapılan &ouml;demelerde, işin başlangı&ccedil; zamanı pazartesi g&uuml;n&uuml; saat 09:00 olarak kabul edilir. Hafta i&ccedil;inde saat 16:30'dan sonra yapılan g&ouml;nderi ve &ouml;demelerde de işin başlangı&ccedil; saati, o  g&uuml;n&uuml; takip eden mesai g&uuml;n&uuml;nde saat 09:00 olarak kabul edilir.&nbsp;</p>
        <p>Madde 10- EDİT&Ouml;R, M&Uuml;ŞTERİ'nin faturasını, e-posta ya da diğer posta aracılığıyla ALICI'nın belirttiği fatura adresine g&ouml;nderir. EDİT&Ouml;R, fatura bilgilerindeki M&Uuml;ŞTERİ kaynaklı hatalardan ve posta g&ouml;nderisinin yolda ya da M&Uuml;ŞTERİ'nin adresine teslimi sırasında kaybolmasından sorumlu değildir.&nbsp;</p>
        <p>EDİT&Ouml;R tarafından kabul edilen olası &uuml;cret iadesi durumlarında, M&Uuml;ŞTERİ'nin parasını geri alabilmesi i&ccedil;in kendisine EDİT&Ouml;R tarafından yollanan faturayı elden ya da posta ile iade etmesi zorunludur. Fatura iadesi yapılmayan işlemlerde, EDİT&Ouml;R &uuml;n &uuml;cret iadesi yapma y&uuml;k&uuml;ml&uuml;l&uuml;ğ&uuml; bulunmamaktadır.&nbsp;</p>
        <p>Olası &uuml;cret iadesi işlemlerinde her t&uuml;rl&uuml; posta, kargo vb ulaşım &uuml;cretleri ile banka havale, EFT vb. masraflarının karşılanması M&Uuml;ŞTERİ'nin sorumluluğundadır.</p>
        <p>Madde 11- EDİT&Ouml;R, bu s&ouml;zleşmenin "Genel Şartlar, Madde 3" b&ouml;l&uuml;m&uuml;nde belirtilen hak ve yetkileri &ccedil;er&ccedil;evesinde, bir işi kendi isteğiyle iptal ettiğinde, M&Uuml;ŞTERİ'nin kendisine &ouml;dediği &uuml;creti, M&Uuml;ŞTERİ'nin belirttiği banka hesabına geri yatırır. Bu &uuml;cret iadesi sunulan bir hizmet e ilişkin olup da hizmetle ilgili araştırma işlemlerine başlanmış ise yatırılan &uuml;cretin yarısı iade edilir. Bu işlemlerde banka para aktarım masrafları   (havale, EFT vb masraflar) M&Uuml;ŞTERİ'ye aittir. EDİT&Ouml;R, hi&ccedil;bir koşul ve durum altında M&Uuml;ŞTERİ'ye, M&Uuml;ŞTERİ'nin kendisine &ouml;dediği &uuml;cretin &uuml;st&uuml;nde bir &ouml;deme yapmaz.</p>
        <p>&nbsp;</p>
        <p>S&Ouml;ZLEŞME H&Uuml;K&Uuml;MLERİ VE ŞARTLARDA DEĞİŞİKLİK ile H&Uuml;K&Uuml;M BOŞLUĞU</p>
        <p>EDİT&Ouml;R, işbu s&ouml;zleşme ve s&ouml;zleşmeye konu web sitesi i&ccedil;eriklerinde, sunulan hizmet ve &uuml;r&uuml;nlerin &uuml;cretlerinde g&uuml;n&uuml;n şartlarına ve durumun gereklerine g&ouml;re tek taraflı h&uuml;k&uuml;m, beyan ve miktar değişikliği yapma hakkına sahiptir. S&ouml;zl&uuml; değişikliklere itibar edilmez.&nbsp;</p>
        <p>İşbu maddede değinilen değişiklikler nedeni ile M&Uuml;ŞTERİ tarafından herhangi bir itirazda bulunulamaz.&nbsp;</p>
        <p>S&ouml;zleşmede h&uuml;k&uuml;m bulunmayan hallerde genel hukuk kuralları uygulanır.</p>
        <p>&nbsp;</p>
        <p>S&Ouml;ZLEŞME DİLİ ve TERC&Uuml;MESİ</p>
        <p>İşbu s&ouml;zleşme ve s&ouml;zleşmenin konusunu oluşturan web sitesi i&ccedil;eriği uluslar arası karakterli bir s&ouml;zleşme ve web sitesi olup olup, EDİT&Ouml;R, bu s&ouml;zleşmenin ya da web sitesinin T&uuml;rk&ccedil;e dili dışında , almanca, İngilizce ve rusca gibi diğer dillere &ccedil;evirme ve m&uuml;şterilerin hizmetine sunma hakkına sahiptir. Terc&uuml;melerdeki uyuşmazlık halinde almanca ve t&uuml;rk&ccedil;e metinlerine itibar edilir.</p>
        <p>&nbsp;</p>
        <p>UYUŞMAZLIKLARIN &Ccedil;&Ouml;Z&Uuml;M&Uuml;</p>
        <p>İşbu s&ouml;zleşmeden doğan uyuşmazlıklarda T&uuml;rk Hukuku uygulanır. Uyuşmazlıkların &ccedil;&ouml;z&uuml;m&uuml; i&ccedil;in Antalya Mahkemeleri ve İcra daireleri yetkilidir.</p>
        <p>&nbsp;</p>
        <p>TEBLİGAT</p>
        <p>Tarafların işbu s&ouml;zleşmenin başında belirttikleri ve/veya M&Uuml;ŞTERİ tarafından başvuru formunda ya da e mail yolu EDİT&Ouml;R &lsquo;e bildirdiği fatura adresi ya da adresleri tebligata elverişli adresleri olup, herhangi bir değişikliğin, değişiklikten itibaren 10 g&uuml;n i&ccedil;inde EDİT&Ouml;R&rsquo;e yazılı olarak e mail ya da posta yolu ile bildirilmemesi halinde bu adreslere yapılan tebligatlar ulaşsın ulaşmasın hukuken ge&ccedil;erli bir tebligat olarak kabul   edilir.&nbsp;</p>
        <p>Taraflar arasında yapılan işbu s&ouml;zleşme karşılıklı olarak okunarak, M&Uuml;ŞTERİ nin a&ccedil;ık ve &ouml;zg&uuml;r iradesi ile elektronik ortamda kabul edilip onaylanmakla y&uuml;r&uuml;rl&uuml;ğe girmiştir. Taraflar, s&ouml;zleşmenin elektronik ortamda onayının, s&ouml;zleşmenin kabul&uuml; ve imzası anlamına geldiğini kabul ederler.</p>
        <p>&nbsp; &nbsp;</p>
        <p>EDİT&Ouml;R &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; M&Uuml;ŞTERİ</p>
        <p>AQUACORA &nbsp;Su arıtma sistemleri&nbsp;</p>
        <p>www.aquacora.com.tr &nbsp;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
      </div>
    </div>
  </div>
</div>
