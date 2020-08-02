<?php

namespace Test\HomeForm\Api\Data;

use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Interface ContactInterface
 * @package Test\HomeForm\Api\Data
 */
interface ContactInterface
{

    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID = 'id';
    const NAME = 'name';
    const EMAIL = 'email';
    const ADDRESS = 'address';
    const CHECKED = 'checked';
    const COUNTRY_ID = 'country_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * Get ID
     * @return int
     */
    public function getId();
    
    /**
     * Get name
     * @return string
     */
    public function getName();
    
    /**
     * Get Email
     * @return string
     */
    public function getEmail();
    
    /**
     * Get Address
     * @return string
     */
    public function getAddress();

    /**
     * Get checked
     * @return int
     */
    public function getChecked();
    
    /**
     * Get CountryId
     * @return string
     */
    public function getCountryId();
    
    /**
     * Get creation time
     * @return mixed
     */
    public function getCreatedAt();

    /**
     * Get update time
     * @return mixed
     */
    public function getUpdatedAt();

    /**
     * Set ID
     * @param int $id
     * @return ContactInterface
     */
    public function setId($id);

    /**
     * Set Name
     * @param string $name
     * @return ContactInterface
     */
    public function setName($name);

    /**
     * Set email
     * @param string $email
     * @return ContactInterface
     */
    public function setEmail($email);

    /**
     * Set Address
     * @param string $addess
     * @return ContactInterface
     */
    public function setAddress($address);

    /**
     * Set checked
     * @param int $checked
     * @return ContactInterface
     */
    public function setChecked($checked);

    /**
     * Set CountryId
     * @param string $countryId
     * @return ContactInterface
     */
    public function setCountryId($countryId);
    
    /**
     * Set creation time
     * @param string $createdAt
     * @return ContactInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Set update time
     * @param string $updatedAt
     * @return ContactInterface
     */
    public function setUpdatedAt($updatedAt);
}
