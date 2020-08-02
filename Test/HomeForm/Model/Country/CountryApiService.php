<?php
declare(strict_types=1);

namespace Test\HomeForm\Model\Country;

use Test\HomeForm\Api\CountryApiServiceInterface;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\HTTP\Client\Curl;

/**
 * CountryApiService class
 *
 */
class CountryApiService implements CountryApiServiceInterface
{
    private const SERVICE_URL = 'https://restcountries.eu/rest/v2/all';
    
    
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;
    
    /**
     * @var Curl
     */
    private $curl;
    
    /**
     * @var Json
     */
    private $jsonSerializer;
    
    /**
     * @param Curl $curl
     * @param \Psr\Log\LoggerInterface $logger
     * @param Json $jsonSerializer
     */
    public function __construct(
        Curl $curl,
        \Psr\Log\LoggerInterface $logger,
        Json $jsonSerializer
    ) {
        $this->curl = $curl;
        $this->logger = $logger;
        $this->jsonSerializer = $jsonSerializer;
    }
    
    
    public function call()
    {
        
        try {
            $this->curl->get(self::SERVICE_URL);
            $response = $this->curl->getBody();
            if (!empty($response) && $this->curl->getStatus() === 200) {
                $this->logger->debug($response);
                return $this->jsonSerializer->unserialize($response);
            }else{
                $this->logger->debug($response);
            }
        } catch (\Exception $e) {
            $this->logger->debug($e);
        }
        return [];
    }
}
