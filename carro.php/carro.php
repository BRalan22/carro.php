<?php

// 1. Classe Pai (Superclasse)
abstract class Veiculo {
    public string $marca;          // Acesso total
    protected string $modelo;      // Acesso na classe e nos filhos
    private string $chassi;        // Acesso RESTRITO a esta classe

    public function __construct(string $marca, string $modelo, string $chassi) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->chassi = $chassi;
    }

    // Método abstrato que as filhas DEVEM implementar
    abstract public function categoria(): string;

    // Método público que utiliza o dado privado internamente
    public function validarDocumentacao(): void {
        echo "Validando chassi: {$this->chassi}... [OK]<br>";
    }
}

// 2. Classe Filha
class Carro extends Veiculo {
    protected int $velocidade = 0;

    public function categoria(): string {
        return "Veículo de Passeio";
    }

    public function acelerar(): void {
        $this->velocidade += 10;
        // Conseguimos acessar $this->modelo porque é protected
        echo "O {$this->modelo} acelerou para {$this->velocidade} km/h.<br>";
    }
}

// --- INSTÂNCIA DO OBJETO ---

// 3. Objeto específico: Fiesta
$fiesta = new Carro("Ford", "Fiesta ST", "9BR123456789");

// Executando as ações
$fiesta->validarDocumentacao(); // Chama método do pai que lê o private
echo "Marca: " . $fiesta->marca . "<br>"; // Public funciona
echo "Categoria: " . $fiesta->categoria() . "<br>";
$fiesta->acelerar();

echo "<hr>";

/* NOTAS SOBRE OS MODIFICADORES USADOS:
  - public $marca: Pode ser lido aqui fora.
  - protected $modelo: O 'Carro' usa, mas se tentarmos echo $fiesta->modelo aqui fora, dá erro.
  - private $chassi: Só a classe 'Veiculo' mexe. Nem o 'Carro' nem nós aqui fora vemos.
*/
?>