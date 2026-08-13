<?php
namespace sistema\Suporte;

use sistema\Nucleo\Helpers;

class Template
{
    private \Twig\Environment $twig;

    public function __construct(string $diretorio)
    {
        $loader     = new \Twig\Loader\FilesystemLoader($diretorio);
        $this->twig = new \Twig\Environment($loader);

        $this->helpers();
    }

    public function renderizar(string $view, array $dados)
    {
        return $this->twig->render($view, $dados);
    }

    private function helpers(): void
    {
        [
            $this->twig->addfunction(new \Twig\TwigFunction('url', function (string $url = null) {
                return Helpers::url($url);
            })
            ),
            $this->twig->addfunction(new \Twig\TwigFunction('saudacao', function () {
                return Helpers::saudacao();
            })
            ),
            $this->twig->addfunction(new \Twig\TwigFunction('resumirTexto', function (string $texto, int $limite) {
                return Helpers::resumirTexto($texto, $limite);
            })
            ),
        ];
    }
}
