<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Translate
 * @copyright  Copyright (c) 2005-2007 Zend Technologies USA Inc. (http://www.zend.com)
 * @version    $Id: Translate.php,v 1.1 2008/02/06 11:35:52 saulo Exp $
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */

require_once 'Zend/Loader.php';


/**
 * @category   Zend
 * @package    Zend_Translate
 * @copyright  Copyright (c) 2005-2007 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Translate {
    /**
     * Adapter names constants
     */
    const AN_ARRAY   = 'array';
    const AN_CSV     = 'csv';
    const AN_GETTEXT = 'gettext';
    const AN_QT      = 'qt';
    const AN_TBX     = 'tbx';
    const AN_TMX     = 'tmx';
    const AN_XLIFF   = 'xliff';
    const AN_XMLTM   = 'xmltm';

    const LOCALE_DIRECTORY = 1;
    const LOCALE_FILENAME  = 2;
    /**
     * Adapter
     *
     * @var Zend_Translate_Adapter
     */
    private $_adapter;


    /**
     * Generates the standard translation object
     *
     * @param  string              $adapter  Adapter to use
     * @param  array               $data     Translation source data for the adapter
     *                                       Depends on the Adapter
     * @param  string|Zend_Locale  $locale   OPTIONAL locale to use
     * @param  array               $options  OPTIONAL options for the adapter
     * @throws Zend_Translate_Exception
     */
    public function __construct($adapter, $data, $locale = null, array $options = array())
    {
        $this->setAdapter($adapter, $data, $locale, $options);
    }


    /**
     * Sets a new adapter
     *
     * @param  string              $adapter  Adapter to use
     * @param  string|array        $data     Translation data
     * @param  string|Zend_Locale  $locale   OPTIONAL locale to use
     * @param  array               $options  OPTIONAL Options to use
     * @throws Zend_Translate_Exception
     */
    public function setAdapter($adapter, $data, $locale = null, array $options = array())
    {
        switch (strtolower($adapter)) {
            case 'array':
                $adapter = 'Zend_Translate_Adapter_Array';
                break;
            case 'csv':
                $adapter = 'Zend_Translate_Adapter_Csv';
                break;
            case 'gettext':
                $adapter = 'Zend_Translate_Adapter_Gettext';
                break;
            case 'qt':
                $adapter = 'Zend_Translate_Adapter_Qt';
                break;
            case 'tbx':
                $adapter = 'Zend_Translate_Adapter_Tbx';
                break;
            case 'tmx':
                $adapter = 'Zend_Translate_Adapter_Tmx';
                break;
            case 'xliff':
                $adapter = 'Zend_Translate_Adapter_Xliff';
                break;
            case 'xmltm':
                $adapter = 'Zend_Translate_Adapter_XmlTm';
                break;
        }

        Zend_Loader::loadClass($adapter);
        $this->_adapter = new $adapter($data, $locale, $options);
        if (!$this->_adapter instanceof Zend_Translate_Adapter) {
            require_once 'Zend/Translate/Exception.php';
            throw new Zend_Translate_Exception("Adapter " . $adapter . " does not extend Zend_Translate_Adapter'");
        }
    }


    /**
     * Returns the adapters name and it's options
     *
     * @return Zend_Translate_Adapter
     */
    public function getAdapter()
    {
        return $this->_adapter;
    }


    /**
     * Calls all methods from the adapter
     */
    public function __call($method, array $options)
    {
        if (method_exists($this->_adapter, $method)) {
            return call_user_func_array(array($this->_adapter, $method), $options);
        }
        throw new Zend_Translate_Exception("Unknown method '" . $method . "' called!");
    }
}
