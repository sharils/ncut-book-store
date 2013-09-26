<?php
class Announce
{
    private static $DELETION = "DELETE FROM `announce` WHERE `id` = :id";
    private static $INSERTION = "INSERT INTO `announce` (
            `id`,
            `user_id`,
            `date`,
            `title`,
            `message`

        ) VALUE (
            :id,
            :user_id,
            :m_date,
            :title,
            :message
        )";
    private static $FROM_SELECTION = "SELECT * FROM `announce` WHERE `id` = :id";
    private static $UPDATE = "UPDATE `announce`
        SET `title` = :title,
            `message` = :message
        WHERE `id` = :id ";
;
    private $date;
    private $id
    private $message;
    private $title;

    public static function create(User $user, $title, $message)
    {
        $id = Database::getRandomId();
        $date = date("Y-m-d H:i:s");
        Database::execute(
            self::$INSERTION,
            [
                ':id' => $id,
                ':user_id' => $user->id(),
                ':m_date' => $date,
                ':title' => $title,
                ':message' => $message
            ]
        );
        return new self($id, $date, $title, $meesage);
    }

    public static function from($id)
    {
        $selected = Database::execute(
            self::$FROM_SELECTION,
            [':id' => $id]
        );

        $announces = self::refine($selected);
        return $announces[0];
    }

    private static function refine($selected)
    {
        $announces = array();
        foreach ($selected as $result) {
            $announces[] = new self(
                $result['id'],
                $result['date'],
                $result['title'],
                $result['message']
            );
        }
        return $announces;
    }

    private function __construct($id, $date, $title, $message)
    {
        $this->id = $id;
        $this->date = $date;
        $this->title = $title;
        $this->message = $message;
    }

    public function date()
    {
        return $this->date;
    }

    public function delete()
    {
        Database::execute(
            self::$DELETION,
            [':id' => $this->id]
        );
    }

    public function id()
    {
        return $this->id;
    }

    public function message($message = NULL)
    {
        if ($message === NULL) {
            return $this->message;
        } else {
            return $this->message = $message;
        }
    }

    public function title($title = NULL)
    {
        if ($title === NULL) {
            return $this->title;
        } else {
            return $this->title = $title;
        }
    }

    public function update()
    {
        Database::execute(
            self::$DELETION,
            [
                ':title' => $this->title,
                ':message' => $this->message,
                ':id' => $this->id
            ]
        );
    }
}
