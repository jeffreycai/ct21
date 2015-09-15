<section class="section-content">
  <div class="container clearfix">
    <div class="main-content">
      
      <?php echo $breadcrumb ?>
      
      <article id="course-142" class="ib-edu-course-single post-142 ib_educator_course type-ib_educator_course status-publish has-post-thumbnail hentry ib_educator_category-business ib_educator_category-entrepreneurship">
        <div class="course-content entry-content">
          <h1><?php echo $country->getName() ?></h1>
          <?php echo $country->getContent() ?>
        </div>
      </article>
<?php if (sizeof($institutions)): ?>
      <div id="institutions" class="sub-section">
        <h2>Recommended Institutions</h2>
<?php foreach ($institutions as $i): ?>
        <div class="card">
          <div class="left">
            <img src="<?php echo uri($i->getImage()) ?>" />
          </div>
          <div class="right">
            <h3><a href="<?php echo uri('institution/' . $i->getId()) ?>"><?php echo $i->getTitle() ?></a></h3>
          </div>
        </div>
<?php endforeach; ?>
      </div>
<?php endif; ?>
      
      
      
<?php if (sizeof($courses)): ?>
      <div id="institutions" class="sub-section">
        <h2>Recommended Courses</h2>
        <ul class="highlight-list">
<?php foreach ($courses as $c): ?>
          <li><i class="fa fa-book"></i> <a href="<?php echo uri('course/' . $c->getId()) ?>">
 <?php echo $c->getTitle() ?></a></li>
<?php endforeach; ?>
        </ul>
      </div>
<?php endif; ?>
      
      
    </div>

    <?php echo $sidebar_right; ?>

  </div>
</section>