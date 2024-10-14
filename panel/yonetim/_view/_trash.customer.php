



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-card margin-b-30 ">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Silinmiş Müşteriler</h4>
            </div>
            <div class="panel-body">
                        <!-- Silinen Müşterileri geri alma sile sayfası -->

              <table id="myTable" class="table table-striped">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Bayisi</th>
                          <th>Adı Soyadı</th>
                          <th>GSM</th>
                          <th>Şehir</th>
                          <th>Eklenme Tarihi</th>
                     <!-- sıralama için deneme yapıldı aşağıda javascript kodları eklendi  -->
                          <th onclick="sortTable()">Silinme Tarihi</th>
                          <th>İşlemler</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($result_deleted)) {
                          foreach($result_deleted as $res) { ?>
                      <tr>
                          <td><?=$res['id']?></td>
                          <td><?=$res['title']?></td>
                          <td>
                            <!-- burası çalışmıyor link çalışmıyor-->
                            <a onclick="goto('<?=ADMIN_URL?>customers/view','<?=$res['id']?>')" href="javascript:void(0)">
                              <?=$res['firstname']?> <?=$res['lastname']?>
                            </a>
                          </td>
                          <td><?=$res['gsm']?></td>
                          <td><?=$res['city']?></td>
                          <td><?=date("d/m/Y H:i:s", $res['created_at'])?></td>
                          <td><?=date("d/m/Y H:i:s", $res['deleted_at'])?></td>
                          <td>
                            <div>
                              <a href="../musteri_gerial.php?id=<?=$res['id']?>" onclick="goto('<?=ADMIN_URL?>trash/customer','reload','<?=$res['id']?>','0')"><button type="button" class="btn btn-success btn-xs">Geri Yükle</button> </span></a>
              
                              <a href="../musteri_sil.php?id=<?=$res['id']?>" onclick="goto('<?=ADMIN_URL?>trash/customer','delete','<?=$res['id']?>','1')"><span><button type="button" class="btn btn-danger btn-xs">Sil</button></span></a>
                            </div>
                          </td>
                      </tr>
                    <?php } } else { ?>
                    <tr>
                      <td colspan="9">
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
<script>
  function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[2];
      y = rows[i + 1].getElementsByTagName("TD")[2];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
</script>