<?php


namespace Alevel\Orders\Controller\Adminhtml\Edit;


use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;

class Inlineedit extends Action
{
    protected $jsonFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
    }

    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        if ($this->getRequest()->getParam('isAjax')) {
            $postItems = $this->getRequest()->getParam('items', []);
            $messages[] = __('Successfully save.');

            if (!count($postItems)) {
                $messages[] = __('Please correct the data sent.');
                $error = true;
            }
            /*else {
                foreach (array_keys($postItems) as $entityId) {
                    $model = $this->_objectManager->create('Test\Test\Model\test')->load($entityId);
                    try {
                        $model->setData(array_merge($model->getData(), $postItems[$entityId]));
                        $model->save();
                    } catch (\Exception $e) {
                        $messages[] = "[Error:]  {$e->getMessage()}";
                        $error = true;
                    }
                }
            }
            */
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }
}
