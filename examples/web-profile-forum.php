<?php
    
    require_once( '../src/lib.inc.php' );

    $user = new \Modules\User( $_GET['user'], $_GET['phrase'] );
    
    // web-profile-forum.php?user=USERNAME&phrase=PHRASE
    
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
            overflow:auto;
            margin:5em auto 5em auto;
            width:800px;
        }
        h1{
            font-size:30px;
        }
        h1.error{
            color:#800;
        }
        img.avatar{
            display:block;
            float:left;
            margin-bottom:1em;
            width:120px;
            height:120px;
            border:2px solid #3b3d3e;
            border-bottom:8px solid #3b3d3e;
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
            <?php if( !$user->data->foro ): ?>
            <h1 class="error"><?php echo $user->error; ?></h1>
            <?php else: ?>
            <img class="avatar" src="<?php echo $user->data->foro['avatar']; ?>"></img>
            <table>
                <tbody>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Trophy Points</th>
                        <th>Credits</th>
                    </tr>
                    <tr>
                        <td><?php echo $user->data->foro['username']; ?></td> <!-- left here -->
                        <td><?php echo $user->data->foro['email']; ?></td>
                        <td><?php echo $user->data->foro['trophy_points']; ?></td>
                        <td><?php echo $user->data->foro['credits']; ?></td>
                    </tr>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </body>
</html>