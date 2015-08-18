<div id="page-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header"><?php i18n_echo(array(
        'en' => 'Menu item',
        'zh' => '菜单项目',
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
          
<form role="form" method="POST" action="<?php echo uri('admin/menu_item/create') ?>">
  
<div class='form-group'>
  <label for='name'>name</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['name']) ? strip_tags($_POST['name']) : '') : $object->getName()))) ?>' type='text' class='form-control' id='name' name='name' required />
</div>
  
<div class='form-group'>
  <label for='uri'>uri</label>
  <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['uri']) ? strip_tags($_POST['uri']) : '') : $object->getUri()))) ?>' type='text' class='form-control' id='uri' name='uri' required />
</div>
  
<div class='form-group'>
  <label>menu_id</label>
    <select class='form-control' id='menu_id' name='menu_id'>
      <option value='1' <?php echo ($object->isNew() ? (isset($_POST['menu_id']) ? ($_POST['menu_id'] == '1' ? 'selected="selected"' : '') : '') : ($object->getMenuId() == "1" ? "selected='selected'" : "")) ?>>-- select --</option>
    </select>
</div>
  
<div class='form-group'>
  <label>parent_id</label>
    <select class='form-control' id='parent_id' name='parent_id'>
      <option value='1' <?php echo ($object->isNew() ? (isset($_POST['parent_id']) ? ($_POST['parent_id'] == '1' ? 'selected="selected"' : '') : '') : ($object->getParentId() == "1" ? "selected='selected'" : "")) ?>>-- root --</option>
    </select>
</div>

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

