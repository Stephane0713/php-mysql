<?php

function loadrss($url)
{

    $xmlDoc = new DOMDocument(); // ça vous rappelle quelque chose ? un flux RSS, c'est du XML et il se trouve que tous les document XML (dont le HTML est une forme particulière) sont navigable via un DOM
    $xmlDoc->load($url); // on initialise ce DOM avec l'url de notre flux

    // Récupération des infos du flux dans la balise "<channel>"
    $items = $xmlDoc->getElementsByTagName('item');
    // notez la notation fléchée (php objet). On navigue dans ce DOM comme vous avez appris à le faire en javascript
    foreach ($items as $item) {
        echo "<div class=\"article\">" .
            "<h3 class=\"article__title\">" . $item->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue . "</h3>" .
            "<a class=\"article__link\" href=\"" . $item->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue . "\">" .
            "Lien vers l'article" . "</a>" .
            "<p class=\"article__image\"><img src=\"" . $item->getElementsByTagName("thumbnail")->item(0)->getAttribute("url") . "\"></p>" .
            "<p class=\"article__desc\">" . $item->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue . "</p>" .
            "<p class=\"article__date\">" . $item->getElementsByTagName('pubDate')->item(0)->childNodes->item(0)->nodeValue . "</p>" .
            "</div>";
    }
}

// on appelle la fonction qu'on a écrite sur le flux RSS de notre choix
loadrss("https://www.jeuxvideo.com/rss/rss.xml");
