<section class="section-content">
  <div class="container clearfix">
    <div class="main-content">
      <article id="course-142" class="ib-edu-course-single post-142 ib_educator_course type-ib_educator_course status-publish has-post-thumbnail hentry ib_educator_category-business ib_educator_category-entrepreneurship">
        <h1 class="course-title entry-title"><?php echo $country->getName() ?></h1>


        <div class="course-content entry-content">
          <div class="ib-edu-course-price"><a href="<?php echo uri('contact') ?>" class="ib-edu-button">Apply now</a></div><div class="course-image"><img width="620" height="384" src="<?php echo uri($country->getImage()) ?>" class="attachment-ib-educator-main-column wp-post-image" alt="<?php echo htmlentities($country->getName()) ?>" /></div>
          <?php echo $country->getContent() ?>
        </div>
      </article>
      <ul class="educator-share-links clearfix">
        <li class="label">Share:</li>
        <li>
          <a href="#" title="Facebook" target="_blank"><span class="fa fa-facebook"></span></a>
        </li>
        <li>
          <a href="#" title="Google+" target="_blank"><span class="fa fa-google-plus"></span></a>
        </li>
        <li>
          <a href="https://twitter.com/share?url=http%3A%2F%2Feducator.incrediblebytes.com%2Fcourses%2Finternet-entrepreneurship%2F&#038;text=Internet+Entrepreneurship&#038;via=incrediblebytes" title="Twitter" target="_blank"><span class="fa fa-twitter"></span></a>
        </li>
      </ul>
    </div>

    <?php echo $sidebar_right; ?>

  </div>
</section>