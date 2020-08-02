<?php
declare(strict_types=1);

namespace Test\HomeForm\Model\Source;

use Test\HomeForm\Api\CountryManagerInterface;

/**
 * Country class
 *
 */
class Country implements \Magento\Framework\Data\OptionSourceInterface
{
    
    /**
     * @var CountryManagerInterface
     */
    private $countryManager;


    public function __construct(
        CountryManagerInterface $countryManager
    ) {
        $this->countryManager = $countryManager;
    }
    
    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        $countries = $this->countryManager->getCountries();
        $options = [];
        foreach ($countries as $country) {
             $options[] = ['value'=>$country->getCode(),
                           'label'=> $country->getName()];
        }
        if (count($options) > 0) {
            array_unshift(
                $options,
                ['value' => '', 'label' => __('-- Please select Country --')]
                );
        }
        return $options;
    }
    
   
}
