<?php


class MessagesStorage
{
	public function __construct(){
		$this->createMessagesFile();
	}

	private function createMessagesFile(){
	    if (!file_exists(MASSAGE_FILE)) {
	        file_put_contents(MASSAGE_FILE, "{}");
	    }
	}

	public function getMessagesFromFile(): array{
	    $fileText = file_get_contents(MASSAGE_FILE);
	    $messagesArray = json_decode($fileText, true);

	    return $messagesArray;
	}

	public function setMessagesToFile($messagesArray){
	    file_put_contents(MASSAGE_FILE, json_encode($messagesArray)); 
	}
}