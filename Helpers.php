<?php

function saudacao(): string
{
    echo $hora = date('H:i:s');
    echo '<hr>';
    if ($hora >= 0 and $hora <= 5) {
        $saudacao = "boa madrugada";
    } else if ($hora >= 6 and $hora <= 12) {
        $saudacao = "bom dia";
    } else if ($hora >= 13 and $hora <= 18) {
        $saudacao = "boa tarde";
    }

    return $saudacao;
}

function resumirTexto(string $texto, int $limite, string $continue = '...'): string
{
    return $texto;
}
