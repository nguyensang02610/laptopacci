<?php
/**
* Format Class
*/
class Format{
 public function formatDate($date){
    return date('F j, Y, g:i a', strtotime($date));
 }
 //Hàm đổi từ số INT sang tiền VND
   function currency_format($number, $suffix = 'đ') {
      if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
      }
   }

 public function textShorten($text, $limit = 400){
    $text = $text. " ";
    $text = substr($text, 0, $limit);
    $text = substr($text, 0, strrpos($text, ' '));
    $text = $text."...";
    return $text;
 }

 public function validation($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

 public function title(){
    $path = $_SERVER['SCRIPT_FILENAME'];
    $title = basename($path, '.php');
    //$title = str_replace('_', ' ', $title);
    if ($title == 'index') {
     $title = 'home';
    }elseif ($title == 'contact') {
     $title = 'contact';
    }
    return $title = ucfirst($title);
   }
 public function format_currency($n=0){
        $n=(string)$n;
        $n=strrev($n);
        $res='';
        for($i=0;$i<strlen($n);$i++){
            if($i%3==0 && $i!=0){
                $res.='.';
            
            }
            $res.=$n[$i];
        }
        $res=strrev($res);
        return $res;
    
    
    }
}
  
?>
 
