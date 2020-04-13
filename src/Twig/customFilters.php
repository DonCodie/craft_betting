<?php

namespace App\Twig;

use Twig\TwigFilter;
use Twig\Extension\AbstractExtension;

class customFilters extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('prono_img', [$this, 'pronoImg'])
        ];
    }

    public function pronoImg($input)
    {
        return preg_replace('/\s \'/', '-', $input);
    }
}