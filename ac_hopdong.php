<?php
    require_once 'config/data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/flatly/bootstrap.min.css" integrity="sha384-qF/QmIAj5ZaYFAeQcrQ6bfVMAh4zZlrGwTPY7T/M+iTTLJqJBJjwwnsE5Y0mV7QK" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <title>Ds hợp đồng</title>
</head>
<body>
<?php
    if(isset($_GET['page_layout']))
    {
        switch($_GET['page_layout'])
        {
           
            case 'view_ht':
                require_once'layout/hopdong/view_ht.php';
                break;
            case 'view_ht_kt':
                require_once'layout/hopdong/view_ht_kt.php';
                break;

            case 'view_cht':
                require_once'layout/hopdong/view_cht.php';
                break;
            case 'view_cht_kt':
                require_once'layout/hopdong/view_cht_kt.php';
                break;

            case 'them':
                require_once'layout/hopdong/them.php';
                break;
            case 'them_kt':
                require_once'layout/hopdong/them_kt.php';
                break;

            case 'them1':
                require_once'layout/hopdong/them1.php';
                break;
            case 'them1_kt':
                require_once'layout/hopdong/them1_kt.php';
                break;

            case 'hoadon':
                require_once'layout/hopdong/hoadon.php';
                break;

            case 'sua':
                require_once'layout/hopdong/sua.php';
                break;
            case 'sua_kt':
                require_once'layout/hopdong/sua_kt.php';
                break;
          
            default;
                require_once'layout/hopdong/view_cht.php';
                 break;
        }
    }
    else
    {
        require_once'layout/hopdong/view_cht.php';
    }
    ?>
</body>
</html>