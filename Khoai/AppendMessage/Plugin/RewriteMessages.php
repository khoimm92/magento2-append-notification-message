<?php
namespace Khoai\AppendMessage\Plugin;
use Magento\Framework\Message\MessageInterface;
use Magento\Framework\View\Element\Message;
use Magento\Framework\View\Element\Template;

class RewriteMessages extends \Magento\Framework\View\Element\Messages {

    function __construct(Template\Context $context, \Magento\Framework\Message\Factory $messageFactory, \Magento\Framework\Message\CollectionFactory $collectionFactory, \Magento\Framework\Message\ManagerInterface $messageManager, Message\InterpretationStrategyInterface $interpretationStrategy, array $data = [],
                         \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
        parent::__construct($context, $messageFactory, $collectionFactory, $messageManager, $interpretationStrategy, $data);
        $this->scopeConfig = $scopeConfig;

    }

    protected function _renderMessagesByType()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;

        $append_text = $this->scopeConfig->getValue('append_message/general/append_text', $storeScope) || '';
        foreach ($this->getMessageTypes() as $type) {
            if ($messages = $this->getMessagesByType($type)) {
                foreach ($messages as $message) {
                    $message->setText($message->getText().' '.$append_text);
                }
            }
        }
        return parent::_renderMessagesByType();
    }
}