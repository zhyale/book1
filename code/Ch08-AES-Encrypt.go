package main

import (
    "crypto/aes"
    "crypto/cipher"
    "crypto/rand"
    "encoding/hex"
    "fmt"
)

func GenerateRandomBytes(length int) []byte {
    bytes := make([]byte, length)   
    _, err := rand.Read(bytes)
    if err != nil {
        fmt.Println(err)
    }
    return bytes
}

func EncryptWithKey(plaintext []byte, key []byte) []byte {
	block, err := aes.NewCipher(key)
	if err != nil {
        fmt.Println(err)
    }
	nonce := GenerateRandomBytes(12)
	aesgcm, err := cipher.NewGCM(block)
	if err != nil {
        fmt.Println(err)
    }
	ciphertext := aesgcm.Seal(nonce, nonce, plaintext, nil)
	return ciphertext
}

func main() {    
    plaintext := "123456"
	key := GenerateRandomBytes(32) // for AES256
	fmt.Println("key:\n", hex.EncodeToString(key))
    cipher := EncryptWithKey([]byte(plaintext), key)
    fmt.Println("Cipher bytes:\n", cipher)
    fmt.Println("Cipher Hex:\n", hex.EncodeToString(cipher))
}