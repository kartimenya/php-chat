<?php

namespace Chat\Core;

class MessagesStorage
{
	private array $messages;

	public function __construct(){
		$this->createMessagesFile();
		$this->parceFile();
	}

	private function createMessagesFile(){
	    if (!file_exists(MASSAGE_FILE)) {
	        file_put_contents(MASSAGE_FILE, "{}");
	    }
	}

	private function parceFile(){
	    $fileText = file_get_contents(MASSAGE_FILE);
	    $this->messages = json_decode($fileText, true);
	}

	public function getMessages(): array{
	    return $this->messages;
	}

	public function addMessage($message){
	    $this->messages[] = $message;
	}

	public function __destruct(){
		$this->saveMessages();
	}

	public function saveMessages(){
	    file_put_contents(MASSAGE_FILE, json_encode($this->messages)); 
	}
}