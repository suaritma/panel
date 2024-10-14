  function getlocationfilter() {
    let dropdown = $('#filter-cities');
    dropdown.empty();
    dropdown.append('<option selected="true" disabled>İl Seçiniz</option>');
    dropdown.prop('selectedIndex', 0);
    const url = '../_json/pk_il.json';
    $.getJSON(url, function(data) {
      for (var i = 0; i < data.length; i++) {
        if (window.filtercity !== 0) {
            if (window.filtercity == data[i].id) {
                dropdown.append($('<option selected></option>').attr('value', data[i].id).text(data[i].name));
            } else {
                dropdown.append($('<option></option>').attr('value', data[i].id).text(data[i].name));
            }
        } else {
            dropdown.append($('<option></option>').attr('value', data[i].id).text(data[i].name));
        }
      }
    });
    $("#filter-cities").change(function() {
      let dropdown = $('#filter-towns');
      dropdown.empty();
      dropdown.append('<option selected="true" disabled>İlçe Seçiniz</option>');
      dropdown.prop('selectedIndex', 0);
      dropdown.prop('disabled', false);
      const url = '../_json/pk_ilce.json';
      $.getJSON(url, function(data) {
        for (var i = 0; i < data.length; i++) {
          if (data[i].il_id == $("#filter-cities").val()) {
            if (window.filtertown !== 0) {
                if (window.filtertown == data[i].id) {
                    dropdown.append($('<option selected></option>').attr('value', data[i].id).text(data[i].name));
                } else {
                    dropdown.append($('<option></option>').attr('value', data[i].id).text(data[i].name));
                }
            } else {
                dropdown.append($('<option></option>').attr('value', data[i].id).text(data[i].name));
            }
          }
        }
      });
    });
    $("#filter-towns").change(function() {
      $('#option-droup-demo').empty();
      var cmr = [];
      $.getJSON('../_json/pk_semt.json', function(data) {
        for (var i = 0; i < data.length; i++) {
          if (data[i].ilce_id == $("#filter-towns").val()) {
            $('<optgroup id="rc' + data[i].id + '" label=" => ' + data[i].name + '"></optgroup>').appendTo("#option-droup-demo");
            cmr.push(data[i].id);
          }
        }
      });
      $.getJSON('../_json/pk_mahalle.json', function(data) {
        for (var i = 0; i < data.length; i++) {
          if (cmr.indexOf(data[i].semt_id)>=0) {
            if (window.filtersemt !== 0) {
                var cool = window.filtersemt + '';
                cool = cool.split(',');
                if (cool.indexOf(data[i].id) != -1) {
                    $('<option selected value="' + data[i].id + '">' + data[i].name + '</option>').appendTo("#rc" + data[i].semt_id);
                } else {
                    $('<option value="' + data[i].id + '">' + data[i].name + '</option>').appendTo("#rc" + data[i].semt_id);
                }
            } else {
                $('<option value="' + data[i].id + '">' + data[i].name + '</option>').appendTo("#rc" + data[i].semt_id);
            }
          }
        }
        $('#option-droup-demo').multiselect({
          enableClickableOptGroups: true,
          enableCollapsibleOptGroups: true,
          collapseOptGroupsByDefault: true
        });
        $('#option-droup-demo').multiselect("rebuild");
      });
    });
  }
