<?php

  ?>
  <!DOCTYPE html>
  <html lang="en">
    <body>
     <h1>this is: </h1> 
    <p id="photo"><?php
   header("Content-type: image/png;charset: base64");
   var_dump($_SERVER);
   if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $request_body = file_get_contents('php://input');
  
    print_r($request_body);
   function base64_to_jpeg($base64_string, $output_file) {
     // open the output file for writing
     $ifp = fopen( $output_file, 'wb' ); 
 
     // split the string on commas
     // $data[ 0 ] == "data:image/png;base64"
     // $data[ 1 ] == <actual base64 string>
     $data = explode( ',', $base64_string );
     // we could add validation here with ensuring count( $data ) > 1
     fwrite( $ifp, base64_decode( $data[ 1 ] ) );
 
     // clean up the file resource
     fclose( $ifp ); 
 
     return $output_file; 
 }
 base64_to_jpeg($request_body, 'test.txt');
   switch (json_last_error()) {
     case JSON_ERROR_NONE:
         echo ' - Aucune erreur';
     break;
     case JSON_ERROR_DEPTH:
         echo ' - Profondeur maximale atteinte';
     break;
     case JSON_ERROR_STATE_MISMATCH:
         echo ' - Inadéquation des modes ou underflow';
     break;
     case JSON_ERROR_CTRL_CHAR:
         echo ' - Erreur lors du contrôle des caractères';
     break;
     case JSON_ERROR_SYNTAX:
         echo ' - Erreur de syntaxe ; JSON malformé';
     break;
     case JSON_ERROR_UTF8:
         echo ' - Caractères UTF-8 malformés, probablement une erreur d\'encodage';
     break;
     default:
         echo ' - Erreur inconnue';
     break;
 }
   }
   
    //$result = json_decode($img);
?>

</p>
    </body>
  </html>