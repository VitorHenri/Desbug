<?php
  namespace App\Model\Entity;

  use \PDO;
  use App\Db\Database;

  Class User {
    public $id; 
    public $nickname;
    public $username;
    public $email;
    public $password;
    public $birthDate;
    public $image;

    // método responsável por inserir usuários no banco
    public function insert(){

      echo "<pre>";
        print_r($this);
      echo "</pre>"; exit;
      // insere usuário no banco de dados
      $this->id = (new Database('tb_usuario'))->insert([
        'nm_nickname'     => $this->nickname,
        'nm_usuario'      => $this->username,
        'ds_email'        => $this->email,
        'ds_senha'        => $this->password,
        'dt_nascimento'   => $this->birthDate,
        'img_usuario'     => $this->image
      ]);

      // retornar sucesso
      return true;
    }

    // método responsável por atualizar registros no banco de dados
    public function update(){
      $objDatabase = new Database('tb_usuario');
      $objDatabase->update('id_usuario = '.$this->id, [
        'nm_nickname'     => $this->nickname,
        'nm_usuario'      => $this->username,
        'ds_email'        => $this->email,
        'ds_senha'        => $this->password,
        'dt_nascimento'   => $this->birthDate,
        'img_usuario'     => $this->image
      ]);
    }

    // método responsável por obter os usuários do banco 
    public static function get($where = null, $order = null, $limit = null){
      $objDatabase = new Database('tb_usuario');
      return $objDatabase->select($where, $order, $limit)
                         ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    // método responsável por obter os usuários filtrados por email
    public static function getByEmail($email, $order = null, $limit = null){
      $objDatabase = new Database('tb_usuario');
      return $objDatabase->select('ds_email = '.$email, $order, $limit)
                         ->fetchObject(self::class);
    }

    // método responsável por obter os usuários filtrados por acesso
    public static function getByLogin($email, $password, $order = null, $limit = null){
      $objDatabase = new Database('tb_usuario');
      return $objDatabase->select('ds_email = '.$email.' ds_senha = '.$password, $order, $limit)
                         ->fetchObject(self::class);
    }
  }
?>