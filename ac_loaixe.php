<?php
    require_once 'config/data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/flatly/bootstrap.min.css" integrity="sha384-qF/QmIAj5ZaYFAeQcrQ6bfVMAh4zZlrGwTPY7T/M+iTTLJqJBJjwwnsE5Y0mV7QK" crossorigin="anonymous">
    <link href="css/table.css" rel="stylesheet">
    <title>Ds loại xe</title>
</head>
<body>
<?php
    if(isset($_GET['page_layout']))
    {
        switch($_GET['page_layout'])
        {
            case 'view':
                require_once'layout/loaixe/view.php';
                break;
            case 'them':
                require_once'layout/loaixe/them.php';
                break;
             case 'sua':
                require_once'layout/loaixe/sua.php';
                break;
             case 'xoa':
                require_once'layout/loaixe/xoa.php';
                break;
            default;
                require_once'layout/loaixe/view.php';
                 break;
        }
    }
    else
    {
        require_once'layout/loaixe/view.php';
    }
    ?>
</body>
</html>