<?php

function inverse($x) {
  if (!$x) {
    throw new Exception('Division by zero.');
  }
  return 1/$x;
}

try {
  echo inverse(0) . ' ';
} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), ' ';
}


try {
  echo inverse(5) . ' ';
} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), ' ';
} finally {
  echo 'First finally ';
}

try {
  echo inverse(0) . ' ';
} catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), ' ';
} finally {
  echo "Second finally ";
}
