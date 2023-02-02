<!DOCTYPE html>
<html>
    <head>
        <title>Mobile Menu Hamburger</title>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no"/>
        <!--Using jQuery and jQuery UI for display effects-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>

        <!--Using the hamburger menu display code-->
        <script src="js/hamburger.js"></script>

        <!--Using Media Queries, if the viewport is smaller than 700px use another stylesheet-->
        <link rel="stylesheet" type="text/css" media="all" href="css/hamburger.css"/>
    </head>

    <body>

        <!--This wrapping container is used to get the width of the whole content-->
        <div id="container">

            <!--The Hamburger Button in the Header-->
            <header>
                <div id="hamburger">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </header>

            <!--The mobile navigation Markup hidden via css-->
            <nav>
                <ul>
                    <li><a href="#">menu1</a></li>

                </ul>
            </nav>

            <!--The Layer that will be layed over the content
            so that the content is unclickable while menu is shown-->
            <div id="contentLayer"></div>

            <!--The content of the site-->


        </div>
    </body>
</html>