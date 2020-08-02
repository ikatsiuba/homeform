<?php
declare(strict_types=1);

namespace Test\HomeForm\Model\Country;

use Test\HomeForm\Api\CountryManagerInterface;
use Test\HomeForm\Model\CountryFactory;
use Test\HomeForm\Api\CountryRepositoryInterface;
use Test\HomeForm\Api\CountryApiServiceInterface;
use Magento\Framework\Exception\IntegrationException;
use Test\HomeForm\Model\ResourceModel\Country\Collection;

/**
 * CountryManager class
 *
 */
class CountryManager implements CountryManagerInterface
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;
    
    /**
     * @var CountryApiServiceInterface
     */
    private $countryApiService;
    
    /**
     * @var Collection
     */
    private $countryCollection;
    
    /**
     * @var CountryFactory
     */
    private $countryFactory;
    
    /**
     * @var CountryRepositoryInterface
     */
    private $countryRepository;
    
    /**
     * @param CountryApiServiceInterface $countryApiService
     * @param \Psr\Log\LoggerInterface $logger
     * @param Collection $countryCollection
     * @param CountryFactory $countryFactory
     * @param CountryRepositoryInterface $countryRepository
     */
    public function __construct(
        CountryApiServiceInterface $countryApiService,
        \Psr\Log\LoggerInterface $logger,
        Collection $countryCollection,
        CountryFactory $countryFactory,
        CountryRepositoryInterface $countryRepository
    ) {
        $this->countryApiService = $countryApiService;
        $this->logger = $logger;
        $this->countryCollection = $countryCollection;
        $this->countryFactory = $countryFactory;
        $this->countryRepository = $countryRepository;
    }
    
    
    public function getCountries()
    {
        if (!$this->countryCollection->isLoaded()) {
            $this->countryCollection->load();
        }
        
        if($this->countryCollection->count()){
            return $this->countryCollection;
        }else{
            $countries = $this->countryApiService->call();
            foreach($countries as $item){
                $country = $this->countryFactory->create();
                $country->setCode($item['alpha2Code'])
                        ->setName($item['name']);
                $this->countryRepository->save($country);
            }
            return $this->countryCollection->clear()->load();
        }
    }
}
