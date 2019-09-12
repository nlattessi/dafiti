<?php
declare(strict_types = 1);

use PHPUnit\Framework\TestCase;

function isStraight(array $elements) : bool
{
	$cards = array_unique($elements);
	sort($cards);

	if (count($cards) < 5) {
		return false;
	}

	$lastIndexToCompare = 4;
	$diffInValueForComparision = 4;

	// En el caso de tener como primer elemento al 2 y como ultimo al 14
	// asumo al 14 como el 1 y cambio los valores de último elemento a comparar
	// y la diferencia ("avanzo" un elemento en la lista)
	if (($cards[0] === 2) && (end($cards) === 14)) {
		$lastIndexToCompare = 3;
		$diffInValueForComparision = 3;
	}

	// Si el ultimo elemento de la posible escalera es igual al primero más la diferencia para
	// llegar a el, hay escalera
	if ($cards[$lastIndexToCompare] === ($cards[0] + $diffInValueForComparision)) {
		return true;
	}

	// De no haber escalera, elimino el primer elemento del array
	// y vuelvo a probar recursivamente con los restantes
	array_shift($cards);
	return isStraight($cards);
}

class PokerTest extends TestCase
{
	public function testAlgorithm()
	{
		$results1 = isStraight([2, 3, 4, 5, 6]);
		$this->assertEquals($results1, true, "2, 3, 4, 5, 6");

		$results2 = isStraight([14, 5, 4, 2, 3]);
		$this->assertEquals($results2, true, "14, 5, 4, 2, 3");

		$results3 = isStraight([7, 7, 12, 11, 3, 4, 14]);
		$this->assertEquals($results3, false, "7, 7, 12, 11, 3, 4, 14");

		$results4 = isStraight([7, 3, 2]);
		$this->assertEquals($results4, false, "7, 3, 2");
	}

	public function testAlgorithmWithExamples()
	{
		$example1 = isStraight([14, 2, 3, 4, 5]);
		$this->assertEquals($example1, true, "14, 2, 3, 4, 5");

		$example2 = isStraight([9, 10, 11, 12, 13]);
		$this->assertEquals($example2, true, "9, 10, 11, 12, 13");

		$example3 = isStraight([2, 7, 8, 5, 10, 9, 11]);
		$this->assertEquals($example3, true, "2, 7, 8, 5, 10, 9, 11");

		$example4 = isStraight([7, 8, 12, 13, 14]);
		$this->assertEquals($example4, false, "7, 8, 12, 13, 14");
	}
}
