<?php

namespace App\Entity;

use App\Repository\TransferRepository;
use Doctrine\ORM\Mapping as ORM;

class Transfer
{
    private $id;
    private $amount;
    private Account $transmitter;
    private $receiver;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getTransmitter(): ?Account
    {
        return $this->transmitter;
    }

    public function setTransmitter(Account $transmitter): self
    {
        $this->transmitter = $transmitter;

        return $this;
    }

    public function getReceiver(): ?string
    {
        return $this->receiver;
    }

    public function setReceiver(string $receiver): self
    {
        $this->receiver = $receiver;

        return $this;
    }
}
