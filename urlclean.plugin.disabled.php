<?php
/*
@name Url Clean
@author Olivier <http://olivierlebris.me>
@link http://cybride.net/olivier
@licence CC by nc sa http://creativecommons.org/licenses/by-nc-sa/2.0/fr/
@version 1.0.0
@description Used to cleanup url from some crap (xtor, utm_)
*/

function urlclean_plugin_link(&$events){
	foreach($events as $event){
        $link = $event->getLink();        
        $link = preg_replace("/[&#?]xtor=(.)+/", "", $link);
        $link = preg_replace("/&utm_[^&#]+/", "", $link);
        $link = preg_replace("/\?&/", "", $link);        
        if ($link[strlen($link) -1] == '?')
            $link = substr($link, 0, str_length($link) -1);        
        $event->setLink($link);
	}
}

Plugin::addHook("index_post_treatment", "urlclean_plugin_link");  
?>
