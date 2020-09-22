<?php

function verificationPassword($str)
{
    return strlen($str) >= 8 ? 'true' : 'false';
};

echo '<p>' . verificationPassword('pass1234') . '</p>';
echo '<p>' . verificationPassword('pass1') . '</p>';

function verificationPassword2($str)
{
    $test = "/[0-9]/";
    if (strlen($str) > 8 && strtolower($str) != $str && preg_match($test, $str)) {
        return 'true';
    } else {
        return 'false';
    }
};

echo '<p>' . verificationPassword2('Password4') . '</p>';
echo '<p>' . verificationPassword2('Passw') . '</p>';
echo '<p>' . verificationPassword2('Password') . '</p>';
echo '<p>' . verificationPassword2('pa4ssword') . '</p>';

function capitale($str)
{
    switch ($str) {
        case 'France':
            return 'Paris';
            break;
        case 'Allemagne':
            return 'Berlin';
            break;
        case 'Italie':
            return 'Rome';
            break;
        case 'Maroc':
            return 'Rabat';
            break;
        case 'Espagne':
            return 'Madrid';
            break;
        case 'Portugal':
            return 'Lisbonne';
            break;
        case 'Angleterre':
            return 'Londre';
            break;
        default:
            return 'J\'sai po moa';
            break;
    }
};

echo '<p>' . capitale('France') . '</p>';
echo '<p>' . capitale('Angleterre') . '</p>';
echo '<p>' . capitale('Wonderland') . '</p>';

function listHTML($title, $arr)
{
    echo '<h3>' . $title . '</h3>';
    echo '<ul>';
    for ($i = 0; $i < count($arr); $i++) {
        echo '<li>' . $arr[$i] . '</li>';
    }
    echo '</ul>';
};

echo listHTML('Titre', ['elt1', 'elt2', 'elt3']);

function remplacerLesLettres($str)
{
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] == "e" || $str[$i] == "E") {
            $str[$i] = '3';
        } elseif ($str[$i] == "i" || $str[$i] == "i") {
            $str[$i] = '1';
        } elseif ($str[$i] == "o" || $str[$i] == "O") {
            $str[$i] = '0';
        }
    }
    return $str;
};

echo '<p>' . remplacerLesLettres("Bonjour les amis") . '</p>';

function quelAnnee()
{
    return date("Y");
};

echo '<p>' . quelAnnee() . '</p>';

function quelAnnee2()
{
    return date("d/m/Y");
};

echo '<p>' . quelAnnee2() . '</p>';
