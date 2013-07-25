<?php

class SchumacherFM_Pgp_Model_Pgp
{

    private $_method = 'php';
    private $_encryptor = null;
    private $_publicKeyAscii = '';
    private $_plainTextString = '';
    private $_encrypted = '';

    /**
     * @param string $encrypted
     */
    protected function _setEncrypted($encrypted)
    {
        $this->_encrypted = $encrypted;
        return $this;
    }

    /**
     * @return string
     */
    public function getEncrypted()
    {
        return $this->_encrypted;
    }

    /**
     * @param string $plainTextString
     *
     * @return $this
     */
    public function setPlainTextString($plainTextString)
    {
        $this->_plainTextString = $plainTextString;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlainTextString()
    {
        return $this->_plainTextString;
    }

    /**
     * @param string $publicKeyAscii
     *
     * @return $this
     */
    public function setPublicKeyAscii($publicKeyAscii)
    {
        $this->_publicKeyAscii = $publicKeyAscii;
        return $this;
    }

    /**
     * @return string
     */
    public function getPublicKeyAscii()
    {
        return $this->_publicKeyAscii;
    }

    /**
     * @return $this
     */
    public function setMethodPhp()
    {
        $this->_method = 'php';
        return $this;
    }

    /**
     * @return $this
     */
    public function setMethodCli()
    {
        $this->_method = 'cli';
        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->_method;
    }

    /**
     * @return SchumacherFM_Pgp_Model_AbstractFactory
     */
    protected function _getEncryptor()
    {
        if ($this->_encryptor === null) {
            $this->_encryptor = Mage::getModel('pgp/' . $this->getMethod() . '_factory');
        }
        return $this->_encryptor;
    }

    /**
     * @return $this
     */
    public function encrypt()
    {
        $this->_setEncrypted(
            $this->_getEncryptor()->encrypt($this->getPublicKeyAscii(), $this->getPlainTextString())
        );
        return $this;
    }

}