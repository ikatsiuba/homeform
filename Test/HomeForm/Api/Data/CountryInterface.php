<?php

namespace Test\HomeForm\Api\Data;

use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Interface CountryInterface
 * @package Test\HomeForm\Api\Data
 */
interface CountryInterface
{

    const CODE = 'code';
    const NAME = 'name';

    /**
     * Get CODE
     * @return string
     */
    public function getCode();
    
    /**
     * Get name
     * @return string
     */
    public function getName();
    

    /**
     * Set CODE
     * @param string $code
     * @return CountryInterface
     */
    public function setCode($code);

    /**
     * Set Name
     * @param string $name
     * @return CountryInterface
     */
    public function setName($name);

}
