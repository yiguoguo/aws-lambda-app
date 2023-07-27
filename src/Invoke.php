<?php
/*
 * @Date: 2023-07-27 10:09:24
 * @LastEditors: wangyi
 * @LastEditTime: 2023-07-27 11:26:27
 * @FilePath: /aws-lambda-app/src/Invoke.php
 */
namespace Wangyi\AwsLambdaApp;

use Aws\Lambda\LambdaClient;
use Aws\Exception\AwsException;

class Invoke 
{
    public $lambdaClient;

    public function __construct($config)
    {
        $this->lambdaClient = new LambdaClient([
            'version' => 'latest',
            'region' => $config['region'], // Replace with your Lambda function's region
            'credentials' => $config['credentials']
        ]);
    }

    public function sendMessageToLambda($data)
    {
        try {
            $result =  $this->lambdaClient->invoke([
                'FunctionName' => $data['FunctionName'],
                'Payload' => json_encode($data['Payload']) // Replace with your input data
            ]);
        
            $responsePayload = $result['Payload']->getContents();
            // Process the response from the Lambda function as needed
            // The responsePayload will contain the output of your Lambda function
            echo $responsePayload;
        } catch (AwsException $e) {
            // Handle any errors that may occur during invocation
            echo 'Error invoking Lambda function: ' . $e->getMessage();
        }
    }
}