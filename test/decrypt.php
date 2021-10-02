<?php 

require __DIR__ . '/../src/Encoding.php';

$encrypted = "eJyzDCt0yc00CMv0MffVLyz0tAj0K8gO9i/JKs0uCfZIy/AwKzcqNS8uzU4Ny0tPCwx2MS919XRNyXPKMbbMdDHO8HNz9Al08/MrtXTS9g0MLI0wCfUKS7e1BQAvuB0P";

$i = new Encoding("s1", "c1", "k1", "o1", "t1", "g1", "q1", "p1", "n1");
$i->openssl("ASLANSOFT.COM");
$i->base64(true);
$i->gzcompress(true);
$i->serialize(false);
$i->urlencode(false);
$i->rawurlencode(false);
echo $i->decrypt($encrypted);