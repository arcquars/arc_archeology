<?php
namespace App\Services;

class FileCheckerService
{
    public function getUrlContentType(string $url): ?string
    {
        $headers = @get_headers($url, 1); // El '@' suprime advertencias si la URL no es válida/accesible

        if ($headers && isset($headers['Content-Type'])) {
            $contentType = is_array($headers['Content-Type']) ? end($headers['Content-Type']) : $headers['Content-Type'];
            return strtolower(explode(';', $contentType)[0]); // Limpia posibles parámetros como "charset=utf-8"
        }

        return null;
    }

    public function isImage(string $url): bool
    {
        $contentType = $this->getUrlContentType($url);
        return $contentType && str_starts_with($contentType, 'image/');
    }

    public function isPdf(string $url): bool
    {
        $contentType = $this->getUrlContentType($url);
        return $contentType === 'application/pdf';
    }

    public function isType(string $url): string
    {
        $contentType = $this->getUrlContentType($url);
        $fileType = 'unknown';
        if($contentType && str_starts_with($contentType, 'image/')){
            $fileType = 'image';
        } else if($contentType === 'application/pdf'){
            $fileType = 'pdf';
        }
        return $fileType;
    }
}
