// -------------------------------stringmani.php------------------------------------
// Salvatore G. Fiore copyright 2020 www.salvatorefiore.com
// The main purpose: library containing functions for string manipulation.

// trimNonPrintable()
// Eliminates all non printable characters from a string $str
function trimNonPrintable(&$str)
{
        $i = 0;
        $strtmp;
        
        $slength = strlen($str);
        
        while($i < $slength)
        {
          
             if(ord($str[$i]) > 32)
                 $strtmp .= $str[$i];
             $i++;
        }
        
        $str = $strtmp;
}

                

// trimCrLf()
// Eliminates all cr lf  from a string $str
function trimCrLf(&$str)
{
        $i = 0;
        $strtmp;
        
        $slength = strlen($str);
        
        while($i < $slength)
        {
             if(ord($str[$i]) != 10 && ord($str[$i]) != 13)
                 $strtmp .= $str[$i];
             $i++;
        }
        
        $str = $strtmp;
}


// trimSpace()
// Eliminates all spaces from a string $str
function trimSpace(&$str)
{
        $i = 0;
        $strtmp;
        
        $slength = strlen($str);
        
        while($i < $slength)
        {
             if($str[$i] !== " ")
                 $strtmp .= $str[$i];
             $i++;
        }
        
        $str = $strtmp;
}



// replaceCrLf()
// Replaces all cr lf  from a string $str with a character $chr
function replaceCrLf(&$str,$chr)
{
        $i = 0;
        $strtmp;
        
        $slength = strlen($str);
        
        while($i < $slength)
        {
        
             if(ord($str[$i]) == 10 || ord($str[$i]) == 13)
                 $strtmp .= $chr;
             else
                 $strtmp .= $str[$i];
             
             $i++;
        }
        
        $str = $strtmp;
}


// Eliminates all cr lf  spaces and non printable
//  characters from a string $str
function CleanStr(&$str)
{
        $i = 0;
        $strtmp;
        
        $slength = strlen($str);
        
        while($i < $slength)
        {
             if($str[$i] !== " " && ord($str[$i]) > 32)
                 $strtmp .= $str[$i];
             $i++;
        }
        $str = $strtmp;
}
        
                            
                            
                            
                            
// search_chrSlst()
// Searches for occurrences of a series characters in a string $str.
// Characters are contained in a string $needle
// Returns the total number of needles found in the string $str (starting at 0 or $offset)
function search_chrSlst($str,$needle,$offset = 0)
{

        $i = 0;
        $totchar = 0;
     
        
        // Looping for the whole string length
        $nlength = strlen($needle);
        $slength = strlen($str);
       
        $i= $i + $offset;
        
        while($i < $slength)
        {
             for($z = 0; $z < $nlength; $z++)
                 if($str[$i] === $needle[$z])
                      $totchar++;
                  
             $i++;
        }
        return $totchar;
}



// search_chrlst()
// Searches for first occurrence of a series of characters in a string $str.
// Characters are contained in a string $needle
// Returns the position in the string $str (starting at 0 or $offset)
// or null if no matches have been found
// The search stops at the first occurrence of characters $needle found
// in $str
function search_chrlst($str,$needle,$offset = 0)
{

        $i = 0;
        
        // Looping until a character is found
        $nlength = strlen($needle);
        $slength = strlen($str);
       
        $i= $i + $offset;
        
        while($i < $slength)
        {
             for($z = 0; $z < $nlength; $z++)
                 if($str[$i] === $needle[$z])
                      return $i;
                  
             $i++;
             
        }
 
        return null;

}


// search_chrlstrev()
// Like search_chrlst() but from right -  end of string $str - to the left.
// The count starts from 0 and continues from the end of the 
// string towards left
function search_chrlstrev($str,$needle,$offset=0)
{

    
        // Looping until a character is found
        $nlength = strlen($needle);
        $slength = strlen($str);
        
        $i = $slength-$offset-1;
        
        while($i >= 0)
        {
         
             for($z = 0; $z < $nlength; $z++)
             {
                 if($str[$i] === $needle[$z])
                    return  $slength-$i-1;
                    
             } 
             $i--;
        }
        return null;

}






// findkeyword_highvalue()
// Checks if string $str is in  list of strings comparing
// an exact match.
// The list of strings is an array with keys
// return 0 if no keywords found otherwise highest value found

// If $partial is set to true it searches for partial matches
// returning the highest value, only if exact matches have not been found.
// This works well with languages like english.
function findkeyword_highvalue($str,$arr,$partial = false) 
{

        $keyval = 0;
        
        // to lowercase
        $str =  strtolower($str);
    
        foreach(array_keys($arr) as $key) 
        {           
             
             if (strcmp($str,strtolower($key)) === 0)
             {
                    if($arr[$key] >= $keyval)
                       $keyval = $arr[$key];                            
             }     
        }
        
        if($keyval === 0 && $partial === true)
        {
            foreach(array_keys($arr) as $key) 
            {           
             
               if (stristr(strtolower($key),$str) !== false)
               {
                    if($arr[$key] >= $keyval)
                       $keyval = $arr[$key];                            
               }     
            }
         }
         return $keyval;  
}




// findFirstinArray()
// Finds first occurrence of a string in an array
// Returns the position in the array otherwise false
// if no matches have been found
function findFirstinArray($str,$arr)
{

     $i = 0;
     $arrlength = sizeof($arr);
     while($i < $arrlength)
     {
         if($arr[$i++] == $str)
              return $i-1;
              
     }
     return false;   
}

                           
                           
findFirstinArrayCase()
// Finds first occurrence of a string in an array
// Returns the position in the array otherwise false
// if no matches have been found
// It is case insensitive.
function findFirstinArrayCase($str,$arr)
{

     $i = 0;
     $arrlength = sizeof($arr);
     $strtmp = strtolower($str);
     
     
     while($i < $arrlength)
     {
         if(strtolower($arr[$i++]) == $strtmp)
              return $i-1;
              
     }
     return false;   
   
}





