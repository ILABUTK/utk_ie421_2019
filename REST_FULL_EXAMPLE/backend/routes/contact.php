<?php

// <!-- CREATE TABLE `rzhou7`.`contact` (
//   `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
//   `update_time` TIMESTAMP NULL,
//   `id` INT NOT NULL AUTO_INCREMENT,
//   `name` VARCHAR(45) NOT NULL,
//   `email` VARCHAR(45) NOT NULL,
//   `subject` VARCHAR(45) NULL,
//   `message` VARCHAR(45) NULL,
//   PRIMARY KEY (`id`)); -->

$app->get('/api/contact', function ($request, $response, $args) {  //GET example

    $pdo =$this->pdo;
    $selectStatement = $pdo->select()
                            ->from('contact');
	$stmt = $selectStatement->execute();
	$contacts= $stmt->fetchAll();

	$res['success'] = true;
	$res['data'] = $contacts;
	$response->write(json_encode($res));
	$pdo = null;
	return $response;
});

// demo of insert
$app->post('/api/contact', function ($request, $response, $args) { //POST example

 	$pdo =$this->pdo;
	$params = $request->getParsedBody();
	$name = $params['name'];
	$email = $params['email'];
    $subject = $params['subject'];
    $message = $params['message'];

    $insertStatement = $pdo->insert(array( 'name', 'email', 'subject', 'message' ))
								->into('contact')
								->values(array($name, $email, $subject, $message));
    $insert =  $insertStatement->execute();

	$res['insert'] = $insert; // id of the record
	$res['status'] = 'success';
	$response->write(json_encode($res));
	$pdo = null;
	return $response;
});

// demo of delete
$app->post('/api/delete_contact', function ($request, $response, $args) { //POST example

	$pdo =$this->pdo;
   $params = $request->getParsedBody();
   $id = $params['id'];

   $deleteStatement = $pdo->delete()
						->from('contact')
						->where('id', '=', $id);
   $delete =  $deleteStatement->execute();

   $res['delete'] = $delete; // no of rows affected

   $res['status'] = 'success';
   $response->write(json_encode($res));
   
   $pdo = null;
   return $response;
});

?>
