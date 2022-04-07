<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
#[ApiResource(normalizationContext: ['groups' => ['read_admin']], denormalizationContext: ['groups' => ['write_admin']])]
class Admin extends User
{

}
