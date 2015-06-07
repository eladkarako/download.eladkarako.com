<?php
  header('Content-Type: text/html; charset=UTF-8');

  $path = 'resources';
  $files = [];
  $handle = @opendir('./' . $path . '/');
  
  
  function human_readable_memory_sizes($size, $is_add_commas = false, $is_full_description = false, $digits = -1) {
    $unit = ['b', 'kb', 'mb', 'gb', 'tb', 'pb'];
    $unit_full = ['Bytes', 'KiloByte', 'MegaBytes', 'GigaBytes', 'TeraBytes', 'PetaBytes'];

    $out = $size / pow(1024, ($i = ((int)floor(log($size, 1024)))));

    $out = (-1 !== $digits) ? sprintf("%." . $digits . "f", $out) : $out;

    $out = $is_add_commas ? add_commas($out) : $out;

    $out .= ' ' . (!$is_full_description ? $unit[ $i ] : $unit_full[ $i ]);

    return $out;
  }
  clearstatcache(true);
  while ($file = @readdir($handle)) ("." !== $file && ".." !== $file) && array_push($files, ['file' => $file, 'size'=>human_readable_memory_sizes(@filesize('resources/' . $file),false,false,2)]     );
  @closedir($handle);
  sort($files); //uksort($files, "strnatcasecmp");

  $files = json_encode($files);
  
  unset($handle,$ext,$file,$path);
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
html,body{padding:0}
html,body,ol{margin:0; width:100%; height:100%; box-sizing: border-box; transition: all 1s ease-in;}
html{
  letter-spacing: 1px;
  font-weight: bold;
  /*text-transform: lowercase;*/
  color: rgba(100,100,0,.8);
  -webkit-text-fill-color: rgba(100,100,0,.8);
  background: rgba(255,255,255,.8) url("data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/4QCMRXhpZgAATU0AKgAAAAgABwEaAAUAAAABAAAAYgEbAAUAAAABAAAAagEoAAMAAAABAAIAAAExAAIAAAASAAAAclEQAAEAAAABAQAAAFERAAQAAAABAAAAAFESAAQAAAABAAAAAAAAAAAAAABgAAAAAQAAAGAAAAABUGFpbnQuTkVUIHYzLjUuMTEA/9sAQwAUDg8SDw0UEhESFxYUGB8zIR8cHB8/LS8lM0pBTk1JQUhGUlx2ZFJXb1hGSGaMaG96fYSFhE9jkZuPgJp2gYR//9sAQwEWFxcfGx88ISE8f1RIVH9/f39/f39/f39/f39/f39/f39/f39/f39/f39/f39/f39/f39/f39/f39/f39/f39//8AAEQgAyADIAwEiAAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMRAD8A62gdqKBQAUd6KBxigAFFGKSgBaBSelLQAUAUUCgAoFAoFAAKKPSgUAFFFFABRSfhR+FAC0UYox7UAFH+elFFABR6UUUAFFH4UUAFFFHpQAdKSlFGKACjFGKB9KAAUUnpxSigA70UCigAoxRRQAmKWkpcUAH4UUUUAAooox7UAAFGPaijFABiij8KMUAH4UUUCgA/z0opPSigBRRRRQACgUd6MUAFHpRSD6UAKKAKKBQAgoFA7cUtABRRR6UAFFHbpSUALQBRiigAooooABRR+FFABRSUtAAKPw/SiigAooooAMUUUCgAHSgUD6UUAFJS46UUAFFAFAoAT0paBRQAg+lLRRQAYoxRRQAUCgUgoABS0AUUAFFFFABR+FIBSigAxRij04oHSgAFFFFAAKPwoox0oAKKKSgBaMUUUAFFFAoABRRRigA/CjHHSij0oAKKKBQAY9qKKKACjFFFABRQKT0/woAXpQKKAPagAoxRRQAUUUUAFH4UUUAAox0oFAoAKKBQKACkpaBQAUUUAUAGKMUYooAKBRiigA/CiiigAopAOaB9KAF/Cij8KKADFFFAoAKKKB9KACij8KKACj8KO9FABiijpRQACgfSiigBKWjt0oFABRSY9qWgAoopKAFooooAKBRRQACiiigA9KKKKAD8KKKBQAD6UUUCgAFFAooAAPajFFJ/npQAtJ3pcUUAAooxQPpQACgUYpB1oAX8KKKBQAY9qBRRQAUCiigA/wA9KKKKAD0pBS0dKAAUCkHUcUtAB6UUCigAFAoooAAKKMfhRQAUCiigAoA6UenFFAAPpR6UfhRigAopKWgAoH0pKUUAFFFAFAAKO/SjFIBQAoHAoooFABRQOlFABRRSUALQKBRigAooooAKKBRQAUCj8KMUAAHtRRRQAUUYooAKB9KO3SigBPSloooABRRRQAUUYoFABQOlFGKACigCjFABRRRQAUUUg4oAUUdKKB9KACiiigAoxRj2oxQAgpRSD6UtACenFKKBQKAD8KKKMUAFAoxQKAAUUd6BQAYoo96KAAUUelH1oAO9H+elAooAKKKKAAUUYooABRigfSgfSgAooooAKKBSCgBaB9KKKAAfSjFFFABRRRQAUUUUAGKKMUUAFFFIKAF7UYoFAoAQUtFAoAB9KBQBijFABjpxSAUoooAKKKBQAUUCigAooooAKKKKAAUYoooAKBRRQAUUUUAFFFFABRiiigAxQKKKADFFFFABQPpRRQAUCiigAAooooAKKKKAP//Z") center center fixed;
}
input{
  width: 50%;
  margin: 30px 0px 20px;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 5px 5px 1px rgba(100,100,0,.4);
  border: 1px solid rgba(100,100,0,.4);
  outline: none;
  background: rgba(100,100,0,.05);

  letter-spacing: 1px;
  font-family: 'Courier New', monospace;
  font-size: 20pt;
  font-weight: bold;
}

