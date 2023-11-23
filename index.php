<?php
// Create a stream
$opts = [
    "http" => [
        "method" => "GET",
        "header" => 'X-CMC_PRO_API_KEY : 4f10050d-6940-42fd-86ff-8bd8ed6b0306'
    ]
];

// DOCS: https://www.php.net/manual/en/function.stream-context-create.php
$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
// DOCS: https://www.php.net/manual/en/function.file-get-contents.php
$file = file_get_contents('https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?limit=20', false, $context);

// echo $file;
$data = json_decode($file, TRUE)["data"];
// print_r($data);
foreach ($data as $key => $value) {
    print_r($value['id']);
    echo "<br>";
}
?>
<?php
extract($_REQUEST);
if (isset($mod)) {
    switch ($mod) {
        case 'page':
            include_once 'controller/page.php';
            break;
        case 'admin':
            include_once 'controller/admin.php';
            break;
    }
} else {
    header('location: ?mod=page&act=home');
}
