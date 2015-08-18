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
<?php foreach (Menu::findByName('主菜单')->getRootMenuItem()->getChildren() as $item): ?>
            
<?php endforeach; ?>
            <li class="menu-item">
              <a href="<?php echo uri('') ?>">HOME</a>
            </li>
            <li class="menu-item">
              <a href="<?php echo uri('about') ?>">ABOUT US</a>
            </li>
            <li class="menu-item">
              <a href="<?php echo uri('services') ?>">OUR SERVICES</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>