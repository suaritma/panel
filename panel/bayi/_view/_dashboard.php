<script>
window.onload = function () {
  CanvasJS.addCultureInfo("tr",
  {
    decimalSeparator: ",",// Observe ToolTip Number Format
    digitGroupSeparator: ".", // Observe axisY labels
    months: ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"]

  });
var chart_income = new CanvasJS.Chart("incomeGraph", {
  culture: "tr",
  height: 250,
	animationEnabled: true,
	axisY: {
		title: "",
		valueFormatString: "#0,,.",
		suffix: "<?=$_SESSION['dealer_currency']?>"
	},
	data: [{
		type: "splineArea",
		color: "rgba(54,158,173,.7)",
		markerSize: 7,
		xValueFormatString: "YYYY-MM",
		yValueFormatString: "#,##0.##",
		dataPoints: [<?=implode(",", $i6)?>]
	}]
	});
chart_income.render();

var chart_service = new CanvasJS.Chart("serviceGraph", {
  culture: "tr",
  height: 250,
	animationEnabled: true,
	axisY: {
		title: "",
		valueFormatString: "#0,,.",
		suffix: ""
	},
	data: [{
		type: "splineArea",
		color: "rgba(54,158,173,.7)",
		markerSize: 5,
		xValueFormatString: "YYYY-MM",
		yValueFormatString: "#,##0.##",
		dataPoints: [<?=implode(",", $s6)?>]
	}]
	});
chart_service.render();

var chart_customer = new CanvasJS.Chart("customerGraph", {
  culture: "tr",
  height: 250,
	animationEnabled: true,
	axisY: {
		title: "",
		valueFormatString: "#0,,.",
		suffix: ""
	},
	data: [{
		type: "splineArea",
		color: "rgba(54,158,173,.7)",
		markerSize: 5,
		xValueFormatString: "YYYY-MM",
		yValueFormatString: "#,##0.##",
		dataPoints: [<?=implode(",", $c6)?>]
	}]
	});
  chart_customer.render();

  $('#i3').click(function() {
    chart_income.options.data[0].dataPoints = [<?=implode(",", $i3)?>];
	  chart_income.render();
  });
  $('#i6').click(function() {
    chart_income.options.data[0].dataPoints = [<?=implode(",", $i6)?>];
	  chart_income.render();
  });
  $('#i9').click(function() {
    chart_income.options.data[0].dataPoints = [<?=implode(",", $i9)?>];
	  chart_income.render();
  });
  $('#i12').click(function() {
    chart_income.options.data[0].dataPoints = [<?=implode(",", $i12)?>];
	  chart_income.render();
  });

  $('#s3').click(function() {
    chart_service.options.data[0].dataPoints = [<?=implode(",", $s3)?>];
	  chart_service.render();
  });
  $('#s6').click(function() {
    chart_service.options.data[0].dataPoints = [<?=implode(",", $s6)?>];
	  chart_service.render();
  });
  $('#s9').click(function() {
    chart_service.options.data[0].dataPoints = [<?=implode(",", $s9)?>];
	  chart_service.render();
  });
  $('#s12').click(function() {
    chart_service.options.data[0].dataPoints = [<?=implode(",", $s12)?>];
	  chart_service.render();
  });

  $('#c3').click(function() {
    chart_customer.options.data[0].dataPoints = [<?=implode(",", $c3)?>];
	  chart_customer.render();
  });
  $('#c6').click(function() {
    chart_customer.options.data[0].dataPoints = [<?=implode(",", $c6)?>];
	  chart_customer.render();
  });
  $('#c9').click(function() {
    chart_customer.options.data[0].dataPoints = [<?=implode(",", $c9)?>];
	  chart_customer.render();
  });
  $('#c12').click(function() {
    chart_customer.options.data[0].dataPoints = [<?=implode(",", $c12)?>];
	  chart_customer.render();
  });
}
</script>
    <div class="col-md-6">
        <ul class="nav nav-pills nav-justified" role="tablist">
            <li class="active" role="presentation">
                <a href="#income" aria-controls="income" role="tab" data-toggle="tab">Gelir</a>
            </li>
            <li role="presentation">
                <a href="#service" aria-controls="service" role="tab" data-toggle="tab">Servis</a>
            </li>
            <li role="presentation">
                <a href="#customer" aria-controls="customer" role="tab" data-toggle="tab">Müşteri</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="col-md-12 tab-pane fade in active margin-top-3rem" id="income" role="tabpanel">
                <div class="btn-group btn-group-justified" data-toggle="buttons" role="group">
                    <label class="btn btn-default" id="i3">
                        <input type="radio" name="options" autocomplete="off">3 Ay
                    </label>
                    <label class="btn btn-default active" id="i6">
                        <input type="radio" name="options" autocomplete="off" checked>6 Ay
                    </label>
                    <label class="btn btn-default" id="i9">
                        <input type="radio" name="options" autocomplete="off">9 Ay
                    </label>
                    <label class="btn btn-default" id="i12">
                        <input type="radio" name="options" autocomplete="off">12 Ay
                    </label>
                </div>
                <div id="incomeGraph" style="height: 250px; max-width: 555px; margin: 0px auto;"></div>
            </div>

            <div class="col-md-12 tab-pane fade margin-top-3rem" id="service" role="tabpanel">
                <div class="btn-group btn-group-justified" data-toggle="buttons" role="group">
                    <label class="btn btn-default" id="s3">
                        <input type="radio" name="options" autocomplete="off">3 Ay
                    </label>
                    <label class="btn btn-default active" id="s6">
                        <input type="radio" name="options" autocomplete="off" checked>6 Ay
                    </label>
                    <label class="btn btn-default" id="s9">
                        <input type="radio" name="options" autocomplete="off">9 Ay
                    </label>
                    <label class="btn btn-default" id="s12">
                        <input type="radio" name="options" autocomplete="off">12 Ay
                    </label>
                </div>
                <div id="serviceGraph" style="height: 250px; max-width: 555px; margin: 0px auto;"></div>
            </div>

            <div class="col-md-12 tab-pane fade margin-top-3rem" id="customer" role="tabpanel">
                <div class="btn-group btn-group-justified" data-toggle="buttons" role="group">
                    <label class="btn btn-default" id="c3">
                        <input type="radio" name="options" autocomplete="off">3 Ay
                    </label>
                    <label class="btn btn-default active" id="c6">
                        <input type="radio" name="options" autocomplete="off" checked>6 Ay
                    </label>
                    <label class="btn btn-default" id="c9">
                        <input type="radio" name="options" autocomplete="off">9 Ay
                    </label>
                    <label class="btn btn-default" id="c12">
                        <input type="radio" name="options" autocomplete="off">12 Ay
                    </label>
                </div>
                <div id="customerGraph" style="height: 250px; max-width: 555px; margin: 0px auto;"></div>
            </div>
        </div>
    </div>

    <!-- SERVICE INFO -->
    <div class="col-md-6">
        <ul class="list-group">
            <li class="list-group-item">
                <p>Bu ay gelir:&nbsp;
                    <b><?=$this_month_earn?>&nbsp;<?=$_SESSION['dealer_currency']?></b>
                </p>
            </li>
            <li class="list-group-item">
                <p>Geçen ay gelir:&nbsp;
                    <b><?=$last_month_earn?>&nbsp;<?=$_SESSION['dealer_currency']?></b>
                </p>
            </li>
            <li class="list-group-item">
                <p>Bu ay yeni müşteri sayısı:&nbsp;
                    <b><?=$this_month_customer?></b>
                </p>
            </li>
            <li class="list-group-item">
                <p>Geçen ay eklenen müşteri sayısı:&nbsp;
                    <b><?=$last_month_customer?></b>
                </p>
            </li>
            <li class="list-group-item">
                <p>Bu ay tamamlanan servis sayısı:&nbsp;
                    <b><?=$this_month_service?></b>
                </p>
            </li>
            <li class="list-group-item">
                <p>Geçen ay tamamlanan servis sayısı:&nbsp;
                    <b><?=$last_month_service?></b>
                </p>
            </li>
            <li class="list-group-item">
                <p>Bu ay tamamlanmamış servis sayısı:&nbsp;
                    <b><?=$next_month_service?></b>
                </p>
            </li>
        </ul>
    </div>
