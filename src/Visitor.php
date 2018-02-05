<?php

namespace Statistics;

use Model\StatisticsHits;

abstract class Visitor
{
    protected function saveHit(VisitorDataInterface $data): void
    {
        StatisticsHits::insert(['id', 'ip', 'browser', 'Os', 'previousurl', 'currenturl', 'date', 'memory'], [
            $data->getId(),
            $data->getIp(),
            $data->getBrowser(),
            $data->getOs(),
            $data->getPreviousUrl(),
            $data->getCurrentUrl(),
            $data->getDate(),
            $data->getMemoryUsage(),
        ])
        ->save();
    }
}