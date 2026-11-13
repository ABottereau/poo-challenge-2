<?php
require_once 'Vehicle.php';

class Car extends Vehicle{

    public const ALLOWED_ENERGIES = ['fuel', 'electric'];

    protected int $nbWheels;
    protected int $currentSpeed;
    protected string $color;
    protected int $nbSeats;
    protected string $energy;
    protected int $energyLevel;
    protected bool $isStart;

    public function __construct(int $nbWheels, string $color, int $nbSeats, string $energy) {

        parent::__construct($color, $nbSeats);
        $this->nbWheels = $nbWheels;
        $this->setEnergy($energy);
        $this->energyLevel = 100;
        $this->isStart = false;
    }

    public function start(): string {
        if ($this->energyLevel > 0) {
            if ($this->isStart === false) {
                $this->isStart = true;
                return "La voiture démarre.";
            } else return "La voiture est déjà démarrée.";
        } else return "La voiture ne peut pas démarrer, il n'y a plus d'énergie.";
    }

    public function forward(): string {
        if ($this->energyLevel > 0) {
            if ($this->isStart === true) {
                $this->currentSpeed = 15;
                $this->energyLevel = $this->energyLevel - 1;
                return "Go !";   
            } else return "La voiture n'est pas démarrée.";
        } else return "La voiture n'a plus dénergie";
    }

    public function brake(): string {
        $sentence = "";
        while ($this->currentSpeed > 0) {
            $this->currentSpeed--;
            $sentence .= "Brake !!!";
        }
        $sentence .= "I'm stopped !";
        return $sentence;
    }



    public function getEnergy(): string {
        return $this->energy;
    }

    public function setEnergy(string $energy): Car {
        if (i_array($energy, self::ALLOWED_ENERGIES)) {
            $this->energy = $energy;
        }
        return $this;
    }

    public function getEnergyLevel(): int {
        return $this->energyLevel;
    }

    public function setEnergyLevel(int $energyLevel): void {
        if ($energyLevel >= 0){
            $this->energyLevel = $energyLevel;
        }
    }

    public function setIsStart(bool $isStart): void {
        $this->isStart = true;
    }

    public function getIsStart (bool $isStart): string {
        if ($this->isStart === true) {
            return "La voiture est démarrée.";
        } else return "La voiture n'est pas démarrée.";
    }
}