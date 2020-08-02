<?php
declare(strict_types=1);

namespace Test\HomeForm\Api;

use Magento\Framework\Exception\NoSuchEntityException;


/**
 *  Country manager interface
 */
interface CountryManagerInterface
{
    /**
     * @return \Test\HomeForm\Api\CountryManagerInterface[]
     */
    public function getCountries();
}
