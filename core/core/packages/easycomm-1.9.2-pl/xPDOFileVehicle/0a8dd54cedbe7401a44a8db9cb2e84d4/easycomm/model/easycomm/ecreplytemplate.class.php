<?php
class ecReplyTemplate extends xPDOSimpleObject {

    public static function getTextPreview($text) {
        $limit = 250;
        $ellipsis = '...';

        $result = strip_tags($text);
        if( mb_strlen($result) > $limit ) {
            $endPosition = mb_strpos(str_replace(array("\r\n", "\r", "\n", "\t"), ' ', $result), ' ', $limit);
            if($endPosition !== FALSE)
                $result = trim(mb_substr($result, 0, $endPosition)) . $ellipsis;
        }
        return $result;
    }
}