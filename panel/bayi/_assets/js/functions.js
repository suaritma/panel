// Kredi kartı ödeme ektanı alt hesaplaması 

$(document).ready(function() {
    if( navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
     console.log('notmobile');
    } else {
        var viewportWidthRun = $(window).width();
        if (viewportWidthRun<=1200) {
            $('.extsub').hide();
            $('.nav.navbar-nav ul > li > a').css('text-indent', '0');
        } else {
            $('.extsub').show();
        }
        $(window).resize(function() {
            var viewportWidth = $(window).width();
            if (viewportWidth<=1182) {
                $('.extsub').hide();
                $('.nav.navbar-nav ul > li > a').css('text-indent', '0');
            } else {
                $('.extsub').show();
            }
        });
    }
  let DEALER_URL = 'https://www.aquacora.com.tr/panel/bayi/';
  if (window.location.hash) {
    $("a[href='" + window.location.hash + "']").tab('show');
  }
  $('#device').change(function(){
    $('#cihaz_bedeli').val($("#device option:selected").data('price'));
  });
  function formatDate(date,ext) {
    date = new Date(date);
    var c_d = (date.getDate()<9?'0':'') + date.getDate();
    var c_m = (date.getMonth()<9?'0':'') + (date.getMonth() + 1);
    var c_y = date.getFullYear();
    if (ext==1) {
      var c_h = (date.getHours()<9?'0':'') + date.getHours();
      var c_i = (date.getMinutes()<9?'0':'') + date.getMinutes();
      var c_s = (date.getSeconds()<9?'0':'') + date.getSeconds();
      return c_d + '/' + c_m + '/' + c_y + ' ' + c_h + ':' + c_i + ':' + c_s;
    } else {
      return c_d + '/' + c_m + '/' + c_y;
    }
  }
  $('#taksit_sayisi').on('change', function() {
    var hesap = ($('#toplam_bedeli').val() - $('#pesinat').val()) / $(this).val();
    $('#taksit_tutari').val(hesap);
  });
  $('#toggle-filter').click(function() {
    $("div.customers-filter").slideToggle();
  });
  $(".modal").on("hidden.bs.modal", function() {
    $(this).removeData();
  });
  //if ($("#device_for_service").val()); // sayfa yüklendiğinde servisi çeksin
  $("#device_for_service").change(function() {
    let inside = $('#device_for_service_inside');
    inside.removeData();
    inside.load('../_json/get_service_info.php?customer_device_id=' + $('#device_for_service').val());
  });
  $("#device_for_service").trigger("change");
  $('#period_checkbox').click(function(){
    if ( $( this ).is( ":checked" ) ) {
      $('#set_per_1').prop('disabled',true);
      $('#set_per_2').prop('disabled',false);
    } else {
      $('#set_per_1').prop('disabled',false);
      $('#set_per_2').prop('disabled',true);
    }
  });
  $('.storeLocation').click(function(){
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition( success, fail );
    } else {
      alert("Sorry, your browser does not support geolocation services.");
    }
    function success(position) {
      $('<form method="post" action="' + DEALER_URL + 'customers/view#location"><input type="hidden" name="process" value="location_add" /><input type="hidden" name="id" value="' + $('#customer_id').html() + '" /><input type="hidden" name="lat" value="' + position.coords.latitude + '" /><input type="hidden" name="lon" value="' + position.coords.longitude + '" /></form>').appendTo('body').submit();
    }
    function fail() { }
  });
  $('#amount_whole').keyup(function(){
    var value = $('input[name=installment]:checked').val();
    if (value == null){ value=0; }
    var type = $('input[name=payment_type]:checked').val();
    var amount = $('#amount_whole').val();
    if (!amount){ amount=0; }
    payment_calc(value,amount,type);
  });
  $('.pay_checkers').click(function(){
    var value = $('input[name=installment]:checked').val();
    if (value == null){ value=0; }
    var type = $('input[name=payment_type]:checked').val();
    var amount = $('#amount_whole').val();
    if (!amount){ amount=0; }
    if ($(this).data('iframe')==1) {
        $('#editkk').hide();
        $('#editcc').hide();
        $('#card_code').val('0000000000000000');
        $('#cvc').val('000');
    } else {
        $('#editkk').show();
        $('#editcc').show();
        $('#card_code').val('');
        $('#cvc').val('');
    }
    payment_calc(value,amount,type);
  });
  $('input[name=payment_type]').click(function(){
    var value = $('input[name=installment]:checked').val();
    if (value == null){ value=0; }
    var type = $('input[name=payment_type]:checked').val();
    var amount = $('#amount_whole').val();
    if (!amount){ amount=0; }
    payment_calc(value,amount,type);
  });
  function payment_calc(value,amount,type) {
    var taksit = $('#span_' + $('input[name=installment]:checked').attr('id')).data('taksit');
    var value = parseFloat(value);
    var amount = parseFloat(amount);
    var type = parseFloat(type);
    if (type==1) {
      var karttan_cekilecek = amount;
      var komisyon_tutari =  (amount / 100) * value;
      var hesaba_gececek = amount - komisyon_tutari;
    } else {
      var hesaba_gececek = amount;
      var kom = (amount / 100) * value;
      var komisyon_tutari = kom;
      var karttan_cekilecek = amount + kom;
    }
      $('.amountPerInst').each(function() {
        var taksitc = $(this).data('taksit');
        var valuec = $(this).data('value');
        if (type==1) {
          var taksit_tutari = amount / taksitc;
        } else {
          var komc = (amount / 100) * valuec;
          var taksit_tutari = (amount + komc) / taksitc;
        }
        $(this).html(taksit_tutari.toFixed(2) + ' TL');
      });
    $('.dataPaymentBody').html('<td>' + value.toFixed(2) +' %</td><td>' + taksit + ' Taksit</td><td>' + karttan_cekilecek.toFixed(2) + ' TL</td><td>' + hesaba_gececek.toFixed(2) + ' TL</td><td>' + komisyon_tutari.toFixed(2) + ' TL</td>');
    $('#cr').val(taksit);
  }

});
