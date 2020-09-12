<?php

class VS7_JSDB_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getJSDBFileName()
    {
        $path = Mage::getBaseDir() . DS . 'js' . DS . 'vs7_jsdb' . DS . 'db.js';

        if (!file_exists(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }

        if (!is_writable(dirname($path))) {
            Mage::throwException($path . ' is not writable!');
        }

        return $path;
    }


}