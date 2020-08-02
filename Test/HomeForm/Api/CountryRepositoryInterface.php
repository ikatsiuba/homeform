<?php

namespace Test\HomeForm\Api;

/**
 * CountryRepositoryInterface interface.
 */
interface CountryRepositoryInterface
{
    /**
     *
     * @param \Test\HomeForm\Api\Data\CountryInterface $country
     * @return \Test\HomeForm\Api\Data\CountryInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\CountryInterface $country);

    /**
     * @param int $id
     * @return \Test\HomeForm\Api\Data\CountryInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($id);

    /**
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Test\HomeForm\Api\Data\CountrySearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     *
     * @param \Test\HomeForm\Api\Data\CountryInterface $country
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(Data\CountryInterface $country);

    /**
     *
     * @param int $id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);
}
