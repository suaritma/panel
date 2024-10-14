<?php
if ((isset($_GET['rid'])) && (!empty($_GET['rid']))) {
include('db.php');
$rid=mysqli_real_escape_string($con, $_GET['rid']);
$p=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `payments` WHERE `id` = '$rid'"));
require('html2pdf/html2pdf.class.php');
$content = file_get_contents('html2pdf/_tcpdf_'.HTML2PDF_USED_TCPDF_VERSION.'/cache/utf8test.txt');
$content = '
    <style type="text/css">
    	body { font-size:11px; color: #000; font-family: Arial;  }
    	.content {  width:1170px; margin:0 auto; padding-top: 40px;  font-size:12px; color: #000;  }
    	.content .names { font-size:14px; }
    	.cc-area { background-color: #e3e3e3; border:1px solid #333;  height: 30px; text-align: center; }
    	.cc-area-blank { border:1px solid #333;  height: 30px; text-align: center; }
    	.customer-sign { border:1px solid #333; }
    	.customer-sign tr td { border-right: 1px solid #333; }
    	.customer-sign tr td:last-child { border-right: none; }
    	.cc-info { border:1px solid #333; width: 100%; }
    	.cc-info .cc-border { border-right: 1px solid #333; }
    </style>
  <page>
<div style="width:1170px; margin:0 auto; padding: 40px 0;">
  <table width="100%" style="font-size:12px;">
    <tbody>
      <tr>
        <td width="33%" cellpadding="5" cellspacing="5" valign="top">
        <br><br>
          <strong>AQUACORA Su Arıtma Sistemleri</strong> <br><br>
          <strong>Merkez : </strong> Merkez: Ostim OSB Mahallesi <br>1213 sk. No 1 Taksim 19<br><br>
          <strong>OSTİM V.D 42371032686</strong><br>
          <strong>TİCARET SİCİL NO : ANKARA / 251886</strong><br>
        </td>
        <td width="33%" valign="top" align="center">
          <h3>TAHSİLAT <br> MAKBUZU</h3>
          <table width="90%" style="height: 30px; border:1px solid #e3e3e3; padding:10px 10px; margin:0 auto; font-size:12px; text-align: right;">
            <tbody>
              <tr>
                <td>
                  <span style="font-size: 24px;">Durum: <strong>Tamamlandı</strong>&emsp;'.$p['amount'].'<strong>TL</strong></span>
                </td>
              </tr>
            </tbody>
          </table>
          <br>
          <br>
          <table width="90%" style="font-size:12px;">
            <tbody>
              <tr>
                <td>
                  <strong>Ankara Merkez</strong>
                </td>
                <td>
                  <strong>:</strong>
                </td>
                <td>bilgi@aquacora.com.tr</td>
              </tr>
            </tbody>
          </table>
        </td>
        <td width="33%" valign="top" style="font-size:12px;">
          <table width="80%">
            <tbody>
              <tr>
                <td style="font-size:12px;">
                  SERİ : <span style="font-size:20px; font-weight: bold;"></span>
                </td>
              </tr>
              <tr>
                <td style="font-size:12px;">
                  SIRA NO : <span style="font-size:24px;"></span>
                </td>
              </tr>
              <tr>
                <td style="font-size:12px;">TARİH : </td>
              </tr>
              <tr>
                <td>
                  <div style="height:30px;"></div>
                </td>
              </tr>
              <tr>
                <td style="font-size:12px;">
                  <strong>K.KARTI : ( x ) &nbsp;&nbsp; Onay No :</strong>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <div style="height:20px;"></div>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <br>
  <table width="100%" cellpadding="5" cellspacing="5">
    <tbody>
      <tr>
        <td class="cc-area" style="font-size:12px; font-weight: bold;">KART TİPİ</td>
        <td class="cc-area" style="font-size:12px; font-weight: bold;">BANKA</td>
        <td class="cc-area" style="font-size:12px; font-weight: bold;">KART NO</td>
        <td class="cc-area" style="font-size:12px; font-weight: bold;">TAKSİT</td>
        <td class="cc-area" style="font-size:12px; font-weight: bold;">TUTAR</td>
      </tr>
      <tr>
        <td class="cc-area-blank" style="font-size:12px;">KK</td>
        <td class="cc-area-blank" style="font-size:12px;"></td>
        <td class="cc-area-blank" style="font-size:12px;">-****-****-</td>
        <td class="cc-area-blank" style="font-size:12px;"></td>
        <td class="cc-area-blank" style="font-size:12px;"> TL</td>
      </tr>
    </tbody>
  </table>
  <br>
  <br>
  <b><b></b> bayisinin <b>AQUACORA Su Arıtma Sistemleri</b> \'ne olan <b> TL</b> tutarındaki borcunun tarafımca ödenmesine muvafakat ederim.</b>
  <br>
  <br>
  <table width="100%" cellpadding="5" cellspacing="5" class="cc-info">
    <tbody>
      <tr>
        <td class="cc-border" width="60%" style="font-size:12px;">
          <strong>Kart Sahibinin</strong>
          <br>
          <br>
          <strong>Adı Soyadı</strong> : 
        </td>
        <td class="cc-border" width="5%" style="font-size:12px;">
          <strong>Kart <br>Sahibi<br> İmzası</strong>
        </td>
        <td width="35%">
          &nbsp;
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <table width="100%" cellpadding="5" cellspacing="5" class="cc-info" style="font-size:12px;">
    <tbody>
      <tr>
        <td class="cc-border" width="60%">
          <strong>Tahsil Eden</strong> <br><br>
          <strong>KAŞE / İMZA</strong> <br><br>
        </td>
        <td width="40%">
          <strong>Müşteri / Bayi</strong> <br><br>
          Adı Soyadı : <br><br>
          İmza :
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <table width="100%" cellpadding="5" cellspacing="5" class="cc-info" style="font-size:12px;">
    <tbody>
      <tr>
        <td class="cc-border" width="60%">
          <strong>Ödeme Notu</strong>
          <br>
          <br>
        </td>
      </tr>
    </tbody>
  </table>
</div>
'.nl2br($content).'
  </page>';
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'tr', true, 'UTF-8', []);
        $html2pdf->setDefaultFont('arialunicid0');
        $html2pdf->writeHTML($content);
        $html2pdf->Output('Makbuz.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
} else {
    echo "Hata Oluştu!";   
}
?>