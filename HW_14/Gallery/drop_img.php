<?php
function dropImg()
{
    if (!empty($_POST['deleted'])) {
        $filename = $_POST['deleted'];
            if (file_exists($filename)) {
                unlink($filename);
//                echo 'Files1 ' . $filename . ' has been deleted';
                echo "<meta http-equiv='refresh' content='0'>";
            } else {
                echo 'Could not delete ' . $filename . ', files does not exist';
            }
    }
}