<?
$number = $_POST['number'];
function get2cc($st, $accuracy = 16)
{

    preg_match("/(.*?)[\,\.](.*)/", $st, $a);

    if (empty ($a))
        return decbin($st);

    $result = decbin($a [1]) . ".";

    $f_num = ( float )("0." . $a [2]);

    for ($i = 0; $i < $accuracy; $i++) {

        preg_match("/([0-9])[\,\.]([0-9]*)/", $f_num * 2, $a);

        if (empty ($a))
            return $result . "1";

        $result .= $a [1];

        $f_num = ( float )("0." . $a [2]);

    }

    return $result;

}

print_r(get2cc($number));
echo ("  Экспоненциальная запись - " );
echo sprintf('%.10F', get2cc($number));
echo ("  Экспоненциальная запись - " );
echo sprintf('%.16E', get2cc($number));
?>
