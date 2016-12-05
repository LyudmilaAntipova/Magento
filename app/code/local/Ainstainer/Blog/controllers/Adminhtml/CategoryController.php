<?php

class Ainstainer_Blog_Adminhtml_CategoryController extends  Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Category requests'))->_title($this->__('Ain Blog'));
        $this->loadLayout();
        $this->_setActiveMenu('ain_blog');
        $this->_addContent($this->getLayout()->createBlock('blog/adminhtml_category'));
        $this->renderLayout();
    }
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('blog/adminhtml_category_grid')->toHtml()
        );
    }
    public function exportCsvAction()
    {
        $fileName = 'category.csv';
        $grid = $this->getLayout()->createBlock('blog/adminhtml_category_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }
    public function exportExcelAction()
    {
        $fileName = 'category.xml';
        $grid = $this->getLayout()->createBlock('blog/adminhtml_category_grid');
        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }
    // edit section
    public function newAction()
    {
        // the same form is used to create and edit
        $this->_forward('edit');
    }
    public function editAction()
    {
        $this->_title($this->__('Category Reguest'));

        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('category_id');
        $model = Mage::getModel('blog/category');
        Mage::register('category_request', $model);

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (! $model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('blog')->__('This block no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }
        $this->_title($model->getId() ? $model->getTitle() : $this->__('New Request'));

        // 3. Set entered data if was error when we do save
        $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
        if (! empty($data)) {
            $model->setData($data);
        }

        // 5. Build edit form
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('blog/adminhtml_category_edit'));
        $this->_setActiveMenu('ain_blog')
            ->_addBreadcrumb($id ? Mage::helper('blog')->__('Edit Request') : Mage::helper('blog')->__('New Request'), $id ? Mage::helper('blog')->__('Edit Request') : Mage::helper('blog')->__('New Request'))
            ->renderLayout();
    }
    public function saveAction()
    {

    }

    /**
     * Delete action
     */
    public function deleteAction()
    {
        // check if we know what should be deleted
        if ($id = $this->getRequest()->getParam('category_id')) {
            $title = "";
            try {
                // init model and delete
                $model = Mage::getModel('blog/category');
                $model->load($id);
                $title = $model->getTitle();
                $model->delete();
                // display success message
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('blog')->__('The blog has been deleted.'));
                // go to grid
                $this->_redirect('*/*/');
                return;

            } catch (Exception $e) {
                // display error message
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                // go back to edit form
                $this->_redirect('*/*/edit', array('category_id' => $id));
                return;
            }
        }
        // display error message
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('blog')->__('Unable to find a blog to delete.'));
        // go to grid
        $this->_redirect('*/*/');
    }
}