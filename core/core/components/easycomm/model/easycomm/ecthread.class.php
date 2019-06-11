<?php
class ecThread extends xPDOSimpleObject {

    /**
     * Обновление сводной информации о сообщениях в данной цепочке
     */
    public function updateMessagesInfo() {
        $ratingFields = $this->getRatingFields();
        $ratingMax = $this->xpdo->getOption('ec_rating_max', null, 5);
        $tmp = array_fill_keys(range(1, $ratingMax), 0);

        $ratingCount = array_fill_keys($ratingFields, 0);
        $ratingSum = array_fill_keys($ratingFields, 0);
        $ratingVotes = array_fill_keys($ratingFields, $tmp);
        $messagesCount = 0;

        $q = $this->xpdo->newQuery('ecMessage', array('thread' => $this->get('id'), 'published' => 1, 'deleted' => 0));
        $q->select($this->xpdo->getSelectColumns('ecMessage', 'ecMessage', '', $ratingFields));

        if ($q->prepare() && $q->stmt->execute()) {
            $messages = $q->stmt->fetchAll(PDO::FETCH_ASSOC);

            $messagesCount = count($messages);
            foreach($messages as $message) {
                foreach ($ratingFields as $field) {
                    // Only messages that have a non-zero rating.
                    if($message[$field] > 0){
                        $ratingCount[$field]++;
                        $ratingSum[$field] += $message[$field];
                        $ratingVotes[$field][$message[$field]]++;
                    }
                }
            }
        }

        foreach ($ratingFields as $field) {
            $ratingWilson = $this->calcWilsonRating($ratingSum[$field], $ratingCount[$field], 1, $ratingMax);
            $ratingSimple = $this->calcSimpleRating($ratingSum[$field], $ratingCount[$field]);

            $this->set($field.'_wilson', $ratingWilson);
            $this->set($field.'_simple', $ratingSimple);
        }

        $this->set('count', $messagesCount);
        $this->set('votes', $ratingVotes);


        $qLast = $this->xpdo->newQuery('ecMessage', array('thread' => $this->get('id'), 'published' => 1, 'deleted' => 0));
        $qLast->sortby('date', 'DESC');
        $qLast->limit(1);
        $last = $this->xpdo->getObject('ecMessage', $qLast);

        if ($last) {
            $this->set('message_last', $last->get('id'));
            $this->set('message_last_date', $last->get('date'));
        }
        else {
            $this->set('message_last', 0);
            $this->set('message_last_date', null);
        }

        $this->save();
    }

    public function getVotes() {
        $votes = $this->get('votes');
        if(empty($votes)) {
            $this->updateMessagesInfo();
            $votes = $this->get('votes');
        }
        return $votes;
    }

    /*
     * See https://habr.com/company/darudar/blog/143188/
     */
    private function calcWilsonRating($sum, $count, $minAllowedRating, $maxAllowedRating){
        if($count <= 0) {
            return 0;
        }
        //1.0 = 85%, 1.6 = 95%
        $z = floatval($this->xpdo->getOption('ec_rating_wilson_confidence', null, 1.6));

        $width = (float) $maxAllowedRating - $minAllowedRating;
        $c = (float) $count;
        $phat = ($sum - $c * $minAllowedRating) / $width / $c;
        $rating = ($phat + $z * $z/(2 * $c) - $z * sqrt(($phat * (1 - $phat) + $z * $z / (4 * $c))/$c))/(1 + $z * $z/$c);
        return $rating * $width + $minAllowedRating;
    }

    private function calcSimpleRating($sum, $count){
        if($count <= 0) {
            return 0;
        }
        return $sum / (float) $count;
    }

    private function getRatingFields() {
        // TODO: Данная функция дубль имеющейся в классе easyComm
        $ratingFields = $this->xpdo->getOption('ec_rating_fields', null, 'rating');
        $ratingFields = array_map('trim', explode(',', $ratingFields));
        return array_unique(array_merge(array('rating'), $ratingFields));
    }
}
