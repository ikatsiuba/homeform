<?php
declare(strict_types=1);

namespace Test\HomeForm\Model;

use Test\HomeForm\Api\Data\CountryInterface;


class Country extends \Magento\Framework\Model\AbstractModel implements CountryInterface
{
    
    
    /**
     * @inheritdoc
     */
    public function _construct()
    {
        $this->_init(\Test\HomeForm\Model\ResourceModel\Country::class);
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
     * Set Name
     * @param string $name
     * @return CountryInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }
    
    
    /**
     * Get code
     * @return string
     */
    public function getCode()
    {
        return $this->getData(self::CODE);
    }
    
    /**
     * Set Code
     * @param string $code
     * @return CountryInterface
     */
    public function setCode($code)
    {
        return $this->setData(self::CODE, $code);
    }
}