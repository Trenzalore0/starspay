<?php

declare(strict_types=1);

namespace App\Partner\src\Entity;

use App\Base\src\Entity\TimestampableTrait;
use App\Partner\src\Repository\RoleRepository;
use Doctrine\ORM\Mapping\{
    Entity,
    Id,
    GeneratedValue,
    Column
};

#[Entity(repositoryClass: RoleRepository::class)]
class Role
{
    use TimestampableTrait;

    #[Id]
    #[GeneratedValue]
    #[Column]
    private ?int $id = null;

    #[Column(length: 255)]
    private ?string $name = null;

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
}
