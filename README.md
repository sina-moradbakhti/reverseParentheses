# reverseParentheses
reverseParentheses PHP Method

You have a string s that consists of English letters, punctuation marks, whitespace characters, and brackets. It is guaranteed that the parentheses in s form a regular bracket sequence.

Your task is to reverse the strings contained in each pair of matching parentheses, starting from the innermost pair. The results string should not contain any parentheses.

Example

For string s = "a(bc)de", the output should be
reverseParentheses(s) = "acbde".


function reverseParentheses($s) {
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
