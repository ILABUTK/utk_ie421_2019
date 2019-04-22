<?php
$app->post('/api/profile', function ($request, $response, $args) { //POST example
    $pdo =$this->pdo;
    $params = $request->getParsedBody();
	$email = $params['email'];

    $selectStatement = $pdo->select()
                            ->from('users')
                            ->where('email', '=', $email);

    $stmt = $selectStatement->execute();
    $profile = $stmt->fetchAll();
    
    $res['profile'] = $profile;

    if ($stmt->rowCount() >0)
        $res['status'] = true;
    else
        $res['status'] = false;

	// $res['data'] = $stmt->fetchAll();
    $response->write(json_encode($res));
    
	$pdo = null;
    return $response;
});

?>
