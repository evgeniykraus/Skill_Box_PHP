<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/core.php';

$connection = new ConnectDB();
$db = $connection->getConnection();
$messages = new Messages($db);

$categories = $messages->getCats();

$folderData = mysqli_query($db, "SELECT * FROM categories");

$folders_arr = array();
while ($row = mysqli_fetch_assoc($folderData)) {
    $parentid = $row['parent_id'];
    if ($parentid == '0') $parentid = "#";

    $selected = false;
    $opened = false;
    if ($row['id'] == 2) {
        $selected = true;
        $opened = true;
    }
    $folders_arr[] = array(
        "id" => $row['id'],
        "parent" => $parentid,
        "text" => $row['title'],
        "state" => array("selected" => $selected, "opened" => $opened)
    );
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Create Treeview with jsTree plugin and PHP</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
</head>
<body>


<div align="centre">

    <!-- Initialize jsTree -->
    <div id="folder_jstree"></div>

    <!-- Store folder list in JSON format -->
    <textarea hidden="" id='txt_folderjsondata'><?= json_encode($folders_arr); ?></textarea>


    <script>
        $(document).ready(function () {
            let folder_jsondata = JSON.parse($('#txt_folderjsondata').val());

            $('#folder_jstree').jstree({
                'core': {
                    'data': folder_jsondata,
                    'multiple': false
                }
            });

        });
    </script>
</div>
</body>
</html>


