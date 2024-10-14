<div class="row margin-b-30">
  <div class="col-md-12">
    <div class="alert alert-info">
      <strong>Müşteri Değişkenleri</strong> ( [isim], [eposta], [gsm] ) - <strong>Bayi Değişkenleri</strong> ( [bayi_isim], [bayi_eposta], [bayi_gsm] ) - <strong>Genel Değişkenler</strong> ( [cihaz_isim], [cihaz_marka] )
    </div>
    <div class="tabs-container">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#tab-eposta" aria-expanded="true"> E-Posta</a></li>
        <li class=""><a data-toggle="tab" href="#tab-sms" aria-expanded="false"> SMS</a></li>
        <li class=""><a data-toggle="tab" href="#tab-notification" aria-expanded="false"> Bildirim</a></li>
      </ul>
      <div class="tab-content">
        <div id="tab-eposta" class="tab-pane active">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-card margin-b-30">
                  <div class="panel-body">
                    <div id="accordion">
                      <h3>Montaj E-Posta</h3>
                      <div>
                        <div class="tabs-container">
                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1-e" aria-expanded="true"> Müşteri</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2-e" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="tab-1-e" class="tab-pane active">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="1_1_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['1_1_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="1_1_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['1_1_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="1_1_status" class="form-control m-b"><option value="1"<?php if (@$set['1_1_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['1_1_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="1_1_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div id="tab-2-e" class="tab-pane">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="1_2_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['1_2_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="1_2_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['1_2_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="1_2_status" class="form-control m-b"><option value="1"<?php if (@$set['1_2_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['1_2_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="1_2_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <h3>Servis Bakım E-Posta</h3>
                      <div>
                        <div class="tabs-container">
                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-3-e" aria-expanded="true"> Müşteri</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-4-e" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="tab-3-e" class="tab-pane active">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="1_3_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['1_3_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="1_3_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['1_3_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="1_3_status" class="form-control m-b"><option value="1"<?php if (@$set['1_3_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['1_3_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="1_3_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div id="tab-4-e" class="tab-pane">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="1_4_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['1_4_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="1_4_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['1_4_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="1_4_status" class="form-control m-b"><option value="1"<?php if (@$set['1_4_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['1_4_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="1_4_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <h3>Arıza kayıt E-Posta</h3>
                      <div>
                        <div class="tabs-container">
                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-5-e" aria-expanded="true"> Müşteri</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-6-e" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="tab-5-e" class="tab-pane active">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="1_5_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['1_5_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="1_5_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['1_5_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="1_5_status" class="form-control m-b"><option value="1"<?php if (@$set['1_5_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['1_5_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="1_5_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div id="tab-6-e" class="tab-pane">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="1_6_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['1_6_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="1_6_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['1_6_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="1_6_status" class="form-control m-b"><option value="1"<?php if (@$set['1_6_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['1_6_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="1_6_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <h3>Servis Periyodu E-Posta</h3>
                      <div>
                        <div class="tabs-container">
                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-7-e" aria-expanded="true"> Müşteri</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-8-e" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="tab-7-e" class="tab-pane active">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="1_7_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['1_7_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="1_7_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['1_7_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="1_7_status" class="form-control m-b"><option value="1"<?php if (@$set['1_7_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['1_7_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="1_7_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div id="tab-8-e" class="tab-pane">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="1_8_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['1_8_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="1_8_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['1_8_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="1_8_status" class="form-control m-b"><option value="1"<?php if (@$set['1_8_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['1_8_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="1_8_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <h3>Arıza İşlendi E-Posta</h3>
                      <div>
                        <div class="tabs-container">
                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-9-e" aria-expanded="true"> Müşteri</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-10-e" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="tab-9-e" class="tab-pane active">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="1_9_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['1_9_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="1_9_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['1_9_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="1_9_status" class="form-control m-b"><option value="1"<?php if (@$set['1_9_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['1_9_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="1_9_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div id="tab-10-e" class="tab-pane">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="1_10_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['1_10_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="1_10_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['1_10_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="1_10_status" class="form-control m-b"><option value="1"<?php if (@$set['1_10_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['1_10_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="1_10_set" value="<?=$process_id?>">Kaydet</button>
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
          </div>
        </div>
        <div id="tab-sms" class="tab-pane">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-card margin-b-30">
                  <div class="panel-body">
                    <div id="accordion">
                      <h3>Montaj SMS</h3>
                      <div>
                        <div class="tabs-container">
                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1-s" aria-expanded="true"> Müşteri</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2-s" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="tab-1-s" class="tab-pane active">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="2_1_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['2_1_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="2_1_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['2_1_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="2_1_status" class="form-control m-b"><option value="1"<?php if (@$set['2_1_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['2_1_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="2_1_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div id="tab-2-s" class="tab-pane">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="2_2_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['2_2_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="2_2_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['2_2_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="2_2_status" class="form-control m-b"><option value="1"<?php if (@$set['2_2_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['2_2_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="2_2_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <h3>Servis Bakım SMS</h3>
                      <div>
                        <div class="tabs-container">
                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-3-s" aria-expanded="true"> Müşteri</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-4-s" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="tab-3-s" class="tab-pane active">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="2_3_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['2_3_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="2_3_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['2_3_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="2_3_status" class="form-control m-b"><option value="1"<?php if (@$set['2_3_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['2_3_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="2_3_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div id="tab-4-s" class="tab-pane">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="2_4_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['2_4_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="2_4_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['2_4_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="2_4_status" class="form-control m-b"><option value="1"<?php if (@$set['2_4_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['2_4_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="2_4_set" value="<?=$process_id?>">Kaydet</button>
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
                            <li class="active"><a data-toggle="tab" href="#tab-5-s" aria-expanded="true"> Müşteri</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-6-s" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="tab-5-s" class="tab-pane active">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="2_5_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['2_5_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="2_5_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['2_5_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="2_5_status" class="form-control m-b"><option value="1"<?php if (@$set['2_5_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['2_5_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="2_5_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div id="tab-6-s" class="tab-pane">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="2_6_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['2_6_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="2_6_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['2_6_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="2_6_status" class="form-control m-b"><option value="1"<?php if (@$set['2_6_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['2_6_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="2_6_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <h3>Servis Periyodu SMS</h3>
                      <div>
                        <div class="tabs-container">
                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-7-s" aria-expanded="true"> Müşteri</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-8-s" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="tab-7-s" class="tab-pane active">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="2_7_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['2_7_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="2_7_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['2_7_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="2_7_status" class="form-control m-b"><option value="1"<?php if (@$set['2_7_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['2_7_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="2_7_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div id="tab-8-s" class="tab-pane">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="2_8_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['2_8_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="2_8_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['2_8_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="2_8_status" class="form-control m-b"><option value="1"<?php if (@$set['2_8_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['2_8_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="2_8_set" value="<?=$process_id?>">Kaydet</button>
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
                            <li class="active"><a data-toggle="tab" href="#tab-9-s" aria-expanded="true"> Müşteri</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-10-s" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="tab-9-s" class="tab-pane active">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="2_9_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['2_9_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="2_9_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['2_9_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="2_9_status" class="form-control m-b"><option value="1"<?php if (@$set['2_9_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['2_9_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="2_9_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div id="tab-10-s" class="tab-pane">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="2_10_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['2_10_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="2_10_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['2_10_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="2_10_status" class="form-control m-b"><option value="1"<?php if (@$set['2_10_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['2_10_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="2_10_set" value="<?=$process_id?>">Kaydet</button>
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
          </div>
        </div>
        <div id="tab-notification" class="tab-pane">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-card margin-b-30">
                  <div class="panel-body">
                    <div id="accordion">
                      <h3>Montaj Mobil Bildirim</h3>
                      <div>
                        <div class="tabs-container">
                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1-n" aria-expanded="true"> Müşteri</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2-n" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="tab-1-n" class="tab-pane active">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="3_1_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['3_1_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="3_1_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['3_1_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="3_1_status" class="form-control m-b"><option value="1"<?php if (@$set['3_1_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['3_1_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="3_1_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div id="tab-2-n" class="tab-pane">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="3_2_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['3_2_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="3_2_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['3_2_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="3_2_status" class="form-control m-b"><option value="1"<?php if (@$set['3_2_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['3_2_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="3_2_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <h3>Servis Bakım Mobil Bildirim</h3>
                      <div>
                        <div class="tabs-container">
                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-3-n" aria-expanded="true"> Müşteri</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-4-n" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="tab-3-n" class="tab-pane active">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="3_3_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['3_3_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="3_3_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['3_3_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="3_3_status" class="form-control m-b"><option value="1"<?php if (@$set['3_3_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['3_3_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="3_3_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div id="tab-4-n" class="tab-pane">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="3_4_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['3_4_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="3_4_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['3_4_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="3_4_status" class="form-control m-b"><option value="1"<?php if (@$set['3_4_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['3_4_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="3_4_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <h3>Arıza Kayıt Mobil Bildirim</h3>
                      <div>
                        <div class="tabs-container">
                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-5-n" aria-expanded="true"> Müşteri</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-6-n" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="tab-5-n" class="tab-pane active">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="3_5_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['3_5_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="3_5_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['3_5_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="3_5_status" class="form-control m-b"><option value="1"<?php if (@$set['3_5_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['3_5_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="3_5_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div id="tab-6-n" class="tab-pane">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="3_6_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['3_6_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="3_6_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['3_6_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="3_6_status" class="form-control m-b"><option value="1"<?php if (@$set['3_6_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['3_6_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="3_6_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <h3>Servis Periyodu Mobil Bildirim</h3>
                      <div>
                        <div class="tabs-container">
                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-7-n" aria-expanded="true"> Müşteri</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-8-n" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="tab-7-n" class="tab-pane active">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="3_7_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['3_7_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="3_7_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['3_7_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="3_7_status" class="form-control m-b"><option value="1"<?php if (@$set['3_7_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['3_7_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="3_7_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div id="tab-8-n" class="tab-pane">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="3_8_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['3_8_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="3_8_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['3_8_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="3_8_status" class="form-control m-b"><option value="1"<?php if (@$set['3_8_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['3_8_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="3_8_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <h3>Arıza İşlendi Mobil Bildirim</h3>
                      <div>
                        <div class="tabs-container">
                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-9-n" aria-expanded="true"> Müşteri</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-10-n" aria-expanded="false">Bayi</a></li>
                          </ul>
                          <div class="tab-content">
                            <div id="tab-9-n" class="tab-pane active">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="3_9_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['3_9_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="3_9_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['3_9_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="3_9_content" class="form-control m-b"><option value="1"<?php if (@$set['3_9_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['3_9_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="3_9_set" value="<?=$process_id?>">Kaydet</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                            <div id="tab-10-n" class="tab-pane">
                              <div class="panel-body">
                                <form class="form-horizontal" method="post">
                                  <input type="hidden" name="process_id" value="<?=$process_id?>">
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Başlığı</label>
                                    <div class="col-lg-10"><input name="3_10_title" type="text" placeholder="Mesaj Başlığı" class="form-control" value="<?=@$set['3_10_title']?>"></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj İçeriği</label>
                                    <div class="col-lg-10"><textarea name="3_10_content" placeholder="Mesaj İçeriği" class="form-control"><?=@$set['3_10_content']?></textarea></div>
                                  </div>
                                  <div class="form-group"><label class="col-lg-2 control-label">Mesaj Statüsü</label>
                                    <div class="col-lg-10"><select name="3_10_status" class="form-control m-b"><option value="1"<?php if (@$set['3_10_status']==1) { ?> selected<?php } ?>>Aktif</option><option value="0"<?php if (@$set['3_10_status']==0) { ?> selected<?php } ?>>Pasif</option></select></div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                      <button class="btn btn-sm btn-primary" type="submit" name="3_10_set" value="<?=$process_id?>">Kaydet</button>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
