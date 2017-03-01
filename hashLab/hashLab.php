<?php
/**
 * HashLab, first draft - generates data for PostgreSQL database and use it as "online lab" with PostgREST.
 * Header description at metadata.json using https://www.w3.org/TR/tabular-data-model/
 */

// CONFIGS:
  $verbose = false;
  $debug = 0;
// END CONFIGS.
include 'lib.php';


print "spN,sampleType,samples,algo,keys,collisions,stackingAvg,occupancyRate,occupancyRate_stddev";

foreach([3,8,80,800] as $sampleLen) // word lenght of each sample (see sampleType)
 for($hashLen=1; $hashLen<=6; $hashLen++) // hash length in hexadecimal digits
  foreach([20,200,600,5000,90000] as $samples_mult) {
	$spN = pow(2,$hashLen*4); //  4bits for hexadecimal digit
	$samples = $samples_mult * $hashLen;
	$samplesMax = pow(122-97,$sampleLen); // see alphabet of randWord_make() 
	if ($samples<$samplesMax && $samples<(0.5*$spN)) {
		$randWord_wasUsed = [''=>1];
		$uglyLabel = ($sampleLen<20)? 'ugly1': 'ugly2';
		$kSpec = [  'crc32'=>[],'md5'=>[],'sha1'=>[],'fake'=>[], $uglyLabel=>[] ]; // key-spectrum of occupancy for each algo
		for($i=0; $i<$samples; $i++) {
			$k = randWord_makeUnique();
			keyInc($kSpec['crc32'], hash_trunc_direct('crc32',$k) );
			keyInc($kSpec['md5'],   hash_trunc_direct('md5',$k)   );
			keyInc($kSpec['sha1'],  hash_trunc_direct('sha1',$k)  );
			keyInc($kSpec['fake'],  dechex(mt_rand(0,$spN))       );
			keyInc($kSpec[$uglyLabel],   ourHash($k) );
		}
		$res = [];

		foreach(array_keys($kSpec) as $algo) {
			$keys = count($kSpec[$algo]); // never 0!
			$collsCount=0;
			$collsSum=0;
			foreach($kSpec[$algo] as $k=>$n) if ($n>1) { $collsCount++; $collsSum+=($n-1); }
			// $collisionsTot = $samples - $keys;  // ... but not is $collsCount?!
			$stackingAvg   = $collsCount? condRound($collsSum/$collsCount): 0; // Medium stacking
			$collisionsAvg = condRound( $collsCount/$keys );
			$occupancyRate = condRound(($collsSum+$keys)/$keys);  // Occupancy rate
			// see "pigeonhole occupancy" in https://en.wikipedia.org/wiki/Pigeonhole_principle
			$occupancyRate_stddev = condRound(  stats_standard_deviation(array_values($kSpec[$algo]),true) );
			print "\n$spN,rand-$sampleLen,$samples,$algo,$keys,$collsCount,$stackingAvg,$occupancyRate,$occupancyRate_stddev";
		}
	} // trunc
  } // for

print "\n";

