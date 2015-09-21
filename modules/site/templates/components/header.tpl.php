<header id="page-header"  class="fixed-header">
  <div id="page-header-inner">
    <div id="header-container">
      <div class="container clearfix">
        <div id="main-logo">
          <a href="<?php echo uri('') ?>">
            <img src="http://educator.incrediblebytes.com/wp-content/uploads/2014/12/logo.png" alt="<?php echo $settings['sitename'] ?>">
          </a>
        </div>


        <nav id="main-nav">
          <ul id="menu-main-menu" class="menu">
<?php foreach (Menu::findByName('主菜单')->getRootItem(10)->getChildren() as $item): ?>
            <li class="menu-item <?php echo_link_active_class('/^'.$item->getUri().'$/', get_cur_page_url(), 'current-menu-item') ?>">
              <a href="<?php echo uri($item->getUri()) ?>"><?php echo $item->getName() ?></a>
              <?php if (sizeof($item->getChildren())): ?>
              <ul class="sub-menu">
              <?php foreach ($item->getChildren() as $c): ?>
                <li class="menu-item <?php echo_link_active_class('/^'.$c->getUri().'$/', get_cur_page_url(), 'current-menu-item') ?>">
                  <a href="<?php echo uri($c->getUri()) ?>"><?php echo $c->getName() ?></a>
                  <?php if (sizeof($c->getChildren())): ?>
                  <ul class="sub-menu">
                    <?php foreach ($c->getChildren() as $cc): ?>
                    <li class="menu-item <?php echo_link_active_class('/^'.$cc->getUri().'$/', get_cur_page_url(), 'current-menu-item') ?>">
                      <a href="<?php echo uri($cc->getUri()) ?>"><?php echo $cc->getName() ?></a>
                      <?php if (sizeof($cc->getChildren())): ?>
                      <ul class="sub-menu">
                        <?php foreach ($cc->getChildren() as $ccc): ?>
                          <li class="menu-item <?php echo_link_active_class('/^'.$ccc->getUri().'$/', get_cur_page_url(), 'current-menu-item') ?>">
                            <a href="<?php echo uri($ccc->getUri()) ?>"><?php echo $ccc->getName() ?></a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                      <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                  <?php endif; ?>
                </li>
              <?php endforeach; ?>
              </ul>
              <?php endif; ?>
            </li>
<?php endforeach; ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>