<?php

class VS7_JSDB_Model_Observer
{
    private
        $_filePointer;

    public function createDb()
    {
        $path = Mage::helper('vs7_jsdb')->getJSDBFileName();
        $this->_filePointer = fopen($path, 'w');

        $data = array();

        foreach (Mage::getModel('catalog/product')->getCollection() as $product) {
            $data[] = array(
                'id' => $product->getId(),
                'sku' => $product->getSku()
            );
        }

        $json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        fwrite($this->_filePointer, 'var vs7_jsdb = ' . $json);

        fclose($this->_filePointer);
    }
}