<?php

namespace Test\HomeForm\Model\ResourceModel\Country;

/**
 * Country collection
 *
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(\Test\HomeForm\Model\Country::class, \Test\HomeForm\Model\ResourceModel\Country::class);
    }
}
