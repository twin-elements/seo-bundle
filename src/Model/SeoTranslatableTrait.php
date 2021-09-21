<?php

namespace TwinElements\SeoBundle\Model;


use TwinElements\SeoBundle\Entity\Seo;

trait SeoTranslatableTrait
{
    public function getSeo(): ?Seo
    {
        return $this->translate(null, false)->getSeo();
    }

    public function setSeo(?Seo $seo): void
    {
        $this->translate(null, false)->setSeo($seo);
    }
}
