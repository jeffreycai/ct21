<?php

$id = isset($vars[1]) ? $vars[1] : null;
$object = Application::findById($id);
if (is_null($object)) {
  HTML::forward('core/404');
}

// handle form submission
if (isset($_POST['submit'])) {
  $error_flag = false;

  /// validation
  
  // validation for $name
  $name = isset($_POST["name"]) ? strip_tags($_POST["name"]) : null;
  if (empty($name)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "name is required.", "zh" => "请填写name"))));
    $error_flag = true;
  }
  
  // validation for $dob
  $dob = isset($_POST["dob"]) ? strip_tags($_POST["dob"]) : null;
  if (empty($dob)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "dob is required.", "zh" => "请填写dob"))));
    $error_flag = true;
  }
  
  // validation for $address
  $address = isset($_POST["address"]) ? strip_tags($_POST["address"]) : null;  
  // validation for $postcode
  $postcode = isset($_POST["postcode"]) ? strip_tags($_POST["postcode"]) : null;  
  // validation for $phone
  $phone = isset($_POST["phone"]) ? strip_tags($_POST["phone"]) : null;  
  // validation for $mobile
  $mobile = isset($_POST["mobile"]) ? strip_tags($_POST["mobile"]) : null;
  if (empty($mobile)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "mobile is required.", "zh" => "请填写mobile"))));
    $error_flag = true;
  }
  
  // validation for $qq
  $qq = isset($_POST["qq"]) ? strip_tags($_POST["qq"]) : null;  
  // validation for $email
  $email = isset($_POST["email"]) ? strip_tags($_POST["email"]) : null;
  if (empty($email)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "email is required.", "zh" => "请填写email"))));
    $error_flag = true;
  }
  
  // validation for $education
  $education = isset($_POST["education"]) ? strip_tags($_POST["education"]) : null;
  if (empty($education)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "education is required.", "zh" => "请填写education"))));
    $error_flag = true;
  }
  
  // validation for $graduate_institution
  $graduate_institution = isset($_POST["graduate_institution"]) ? strip_tags($_POST["graduate_institution"]) : null;
  if (empty($graduate_institution)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "graduate_institution is required.", "zh" => "请填写graduate_institution"))));
    $error_flag = true;
  }
  
  // validation for $ielts
  $ielts = isset($_POST["ielts"]) ? strip_tags($_POST["ielts"]) : null;  
  // validation for $apply_country
  $apply_country = isset($_POST["apply_country"]) ? strip_tags($_POST["apply_country"]) : null;  
  // validation for $apply_institution
  $apply_institution = isset($_POST["apply_institution"]) ? strip_tags($_POST["apply_institution"]) : null;  
  // validation for $apply_course
  $apply_course = isset($_POST["apply_course"]) ? strip_tags($_POST["apply_course"]) : null;  
  // validation for $comment
  $comment = isset($_POST["comment"]) ? $_POST["comment"] : null;
  if (empty($comment)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "comment is required.", "zh" => "请填写comment"))));
    $error_flag = true;
  }
  
  // validation for $passport
  $passport = isset($_POST["passport"]) ? strip_tags($_POST["passport"]) : null;  
  // validation for $graduation_certificate
  $graduation_certificate = isset($_POST["graduation_certificate"]) ? strip_tags($_POST["graduation_certificate"]) : null;  
  // validation for $degree_certificate
  $degree_certificate = isset($_POST["degree_certificate"]) ? strip_tags($_POST["degree_certificate"]) : null;  
  // validation for $academic_transcripts
  $academic_transcripts = isset($_POST["academic_transcripts"]) ? strip_tags($_POST["academic_transcripts"]) : null;  
  // validation for $ielts_transcripts
  $ielts_transcripts = isset($_POST["ielts_transcripts"]) ? strip_tags($_POST["ielts_transcripts"]) : null;  /// proceed submission
  
  // proceed for $name
  $object->setName($name);
  
  // proceed for $dob
  $object->setDob($dob);
  
  // proceed for $address
  $object->setAddress($address);
  
  // proceed for $postcode
  $object->setPostcode($postcode);
  
  // proceed for $phone
  $object->setPhone($phone);
  
  // proceed for $mobile
  $object->setMobile($mobile);
  
  // proceed for $qq
  $object->setQq($qq);
  
  // proceed for $email
  $object->setEmail($email);
  
  // proceed for $education
  $object->setEducation($education);
  
  // proceed for $graduate_institution
  $object->setGraduateInstitution($graduate_institution);
  
  // proceed for $ielts
  $object->setIelts($ielts);
  
  // proceed for $apply_country
  if (!empty($apply_country)) {
    $object->setApplyCountry($apply_country);
  }
  
  // proceed for $apply_institution
  $object->setApplyInstitution($apply_institution);
  
  // proceed for $apply_course
  $object->setApplyCourse($apply_course);
  
  // proceed for $comment
  $object->setComment($comment);
  
  // proceed for $passport
  $object->setPassport($passport);
  
  // proceed for $graduation_certificate
  $object->setGraduationCertificate($graduation_certificate);
  
  // proceed for $degree_certificate
  $object->setDegreeCertificate($degree_certificate);
  
  // proceed for $academic_transcripts
  $object->setAcademicTranscripts($academic_transcripts);
  
  // proceed for $ielts_transcripts
  $object->setIeltsTranscripts($ielts_transcripts);
  if ($error_flag == false) {
    if ($object->save()) {
      Message::register(new Message(Message::SUCCESS, i18n(array("en" => "Record saved", "zh" => "记录保存成功"))));
      HTML::forwardBackToReferer();
    } else {
      Message::register(new Message(Message::DANGER, i18n(array("en" => "Record failed to save", "zh" => "记录保存失败"))));
    }
  }
}



$html = new HTML();

$html->renderOut('core/backend/html_header', array(
  'title' => i18n(array(
  'en' => 'Edit Application',
  'zh' => 'Edit 申请',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('application/backend/application_edit', array(
  'object' => $object
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

