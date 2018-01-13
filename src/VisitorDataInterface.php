<?php
namespace Statistics;

interface VisitorDataInterface
{
    public function getIp(): string;
    public function getOs(): string;
    public function getBrowser(): string;
    public function getCurrentUrl(): string;
    public function getPreviousUrl(): string;
    public function getDate(): string;
    public function getId(): string;
}
