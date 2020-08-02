<?php

namespace Test\HomeForm\Controller\Index;

use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
use Magento\Contact\Model\ConfigInterface;
use Magento\Contact\Model\MailInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;
use Test\HomeForm\Model\ContactFactory;
use Test\HomeForm\Api\ContactRepositoryInterface;



class Save extends \Magento\Framework\App\Action\Action implements HttpPostActionInterface
{


    /**
     * @var Context
     */
    private $context;
    
    /**
     * @var ContactFactory
     */
    private $contactFactory;
    
    /**
     * @var ContactRepositoryInterface
     */
    private $contactRepository;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param Context $context
     * @param ConfigInterface $contactsConfig
     * @param MailInterface $mail
     * @param LoggerInterface $logger
     */
    public function __construct(
        Context $context,
        ContactFactory $contactFactory,
        ContactRepositoryInterface $contactRepository,
        LoggerInterface $logger
    ) {
        parent::__construct($context);
        $this->context = $context;
        $this->contactFactory = $contactFactory;
        $this->contactRepository = $contactRepository;
        $this->logger = $logger ;
    }

    /**
     * Post user question
     *
     * @return Redirect
     */
    public function execute()
    {
        
        if (!$this->getRequest()->isPost()) {
            return $this->resultRedirectFactory->create()->setPath('/');
        }
         try {
             $data  = $this->validatedParams();
             
             $contact = $this->contactFactory->create();
             $contact->setData($data);
             
             $this->contactRepository->save($contact);
             
             $this->messageManager->addSuccessMessage(
                 __('Thanks for contacting us. We\'ll respond to you very soon.')
             );

         } catch (LocalizedException $e) {
             $this->messageManager->addErrorMessage($e->getMessage());
         } catch (\Exception $e) {
             $this->logger->critical($e);
             $this->messageManager->addErrorMessage(
                 __('An error occurred while processing your form. Please try again later.')
             );
         }

         return $this->resultRedirectFactory->create()->setPath('/');
    }

    /**
     * @return array
     * @throws \Exception
     */
    private function validatedParams()
    {
        $params = $this->getRequest()->getParam('contact');
        if (trim($params['name']) === '') {
            throw new LocalizedException(__('Enter the Name and try again.'));
        }
        if (trim($params['phone']) === '') {
            throw new LocalizedException(__('Enter the phone and try again.'));
        }
        if (trim($params['address']) === '') {
            throw new LocalizedException(__('Enter the address and try again.'));
        }
        if (trim($params['checked']) === '') {
            throw new LocalizedException(__('Checkbox should be checked.'));
        }
        
        if (trim($params['country_id']) === '') {
            throw new LocalizedException(__('Enter the country and try again.'));
        }
        
        if (false === \strpos($params['email'], '@')) {
            throw new LocalizedException(__('The email address is invalid. Verify the email address and try again.'));
        }


        return $params;
    }
 }
