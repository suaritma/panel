var options = {
  url: "../_json/pk_all_min.json",

  getValue: "name",

  list: {
    match: {
      enabled: true
    }
  }
};
if (typeof $("#street_search").easyAutocomplete === "function") { 
    $("#street_search").easyAutocomplete(options);
}

$("#street-search-button").click(function() {
  var setri = $("#street_search").val();
  const url = '../_json/pk_all_min.json';
  $.getJSON(url, function(data) {
    var search = JSON.search(data, '//*[name="' + setri + '"]');
    var cmd = search[0].id.split('-');
    var smt = search[0].name.split('-');
    let dropdowncity = $('#cityz');
    let dropdowntown = $('#townz');
    let dropdowndistrict = $('#districtz');
    let dropdownstreet = $('#streetz');
    dropdowntown.empty();
    dropdowndistrict.empty();
    dropdownstreet.empty();
    dropdowncity.val(cmd[0]);
    dropdowntown.append($('<option selected></option>').attr('value', cmd[1]).text(smt[1]));
    dropdowndistrict.append($('<option selected></option>').attr('value', cmd[2]).text(smt[2]));
    dropdownstreet.append($('<option selected></option>').attr('value', cmd[3]).text(smt[3]));
    $("#streetz").trigger("change");
  });
});