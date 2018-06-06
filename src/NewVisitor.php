<?php
namespace Statistics;

use Model\StatisticsUniq;

class NewVisitor extends Visitor implements VisitorInterface
{
    public function save(VisitorDataInterface $data): void
    {
        $this->setCookie($data);
        $this->saveHit($data);
        $this->saveUniqueVisitor($data);
    }

    private function saveUniqueVisitor(VisitorDataInterface $data): void
    {
        StatisticsUniq::insert([
          'id'   => $data->getId(),
          'hits' => 1,
        ])->save();
    }

    private function setCookie(VisitorDataInterface $data): void
    {
        cookie('visitor', $data->getId(), time()+3600*30*12);
    }
}
