<div class="col-md-12 home-filter">
  <div class="col-md-12">
    <form class="form-inline" role="form" method="post" action="<?=DEALER_URL?>calendar/" name="customer-form">
        <div class="form-group">
          <select name="cities" id="filter-cities" class="form-control">
          </select>
        </div>
        <div class="form-group">
            <select name="towns" id="filter-towns" class="form-control" disabled=""></select>
        </div>
        <div class="form-group">
          <select name="streets[]" id="option-droup-demo" class="form-control" multiple="multiple" style="display: none;"></select>
        </div>
        <div class="form-group">
          <input class="btn btn-primary" type="submit" value="FİLTRELE">
        </div>
    </form>
  </div>
</div>
<div id="main-calendar" class="col-md-12 home-calendar fc fc-unthemed fc-ltr"></div>
<div id="fullCalModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="fullCalModalBody" class="modal-body ">
      </div>
    </div>
  </div>
</div>
<div class="col-md-12">
  <p class="text-center"><span style="color:#42f465">►</span> - Servis Bakımı Yapılmış <span style="color:#f44242">►</span> - Servis Bakımı Gecikmiş <span style="color:#42a4f4">►</span> - Servis Bakımı Gelmemiş</p>
</div>