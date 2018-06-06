<?php

namespace Statistics;

use Model\StatisticsHits;

abstract class Visitor
{
    protected function saveHit(VisitorDataInterface $data): void{
      StatisticsHits::insert([
          'id'          => $data->getId(),
          'ip'          => $data->getIp(),
          'browser'     => $data->getBrowser(),
          'Os'          => $data->getOs(),
          'previousurl' => $data->getPreviousUrl(),
          'currenturl'  => $data->getCurrentUrl(),
          'date'        => $data->getDate(),
          'memory'      => $data->getMemoryUsage(),
        ])->save();
    }
}
