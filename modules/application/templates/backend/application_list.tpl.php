

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?php i18n_echo(array('en' => 'Application','zh' => '申请',)); ?></h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading"><?php i18n_echo(array('en' => 'List', 'zh' => '列表')) ?></div>
        <div class="panel-body">
          
        <?php echo Message::renderMessages(); ?>
          
<table class="table table-striped table-bordered table-hover dataTable no-footer">
  <thead>
      <tr role="row">
                <th>id</th>
                <th>name</th>
                <th>dob</th>
                <th>address</th>
                <th>postcode</th>
                <th>phone</th>
                <th>mobile</th>
                <th>qq</th>
                <th>email</th>
                <th>education</th>
                <th>graduate_institution</th>
                <th>ielts</th>
                <th>apply_country</th>
                <th>apply_institution</th>
                <th>apply_course</th>
                <th>comment</th>
                <th>passport</th>
                <th>graduation_certificate</th>
                <th>degree_certificate</th>
                <th>academic_transcripts</th>
                <th>ielts_transcripts</th>
                <th>Actions</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($objects as $object): ?>
    <tr>
            <td><?php echo $object->getId() ?></td>
            <td><?php echo $object->getName() ?></td>
            <td><?php echo $object->getDob() ?></td>
            <td><?php echo $object->getAddress() ?></td>
            <td><?php echo $object->getPostcode() ?></td>
            <td><?php echo $object->getPhone() ?></td>
            <td><?php echo $object->getMobile() ?></td>
            <td><?php echo $object->getQq() ?></td>
            <td><?php echo $object->getEmail() ?></td>
            <td><?php echo $object->getEducation() ?></td>
            <td><?php echo $object->getGraduateInstitution() ?></td>
            <td><?php echo $object->getIelts() ?></td>
            <td><?php echo $object->getApplyCountry() ?></td>
            <td><?php echo $object->getApplyInstitution() ?></td>
            <td><?php echo $object->getApplyCourse() ?></td>
            <td><?php echo $object->getComment() ?></td>
            <td><?php echo $object->getPassport() ?></td>
            <td><?php echo $object->getGraduationCertificate() ?></td>
            <td><?php echo $object->getDegreeCertificate() ?></td>
            <td><?php echo $object->getAcademicTranscripts() ?></td>
            <td><?php echo $object->getIeltsTranscripts() ?></td>
            <td>
        <div class="btn-group">
          <a class="btn btn-default btn-sm" href="<?php echo uri('admin/application/edit/' . $object->getId()); ?>"><i class="fa fa-edit"></i></a>
          <a onclick="return confirm('<?php echo i18n(array('en' => 'Are you sure to delete this record ?', 'zh' => '你确定删除这条记录吗 ?')); ?>');" class="btn btn-default btn-sm" href="<?php echo uri('admin/application/delete/' . $object->getId(), false); ?>"><i class="fa fa-remove"></i></a>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div class="row">
  <div class="col-sm-12" style="text-align: right;">
  <?php i18n_echo(array(
      'en' => 'Showing ' . $start_entry . ' to ' . $end_entry . ' of ' . $total . ' entries', 
      'zh' => '显示' . $start_entry . '到' . $end_entry . '条记录，共' . $total . '条记录',
  )); ?>
  </div>
  <div class="col-sm-12" style="text-align: right;">
  <?php echo $pager; ?>
  </div>
</div>
          
        </div>
      </div>
    </div>
  </div>
</div>