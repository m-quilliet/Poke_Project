<?php
define('REGEX_NAME', "^[a-zA-Zïëüÿöçâéèñôáóøšşćĕłăčőřžåķņńžůãşœæę '\-?]*$");

define('REGEXP_DATE', "^\d{4}-\d{2}-\d{1,2}$");

define('REGEXP_PHONE', '^(\+33|0|0033)[1-9]((\-|\/|\.)?\d{2}){4}$');

define('REGEXP_DATE_HOUR', "^\d{4}-\d{2}-\d{1,2}$");

define('REGEX_TEXTAREA', '^[a-zA-Z\n\r\s\?]*$');

define('REGEXP_STR_NO_NUMBER', '^[A-Za-zéèêëàâäôöûüç\' ?]+$');

define('REGEXP_PASSWORD', '^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$');
/* S*: n'importe quel ensemble de caractéres
(?=\S{8,}): 8 de longueur
(?=\S*[a-z]): au moins une minuscule
(?=\S*[A-Z]): au moins une majuscule
(?=\S*[\d]): au moins un chiffre
(?=\S*[\W]): au moins un caractére spécial*/
