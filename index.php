<?php
session_start();
ob_start(); ?>
    <!DOCTYPE HTML>
    <head>
        <title>HTML5 Download</title>

        <link rel="stylesheet" type="text/css" href="semantic/semantic.min.css">
        <script
                src="https://code.jquery.com/jquery-3.1.1.min.js"
                integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
                crossorigin="anonymous"></script>
        <script src="semantic/semantic.min.js"></script>


        <!--        <link href="reset.css" rel="stylesheet" type="text/css">-->
        <!--        <link href="main.css" rel="stylesheet" type="text/css">-->
        <script src="http://code.jquery.com/jquery-latest.js"></script>


        <script>
            $(document).ready(function () {
                $("#listing").load("ftp.php");
                var refreshId = setInterval(function () {
                    $("#listing").load('ftp.php?randval=' + Math.random());
                }, 9000);
                $.ajaxSetup({cache: false});
            });
        </script>
    </head>
<?php

if ($_COOKIE['lin'] != '1'):
    include('login.php');
else:
    ?>

    <body class="template">
    <div class="ui inverted huge borderless fixed fluid menu">
        <a class="header item">Przegladarka Plikow</a>
        <div class="right menu">
            <a class="item">Wyloguj</a>
        </div>
    </div>
    <div class="ui grid">
        <div class="row">
            <div class="column" id="sidebar">
                <div class="ui secondary vertical fluid menu">
                    <a class="active item">Menu</a>
                </div>
                <div class="ui vertical fluid menu">
                    <?php if ($_COOKIE['lin'] == '1') include('login.php'); ?>
                </div>
            </div>


            <div class="column" id="content">
                <div class="ui grid">
                    <div class="row">

                        <h1 class="ui huge header">
                            Dashboard
                        </h1>
                    </div>
                    <div class="row">
                        <?php
                        $_SESSION['path'] = $_REQUEST["dir"];
                        $newdir = $_SESSION['path'];
                        ?>

                        <div id="listing">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style type="text/css">
        body {
            display: relative;
        }

        #sidebar {
            position: fixed;
            top: 51.8px;
            left: 0;
            bottom: 0;
            width: 18%;
            max-width: 256px;
            background-color: #f5f5f5;
            padding: 0px;
        }

        #sidebar .ui.menu {
            margin: 2em 0 0;
            font-size: 16px;
        }

        #sidebar .ui.menu > a.item {
            color: #337ab7;
            border-radius: 0 !important;
        }

        #sidebar .ui.menu > a.item.active {
            background-color: #337ab7;
            color: white;
            border: none !important;
        }

        #sidebar .ui.menu > a.item:hover {
            background-color: #4f93ce;
            color: white;
        }

        #content {
            margin-left: 18%;
            width: 81%;
            margin-top: 3em;
            padding-left: 3em;
            float: left;
        }

        #content > .ui.grid {
            padding-right: 4em;
            padding-bottom: 3em;
        }

        #content h1 {
            font-size: 36px;
        }

        #content .ui.divider:not(.hidden) {
            margin: 0;
        }

        #content table.ui.table {
            border: none;
        }

        #content table.ui.table thead th {
            border-bottom: 2px solid #eee !important;
        }

        #listing {
            width: 100%;
        }
    </style>
    </body>
<?php endif; ?>


    </html>

<?php ob_flush(); ?>