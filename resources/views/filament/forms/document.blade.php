@php
    use Illuminate\Support\Facades\Crypt;
    use Illuminate\Support\Facades\Storage;

    $encryptedContent = Storage::disk('private')->get($getRecord()->path);
    $decryptedContent = Crypt::decrypt($encryptedContent);
    $base64 = base64_encode($decryptedContent);
    $pdfSrc = 'data:application/pdf;base64,' . $base64;
@endphp

<div class="pdf-container">
    <iframe src="{{ $pdfSrc }}" width="100%" height="800px">
        This browser does not support PDFs. Please download the PDF to view it: <a href="{{ $pdfSrc }}">Download PDF</a>.
    </iframe>
</div>

<style>
    .pdf-container {
        width: 100%;
        height: 100%;
    }
</style>
