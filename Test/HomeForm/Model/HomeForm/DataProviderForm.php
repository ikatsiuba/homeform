<?php

namespace Test\HomeForm\Model\HomeForm;


use Test\HomeForm\Model\ResourceModel\Contact\CollectionFactory;
use Magento\Ui\DataProvider\Modifier\PoolInterface;
use Magento\Framework\Data\Form\FormKey;
/**
 * Class DataProvider
 */
class DataProviderForm extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    
    /**
     * @var \Test\HomeForm\Model\ResourceModel\Contact\Collection
     */
    protected $collection;
    
    private $formKey;
    
    
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $contactCollectionFactory,
        array $meta = [],
        array $data = [],
        FormKey $formKey
        ) {
            $this->collection = $contactCollectionFactory->create();
            $this->formKey = $formKey;
            parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
    
    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        $data = [];
//        $data[0]['form_key'] = $this->formKey->getFormKey();

        return $data;
    }
    
//     public function modifyMeta(array $meta)
//     {

//         $metaNew = [
//             'general' => [
//                 'children' => [
//                     'form_key' => [
//                         'arguments' => [
//                             'data' => [
//                                 'config' => [
//                                     'default' => $this->formKey->getFormKey()
//                                 ]
//                             ]
//                         ]
//                     ]
//                 ]
//             ]
//         ];
        
//         return array_merge_recursive($meta, $metaNew);
//     }

}