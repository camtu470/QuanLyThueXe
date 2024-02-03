<?php
    require_once 'config/data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/flatly/bootstrap.min.css" integrity="sha384-qF/QmIAj5ZaYFAeQcrQ6bfVMAh4zZlrGwTPY7T/M+iTTLJqJBJjwwnsE5Y0mV7QK" crossorigin="anonymous">
    <title>Ds đặt xe</title>
</head>
<body>
<?php
    if(isset($_GET['page_layout']))
    {
        switch($_GET['page_layout'])
        {
            case 'view':
                require_once'layout/datxe/view.php';
                break;
            case 'view_kt':
                require_once'layout/datxe/view_kt.php';
                break;

            case 'view_ht':
                require_once'layout/datxe/view_ht.php';
                break;
            case 'view_ht_kt':
                require_once'layout/datxe/view_ht_kt.php';
                break;

            case 'them_test':
                require_once'layout/datxe/them_test.php';
                break;
            case 'them_test_kt':
                require_once'layout/datxe/them_test_kt.php';
                break;

            case 'them':
                require_once'layout/datxe/them.php';
                break;
            case 'them_kt':
                require_once'layout/datxe/them_kt.php';
                break;

             case 'sua':
                require_once'layout/datxe/sua.php';
                break;
             case 'sua_kt':
                require_once'layout/datxe/sua_kt.php';
                break;

             case 'xoa':
                require_once'layout/datxe/xoa.php';
                break;
            default;
                require_once'layout/datxe/view.php';
                 break;
        }
    }
    else
    {
        require_once'layout/datxe/view.php';
    }
    ?>
</body>
</html>