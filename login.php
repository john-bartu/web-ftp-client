<?php
session_start();

if (isset($_REQUEST['login'])) {
    if ((empty($_REQUEST['host'])) || (empty($_REQUEST['uname'])) || (empty($_REQUEST['port'])) || (empty($_REQUEST['pass']))) {
        print 'Error! Fill all sections out!';
    } else {
        setcookie("host", $_REQUEST['host']);
        setcookie("uname", $_REQUEST['uname']);
        setcookie("port", $_REQUEST['port']);
        setcookie("pass", $_REQUEST['pass']);
        $_SESSION['path'] = "/";
        setcookie("lin", '1');
        header("Location: index.php");
    }

}
if (isset($_REQUEST['logout'])) {
    setcookie("mycookie", "", time() - 3600);
    setcookie("host", "", time() - 3600);
    setcookie("uname", "", time() - 3600);
    setcookie("port", "", time() - 3600);
    setcookie("pass", "", time() - 3600);
    setcookie("lin", "", time() - 3600);
    setcookie("path", "", time() - 3600);
    header("Location: index.php");
}

if ($_COOKIE['lin'] != '1'):
    ?>
    <script src="semantic/semantic.min.js"></script>


    <style type="text/css">
        body {
            background-color: #DADADA;
        }

        body > .grid {
            height: 100%;
        }

        .image {
            margin-top: -100px;
        }

        .column {
            max-width: 450px;
        }
    </style>
    </head>
    <body>

    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <div class="ui middle aligned center aligned">
                <img src="images/logo.png" class="image">
            </div>
            <h2 class="ui teal image header">

                <div class="content">
                    LOGOWANIE
                </div>
            </h2>
            <form class="ui large form" action="index.php" method="post">
                <input type="hidden" value="91.134.109.98" id="Hostname" name="host">
                <input type="hidden" value="21" id="Port" name="port">

                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="uname" value="test@bartulajan.pl" placeholder="Login">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="pass" value="12345" placeholder="Password">
                        </div>
                    </div>

                    <input type="hidden" name="login">
                    <button class="ui fluid large teal submit button" type="submit">Zaloguj</button>
                </div>
            </form>
        </div>
    </div>

    </body>

<? else:
    $username = $_REQUEST['uname'];
    ?>
    <div class="ui one column grid">
        <div class="column">
            <div class="ui fluid vertical steps">
                <div class="step">
                    <i class="green checkmark icon"></i>
                    <div class="content">
                        <div class="title">Zalogowany jako:</div>
                    </div>
                </div>
                <div class="active step">
                    <i class="user icon"></i>
                    <div class="content">
                        <div class="title"><?php print $username ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="index.php" method="post">
        <button class="ui fluid large red submit button" type="submit">Wyloguj</button>
        <input type="hidden" name="logout"></form>

<? endif; ?>