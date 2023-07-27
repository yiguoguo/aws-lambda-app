<!--
 * @Date: 2023-07-27 11:59:21
 * @LastEditors: wangyi
 * @LastEditTime: 2023-07-27 12:00:50
 * @FilePath: /aws-lambda-app/README.md
-->
# 使用方法

```php
require 'vendor/autoload.php';

use Wangyi\AwsLambdaApp\Invoke;

$Invoke = new Invoke([
    'credentials' => [
        'key'    => 'your key',
        'secret' => 'your secret'
    ],
    'region' => 'ap-southeast-2',
]);
$post_data = [
    "FunctionName" => "your FunctionName",
    "Payload" => "your payload"
];
$result = $Invoke->sendMessageToLambda($post_data);
```