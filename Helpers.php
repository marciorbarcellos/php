<?php

function saudacao(): string
{
    echo $hora = date('H:i:s');

    if ($hora >= 0 and $hora <= 5) {
        $saudacao = 'boa mdrugada';
    } elseif ($hora >= 6 and $hora <= 12) {
        $saudacao = 'bom dia';
    } elseif ($hora >= 13 and $hora <= 18) {
        $saudacao = 'boa tarde';
    } else {
        $saudacao = 'boa noite';
    }

    return $saudacao;
}

/**
 * Resume o texto informado, limitando-o ao número de caracteres especificado.
 *
 * @param string $texto
 * @param int $limite
 * @param string $continue
 * @return string
 */
 
function resumirTexto(string $texto, int $limite, string $continue = '...'): string
{
    $textoLimpo = trim(strip_tags($texto));
    if(mb_strlen($textoLimpo, 'UTF-8') <= $limite) {
        return $textoLimpo;
    }

    $resumirTexto = mb_substr($textoLimpo, 0, mb_strrpos(mb_substr($textoLimpo, 0, $limite), ''));

    return $resumirTexto.$continue;
}

