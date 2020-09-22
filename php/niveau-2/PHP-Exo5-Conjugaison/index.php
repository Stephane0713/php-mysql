<?php

function conjuger($verbe) {
    if(preg_match('/^[^ ]{1,13}er$/', $verbe)) {
        $base = preg_replace('/er$/', '', $verbe);
        echo '<p>Je '.$base.'e</p>';
        echo '<p>Tu '.$base.'es</p>';
        echo '<p>Il '.$base.'e</p>';
        if(preg_match('/g$/', $base)) {
            echo '<p>Nous '.$base.'eons</p>';
        } else {
            echo '<p>Nous '.$base.'ons</p>';
        }
        echo '<p>Vous '.$base.'ez</p>';
        echo '<p>Ils '.$base.'ent</p>';
    } else {
        echo '<p>L\'argument doit être un verde du premier groupe à l\'infinitif de moins de 15 lettres et ne doit pas contenir d\'espace.</p>';
    }
};

conjuger("test");
conjuger("venir");
conjuger("tester");
conjuger("manger");