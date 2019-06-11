<?php
/** @var array $scriptProperties */
/** @var easyComm $easyComm */
if (!$easyComm = $modx->getService('easyComm', 'easyComm', $modx->getOption('ec_core_path', null, $modx->getOption('core_path') . 'components/easycomm/') . 'model/easycomm/', $scriptProperties)) {
    return 'Could not load easyComm class!';
}

/* @var string $thread */
$thread = $modx->getOption('thread', $scriptProperties, '');
if(empty($thread)) {
    $thread = 'resource-'.$modx->resource->get('id');
}

$ratingMax = (float)$modx->getOption('ec_rating_max', $scriptProperties, 5);
$ratingFields = $easyComm->getEcMessageRatingFields();
$itemReviewed = $modx->getOption('itemReviewed', $scriptProperties, '');

// Initialize an empty array
$data = array(
    'rating_max' => $ratingMax,
    'itemReviewed' => $itemReviewed
);
foreach($ratingFields as $field){
    $data = array_merge($data, array(
        $field.'_wilson' => 0,
        $field.'_simple' => 0,
        $field.'_wilson_percent' => 0,
        $field.'_simple_percent' => 0
    ));
}

/* @var MODx $modx */
/* @var ecThread $thread */
$thread = $modx->getObject('ecThread', array('name' => $thread));
if(!empty($thread)) {
    $data = array_merge( $data, $thread->toArray());
    $votes = $thread->getVotes();
    $count = $thread->get('count');
    foreach($ratingFields as $field) {
        $data = array_merge($data, array(
            $field.'_wilson_percent' => number_format($thread->get($field.'_wilson') / $ratingMax * 100, 3),
            $field.'_simple_percent' => number_format($thread->get($field.'_simple') / $ratingMax * 100, 3),
            // TEST only
            $field.'_votes' => array(),
        ));

        $fieldVotes = array();
        foreach($votes[$field] as $k => $v) {
            $fieldVotes[$k] = array(
                'count' => $v,
                'volume' => $count ? (round(($v / $count) * 100.0, 2)) : 0
            );
        }
        krsort($fieldVotes, SORT_NUMERIC);
        $data[$field.'_votes'] = $fieldVotes;
    }
}

$tpl = $modx->getOption('tpl', $scriptProperties, '');
$fastMode = !empty($fastMode);
$output = $easyComm->getChunk($tpl, $data, $fastMode);

$toPlaceholder = $modx->getOption('toPlaceholder', $scriptProperties, '');
if (!empty($toPlaceholder)) {
    $modx->setPlaceholder($toPlaceholder, $output);
}
else {
    return $output;
}
