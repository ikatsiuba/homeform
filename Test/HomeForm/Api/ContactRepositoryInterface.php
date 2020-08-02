<?php

namespace Test\HomeForm\Api;

/**
 * ContactRepositoryInterface interface.
 */
interface ContactRepositoryInterface
{
    /**
     *
     * @param \Test\HomeForm\Api\Data\ContactInterface $Contact
     * @return \Test\HomeForm\Api\Data\ContactInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\ContactInterface $contact);

    /**
     * @param int $id
     * @return \Test\HomeForm\Api\Data\ContactInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($id);

    /**
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Test\HomeForm\Api\Data\ContactSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     *
     * @param \Test\HomeForm\Api\Data\ContactInterface $Contact
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(Data\ContactInterface $contact);

    /**
     *
     * @param int $id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);
}
