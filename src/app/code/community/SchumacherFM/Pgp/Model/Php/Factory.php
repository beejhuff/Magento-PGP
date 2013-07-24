<?php

class SchumacherFM_Pgp_Model_Php_Factory extends SchumacherFM_Pgp_Model_AbstractFactory
{
    public function encrypt($publicKey, $plainTextString)
    {

        /** @var $gpg SchumacherFM_Pgp_Model_Php_Gpg */
        $gpg = Mage::getModel('pgp/php_gpg');

        // create an instance of a GPG public key object based on ASCII key
        $pubKey = Mage::getModel('pgp/php_gpg_publicKey', $publicKey);

        // using the key, encrypt your plain text using the public key
        return $gpg->encrypt($pubKey, $plainTextString);
    }
}
