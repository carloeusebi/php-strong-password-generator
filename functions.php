<?php

function generate_password(int $pwd_length = 8, bool $allow_repetition = true): string
{
  $RANDOM_CHARS = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_@[]`#!"$%&/()=';

  $chars = str_split($RANDOM_CHARS);

  $password = [];

  do {
    $char_index = rand(0, count($chars) - 1);

    if (!$allow_repetition) {
      while (in_array($chars[$char_index], $password)) {
        $char_index = rand(0, count($chars) - 1);
      }
    }

    $password[] = $chars[$char_index];
  } while (count($password) < $pwd_length);

  return implode($password);
}
