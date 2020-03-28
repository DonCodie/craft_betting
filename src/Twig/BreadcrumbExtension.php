<?php

namespace App\Twig;

use Twig\Environment;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class BreadcrumbExtension extends AbstractExtension
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * BreadcrumbExtension constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @return array
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('breadcrumb',
                [$this, 'breadcrumbUrl'], ['is_safe' => ['html']])
        ];
    }

    /**
     * @return array
     */
    public function breadcrumbUrl(): array
    {
        $explodes = explode('/', parse_url($_SERVER['REQUEST_URI'])['path']);
        foreach ($explodes as $explode) {
            if (!empty($explode)) {
                $breadcrumb[$explode]['url'] = $explode;
            }
        }

        return dump($breadcrumb);
    }
}
