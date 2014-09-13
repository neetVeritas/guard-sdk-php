<?php
    
    require_once( '../src/lib.inc.php' );

    $subscription = new \Modules\Subscription( $_GET['id'] );
    
    // web-subscription-data.php?id=IDENTIFER
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Guard - Subscription</title>
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
            text-transform:uppercase;
            color:#fff;
            background-color:#3b3d3e;
        }
        </style>
    </head>
    <body>
        <div class="wrapper main">
            <?php if( !$subscription->data ): ?>
            <h1 class="error"><?php echo $subscription->error; ?></h1>
            <?php else: ?>
            <table>
                <tbody>
                    <tr>
                        <?php foreach( $subscription->data as $key=>$p ): ?>
                        <th><?php echo $key ?></th>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <?php foreach( $subscription->data as $p ): ?>
                        <td><?php echo $p; ?></td>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </body>
</html>