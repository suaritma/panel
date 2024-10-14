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

  function getlocationfilter() {
    let dropdown = $('#filter-cities');
    dropdown.empty();
    dropdown.append('<option selected="true" disabled>İl Seçiniz</option>');
    dropdown.prop('selectedIndex', 0);
    const url = '../_json/pk_il.json';
    $.getJSON(url, function(data) {
      for (var i = 0; i < data.length; i++) {
        dropdown.append($('<option></option>').attr('value', data[i].id).text(data[i].name));
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
            dropdown.append($('<option></option>').attr('value', data[i].id).text(data[i].name));
          }
        }
      });
    });
    $("#filter-towns").on("change", function() {
    $('#option-droup-demo').html("");
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
            $('<option value="' + data[i].id + '">' + data[i].name + '</option>').appendTo("#rc" + data[i].semt_id);
          }
        }
        $('#option-droup-demo').multiselect("rebuild");
        $('#option-droup-demo').multiselect({
            buttonContainer: '<div id="example-enableCollapsibleOptGroups-collapsed-container" />',
onDropdownShown: function() {
                $('#example-enableCollapsibleOptGroups-collapsed-container .caret-container').click();
            },
onDropdownHidden: function() {
                $('#example-enableCollapsibleOptGroups-collapsed-container .caret-container').click();
            },
          enableClickableOptGroups: true
        });
      });
    });
  }
  function getfulladdress() {
    $.getJSON('../_json/pk_all_min.json', function(data) {
      for (var i = 0; i < data.length; i++) {
        if (data[i].id == $('#get_customer_address').text()) {
          $("#get_customer_address").text(data[i].name.replace(/-/g, ", "));
          $("#get_customer_address_mobile").text(data[i].name.replace(/-/g, ", "));
        }
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

  var options = {
    url: "../_json/pk_all_min.json",

    getValue: "name",

    list: {
      match: {
        enabled: true
      }
    }
  };
  $("#street_search").easyAutocomplete(options);

  $("#street-search-button").click(function() {
    var setri = $("#street_search").val();
    const url = '../_json/pk_all_min.json';
    $.getJSON(url, function(data) {
      var search = JSON.search(data, '//*[name="' + setri + '"]');
      var cmd = search[0].id.split('-');
      var smt = search[0].name.split('-');
      let dropdowncity = $('#city');
      let dropdowntown = $('#town');
      let dropdowndistrict = $('#district');
      let dropdownstreet = $('#street');
      dropdowntown.empty();
      dropdowndistrict.empty();
      dropdownstreet.empty();
      dropdowncity.val(cmd[0]);
      dropdowntown.append($('<option selected></option>').attr('value', cmd[1]).text(smt[1]));
      dropdowndistrict.append($('<option selected></option>').attr('value', cmd[2]).text(smt[2]));
      dropdownstreet.append($('<option selected></option>').attr('value', cmd[3]).text(smt[3]));
      $("#street").trigger("change");
    });
  });
