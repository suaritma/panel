<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Müşteri Cihaz Listesi</h3>
            </div>
      
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Adı Soyadı</th>
                <th>Telefon</th>
                <th><?=$lang['city2']?></th>
                <th>Son Servis Tarihi</th>
                <th>Sonraki Servis Tarihi</th>
                <th>Son Servis Tipi</th>
                </tr>
                </thead>
                
                
                
                
                <tbody>
               
                <?php
                while ($cihazim = $sorgum->fetch_assoc()) {
                ?>

                 
             <tr>
                <td>
                <a onclick="goto('<?=DEALER_URL?>customers/view','none','<?=$cihazim['id']?>','0','0')" href="javascript:void(0)">
                <?php echo $cihazim['firstname']." ".$cihazim['lastname']?></td>
                </a>
                <td><?php echo $cihazim['gsm']?></td>
               
 <td><?php 
 if ($cihazim['city']==1) { echo "Adana"; }
 if ($cihazim['city']==2) { echo "Adıyaman"; }
 if ($cihazim['city']==3) {echo "Afyonkarahisar"; }
 if ($cihazim['city']==4) {echo "Ağrı"; }
 if ($cihazim['city']==5) {echo "Amasya"; }
 if ($cihazim['city']==6) {echo "Ankara"; }
 if ($cihazim['city']==7) {echo "Antalya"; }
 if ($cihazim['city']==8) {echo "Artvin"; }
 if ($cihazim['city']==9) {echo "Aydın"; }
 if ($cihazim['city']==10) {echo "Balıkesir"; }
 if ($cihazim['city']==11) {echo "Bilecik"; }
 if ($cihazim['city']==12) {echo "Bingöl"; }
 if ($cihazim['city']==13) {echo "Bitlis"; }
 if ($cihazim['city']==14) {echo "Bolu"; }
 if ($cihazim['city']==15) {echo "Burdur"; }
 if ($cihazim['city']==16) {echo "Bursa"; }
 if ($cihazim['city']==17) {echo "Çanakkale"; }
 if ($cihazim['city']==18) {echo "Çankırı"; }
 if ($cihazim['city']==19) {echo "Çorum"; }
 if ($cihazim['city']==20) {echo "Denizli"; }
 if ($cihazim['city']==21) {echo "Diyarbakır"; }
 if ($cihazim['city']==22) {echo "Edirne"; }
 if ($cihazim['city']==23) {echo "Elazığ"; }
 if ($cihazim['city']==24) {echo "Erzincan"; }
 if ($cihazim['city']==25) {echo "Erzurum"; }
 if ($cihazim['city']==26) {echo "Eskişehir"; }
 if ($cihazim['city']==27) {echo "Gaziantep"; }
 if ($cihazim['city']==28) {echo "Giresun"; }
 if ($cihazim['city']==29) {echo "Gümüşhane"; }
 if ($cihazim['city']==30) {echo "Hakkari"; }
 if ($cihazim['city']==31) {echo "Hatay"; }
 if ($cihazim['city']==32) {echo "Isparta"; }
 if ($cihazim['city']==33) {echo "İçel"; }
 if ($cihazim['city']==34) {echo "İstanbul"; }
 if ($cihazim['city']==35) {echo "İzmir"; }
 if ($cihazim['city']==36) {echo "Kars"; }
 if ($cihazim['city']==37) {echo "Kastamonu"; }
 if ($cihazim['city']==38) {echo "Kayseri"; }
 if ($cihazim['city']==39) {echo "Kırklareli"; }
 if ($cihazim['city']==40) {echo "Kırşehir"; }
 if ($cihazim['city']==41) {echo "Kocaeli"; }
 if ($cihazim['city']==42) {echo "Konya"; }
 if ($cihazim['city']==43) {echo "Kütahya"; }
 if ($cihazim['city']==44) {echo "Malatya"; }
 if ($cihazim['city']==45) {echo "Manisa"; }
 if ($cihazim['city']==46) {echo "Kahramanmaraş"; }
 if ($cihazim['city']==47) {echo "Mardin"; }
 if ($cihazim['city']==48) {echo "Muğla"; }
 if ($cihazim['city']==49) {echo "Muş"; }
 if ($cihazim['city']==50) {echo "Nevşehir"; }
 if ($cihazim['city']==51) {echo "Niğde"; }
 if ($cihazim['city']==52) {echo "Ordu"; }
 if ($cihazim['city']==53) {echo "Rize"; }
 if ($cihazim['city']==54) {echo "Sakarya"; }
 if ($cihazim['city']==55) {echo "Samsun"; }
 if ($cihazim['city']==56) {echo "Siirt"; }
 if ($cihazim['city']==57) {echo "Sinop"; }
 if ($cihazim['city']==58) {echo "Sivas"; }
 if ($cihazim['city']==59) {echo "Tekirdağ"; }
 if ($cihazim['city']==60) {echo "Tokat"; }
 if ($cihazim['city']==61) {echo "Trabzon"; }
 if ($cihazim['city']==62) {echo "Tunceli"; }
 if ($cihazim['city']==63) {echo "Şanlıurfa"; }
 if ($cihazim['city']==64) {echo "Uşak"; }
 if ($cihazim['city']==65) {echo "Van"; }
 if ($cihazim['city']==66) {echo "Yozgat"; }
 if ($cihazim['city']==67) {echo "Zonguldak"; }
 if ($cihazim['city']==68) {echo "Aksaray"; }
 if ($cihazim['city']==69) {echo "Bayburt"; }
 if ($cihazim['city']==70) {echo "Karaman"; }
 if ($cihazim['city']==71) {echo "Kırıkkale"; }
 if ($cihazim['city']==72) {echo "Batman"; }
 if ($cihazim['city']==73) {echo "Şırnak"; }
 if ($cihazim['city']==74) {echo "Bartın"; }
 if ($cihazim['city']==75) {echo "Ardahan"; }
 if ($cihazim['city']==76) {echo "Iğdır"; }
 if ($cihazim['city']==77) {echo "Yalova"; }
 if ($cihazim['city']==78) {echo "Karabük"; }
 if ($cihazim['city']==79) {echo "Kilis"; }
 if ($cihazim['city']==80) {echo "Osmaniye"; }
 if ($cihazim['city']==81) {echo "Düzce"; }
 ?>
                
                
                
              
          
        
         <form></span>

                
                </td>
                <td><?php
                if ($cihazim['sonservistah']==0) {
                  echo "yok";
                }else {
                  echo date("d/m/Y",$cihazim['sonservistah']);
                }
                
                ?></td>
                <td><?php
                 if ($cihazim['sonrakisertah']==0) {
                  echo "yok";
                }else {
                  echo date("d/m/Y",$cihazim['sonrakisertah']);
                }
                ?></td>

                <td><?php 
                if ($cihazim['sonsertip']==1) {
                  echo "Montaj";
                }if ($cihazim['sonsertip']==2) {
                  echo "Servis";
                } if ($cihazim['sonsertip']==3) {
                  echo "Arıza";
                } 
                ?></td>
            </tr>
            <?php } ?>
        </tbody>
      
                
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

 

    <!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
