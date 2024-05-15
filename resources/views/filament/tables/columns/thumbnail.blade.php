@php use Illuminate\Support\Facades\Crypt;use Illuminate\Support\Facades\Storage; @endphp
    <!-- resources/views/components/thumbnail.blade.php -->

@if ($record)
    @php
        $encryptedContent = Storage::disk('private')->get($getRecord()->path);
        $decryptedContent = Crypt::decrypt($encryptedContent);
        $fileInfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $fileInfo->buffer($decryptedContent);
        $base64 = base64_encode($decryptedContent);
        $imageSrc = 'data:' . $mimeType . ';base64,' . $base64;
    @endphp
    <img src="{{ $imageSrc }}" alt="Thumbnail" class="w-12 h-12 object-cover object-center">
@endif
