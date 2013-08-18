<?php
require_once 'User.php';

class Message
{
	private $content;
	private $id;
	private $messages;
	private $user_receiver;
	private $user_sender;

	public static function create($user_sender, $user_receiver, $content)
	{
		$message = new self();

		$id = time();
		Database::execute(
			" INSERT INTO message(id, sender_user_id, receiver_user_id, content)
			VALUE (:id, :user_sender, :user_receiver, :content )",
			array(
				':id' => $id,
				':user_sender' => $user_sender->id(),
				':user_receiver' => $user_receiver->id(),
				':content' => $content
			)
		);
		$message->save($id, $user_sender->id(), $user_receiver->id(), $content);
		return $message;
	}

	public static function find($user_sender)
	{
		$messages = array();
		$selected = Database::execute(
			" SELECT * FROM message WHERE sender_user_id = :user_sender ",
			array(
				':user_sender' => $user_sender->id()
			)
		);

		foreach ($selected as $result) {
			$message = new self();
			$messages[] = $message;
			$message->save(
				$result['id'],
				$result['sender_user_id'],
				$result['receiver_user_id'],
				$result['content']
			);
		}
		return $messages;
	}

	public static function from($id)
	{
		$message = new self();
		$selected = Database::execute(
			" SELECT * FROM message WHERE id = :id ",
			array(
				':id' => $id
			)
		);

		foreach ($selected as $result) {
			$message->save(
				$result['id'],
				$result['sender_user_id'],
				$result['receiver_user_id'],
				$result['content']
			);
		}
		return $message;
	}

	public function content()
	{
		return $this->content;
	}

	public function delete()
	{
		Database::execute(
			" DELETE FROM message WHERE id = :id ",
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
		return User::from($this->receive);
	}

	private function save($id, $receive, $sender, $content)
	{
		$this->id = $id;
		$this->receive = $receive;
		$this->sender = $sender;
		$this->content = $content;
	}

	public function sender()
	{
		return User::from($this->sender);
	}
}