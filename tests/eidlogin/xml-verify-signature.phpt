--TEST--
Basic signature creation and verification with phpseclib3
--FILE--
<?php
require(dirname(__FILE__) . '/../../xmlseclibs.php');
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecurityKey;

$doc = new DOMDocument();
$doc->load(dirname(__FILE__) . '/../basic-doc.xml');

$objDSig = new XMLSecurityDSig();
$objDSig->setCanonicalMethod(XMLSecurityDSig::EXC_C14N);
$objDSig->addReference($doc, XMLSecurityDSig::SHA1, array('http://www.w3.org/2000/09/xmldsig#enveloped-signature'));

$objKey = new XMLSecurityKey(XMLSecurityKey::SHA256_RSA_MGF1, array('type'=>'private'));
$objKey->loadKey(dirname(__FILE__) . '/../privkey.pem', TRUE);

// Sign payload with the given private key.
$signature = $objDSig->sign($objKey);

// Make sure SignedInfo is set before verification.
$objDSig->canonicalizeSignedInfo();

// Verify signature.
if ($objDSig->verify($objKey) !== 1) {
    throw new Exception("Verification failed");
}

echo "DONE\n";
?>
--EXPECTF--
DONE
