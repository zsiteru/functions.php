<? /** z_add_url_get
*
* Фукнция добавляет/изменяет параметры GET в URL
* 
* @param $a_data - массив с данными которые должны быть добавлены к строке
* @param $url - адрес страницы, если false то берется текущтй url
* 
*
**/
function z_add_url_get($a_data,$url = false){
         $http =isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !='off' ? 'https':'http';
        if($url === false){
               $url = $http.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        }
    $query_str = parse_url($url);
    $path = !empty($query_str['path']) ? $query_str['path'] : '';
    $fragment = !empty($query_str['fragment']) ? '#'.$query_str['fragment'] : '';
    $return_url = $query_str['scheme'].'://'.$query_str['host'].$path;
    $query_str = !empty($query_str['query']) ? $query_str['query'] : false;
    $a_query = array();
    if($query_str) {
        parse_str($query_str,$a_query);
    }
    $a_query = array_merge($a_query,$a_data);
    $s_query = http_build_query($a_query);
    if($s_query){
    $s_query = '?'.$s_query;    
    }
    return $return_url.$s_query.$fragment;
    }

       $url = 'http://z-site.ru/?my_param=hello&my_param_2=bye';
       echo  z_add_url_get(array('my_param_2'=>'goodbye','new_param'=>'this is new param'),$url);
       echo ('<br>');
       $url = 'http://z-site.ru/';
       echo  z_add_url_get(array('my_param_2'=>'goodbye','new_param'=>'this is new param'),$url);
?>
