<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $price;

    // *
    //  * @var Upload
    //  *
    //  * @ORM\OneToOne(targetEntity="UploadBundle\Entity\Upload", cascade={"persist", "remove"})
    //  * @ORM\JoinColumn(name="image_id", referencedColumnName="id", nullable=true)
     
    // private $image;
    
    // /**
    //  * @Assert\File(maxSize="1000000")
    //  */
    // private $file;
}