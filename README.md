# EasyTextEncryptor

EasyTextEncryptor is a simple PHP-based text encryption and decryption tool. It provides an easy-to-use method for securely encrypting and decrypting text messages using a custom encryption algorithm with dynamic key hashing.

### Features:
- Encrypt and decrypt text with a straightforward method.
- Uses SHA-256 hashing for dynamic encryption key generation per block.
- Includes a custom signature for ensuring the integrity of encrypted text.
- Base64 encoding for encrypted text for easy storage or transmission.
- Check if a text is validly encrypted using the system.

### Usage:

#### Encrypting Text:
To encrypt a text message, simply call the `textEncrypt()` function:

```php
$text = "This is a secret message";
$encryptedText = textEncrypt($text);
echo "Encrypted Text: $encryptedText";
```

#### Decrypting Text:
To decrypt the previously encrypted text, use the `textDecrypt()` function:

```php
$encryptedText = "your_encrypted_text_here";
$decryptedText = textDecrypt($encryptedText);

if($decryptedText !== false) {
    echo "Decrypted Text: $decryptedText";
}
else {
    echo "Decryption failed or invalid encrypted text.";
}
```

#### Check If Text Is Encrypted:
You can check if a text is encrypted with the system using `isTextEncrypted()`:

```php
$encodedText = "your_encoded_text_here";
if(isTextEncrypted($encodedText)) {
    echo "The text is validly encrypted.";
}
else {
    echo "The text is not validly encrypted.";
}
```

### Configuration:
Before using the functions, make sure to define the following constants:

```php
define('ENCRYPT_KEY', 'YOUR_SECRET_KEY');       // Your encryption key (it could be anything like some random characters)
define('ENCRYPT_SIZE', 32);                     // Block size (e.g., 32 bytes)
define('ENCRYPT_SIGNATURE', 'YOUR_SIGNATURE');  // Custom signature for integrity (it could be anything like your name)
```

### Installation:
1. Clone the repository or download the files.
2. Include the encryption functions in your PHP project.
3. Set your encryption key (`ENCRYPT_KEY`) and signature (`ENCRYPT_SIGNATURE`) values.

```bash
git clone https://github.com/realSina/easy-text-encryptor.git
```

### Example:
```php
<?php
// Set your encryption key and signature
define('ENCRYPT_KEY', 'MY_SECRET_KEY');
define('ENCRYPT_SIZE', 32);
define('ENCRYPT_SIGNATURE', 'MY_SECURE_SIGNATURE');

// Encrypt text
$originalText = "Hello, this is a secret message!";
$encryptedText = textEncrypt($originalText);
echo "Encrypted: $encryptedText\n";

// Decrypt text
$decryptedText = textDecrypt($encryptedText);
echo "Decrypted: $decryptedText\n";
?>
```

### License:
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

### Contributing:
Feel free to contribute to this project by submitting pull requests or opening issues.

### Notes:
- This encryption system is designed for simplicity and educational purposes.
- For securing sensitive data in production environments, consider using more robust and industry-standard encryption algorithms.
