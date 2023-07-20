<?php


/**
 * @param array $allowed_chars must be an array with values only 'letters' | 'numbers' | 'symbols', if has other values the function will return NULL
 * @return string|NULL returns NULL if there are not enough characters to generate a password based on the characters requirements
 */
function generate_password(int $pwd_length = 8, bool $allow_repetition = true, array $allowed_chars = []): string|NULL
{
  $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $numbers = '0123456789';
  $symbols = '-_@[]`#!"$%&/()=';

  $chars = '';

  // mounts the chars strings
  if (empty($allowed_chars)) {
    $chars = $letters . $numbers . $symbols;
  } else {
    foreach ($allowed_chars as $allowed_char) {
      if ($allowed_char !== 'letters' && $allowed_char !== 'numbers' && $allowed_char !== 'symbols') continue;
      $chars .= $$allowed_char;
    }
  }

  $chars = str_split($chars);

  // if repetition is not allowed, and there are not enough characters returns false
  if (!$allow_repetition && $pwd_length > count($chars))
    return NULL;

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
