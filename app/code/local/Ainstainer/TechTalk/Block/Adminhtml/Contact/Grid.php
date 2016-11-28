<?php
class Ainstainer_TechTalk_Block_Adminhtml_Contact_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('ain_contact_grid');
        $this->setDefaultSort('request_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('techtalk/contact_collection');

        $this->setCollection($collection);
        parent::_prepareCollection();

        return $this;
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('techtalk');

        $this->addColumn('request_id', [
            'header' => $helper->__('Request #'),
            'index'  => 'request_id',
        ]);

        $this->addColumn('name', [
            'header' => $helper->__('Contact Name'),
            'type'   => 'text',
            'index'  => 'name',
        ]);

        $this->addColumn('comment', [
            'header' => $helper->__('Comment'),
            'type'   => 'text',
            'index'  => 'comment',
        ]);

        $this->addColumn('email', [
            'header' => $helper->__('Contact Email'),
            'type'   => 'text',
            'index'  => 'email',
        ]);

        $this->addColumn('phone', [
            'header' => $helper->__('Contact Phone Number'),
            'type'   => 'text',
            'index'  => 'phone',
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
        return $this->getUrl('*/*/edit', ['request_id' => $row->getId()]);
    }

    public function getGridUrl($params = [])
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }
}