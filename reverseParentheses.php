<?php
function reverseParentheses($s)
{
    $reversed = [];
    $startIndexes = [];
    $endIndexes = [];
    $lastStatTmp = [];
    for($i=0;$i<strlen($s);$i++)
    {
        if($s[$i] == '(')
        {
            $lastStatTmp[] = $i;
            $startIndexes[] = $i;
        }
        if($s[$i] == ')')
        {
            $lastStart = end($lastStatTmp);
            $endIndexes[$lastStart] = $i;
            $index=array_search($lastStart,$lastStatTmp);
            unset($lastStatTmp[$index]);
        }
    }

    for($i=count($startIndexes)-1;$i>=0;$i--)
    {
        $start = $startIndexes[$i];
        $end = $endIndexes[$start];

        $text = substr($s,$start,($end-$start)).')';

        foreach($reversed as $item)
        {
            $index = array_search($item,$reversed);
            if (strpos($text, $index) !== false)
            {
                if(isset($reversed[$index]))
                {
                    $text = str_replace($index,$reversed[$index],$text);
                }
            }
        }
        $reversed[$text]= strrev(str_replace(['(',')'],'',$text));
    }
    
    $text2 = $s;
    if(count($reversed) > 0)
    {
        foreach ($reversed as $item)
        {
            $index = array_search($item,$reversed);
            $text2 = str_replace($index,$item,$text2);
        }
    }
    else
    {
        $text2 = $s;
    }
    return $text2;
}

echo reverseParentheses('Si(na)-Par(c(we)b)');
?>
