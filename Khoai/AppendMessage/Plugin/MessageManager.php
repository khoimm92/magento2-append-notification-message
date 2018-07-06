<?php

namespace Khoai\AppendMessage\Plugin;

class MessageManager
{
    protected $_productCompareItem;


    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig) {
        $this->scopeConfig = $scopeConfig;
    }

    public function beforeAddMessage(\Magento\Framework\Message\Manager\Interceptor $interceptor,
                                     \Magento\Framework\Message\MessageInterface $message)
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;

        $append_text = $this->scopeConfig->getValue('append_message/general/append_text', $storeScope) ?? '';
        $message->setText($message->getText() . ' ' . $append_text);
    }
}