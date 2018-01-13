<?php
namespace Statistics;

interface VisitorInterface
{
    public function save(VisitorDataInterface $data): void;
}
