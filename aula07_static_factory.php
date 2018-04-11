<?php
// Ex: formatador de textos. Numeros, palavras...
final class StaticFactory
{
    public static function make($type)
    {
        if ($type == "number")
        {
            return new FormatNumber();
        } else {
            return new FormatString();
        }
    }
}

interface FormatterInterface
{
    public function format($n);
}

class FormatNumber implements FormatterInterface
{
    public function format($n)
    {
        echo "Formatando numero: ".$n;
    }
}

class FormatString implements FormatterInterface
{
    public function format($n)
    {
        echo "Formatando string: ".$n;
    }
}

$formatter = StaticFactory::make("number");
$formatter->format("testando 1, 2, 3...");
?>