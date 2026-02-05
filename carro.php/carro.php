<?php

// 1. A Classe Pai (Superclasse)
class Veiculo {
    // Acessível de qualquer lugar
    public $marca;

    // Acessível apenas dentro desta classe e pelas classes filhas (Herança)
    protected $tipoCombustivel;

    // Acessível APENAS dentro desta classe
    private $numeroChassi;

    public function __construct($marca, $combustivel, $chassi) {
        $this->marca = $marca;
        $this->tipoCombustivel = $combustivel;
        $this->numeroChassi = $chassi;
    }

    protected function emitirSom() {
        return "O veículo está ligado.";
    }
}

// 2. A Classe Filha (Subclasse)
class Carro extends Veiculo {
    public $modelo;

    public function __construct($marca, $modelo, $combustivel, $chassi) {
        // Chama o construtor da classe pai
        parent::__construct($marca, $combustivel, $chassi);
        $this->modelo = $modelo;
    }

    public function exibirDetalhes() {
        echo "### Detalhes do Carro ###\n";
        echo "Marca: {$this->marca}\n"; // Funciona (Public)
        echo "Modelo: {$this->modelo}\n"; // Funciona (Public da própria classe)
        echo "Combustível: {$this->tipoCombustivel}\n"; // Funciona (Protected)
        
        // echo "Chassi: {$this->numeroChassi}\n"; 
        // O código acima geraria um ERRO, pois numeroChassi é PRIVATE na classe pai.
        
        echo "Status: " . $this->emitirSom() . "\n"; // Funciona (Método Protected)
    }
}

// 3. O Objeto (Instância)
$fiesta = new Carro("Ford", "Fiesta", "Flex", "9BR-123456");

// Testando o acesso externo
$fiesta->exibirDetalhes();

echo "\nAcesso direto via objeto:\n";
echo "Marca: " . $fiesta->marca . "\n"; // OK!
// echo $fiesta->tipoCombustivel; // ERRO! Não pode acessar Protected fora da classe.
?>