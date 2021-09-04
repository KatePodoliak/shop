<!DOCTYPE html>
<html lang="ru">

<head>
    <title><?=(isset($PAGE_TITLE) && ($PAGE_TITLE != "") ? $PAGE_TITLE : "Dental health");?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/styles/main.css">
</head>

<body>
    <div class="fixed-container">
        <header id="header-main">
            <div class="logo">
                <figure class="logo-img"  id="tooth-img">
                    <a href="index.php"><img src="assets/images/tooth.png" alt="Tooth"></a>
                </figure>
                <div class="logo-text">
                     <img src="assets/images/tooth_text.png" class="anim-img" alt="Logotype">
                </div>
                <div>
                    <div class="about-us-logo">
                        <span>
                            These innovations have served to enable us to <br> better live our mission; "To build partnerships <br>
                            that improve our customers' earnings by co-managing <br> their supply, equipment and practice management needs".
                        </span>
                    </div>
                    <data value="31">Wednesday, October 23, 2002</data>
                </div>
            </div>
            <div class="site-search">
                <nav class="contacts">
                    <a href="#" class="icon-top icon-help"><span>help</span></a>
                    <a href="#" class="icon-top icon-about"><span>about us</span></a>
                    <a href="mailto:dental.helth@gmail.com" class="icon-top icon-contact"><span>contact</span></a>
                </nav>
                <div class="search">
                    <form name="searching" method="get" action="index-variables.php">
                        <label>SEARCH:
                            <input type="search" name="search">
                        </label>
                        <button type="submit">ok</button>
                    </form>
                </div>
            </div>
        </header>
        <div id="left-section">
            <nav>
                <ul class="menu-elements">
                    <li><a href="index-reg.php">Registration</a></li>
                    <li><a href="index-store.php">Dental store</a></li>
                    <li><a href="index-news.php">News</a></li>
                    <li><a href="index-filesystem.php">File system</a></li>
                    <li><a href="index-table.php">Table</a></li>
                    <li><a href="index-diagram.php">Diagram</a></li>
                    <li><a href="index-image.php">Image</a></li>
                    <li><a href="#">Painless Web</a></li>
                    <li><a href="#">BluChips Rewards</a></li>
                    <li><a href="#">Earnings Builders</a></li>
                    <li><a href="#">Interlink</a></li>
                    <li><a href="#">Featured Products</a></li>
                    <li><a href="#">Parthers</a></li>
                    <li><a href="#">International</a></li>
                    <li><a href="#">Government</a></li>
                    <li><a href="#">Handpiece repairs</a></li>
                    <li><a href=<?=SITE_HOST."cms/index.php"?>>Admin</a></li>
                </ul>
            </nav>
            <aside class="site-add">
                <div class="icon-features">
                    <a href="#">Spotlight Features</a>
                </div>
                <div class="pills">
                    <img src="assets/images/layer9.jpg" alt="Pills">
                </div>
                <section class="site-add-text">
                    <a href="#">Seminars in your area</a><br>Dates, topics, locations, & prices. Save 10% when 3 or more sign-up!
                </section>
                <section class="site-add-text">
                    <a href="#">Topics, Trends, Techniques</a><br>Don't let your patients give you the brush-off. Increase patient acceptance!
                </section>
            </aside>
        </div>
        <main class="main-part">
