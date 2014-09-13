<?php
    
    require_once( '../src/lib.inc.php' );

    $user = new \Modules\User( $_GET['user'], $_GET['phrase'] );
    
    // web-profile.php?user=USERNAME&phrase=PHRASE
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Guard - Profile</title>
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
            background-color:#3b3d3e;
        }
        </style>
    </head>
    <body>
        <div class="wrapper main">
            <?php if( !$user->data->guard ): ?>
            <h1 class="error"><?php echo $user->error; ?></h1>
            <?php else: ?>
            <table>
                <tbody>
                    <tr>
                        <th>Username</th>
                        <th>Last Login</th>
                        <th>Admin</th>
                        <th>Developer</th>
                        <th>Banned</th>
                    </tr>
                    <tr>
                        <td><?php echo $user->data->guard['username']; ?></td>
                        <td><?php echo date( "D d/m/y", $user->data->guard['last_login'] ); ?></td>
                        <td><?php echo $user->data->guard['admin'] === true?'y':'n'; ?></td>
                        <td><?php echo $user->data->guard['developer'] === true?'y':'n'; ?></td>
                        <td><?php echo $user->data->guard['banned'] === true?'y':'n'; ?></td>
                    </tr>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </body>
</html>