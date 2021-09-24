<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DoctorRepository;
/**
 * @ORM\Entity(repositoryClass=DoctorRepository::class)
 */
final class Doctor
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }
}
