<?php
class User
{

    public const ADMIN = 'ADMIN';
    public const MANAGER = 'MANAGER';
    public const CLIENT = 'CLIENT';

    public static function instance($array)
    {
        $user = new User;
        $user->id = $array['id'];
        $user->type = $array['type'];
        $user->firstname = $array['firstname'];
        $user->lastname = $array['lastname'];
        $user->email = $array['email'];
        $user->password = $array['password'];

        return $user;
    }

    public static function all(PDO $conn)
    {
        $statement = $conn->prepare('SELECT *  FROM users WHERE NOT `type`="ADMIN"');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, User::class);
    }
    public static function findByid(PDO $conn, int $id) 
    {
        $sql = 'SELECT * FROM users WHERE id = :id';

        $statement = $conn->prepare($sql);
        $statement->execute([
            'id' => $id
        ]);

        return $statement->fetchObject(get_called_class());
    }

    public static function clients(PDO $conn) {
        $statement = $conn->prepare('SELECT *  FROM users WHERE `type`="CLIENT"');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, User::class);
    }

    public static function create(PDO $conn, UserRequest $request)
    {
        $sql = 'INSERT INTO users(type, firstname, lastname, email, password)
                         VALUES (:type, :firstname, :lastname, :email, :password)';

        $statement = $conn->prepare($sql);
        $statement->execute($request->toArray());

        return User::instance(array_merge(
            ['id' => $conn->lastInsertId()],
            $request->toArray()
        ));
    }

    public static function update(PDO $conn, UserRequest $request, int $id)
    {
        $sql = "UPDATE users SET firstname=:firstname, lastname=:lastname,type=:type, email=:email WHERE id=:id";
        $statement = $conn->prepare($sql);
        $statement->execute(
            array_merge(
                ['id' => $id],
                $request->updateUser()
            )
        );

        return $statement->rowCount();
    }

    public static function deleteById(PDO $conn, int $id)   
    {
        $sql = "DELETE FROM users WHERE id=:id";
        $statement = $conn->prepare($sql);
        $statement->execute([
            'id' => $id
        ]);

        return $statement->rowCount();
    }

    public static function login(PDO $conn, UserRequest $request)
    {

        $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';

        $statement = $conn->prepare($sql);
        $statement->execute($request->getCredentials());

        return $statement->fetchObject('User');
    }

    public static function checkEmailDuplicate(PDO $conn, $email)
    {
        $sql = "SELECT email FROM users WHERE email=:email";

        $statement = $conn->prepare($sql);
        $statement->execute([
            'email' => $email
        ]);

        return $statement->rowCount();
    }

    public static function countUsers(PDO $conn)
    {
        $sql = "SELECT email FROM users WHERE user_type='user'";

        $statement = $conn->prepare($sql);
        $statement->execute();

        return $statement->rowCount();
    }
}
