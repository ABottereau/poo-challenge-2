<?php

require_once 'Car.php';

class Truck extends Var {
    private int $loadCapacity;
    private int $loadingStatus = 0;

    public function __construct(int $nbWheels, string $color, int $nbSeats, string $energy, int $loadCapacity) {
        parent::__construct($nbWheels, $color, $nbSeats, $energy);
        $this->loadCapacity = $loadCapacity;
    }

    public function getLoadCapacity(): int
    {
        return $this->loadCapacity;
    }

    public function setLoadCapacity(int $loadCapacity): void
    {
        $this->loadCapacity = $loadCapacity;
    }

    public function getLoadingStatus(): string
    {
        if ($this->loadingStatus < $this->loadCapacity) {
            return 'in filling';
        } else return 'full';
    }

    public function setLoadingStatus(int $loadingStatus): void
    {
        if ($loadingStatus <= $this->loadCapacity) {
            $this->loadingStatus = $loadingStatus
        }
    }

}