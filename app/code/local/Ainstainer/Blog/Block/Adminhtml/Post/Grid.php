<?php
class Ainstainer_Blog_Block_Adminhtml_Post_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('ain_post_grid');
        $this->setDefaultSort('post_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('blog/post_collection');
        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }
    protected function _prepareColumns()
    {
        $helper = Mage::helper('blog');
        $this->addColumn('post_id', [
            'header' => $helper->__('Post ID'),
            'index'  => 'post_id',
        ]);
        $this->addColumn('title', [
            'header' => $helper->__('Title'),
            'type'   => 'text',
            'index'  => 'title',
        ]);
        $this->addColumn('content', [
            'header' => $helper->__('Content'),
            'type'   => 'text',
            'index'  => 'content',
        ]);
        $this->addColumn('description', [
            'header' => $helper->__('Description'),
            'type'   => 'text',
            'index'  => 'description',
        ]);
        $this->addColumn('post_status', [
            'header' => $helper->__('Post Status'),
            'type'   => 'text',
            'index'  => 'published',
            'align' => 'center',
        ]);
        $this->addColumn('create_at', [
            'header' => $helper->__('Create At'),
            'type'   => 'text',
            'index'  => 'create_at',
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
        return $this->getUrl('*/*/edit', ['post_id' => $row->getId()]);
    }
    public function getGridUrl($params = [])
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }

}