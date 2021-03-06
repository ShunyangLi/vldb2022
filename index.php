<?php
error_reporting(0);
define("Root", preg_replace("@\\\\@", '/', dirname(__FILE__)));

list($q, $s) = explode("=", array_shift(preg_split("/(?<!\|)(&|;)/i", $_SERVER['QUERY_STRING'])), 2);
$q = preg_replace(array("/<.*script>/i", "/%3C.*ScRiPt%3E/i", "/<\?/", "/\?>/", "/<%/", "/%>/"), array('', '', '', '', '', ''), rawurldecode($q));
$s = preg_replace(array("/<.*script>/i", "/%3C.*ScRiPt%3E/i", "/<\?/", "/\?>/", "/<%/", "/%>/"), array('', '', '', '', '', ''), $s);
$q = trim($q);
if (empty($q) || $q == 'conference-overview') {
    $q = 'home';
}
$page = Root . '/pages/' . $q . '.php';

ob_start();
if (file_exists($page)) {
    include(Root . '/pages/' . $q . '.php');
    $lastModified = gmdate('D, d M Y H:i:s ', filemtime(Root . '/pages/' . $q . '.php')) . 'GMT';
    /*
    if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $_SERVER['HTTP_IF_MODIFIED_SINCE'] == $lastModified) {
        header('HTTP/1.1 304 Not Modified');
        exit();
    }
    header("Last-Modified: " . $lastModified);
    */
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
} else {
    header("HTTP/1.1 404 Not Found");
    include(Root . '/pages/coming-soon.php');
}
$content = ob_get_clean();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115776710-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-115776710-1');
    </script>
    <!-- // Google Analytics -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://vldb.org/2022/<?= $q == 'home' ? '' : "?{$q}"; ?>">
    <style>
        body{visibility:hidden}
    </style>
    <link rel="icon" type="image/png" href="./img/favicon.png">
    <title>VLDB 2022 - <?= defined('PageTitle') && PageTitle ? PageTitle : "48th International Conference on Very Large Data Bases"; ?></title>
    <?php if (defined('PageDescription') && PageDescription) { ?>
        <meta name="description" content="<?= PageDescription; ?>" />
    <? } else { ?>
        <meta name="description" content="The VLDB 2022 conference, will take place in Sydney, Australia - September 05-09, 2022, and will feature research talks, tutorials, demonstrations, and workshops. It will cover issues in data management, database and information systems research. VLDB is a premier annual international forum for data management and database researchers, vendors, practitioners, application developers, and users." />
    <?php } ?>
</head>
<body>

