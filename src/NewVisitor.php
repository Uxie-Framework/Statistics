<?php
namespace Statistics;

use Model\Model;
use Model\StatisticsHits;
use Model\StatisticsUniq;

class NewVisitor implements VisitorInterface
{
    public function save(VisitorDataInterface $data): void
    {
        $this->setCookie($data);
        $this->saveHit($data);
        $this->saveUniqueVisitor($data);
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

    private function saveUniqueVisitor(VisitorDataInterface $data): void
    {
        StatisticsUniq::insert(['id', 'hits'], [$data->getId(), 1])->save();
    }

    private function setCookie(VisitorDataInterface $data): void
    {
        setcookie('visitor', $data->getId(), time()+3600*30*12);
    }
}
