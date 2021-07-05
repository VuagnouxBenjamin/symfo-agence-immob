<?php

namespace App\Entity;

use App\Repository\PriceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PriceRepository::class)
 */
class Price
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $hors_taxe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHorsTaxe(): ?int
    {
        return $this->hors_taxe;
    }

    public function setHorsTaxe(int $hors_taxe): self
    {
        $this->hors_taxe = $hors_taxe;

        return $this;
    }
}
