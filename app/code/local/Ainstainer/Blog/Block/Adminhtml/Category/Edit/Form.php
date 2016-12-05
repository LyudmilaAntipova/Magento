<?php
class Ainstainer_Blog_Block_Adminhtml_Category_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('category_request');
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
        $model = Mage::registry('category_request');

        $form = new Varien_Data_Form(
            ['id' => 'edit_form',
                'action' => $this->getUrl('*/*/save', ['category_id' => $this->getRequest()->getParam('category_id')]),
                'method' => 'post']
        );
        $form->setHtmlIdPrefix('block_');

        $fieldset = $form->addFieldset('base_fieldset', [
            'legend' => Mage::helper('blog')->__('General Information'),
            'class' => 'fieldset-wide'
        ]);

        if ($model->getBlockId()) {

            $fieldset->addField('category_id', 'hidden', [
                'name' => 'category_id',
            ]);
        }
        $fieldset->addField('name', 'text', [
            'name'     => 'name',
            'label'    => Mage::helper('blog')->__('Name'),
            'title'    => Mage::helper('blog')->__('Name'),
            'required' => true
        ]);

        $fieldset->addField('description', 'text', [
            'name'     => 'description',
            'label'    => Mage::helper('blog')->__('Description'),
            'title'    => Mage::helper('blog')->__('Description'),
            'required' => true
        ]);
        $fieldset->addField('image', 'file', [
            'label'     => 'logo',
            'required'  => false,
            'name'      => 'image',
        ]);

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}