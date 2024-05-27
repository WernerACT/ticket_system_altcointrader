@php use Illuminate\Support\Facades\Crypt;use Illuminate\Support\Facades\Storage; @endphp
    <!-- resources/views/components/thumbnail.blade.php -->


    @php
        $encryptedContent = Storage::disk('private')->get($getRecord()->path);
        $decryptedContent = Crypt::decrypt($encryptedContent);
        $fileInfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $fileInfo->buffer($decryptedContent);
        $base64 = base64_encode($decryptedContent);
        $imageSrc = 'data:' . $mimeType . ';base64,' . $base64;
    @endphp
    <img src="{{ $imageSrc }}" alt="image" class="w-full object-cover object-center">

