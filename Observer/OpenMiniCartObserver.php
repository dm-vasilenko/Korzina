<?php

namespace Web4Pro\Checkout\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ObjectManager;

class OpenMiniCartObserver implements ObserverInterface
{
	protected $_urlManager;

    protected $redirect;

    public function __construct(
\Magento\Framework\UrlInterface $urlManager, 
\Magento\Framework\App\Response\RedirectInterface $redirect
) {
        $this->_urlManager = $urlManager;
        $this->redirect = $redirect;
    }

 public function execute(\Magento\Framework\Event\Observer $observer) {

    $actionName = $observer->getEvent()->getRequest()->getFullActionName();
    $controller = $observer->getControllerAction();
    $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

    $cartUpdated = $objectManager->get('Magento\Checkout\Model\Session')->getCartWasUpdated(false);

    if ($cartUpdated) {
        // open mini cart
    }
    $this->redirect->redirect($controller->getResponse(), $this->redirect->getRefererUrl());
}
}