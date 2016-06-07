<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>John Doe | PAINTER</title>
        <link href="/app/css/template.css" type="text/css" rel="stylesheet" />
        <link href="/app/css/menu.css" type="text/css" rel="stylesheet" />
        <?php
        foreach ($this->css as $link) {
            echo $link . "\n";
        }
        foreach ($this->js as $link) {
            echo $link . "\n";
        }
        ?>
    </head>
    <body>
        <div id="wrapper">
            <div id="header"><a href="/">John Doe</a><br />
                <strong id="quote-title">"Life is a mystery... An artist moves aside a curtain"</strong>
            </div>
            <div id="navigation">
                <ul class="mainNav1">
                    <?php
                    foreach ($this->allPages as $link => $p) {
                        echo '<li><a href="/' . $link . '" class="level_1">' . $p . '</a></li>';
                        if ($link == 'gallery.php') {
                            echo '<li><ul id="mainNav2" class="mainNav2">';
                            foreach ($this->years as $key => $y) {
                                echo '<li><a href="/gallery.php/?y=' . $key . '" class="level_2">' . $y . '</a></li>';
                            }
                            echo '</li></ul>';
                        }
                    }
                    ?>
                </ul>
            </div>
            <div id="content">
                <?php include $page; ?>
            </div>
        </div>
        <footer>
            <a href="-facebookadress-" target="_blank">
                <img src="/images/facebook.jpg" alt="facebook" width="18" height="18" align="left">
            </a>
            <a href="-flickradress-" target="_blank">
                <img src="/images/Flickr.png" alt="flickr" width="20" height="20" style="margin-top: -1px">
            </a>
            <span>©2015 John Doe</span>
        </footer>
    </body>
</html>