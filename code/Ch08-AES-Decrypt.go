package main

import (
    "crypto/aes"
    "crypto/cipher"
    "encoding/hex"
    "fmt"
)

func DecryptWithKey(ciphertext []byte, key []byte) ([]byte, error) {
	var block cipher.Block
	var err error
	block, err = aes.NewCipher(key)
	if err != nil {
		fmt.Println(err)
		return []byte{}, err
	}
	aesgcm, err := cipher.NewGCM(block)
	if err != nil {
		fmt.Println(err)
		return []byte{}, err
	}
	nonce, ciphertext := ciphertext[:12], ciphertext[12:]
	plaintext, err := aesgcm.Open(nil, nonce, ciphertext, nil)
	if err != nil {
		fmt.Println(err)
		return []byte{}, err
	}
	return plaintext, nil
}

func main() {        
	key,_ := hex.DecodeString("abf4db1a55c7ff9b1adcf86306d7203b5434ecd9c2d5e9ffc2aeedd92ffca383")
	cipher,_ := hex.DecodeString("1eab702f7c0523ff8bbe7d3901f7e069f37346451ca610e70d80645bf4ab7b879bdf")
    plaintext,_ := DecryptWithKey(cipher, key)
    fmt.Println("plaintext:", string(plaintext))
}