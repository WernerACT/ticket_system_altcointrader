@php
    use Illuminate\Support\Facades\Crypt;
    use Illuminate\Support\Facades\Storage;
@endphp

@if ($path)
    @php
        $content = Storage::disk('private')->get($path);
        $decryptedContent = Crypt::decrypt($content);
        $fileInfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $fileInfo->buffer($decryptedContent);
        $base64 = base64_encode($decryptedContent);
        $imageSrc = 'data:' . $mimeType . ';base64,' . $base64;
    @endphp

    <img src="{{ $imageSrc }}" alt="Thumbnail" class="w-12 h-12 object-cover object-center">
@endif