function goto(url, name, id, check) {
  if (check==1) {
    if (window.confirm("Bu işlemi yapmak istediğinize emin misiniz?")) {
      $('<form action="' + url + '" method="POST"><input type="hidden" name="process" value="' + name + '"><input type="hidden" name="process_id" value="' + id + '"></form>').appendTo('body').submit();
    }
  } else {
    $('<form action="' + url + '" method="POST"><input type="hidden" name="process" value="' + name + '"><input type="hidden" name="process_id" value="' + id + '"></form>').appendTo('body').submit();
  }
}
function pagination(url, name, id) {
  $('<form action="' + url + '" method="POST"><input type="hidden" name="' + name + '" value="' + id + '"></form>').appendTo('body').submit();
}
function getfulldealeraddress() {
  $.getJSON('../_json/pk_all_min.json', function(data) {
    var src = $('#city').text() + '-' + $('#town').text() + '-' + $('#district').text() + '-' + $('#street').text();
    for (var i = 0; i < data.length; i++) {
      if (data[i].id == src) {
        var res = data[i].name.split('-');
        $('#city').text(res[0]);
        $('#town').text(res[1]);
        $('#district').text(res[2]);
        $('#street').text(res[3]);
      }
    }
  });
}
function getcitydealeraddress() {
  $.getJSON('../_json/pk_il.json', function(data) {
    $('.city').each(function(i, obj) {
      var c = $(this).text() - 1;
      $(this).text(data[c].name);
    });
  });
}
function getcitycustomeraddress() {
  $.getJSON('../_json/pk_il.json', function(data) {
    $('.city').each(function(i, obj) {
      var c = $(this).text() - 1;
      $(this).text(data[c].name);
    });
  });
  $.getJSON('../_json/pk_ilce.json', function(data) {
    $('.town').each(function(i, obj) {
      var c = $(this).text() - 1;
      $(this).text(data[c].name);
    });
  });
}
function getlocationforms() {
  let dropdown = $('#city');
  dropdown.empty();
  dropdown.append('<option selected="true" disabled>İl Seçiniz</option>');
  dropdown.prop('selectedIndex', 0);
  const url = '../_json/pk_il.json';
  $.getJSON(url, function(data) {
    for (var i = 0; i < data.length; i++) {
      dropdown.append($('<option></option>').attr('value', data[i].id).text(data[i].name));
    }
  });
  $("#city").change(function() {
    let dropdown = $('#town');
    dropdown.empty();
    dropdown.append('<option selected="true" disabled>İlçe Seçiniz</option>');
    dropdown.prop('selectedIndex', 0);
    dropdown.prop('disabled', false);
    const url = '../_json/pk_ilce.json';
    $.getJSON(url, function(data) {
      for (var i = 0; i < data.length; i++) {
        if (data[i].il_id == $("#city").val()) {
          dropdown.append($('<option></option>').attr('value', data[i].id).text(data[i].name));
        }
      }
    });
  });
  $("#town").change(function() {
    let dropdown = $('#district');
    dropdown.empty();
    dropdown.append('<option selected="true" disabled>Semt Seçiniz</option>');
    dropdown.prop('selectedIndex', 0);
    dropdown.prop('disabled', false);
    const url = '../_json/pk_semt.json';
    $.getJSON(url, function(data) {
      for (var i = 0; i < data.length; i++) {
        if (data[i].ilce_id == $("#town").val()) {
          dropdown.append($('<option></option>').attr('value', data[i].id).text(data[i].name));
        }
      }
    });
  });
  $("#district").change(function() {
    let dropdown = $('#street');
    dropdown.empty();
    dropdown.append('<option selected="true" disabled>Mahalle/Köy Seçiniz</option>');
    dropdown.prop('selectedIndex', 0);
    dropdown.prop('disabled', false);
    const url = '../_json/pk_mahalle.json';
    $.getJSON(url, function(data) {
      for (var i = 0; i < data.length; i++) {
        if (data[i].semt_id == $("#district").val()) {
          dropdown.append($('<option></option>').attr('value', data[i].id).text(data[i].name));
        }
      }
    });
  });
  $("#street").change(function() {
    var postalcode = $("#street").val();
    const url = '../_json/pk_postakodu.json';
    $.getJSON(url, function(data) {
      for (var i = 0; i < data.length; i++) {
        if (data[i].mahalle_id == postalcode) {
          $("#postalcode").val(data[i].kod);
        }
      }
    });
  });
}
function getlocationformsz() {
  let dropdown = $('#cityz');
  dropdown.empty();
  dropdown.append('<option selected="true" disabled>İl Seçiniz</option>');
  dropdown.prop('selectedIndex', 0);
  const url = '../_json/pk_il.json';
  $.getJSON(url, function(data) {
    for (var i = 0; i < data.length; i++) {
      dropdown.append($('<option></option>').attr('value', data[i].id).text(data[i].name));
    }
  });
  $("#cityz").change(function() {
    let dropdown = $('#townz');
    dropdown.empty();
    dropdown.append('<option selected="true" disabled>İlçe Seçiniz</option>');
    dropdown.prop('selectedIndex', 0);
    dropdown.prop('disabled', false);
    const url = '../_json/pk_ilce.json';
    $.getJSON(url, function(data) {
      for (var i = 0; i < data.length; i++) {
        if (data[i].il_id == $("#cityz").val()) {
          dropdown.append($('<option></option>').attr('value', data[i].id).text(data[i].name));
        }
      }
    });
  });
  $("#townz").change(function() {
    let dropdown = $('#districtz');
    dropdown.empty();
    dropdown.append('<option selected="true" disabled>Semt Seçiniz</option>');
    dropdown.prop('selectedIndex', 0);
    dropdown.prop('disabled', false);
    const url = '../_json/pk_semt.json';
    $.getJSON(url, function(data) {
      for (var i = 0; i < data.length; i++) {
        if (data[i].ilce_id == $("#townz").val()) {
          dropdown.append($('<option></option>').attr('value', data[i].id).text(data[i].name));
        }
      }
    });
  });
  $("#districtz").change(function() {
    let dropdown = $('#streetz');
    dropdown.empty();
    dropdown.append('<option selected="true" disabled>Mahalle/Köy Seçiniz</option>');
    dropdown.prop('selectedIndex', 0);
    dropdown.prop('disabled', false);
    const url = '../_json/pk_mahalle.json';
    $.getJSON(url, function(data) {
      for (var i = 0; i < data.length; i++) {
        if (data[i].semt_id == $("#districtz").val()) {
          dropdown.append($('<option></option>').attr('value', data[i].id).text(data[i].name));
        }
      }
    });
  });
  $("#streetz").change(function() {
    var postalcode = $("#streetz").val();
    const url = '../_json/pk_postakodu.json';
    $.getJSON(url, function(data) {
      for (var i = 0; i < data.length; i++) {
        if (data[i].mahalle_id == postalcode) {
          $("#postalcodez").val(data[i].kod);
          $("#postalcodez").prop('disabled', false);
        }
      }
    });
    $("#mahalleid").val(postalcode);
  });
}
function getcompanydealer() {
  let company = $('#company');
  company.empty();
  company.append('<option selected="true" disabled>Firma Seçiniz</option>');
  company.prop('selectedIndex', 0);
  $.getJSON('../_json/get_company_info.php', function(data) {
    for (var i = 0; i < data.length; i++) {
      company.append($('<option></option>').attr('value', data[i].id).text(data[i].name));
    }
  });

  $("#company").change(function() {
    var comp_id = $('#company').val();
    let dealer = $('#dealer');
    dealer.empty();
    dealer.append('<option selected="true" disabled>Bayi Seçiniz</option>');
    dealer.prop('selectedIndex', 0);
    dealer.prop('disabled', false);
    $.getJSON('../_json/get_dealer_info.php?id=' + comp_id, function(data) {
      for (var i = 0; i < data.length; i++) {
        dealer.append($('<option></option>').attr('value', data[i].id).text(data[i].title));
      }
    });
  });
}
function getcategorydevices() {
  let category = $('#category');
  category.empty();
  category.append('<option selected="true" disabled>Kategori Seçiniz</option>');
  category.prop('selectedIndex', 0);
  $.getJSON('../_json/get_category_info.php', function(data) {
    for (var i = 0; i < data.length; i++) {
      category.append($('<option></option>').attr('value', data[i].id).text(data[i].title));
    }
  });

  $("#category").change(function() {
    var cat_id = $('#category').val();
    let device = $('#device');
    device.empty();
    device.append('<option selected="true" disabled>Ürün Seçiniz</option>');
    device.prop('selectedIndex', 0);
    device.prop('disabled', false);
    $.getJSON('../_json/get_device_info.php?id=' + cat_id, function(data) {
      for (var i = 0; i < data.length; i++) {
        device.append($('<option></option>').attr('value', data[i].id).text(data[i].name + ' (' + data[i].manufacturer + ')'));
      }
    });
  });
}

