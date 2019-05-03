<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\UploadedFile;


$app->post('/api/upload', function ($request, $response, $args) { //POST example

    //$directory = __DIR__ . '/uploads';

    $directory = '/Users/xli27/GitHub/utk_ie421_2019/Q4_Solution_BF/uploads';
    ///Users/Utk1Lee/GitHub/utk_ie421_2019/Q4_Solution_BF

    $uploadedFiles = $request->getUploadedFiles();

    // handle single input with single file upload
    $uploadedFile = $uploadedFiles['example1'];
    if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
        $filename = moveUploadedFile($directory, $uploadedFile);
        $response->write('uploaded ' . $filename . '<br/>');
    }


    // // handle multiple inputs with the same key
    // foreach ($uploadedFiles['example2'] as $uploadedFile) {
    //     if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
    //         $filename = moveUploadedFile($directory, $uploadedFile);
    //         $response->write('uploaded ' . $filename . '<br/>');
    //     }
    // }

    // // handle single input with multiple file uploads
    // foreach ($uploadedFiles['example3'] as $uploadedFile) {
    //     if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
    //         $filename = moveUploadedFile($directory, $uploadedFile);
    //         $response->write('uploaded ' . $filename . '<br/>');
    //     }
    // }

	$res['status'] = 'success';
	$response->write(json_encode($res));
	return $response;
});

/**
 * Moves the uploaded file to the upload directory and assigns it a unique name
 * to avoid overwriting an existing uploaded file.
 *
 * @param string $directory directory to which the file is moved
 * @param UploadedFile $uploaded file uploaded file to move
 * @return string filename of moved file
 */
function moveUploadedFile($directory, UploadedFile $uploadedFile)
{
    $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
    $basename = bin2hex(random_bytes(8)); // see http://php.net/manual/en/function.random-bytes.php
    $filename = sprintf('%s.%0.8s', $basename, $extension);

    $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);

    return $filename;
}
