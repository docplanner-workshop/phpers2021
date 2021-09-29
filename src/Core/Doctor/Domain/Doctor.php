<?php

declare(strict_types=1);

namespace App\Core\Doctor\Domain;

use App\Shared\Uuid\Uuid;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
final class Doctor
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="guid")
     */
    private string $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    public function __construct(string $name)
    {
        $this->id = (string) Uuid::uuid4();
        $this->name = $name;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}
