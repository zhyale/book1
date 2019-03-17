import hashlib
 
sha256 = hashlib.sha256()
sha256.update(b"123456")
print("SHA256(123456) = " + sha256.hexdigest())
