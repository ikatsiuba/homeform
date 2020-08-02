<?php
declare(strict_types=1);

namespace Test\HomeForm\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Test\HomeForm\Api\Data;
use Test\HomeForm\Api\CountryRepositoryInterface;
use Test\HomeForm\Model\CountryFactory;
use Test\HomeForm\Model\ResourceModel\Country\CollectionFactory;
use Test\HomeForm\Model\ResourceModel\Country as ResourceCountry;


/**
 * Class CountryRepository
 */
class CountryRepository implements CountryRepositoryInterface
{

    /**
     * @var ResourceCountry
     */
    private $resource;

    /**
     * @var CountryFactory
     */
    private $countryFactory;

    /**
     * @var CollectionFactory
     */
    private $countryCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**c
     * @var Data\CountrySearchResultsInterfaceFactory
     */
    private $searchResultsFactory;


    public function __construct(
        ResourceCountry $resource,
        CountryFactory $countryFactory,
        CollectionFactory $countryCollectionFactory,
        Data\CountrySearchResultsInterfaceFactory $searchResult,
        CollectionProcessorInterface $collectionProcessor = null
    ) {
        $this->resource = $resource;
        $this->countryFactory = $countryFactory;
        $this->countryCollectionFactory = $countryCollectionFactory;
        $this->searchResultsFactory = $searchResult;
        $this->collectionProcessor = $collectionProcessor;
    }

    public function save(Data\CountryInterface $country)
    {
        try {
            $this->resource->save($country);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }
        return $country;
    }

    public function getById($id)
    {
        $country = $this->countryFactory->create();
        $this->resource->load($country, $id);
        if (!$country->getId()) {
            throw new NoSuchEntityException(__('The country with the "%1" ID doesn\'t exist.', $id));
        }
        return $country;
    }
   
    public function getList(SearchCriteriaInterface $criteria)
    {

        $collection = $this->countryCollectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);

        /** @var Data\CountrySearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    public function delete(Data\CountryInterface $country)
    {
        try {
            $this->resource->delete($country);
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
