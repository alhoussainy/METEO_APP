<?php

namespace App\Entity;

use App\Repository\MeteoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ORM\Entity(repositoryClass=MeteoRepository::class)
 */
class Meteo
{
    /**
     * @Groups("meteo")
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     *@Groups("meteo")
     *@ORM\Column(type="string", length=255)
     */
    private $Ville;
    /**
     *@Groups("meteo")
     *@ORM\Column(type="integer")
     */
    private $Temperature;
    /**
     *@Groups("meteo")
     *@ORM\Column(type="integer")
     */
    private $humidity;
    /**
     *@Groups("meteo")
     *@ORM\Column(type="string", length=255)
     */
    private $description;


    /**
     *@Groups("meteo")
     * @ORM\Column(type="float")
     */
    private $vent;

    /**
     *@Groups("meteo")
     * @ORM\Column(type="string", length=255)
     */
    private $icone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getTemperature(): ?int
    {
        return $this->Temperature;
    }

    public function setTemperature(int $Temperature): self
    {
        $this->Temperature = $Temperature;

        return $this;
    }

    public function getHumidity(): ?int
    {
        return $this->humidity;
    }

    public function setHumidity(int $humidity): self
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }



    public function getVent(): ?float
    {
        return $this->vent;
    }

    public function setVent(float $vent): self
    {
        $this->vent = $vent;

        return $this;
    }

    public function getIcone(): ?string
    {
        return $this->icone;
    }

    public function setIcone(string $icone): self
    {
        $this->icone = $icone;

        return $this;
    }
    public function __toString()
    {
        return $this->getVille();
    }




}
