<?php
namespace Statistics;

use Model\Model;

class ExisitVisitor implements VisitorInterface
{
    public function save(VisitorDataInterface $data): void
    {
        $this->saveHit($data);
        $this->updateUniqueVisitor($data);
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

    private function updateUniqueVisitor(VisitorDataInterface $data): void
    {
        //
    }
}
