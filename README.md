Redirect Plugin
===============

`Redirect` ist ein [Herbie](http://github.com/getherbie/herbie) Plugin, mit dem du auf einer beliebigen Seite eine
Weiterleitung zu einer internen Seite oder externen URL vornehmen kannst. 


## Installation

Das Plugin installierst du via Composer.

	$ composer require getherbie/plugin-redirect

Danach aktivierst du das Plugin in der Konfigurationsdatei.

    plugins:
        enable:
            - redirect


## Anwendung

Die Weiterleitung definierst du über die Seiteneigenschaften. Im einfachsten Fall sieht das so aus: 
        
    ---
    title: Weiterleitung
    redirect: http://www.getherbie.org
    ---

Per Default wird der HTTP-Statuscode 302 gesendet. Möchtest Du einen eigenen Statuscode senden, kannst du das
wie folgt machen:
 
    ---
    title: Weiterleitung
    redirect:
      url: http://www.getherbie.org
      status: 301
    ---
 
Der angegebene Statuscode muss im Bereich von 300 und 400 liegen. Mehr zu Thema HTTP-Statuscodes findest du auf 
[link https://de.wikipedia.org/wiki/HTTP-Statuscode text="Wikipedia"].
