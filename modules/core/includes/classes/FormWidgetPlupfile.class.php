<?php
require_once 'FormWidget.class.php';

class FormWidgetPlupfile extends FormWidget {
  private $name;
  private $required;
  private $multiple;
  private $max_file_size;
  private $extensions;
  
  public function __construct($name, $conf) {
    parent::__construct($conf);
    $this->name = $name;
    $this->required = isset($conf['required']) ? $conf['required'] : 0;
    $this->multiple = isset($conf['multiple']) ? $conf['multiple'] : 0;
    $this->max_file_size = isset($conf['max_file_size']) ? $conf['max_file_size'] : 2;
    $this->extensions = isset($conf['extensions']) ? $conf['extensions'] : 'jpg,png,gif';
  }
  
  public function render($module, $model) {
    $rtn = "";
    $rtn .=
"\n<div class='form-group' id='$this->name'>
  <label class='col-sm-2 control-label'>$this->name ".($this->required ? $this->mandatory_field : '')."</label>
  <div class='col-sm-10'>
    <textarea name='$this->name' style='display: none;'></textarea>
    <div class='uploaded' style='margin-bottom: 10px;'>
[[[ \$files = trim(\$object->get".format_as_class_name($this->name)."(), \"\\n\\r\"); ]]]
[[[ if (!empty(\$files)): ]]]
  [[[ \$files = explode(\"\\n\", \$files); ]]]
  [[[ foreach (\$files as \$file): ]]]
  <div class='entry'><a class='download' data-path=\"[[[ echo htmlentities(\$file) ]]]\ href='[[[ echo uri(\"\$file\", false) ]]]'>[[[ echo basename(\$file); ]]]</a> &nbsp;&nbsp;<a style=\"color:red\" href=\"#\" data-path=\"[[[ echo htmlentities(\$file) ]]]\" class='delete'><i class='fa fa-remove'></i></a></div>
  [[[ endforeach; ]]]
[[[ endif; ]]]
    </div>
    <div class='file-fields' style='border: 1px solid #999; padding: 6px;'>
      [[[ echo i18n(array(
        'en' => 'File upload requires Flash, Silverlight or HTML5 support. Your browser does not have any of them :(',
        'zh' => '文件上传需要您的浏览器支持Flash, Silverlight 或者 HTML5。 您的浏览器都不支持 :('
      ));]]]
    </div>
    <div class='filecontainer'>
      <button style='margin-top:6px;' class='browse btn btn-primary btn-sm' type='button'>[[[ echo i18n(array('en' => 'Select file', 'zh' => '选择文件')) ]]]</button>
      <button style='margin-top:6px;' class='upload btn btn-success btn-sm' type='button'>[[[ echo i18n(array('en' => 'Upload', 'zh' => '上传')) ]]]</button>
      <p>
        <small style='font-style:italic;'>
          ".  i18n(array('en' => 'Max file upload size', 'zh' => '最大允许上文文件大小')).": $this->max_file_size MB<br />
          ".  i18n(array('en' => 'Allowed file type', 'zh' => '可上传的文件种类')).": $this->extensions
        </small>
      </p>
    </div>
  </div>
</div>
<div class='hr-line-dashed'></div>
";
    $rtn .= "
[[[
  // get json string of prepopulated image links
  \$prepopulate = \$object->isNew() ? '' : \$object->get".format_as_class_name($this->name)."();
  if (\$prepopulate != '') {
    \$tokens = explode(\"\\n\", trim(\$prepopulate));
    \$prepopulate = array();
    foreach (\$tokens as \$token) {
      \$prepopulate[] = trim(\$token, \"\\n\\r\");
    }
  }
]]]
";
    // include jquery-ui, when we've got multiple images
    if ($this->multiple) {
      if (!Asset::checkAssetAdded('jquery-ui', 'js', 'backend')) {
        $js = "\n<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js'></script>\n";
        Asset::addDynamicAsset('jquery-ui', 'js', 'backend', $js);
        $rtn .= $js;
      }
    }
    
    // include plupload
    if (!Asset::checkAssetAdded('plupload', 'js', 'backend')) {
      $js = "\n<script src='".uri('modules/core/assets/plupload/js/plupload.full.min.js', false)."'></script>\n";
      Asset::addDynamicAsset('jquery-ui', 'js', 'backend', $js);
      $rtn .= $js;
    }

    // js
    $rtn .= "\n<script type='text/javascript'>
  $(function(){

    // initialize uploader
    var uploader = new plupload.Uploader({
      runtimes : 'html5,flash,silverlight,html4',
      browse_button : $('#$this->name .filecontainer .browse')[0], // you can pass an id...
      container: $('#$this->name .filecontainer')[0], // ... or DOM Element itself
      url : '".uri('modules/'.$module.'/controllers/backend/'.$model.'_form_field_'.$this->name.'_upload.php', false)."',
      flash_swf_url : '".uri('modules/core/assets/plupload/js/Moxie.swf', false)."',
      silverlight_xap_url : '".uri('modules/core/assets/plupload/js/Moxie.xap', false)."',

      filters : {
        max_file_size : '".$this->max_file_size."mb',
        mime_types: [
          {title : \"Allowed files\", extensions : \"$this->extensions\"},
        ]
      },

      init: {
        PostInit: function() {
          $('#$this->name .file-fields')[0].innerHTML = '';

          $('#$this->name .upload')[0].onclick = function() {
            uploader.start();
            return false;
          };
        },

        FilesAdded: function(up, files) {
          plupload.each(files, function(file) {
            $('#$this->name .file-fields')[0].innerHTML += '<div id=\"' + file.id + '\">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
          });
          
                    var maxfiles = ".($this->multiple ? $this->multiple : 1).";
                    if(up.files.length > maxfiles )
                     {
                        up.splice(maxfiles);
                        alert('no more than '+maxfiles + ' file(s)');
                     }
                    if (up.files.length === maxfiles) {
                        $('#$this->name .browse').addClass('');
                    }
        },

        UploadProgress: function(up, file) {
          document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + \"%</span>\";
        },

        Error: function(up, err) {
          alert('Error #' + err.code + ': ' + err.message);
        },
        
        FileUploaded: function(uploader, file, response) {
          var msg = typeof response.response == 'string' ? JSON.parse(response.response) : response.response;
          if (response.status != 200) {
            $('#' + file.id).fadeOut();
            alert('".  i18n(array(
                'en' => 'File upload error: wrong status code - ',
                'zh' => '文件上传失败：错误的http状态码 - '
            ))." ' + response.status.toString());
          } else {
             if (msg.error !== undefined) {
              $('#' + file.id).fadeOut();
              alert(msg.error);
            } else {
              $('#$this->name .uploaded').append('<div id=\"file_'+Math.round((Math.random()*10000+1)).toString()+'\" class=\"entry\"><a href=\"\" data-path=\"'+msg.filepath+'\" class=\"download\">' + file.name + '</a> &nbsp;&nbsp;<a class=\"delete\" data-path=\"'+msg.filepath+'\" style=\"color:red;\" href=\"#\"><i class=\"fa fa-remove\"></i></a></div>');
              updateHiddenTextarea($('#$this->name'));
            }
          }

        }
      }
    });
    uploader.init();
    
    // file delete action
    $('#$this->name').on('click', '.entry .delete', function(){
      var id = $(this).parent().attr('id');
      $.post(
        \"".uri('modules/'.$module.'/controllers/backend/'.$model.'_form_field_'.$this->name.'_remove.php', false)."\",
        'path='+$(this).data('path')+'&id='+id,
        function(data) {
          if (data.error !== undefined) {
            alert(data.error);
          }
          $('#'+data.id).remove();
          updateHiddenTextarea($('#$this->name'));
        }, 'json'
      );
      return false;
    });

    function updateHiddenTextarea(container) {
      var html = '';
      $('.uploaded .entry a.download', container).each(function(){
        var uri = $(this).data('path');
        html = html + uri + " . '"\n"' . ";
      });
      $('textarea', container).val(html);
    }
  });
</script>
";

    return $rtn;
  }
  
  public function validate() {
    $rtn = "\n  // validation for $".$this->name."\n";
    $rtn .= '  $'.$this->name.' = isset($_POST["'.$this->name.'"]) ? strip_tags(trim($_POST["'.$this->name.'"])) : null;';
    if ($this->required) {
      $rtn .= '
  if (empty($'.$this->name.')) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "'.$this->name.' is required.", "zh" => "请填写'.$this->name.'"))));
    $error_flag = true;
  }
';
    }
    return $rtn;
  }
  
  public function proceed() {
    $rtn = "\n  // proceed for $".$this->name."\n";
    $rtn .= '  $object->set'.format_as_class_name($this->name).'($'.$this->name.');
';
    return $rtn;
  }
}