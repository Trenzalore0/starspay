<?php

declare(strict_types=1);

namespace App\Partner\src\Entity;

use App\Base\src\Entity\TimestampableTrait;
use Doctrine\ORM\Mapping\{
    Entity,
    Id,
    GeneratedValue,
    Column,
    ManyToOne
};

#[Entity]
class PartnerEndpoint
{
    use TimestampableTrait;

    #[Id]
    #[GeneratedValue]
    #[Column]
    private ?int $id = null;

    #[ManyToOne(targetEntity: Partner::class, inversedBy: 'partnerEndpoints')]
    private Partner $partner;

    #[Column(length: 255, nullable: true)]
    private ?string $endpointCashin = null;

    #[Column(length: 255, nullable: true)]
    private ?string $endpointCashout = null;

    /**
     * Get the value of id
     *
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of partner
     */
    public function getPartner()
    {
        return $this->partner;
    }

    /**
     * Set the value of partner
     *
     * @return self
     */
    public function setPartner($partner)
    {
        $this->partner = $partner;

        return $this;
    }

    /**
     * Get the value of endpointCashin
     */
    public function getEndpointCashin()
    {
        return $this->endpointCashin;
    }

    /**
     * Set the value of endpointCashin
     *
     * @return  self
     */
    public function setEndpointCashin($endpointCashin)
    {
        $this->endpointCashin = $endpointCashin;

        return $this;
    }

    /**
     * Get the value of endpointCashout
     */
    public function getEndpointCashout()
    {
        return $this->endpointCashout;
    }

    /**
     * Set the value of endpointCashout
     *
     * @return  self
     */
    public function setEndpointCashout($endpointCashout)
    {
        $this->endpointCashout = $endpointCashout;

        return $this;
    }
}
