<?php
class Ainstainer_TechTalk_Block_Product_View extends Mage_Catalog_Block_Product_View {
  /*
  Retrieve current product model
  @return Mage_Catalog_Model_Product
  */

  public function getProduct()
  {
      if(!Mage::registry('product') && $this->getProductId())
      {
          $product= Mage::getModel(catalog/product)->load($this->getProductId());
          Mage::register('product', $product);
      }
      /*start rewrite*/
      Mage::registry('product')->setData('test','Hello from rewrite');
      /*start rewrite*/

      return parent::getProduct(); // TODO: Change the autogenerated stub
  }
}