<?php

use PHPUnit\Framework\TestCase;
use pStats\BasicStatistics;



class BasicStatisticsTests extends TestCase
{
	/**
	 *  Tests the 'mean' method.
	 */
	public function testMean()
	{
		// Test Case 1
		$data = [1, 2, 3, 5, 10, 0, 0];
		$mean = BasicStatistics::mean($data);
		$this->assertEquals(3, $mean);
		
		// Test Case 2
		$data = [2, 2, 2];
		$mean = BasicStatistics::mean($data);
		$this->assertEquals(2, $mean);
		
		// Test Case 3
		$data = [2, 2, '2'];
		$mean = BasicStatistics::mean($data);
		$this->assertEquals(2, $mean);
	}
	
	
	/**
	 *  Tests the 'BasicStatistics::median' method.
	 */
	public function testMedian()
	{
		// Test Case 1
		$data = [3, 6, 2, 1, 8, 7, 4];
		$median = BasicStatistics::median($data);
		$this->assertEquals(4, $median);
		
		// Test Case 2
		$data = [3, 6, 2, 1, 8, 7, 4, 12];
		$median = BasicStatistics::median($data);
		$this->assertEquals(5, $median);
		
		// Test Case 3
		$data = [3, 6, '2', 1, 8, 7, 4, 12];
		$median = BasicStatistics::median($data);
		$this->assertEquals(5, $median);
		
	}
	
	
	/**
	 *  Tests the 'BasicStatistics::range' method.
	 */
	public function testRange()
	{
		// Test Case 1
		$data = [3, 6, 2, 1, 8, 7, 4];
		$range = BasicStatistics::range($data);
		$this->assertEquals(1, $range->min);
		$this->assertEquals(8, $range->max);
		
		// Test Case 2
		$data = [3, 6, '2', 8, 7, 4, 12];
		$range = BasicStatistics::range($data);
		$this->assertEquals(2, $range->min);
		$this->assertEquals(12, $range->max);
		
		// Test Case 3
		$data = [3, 6, '2', 8, 7, 4, 12];
		$range = BasicStatistics::range($data);
		$this->assertEquals(2, $range->min);
		$this->assertEquals(12, $range->max);
	}
	
	
	/**
	 *  Tests the 'BasicStatistics::mode' method.
	 */
	public function testMode()
	{
		// Test Case 1
		$data = [3, 4, 3, 5, 6, 7, 4, 3];
		$mode = BasicStatistics::mode($data);
		$this->assertEquals(3, $mode->key);
		$this->assertEquals(3, $mode->value);
		
		// Test Case 2
		$data = [3, 4, 4, 5, 4, 7, 4, 3];
		$mode = BasicStatistics::mode($data);
		$this->assertEquals(4, $mode->key);
		$this->assertEquals(4, $mode->value);
	}
	
	
	
	
	
	
	
	/**
	 *  Tet the 'isNumeric' method.
	 */
	public function testIsNumeric()
	{
		$this->assertEquals(null, BasicStatistics::isNumeric(4));
	}
	
	
	/**
	 *  Test the isNumeric method for exception
	 *  for null values
	 */
	public function testNullException()
	{
		// Set the expected exception
		$this->expectException(InvalidArgumentException::class);
		
		$mean = BasicStatistics::isNumeric(null);
	}
	
	
	/**
	 *  Test the isNumeric method for exception
	 *  for non numeric values
	 */
	public function testArgException()
	{
		// Set the expected exception
		$this->expectException(InvalidArgumentException::class);

		$median = BasicStatistics::isNumeric('r');
	}
	
	
	/**
	 *  Test the isNumeric method for exception
	 *  for non numeric values - array
	 */
	public function testArgArrException()
	{
		// Set the expected exception
		$this->expectException(InvalidArgumentException::class);
	
		$median = BasicStatistics::isNumeric([3,4]);
	}
	
	
	/**
	 *  Tests the 'BasicStatistics : percentageChange' method.
	 */
	public function testPercentageChange()
	{
		// Test 1
		$v1 = 5;
		$v2 = 30;
		$change = BasicStatistics::percentageChange($v1, $v2);
		$this->assertEquals(500, $change);
		
		// Test 2
		$v1 = 30;
		$v2 = 5;
		$change = BasicStatistics::percentageChange($v1, $v2);
		$this->assertEquals(-83.33, $change);
	}
	
	
	/**
	 *  Tests the 'BasicStatistics : percentageDifference' method.
	 */
	public function testPercentageDifference()
	{
		// Test 1
		$v1 = 5;
		$v2 = 30;
		$change = BasicStatistics::percentageDifference($v1, $v2);
		$this->assertEquals(142.86, $change);
	
		// Test 2
		$v1 = 90;
		$v2 = 32;
		$change = BasicStatistics::percentageDifference($v1, $v2);
		$this->assertEquals(95.08, $change);
		
		// Test 3
		$v1 = 30;
		$v2 = 5;
		$change = BasicStatistics::percentageDifference($v1, $v2);
		$this->assertEquals(142.86, $change);
	}
	
	
}

?>