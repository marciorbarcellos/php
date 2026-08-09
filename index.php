<?php
// 1 linha de comentário
require_once 'sistema/configuracao.php';
include_once 'helpers.php';

$texto = '<h1>texto</h1> <p>para<p> resumir';
$texto = strip_tags($texto);

echo resumirTexto($texto, 15);




