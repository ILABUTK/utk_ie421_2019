<?php


$app->get('/api/company', function ($request, $response, $args) {  //GET example

    $pdo =$this->pdo;
    $selectStatement = $pdo->select()
                            ->from('crud_company');
	$stmt = $selectStatement->execute();
	$company= $stmt->fetchAll();

	$res['success'] = true;
	$res['data'] = $company;
	$response->write(json_encode($res));
	$pdo = null;
	return $response;
});

$app->post('/api/company', function ($request, $response, $args) { //POST example

 	$pdo =$this->pdo;
	$params = $request->getParsedBody();
	$name = $params['name'];
	$address = $params['address'];
    $phone = $params['phone'];

    $insertStatement = $pdo->insert(array( 'name', 'address', 'phone' ))
								->into('crud_company')
								->values(array($name, $address, $phone));
    $insert =  $insertStatement->execute();

	$res['status'] = 'success';
	$response->write(json_encode($res));
	$pdo = null;
	return $response;
});

?>
