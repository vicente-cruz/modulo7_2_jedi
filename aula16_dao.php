<?php

/**
 * DAO - Data Access Object: Manipulação de dados do BD, somente por objetos.
 */

class Database
{
    protected $db;
    
    public function __construct() {
        try {
            $this->db = new PDO("mysql:dbname=curso_php;host=localhost","root","");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

class UsuarioDAO extends Database
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get($fields = array(), $where = array())
    {
        $usuarios = array();
        $valores = array();
        
        if (count($fields) == 0) {
            $fields = array('*');
        }
        
        $sql = "SELECT ".implode(',', $fields)." FROM usuarios ";
        
        if (count($where) > 0) {
            $tabelas = array_keys($where);
            $valores = array_values($where);
            $comp = array();
            
            foreach ($tabelas as $tabela) {
                $comp[] = $tabela." = ?";
            }
            
            $sql .= implode(" AND ", $comp);
        }
        
        $query = $this->db->prepare($sql);
        $query->execute($valores);
        
        if ($query->rowCount() > 0) {
            foreach($query->fetchAll() as $item) {
                $usuarios[] = new Usuario($item);
            }
        }
        
        return $usuarios;
    }
    
    public function insert(Usuario $usuario)
    {
        $fields = array(
            "nome" => $usuario->getNome(),
            "email" => $usuario->getEmail(),
            "senha" => $usuario->getSenha()
        );
        
        if (count($fields) > 0) {
            $questions = array();
            for ($q=0; $q<count(array_keys($fields)); $q++) {
                $questions[] = '?';
            }
            
            $sql = "INSERT INTO"
                    . " usuarios(".implode(",",array_keys($fields)).")"
                    . " VALUES (".implode(',', $questions).") ";
            
            $query = $this->db->prepare($sql);
            $query->execute(array_values($fields));
        }
    }
}

class Usuario
{
    private $nome;
    private $email;
    private $senha;
    private $id;
    
    public function __construct($dados)
    {
        $this->nome = ((isset($dados['nome'])) ? $dados['nome'] : "");
        $this->email = ((isset($dados['email'])) ? $dados['email'] : "");
        $this->senha = ((isset($dados['senha'])) ? $dados['senha'] : "");
        $this->id = ((isset($dados['id'])) ? $dados['id'] : "");
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getId() {
        return $this->id;
    }
    
    public function getSenha() {
        return $this->senha;
    }
}

//$usuario = new Usuario(array(
//    'nome' => 'Vicente',
//    'email' => 'vicente@email.com',
//    'senha' => md5('123'),
//    'id' => 1
//));
$usuarioDAO = new UsuarioDAO();

$usuarioNovo = new Usuario(array(
    "nome" => "usuario DAO por objeto",
    "senha" => md5(123),
    "email" => "usuarioDAOObjeto@email.com"
));

$usuarioDAO->insert($usuarioNovo);


$usuarios = $usuarioDAO->get();

foreach ($usuarios as $usuario) {
    echo "NOME: ".$usuario->getNome();
    echo "<hr/>";
}