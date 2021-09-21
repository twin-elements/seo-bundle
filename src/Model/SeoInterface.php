<?php

namespace TwinElements\SeoBundle\Model;


use TwinElements\SeoBundle\Entity\Seo;

interface SeoInterface
{
    /**
     * @return Seo|null
     */
    public function getSeo(): ?Seo;

    /**
     * @param Seo|null $seo
     */
    public function setSeo(?Seo $seo): void;
}
