<?php
// This is an alternative subscription message showing page. Variables are already initialized
// on the original page which includes this one.
?>
<html>
    <head>
        <link rel="stylesheet" id="viska-css" href="/wp-content/themes/301_creativa/style.css" type="text/css" media="all">
        <style type="text/css">
            
            body {
                font-family: futura-bt;
                font-size: 20px;
                color: #333;
                background: #fff;
            }
            #container {
                border-radius: 0px;
                margin: 40px auto;
                max-width: 650px;
                width:100%;
                padding: 30px 0;
                text-align: center;
            }
            h1 {
                font-size: 30px;
                font-weight: normal;
                border-bottom: 0px solid #aaa;
                margin-top: 0;
            }
            h1.logo img {
                width: 170px;
            }
            h2 {
                font-size: 20px;
            }
            th, td {
                font-size: 12px;
            }
            th {
                padding-right: 10px;
                text-align: right;
                vertical-align: middle;
                font-weight: normal;
            }
            
            #message {
                line-height: 1.6em;
            }
            
            .title {
                font-size: 30px;
                color: #d94e3c;
            }
            
            .btn_site {
                display: inline-block;
                padding: 5px 30px;
                color: #fff;
                text-decoration: none;
                background: #079ab7;
                margin-top: 30px;
                font-family: janeAust;
                font-size: 1.5rem;
                transition: all .4s ease;
                -webkit-transition: all .4s ease;
            }
            
            a {
                color: #03b0d2;
                text-decoration: none;
            }
            
            a:hover {
                color: #d94e3c;
            }
            
            .btn_site:hover {
                opacity: 0.8;
                transform: scale(1.1);
                color: #fff;
            }
        </style>
    </head>

    <body>
        <?php if (!empty($alert)) { ?>
        <script>
            alert("<?php echo addslashes(strip_tags($alert)); ?>");
        </script>
        <?php } ?>
        <div id="container">
            <h1 class="logo"><img src="http://www.301creativastudio.com/wp-content/themes/301_creativa/assets/images/301-black.svg" alt=""></h1>
            <div id="message">
            <?php echo $message; ?>
            </div>
            <a class="btn_site" href="http://www.301creativastudio.com/">Ir al sitio</a>
        </div>
    </body>
</html>