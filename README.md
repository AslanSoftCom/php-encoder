# PHP Encode / Decode TOOLS
php custom encoders and decoders

<code>As encryption in operations such as php data transfer, most encryptions are easily decrypted, but you can create your own encryption, only decryption is in your hands.
</code>

# Requirements

<p>
PHP >= 8.0 OR 5.6
</p>

# Connection

```javascript
require __DIR__ . '/src/Encoding.php';
// You can create your own Password by changing this data.
$code = "s1", "c1", "k1", "o1", "t1", "g1", "q1", "p1", "n1";
$connect = new Encoding($code);
```

# Encrypt

```javascript
$Text = "THE ENCRYPTED WORD";
echo $connect->encrypt($Text);
```
# Decrypt

```javascript
$encrypted = "ENCRYPTED_WORD";
echo $connect->decrypt($encrypted);
```
# OpenSSL Encrypt

```javascript
$connect->openssl("YOUR_KEYWORD");
```

# Base64 Encrypt

```javascript
$connect->base64(true);

```
# Gzcompress Encrypt

```javascript
$connect->gzcompress(true);

```
# Serialize Encrypt

```javascript
$connect->serialize(true);

```
# Urlencode Encrypt

```javascript
$connect->urlencode(true);

```
# Rawurlencode Encrypt

```javascript
$connect->rawurlencode(true);

```

# Multiple Encrypt

```javascript
$Text = "THE ENCRYPTED WORD";
$connect->openssl("YOUR_KEYWORD");
$connect->base64(true);
$connect->gzcompress(true);
connecti->serialize(true);
$connect->urlencode(true);
$connect->rawurlencode(true);
echo $i->encrypt($Text);
```
# Multiple Decrypt

```javascript
$encrypted = "ENCRYPTED_WORD";
$connect->openssl("YOUR_KEYWORD");
$connect->base64(true);
$connect->gzcompress(true);
connecti->serialize(true);
$connect->urlencode(true);
$connect->rawurlencode(true);
echo $i->decrypt($encrypted);
```

# [![bitcoin-black](https://i.hizliresim.com/goezfoq.png)]


BTC: 16pY1uNQ1P4CYQiKfQLVanH13Fv2SDEaHh
