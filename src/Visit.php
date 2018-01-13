<?php
namespace Statistics;

class Visit
{
    public function __construct()
    {
        $this->checkIfVisitorExisits();
    }

    private function checkIfVisitorExisits(): void
    {
        if (isset($_COOKIE['visitor'])) {
            $this->saveVisit(new ExisitVisitor());
        } else {
            $this->saveVisit(new NewVisitor());
        }
    }

    private function saveVisit(VisitorInterface $visitor): void
    {
        $visitor->save(new VisitorData());
    }
}
