<?php

namespace app\widgets;

/**
 * @author Igor Lazarev <strider2038@rambler.ru>
 */
class SampleWidget extends \strider2038\tools\components\Widget {
    
    /**
     * @inheritdoc
     */
    public function run() {
        return $this->render($this->template);
    }
}
