// this is some dirty code, but just noting:

// say $_POST['id'] = 2;

$requestType = $_SERVER['REQUEST_METHOD'];  // GET or POST, say POST here

$id = '$_'.$requestType."['id']"; // dirty way to compose the string-literal of a variableName

if(isset($id)) {
    $id = eval('return '.$id.';');  // $id becomes 2;
}
