<?php
$app->get('/api/customers', function ($request, $response, $args) {  //GET example

    $pdo =$this->pdo;
    $selectStatement = $pdo->select()
                            ->from('customer');
	$stmt = $selectStatement->execute();
	$customers = $stmt->fetchAll();

	$res['success'] = true;
	$res['data'] = $customers;
	$response->write(json_encode($res));
	$pdo = null;
	return $response;
});

$app->post('/api/customers', function ($request, $response, $args) { //POST example

 	$pdo =$this->pdo;
	$params = $request->getParsedBody();
	$customer_name = $params['customer_name'];
	$customer_street = $params['customer_street'];
	$customer_city = $params['customer_city'];

    // $icon = '';
	// $files = $request->getUploadedFiles();
	// if (!empty($files['icon'])) {
	// 	$newfile = $files['icon'];
	// 	if ($newfile->getError() === UPLOAD_ERR_OK) {
	// 		$newName = str_replace(' ','', $newfile->getClientFilename());
	// 		$uploadFileName = md5($newName. time()).'.'.pathinfo($newName, PATHINFO_EXTENSION);
	// 		$newfile->moveTo("./uploads/icons/$uploadFileName");
	// 		$icon = $uploadFileName;
	// 	}
	// }

    $insertStatement = $pdo->insert(array( 'customer_name', 'customer_street', 'customer_city' ))
								->into('customer')
								->values(array($customer_name, $customer_street, $customer_city));
    $insert =  $insertStatement->execute();

	$res['success'] = "success";
	$response->write(json_encode($res));
	$pdo = null;
	return $response;
});

?>
