<?php

namespace Omnipro\Blog\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface DataSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get data list.
     *
     * @return \Omnipro\Blog\Api\Data\DataInterface[]
     */
    public function getItems();

    /**
     * Set data list.
     *
     * @param \Omnipro\Blog\Api\Data\DataInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
