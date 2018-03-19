<?php

use Model\StatisticsHits;

/**
 * Test that we can initialize the package
 */
class ModelTest extends \PHPUnit\Framework\TestCase
{
  /** @test */
  function can_instantiate_package()
  {
      $hits = new StatisticsHits;
      $this->assertInstanceOF('Model\Model', $hits);
  }
}
