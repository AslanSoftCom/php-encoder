<?php 

require __DIR__ . '/../src/Encoding.php';

$Text = "AslanSoft.Com";

$i = new Encoding("s1", "c1", "k1", "o1", "t1", "g1", "q1", "p1", "n1");
$i->openssl("ASLANSOFT.COM");
$i->base64(true);
$i->gzcompress(true);
$i->serialize(false);
$i->urlencode(false);
$i->rawurlencode(false);
echo $i->encrypt($Text);