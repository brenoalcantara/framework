<?php
/**
 * DAO
 *
 * @author Breno Alcantara <contato.breno@gmail.com>
 * @copyright 2015 Breno Alcantara
 * @license MIT
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 * @package Dao
 */
namespace Dao;

/**
 * User
 * Classe padrao DAO para persistência dos dados
 *
 * @version 1.0.0
 */
class User extends \Dao {

	/**
	 * Recebe a conexão
	 *
	 * @var string $conn
	 */
	private $conn;

	/**
	 * Inicializa a conexão com o banco
	 *
	 * @param int|null $id
	 * @return void
	 */
	public function __construct($id = null) {
		$this->conn = Connection::getConnection();
	}

	/**
	 * Insere os dados
	 *
	 * @param object User $user
	 * @return int
	 */
	public function insert(User $user) {
		try {
			$this->conn->beginTransaction();

			$this->sql = $this->conn->prepare("INSERT INTO user (".implode(', ', array_keys($this->columnValues)).")
			VALUES (".implode(', ', array_values($this->columnValues)).")");

			$this->sql->execute();

			$lastId = $this->conn->lastInsertId();

			$this->conn->commit();

			return $lastId;

		} catch(PDOException $erro) {
			$this->conn->rollback();
			echo 'Erro: ' . $erro->getMessage();
		}
	}

	/**
	 * Atualiza os dados
	 *
	 * @param object User $user
	 * @param int $id
	 * @return void
	 */
	public function update(User $user, $id) {
		try {

			foreach ($user as $key => $value) {
				
			}

			$this->conn->beginTransaction();

			$sql = $this->conn->prepare("UPDATE user SET email = ?, password = ?, status = ?
			WHERE id = ?");

			$sql->bindValue(1, $user->getEmail(), PDO::PARAM_STR);
			$sql->bindValue(2, $user->getPassword(), PDO::PARAM_STR);
			$sql->bindValue(3, $user->getStatus(), PDO::PARAM_INT);
			$sql->bindValue(4, $id, PDO::PARAM_INT);
			$sql->execute();

			$this->conn->commit();
		} catch(PDOException $erro) {
			$this->conn->rollback();
			echo 'Erro: ' . $erro->getMessage();
		}
	}

	/**
	 * Deleta um registro
	 *
	 * @param object User $user
	 * @param int $id
	 * @return void
	 */
	public function delete(User $user, $id) {
		try {
			$this->conn->beginTransaction();

			$sql = $this->conn->prepare("DELETE FROM user WHERE id = ?");
			$sql->bindValue(1, $id, PDO::PARAM_INT);
			$sql->execute();

			$this->conn->commit();
		} catch(PDOException $erro) {
			$this->conn->rollback();
			echo 'Erro: ' . $erro->getMessage();
		}
	}

	public function query($criteria) {
		$this->sql = "SELECT implode(',', $this->columns) FROM user ";

		if ($criteria) {
			$expression = $criteria->mount();
			if ($expression) {
				$this->sql .= " WHERE $expression ";
			}

			$order = $criteria->getProperty('order');
            $limit = $criteria->getProperty('limit');
            $offset= $criteria->getProperty('offset');

            if ($order) {
                $this->sql .= ' ORDER BY ' . $order;
            }
            if ($limit) {
                $this->sql .= ' LIMIT ' . $limit;
            }
            }
            if ($offset) {
                $this->sql .= ' OFFSET ' . $offset;
            }
		}
	}

	public function __destruct() {
		$this->conn = NULL;
	}
}
