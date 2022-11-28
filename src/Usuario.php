<?php

class Usuario
{
    protected static string $tabla = 'usuarios';

    public $id;
    public $usuarios;

    public function __construct(array $campos)
    {
        $this->tabla = 'usuario';
        $this->id = $campos['id'];
        $this->usuario = $campos['usuario'];
    }

    public function es_admin(): bool
    {
        return $this->usario == 'admin';
    }

    public static function esta_logueado(): bool
    {
        return isset($_SESSION['login']);
    }

    public static function logueado(): ?static
    {
        return isset($_SESSION['login']) ? unserialize($_SESSION['login']) : null;
    }

    public static function comprobar($login, $password, ?PDO $pdo = null)
    {
        $pdo = $pdo ?? conectar();
        $sent = $pdo->prepare('SELECT *
                    FROM usuarios
                    WHERE usuario = :login');
        $sent->execute([':login' => $login]);
        $fila = $sent->fetch(PDO::FETCH_ASSOC);

        if ($fila === false) {
            return false;
        }

        return password_verify($password, $fila['password'])
            ? new static($fila)
            : false;
    }
}
