<?php

function generateRandomIV($length)
{
    return openssl_random_pseudo_bytes($length);
}

function aesEncrypt($pass)
{
    $password = $pass;
    $randomIV = generateRandomIV(16); // AES block size = 16 bytes
    $randomKey = generateRandomIV(32); // 256-bit key

    try {
        // Encrypt the data
        $encrypted = openssl_encrypt(
            $password,
            'AES-256-CBC',
            $randomKey,
            OPENSSL_RAW_DATA,
            $randomIV
        );

        if ($encrypted === false) {
            throw new Exception('Encryption failed');
        }

        // Return IV, Key, and Encrypted data as Base64 strings separated by commas
        $ivBase64 = base64_encode($randomIV);
        $keyBase64 = base64_encode($randomKey);
        $encryptedBase64 = base64_encode($encrypted);

        return "$ivBase64,$keyBase64,$encryptedBase64";
    } catch (Exception $e) {
        return "An error occurred: " . $e->getMessage();
    }
}

function aesDecrypt($pass)
{
    $parts = explode(',', $pass);
    if (count($parts) !== 3) {
        return null; // Invalid input format
    }

    $inputIV = base64_decode($parts[0]);
    $inputKey = base64_decode($parts[1]);
    $encryptedData = base64_decode($parts[2]);

    try {
        // Decrypt the data
        $decrypted = openssl_decrypt(
            $encryptedData,
            'AES-256-CBC',
            $inputKey,
            OPENSSL_RAW_DATA,
            $inputIV
        );

        if ($decrypted === false) {
            throw new Exception('Decryption failed');
        }

        return $decrypted;
    } catch (Exception $e) {
        echo "Decryption failed: " . $e->getMessage();
        return null;
    }
}

// Example usage:
$encrypted = aesEncrypt("hello world");
echo "Encrypted: $encrypted\n";

$decrypted = aesDecrypt($encrypted);
echo "Decrypted: $decrypted\n";

?>
