<?php
    
    require_once( '../src/lib.inc.php' );

    $app = new \Modules\App( $_GET['id'] );
    
    // web-app-data.php?id=IDENTIFIER
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Guard - Application Data</title>
        <meta charset="UTF-8">
        <meta name="description" content="Guard Web Portal">
        <meta name="keywords" content="HTML,CSS">
        <style>
        html{
            margin:0;
            padding:0;
        }
        body{
            cursor:default;
            text-align:center;
            background-color:#f5f5f5;
        }
        div.wrapper {
            display:block;
        }
        div.wrapper.main{
            margin:5em auto 5em auto;
            width:800px;
        }
        h1{
            font-size:30px;
        }
        h1.error{
            color:#800;
        }
        table{
            width:800px;
            font-size:16px;
            color:#3b3d3e;
            background-color:#fff;
            border-collapse:collapse;
        }
        tr,th,td{
            padding:10px;
            border:1px solid #3b3d3e;
        }
        th{
            color:#fff;
            text-transform:uppercase;
            background-color:#3b3d3e;
        }
        </style>
    </head>
    <body>
        <div class="wrapper main">
            <?php if( !$app->data ): ?>
            <h1 class="error"><?php echo $app->error; ?></h1>
            <?php else: ?>
            <table>
                <tbody>
                    <tr>
                        <?php foreach( $app->data as $key=>$f ): ?>
                        <th><?php echo $key ?></th>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <?php foreach( $app->data as $f ): ?>
                        <td><?php echo $f ?></td>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </body>
</html>