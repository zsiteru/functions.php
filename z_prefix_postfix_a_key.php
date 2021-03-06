<?php
 /** z_prefix_postfix_a_key
 *
 * @param $array  - массив к ключам которого будут добавлены prefix & postfix
 * @param $prefix  - префикс
 * @param $postfix  - постфикс
 *  
 * @return $array
 * 
 */
 
 
 
 function z_prefix_postfix_a_key($array,$prefix = '',$postfix = ''){
      
       if(!is_array($array)){
           trigger_error ('$array parameter passed is not an array.', E_USER_ERROR);
            return false;
       }
       $array = array_combine(array_map(create_function('$k', 'return "'.$prefix.'".$k."'.$postfix.'";'),array_keys($array)), $array);
       
       return $array;

    }
?>
