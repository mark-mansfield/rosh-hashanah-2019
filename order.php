<?php ob_start();

// debug
function var_dump_pre($mixed = null)
{
    echo '<pre style="color:red">';
    var_dump($mixed);
    echo '</pre>';
    return null;
}

// so we can access order Details and selected items from one place.
function buildCustomerOrder()
{
    $order = [];
    foreach ($_POST as $key => $value) {
        if ($key == 'timeStamp' || $key == 'shortNames') {

        } else {
            if ($value != '0') {
                $order += [$key => $value];
            }
        }
    }
    return $order;
}

// helper function
function getOrderNumber($emailField)
{
    $menuName = 'ROSH-HASHANAH-19';
    $rand = strtoupper(substr(sha1($emailField), 0, 4));
    $orderNumber = $menuName . $rand;
    return $orderNumber;
}

// name, email, mobile, order number....
function getOrderDetails($order)
{

    $orderDetails = [];
    $orderDetails += ['menuTitle' => 'Lox Stock and Barrel Catering'];
    $orderDetails += ['menuName' => getMenuName()];
    $orderDetails += ['orderNumber' => strtoupper(substr(sha1($_POST['timeStamp']), 0, 4))];
    $orderDetails += ['contactName' => $order['contactName']];
    $orderDetails += ['contactNumber' => $order['contactNumber']];
    $orderDetails += ['pickUpDay' => $order['pickUpDay']];
    $orderDetails += ['pickUpTime' => $order['pickUpTime']];
    $orderDetails += ['emailField' => $order['email']];
    $orderDetails += ['notes' => $order['notes']];

    return $orderDetails;
}

// helper function
function getSelectedDishes($order)
{
    $dishes = array_slice($order, 0, count($order) - 6);
    return $dishes;
}

// helper function
function getAllDishes()
{

    $dishes = [];
    foreach ($_POST as $key => $value) {

        if ($key == 'timeStamp' || $key == 'shortNames') {

        } else {

            $dishes += [$key => $value];
        }

    }

    return array_slice($dishes, 0, count($dishes) - 6);

}

// return array of short names
function getShortNames()
{
    return explode(",", $_POST['shortNames']);
}

// helper function
function buildColumnHeaders($orderNumber)
{

    $postKeys = array_keys($_POST);
    $allDishes = getAllDishes();
    $shortNames = getShortNames();

    $columnHeaders = [];
    array_push($columnHeaders, 'Order #');

    // so we can customise the order text inputs into the csv
    array_push($columnHeaders, $postKeys[array_search('contactName', $postKeys)]);
    array_push($columnHeaders, $postKeys[array_search('pickUpDay', $postKeys)]);
    array_push($columnHeaders, $postKeys[array_search('pickUpTime', $postKeys)]);

    //  only add all dishes on the menu in sequence
    foreach ($shortNames as $value) {
        array_push($columnHeaders, $value);
    }

    // so we can customise the order of text inputs into the csv
    // array_push($columnHeaders, '$');
    array_push($columnHeaders, $postKeys[array_search('contactNumber', $postKeys)]);
    array_push($columnHeaders, $postKeys[array_search('notes', $postKeys)]);

    return $columnHeaders;
}

// helper function
function buildColumnData($orderNumber)
{

    $allDishes = getAllDishes();

    $columnData = [];
    $dishQuantities = [];
    array_push($columnData, $orderNumber);

    // so we can customise the order into the csv
    array_push($columnData, $_POST['contactName']);
    array_push($columnData, $_POST['pickUpDay']);
    array_push($columnData, $_POST['pickUpTime']);

    //  only add all dishes on the menu in sequence
    foreach ($allDishes as $key => $value) {
        array_push($columnData, $value);
    }

    // so we can customise the order into the csv
    // array_push($columnData, ''); /* COST FIELD */
    array_push($columnData, $_POST['contactNumber']);
    array_push($columnData, $_POST['notes']);
    return $columnData;
}

function getMenuName()
{
    return 'Rosh Hashanah Menu';
}

function getAdminEmail()
{
    return 'loxstockandbarrelcatering@gmail.com';
    // return 'catering@loxstockandbarrel.com.au';
    // return 'markgmansfield@gmail.com';
}

// the csv file
function buildCsv($orderDetails)
{

    $orderNumber = $orderDetails['orderNumber'];

    // a way to catch file creation errors on the server
    // probably more edge cases to test for

    $orderDir = 'orders/';
    $file = @fopen($orderDir . getCSVFile($orderDetails) . '.csv', 'w');

    if (!$file) {
        return false;
    }

    $columnHeaders = buildColumnHeaders($orderNumber);
    $columnData = buildColumnData($orderNumber);
    // var_dump_pre($columnHeaders);
    // var_dump_pre($columnData);

    // for the admin email
    $URLPart = "http://loxstockandbarrel.com.au/";
    $fileURL = $URLPart . 'orders/' . $orderNumber . '.csv';

    // save the column headers
    fputcsv($file, $columnHeaders);
    fputcsv($file, $columnData);

    // Close the file
    fclose($file);

    return true;
}

function getCSVFile($orderDetails)
{

    return "ROSH-ORDER-" . $orderDetails['orderNumber'];
}

if ($_POST) {

    $fileAttahcment = 'NULL';
    $order = buildCustomerOrder();
    $allDishes = getAllDishes();
    $selectedDishes = getSelectedDishes($order);
    $orderDetails = getOrderDetails($order);
    $csvFile = buildCsv($orderDetails);

    // only a basic error case tested
    // more edge case tests are needed probably
    if (!$csvFile) {
        var_dump_pre('500 Internal Server Error');
        echo json_encode(0);
        die;
    }
    // returns 0 for error , 1 for success
    $emailsSent = sendHtmlEmails($order, $selectedDishes);
    if ($emailsSent !== 1) {
        $returnVal = json_encode($emailsSent);
        echo $returnVal;
        die;
    }
    $returnVal = json_encode($emailsSent);
    echo $returnVal;
    die;
}
