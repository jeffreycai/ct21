<div id="page-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header"><?php i18n_echo(array(
        'en' => 'Block',
        'zh' => 'Content Block',
      )); ?></h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading"><?php i18n_echo(array(
            'en' => 'Create', 
            'zh' => '创建'
        )) ?></div>
        <div class="panel-body">
          
        <?php echo Message::renderMessages(); ?>
          
<form class="form-horizontal" role="form" method="POST" action="<?php echo uri('admin/block/create') ?>">
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='content'>content <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <textarea class='form-control' rows='5' id='content' name='content' required><?php echo ($object->isNew() ? (isset($_POST['content']) ? htmlentities($_POST['content']) : '') : htmlentities($object->getContent())) ?></textarea>
  </div>
</div>
<div class='hr-line-dashed'></div>

<script type='text/javascript' src='/libraries/ckeditor/ckeditor.js'></script>
<script type='text/javascript'>CKEDITOR.replace('content');</script>
  <input type="submit" name="submit" value="<?php i18n_echo(array(
      'en' => 'Create', 
      'zh' => '创建'
  )) ?>" class="btn btn-default">
</form>
          
        </div>
      </div>
    </div>
  </div>
</div>

