// ----------------------------------------------
// # Search
// ----------------------------------------------
var bodyitem = $('body');
function setBodySmall() {
    if ($(this).width() < 769) {
        bodyitem.addClass('page-small');
    } else {
        bodyitem.removeClass('page-small').removeClass('show-sidebar');
    }
}
!function ($) {
    "use strict";

    (function () {
        var height = $(window).height();
        $("#wrapper").css("min-height", height);
        $('.right-sidebar-toggle').on('click', function () {
            $('#right-sidebar').toggleClass('sidebar-open');
        });

        $('.fa-search').on('click', function () {
            $('.search').fadeIn(500, function () {
                $(this).toggleClass('search-toggle');
            });
        });

        $('.search-close').on('click', function () {
            $('.search').fadeOut(500, function () {
                $(this).removeClass('search-toggle');
            });
        });

    }());

    $(window).on("resize click", function () {
        // Add special class to minimalize page elements when screen is less than 768px
        setBodySmall();
        var height = $(window).height();
        $("#wrapper").css("min-height", height);

    });
   $(document).on("ready", function () {
        setBodySmall();
        $(window).on("load", function () {
            // Remove splash screen after load
            $('.splash').css('display', 'none')
        });

        // Handle minimalize sidebar menu
        $('.navbar-minimalize').on('click', function (event) {
            event.preventDefault();
            if ($(window).width() < 769) {
                bodyitem.toggleClass("show-sidebar");
            } else {
                bodyitem.toggleClass("hide-sidebar");
            }
        });

        // Add body-small class if window less than 768px
        if ($(this).width() < 769) {
           bodyitem.addClass('body-small');
        } else {
            bodyitem.removeClass('body-small');
        }

        // MetsiMenu
        $('#side-menu').metisMenu();

        // Minimalize menu

        $(".nano").nanoScroller();
    });

//------------- Last sales locations -------------//
function homepagemap() {
  $.getJSON('../_json/get_devices_for_map.json', function(data){
    var val = "devices";
    var statesValues = jvm.values.apply({}, jvm.values(data.states));
    $('#world-map').vectorMap({
      map: 'turkey_1_mill_en',
      series: {
        regions: [{
          scale: ['#DEEBF7', '#08519C'],
          attribute: 'fill',
          values: data.states[val],
          min: jvm.min(statesValues),
          max: jvm.max(statesValues)
        }]
      },
      onRegionTipShow: function(event, label, code){
        label.html(
          '<b>'+label.html()+'</b></br>'+
          '<b>Müşteriler: </b>'+data.states['customers'][code]+'</br>'+
          '<b>Cihazlar: </b>'+data.states[val][code]
        );
      }
    });
  });
}

// Panels
    (function ($) {

        $(function () {
            $('.panel')
                    .on('panel:toggle', function () {
                        var $this,
                                direction;

                        $this = $(this);
                        direction = $this.hasClass('panel-collapsed') ? 'Down' : 'Up';

                        $this.find('.panel-body, .panel-footer')[ 'slide' + direction ](200, function () {
                            $this[ (direction === 'Up' ? 'add' : 'remove') + 'Class' ]('panel-collapsed')
                        });
                    })
                    .on('panel:dismiss', function () {
                        var $this = $(this);

                        if (!!($this.parent('div').attr('class') || '').match(/col-(xs|sm|md|lg)/g) && $this.siblings().length === 0) {
                            $row = $this.closest('.row');
                            $this.parent('div').remove();
                            if ($row.children().length === 0) {
                                $row.remove();
                            }
                        } else {
                            $this.remove();
                        }
                    })
                    .on('click', '[data-panel-toggle]', function (e) {
                        e.preventDefault();
                        $(this).closest('.panel').trigger('panel:toggle');
                    })
                    .on('click', '[data-panel-dismiss]', function (e) {
                        e.preventDefault();
                        $(this).closest('.panel').trigger('panel:dismiss');
                    })
                    /* Deprecated */
                    .on('click', '.panel-actions a.fa-caret-up', function (e) {
                        e.preventDefault();
                        var $this = $(this);

                        $this
                                .removeClass('fa-caret-up')
                                .addClass('fa-caret-down');

                        $this.closest('.panel').trigger('panel:toggle');
                    })
                    .on('click', '.panel-actions a.fa-caret-down', function (e) {
                        e.preventDefault();
                        var $this = $(this);

                        $this
                                .removeClass('fa-caret-down')
                                .addClass('fa-caret-up');

                        $this.closest('.panel').trigger('panel:toggle');
                    })
                    .on('click', '.panel-actions a.fa-times', function (e) {
                        e.preventDefault();
                        var $this = $(this);

                        $this.closest('.panel').trigger('panel:dismiss');
                    });
        });

    })(jQuery);

//tooltips
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover()
    });


//waves effects
    Waves.attach('.button-wave', ['waves-button', 'waves-light']);
    Waves.init();
}(window.jQuery);
