<?php
    
    require_once( '../src/lib.inc.php' );
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Guard - Credit Transfer</title>
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
            background-color:#f5f5f5;
        }
        div.wrapper {
            display:block;
        }
        div.wrapper.main{
            margin:5em auto 5em auto;
            width:800px;
        }
        form.wrapper.credit{
            margin:0 auto 0 auto;
            padding:25px;
            width:250px;
            background-color:#fff;
            border:1px solid #d3d3d3;
            border-radius:5px;
        }
        p.input.section{
            padding:2px 0 2px 0;
        }
        input.textbox{
            cursor:default;
            padding:10px;
            height:15px;
            width:225px;
            font-size:16px;
            color:#696969;
            border:1px solid #d3d3d3;
        }
        input.textbox:focus{
            cursor:text;
            color:#000;
            border:1px solid #696969;
        }
        input.button{
            cursor:pointer;
            padding:5px;
            width:100%;
            font-size:16px;
            font-weight:bold;
            color:#fff;
            background-color:#61AE50;
            border:none;
            border-bottom:3px solid #529C41;
            border-radius:2px;
        }
        input.button:hover{
            background-color:#3B3D3E;
	        border-bottom:2px solid #3B3D3E;
        }
        label{
            cursor:pointer;
            font-size:16px;
            font-weight:bold;
            font-style:italic;
            color:#696969;
        }
        h1{
            font-size:30px;
        }
        h1.error{
            color:#800;
        }
        </style>
    </head>
    <body>
        <div class="wrapper main">
            <form class="wrapper credit" method="post" action="web-credit-transfer.php" name="transfer">
                <p class="input section">
                    <label for="username">
                        Username<br />
                        <input id="username" class="input textbox" type="text" name="username" />
                    </label>
                </p>
                <p class="input section">
                    <label for="phrase">
                        Phrase<br />
                        <input id="phrase" class="input textbox" type="password" name="phrase" />
                    </label>
                </p>
                <p class="input section">
                    <label for="secret">
                        Secret<br />
                        <input id="secret" class="input textbox" type="text" name="secret" />
                    </label>
                </p>
                <p class="input section">
                    <label for="password">
                        Password<br />
                        <input id="password" class="input textbox" type="password" name="password" />
                    </label>
                </p>
                <p class="input section">
                    <label for="credit">
                        Credit<br />
                        <input id="credit" class="input textbox" type="text" name="credit" />
                    </label>
                </p>
                <p class="input section">
                    <label for="recipient">
                        Recipient<br />
                        <input id="recipient" class="input textbox" type="text" name="recipient" />
                    </label>
                </p>
                <p class="input section">
                    <input id="transfer" class="input button" type="submit" value="Transfer" />
                </p>
            </form>
            <?php
            
                if( $_POST['username'] ):
                    $user = new \Modules\User( $_POST['username'], $_POST['phrase'] );
                    if( $user->error ):
                        echo "
<script>
    window.alert('$user->error');
</script>
";
                    else:
                        $result = \Modules\User\Credit::transfer( $user, $_POST['secret'], $_POST['password'], $_POST['credit'], $_POST['recipient'] );
                        if ( !$result ):
                            echo "
<script>
    window.alert('Credit Transfer Failed');
</script>
";
                        else:
                            echo "
<script>
    window.alert('Credit Transfer Successful');
</script>
";
                        endif;
                    endif;
                endif;
            
            ?>
        </div>
    </body>
</html>