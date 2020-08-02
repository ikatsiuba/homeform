<?php

namespace Test\HomeForm\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface CountrySearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get list.
     *
     * @return \Test\HomeForm\Api\Data\CountryInterface[]
     */
    public function getItems();

    /**
     * Set  list.
     *
     * @param \Test\HomeForm\Api\Data\CountryInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
