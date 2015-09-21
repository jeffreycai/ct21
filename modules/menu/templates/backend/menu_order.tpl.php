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
<h3>Reorder</h3>
          
<ol id='menu-order' class="default vertical">

<?php foreach ($menu->getRootItem(10)->getChildren() as $child): ?>
  <li data-id="<?php echo $child->getId() ?>">
    <span class="value"><?php echo $child->getName() ?></span>
    <input class="name" value="<?php echo htmlentities($child->getName()) ?>" />
    <div class="actions">
      <a href="#" class="edit"><span class="fa fa-edit"></span></a> &nbsp;
      <a href="#" class="delete"><span class="fa fa-trash"></span></a>
    </div>
    <ol>
    <?php foreach ($child->getChildren() as $c): ?>
      <li data-id="<?php echo $c->getId() ?>">
        <span class="value"><?php echo $c->getName() ?></span>
        <input class="name" value="<?php echo htmlentities($c->getName()) ?>" />
        <div class="actions">
          <a href="#" class="edit"><span class="fa fa-edit"></span></a> &nbsp;
          <a href="#" class="delete"><span class="fa fa-trash"></span></a>
        </div>
        <ol>
        <?php foreach ($c->getChildren() as $cc): ?>
          <li data-id="<?php echo $cc->getId() ?>">
            <span class="value"><?php echo $cc->getName() ?></span>
            <input class="name" value="<?php echo htmlentities($cc->getName()) ?>" />
            <div class="actions">
              <a href="#" class="edit"><span class="fa fa-edit"></span></a> &nbsp;
              <a href="#" class="delete"><span class="fa fa-trash"></span></a>
            </div>
            <ol>
              <?php foreach ($cc->getChildren() as $ccc): ?>
              <li data-id="<?php echo $ccc->getId() ?>">
                <span class="value"><?php echo $ccc->getName() ?></span>
                <input class="name" value="<?php echo htmlentities($ccc->getName()) ?>" />
                <div class="actions">
                  <a href="#" class="edit"><span class="fa fa-edit"></span></a> &nbsp;
                  <a href="#" class="delete"><span class="fa fa-trash"></span></a>
                </div>
              </li>
              <?php endforeach; ?>
            </ol>
          </li>
        <?php endforeach; ?>
        </ol>
      </li>
    <?php endforeach; ?>
    </ol>
  </li>
<?php endforeach; ?>

</ol>

<form action="<?php echo uri('admin/menu/order/' . $menu->getId()) ?>" method="POST">
  <textarea name="serialized" id="serialized" style="display: none;">
    
  </textarea>
  <input type="submit" class="btn btn-default" value="Submit" name="submit">
</form>


<script>
$(function  () {
  // initialize sortable
  var group = $("#menu-order").sortable({
    onDrop: function ($item, container, _super) {
      var data = group.sortable("serialize").get();
      var jsonString = JSON.stringify(data, null, ' ');
      $('#serialized').text(jsonString);
      _super($item, container);
    }
  });
  // delete js action
  $("#menu-order a.delete").click(function(){
    var answer = confirm("<?php echo i18n(array(
        'en' => 'Are you sure to delete this menu item? All its sub-items will be deleted as well.',
        'zh' => '您确定删除此菜单项吗？其子菜单项也将被删除。'
    )) ?>");
    var li = $(this).parents('li').first();
    if (answer) {
      $.post("<?php echo uri('admin/menu_item/delete/') ?>" + li.data('id') + '?ajax=1', function(data){
        if (data == 'success') {
          li.fadeOut();
        }
      });
    }
    return false;
  });
  // edit js action
  $("#menu-order a.edit").click(function(){
    var li = $(this).parents('li').first();
    $(' > .name', li).show();
    return false;
  });
  $("#menu-order .name").blur(function(){
    var li = $(this).parents('li').first();
    var input = $(this);
    input.prop('disabled', true);
    $.post("<?php echo uri('admin/menu_item/edit/') ?>" + li.data('id') + '?ajax=1', '&name=' + encodeURIComponent(input.val()), function(data){
      if (data != 'error') {
        $(' > .value', li).html(data);
        input.fadeOut(function(){
          input.prop('disabled', false);
          input.val(data);
        });
      } else {
        alert('Update failed');
        input.fadeOut(function(){
          input.prop('disabled', false);
        });
      }
    });
  }).keypress(function (e) {
    if (e.which == 13) {
      $(this).blur();
      return false;    //<---- Add this line
    }
  });
});
</script>

<h3><?php echo i18n(array(
    'en' => 'Add new menu item',
    'zh' => '添加新的菜单项'
)) ?></h3>
<form class="form-horizontal" role="form" method="POST" action="<?php echo uri('admin/menu_item/create') ?>">
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='name'>name <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='name' name='name' required />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='uri'>uri <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input type='text' class='form-control' id='uri' name='uri' required />
    <p>For external url, put "http://" at the front. e.g. "http://www.google.com" 
      <br />
    For internal url, put "/" at the front. e.g. "/about"</p>
  </div>
</div>
<div class='hr-line-dashed'></div>

<div class='form-group'>
  <label class='col-sm-2 control-label'>parent_id <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <select class='form-control' id='parent_id' name='parent_id'>
      <option value='<?php echo $menu->getRootItem(0)->getId() ?>'>-- None --</option>
<?php foreach ($menu->getRootItem(10)->getChildren() as $child): ?>
      <option value="<?php echo $child->getId() ?>"><?php echo $child->getName() ?></option>
      <?php foreach ($child->getChildren() as $c): ?>
        <option value="<?php echo $c->getId() ?>"> - <?php echo $c->getName() ?></option>
        <?php foreach ($c->getChildren() as $cc): ?>
          <option value="<?php echo $cc->getId() ?>"> -- <?php echo $cc->getName() ?></option>
          <?php foreach ($cc->getChildren() as $ccc): ?>
            <option value="<?php echo $ccc->getId() ?>"> --- <?php echo $ccc->getName() ?></option>
          <?php endforeach; ?>
        <?php endforeach; ?>
      <?php endforeach ?>
<?php endforeach; ?>
    </select>
  </div>
</div>
<div class='hr-line-dashed'></div>

<input type="hidden" name="menu_id" value="<?php echo $menu->getId() ?>" />

  <input type="submit" name="submit" value="<?php i18n_echo(array(
      'en' => 'Add', 
      'zh' => '添加'
  )) ?>" class="btn btn-default">
</form>
          
        </div>
      </div>
    </div>
  </div>
</div>

