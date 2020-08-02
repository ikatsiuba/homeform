<?php
declare(strict_types=1);

namespace Test\HomeForm\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Test\HomeForm\Api\Data;
use Test\HomeForm\Api\ContactRepositoryInterface;
use Test\HomeForm\Model\ContactFactory;
use Test\HomeForm\Model\ResourceModel\Contact\CollectionFactory;
use Test\HomeForm\Model\ResourceModel\Contact as ResourceContact;


/**
 * Class ContactRepository
 */
class ContactRepository implements ContactRepositoryInterface
{

    /**
     * @var ResourceContact
     */
    private $resource;

    /**
     * @var ContactFactory
     */
    private $contactFactory;

    /**
     * @var CollectionFactory
     */
    private $contactCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**c
     * @var Data\ContactSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;


    public function __construct(
        ResourceContact $resource,
        ContactFactory $contactFactory,
        CollectionFactory $contactCollectionFactory,
        Data\ContactSearchResultsInterfaceFactory $searchResult,
        CollectionProcessorInterface $collectionProcessor = null
    ) {
        $this->resource = $resource;
        $this->contactFactory = $contactFactory;
        $this->contactCollectionFactory = $contactCollectionFactory;
        $this->searchResultsFactory = $searchResult;
        $this->collectionProcessor = $collectionProcessor;
    }

    public function save(Data\ContactInterface $contact)
    {
        try {
            $this->resource->save($contact);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }
        return $contact;
    }

    public function getById($id)
    {
        $Contact = $this->contactFactory->create();
        $this->resource->load($Contact, $id);
        if (!$Contact->getId()) {
            throw new NoSuchEntityException(__('The Contact with the "%1" ID doesn\'t exist.', $id));
        }
        return $Contact;
    }
   
    public function getList(SearchCriteriaInterface $criteria)
    {

        $collection = $this->contactCollectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);

        /** @var Data\ContactSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    public function delete(Data\ContactInterface $contact)
    {
        try {
            $this->resource->delete($contact);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    public function deleteById($id)
    {
        return $this->delete($this->getById($id));
    }

}
