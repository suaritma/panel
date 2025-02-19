!function (map) {
    "use strict";
    var months = ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'];
     //line chart
     Morris.Line({
        element: 'morris-line-chart',
        data: [{ m: '2017-06', a: 100, b: 10 },
            { m: '2017-07', a: 75, b: 5 },
            { m: '2017-08', a: 50, b: 4 },
            { m: '2017-09', a: 75, b: 6 },
            { m: '2017-10', a: 50, b: 4 },
            { m: '2017-11', a: 75, b: 1 },
            { m: '2017-12', a: 100, b: 2 } ],
        xkey: 'm',
        ykeys: ['a', 'b'],
        labels: ['Tamamlanan Servisler', 'Geciken Servisler'],
        hideHover: 'auto',
        resize: true,
        xLabelFormat : function (x) {
          return months[x.getMonth()];
        },
        gridTextColor: '#000',
        lineColors: ['#1fbef6','#035673']
    });
    Morris.Line({
       element: 'morris-bar-chart',
       data: [{ m: '2017-06', a: 1012, b: 102 },
           { m: '2017-07', a: 745, b: 5112 },
           { m: '2017-08', a: 5560, b: 41 },
           { m: '2017-09', a: 735, b: 62 },
           { m: '2017-10', a: 520, b: 432 },
           { m: '2017-11', a: 755, b: 153 },
           { m: '2017-12', a: 100, b: 21 } ],
       xkey: 'm',
       ykeys: ['a', 'b'],
       labels: ['Aquacora', 'Aquaela'],
       hideHover: 'auto',
       resize: true,
       xLabelFormat : function (x) {
         return months[x.getMonth()];
       },
       gridTextColor: '#000',
       lineColors: ['#1fbef6','#035673']
   });

    setTimeout(function () {
        chart.load({
            columns: [
                ['data3', 400, 500, 450, 700, 600, 500]
            ]
        });
    }, 1000);

    var chart = c3.generate({
        bindto: '#timeseriesChart',
        data: {
            columns: [
                ['data1', 30, 200, 100, 400, 150, 250],
                ['data2', 50, 20, 10, 40, 15, 25]
            ],
            regions: {
                'data1': [{'start': 1, 'end': 2, 'style': 'dashed'}, {'start': 3}], // currently 'dashed' style only
                'data2': [{'end': 3}]
            }
        }
    });



    setTimeout(function () {
        chart.load({
            columns: [
                ['data2', 400, 500, 450, 700, 600, 500]
            ]
        });
    }, 1000);

    $("#demo-sparkline-area").sparkline([57, 69, 70, 62, 73, 79, 76, 77, 73, 52, 57, 50, 60, 55, 70, 68], {
        type: 'line',
        width: '100%',
        height: '40',
        spotRadius: 5,
        lineWidth: 1.5,
        lineColor: 'rgba(255,255,255,.85)',
        fillColor: 'rgba(0,0,0,0.03)',
        spotColor: 'rgba(255,255,255,.5)',
        minSpotColor: 'rgba(255,255,255,.5)',
        maxSpotColor: 'rgba(255,255,255,.5)',
        highlightLineColor: '#ffffff',
        highlightSpotColor: '#ffffff',
        tooltipChartTitle: 'Usage',
        tooltipSuffix: ' %'

    });


    $("#sparkline8").sparkline([5, 6, 7, 2, 0, 4, 2, 4, 5, 7, 2, 4, 12, 14, 4, 2, 14, 12, 7], {
        type: 'bar',
        barWidth: 15,
        height: '150px',
        barColor: '#149957',
        negBarColor: '#40b87b'});
    $(".sparkline8").sparkline([4, 2], {
        type: 'pie',
        sliceColors: ['#01a8fe', '#ddd']
    });
    $(".sparkline9").sparkline([3, 2], {
        type: 'pie',
        sliceColors: ['#01a8fe', '#ddd']
    });
    $(".sparkline10").sparkline([4, 1], {
        type: 'pie',
        sliceColors: ['#01a8fe', '#ddd']
    });
    $(".sparkline11").sparkline([1, 3], {
        type: 'pie',
        sliceColors: ['#01a8fe', '#ddd']
    });
    $(".sparkline12").sparkline([3, 5], {
        type: 'pie',
        sliceColors: ['#01a8fe', '#ddd']
    });
    $(".sparkline13").sparkline([6, 2], {
        type: 'pie',
        sliceColors: ['#01a8fe', '#ddd']
    });

//moris chart
    $(function () {


        if ($('#c-weather')[0]) {
            $.simpleWeather({
                location: 'Austin, TX',
                woeid: '',
                unit: 'f',
                success: function (weather) {
                    var html = '<div class="cw-current media">' +
                            '<div class="pull-left cwc-icon cwci-' + weather.code + '"></div>' +
                            '<div class="cwc-info media-body">' +
                            '<div class="cwci-temp">' + weather.temp + '&deg;' + weather.units.temp + '</div>' +
                            '<ul class="cwci-info">' +
                            '<li>' + weather.city + ', ' + weather.region + '</li>' +
                            '<li>' + weather.currently + '</li>' +
                            '</ul>' +
                            '</div>' +
                            '</div>' +
                            '<div class="cw-upcoming"></div>';

                    $("#c-weather").html(html);

                    setTimeout(function () {


                        for (i = 0; i < 5; i++) {
                            var l = '<ul class="clearfix">' +
                                    '<li class="m-r-15">' +
                                    '<i class="cwc-icon cwci-sm cwci-' + weather.forecast[i].code + '"></i>' +
                                    '</li>' +
                                    '<li class="cwu-forecast">' + weather.forecast[i].high + '/' + weather.forecast[i].low + '</li>' +
                                    '<li>' + weather.forecast[i].text + '</li>' +
                                    '</ul>';

                            $('.cw-upcoming').append(l);
                        }
                    });
                },
                error: function (error) {
                    $("#c-weather").html('<p>' + error + '</p>');
                }
            });
        }



        var lineData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Example dataset",
                    fillColor: "transparent",
                    strokeColor: "#d447d3",
                    pointColor: "#d447d3",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "#FFCA28",
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: "Example dataset",
                    fillColor: "transparent",
                    strokeColor: "#FFCA28",
                    pointColor: "#009688",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "#FFCA28",
                    data: [45, 39, 60, 51, 86, 35, 60]
                },
                {
                    label: "Example dataset",
                    fillColor: "transparent",
                    strokeColor: "#fd982c",
                    pointColor: "#fd982c",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "#FFCA28",
                    data: [35, 79, 60, 81, 46, 75, 20]
                },
                {
                    label: "Example dataset",
                    fillColor: "rgba(127, 216, 248, 0.5)",
                    strokeColor: "#7fd8f8",
                    pointColor: "#F44336",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "#009688",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        };
        var lineOptions = {
            scaleShowGridLines: true,
            scaleGridLineColor: "#ddd",
            scaleGridLineWidth: 1,
            bezierCurve: true,
            bezierCurveTension: 0.4,
            pointDot: true,
            pointDotRadius: 4,
            pointDotStrokeWidth: 1,
            pointHitDetectionRadius: 20,
            datasetStroke: true,
            datasetStrokeWidth: 2,
            datasetFill: true,
            responsive: true
        };





        var data = [{
                label: "Sales 1",
                data: 21,
                color: "#d3d3d3"
            }, {
                label: "Sales 2",
                data: 3,
                color: "#bababa"
            }, {
                label: "Sales 3",
                data: 15,
                color: "#79d2c0"
            }, {
                label: "Sales 4",
                data: 52,
                color: "#01a8fe"
            }];

        var doughnutData = [
            {
                value: 300,
                color: "#6cc5f3",
                highlight: "#01a8fe",
                label: "Chorme"
            },
            {
                value: 150,
                color: "#dedede",
                highlight: "#01a8fe",
                label: "Mozilla"
            },
            {
                value: 130,
                color: "#43b9f5",
                highlight: "#01a8fe",
                label: "Safari"
            }
        ];

        var doughnutOptions = {
            segmentShowStroke: true,
            segmentStrokeColor: "#fff",
            segmentStrokeWidth: 4,
            percentageInnerCutout: 45, // This is 0 for Pie charts
            animationSteps: 100,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false,
            responsive: true
        };





    });


    (function () {
        $('#cw-body').fullCalendar({
            header: {
                left: 'prev, next',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },
            buttonIcons: {
                prev: 'none fa fa-arrow-left',
                next: 'none fa fa-arrow-right',
                prevYear: 'none fa fa-arrow-left',
                nextYear: 'none fa fa-arrow-right'
            },
            defaultDate: '2014-06-12',
            editable: true,
            events: [
                {
                    title: 'All Day',
                    start: '2014-06-01',
                    className: 'bgm-cyan'
                },
                {
                    title: 'Long',
                    start: '2014-06-07',
                    end: '2014-06-8',
                    className: 'bgm-orange'
                },
                {
                    id: 999,
                    title: 'Repeat',
                    start: '2014-06-09',
                    className: 'bgm-lightgreen'
                },
                {
                    id: 999,
                    title: 'Repeat',
                    start: '2014-06-16',
                    className: 'bgm-lightblue'
                },
                {
                    title: 'Meet',
                    start: '2014-06-12',
                    end: '2014-06-12',
                    className: 'bgm-green'
                },
                {
                    title: 'Lunch',
                    start: '2014-06-10',
                    className: 'bgm-cyan'
                },
                {
                    title: 'Birthday',
                    start: '2014-06-13',
                    className: 'bgm-amber'
                },
                {
                    title: 'Google',
                    url: 'http://google.com/',
                    start: '2014-06-28',
                    className: 'bgm-amber'
                }
            ]
        });
    })();

}(window.jQuery);
