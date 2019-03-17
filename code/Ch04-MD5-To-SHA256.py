import hashlib

password = '123456'
salt1 = 'abcdefgh'
md5 = hashlib.md5()
md5.update((password+salt1).encode())
salted_md5 = md5.hexdigest()
print("SaltedMD5:", salted_md5)

salt2 = salt1
sha256 = hashlib.sha256()
sha256.update(salted_md5.encode())
print("SaltedSHA256:", sha256.hexdigest())
