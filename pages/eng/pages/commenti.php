<!doctype php>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="author" content="Sanvito Stefano"/>
    <meta name="description" content="School Finals Website Project"/>

    <link rel="stylesheet" href="../../../css/custom-theme-bootstrap.css"/>
    <link rel="stylesheet" href="../../../css/font-awesome-4.4.0/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="../../../js/sweetalert2-master/dist/sweetalert2.css"/>
    <link rel="stylesheet" href="../../../css/style.css"/>

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
                <a class="navbar-brand" href="../index.html"><img class="navbar-brand" alt="Level Up!" src="../../../img/logo.png"/></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right navbar-ul">
                    <li class="navbar-li"><a class="navbar-a" href="../index.html"><i class="fa fa-home fa-fw"></i> Home</a></li>
                    <li class="navbar-li"><a class="navbar-a" href="tesina.html"><i class="fa fa-graduation-cap fa-fw"></i> Essay</a></li>
                    <li class="navbar-li"><a class="navbar-a" href="esame.html"><i class="fa fa-tv fa-fw"></i> Exam</a></li>
                    <li class="navbar-li active"><a class="navbar-a" href="commenti.php"><i class="fa fa-comments-o fa-fw"></i> Comments</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--- --- --- Content --- --- --->
    <div class="container-fluid container-main">
        <div class="row">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-2 col-sm-1 col-xs-1"></div>
                    <div class="col-md-7 col-sm-10 col-xs-10">
                        <form class="comment-form" id="commForm" name="commForm" method="get" action="../../queries/sendform.php">
                            <h1>Leave a Comment</h1>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6"><label for="username">Username</label></div>
                                    <div class="col-xs-12 col-md-6"><span id="errusername" class="error">Field Required</span></div>
                                </div>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username"/>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6"><label for="email">E-Mail Address</label></div>
                                    <div class="col-xs-12 col-md-6"><span id="erremail" class="error">Invalid address</span></div>
                                </div>
                                <input type="text" class="form-control" name="email" id="email" placeholder="email@address.com"/>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" class="valid" id="anon" name="anon" value="yes"/><strong>Anonymous</strong> <a href="#" class="anonInfo" data-toggle="tooltip" data-placement="right" title="The E-Mail Address is omitted and the Username is replaced with 'Anonymous'"><img src="../../../img/question-mark-orange.png"/></a>
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 col-xs-8"><label for="email">Comment</label></div>
                                    <div class="col-md-1 col-md-push-9 col-xs-4"><span class="charNumb">500</span></div>
                                    <div class="col-md-9 col-xs-12"><span id="errcomment" class="error center-block">Invalid number of characters</span></div>
                                </div>
                                <textarea class="form-control vresize" name="comment" id="comment" rows="3" placeholder="Write here your comment..."></textarea>
                            </div>
                            <div class="divider-2px"></div>
                            <strong>I authorize the use of my personal data pursuant to the <a href="http://www.camera.it/parlam/leggi/deleghe/03196dl.htm">Legislative Decree 196 of June 30, 2003</a></strong>
                            <div class="text-center">
                                <div class="center-block">
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" name="privacy" id="privacy" value="yes"/>
                                            I agree
                                        </label>
                                    </div>
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" name="privacy" id="privacy" value="no" checked/>
                                            I do not agree
                                        </label>
                                    </div>
                                </div>
                                <span id="errprivacy" class="error">Agreement required</span>
                                <div class="divider-2px"></div>
                                <div class="center-block">
                                    <button type="submit" class="button-confirm">Confirm</button>
                                    <button type="reset" class="button-cancel">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-sm-1 col-xs-1"></div>
            </div>
            <div class="col-md-7">
                <div class="comments-wrapper">
                    <div class="container-fluid">
                        <h1>Recent comments</h1>
                        <div class="comments">
                            <?php
                            include "../../../includes/connect.php";

                            $query = "SELECT * FROM ".$db_table." ORDER BY Date DESC";

                            if (mysqli_connect_errno()) {
                                die("Can't connect to database: " . mysqli_connect_error());
                            }

                            $result = $mysqli->query($query);
                            if (!$result) {
                                die("Query to show fields from table failed");
                            }

                            while($row = $result->fetch_assoc()){
                                echo "<div class='comment-info'>";
                                    echo "<div class='row'>";
                                        echo "<div class='col-md-3 col-sm-3 col-xs-3'>";
                                            echo "<p class='text-center'>";
                                                echo ($row['Anonimous'] ? '<em>Anonymous</em>' : $row['Username'])."<br/>".($row['Anonimous'] ? '' : $row['E-Mail']);
                                            echo "</p>";
                                        echo "</div>";
                                        echo "<div class='col-md-7 col-sm-6 col-xs-4'></div>";
                                        echo "<div class='col-md-2 col-sm-3 col-xs-5'>";
                                            echo "<p class='text-center'>".$row['Date']."</p>";
                                        echo "</div>";
                                    echo "</div>";
                                    echo "<div class='comment-text'>";
                                        echo "<p class='text-justify'>".$row['Comment']."</p>";
                                    echo "</div>";
                                echo "</div>";
                            }

                            $mysqli->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---  Footer  --->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 hidden-xs hidden-sm">
                    <div class="row info">
                        <div class="col-md-12">Stefano Sanvito</div>
                        <div class="col-md-12">s.stefano.sanvito@gmail.com</div>
                    </div>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-6 col-xs-8">
                    <ul class="footer-ul">
                        <li class="footer-li"><a class="footer-a" href="https://plus.google.com/115943371652466786884/about" target="_blank"><i class="icon fa fa-google-plus-square fa-lg"></i></a></li>
                        <li class="footer-li"><a class="footer-a" href="https://www.facebook.com/stiwou" target="_blank"><i class="icon fa fa-facebook-square fa-lg"></i></a></li>
                        <li class="footer-li"><a class="footer-a" href="https://www.youtube.com/user/Stiwoz/feed" target="_blank"><i class="icon fa fa-youtube-square fa-lg"></i></a></li>
                        <li class="footer-li"><a class="footer-a" href="http://stefanosanvito.it/" target="_blank"><i class="icon fa fa-globe fa-lg"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-1 col-xs-4">
                    <a class="footer-a" id="flag" href="../../commenti.php"><img src="../../../img/italyIconSmall.png"/></a>
                </div>
            </div>
        </div>
    </div>

    <!--- --- --- Scripts & Plug-Ins --- --- --->
    <script src="../../../js/jquery-1.11.3.min.js"></script>
    <script src="../../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <script src="../../../js/sweetalert2-master/dist/sweetalert2.min.js"></script>
    <script src="../../../js/functions.js"></script>
</body>
</html>