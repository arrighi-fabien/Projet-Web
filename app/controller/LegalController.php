<?php

class LegalController {

    public function __construct($target) {
        $page = 'legal-page';
        if ($target == 'terms') {
            $tpl = 'legal-information';
        }
        else if ($target == 'privacy') {
            $tpl = 'privacy-policy';
        }
        else if ($target == 'aboutus') {
            $tpl = 'about-us';
        }
        require_once '../app/view/view.php';
    }
}
