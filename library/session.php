<?php
/**
*Session Class
**/
// init khởi tạo file session
class Session{
      public static function init(){
      if (version_compare(phpversion(), '8.0.10', '<')) {
            if (session_id() == '') {
                  session_start();
            }
         } else {
            if (session_status() == PHP_SESSION_NONE) {
                  session_start();
            }
         }
      }

      public static function set($key, $val){
         $_SESSION[$key] = $val;
      }
      //set key thành giá trị
      public static function get($key){
         if (isset($_SESSION[$key])) {
         return $_SESSION[$key];
         } else {
         return false;
         }
      }
      
      public static function checkSession(){
         self::init();
         if (self::get("adminlogin")== false) {
         self::destroy();
         header("Location:wp_login.php");
         }
      }
      //check phiên làm việc có tồn tại hay không
      public static function checkLogin(){
         self::init();
         if (self::get("adminlogin")== true) {
         header("Location:index.php");
         }
      }
      // xóa or hủy phiên làm việc
         public static function destroy(){
         session_destroy();
         header("Location:wp_login.php");
         }
}
?>
