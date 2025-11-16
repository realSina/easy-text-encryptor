<?php
define('ENCRYPT_KEY', 'YOUR_SECRET_KEY');
define('ENCRYPT_SIZE', 32);
define('ENCRYPT_SIGNATURE', 'YOUR_SIGNATURE');

function textEncrypt($text) {
    $text = ENCRYPT_SIGNATURE.$text;
    $blockSize = ENCRYPT_SIZE;
    $encrypted = '';
    $keySeed = ENCRYPT_KEY;
    for($i = 0; $i < strlen($text); $i += $blockSize) {
        $block = substr($text, $i, $blockSize);
        $hashedKey = hash('sha256', $keySeed, true);
        $blockEncrypted = '';
        for($j = 0; $j < strlen($block); $j++) {
            $blockEncrypted .= $block[$j] ^ $hashedKey[$j % strlen($hashedKey)];
        }
        $encrypted .= $blockEncrypted;
        $keySeed = $hashedKey;
    }
    return base64_encode($encrypted);
}
function textDecrypt($encryptedText) {
    $text = base64_decode($encryptedText);
    $blockSize = ENCRYPT_SIZE;
    $decrypted = '';
    $keySeed = ENCRYPT_KEY;
    for($i = 0; $i < strlen($text); $i += $blockSize) {
        $block = substr($text, $i, $blockSize);
        $hashedKey = hash('sha256', $keySeed, true);
        $blockDecrypted = '';
        for($j = 0; $j < strlen($block); $j++) {
            $blockDecrypted .= $block[$j] ^ $hashedKey[$j % strlen($hashedKey)];
        }
        $decrypted .= $blockDecrypted;
        $keySeed = $hashedKey;
    }
    if(substr($decrypted, 0, strlen(ENCRYPT_SIGNATURE)) !== ENCRYPT_SIGNATURE) {
        return false;
    }
    return substr($decrypted, strlen(ENCRYPT_SIGNATURE));
}
function isTextEncrypted($encodedText) {
    if(!preg_match('/^[A-Za-z0-9\/+=]+$/', $encodedText)) {
        return false;
    }
    $decrypted = textDecrypt($encodedText);
    if($decrypted === false) {
        return false;
    }
    return true;
}