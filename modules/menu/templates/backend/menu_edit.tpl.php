<div id="page-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header"><?php i18n_echo(array(
        'en' => 'Menu',
        'zh' => '菜单',
      )); ?></h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading"><?php i18n_echo(array(
            'en' => 'Edit', 
            'zh' => '编辑'
        )) ?></div>
        <div class="panel-body">
          
        <?php echo Message::renderMessages(); ?>
          
<form class="form-horizontal" role="form" method="POST" action="<?php echo uri('admin/menu/edit/' . $object->getId()) ?>">
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='name'>name <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['name']) ? strip_tags($_POST['name']) : '') : $object->getName()))) ?>' type='text' class='form-control' id='name' name='name' required />
  </div>
</div>
<div class='hr-line-dashed'></div>

  <input type="submit" name="submit" value="<?php i18n_echo(array(
      'en' => 'Edit', 
      'zh' => '编辑'
  )) ?>" class="btn btn-default">
</form>
          
        </div>
      </div>
    </div>
  </div>
</div>

