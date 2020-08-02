<?php
declare(strict_types=1);

namespace Test\HomeForm\Model;

use Test\HomeForm\Api\Data\ContactInterface;


class Contact extends \Magento\Framework\Model\AbstractModel implements ContactInterface
{
    
    /**
     * @inheritdoc
     */
    public function _construct()
    {
        $this->_init(\Test\HomeForm\Model\ResourceModel\Contact::class);
    }
    
    
    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }
    
    /**
     * Get Email
     * @return string
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }
    
    /**
     * Get Address
     * @return string
     */
    public function getAddress()
    {
        return $this->getData(self::ADDRESS);
    }
    /**
     * Get checked
     * @return int
     */
    public function getChecked()
    {
        return $this->getData(self::CHECKED);
    }
    
    /**
     * Get CountryId
     * @return string
     */
    public function getCountryId()
    {
        return $this->getData(self::COUNTRY_ID);
    }
    
    /**
     * Get creation time
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }
    
    /**
     * Get update time
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }
    
    /**
     * Set Name
     * @param string $name
     * @return ContactInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }
    
    /**
     * Set email
     * @param string $email
     * @return ContactInterface
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }
    
    /**
     * Set Address
     * @param string $addess
     * @return ContactInterface
     */
    public function setAddress($address)
    {
        return $this->setData(self::ADDRESS, $address);
    }
    
    /**
     * Set checked
     * @param int $checked
     * @return ContactInterface
     */
    public function setChecked($checked)
    {
        return $this->setData(self::CHECKED, $checked);
    }
    
    /**
     * Set CountryId
     * @param string $countryId
     * @return ContactInterface
     */
    public function setCountryId($countryId)
    {
        return $this->setData(self::COUNTRY_ID, $countryId);
    }
    
    /**
     * Set creation time
     * @param string $createdAt
     * @return ContactInterface
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
    
    /**
     * Set update time
     * @param string $updatedAt
     * @return ContactInterface
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
}