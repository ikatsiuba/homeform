<?php
declare(strict_types=1);
namespace Test\HomeForm\Model\Contact;

use Test\HomeForm\Model\ResourceModel\Contact\CollectionFactory;

/**
 * Custom DataProvider for contacts
 */
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var \Magento\Framework\App\RequestInterface $request,
     */
    private $request;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param \Magento\Framework\App\RequestInterface $request
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        \Magento\Framework\App\RequestInterface $request,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
        $this->request = $request;
    }

    /**
     *
     * @return array
     */
    public function getData(): array
    {
        $collection = $this->getCollection();
        
        $collection->join(
            'magento.country',
            "code = main_table.country_id",
            ['country_name'=>'name']
        );
        $result = [];
        if (!$collection->isLoaded()) {
            $items = $this->collection->getItems();
            /** @var \Test\HomeForm\Model\Contact $contact */
            foreach ($items as $contact) {
                $result[] = $contact->getData();
            }
        }
        return [
            'totalRecords' => $collection->getSize(),
            'items' => $result,
        ];
    }
}
