<?php

namespace TwinElements\SeoBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use TwinElements\SeoBundle\Entity\Seo;

trait SeoTrait
{
    /**
     * @var Seo|null
     * @ORM\OneToOne(targetEntity="TwinElements\SeoBundle\Entity\Seo", cascade={"persist","remove","refresh"})
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $seo;

    /**
     * @return Seo|null
     */
    public function getSeo(): ?Seo
    {
        return $this->seo;
    }

    /**
     * @param Seo|null $seo
     */
    public function setSeo(?Seo $seo): void
    {
        $this->seo = $seo;
    }
}
