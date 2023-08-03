<?php

namespace Omnipro\Blog\Controller\Adminhtml\Data;

use Omnipro\Blog\Model\Data;

class MassDelete extends MassAction
{
    /**
     * @param Data $data
     * @return $this
     */
    protected function massAction(Data $data)
    {
        $this->dataRepository->delete($data);
        return $this;
    }
}
