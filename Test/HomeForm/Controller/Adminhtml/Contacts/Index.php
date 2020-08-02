<?php
namespace Test\HomeForm\Controller\Adminhtml\Contacts;

/**
 * Contact index controller
 *
 */
class Index extends \Magento\Backend\App\Action
{

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    private $_pageFactory;

    const ADMIN_RESOURCE = 'Test_HomeForm::list_contacts';

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    ) {
        parent::__construct($context);
        $this->_pageFactory = $pageFactory;
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->_pageFactory->create();

        $resultPage->getConfig()->getTitle()->prepend(__('Contacts Manager'));
        return $resultPage;
    }
}
