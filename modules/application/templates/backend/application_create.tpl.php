<div id="page-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header"><?php i18n_echo(array(
        'en' => 'Application',
        'zh' => '申请',
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
          
<form class="form-horizontal" role="form" method="POST" action="<?php echo uri('admin/application/create') ?>">
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='name'>name <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['name']) ? strip_tags($_POST['name']) : '') : $object->getName()))) ?>' type='text' class='form-control' id='name' name='name' required />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='dob'>dob <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['dob']) ? strip_tags($_POST['dob']) : '') : $object->getDob()))) ?>' type='text' class='form-control' id='dob' name='dob' required />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='address'>address </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['address']) ? strip_tags($_POST['address']) : '') : $object->getAddress()))) ?>' type='text' class='form-control' id='address' name='address' />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='postcode'>postcode </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['postcode']) ? strip_tags($_POST['postcode']) : '') : $object->getPostcode()))) ?>' type='text' class='form-control' id='postcode' name='postcode' />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='phone'>phone </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['phone']) ? strip_tags($_POST['phone']) : '') : $object->getPhone()))) ?>' type='text' class='form-control' id='phone' name='phone' />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='mobile'>mobile <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['mobile']) ? strip_tags($_POST['mobile']) : '') : $object->getMobile()))) ?>' type='text' class='form-control' id='mobile' name='mobile' required />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='qq'>qq </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['qq']) ? strip_tags($_POST['qq']) : '') : $object->getQq()))) ?>' type='text' class='form-control' id='qq' name='qq' />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='email'>email <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['email']) ? strip_tags($_POST['email']) : '') : $object->getEmail()))) ?>' type='text' class='form-control' id='email' name='email' required />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='education'>education <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['education']) ? strip_tags($_POST['education']) : '') : $object->getEducation()))) ?>' type='text' class='form-control' id='education' name='education' required />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='graduate_institution'>graduate_institution <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['graduate_institution']) ? strip_tags($_POST['graduate_institution']) : '') : $object->getGraduateInstitution()))) ?>' type='text' class='form-control' id='graduate_institution' name='graduate_institution' required />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='ielts'>ielts </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['ielts']) ? strip_tags($_POST['ielts']) : '') : $object->getIelts()))) ?>' type='text' class='form-control' id='ielts' name='ielts' />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label'>apply_country </label>
  <div class='col-sm-10'>
    <select class='form-control' id='apply_country' name='apply_country'>
      <option value='Australia' <?php echo ($object->isNew() ? (isset($_POST['apply_country']) ? ($_POST['apply_country'] == 'Australia' ? 'selected="selected"' : '') : '') : ($object->getApplyCountry() == "Australia" ? "selected='selected'" : "")) ?>>Australia</option>
      <option value='Newzealand' <?php echo ($object->isNew() ? (isset($_POST['apply_country']) ? ($_POST['apply_country'] == 'Newzealand' ? 'selected="selected"' : '') : '') : ($object->getApplyCountry() == "Newzealand" ? "selected='selected'" : "")) ?>>New zealand</option>
    </select>
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='apply_institution'>apply_institution </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['apply_institution']) ? strip_tags($_POST['apply_institution']) : '') : $object->getApplyInstitution()))) ?>' type='text' class='form-control' id='apply_institution' name='apply_institution' />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='apply_course'>apply_course </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['apply_course']) ? strip_tags($_POST['apply_course']) : '') : $object->getApplyCourse()))) ?>' type='text' class='form-control' id='apply_course' name='apply_course' />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='comment'>comment <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <textarea class='form-control' rows='5' id='comment' name='comment' required><?php echo ($object->isNew() ? (isset($_POST['comment']) ? htmlentities($_POST['comment']) : '') : htmlentities($object->getComment())) ?></textarea>
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='passport'>passport </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['passport']) ? strip_tags($_POST['passport']) : '') : $object->getPassport()))) ?>' type='text' class='form-control' id='passport' name='passport' />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='graduation_certificate'>graduation_certificate </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['graduation_certificate']) ? strip_tags($_POST['graduation_certificate']) : '') : $object->getGraduationCertificate()))) ?>' type='text' class='form-control' id='graduation_certificate' name='graduation_certificate' />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='degree_certificate'>degree_certificate </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['degree_certificate']) ? strip_tags($_POST['degree_certificate']) : '') : $object->getDegreeCertificate()))) ?>' type='text' class='form-control' id='degree_certificate' name='degree_certificate' />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='academic_transcripts'>academic_transcripts </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['academic_transcripts']) ? strip_tags($_POST['academic_transcripts']) : '') : $object->getAcademicTranscripts()))) ?>' type='text' class='form-control' id='academic_transcripts' name='academic_transcripts' />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='ielts_transcripts'>ielts_transcripts </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['ielts_transcripts']) ? strip_tags($_POST['ielts_transcripts']) : '') : $object->getIeltsTranscripts()))) ?>' type='text' class='form-control' id='ielts_transcripts' name='ielts_transcripts' />
  </div>
</div>
<div class='hr-line-dashed'></div>

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

