<?php

$file = 'extras/users.txt';


if (file_exists($file)) {
  echo 'File exists <br>';
  $handle = fopen($file, 'r');
  $contents = fread($handle, filesize($file));
  fclose($handle);
  echo $contents;
} else {
  echo 'File does not exist <br>';
  $handle = fopen($file, 'w');
  $contents = 'Brad' .  PHP_EOL . 'Sara' .  PHP_EOL . 'Mike' .  PHP_EOL . 'John';
  fwrite($handle, $contents);
  fclose($handle);
  echo $contents;
}

/*
r	- Open a file for read only. File pointer starts at the beginning of the file
w	- Open a file for write only. Erases the contents of the file or creates a new file if it doesn't exist. File pointer starts at the beginning of the file
a	- Open a file for write only. The existing data in file is preserved. File pointer starts at the end of the file. Creates a new file if the file doesn't exist
x	- Creates a new file for write only. Returns FALSE and an error if file already exists
r+ -	Open a file for read/write. File pointer starts at the beginning of the file
w+ -	Open a file for read/write. Erases the contents of the file or creates a new file if it doesn't exist. File pointer starts at the beginning of the file
a+ -	Open a file for read/write. The existing data in file is preserved. File pointer starts at the end of the file. Creates a new file if the file doesn't exist
x+	- Creates a new file for read/write. Returns FALSE and an error if file already exists
*/