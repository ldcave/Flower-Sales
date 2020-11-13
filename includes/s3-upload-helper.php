<?php

require '../vendor/autoload.php';

use Aws\S3\S3Client;

use Aws\Exception\AwsException;
    
//check if submit has been hit
if(isset($_POST['s3-submit'])){
    $bucketName = "printsite-s3";

    $file = $_FILES['s3-image'];
    $file_name = $file['name'];   
    $file_tmp_name = $file['tmp_name'];   
    $file_error = $file['error'];     //this is defined in login helper? name is predefined
    $file_size = $file['size'];

    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    /* create client */
    try {
        
        $s3Client = S3Client::factory(
            array('region'=>'us-east-1',
            'version'=>'latest',
            'credentials'=>array(
                'key'=>"",      /** identifying this specific site */
                'secret'=>""
            ))
        );
        $result = $s3Client->putObject([
            'Bucket'=>$bucketName,
            'Key' => 'test_uploads/'.uniqid('',true).'.'.$ext,
            'SourceFile'=>$file_tmp_name,
            'ACL'=>'public-read'
        ]);

        echo 'Success! Photo URL: '.$result->get('ObjectURL');

    } catch (Aws\S3\Exception\S3Exception $e) {
        die('Error uploading file: ' .$e->getMessage());
    }
}

