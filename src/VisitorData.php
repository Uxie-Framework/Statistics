<?php
namespace Statistics;

class VisitorData implements VisitorDataInterface
{
    private $id;
    private $ip;
    private $currentUrl;
    private $previousUrl;
    private $date;
    private $browser;
    private $os;

    public function __construct()
    {
        $this->id = uniqid(uniqid());
        $this->currentUrl = $this->setCurrentUrl();
        $this->previousUrl = $this->setPreviousUrl();
        $this->ip = $this->setIp();
        $this->setSystemDetails();
        $this->date = date('y/m/d H:i:s');
    }

    private function setCurrentUrl(): string
    {
        return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    private function setPreviousUrl(): string
    {
        return (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : '';
    }

    private function setIp(): string
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    private function setSystemDetails(): void
    {
        $data = explode(' ', $_SERVER['HTTP_USER_AGENT']);
        $this->browser = $data[0];
        $this->os = $data[1];
    }

    public function getCurrentUrl(): string
    {
        return $this->currentUrl;
    }

    public function getPreviousUrl(): string
    {
        return $this->previousUrl;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function getBrowser(): string
    {
        return $this->browser;
    }

    public function getOs(): string
    {
        return $this->os;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getDate(): string
    {
        return $this->date;
    }
}
