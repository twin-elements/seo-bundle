<?php

namespace TwinElements\SeoBundle\Utilities;

use Leogout\Bundle\SeoBundle\Provider\SeoGeneratorProvider;
use Leogout\Bundle\SeoBundle\Seo\Basic\BasicSeoGenerator;
use Leogout\Bundle\SeoBundle\Seo\Og\OgSeoGenerator;
use Leogout\Bundle\SeoBundle\Seo\Twitter\TwitterSeoGenerator;
use TwinElements\SeoBundle\Entity\Seo;

class SeoMetaGenerator
{
    /**
     * @var $seoGeneratorProvider
     */
    private $seoGeneratorProvider;

    public function __construct(SeoGeneratorProvider $seoGeneratorProvider)
    {
        $this->seoGeneratorProvider = $seoGeneratorProvider;
    }

    public function generate(?Seo $seo, string $url, ?string $image = null)
    {
        if (is_null($seo)) {
            return null;
        }

        $title = $seo->getTitle();
        $description = $seo->getDescription();

        /**
         * @var BasicSeoGenerator $basic
         */
        $basic = $this->seoGeneratorProvider->get('basic');
        $basic->setTitle($title)
            ->setDescription($description)
            ->setKeywords($seo->getKeywords())
            ->setCanonical($url);

        if ($seo->isNoIndex()) {
            $basic->setRobots(false, false);
        }

        /**
         * @var TwitterSeoGenerator $twitter
         */
        $twitter = $this->seoGeneratorProvider->get('twitter');
        $twitter
            ->setTitle($title)
            ->setCard('summary')
            ->setDescription($description);

        /**
         * @var OgSeoGenerator $og
         */
        $og = $this->seoGeneratorProvider->get('og');
        $og
            ->setTitle($title)
            ->setUrl($url)
            ->setType('website')
            ->setDescription($description);

        if ($image) {
            $twitter->setImage($image);
            $og->setImage($image);
        }
    }
}
