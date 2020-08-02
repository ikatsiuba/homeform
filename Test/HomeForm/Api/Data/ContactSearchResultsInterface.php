<?php

namespace Test\HomeForm\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface ContactSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get list.
     *
     * @return \Test\HomeForm\Api\Data\CotactInterface[]
     */
    public function getItems();

    /**
     * Set  list.
     *
     * @param \Test\HomeForm\Api\Data\ContactInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
