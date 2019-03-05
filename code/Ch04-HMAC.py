import hmac
msg = b"clientid=1&queryid=9999&timestamp=1544022380"
key = b"LetMeIn"
h = hmac.new(key, msg, digestmod='SHA256')
h.hexdigest()
