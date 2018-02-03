<?php
namespace Statistics;

use Model\StatisticsUniq;

class ExisitVisitor extends Visitor implements VisitorInterface
{
    public function save(VisitorDataInterface $data): void
    {
        $this->saveHit($data);
        $this->updateUniqueVisitor();
    }

    private function updateUniqueVisitor(): void
    {
        StatisticsUniq::increase('hits', '+1')->where('id', '=', $_COOKIE['visitor'])->save();
    }
}
