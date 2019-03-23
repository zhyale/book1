import hashlib

def get_md5(password):
    md5 = hashlib.md5()
    md5.update(password)
    return md5.hexdigest()

if __name__ =='__main__':    
    print(get_md5(b'123456'))
    print(get_md5(b'654321'))
    print(get_md5(b'888888'))
