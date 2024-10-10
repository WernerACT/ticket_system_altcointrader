<?php

namespace App\Services;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class ImageBackupService
{
    /**
     * Backup image by decrypting, resizing, and storing its encrypted data in the blob field.
     */
    public function backupImage(\App\Models\Image $image): void
    {
        // Step 1: Retrieve the encrypted image content from storage
        $encryptedContent = Storage::disk('private')->get($image->path);

        // Step 2: Decrypt the image content
        $decryptedContent = Crypt::decrypt($encryptedContent);

        // Step 3: Ensure the temp_images directory exists
        $tempDir = storage_path('app/temp_images/');
        if (!file_exists($tempDir)) {
            mkdir($tempDir, 0755, true);
        }

        // Step 4: Save the decrypted content to a temporary file
        $tempPath = $tempDir . $image->id . '.jpg';  // Ensure file extension is appropriate for the image type
        file_put_contents($tempPath, $decryptedContent);

        // Step 5: Optimize and resize the image using Spatie Image Optimizer
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize($tempPath);

        // Step 6: Read the optimized content
        $optimizedContent = file_get_contents($tempPath);

        // Step 7: Encrypt the optimized image and save it as a BLOB
        $encryptedBlob = Crypt::encrypt($optimizedContent);

        // Step 8: Update the image with the BLOB data and backup info
        $image->update([
            'blob' => $encryptedBlob,
            'is_backed_up' => true,
            'backed_up_at' => Carbon::now(),
        ]);

        // Step 9: Clean up temporary file
        unlink($tempPath);
    }
}
