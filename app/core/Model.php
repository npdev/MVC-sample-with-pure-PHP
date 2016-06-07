<?php

namespace app\core;

class Model {

    public $STATIC_PAGES = array('about', 'statement', 'reviews');
    public $ALL_PAGES = array(
        'index.php' => 'Home',
        'gallery.php' => 'Gallery',
        'about.php' => 'About',
        'statement.php' => 'Statement',
        'reviews.php' => 'Reviews',
        'contact.php' => 'Contact'
    );

    public function isPage($page) {
        if (!empty($this->ALL_PAGES[$page])) {
            return TRUE;
        } else
            return FALSE;
    }

    public function isStaticPage($page) {
        return in_array($page, $this->STATIC_PAGES);
    }

    public function getYears() {
        $years = array();
        if ($handle = opendir($_SERVER['DOCUMENT_ROOT'])) {
            while ($file = readdir($handle)) {
                if (preg_match("/[1-2][0-9][0-9][0-9]/i", $file) != NULL) {
                    $years[$file] = $file;
                }
            }
            closedir($handle);
        }
        arsort($years);
        return $years;
    }

}
