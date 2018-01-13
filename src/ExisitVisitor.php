<?php
namespace Statistics;

use Model\Model;
use Model\StatisticsHits;
use Model\StatisticsUniq;

class ExisitVisitor implements VisitorInterface
{
    public function save(VisitorDataInterface $data): void
    {
        $this->saveHit($data);
        $this->updateUniqueVisitor();
    }

    private function saveHit(VisitorDataInterface $data): void
    {
        StatisticsHits::insert(['id', 'ip', 'browser', 'Os', 'previousurl', 'currenturl', 'date'], [
            $data->getId(),
            $data->getIp(),
            $data->getBrowser(),
            $data->getOs(),
            $data->getPreviousUrl(),
            $data->getCurrentUrl(),
            $data->getDate(),
        ])
        ->save();
    }

    private function updateUniqueVisitor(): void
    {
        StatisticsUniq::increase('hits', '+1')->where('id', '=', $_COOKIE['visitor'])->save();
    }
}
