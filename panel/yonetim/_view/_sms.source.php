<div class="row">
    <div class="col-md-12">
      <div class="alert alert-info">
        <strong>Müşteri Değişkenleri</strong> ( [isim], [eposta], [gsm] ) - <strong>Bayi Değişkenleri</strong> ( [bayi_isim], [bayi_eposta], [bayi_gsm] )
      </div>
        <div class="panel panel-card margin-b-30">
            <div class="panel-body" >
                <div id="accordion">
                    <h3>Montaj SMS - <span style="font-size:10px"><strong>Özel Değişkenler</strong> ( [cihaz_isim], [cihaz_marka], [cihaz_fiyat] )</span></h3>
                    <div>
                      <div class="tabs-container">
                        <ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> Müşteri</a></li>
                          <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Bayi</a></li>
                        </ul>
                        <div class="tab-content">
                          <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                              <form class="form-horizontal" method="post">
                              <input type="hidden" name="process" value="add" />
                                <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                  <div class="col-lg-10"><input name="1_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['1_title']?>"></div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                  <div class="col-lg-10"><textarea name="1_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['1_content']?></textarea></div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                  <div class="col-lg-10"><select name="1_status" class="form-control m-b" value="<?=@$set['1_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                </div>
                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-sm btn-primary" type="submit" name="1_set" value="1">Kaydet</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                          <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                              <form class="form-horizontal" method="post">
                              <input type="hidden" name="process" value="add" />
                                <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                  <div class="col-lg-10"><input name="2_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['2_title']?>"></div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                  <div class="col-lg-10"><textarea name="2_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['2_content']?></textarea></div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="2_status" class="form-control m-b" value="<?=@$set['2_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                </div>
                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-sm btn-primary" type="submit" name="2_set" value="1">Kaydet</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <h3>Servis Bakım SMS - <span style="font-size:10px"><strong>Özel Değişkenler</strong> ( [cihaz_isim], [cihaz_marka], [cihaz_fiyat], [servis_fiyat] )</span></h3>
                    <div>
                      <div class="tabs-container">
                          <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#tab-3" aria-expanded="true"> Müşteri</a></li>
                              <li class=""><a data-toggle="tab" href="#tab-4" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                              <div id="tab-3" class="tab-pane active">
                                  <div class="panel-body">
                                      <form class="form-horizontal" method="post">
                              <input type="hidden" name="process" value="add" />
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                            <div class="col-lg-10"><input name="3_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['3_title']?>"></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                            <div class="col-lg-10"><textarea name="3_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['3_content']?></textarea></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                              <div class="col-lg-10"><select name="3_status" class="form-control m-b" value="<?=@$set['3_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                  <button class="btn btn-sm btn-primary" type="submit" name="3_set" value="1">Kaydet</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                              <div id="tab-4" class="tab-pane">
                                  <div class="panel-body">
                                      <form class="form-horizontal" method="post">
                              <input type="hidden" name="process" value="add" />
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                            <div class="col-lg-10"><input name="4_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['4_title']?>"></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                            <div class="col-lg-10"><textarea name="4_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['4_content']?></textarea></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                              <div class="col-lg-10"><select name="4_status" class="form-control m-b" value="<?=@$set['4_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                  <button class="btn btn-sm btn-primary" type="submit" name="4_set" value="1">Kaydet</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <h3>Arıza kayıt SMS</h3>
                    <div>
                      <div class="tabs-container">
                          <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#tab-5" aria-expanded="true"> Müşteri</a></li>
                              <li class=""><a data-toggle="tab" href="#tab-6" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                              <div id="tab-5" class="tab-pane active">
                                  <div class="panel-body">
                                      <form class="form-horizontal" method="post">
                              <input type="hidden" name="process" value="add" />
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                            <div class="col-lg-10"><input name="5_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['5_title']?>"></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                            <div class="col-lg-10"><textarea name="5_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['5_content']?></textarea></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                              <div class="col-lg-10"><select name="5_status" class="form-control m-b" value="<?=@$set['5_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                  <button class="btn btn-sm btn-primary" type="submit" name="5_set" value="1">Kaydet</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                              <div id="tab-6" class="tab-pane">
                                  <div class="panel-body">
                                      <form class="form-horizontal" method="post">
                              <input type="hidden" name="process" value="add" />
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                            <div class="col-lg-10"><input name="6_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['6_title']?>"></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                            <div class="col-lg-10"><textarea name="6_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['6_content']?></textarea></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                              <div class="col-lg-10"><select name="6_status" class="form-control m-b" value="<?=@$set['6_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                  <button class="btn btn-sm btn-primary" type="submit" name="6_set" value="1">Kaydet</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <h3>Bayram / Özel Gün SMS</h3>
                    <div>
                      <div class="tabs-container">
                          <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#tab-7" aria-expanded="true"> Müşteri</a></li>
                              <li class=""><a data-toggle="tab" href="#tab-8" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                              <div id="tab-7" class="tab-pane active">
                                  <div class="panel-body">
                                      <form class="form-horizontal" method="post">
                              <input type="hidden" name="process" value="add" />
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                            <div class="col-lg-10"><input name="7_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['7_title']?>"></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                            <div class="col-lg-10"><textarea name="7_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['7_content']?></textarea></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                              <div class="col-lg-10"><select name="7_status" class="form-control m-b" value="<?=@$set['7_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                  <button class="btn btn-sm btn-primary" type="submit" name="7_set" value="1">Kaydet</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                              <div id="tab-8" class="tab-pane">
                                  <div class="panel-body">
                                      <form class="form-horizontal" method="post">
                              <input type="hidden" name="process" value="add" />
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                            <div class="col-lg-10"><input name="8_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['8_title']?>"></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                            <div class="col-lg-10"><textarea name="8_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['8_content']?></textarea></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                              <div class="col-lg-10"><select name="8_status" class="form-control m-b" value="<?=@$set['8_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                  <button class="btn btn-sm btn-primary" type="submit" name="8_set" value="1">Kaydet</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <h3>Kampanya SMS</h3>
                    <div>
                      <div class="tabs-container">
                          <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#tab-9" aria-expanded="true"> Müşteri</a></li>
                              <li class=""><a data-toggle="tab" href="#tab-10" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                              <div id="tab-9" class="tab-pane active">
                                  <div class="panel-body">
                                      <form class="form-horizontal" method="post">
                              <input type="hidden" name="process" value="add" />
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                            <div class="col-lg-10"><input name="9_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['9_title']?>"></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                            <div class="col-lg-10"><textarea name="9_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['9_content']?></textarea></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                              <div class="col-lg-10"><select name="9_status" class="form-control m-b" value="<?=@$set['9_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                  <button class="btn btn-sm btn-primary" type="submit" name="9_set" value="1">Kaydet</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                              <div id="tab-10" class="tab-pane">
                                  <div class="panel-body">
                                      <form class="form-horizontal" method="post">
                              <input type="hidden" name="process" value="add" />
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                            <div class="col-lg-10"><input name="10_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['10_title']?>"></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                            <div class="col-lg-10"><textarea name="10_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['10_content']?></textarea></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                              <div class="col-lg-10"><select name="10_status" class="form-control m-b" value="<?=@$set['10_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                  <button class="btn btn-sm btn-primary" type="submit" name="10_set" value="1">Kaydet</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <h3>Servis Periyodu SMS - <span style="font-size:10px"><strong>Özel Değişkenler</strong> ( [cihaz_isim], [cihaz_marka] )</span></h3>
                    <div>
                      <div class="tabs-container">
                          <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#tab-11" aria-expanded="true"> Müşteri</a></li>
                              <li class=""><a data-toggle="tab" href="#tab-12" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                              <div id="tab-11" class="tab-pane active">
                                  <div class="panel-body">
                                      <form class="form-horizontal" method="post">
                              <input type="hidden" name="process" value="add" />
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                            <div class="col-lg-10"><input name="11_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['11_title']?>"></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                            <div class="col-lg-10"><textarea name="11_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['11_content']?></textarea></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                              <div class="col-lg-10"><select name="11_status" class="form-control m-b" value="<?=@$set['11_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                  <button class="btn btn-sm btn-primary" type="submit" name="11_set" value="1">Kaydet</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                              <div id="tab-12" class="tab-pane">
                                  <div class="panel-body">
                                      <form class="form-horizontal" method="post">
                              <input type="hidden" name="process" value="add" />
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                            <div class="col-lg-10"><input name="12_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['12_title']?>"></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                            <div class="col-lg-10"><textarea name="12_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['12_content']?></textarea></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                              <div class="col-lg-10"><select name="12_status" class="form-control m-b" value="<?=@$set['12_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                  <button class="btn btn-sm btn-primary" type="submit" name="12_set" value="1">Kaydet</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <h3>Doğum Günü SMS</h3>
                    <div>
                      <div class="tabs-container">
                          <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#tab-13" aria-expanded="true"> Müşteri</a></li>
                              <li class=""><a data-toggle="tab" href="#tab-14" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                              <div id="tab-13" class="tab-pane active">
                                  <div class="panel-body">
                                      <form class="form-horizontal" method="post">
                                      <input type="hidden" name="process" value="add" />
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                            <div class="col-lg-10"><input name="13_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['13_title']?>"></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                            <div class="col-lg-10"><textarea name="13_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['13_content']?></textarea></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                              <div class="col-lg-10"><select name="13_status" class="form-control m-b" value="<?=@$set['13_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                  <button class="btn btn-sm btn-primary" type="submit" name="13_set" value="1">Kaydet</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                              <div id="tab-14" class="tab-pane">
                                  <div class="panel-body">
                                      <form class="form-horizontal" method="post">
                              <input type="hidden" name="process" value="add" />
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                            <div class="col-lg-10"><input name="14_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['14_title']?>"></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                            <div class="col-lg-10"><textarea name="14_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['14_content']?></textarea></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                              <div class="col-lg-10"><select name="14_status" class="form-control m-b" value="<?=@$set['14_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                  <button class="btn btn-sm btn-primary" type="submit" name="14_set" value="1">Kaydet</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <h3>Arıza İşlendi SMS</h3>
                    <div>
                      <div class="tabs-container">
                          <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#tab-15" aria-expanded="true"> Müşteri</a></li>
                              <li class=""><a data-toggle="tab" href="#tab-16" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                              <div id="tab-15" class="tab-pane active">
                                  <div class="panel-body">
                                      <form class="form-horizontal" method="post">
                              <input type="hidden" name="process" value="add" />
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                            <div class="col-lg-10"><input name="15_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['15_title']?>"></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                            <div class="col-lg-10"><textarea name="15_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['15_content']?></textarea></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                              <div class="col-lg-10"><select name="15_status" class="form-control m-b" value="<?=@$set['15_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                  <button class="btn btn-sm btn-primary" type="submit" name="15_set" value="1">Kaydet</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                              <div id="tab-16" class="tab-pane">
                                  <div class="panel-body">
                                      <form class="form-horizontal" method="post">
                              <input type="hidden" name="process" value="add" />
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                            <div class="col-lg-10"><input name="16_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['16_title']?>"></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                            <div class="col-lg-10"><textarea name="16_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['16_content']?></textarea></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                              <div class="col-lg-10"><select name="16_status" class="form-control m-b" value="<?=@$set['16_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                  <button class="btn btn-sm btn-primary" type="submit" name="16_set" value="1">Kaydet</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <h3>Ödeme SMS - <span style="font-size:10px"><strong>Özel Değişkenler</strong> ( [odeme_tutari], [odeme_komisyon], [odeme_aktarilan], [odeme_taksit] )</span></h3>
                    <div>
                      <div class="tabs-container">
                          <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#tab-17" aria-expanded="true"> Başarılı</a></li>
                              <li class=""><a data-toggle="tab" href="#tab-18" aria-expanded="false">Başarısız</a></li>
                          </ul>
                          <div class="tab-content">
                              <div id="tab-17" class="tab-pane active">
                                  <div class="panel-body">
                                      <form class="form-horizontal" method="post">
                              <input type="hidden" name="process" value="add" />
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                            <div class="col-lg-10"><input name="17_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['17_title']?>"></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                            <div class="col-lg-10"><textarea name="17_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['17_content']?></textarea></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                              <div class="col-lg-10"><select name="17_status" class="form-control m-b" value="<?=@$set['17_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                  <button class="btn btn-sm btn-primary" type="submit" name="17_set" value="1">Kaydet</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                              <div id="tab-18" class="tab-pane">
                                  <div class="panel-body">
                                      <form class="form-horizontal" method="post">
                              <input type="hidden" name="process" value="add" />
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                            <div class="col-lg-10"><input name="18_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['18_title']?>"></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                            <div class="col-lg-10"><textarea name="18_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['18_content']?></textarea></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                              <div class="col-lg-10"><select name="18_status" class="form-control m-b" value="<?=@$set['18_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                  <button class="btn btn-sm btn-primary" type="submit" name="18_set" value="1">Kaydet</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <h3>Hoşgeldin SMS</h3>
                    <div>
                      <div class="tabs-container">
                          <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="tab" href="#tab-19" aria-expanded="true"> Müşteri</a></li>
                              <li class=""><a data-toggle="tab" href="#tab-20" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                              <div id="tab-19" class="tab-pane active">
                                  <div class="panel-body">
                                      <form class="form-horizontal" method="post">
                              <input type="hidden" name="process" value="add" />
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                            <div class="col-lg-10"><input name="19_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['19_title']?>"></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                            <div class="col-lg-10"><textarea name="19_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['19_content']?></textarea></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                              <div class="col-lg-10"><select name="19_status" class="form-control m-b" value="<?=@$set['19_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                  <button class="btn btn-sm btn-primary" type="submit" name="19_set" value="1">Kaydet</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                              <div id="tab-20" class="tab-pane">
                                  <div class="panel-body">
                                      <form class="form-horizontal" method="post">
                              <input type="hidden" name="process" value="add" />
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                            <div class="col-lg-10"><input name="20_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['20_title']?>"></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                            <div class="col-lg-10"><textarea name="20_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['20_content']?></textarea></div>
                                          </div>
                                          <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                              <div class="col-lg-10"><select name="20_status" class="form-control m-b" value="<?=@$set['20_status']?>"><option value="1">Aktif</option><option value="0">Pasif</option></select></div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                  <button class="btn btn-sm btn-primary" type="submit" name="20_set" value="1">Kaydet</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
