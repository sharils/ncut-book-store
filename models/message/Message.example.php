<?php
require_once 'models/user/User.php';

class Message
{
    private static $DELETION = <<<'SQL'
DELETE FROM `message`
WHERE `id` = :id;
SQL;

    private static $ID_SELECTION = <<<'SQL'
SELECT *
FROM `message`
WHERE `id` = :id;
SQL;

    private static $INSERTION = <<<'SQL'
INSERT INTO `message` (
    `id`,
    `sender_user_id`,
    `receiver_user_id`,
    `content_user_id`
) VALUE (
    :id,
    :sender_user_id,
    :receiver_user_id,
    :content_user_id
);
SQL;

    private static $SENDER_SELECTION = <<<'SQL'
SELECT *
FROM `message`
WHERE `sender_user_id` = :user_sender;
SQL;

    private $content;
    private $id;
    private $messages;
    private $receiver;
    private $sender;

    public static function create(User $sender, User $receiver, $content)
    {
        $id = Database::getRandomId();

        $message = new self($id, $sender, $receiver, $content);

        Database::execute(
            self::$INSERTION,
            array(
                ':id' => $id,
                ':user_sender' => $sender->id(),
                ':user_receiver' => $receiver->id(),
                ':content' => $content
            )
        );

        return $message;
    }

    public static function find(User $sender)
    {
        $raw_messages = Database::execute(
            self::$SENDER_SELECTION,
            array(
                ':user_sender' => $user_sender->id()
            )
        );

        return self::refine($raw_messages);
    }

    public static function from($id)
    {
        $raw_messages = Database::execute(
            self::$ID_SELECTION,
            array(
                ':id' => $id
            )
        );

        $messages = self::refine($raw_messages);

        return $messages[0];
    }

    private static function refine(array $raw_messages)
    {
        $messages = array();

        foreach ($raw_messages as $raw_message) {
            $sender = User::from($raw_message['sender_user_id']);
            $receiver = User::from($raw_message['receiver_user_id']);

            $messages[] = new self(
                $raw_message['id'],
                $sender,
                $receiver,
                $raw_message['content']
            );
        }

        return $messages;
    }

    private function __construct($id, User $sender, User $receiver, $content)
    {
        $this->content = $content;
        $this->id = $id;
        $this->receiver = $receiver;
        $this->sender = $sender;
    }

    public function content()
    {
        return $this->content;
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
        return $this->receiver;
    }

    public function sender()
    {
        return $this->sender;
    }
}
