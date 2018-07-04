<?php

namespace Khoai\AppendMessage\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class ConfigObserver
 *
 * @package Khoai\AppendMessage\Observer
 */
class ConfigObserver implements ObserverInterface
{

    /**
     * ConfigObserver constructor.
     *
     * @param \Magento\Framework\Message\ManagerInterface        $messageManager
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        \Magento\Framework\Message\ManagerInterface $messageManager,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    ) {
    
        $this->_messageManager = $messageManager;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @param EventObserver $observer
     */
    public function execute(EventObserver $observer)
    {
    }
}
