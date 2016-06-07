<script>
    $(function () {

        // Call SuperBox
        $('.superbox').SuperBox();

    });
</script>
<!-- SuperBox -->
<div class="superbox">
    <?php
    if ($handle = opendir($this->DIR.'/'.$this->year)) {
        $extension = array('jpeg', 'jpg', 'jpe', 'jp2', 'gif', 'png', 'ico', 'tiff', 'tif', 'bmp');
        while (false !== ($file = readdir($handle))) {
            if (preg_match("/\.(?:jp(?:e?g|e|2)|gif|png|tiff?|bmp|ico)$/i", $file) != NULL) {
                $pos = strrpos($file, ".");
                $name = substr($file, 0, $pos);
                $file = $this->year . '/' . $file;
                echo '<div class="superbox-list">
                            <div class="alignimg">
                                <img src="/' . $file . '" data-img="/' . $file . '" alt="" class="superbox-img">
                                <div class="superbox-name" style="display:none;">' . $name . '</div>
                                <div class="superbox-float"></div>
                             </div>   
                        </div>';
            }
        }
        closedir($handle);
    }
    ?>
    <!-- /SuperBox -->
</div>