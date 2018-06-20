<?php

namespace Khoai\AppendMessage\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;

class ConfigObserver implements ObserverInterface
{

    /**
     * @param Logger $logger
     */
    public function __construct(
        \Magento\Framework\Message\ManagerInterface $messageManager,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        $this->_messageManager = $messageManager;
        $this->scopeConfig = $scopeConfig;
    }

    public function execute(EventObserver $observer)
    {
    }

}
