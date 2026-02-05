<?php

abstract class Carro {
    protected string $marca;
    protected string $nome;
    protected string $modelo;
    protected int $velocidade = 0;

    public function __construct(string $marca, string $nome, string $modelo) {
        $this->marca  = $marca;
        $this->nome   = $nome;
        $this->modelo = $modelo;
    }

    abstract public function tipo(): string;

    public function andar(): void {
        $this->velocidade += 20;
        echo "{$this->nome} está andando a {$this->velocidade} km/h<br>";
    }

    public function virar(string $lado): void {
        echo "{$this->nome} virou para a {$lado}<br>";
    }

    public function frear(): void {
        $this->velocidade = 0;
        echo "{$this->nome} freou e parou<br>";
    }

    public function info(): void {
        echo "Marca: {$this->marca}<br>";
        echo "Nome: {$this->nome}<br>";
        echo "Modelo: {$this->modelo}<br>";
        echo "Tipo: {$this->tipo()}<br><br>";
    }
}



class CarroPasseio extends Carro {

    public function tipo(): string {
        return "Carro de Passeio";
    }
}

class CarroEsportivo extends Carro {

    public function tipo(): string {
        return "Carro Esportivo";
    }


    public function andar(): void {
        $this->velocidade += 50;
        echo "{$this->nome} acelerou forte! {$this->velocidade} km/h<br>";
    }
}


$gol = new CarroPasseio("Volkswagen", "Gol", "2020");
$ferrari = new CarroEsportivo("Ferrari", "488 GTB", "2022");

$gol->info();
$gol->andar();
$gol->virar("esquerda");
$gol->frear();

echo "<hr>";

$ferrari->info();
$ferrari->andar();
$ferrari->virar("direita");
$ferrari->frear();