function add_location() {
	$("#open_city").change(function() {
    	if(this.checked) {
    		$('#new_city').prop('disabled', false);
    	} else {
    		$('#new_city').prop('disabled', true);
    	}
	});
	$("#open_town").change(function() {
    	if(this.checked) {
    		$('#new_district').prop('disabled', false);
    	} else {
    		$('#new_district').prop('disabled', true);
    	}
	});
	$("#open_street").change(function() {
    	if(this.checked) {
    		$('#new_street').prop('disabled', false);
    	} else {
    		$('#new_street').prop('disabled', true);
    	}
	});
}

function getaddresstoform(il, ilce, semt, mahalle, ext) {
  $('#city'+ext).empty();
  $('#city'+ext).append('<option disabled>İl Seçiniz</option>');
  $('#city'+ext).prop('selectedIndex', 0);
  $.getJSON('../_json/pk_il.json', function(data) {
    for (var i = 0; i < data.length; i++) {
      if (data[i].id == il) {
        $('#city'+ext).append($('<option selected="true"></option>').attr('value', data[i].id).text(data[i].name));
      } else {
        $('#city'+ext).append($('<option></option>').attr('value', data[i].id).text(data[i].name));
      }
    }
  });
  $('#town'+ext).empty();
  $('#town'+ext).append('<option disabled>İlçe Seçiniz</option>');
  $('#town'+ext).prop('selectedIndex', 0);
  $.getJSON('../_json/pk_ilce.json', function(data) {
    for (var i = 0; i < data.length; i++) {
      if (data[i].id == ilce && data[i].il_id == il) {
        $('#town'+ext).append($('<option selected="true"></option>').attr('value', data[i].id).text(data[i].name));
      } else if (data[i].il_id == il) {
        $('#town'+ext).append($('<option></option>').attr('value', data[i].id).text(data[i].name));
      }
    }
  });
  $('#district'+ext).empty();
  $('#district'+ext).append('<option disabled>Semt Seçiniz</option>');
  $('#district'+ext).prop('selectedIndex', 0);
  $.getJSON('../_json/pk_semt.json', function(data) {
    for (var i = 0; i < data.length; i++) {
      if (data[i].id == semt && data[i].ilce_id == ilce) {
        $('#district'+ext).append($('<option selected="true"></option>').attr('value', data[i].id).text(data[i].name));
      } else if (data[i].ilce_id == ilce) {
        $('#district'+ext).append($('<option></option>').attr('value', data[i].id).text(data[i].name));
      }
    }
  });
  $('#street'+ext).empty();
  $('#street'+ext).append('<option disabled>Mahalle/Köy Seçiniz</option>');
  $('#street'+ext).prop('selectedIndex', 0);
  $.getJSON('../_json/pk_mahalle.json', function(data) {
    for (var i = 0; i < data.length; i++) {
      if (data[i].id == mahalle && data[i].semt_id == semt) {
        $('#street'+ext).append($('<option selected="true"></option>').attr('value', data[i].id).text(data[i].name));
      } else if (data[i].semt_id == semt) {
        $('#street'+ext).append($('<option></option>').attr('value', data[i].id).text(data[i].name));
      }
    }
  });
  var postalcode = mahalle;
  $.getJSON('../_json/pk_postakodu.json', function(data) {
    for (var i = 0; i < data.length; i++) {
      if (data[i].mahalle_id == postalcode) {
        $("#postalcode"+ext).val(data[i].kod);
      }
    }
  });
  $("#city"+ext).change(function() {
    let dropdown = $('#town'+ext);
    dropdown.empty();
    dropdown.append('<option selected="true" disabled>İlçe Seçiniz</option>');
    dropdown.prop('selectedIndex', 0);
    dropdown.prop('disabled', false);
    const url = '../_json/pk_ilce.json';
    $.getJSON(url, function(data) {
      for (var i = 0; i < data.length; i++) {
        if (data[i].il_id == $("#city"+ext).val()) {
          dropdown.append($('<option></option>').attr('value', data[i].id).text(data[i].name));
        }
      }
    });
  });

  $("#town"+ext).change(function() {
    let dropdown = $('#district'+ext);
    dropdown.empty();
    dropdown.append('<option selected="true" disabled>Semt Seçiniz</option>');
    dropdown.prop('selectedIndex', 0);
    dropdown.prop('disabled', false);
    const url = '../_json/pk_semt.json';
    $.getJSON(url, function(data) {
      for (var i = 0; i < data.length; i++) {
        if (data[i].ilce_id == $("#town"+ext).val()) {
          dropdown.append($('<option></option>').attr('value', data[i].id).text(data[i].name));
        }
      }
    });
  });
  $("#district"+ext).change(function() {
    let dropdown = $('#street'+ext);
    dropdown.empty();
    dropdown.append('<option selected="true" disabled>Mahalle/Köy Seçiniz</option>');
    dropdown.prop('selectedIndex', 0);
    dropdown.prop('disabled', false);
    const url = '../_json/pk_mahalle.json';
    $.getJSON(url, function(data) {
      for (var i = 0; i < data.length; i++) {
        if (data[i].semt_id == $("#district"+ext).val()) {
          dropdown.append($('<option></option>').attr('value', data[i].id).text(data[i].name));
        }
      }
    });
  });
  $("#street"+ext).change(function() {
    var postalcode = $("#street"+ext).val();
    const url = '../_json/pk_postakodu.json';
    $.getJSON(url, function(data) {
      for (var i = 0; i < data.length; i++) {
        if (data[i].mahalle_id == postalcode) {
          $("#postalcode"+ext).val(data[i].kod);
        }
      }
    });
  });
}
