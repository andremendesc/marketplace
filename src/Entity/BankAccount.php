<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity
 * @ORM\Table(name="bank_account")
 * @ApiResource
 */
class BankAccount
{

    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=false)
     */
    private $bankCode;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $agencia;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $agenciaDv;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $conta;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $contaDv;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $documentNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $documentType;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $legalName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreated;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    public function getId()
    {
        return $this->id;
    }

    public function getBankCode()
    {
        return $this->bankCode;
    }

    public function getAgencia()
    {
        return $this->agencia;
    }

    public function getAgenciaDv()
    {
        return $this->agenciaDv;
    }

    public function getConta()
    {
        return $this->conta;
    }

    public function getContaDv()
    {
        return $this->contaDv;
    }

    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    public function getDocumentType()
    {
        return $this->documentType;
    }

    public function getLegalName()
    {
        return $this->legalName;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}