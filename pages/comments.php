<!doctype php>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="author" content="Sanvito Stefano"/>
    <meta name="description" content="School Finals Website Project"/>

    <link rel="stylesheet" href="../css/custom-theme-bootstrap.css"/>
    <link rel="stylesheet" href="../css/font-awesome-4.4.0/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="../js/sweetalert2-master/dist/sweetalert2.css"/>
    <link rel="stylesheet" href="../css/style.css"/>

    <title>Sanvito Stefano's Website</title>
</head>
<body>
    <!---  Header  --->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.html"><img class="navbar-brand" alt="Level Up!" src="../img/logo.png"/></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="navbar-li"><a class="navbar-a" href="../index.html"><i class="fa fa-home fa-fw"></i> Home</a></li>
                    <li class="navbar-li"><a class="navbar-a" href="../pages/tesina.html"><i class="fa fa-graduation-cap fa-fw"></i> Tesina</a></li>
                    <li class="navbar-li"><a class="navbar-a" href="../pages/esame.html"><i class="fa fa-tv fa-fw"></i> Esame</a></li>
                    <li class="navbar-li active"><a class="navbar-a" href="../pages/login.php"><i class="fa fa-cogs fa-fw"></i> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--- --- --- Content --- --- --->
    <div class="container-fluid">
        <div class="row">
            <!--<iframe id="inputFrame" src="../pages/inputForm.html" id="inputForm"></iframe>-->
            <form id="regForm" name="regForm" method="post" action="sendform.php">
                <table class="table-form">
                    <th><h2>Registrazione</h2></th>
                    <tr>
                        <td><label for="name">Username:</label></td>
                        <td><input type="text" id="name" name="name" placeholder="Username"/></td>
                        <td></td>
                    </tr>
                    <tr><td></td><td><span id="errname" class="error">Campo Obbligatorio<br/></span></td></tr>
                    <tr>
                        <td><label for="email">E-Mail:</label></td>
                        <td><input type="text" id="email" name="email" placeholder="indirizzo@email.com"/></td>
                        <td></td>
                    </tr>
                    <tr><td></td><td><span id="erremail" class="error">Inserire un indirizzo valido<br/></span></td></tr>
                    <tr>
                        <td></td>
                        <td><input type="checkbox" id="checkanon" name="checkanon"/> Anonimo</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label for="radioprivacy">Autorizzo il trattamento dei miei dati personali ai sensi del <a href="http://www.camera.it/parlam/leggi/deleghe/03196dl.htm">D.lgs. 196 del 30 giugno 2003</a></label></td>
                        <td><input type="radio" id="privacy" name="privacy" value="yes"/>Acconsento <input type="radio" name="privacy" value="no" checked/>Non Acconsento</td>
                        <td></td>
                    </tr>
                    <tr><td></td><td><span id="errprivacy" class="error">Acconsentire per la registrazione<br/></span></td></tr>
                    <tr>
                        <td><label><div id="contact_submit"><button class="button-confirm" type="submit">Conferma</button></div></label></td>
                        <td><label><div id="contact_cancel"><button class="button-cancel" type="reset">Cancella</button></div></label></td>
                        <td></td>
                    </tr>
                </table>
            </form>
    </div>
    </div>

    <!---  Footer  --->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="info">Stefano Sanvito<br>s.stefano.sanvito@gmail.com</div>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <ul class="footer-ul">
                        <li class="footer-li"><a class="footer-a" href="https://plus.google.com/115943371652466786884/about" target="_blank"><i class="icon fa fa-google-plus-square fa-lg"></i></a></li>
                        <li class="footer-li"><a class="footer-a" href="https://www.facebook.com/stiwou" target="_blank"><i class="icon fa fa-facebook-square fa-lg"></i></a></li>
                        <li class="footer-li"><a class="footer-a" href="https://www.youtube.com/user/Stiwoz/feed" target="_blank"><i class="icon fa fa-youtube-square fa-lg"></i></a></li>
                        <li class="footer-li"><a class="footer-a" href="http://stefanosanvito.altervista.org/" target="_blank"><i class="icon fa fa-globe fa-lg"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-1">
                    <a class="footer-a" id="flag" href="../eng/index.html"><img src="../img/engIconSmall.png"/></a>
                </div>
            </div>
        </div>
    </div>

    <!--- --- --- Scripts & Plug-Ins --- --- --->
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <script src="../js/sweetalert2-master/dist/sweetalert2.min.js"></script>
    <script src="../js/functions.js"></script>
</body>
</html>
