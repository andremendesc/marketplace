<?php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\BankAccount;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var BankAccount
     * @ORM\OneToOne(targetEntity="BankAccount")
     * @ORM\JoinColumn(name="bank_account", referencedColumnName="id", nullable=true)
     */
    protected $bankAccount;

    /**
     * @var boolean
     * @ORM\Column(name="transferEnabled", type="boolean", nullable=true)
     */
    protected $transferEnabled;

    /**
     * @var string
     * @ORM\Column(name="lastTransfer", type="string", length=255, nullable=true)
     */
    protected $lastTransfer;

    /**
     * @var string
     * @ORM\Column(name="transferInterval", type="string", length=255, nullable=true)
     */
    protected $transferInterval;

    /**
     * @var int
     * @ORM\Column(name="transferDay", type="integer", nullable=true)
     */
    protected $transferDay;

    /**
     * @var bool
     * @ORM\Column(name="automaticAnticipationEnabled", type="boolean", nullable=true)
     */
    protected $automaticAnticipationEnabled;

    /**
     * @var int
     * @ORM\Column(name="anticipatableVolumePercentage", type="integer", nullable=true)
     */
    protected $anticipatableVolumePercentage;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Add BankAccount
     *
     * @param App\Entity\BankAccount $BankAccount
     *
     * @return User
     */
    public function addBankAccount(App\Entity\BankAccount $BankAccount)
    {
        $this->bankAccount = $BankAccount;
    
        return $this;
    }
    
    /**
     * Remove BankAccount
     *
     * @param App\Entity\BankAccount $BankAccount
     */
    public function removeBankAccount(App\Entity\BankAccount $BankAccount)
    {
        $this->bankAccounts->removeElement($BankAccount);
    }
    
    /**
     * Get bankAccount
     *
     * @return App\Entity\BankAccount
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * Get transferEnabled
     *
     * @return boolean
     */
    public function getTransferEnabled()
    {
        return $this->transferEnabled;
    }

    /**
     * Set transferEnabled
     * @param boolean
     * @return User
     */
    public function setTransferEnabled($value)
    {
        $this->transferEnabled = $value;
        return $this;
    }
    
    public function getLastTransfer()
    {
        return $this->lastTransfer;
    }

    /**
     * Set lastTransfer
     * @param string
     * @return User
     */
    public function setLastTransfer($value)
    {
        $this->lastTransfer = $value;
        return $this;
    }
    
    public function getTransferInterval()
    {
        return $this->transferInterval;
    }

    /**
     * Set transferInterval
     * @param string
     * @return User
     */
    public function setTransferInterval($value)
    {
        $this->transferInterval = $value;
        return $this;
    }
    
    public function getTransferDay()
    {
        return $this->transferDay;
    }

    /**
     * Set transferDay
     * @param int
     * @return User
     */
    public function setTransferDay($value)
    {
        $this->transferDay = $value;
        return $this;
    }
    
    public function getAutomaticAnticipationEnabled()
    {
        return $this->automaticAnticipationEnabled;
    }

    /**
     * Set automaticAnticipationEnabled
     * @param boolean
     * @return User
     */
    public function setAutomaticAnticipationEnabled($value)
    {
        $this->automaticAnticipationEnabled = $value;
        return $this;
    }
    
    public function getAnticipatableVolumePercentage()
    {
        return $this->anticipatableVolumePercentage;
    }

    /**
     * Set anticipatableVolumePercentage
     * @param int
     * @return User
     */
    public function setAnticipatableVolumePercentage($value)
    {
        $this->anticipatableVolumePercentage = $value;
        return $this;
    }
}