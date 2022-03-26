<?php
namespace App\Cache\Trait;

Trait CacheFileTrait {

  private function getFiles(): array
  {
    return array_diff(scandir(_CACHE_PATH),['.','..']);
  }

  private function getFile($key): ?string
  {
    $files = array_map(function($file) use ($key) {
      $fileName =  substr($file,0, strpos($file,'.'));
      if ($fileName == $key) {
        return $file;
      } else {
        return null;
      }
    },$this->getFiles());
    $files = array_filter($files);
    return array_shift($files);
  }

}