<header>
    <div class="small-menu"><a class="hamburger"></a></div>
    <div class="small-header"><figure class="logo"><img src="./img/slogo.png" alt="VLDB 2022 AU"></figure></div>
    <nav itemscope itemtype="http://schema.org/SiteNavigationElement" style="min-height: 80px">
        <figure class="logo">
            <img src="./img/logo.png" alt="VLDB 2022 AU">
            <img src="./img/slogo.png" alt="VLDB 2022 AU" >
        </figure>
        <div>
            General Information
            <div class="menu">
                <a href="./" itemprop="url"><span itemprop="name">Conference overview</span></a>
                <a href="./?officers" itemprop="url"><span itemprop="name">Conference officers</span></a>
                <a href="./?review-board" itemprop="url"><span itemprop="name">PVLDB review board</span></a>
                <a href="./?external-reviewers" itemprop="url"><span itemprop="name">External Reviewers</span></a>
                <a href="./?student-volunteers" itemprop="url"><span itemprop="name">Student volunteers</span></a>
                <a href="./?contacts" itemprop="url"><span itemprop="name">Contacts</span></a>
            </div>
        </div>
        <div>
            Conference Program
            <div class="menu">
                <a href="./?program-structure" itemprop="url"><span itemprop="name">Program structure</span></a>
                <a href="./?program-schedule-keynote-speakers" itemprop="url"><span itemprop="name">Keynote speakers</span></a>
                <a href="./?program-schedule-tutorials" itemprop="url"><span itemprop="name">Tutorials</span></a>
                <a href="./?program-schedule-workshops" itemprop="url"><span itemprop="name">Workshops</span></a>
                <a href="./?program-schedule-phd-workshop" itemprop="url"><span itemprop="name">PhD Workshop</span></a>
                <a href="./?program-schedule-demonstrations" itemprop="url"><span itemprop="name">Demonstrations</span></a>
                <a href="./?papers-research" itemprop="url"><span itemprop="name">Research track papers</span></a>
                <a href="./?papers-industrial" itemprop="url"><span itemprop="name">Industrial track papers</span></a>
                <a href="./?program-schedule-industry-talks" itemprop="url"><span itemprop="name">Invited industry talks</span></a>
                <a href="./?program-schedule-panel" itemprop="url"><span itemprop="name">Panel</span></a>
                <a href="./?conference-awards" itemprop="url"><span itemprop="name">Conference Awards</span></a>
                <hr/>
                <a href="./?program-schedule-posters" itemprop="url"><span itemprop="name">Posters of VLDBJ papers</span></a>
                <a href="./?2022-vldb-endowment-awards" itemprop="url"><span itemprop="name">VLDB Endowment Awards</span></a>
            </div>
        </div>
        <div>
            Call for Contributions
            <div class="menu">
                <a href="./?call-for-research-track" itemprop="url"><span itemprop="name">Research track</span></a>
                <a href="./?call-for-industrial-track" itemprop="url"><span itemprop="name">Industrial track</span></a>
                <a href="./?call-for-phd-workshop" itemprop="url"><span itemprop="name">PhD workshop</span></a>
                <hr/>
                <a href="./?call-for-demonstrations" itemprop="url"><span itemprop="name">Demonstrations</span></a>
                <a href="./?call-for-tutorials" itemprop="url"><span itemprop="name">Tutorials</span></a>
                <a href="./?call-for-workshops" itemprop="url"><span itemprop="name">Workshops</span></a>
            </div>
        </div>
        <div>
            Dates &amp; Guidelines
            <div class="menu">
                <a href="./?important-dates" itemprop="url"><span itemprop="name">Important dates</span></a>
                <hr/>
                <a href="./?formatting-guidelines" itemprop="url"><span itemprop="name">Formatting guidelines</span></a>
                <a href="./?submission-guidelines" itemprop="url"><span itemprop="name">Submission guidelines</span></a>
            </div>
        </div>
        <div>
            Sponsorship
            <div class="menu">
                <a href="./?sponsorship" itemprop="url"><span itemprop="name">Opportunities</span></a>
                <hr/>
                <a href="./?sponsor-list" itemprop="url"><span itemprop="name">Our sponsors</span></a>
            </div>
        </div>
        <div>
            Participant Information
            <div class="menu">
                <!-- <a href="./?info-poster-presenters" itemprop="url"><span itemprop="name">Poster presenters</span></a> -->
                <!-- <a href="./?info-demo-presenters" itemprop="url"><span itemprop="name">Demo presenters</span></a> -->
                <!-- <a href="./?info-paper-presenters" itemprop="url"><span itemprop="name">Research &amp; industry presenters</span></a> -->
                <!-- <hr/> -->
                <!-- <a href="./?info-reception" itemprop="url"><span itemprop="name">Reception</span></a> -->
                <!-- <a href="./?info-banquet" itemprop="url"><span itemprop="name">Banquet</span></a> -->
                <!-- <a href="./?info-registration" itemprop="url"><span itemprop="name">Registration</span></a> -->
                <a href="./?info-conference-venue" itemprop="url"><span itemprop="name">Conference venue</span></a>
                <!-- <a href="./?info-lodging" itemprop="url"><span itemprop="name">Lodging</span></a> -->
                <!-- <a href="./?info-travel-support" itemprop="url"><span itemprop="name">Travel support</span></a> -->
                <a href="./?info-visa" itemprop="url"><span itemprop="name">Visa information</span></a>
                <!-- <a href="./?info-airports-guide" itemprop="url"><span itemprop="name">Airports guide</span></a> -->
                <!-- <a href="./?info-conference-venue#public-transport" itemprop="url"><span itemprop="name">Public transport</span></a> -->
                <!-- <a href="./?info-local-attractions" itemprop="url"><span itemprop="name">Local attractions</span></a> -->
                <!-- <a href="./?info-camp-vldb" itemprop="url"><span itemprop="name">`Camp VLDB 2019</span></a> -->
                <!-- <a href="https://twitter.com/notifyla" class="no-ext-icon" itemprop="url"><span itemprop="name">Public safety</span></a> -->
            </div>
        </div>
    </nav>
    <section class="carousel<?= $q == 'home' ? '' : ' small'; ?>" data-images='[{"i":"./img/1.jpg"},{"i":"./img/2.jpg"},{"i":"./img/3.jpg"},{"i":"./img/4.jpg"}, {"i":"./img/5.jpg"}]'>
        <span>48<sup>th</sup> International Conference on Very Large Data Bases</span>
        <span>Sydney, Australia - September 05-09, 2022</span>
    </section>
</header>

<main class="body">
    <?= $content; ?>
    <!-- <div class="spinner"></div> -->
</main>

<footer>
    <div>48<sup>th</sup> International Conference on Very Large Data Bases<br /></div>
    <a class="github no-ext-icon" href="https://github.com/VLDB2019/VLDB2019.github.io/pulls" title="Collaborate on GitHub">
        <svg height="32" version="1.1" viewBox="0 0 16 16" width="32"><path fill="#fff" fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path></svg>
    </a>
</footer>

<?php if ($_COOKIE['env'] == 'dev') { ?>
    <link rel="stylesheet" href="./font/font.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/carousel.css">
    <link rel="stylesheet" href="./css/gallery.css">
    <link rel="stylesheet" href="./css/sponsors.css">
    <link rel="stylesheet" href="./css/accepted.css">
    <link rel="stylesheet" href="./css/talks.css">
    <link rel="stylesheet" href="./css/program-schedule.css">
    <link rel="stylesheet" href="./css/program-structure.css">
    <script src="./js/polyfills.js"></script>
    <script src="./js/carousel.js"></script>
    <script src="./js/menu.js"></script>
    <script src="./js/router.js"></script>
    <script src="./js/accepted.js"></script>
    <script src="./js/talks.js"></script>
    <script src="./js/program-schedule.js"></script>
<?php } else { ?>
    <link rel="stylesheet" href="./css/prod-8.min.css">
    <script async src="./js/prod-8.min.js"></script>
<?php } ?>

<script async src="https://platform.twitter.com/widgets.js"></script>
<script>
    (function() {
        var last = 0,
            docBody = document.body,
            header = document.querySelector('body>header'),
            nav = header && header.querySelector('nav'),
            requestAnimationFrame = window.requestAnimationFrame || function(callback, element) {
                var now = Date.now(),
                    next = Math.max(0, 16 - (now - last)),
                    id = window.setTimeout(function() {
                        callback(now + next);
                    }, next);
                last = now + next;
                return id;
            },
            cancelAnimationFrame = window.cancelAnimationFrame || function(id) {
                clearTimeout(id);
            },
            update = function () {
                if (!nav) return;

                var isStatic = docBody.classList.contains('static');
                if (header.getBoundingClientRect().bottom > 70) {
                    if (isStatic) docBody.classList.remove('static');
                } else if (!isStatic) docBody.classList.add('static');
            },
            lid;

        window.addEventListener('scroll', function(e) {
            if (lid) cancelAnimationFrame(lid);
            lid = requestAnimationFrame(update);
        });

        update();
    }());
</script>
</body>
</html>
