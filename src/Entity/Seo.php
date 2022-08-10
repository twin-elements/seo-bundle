<?php

namespace TwinElements\SeoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="seo")
 * @ORM\Entity(repositoryClass="TwinElements\SeoBundle\Repository\SeoRepository")
 */
class Seo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=128)
     */
    protected $title;

    /**
     * @var string
     * @ORM\Column(name="description", type="string", length=270, nullable=true)
     */
    protected $description;

    /**
     * @var string
     * @ORM\Column(name="keywords", type="string", length=255, nullable=true)
     */
    private $keywords;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $noIndex = false;

    public function __toString()
    {
        return $this->getTitle();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $title
     * @return Seo
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $description
     * @return Seo
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $keywords
     * @return Seo
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @return bool
     */
    public function isNoIndex(): bool
    {
        return $this->noIndex;
    }

    /**
     * @param bool $noIndex
     */
    public function setNoIndex(bool $noIndex): void
    {
        $this->noIndex = $noIndex;
    }
}
