# Exercise

Write a function that determines whether a set of cards in a list represents a poker straight (5
letters with consecutive values) or not.
The cards always have values ​​between 2 and 14, where 14 is the AS.
Keep in mind that the AS also counts as 1.
The number of cards may vary, but never exceeds 7.

Examples:

    straight: 14-2-3-4-5
    straight: 9-10-11-12-13
    straight: 2-7-8-5-10-9-11
    not straight: 7-8-12-13-14

The function must validate a test case similar to this:

    class Poker extends TestCase
    {
		public function testAlgorithm()
		{
			$results1 = isStraight([2, 3, 4 ,5, 6]);
			$this->assertEquals($results1, true, "2, 3, 4 ,5, 6");
			$results2 = isStraight([14, 5, 4 ,2, 3]);
			$this->assertEquals($results2, true, "14, 5, 4 ,2, 3");
			$results3 = isStraight([7, 7, 12 ,11, 3, 4, 14]);
			$this->assertEquals($results3, false, "7, 7, 12 ,11, 3, 4, 14");
			$results4 = isStraight([7, 3, 2]);
			$this->assertEquals($results4, false, "7, 3, 2");
		}
    }



