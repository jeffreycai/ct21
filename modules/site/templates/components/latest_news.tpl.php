<section style="background-color:#f5f5f5;" class="section-content section-bg"><div class="container clearfix">
    <div class="entry-content">
      <div class="dm3-one-half">
        <h2>Latest news</h2>
<?php $i = 0; $allnews = News::findAll(3); ?>
<?php foreach ($allnews as $news): $i++; ?>
        <div class="news <?php echo $i == 1 ? 'first' : ($i == sizeof($allnews) ? 'last' : '') ?>">
          <div class="left"><img src="<?php echo $news->getThumbnail() ?>"></div>
          <div class="right">
            <p><?php echo date('jS M Y', $news->getDate()) ?></p>
            <h3><a href="#"><?php echo $news->getTitle() ?></a></h3>
          </div>
        </div>
<?php endforeach; ?>
        
      </div>
      <div class="dm3-one-half dm3-column-last" id="video-container">
        <iframe width="560" height="315" src="//www.youtube.com/embed/PCm8FLQW8FA" frameborder="0" allowfullscreen></iframe>
      </div>
      
      <div class="clear"></div>
    </div>
  </div>
</section>