::-webkit-input-placeholder{ -webkit-text-fill-color:rgba(0,0,0,.15); color:rgba(0,0,0,.15) }
::-moz-placeholder{          color:rgba(0,0,0,.15) }
:-moz-placeholder{           color:rgba(0,0,0,.15) }
:-ms-input-placeholder {     color:rgba(0,0,0,.15) }
::input-placeholder {        color:rgba(0,0,0,.15) }
:input-placeholder {         color:rgba(0,0,0,.15) }


ol{
  padding-right: 10px;
}
li{
  margin: 15px;
  width: calc(100% - 30px);

  background-color: rgba(173,207,248,.4);
  border-radius: 10px;
  box-shadow: 2px 2px 3px 1px rgba(0,0,0,.4);
  border-bottom: 5px solid rgba(0,0,0,0);
  transition: all .10s ease-in-out; 
}
li:hover, li:focus, li:active, li:visited{
  background-color: rgba(216,245,219,.4);
  border-bottom: 5px solid rgba(0,0,0,.15);
}
a, a:hover,a:focus{text-decoration: none}


[name]{
  font-size: 18pt;
  padding: 1px 10px 20px 0;
  width: calc(100% - 40px);
  word-wrap: break-word;
}
[size]{
  text-transform: uppercase;
  font-size: 12pt;
  color: rgba(0,0,0,.4);
  -webkit-text-fill-color: rgba(0,0,0,.4);
}

[data-ext]:before{
  content:  url("file_ext/_unknown.gif");
  width:    16px;
  height:   16px;
  padding:  10px;
}
<?php
  $path = 'file_ext';
  $handle = @opendir('./' . $path . '/');
  while ($file = @readdir($handle)){
    if("." === $file || ".." === $file) continue;
    echo '[data-ext="' . preg_replace("#\.[^\.]+$#", "", $file) . '"]:before{ content:url("' . $path . '/' . $file . '") }' . "\n";
  }
  @closedir($handle);
  unset($handle,$file,$path);
?>


[data-ext]:before{ margin: 10px; display:  inline-block }
div{               padding:10px; display:  inline-block }
a{                   width:100%; display:  inline-block }


/* ---- */
.hide{
  display:none;
}

</style>
</head>
<body>
<center><input type="text" placeholder="^.*$"/></center>
<ol>
</ol>
<script>
  var files = <?php echo $files; ?>;

  files = files.map(function(file){
    return '<li> <a data-ext="##EXT##" download="##FILE##" href="http://download.eladkarako.com/resources/##FILE##"><div><span name>##FILE##</span><span size>(##FILE_SIZE##)</span></div></a> </li>'
      .replace(/##FILE##/g,       file['file'])
      .replace(/##EXT##/g,        file['file'].split('.').slice(-1) )
      .replace(/##FILE_SIZE##/g,  file['size'])
      ;
  }).join("\n");
  
  document.querySelector('ol').innerHTML = files;
</script>
<script>
var input = document.querySelector('input');
var lis = document.querySelectorAll('li');

input.onkeyup = function(){
  var regex = new RegExp(input.value, "i");
  var is_match;
  
  Array.prototype.forEach.call(lis, function(li){
    is_match = regex.test(li.querySelector('[name]').textContent);
    if(true === is_match) 
      li.classList.remove('hide');
    else
      li.classList.add('hide');
  });
}
</script>
<script>
/* fix PHP filesize error over 2GB result with "(0.00 B)" */

function human_readable_bytes_size(bytes, decimals, sap) {
  decimals = "number" === typeof decimals ? decimals : 2;
  sap = "string" === typeof sap ? sap : "";

  var 
    size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB']
  , factor = Math.floor(  (String(bytes).length - 1) / 3  )
  ;
  
  bytes = bytes / Math.pow(1024, factor);  //calc
  bytes = Math.floor(bytes * Math.pow(10, decimals)) / Math.pow(10, decimals);  //round digits
  
   
  return String(bytes) + sap + size[factor];
}

var zerosize = Array.prototype.filter.call(document.querySelectorAll('[size]'), function(element){
  return ("(0.00 b)" === element.innerText.toLowerCase());
});

Array.prototype.forEach.call(zerosize, function(element){
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(ev){
    if(4 !== ev.target.readyState || 200 !== ev.target.status) return;
    element.innerText = "(" + human_readable_bytes_size(ev.target.getResponseHeader("Content-Length"), 2) + ")";
  };
  xhr.open("HEAD", element.parentNode.href, true);
  xhr.send();
});
</script>
</body>
</html>