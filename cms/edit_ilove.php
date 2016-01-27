<?php
    include "../vendor/autoload.php";
    session_start();
    if (!isset($_SESSION["user"])) {
        header("Location: ../index.php");
    }
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title>Dashboard I Admin Panel</title>

        <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen"/>
        <!--[if lt IE 9]>
        <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen"/>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link rel="stylesheet" href="css/general.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="css/animations.css" type="text/css" media="screen"/>

        <script src="js/vendors/jquery-1.5.2.min.js" type="text/javascript"></script>
        <script src="js/vendors/hideshow.js" type="text/javascript"></script>
        <script type="text/javascript">

            $(document).ready(function () {

                //When page loads...
                $(".tab_content").hide(); //Hide all content
                $("ul.tabs li:first").addClass("active").show(); //Activate first tab
                $(".tab_content:first").show(); //Show first tab content

                //On Click Event
                $("ul.tabs li").click(function () {

                    $("ul.tabs li").removeClass("active"); //Remove any "active" class
                    $(this).addClass("active"); //Add "active" class to selected tab
                    $(".tab_content").hide(); //Hide all tab content

                    var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
                    $(activeTab).fadeIn(); //Fade in the active ID content
                    return false;
                });

            });
        </script>


        <style>
            #form {
                display : none;
            }
        </style>


    </head>


    <body>

        <header id="header">
            <hgroup>
                <h1 class="site_title"><a href="#">Website Admin</a></h1>
                <h2 class="section_title">Dashboard</h2>
            </hgroup>
        </header> <!-- end of header bar -->

        <section id="secondary_bar">
            <div class="user">
                <p>Daniel Prince</p>
                <!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
            </div>
            <div class="breadcrumbs_container">
                <article class="breadcrumbs"><a href="#">Website Admin</a>
                    <div class="breadcrumb_divider"></div>
                    <a class="current">Dashboard</a></article>
            </div>
        </section><!-- end of secondary bar -->

        <aside id="sidebar" class="column">
            <h3>Create</h3>
            <ul class="toggle">
                <li><a href="poem.php">New Poem</a></li>
                <li><a href="ilove.php">New I Love</a></li>
            </ul>
            <h3>Manage</h3>
            <ul class="toggle">
                <li><a href="edit_poem.php">Edit Poem</a></li>
                <li><a href="edit_ilove.php">Edit I Love</a></li>
            </ul>
            <footer>
                <hr/>
                <p><strong>Copyright &copy; 2016 Daniel Prince</strong></p>
                <p>Theme by <a href="#">Evolutionary Coder</a></p>
            </footer>
        </aside><!-- end of sidebar -->


        <section id="main" class="column">

            <h4 class="alert_info" id="notification">Welcome Mr. Prince</h4>


            <article id="form" class="module width_full" data-hide="hide"
                     xmlns="http://www.w3.org/1999/html">
                <header>
                    <h3>Update Poem</h3>

                    <img id="close" style="float: right; width: 32px; height: 32px;" src="images/x-icon.png">

                </header>
                <form>
                    <div class="module_content">
                        <fieldset>
                            <label>I Love</label>
                            <input id="ilove" type="text">
                        </fieldset>
                        <div class="clear"></div>
                    </div>
                    <footer>
                        <div class="submit_link">
                            <input type="submit" value="Update" id="update" class="alt_btn">
                        </div>
                    </footer>
                </form>
            </article><!-- end of post new article -->

            <article id="content_manager" class="module module width_full">
                <header>
                    <h3 class="tabs_involved">Poem Manager</h3>
                </header>

                <div class="tab_container">
                    <div class="tab_content">
                        <table class="tablesorter" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>I Love</th>
                                    <th>Synced</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <?php
                                    /**
                                     * Created by PhpStorm.
                                     * User: prince
                                     * Date: 1/27/16
                                     * Time: 12:05 PM
                                     */


                                    include "../vendor/autoload.php";

                                    $table = new \Backend\Database\Tables\ILove();
                                    $data  = $table->readAll();

                                    if ($data !== false) {
                                        for ($i = 0; $i < count($data); $i++) {
                                            $currentEncoded = $data[$i];
                                            $decoded        = clone $currentEncoded;

                                            echo "<tr data-id=\"{$currentEncoded->getId()}\">";
                                            echo "<td>{$decoded->getLove()}</td>";
                                            echo "<td>{$decoded->getSynced()}</td>";
                                            echo "<td>";
                                            echo "<input class='edit' data-id=\"{$currentEncoded->getId()}\" data-ilove=\"{$currentEncoded->getLove()}\" type=\"image\" src=\"images/icn_edit.png\" title=\"Edit\">";
                                            echo "<input class='delete' data-id=\"{$currentEncoded->getId()}\" type=\"image\" src=\"images/icn_trash.png\" title=\"Trash\">";
                                            echo "</td>";

                                            echo "</tr>";

                                        }
                                    }
                                ?>


                            </tbody>
                        </table>

                    </div><!-- end of #tab2 -->

                </div><!-- end of .tab_container -->

            </article>


        </section>


        <script src="js/scripts/Ajaxify.js"></script>


        <script src="js/scripts/Notification.js"></script>


        <script src="js/scripts/Table.js"></script>


        <script src="js/scripts/Validate.js"></script>

        <script src="js/scripts/classes/Manager.js"></script>
        <script src="js/scripts/classes/Structure.js"></script>


        <script src="js/vendors/jquery-1.5.2.min.js"></script>

        <script src="js/scripts/classes/models/ILove.js"></script>


        <script src="js/scripts/ilove/manage.js"></script>


        <script src="js/scripts/general.js"></script>


    </body>

</html>