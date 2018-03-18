<?php
// For instance, you can do something like this:
if(isset($_POST['width']) && isset($_POST['height'])) {
    $_SESSION['screen_width'] = $_POST['width'];
    $_SESSION['screen_height'] = $_POST['height'];
   return $_SESSION['screen_width'];
}
?>