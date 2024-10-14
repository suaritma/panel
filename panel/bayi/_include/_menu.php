  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
          <span class="sr-only"><?=$lang['menu_toggle']?></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <?php if ((isset($_SESSION['dealer_id'])) && (!empty($_SESSION['dealer_id']))) { ?>
          <a class="navbar-brand" href="<?=DEALER_URL?><?php if (isset($_SESSION['employee_id'])) { ?>calendar/<?php } else { ?>dashboard/<?php } ?>">
            <img src="<?=DEALER_URL?>_assets/images/logo.png">
          </a>
        <?php } else { ?>
          <a class="navbar-brand" href="<?=DEALER_URL?>">
            <img src="<?=DEALER_URL?>_assets/images/logo.png">
          </a>
        <?php } ?>
      </div>
      <?php if ((isset($_SESSION['dealer_id'])) && (!empty($_SESSION['dealer_id']))) { ?>
                <div class="collapse navbar-collapse" id="navbar-collapse-1" aria-expanded="false">
                    <ul class="nav navbar-nav navbar-right">
                      <?php if (!isset($_SESSION['employee_id'])) { ?>
                        <li>
                            <a href="<?=DEALER_URL?>dashboard/">
                                <i class="glyphicon glyphicon-home"></i>&nbsp;
                                <span class="extsub"><?=$lang['menu_homepage']?></span>
                            </a>
                        </li>
                      <?php } ?>
                      <!-- Deneme yapılan alan -->
                      <li>
                            <a href="<?=DEALER_URL?>cihazserlist/">
                                <i class="glyphicon glyphicon-calendar"></i>&nbsp;
                                <span class="extsub">Cihaz Listesi</span>
                            </a>
                        </li>
                            


                      <!-- Deneme yapılan alan -->
                        <li>
                            <a href="<?=DEALER_URL?>calendar/">
                                <i class="glyphicon glyphicon-calendar"></i>&nbsp;
                                <span class="extsub"><?=$lang['menu_calendar']?></span>
                            </a>
                        </li>
                            <?php if ($_SESSION['p1']['pview']==1) { ?>
                            <li>
                                <a href="<?=DEALER_URL?>customers/list">
                                    <i class="glyphicon glyphicon-user"></i>&nbsp;
                                    <span class="extsub"><?=$lang['menu_customer']?></span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if ($_SESSION['p1']['padd']==1) { ?>
                            <li>
                                <a href="<?=DEALER_URL?>customers/add">
                                    <i class="glyphicon glyphicon-plus"></i>&nbsp;
                                    <span class="extsub"><?=$lang['menu_customer_add']?></span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if (!isset($_SESSION['employee_id'])) { ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="glyphicon glyphicon-briefcase"></i>&nbsp;
                                    <span class="extsub"><?=$lang['menu_company']?></span>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?=DEALER_URL?>dealer/company">
                                            <i class="glyphicon glyphicon-info-sign"></i>&nbsp;
                                            <span><?=$lang['menu_info']?></span>
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="<?=DEALER_URL?>dealer/info">
                                            <i class="glyphicon glyphicon-briefcase"></i>&nbsp;
                                            <span><?=$lang['menu_company_info']?></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=DEALER_URL?>dealer/employee">
                                            <i class="glyphicon glyphicon-user"></i>&nbsp;
                                            <span><?=$lang['menu_employee']?></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=DEALER_URL?>dealer/payment">
                                            <i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;
                                            <span><?=$lang['menu_payment']?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php } ?>
                            <?php if (!isset($_SESSION['employee_id'])) { ?>
                            <li>
                                <a href="<?=DEALER_URL?>payment/">
                                    <i class="glyphicon glyphicon-shopping-cart"></i>
                                    <span class="extsub"><?=$lang['menu_pay']?></span>
                                </a>
                            </li>
                            <?php } ?>
                            <li>
                                <a href="<?=DEALER_URL?>map/">
                                    <i class="glyphicon glyphicon-map-marker"></i>
                                    <span class="extsub"><?=$lang['menu_map']?></span>
                                </a>
                            </li>
                        <li>
                            <a href="<?=DEALER_URL?>logout/">
                                <i class="glyphicon glyphicon-log-out"></i>&nbsp;
                                <span class="extsub"><?=$lang['menu_logout']?></span>
                            </a>
                        </li>
                    </ul>
                </div>
      <?php } elseif (((!isset($_SESSION['dealer_id'])) || (empty($_SESSION['dealer_id']))) && (((isset($_SESSION['company_id'])) && (!empty($_SESSION['company_id']))))) { ?>
        <div class="collapse navbar-collapse" id="navbar-collapse-1" aria-expanded="false">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?=DEALER_URL?>logout/">
                        <i class="glyphicon glyphicon-log-out"></i>&nbsp;
                        <span class="extsub"><?=$lang['menu_logout']?></span>
                    </a>
                </li>
            </ul>
        </div>
      <?php } ?>
    </div>
  </nav>