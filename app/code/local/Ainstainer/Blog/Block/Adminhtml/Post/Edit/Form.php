<?php
class Ainstainer_Blog_Block_Adminhtml_Post_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('post_request');
        $this->setTitle(Mage::helper('blog')->__('Request info'));
    }
    /**
     * Load Wysiwyg on demand and Prepare layout
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
    }
    protected function _prepareForm()
    {
        $model = Mage::registry('post_request');

        $form = new Varien_Data_Form(
            ['id' => 'edit_form',
                'action' => $this->getURL('*/*/save', ['post_id' => $this->getRequest()->getParam('post_id')]),
                'method' => 'post']
        );
        $form->setHtmlIdPrefix('block_');

        $fieldset = $form->addFieldset('base_fieldset', [
            'legend' => Mage::helper('blog')->__('General Information'),
            'class' => 'fieldset-wide'
        ]);

        if ($model->getBlockId()) {

            $fieldset->addField('post_id', 'hidden', [
                'name' => 'post_id',
            ]);
        }
        $fieldset->addField('title', 'text', [
            'name'     => 'title',
            'label'    => Mage::helper('blog')->__('Title'),
            'title'    => Mage::helper('blog')->__('Title'),
            'required' => true,
        ]);

        $fieldset->addField('description', 'text', [
            'name'     => 'description',
            'label'    => Mage::helper('blog')->__('Description'),
            'title'    => Mage::helper('blog')->__('Description'),
            'required' => true,
        ]);

        $fieldset->addField('content', 'editor', [
            'name'     => 'content',
            'label'    => Mage::helper('blog')->__('Content'),
            'title'    => Mage::helper('blog')->__('Content'),
            'required' => true,
            'config'   => Mage::getSingleton('cms/wysiwyg_config')->getConfig(),
        ]);

        $fieldset->addField('post_status', 'select', [
            'name'     => 'post_status',
            'label'    => Mage::helper('blog')->__('Status'),
            'title'    => Mage::helper('blog')->__('Status'),
            'required' => true,
            'options'  => Mage::getModel('ain_blog/source_status')->toArray(),
        ]);

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}