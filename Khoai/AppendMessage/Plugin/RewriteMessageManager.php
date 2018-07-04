<?php

namespace Khoai\AppendMessage\Plugin;

use Magento\Framework\Event;
use Magento\Framework\Message\CollectionFactory;
use Magento\Framework\Message\ExceptionMessageFactoryInterface;
use Magento\Framework\Message\Factory;
use Magento\Framework\Message\MessageInterface;
use Magento\Framework\Message\Session;
use Psr\Log\LoggerInterface;

/**
 * Class RewriteMessageManager
 *
 * @package Khoai\AppendMessage\Plugin
 */
class RewriteMessageManager extends \Magento\Framework\Message\Manager
{

    /**
     * RewriteMessageManager constructor.
     *
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param Session                                            $session
     * @param Factory                                            $messageFactory
     * @param CollectionFactory                                  $messagesFactory
     * @param Event\ManagerInterface                             $eventManager
     * @param LoggerInterface                                    $logger
     * @param string                                             $defaultGroup
     * @param ExceptionMessageFactoryInterface|null              $exceptionMessageFactory
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        Session $session,
        Factory $messageFactory,
        CollectionFactory $messagesFactory,
        Event\ManagerInterface $eventManager,
        LoggerInterface $logger,
        $defaultGroup = self::DEFAULT_GROUP
    ) {
    
        parent::__construct($session, $messageFactory, $messagesFactory, $eventManager, $logger, $defaultGroup);
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @param MessageInterface $message
     * @param null             $group
     * @return $this
     */
    public function addMessage(MessageInterface $message, $group = null)
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;

        $append_text = $this->scopeConfig->getValue('append_message/general/append_text', $storeScope) ?? '';
        $message->setText($message->getText() . ' ' . $append_text);
        return parent::addMessage($message, $group);
    }
}
