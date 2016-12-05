<?php

class Ainstainer_Blog_Block_Adminhtml_Category_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('ain_category_grid');
        $this->setDefaultSort('category_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('blog/category_collection');
        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }
    protected function _prepareColumns()
    {
        $helper = Mage::helper('blog');
        $this->addColumn('category_id', [
            'header' => $helper->__('Category ID'),
            'index'  => 'category_id',
        ]);
        $this->addColumn('name', [
            'header' => $helper->__('Name'),
            'type'   => 'text',
            'index'  => 'name',
        ]);
        $this->addColumn('description', [
            'header' => $helper->__('Description'),
            'type'   => 'text',
            'index'  => 'description',
        ]);
        $this->addColumn('image', [
            'header'   => $helper->__('Image'),
            'type'     => 'image',
            'index'    => 'image',
        ]);

        $this->addExportType('*/*/exportCsv', $helper->__('CSV'));
        $this->addExportType('*/*/exportExcel', $helper->__('Excel XML'));
        return parent::_prepareColumns();
    }
    /**
     * Row click url
     *
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', ['category_id' => $row->getId()]);
    }
    public function getGridUrl($params = [])
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }
}