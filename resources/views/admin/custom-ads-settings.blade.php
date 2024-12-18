@extends('layouts.dashboard')

@section('title', 'Custom Ads Settings')

@section('content')
<div class="container-fluid px-3">
    <div class="row g-3">
        <div class="col-12 px-0">
            <div class="card border-0 rounded-4" style="background: var(--card-bg-dark); backdrop-filter: blur(var(--content-blur));">
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show border-0" role="alert">
                            <i class="fa-solid fa-circle-check me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @error('error')
                        <div class="alert alert-danger alert-dismissible fade show border-0" role="alert">
                            <i class="fa-solid fa-circle-exclamation me-2"></i>
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h4 class="text-white mb-1">Custom Ads Settings</h4>
                            <p class="text-white-50 mb-0">Configure advertisement images and links</p>
                        </div>
                        <button onclick="document.getElementById('custom-ads-form').submit()" class="btn btn-primary rounded-3 px-4 d-flex align-items-center" style="background-color: var(--primary-color); border: none;">
                            <i class="fa-solid fa-floppy-disk me-2"></i>
                            <span>Save Settings</span>
                        </button>
                    </div>

                    @php
                        $user_admin_id = isset(Auth::guard('user-admin')->user()->id) ? Auth::guard('user-admin')->user()->id : session('user_admin_id');
                        $adsSettings = \App\Models\CustomAdsSettings::where('user_admin_id', $user_admin_id)->first();
                        $settings = $adsSettings ? json_decode($adsSettings->ads_settings, true) : [];
                    @endphp

                    <form id="custom-ads-form" action="{{ route('admin.custom-ads-settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-4">
                            @for($i = 1; $i <= 3; $i++)
                            <div class="col-md-4">
                                <div class="p-4 rounded-3" style="background: var(--card-bg-light); border: 1px solid var(--card-border);">
                                    <h5 class="text-white mb-4">Advertisement {{ $i }}</h5>
                                    
                                    <div class="mb-3">
                                        <label class="form-label text-white">Ad Image</label>
                                        <div class="preview-zone mb-3" style="display: {{ isset($settings['ad'.$i]['image']) ? 'block' : 'none' }};">
                                            <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="background: rgba(255,255,255,0.05);">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ isset($settings['ad'.$i]['image']) ? asset($settings['ad'.$i]['image']) : '' }}" class="preview-image img-fluid rounded me-3" style="max-height: 60px;">
                                                    <p class="file-name text-white-50 mb-0">{{ isset($settings['ad'.$i]['image']) ? basename($settings['ad'.$i]['image']) : '' }}</p>
                                                </div>
                                                <button type="button" class="btn btn-danger btn-sm remove-preview">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="dropzone-wrapper position-relative" style="border: 2px dashed var(--input-border); border-radius: 5px; padding: 20px; text-align: center;">
                                            <div class="dropzone-desc text-white-50">
                                                <i class="fa fa-cloud-upload"></i>
                                                <p class="mb-0">Drop your image here or click to upload</p>
                                            </div>
                                            <input type="file" name="ad{{ $i }}_image" class="dropzone position-absolute top-0 start-0 w-100 h-100 opacity-0" accept=".jpg,.jpeg,.png,.gif,.bmp,.webp,.svg,.tiff">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label text-white">Ad Link</label>
                                        <input type="url" name="ad{{ $i }}_link" class="form-control" placeholder="https://example.com"
                                               value="{{ $settings['ad'.$i]['link'] ?? '' }}"
                                               style="background: var(--input-bg); border: 1px solid var(--input-border); color: var(--input-text);">
                                    </div>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="ad{{ $i }}_display" id="ad{{ $i }}Display"
                                               {{ isset($settings['ad'.$i]['display']) && $settings['ad'.$i]['display'] ? 'checked' : '' }}>
                                        <label class="form-check-label text-white-50" for="ad{{ $i }}Display">Display Advertisement</label>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.dropzone-wrapper').forEach(wrapper => {
    const dropzone = wrapper.querySelector('.dropzone');
    const previewZone = wrapper.parentElement.querySelector('.preview-zone');
    const previewImage = wrapper.parentElement.querySelector('.preview-image');
    const fileName = wrapper.parentElement.querySelector('.file-name');
    const removeButton = wrapper.parentElement.querySelector('.remove-preview');

    // Set current image if exists
    // const currentImage = dropzone.dataset.currentImage;
    // if (currentImage) {
    //     fetch(currentImage)
    //         .then(response => response.blob())
    //         .then(blob => {
    //             const file = new File([blob], fileName.textContent, { type: blob.type });
    //             const dataTransfer = new DataTransfer();
    //             dataTransfer.items.add(file);
    //             dropzone.files = dataTransfer.files;
    //             handleFile(file);
    //         });
    // }

    // Prevent default drag behaviors
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        wrapper.addEventListener(eventName, preventDefaults, false);
        document.body.addEventListener(eventName, preventDefaults, false);
    });

    // Highlight drop zone when item is dragged over it
    ['dragenter', 'dragover'].forEach(eventName => {
        wrapper.addEventListener(eventName, () => {
            wrapper.classList.add('dragover');
            wrapper.style.backgroundColor = 'rgba(255,255,255,0.1)';
        }, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        wrapper.addEventListener(eventName, () => {
            wrapper.classList.remove('dragover');
            wrapper.style.backgroundColor = 'transparent';
        }, false);
    });

    // Handle dropped files
    wrapper.addEventListener('drop', e => {
        const droppedFiles = e.dataTransfer.files;
        if(droppedFiles.length) {
            handleFile(droppedFiles[0]);
        }
    }, false);

    dropzone.addEventListener('change', e => {
        const file = e.target.files[0];
        handleFile(file);
    });

    removeButton.addEventListener('click', () => {
        dropzone.value = '';
        previewImage.src = '';
        fileName.textContent = '';
        previewZone.style.display = 'none';
    });

    function preventDefaults (e) {
        e.preventDefault();
        e.stopPropagation();
    }

    function handleFile(file) {
        if (!file || !file.type.startsWith('image/')) return;

        const reader = new FileReader();
        reader.onload = e => {
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            dropzone.files = dataTransfer.files;
            previewImage.src = e.target.result;
            fileName.textContent = file.name;
            previewZone.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection
