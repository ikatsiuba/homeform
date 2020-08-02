<?php
namespace Test\HomeForm\Model\ResourceModel;

/**
 * Country resource model
 *
 */
class Country extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('country', 'id');
    }
    
}
