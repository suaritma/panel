<form class="form-horizontal" id="street_search_form" action="#">
    <div class="col-md-6 col-md-offset-5">
        <div class="form-group">
            <label class="control-label col-md-4" for="street_search"><?=$lang['fast_search']?></label>
            <div class="col-md-8">
                <div class="input-group ui-widget">
                    <input type="text" name="street_search" placeholder="<?=$lang['min_char_limit']?>" autocomplete="off" minlength="3" class="form-control" id="street_search">
                    <span class="input-group-btn">
                        <button class="btn btn-default" id="street-search-button" type="button"><?=$lang['choose']?></button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</form>
<form class="form-horizontal" method="post" role="form">
  <input type="hidden" name="process" value="edit" />
  <input type="hidden" name="id" value="<?=$id?>" />
  <div class="col-md-5">
    <div class="form-group">
      <label class="control-label col-md-4" for="fullname"><?=$lang['firstname']?>&nbsp;<span class="ast">*</span></label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="fullname" name="firstname" placeholder="<?=$customer['firstname']?>" required="" value="<?=$customer['firstname']?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4" for="fullname"><?=$lang['lastname']?>&nbsp;<span class="ast">*</span></label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="fullname" name="lastname" placeholder="<?=$customer['lastname']?>" required="" value="<?=$customer['lastname']?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4" for="email"><?=$lang['email']?></label>
      <div class="col-md-8">
        <input class="form-control" name="email" id="email" type="email" placeholder="<?=$customer['email']?>" value="<?=$customer['email']?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4" for="gsm"><?=$lang['gsm']?>&nbsp;<span class="ast">*</span></label>
      <div class="col-md-8">
        <input class="form-control" name="gsm" id="gsm" type="number" placeholder="<?=$customer['gsm']?>" minlength="11" maxlength="11" required="" value="<?=$customer['gsm']?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4" for="birthday"><?=$lang['birthdate']?></label>
      <div class="col-md-8">
        <input class="form-control" name="birthday" id="birthday" type="date" max="2018-04-20" value="<?=date("Y-m-d", $customer['birthdate'])?>">
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label class="control-label col-md-4" for="city"><?=$lang['city']?>&nbsp;<span class="ast">*</span></label>
      <div class="col-md-8">
        <select class="form-control" required="" name="city" id="city">
          <option value="0">-</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4" for="town"><?=$lang['town']?>&nbsp;<span class="ast">*</span></label>
      <div class="col-md-8">
        <select class="form-control" required="" name="town" id="town">
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4" for="district"><?=$lang['district']?>&nbsp;<span class="ast">*</span></label>
      <div class="col-md-8">
        <select class="form-control" required="" name="district" id="district">
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4" for="street"><?=$lang['street']?>&nbsp;<span class="ast">*</span></label>
      <div class="col-md-8">
        <select class="form-control" required="" name="street" id="street">
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4" for="fullname"><?=$lang['postalcode']?>&nbsp;<span class="ast">*</span></label>
      <div class="col-md-8">
        <input type="text" class="form-control" id="postalcode" name="postalcode" required="" readonly>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4" for="address"><?=$lang['address']?></label>
      <div class="col-md-8">
        <textarea class="form-control" name="address" id="address" cols="30" rows="2"><?=$customer['address']?></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-4 col-md-8">
        <button type="submit" class="btn btn-primary btn-block visible-xs">
          <span><?=$lang['edit']?></span>&nbsp;<span class="glyphicon glyphicon-plus-sign"></span>
        </button>
        <button type="submit" class="btn btn-primary hidden-xs">
          <span><?=$lang['edit']?></span>&nbsp;<span class="glyphicon glyphicon-plus-sign"></span>
        </button>
      </div>
    </div>
  </div>
</form>
