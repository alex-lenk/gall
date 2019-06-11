<?php
/** @var array $scriptProperties */
/** @var easyComm $easyComm */
if (!$easyComm = $modx->getService('easyComm', 'easyComm', $modx->getOption('ec_core_path', null, $modx->getOption('core_path') . 'components/easycomm/') . 'model/easycomm/', $scriptProperties)) {
    return 'Could not load easyComm class!';
}
$easyComm->initialize($modx->context->key, $scriptProperties);

$tplForm = $modx->getOption('tplForm', $scriptProperties, 'tpl.ecForm');
$threadName = $modx->getOption('thread', $scriptProperties, '');
if(empty($threadName)) {
    $threadName = 'resource-'.$modx->resource->get('id');
    $scriptProperties['thread'] = $threadName;
}
$formId = $modx->getOption('formId', $scriptProperties, '');
if(empty($formId)) {
    $formId = $threadName;
    $scriptProperties['formId'] = $formId;
}

// Prepare ecThread
/** @var ecThread $thread */
if (!$thread = $modx->getObject('ecThread', array('name' => $threadName))) {
    $thread = $modx->newObject('ecThread');
    $thread->fromArray(array(
        'resource' => $modx->resource->id,
        'name' => $threadName,
        'title' => $modx->getOption('threadTitle', $scriptProperties, ''),
    ));
}
$thread->set('properties', $scriptProperties);
$thread->save();

$data = array(
    'fid' => $formId,
    'thread' => $thread->get('name'),
    'antispam_field' => $modx->getOption('antispamField', $scriptProperties)
);

if ($modx->user->hasSessionContext($modx->context->get('key'))) {
    $profile = $modx->user->getOne('Profile');
    $data['user_name'] = $profile->get('fullname');
    if(empty($data['user_name'])) {
        $data['user_name'] = $modx->user->get('username');
    }
    $data['user_email'] = $profile->get('email');
}

if($modx->getOption('ec_captcha_enable')) {
    $tplFormReCaptcha = $modx->getOption('tplFormReCaptcha', $scriptProperties, 'tpl.ecForm.ReCaptcha');
    $data['recaptcha'] = $easyComm->getChunk($tplFormReCaptcha, $data);
}

return $easyComm->getChunk($tplForm, $data);