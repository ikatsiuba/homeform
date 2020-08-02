<?php
namespace Test\HomeForm\Model\ResourceModel;

/**
 * Contact resource model
 *
 */
class Contact extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('contact', 'id');
    }
    
}
