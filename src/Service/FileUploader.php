<?php


// src/Service/FileUploader.php
namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class FileUploader
{
    private $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    public function upload(UploadedFile $file): string
    {
        if ($file instanceof UploadFile) {
            $originalFilename =  pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        } else {
            $originalFilename = $file->getFilename();
        }
        $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
        $newFileName = $safeFilename . '-' . uniqid() . '.' . $file->guessExtension();

        try {
            $file->move($this->getTargetDirectory(), $newFileName);
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }

        return $newFileName;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}
