<?php
require_once 'models/user/User.php';
class Message
{
    private static $DELETION = "DELETE FROM `message` WHERE `id` = :id";
    private static $FROM_SELECTION = "SELECT * FROM `message` WHERE `id` = :id";
    private static $INSERTION = "INSERT INTO `message` (
            `id`,
            `sender_user_id`,
            `receiver_user_id`,
            `content`,
            `date`
        ) VALUE (
            :id,
            :user_sender,
            :user_receiver,
            :content,
            :datetime
        )";
    private $content;
    private $date;
    private $id;
    private $messages;
    private $user_receiver;
    private $user_sender;

    public static function create($sender, $receiver, $content)
    {
        $id = Database::getRandomId();
        $date = date("Y-m-d H:i:s");
        Database::execute(
            self::$INSERTION,
            array(
                ':id' => $id,
                ':user_sender' => $sender->id(),
                ':user_receiver' => $receiver->id(),
                ':content' => $content,
                ':datetime' => $date
            )
        );
        return new self($id, $sender, $receiver, $content, $date);
    }

    public static function find(User $user, $field='receiver_user_id')
    {
        $messages = array();
        $selected = Database::execute(
            "SELECT * FROM `message` WHERE `$field` = :find_user ORDER BY `date` DESC",
            array(
                ':find_user' => $user->id()
            )
        );
        return self::refine($selected);
    }

    public static function from($id)
    {
        $selected = Database::execute(
            self::$FROM_SELECTION,
            array(
                ':id' => $id
            )
        );

        $messages = self::refine($selected);
        return $messages[0];
    }

    private static function refine($selected)
    {
        $messages = array();
        foreach ($selected as $result) {
            $messages[] = new self(
                $result['id'],
                User::from($result['sender_user_id']),
                User::from($result['receiver_user_id']),
                $result['content'],
                $result['date']
            );
        }
        return $messages;
    }

    private function __construct($id, $sender, $receive, $content, $date)
    {

        $this->content = $content;
        $this->date = $date;
        $this->id = $id;
        $this->receive = $receive;
        $this->sender = $sender;
    }

    public function content()
    {
        return $this->content;
    }

    public function date()
    {
        return $this->date;
    }

    public function delete()
    {
        Database::execute(
            self::$DELETION,
            array(
                ':id' => $this->id()
            )
        );
    }

    public function id()
    {
        return $this->id;
    }

    public function receiver()
    {
        return $this->receive;
    }

    public function sender()
    {
        return $this->sender;
    }
}
