<?php

// // // //
// GENERAL-USE LIB:

/**
 * Increments an associative-array key. When key not exists, attributes 1.
 */
function keyInc(&$a,$x) {
	if (isset($a[$x])) $a[$x]++;
	else $a[$x]=1;
}


/**
 * Conditional Round. Use 0, 2 or 4 decimals if non-zero and non-big.
 */
function condRound($x,$l=2) {
	if  ($x>=10.0)
		return round($x);
	elseif ($x>=1.0)
		return round($x,1);
	$a = round($x,$l);
	$b = round($x,$l*2);
	return ($a==$b)? $a: $b;
}

// // // //
// RANDOM WORD LIB:

/**
 * Build a random word.
 */
function randWord_make() {
	global $hashLen;
	for($i=0,$w=''; $i<$hashLen; $i++) $w.=chr(mt_rand(97,122));
	return $w;
}
function randWord_makeUnique($max=500) {
	global $randWord_wasUsed;
	$w = '';
	$loop = true;
	for($i=0; $i<=$max && $loop; $i++) {
		$w = randWord_make();
		if (!isset($randWord_wasUsed[$w])) { 
			$randWord_wasUsed[$w] = count($randWord_wasUsed);
			$loop=false;
			break; // for
		}
	}
	if ($i>=$max) die("\n ERROR: max of try $i/$max\n");
	return $w;
}


// // // //
// HASH LIB:

/**
 * Simultating a real hash, truncating it.
 */
function hash_trunc($x,$useAlgo2=false) {
	global $hashLen;
	global $hashAlgo;
	global $hashAlgo2;
	$useAlgo2 = $useAlgo2 && ($hashAlgo2>'');
	return substr(hash($useAlgo2? $hashAlgo2: $hashAlgo,$x),0,$hashLen);
}

function hash_trunc_direct($algo,$x) {
	global $hashLen;
	return $hashLen? substr(hash($algo,$x),0,$hashLen): hash($algo,$x);
}

// UGLY hashing, to show problems with it
function ourHash($in,$uglyType=1) {
    global $hashLen;
    $max = strlen($in);
    $input = str_split($in);
    $result = 0;
    if ($uglyType==1 && $max<20) { // ugly1
	    if ($max>$hashLen) $max = $hashLen;
	    for ($i = 0; $i<$max; $i++)
		$result += ord($input[$i]);
    } else // ugly2 hash
	$result = ord($input[0]) +ord($input[ceil($max/2)]) + ord($input[$max-1]);
    return substr( dechex($result % 256) , 0,$hashLen);
}


