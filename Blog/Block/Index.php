<?php
namespace Omnipro\Blog\Block;
class Index extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Omnipro\Blog\Model\ResourceModel\Data\CollectionFactory $dataModelFactory, 
        \Magento\Framework\App\RequestInterface $request,
        array $data = []
 
    ) {
        $this->dataModelFactory =  $dataModelFactory;
        $this->request = $request;
        $this->page = null;

        parent::__construct($context, $data);
    }

    public function load(){

        $id = $this->request->getParam('id');
        if(empty($id)){
           $id = 1 ; 
        }

        $this->page = $this->dataModelFactory->create()->addFieldToFilter('data_id', array('eq' => $id))->getFirstItem();

        return $this->page;
    }

    public function isActive(){

        return $this->page->getData('is_active');

    }

    public function getTitle(){

        if(!empty($this->page)){
            return $this->page->getData('data_title');
        }else{
            return 'TITULO NO DISPONIBLE';
        }

    }

    public function getContent(){

        if(!empty($this->page)){
            return $this->page->getData('data_content');
        }else{
            return '<span>CONTENIDO NO DISPONIBLE</span>';
        }

    }


    public function getDate(){

        if(!empty($this->page)){
            $orgDate = $this->page->getData('created_at');
            
            $newDate = date("d/m/Y", strtotime($orgDate)); 
            
            return $newDate;

        }else{
            return '<span>'.date("d/m/Y").'</span>';
        }

    }

}
