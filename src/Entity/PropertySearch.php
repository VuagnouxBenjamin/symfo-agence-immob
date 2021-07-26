<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

class PropertySearch {
    /**
     * @return int|null
     */
    public function getMinSurface(): ?int
    {
        return $this->minSurface;
    }

    /**
     * @param int|null $minSurface
     * @return PropertySearch
     */
    public function setMinSurface(?int $minSurface): PropertySearch
    {
        $this->minSurface = $minSurface;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    /**
     * @param int|null $maxPrice
     * @return PropertySearch
     */
    public function setMaxPrice(?int $maxPrice): PropertySearch
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @var int|null
     * @Assert\Range(
     *     min = 10,
     *     max = 400,
     *     minMessage="Veuillez entrer une valeur suppérieure à 10 m²",
     *     maxMessage="Veuillez entrer une valeur inférieure à 400 m2"
     * )
     */
    private $minSurface;

    /**
     * @var int|null
     * @Assert\Range(
     *     min = 70000,
     *     max = 1000000,
     *     minMessage="Veuillez entrer une valeur suppérieure à 70 000 €",
     *     maxMessage="Veuillez entrer une valeur inférieure à 1 000 000 €"
     * )
     */
    private $maxPrice;

    /**
     * @var ArrayCollection
     */
    private $options;

    public function __construct()
    {
        $this->options = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getOptions(): ArrayCollection
    {
        return $this->options;
    }

    /**
     * @param ArrayCollection $options
     * @return PropertySearch
     */
    public function setOptions(ArrayCollection $options): PropertySearch
    {
        $this->options = $options;
        return $this;
    }




}
