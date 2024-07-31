<?php

declare(strict_types=1);

namespace App\Partner\src\Entity;

use App\Base\src\Entity\TimestampableTrait;
use App\Partner\src\Repository\PartnerRepostiry;
use Doctrine\ORM\Mapping\{
    Entity,
    Id,
    GeneratedValue,
    Column
};

#[Entity(repositoryClass: PartnerRepostiry::class)]
class Partner
{
    use TimestampableTrait;

    #[Id]
    #[GeneratedValue]
    #[Column]
    private ?int $id = null;

    #[Column(length: 255)]
    private ?string $name = null;

    #[Column(length: 255, unique: true, nullable: true)]
    private ?string $key = null;

    #[Column(length: 255, unique: true, nullable: true)]
    private ?string $secret = null;

    #[Column(length: 255, nullable: true)]
    private ?string $wdpass = null;

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
     * Get the value of name
     *
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return self
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of key
     *
     * @return ?string
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * Set the value of key
     *
     * @return self
     */
    public function setKey($key): self
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get the value of secret
     *
     * @return ?string
     */
    public function getSecret(): ?string
    {
        return $this->secret;
    }

    /**
     * Set the value of secret
     *
     * @return self
     */
    public function setSecret($secret): self
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     * Get the value of wdpass
     *
     * @return ?string
     */
    public function getWdpass(): ?string
    {
        return $this->wdpass;
    }

    /**
     * Set the value of wdpass
     *
     * @return self
     */
    public function setWdpass($wdpass): self
    {
        $this->wdpass = $wdpass;

        return $this;
    }
}
