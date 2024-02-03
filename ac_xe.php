<?php
    require_once 'config/data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/flatly/bootstrap.min.css" integrity="sha384-qF/QmIAj5ZaYFAeQcrQ6bfVMAh4zZlrGwTPY7T/M+iTTLJqJBJjwwnsE5Y0mV7QK" crossorigin="anonymous">
    <title>Danh sách xe</title>
</head>
<body>
<?php
    if(isset($_GET['page_layout']))
    {
        switch($_GET['page_layout'])
        {
            case 'view':
                require_once'layout/xe/view.php';
                break;
            case 'chitiet':
                require_once'layout/xe/chitiet.php';
                break;
            case 'them':
                require_once'layout/xe/them.php';
                break;
             case 'sua':
                require_once'layout/xe/sua.php';
                break;
             case 'xoa':
                require_once'layout/xe/xoa.php';
                break;
            default;
                require_once'layout/xe/view.php';
                 break;
        }
    }
    else
    {
        require_once'layout/xe/view.php';
    }
    ?>
</body>
</html>