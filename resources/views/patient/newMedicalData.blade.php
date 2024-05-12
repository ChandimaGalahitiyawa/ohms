@extends('patient.layouts.app')
@section('content')

<div class="w-full p-6 mx-auto">

    <form class="relative" enctype="multipart/form-data" onsubmit="handleFormSubmission()" id="main-form"  action="{{ route('storeMedicalData') }}" method="post">
        @csrf
        
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 shrink-0 lg:flex-0 lg:w-6/12">
                <h4 class="dark:text-white mx-3">Add New Medical Data</h4>
            </div>
        </div>

        @if($errors->any())
            <div class="bg-red-300 text-white rounded-3 p-6 my-5">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex flex-wrap mt-6 -mx-3">
            <div class="w-full max-w-full px-3 mt-6 shrink-0 lg:flex-0 lg:w-8/12 lg:mt-0">
                <div class="relative flex flex-col min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:shadow-soft-dark-xl shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-6">
                    <h5 class="font-bold dark:text-white">Information</h5>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 flex-0">
                            <label class="mt-6 mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="title">Document Title</label>
                            <input type="text" name="title" placeholder="title" class="{{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}  focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-black focus:outline-none" value="{{ old('UserName') }}"/>
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap mt-4 -mx-3">
                        <div class="w-full max-w-full px-3 flex-0">
                        <label class="mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80" for="description">Description</label>
                        <textarea name="description" id="description" placeholder="Explain Category" class="focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" rows="4" required></textarea>
                        </div> 
                    </div>
                
                    <button type="submit" id="submit-fr" href="javascript:;" class="inline-block float-right px-8 py-2 mt-16 mb-0 font-bold text-right text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs dark:bg-gradient-to-tl dark:from-slate-850 dark:to-gray-850 bg-gradient-to-tl from-gray-900 to-slate-800 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25">Submit</button>
                
                </div>
                </div>
            </div> 

            <div class="w-full max-w-full px-3 shrink-0 lg:flex-0 lg:w-4/12">
                <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 dark:bg-gray-950 dark:bg-opacity-20 dark:backdrop-blur-xl dark:shadow-soft-dark-xl rounded-2xl bg-clip-border">
                  <div class="flex-auto p-6">
                    <h5 class="font-bold dark:text-white">Upload Medical Documents</h5>
                    <div class="flex flex-wrap justify-center items-center -mx-3">
                        <div class=" w-full">
                            <div class="flex justify-center">
                                <video id="webcamPreview" class=" h-100 w-full" width="100%" height="100%" style="display: none;  object-fit: cover;" autoplay muted></video>
                            </div>
                            <button id="captureBtn" type="button" class="ml-4 mt-4 px-8 py-8 font-bold text-white bg-red-500 rounded-full border-1 border-white cursor-pointer" style="display: none;"></button>
                        </div>
                            <div id="img-placeholder" class="w-full max-w-full !flex justify-center" style="display: none;">
                            <img id="previewImage" class=" w-full mt-4 h-100 object-cover"  src="{{ asset('assets/img/user.jpg') }}" alt="">
                        </div>
                        <div class="w-3/12  mt-4">
                            <button id="openWebcamBtn" type="button" class="font-bold text-white bg-gray-500 py-2 px-5 rounded-full whitespace-nowrap cursor-pointer"><i class="fas text-white mr-2 fa-camera"></i>Open Camera</button>
                        </div>

                        <div class="w-full flex items-end  max-w-full ">
                            <div class=" mr-2 max-w-full">
                                <label class="mt-6 mb-2 font-bold text-xs text-slate-700 dark:text-white/80" for="notes">Or Upload Documents</label>
                                <div dropzone class="dropzone !min-h-fit focus:shadow-soft-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-border px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" id="dropzone">
                                    <input type="file" name="stu-img" multiple onchange="previewFile()" />
                                    <input type="file" name="webcam_capture_file" id="webcamCaptureFile" multiple style="display: none;">
                                </div>
                            </div>
                          
                    </div>              
                  </div>
                </div>
            </div>

        
            </div>

        
    </form>

  </div>
    
@endsection

@push('scripts')


<script>
    const startDatePicker = flatpickr("#startDatePicker", {
      dateFormat: "Y-m-d", // Set your desired date format
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Function to preview the selected file or webcam capture

        const fileInput = document.querySelector('input[name="stu-img"]');
        fileInput.addEventListener('change', previewFile);

        function previewFile() {
            const placeholder = document.getElementById('img-placeholder');
            const webcamPreview = document.getElementById('webcamPreview');
            const previewImage = document.getElementById('previewImage');

            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                previewImage.src = URL.createObjectURL(file);
                placeholder.style.display = 'block'; // Show the image placeholder
            } else if (webcamPreview.srcObject) {
                placeholder.style.display = 'block';
            } else {
                previewImage.src = "{{ asset('assets/img/upload-default.png') }}";
                placeholder.style.display = 'none'; // Hide the image placeholder
            }
        }

        // Capture and submit the webcam image
        const openWebcamBtn = document.getElementById('openWebcamBtn');
        const webcamPreview = document.getElementById('webcamPreview');
        const captureBtn = document.getElementById('captureBtn');
        const webcamCaptureFileInput = document.getElementById('webcamCaptureFile');
        const previewImage = document.getElementById('previewImage');
        let webcamStream;

        openWebcamBtn.addEventListener('click', async () => {
            try {
                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    webcamStream = await navigator.mediaDevices.getUserMedia({ video: true });
                    webcamPreview.srcObject = webcamStream;
                    webcamPreview.play();
                    captureBtn.style.display = 'block';
                    webcamPreview.style.display = 'block';
                } else {
                    console.error('getUserMedia is not supported in this browser');
                }
            } catch (error) {
                console.error('Error accessing webcam:', error);
            }
        });

        captureBtn.addEventListener('click', () => {
            if (webcamStream) {
                const canvas = document.createElement('canvas');
                canvas.width = webcamPreview.videoWidth;
                canvas.height = webcamPreview.videoHeight;
                const ctx = canvas.getContext('2d');
                ctx.drawImage(webcamPreview, 0, 0, canvas.width, canvas.height);

                canvas.toBlob((blob) => {
                    const file = new File([blob], 'webcam_capture.png', { type: 'image/png' });

                    // Update the previewImage after setting the files
                    previewImage.src = URL.createObjectURL(file);

                    // Stop webcam stream after capturing
                    webcamStream.getTracks().forEach(track => track.stop());
                    webcamStream = null;

                    // Manually create a File object and assign it to the hidden webcamCaptureFileInput
                    const webcamCaptureFileInput = document.getElementById('webcamCaptureFile');
                    const webcamCaptureFile = new File([blob], 'webcam_capture.png', { type: 'image/png' });

                    // Here, manually assign the File object to the input files
                    webcamCaptureFileInput.files = createFileList([webcamCaptureFile]);

                    // Hide the webcam preview element
                    webcamPreview.style.display = 'none';
                    captureBtn.style.display = 'none';
                    previewImage.style.display = 'block';
                }, 'image/png');
            }
        });

        function createFileList(items) {
            const dataTransfer = new DataTransfer();
            items.forEach(item => {
                dataTransfer.items.add(item);
            });
            return dataTransfer.files;
        }

        // Function to handle form submission
        function handleFormSubmission() {
            // You can add any additional form validation here if needed

            // Disable the submit button to prevent double submission
            const submitButton = document.getElementById('submit-fr');
            submitButton.disabled = true;

            // Show a loading indicator inside the submit button
            submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';

            // Manually append the webcamCaptureFile to the form data
            const form = document.querySelector('#main-form');
            const webcamCaptureFileInput = document.getElementById('webcamCaptureFile');
            const webcamCaptureFile = webcamCaptureFileInput.files[0];

            if (webcamCaptureFile) {
                const formData = new FormData(form);
                formData.append('webcam_capture_file', webcamCaptureFile);

                // Submit the form with the updated formData
                fetch(form.action, {
                    method: form.method,
                    body: formData,
                })
                    .then(response => {
                        if (response.redirected) {
                            // If the response is a redirect, redirect the user to the provided URL
                            window.location.href = response.url;
                        } else {
                            return response.json();
                        }
                    })
                    .then(data => {
                        // Handle the response as needed
                        console.log(data);

                        // Show SweetAlert on success
                        Swal.fire({
                            icon: 'success',
                            title: 'Student added successfully!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
                    .catch(error => {
                        console.error('Error submitting form:', error);
                    })
                    .finally(() => {
                        // Enable the submit button and restore its original content
                        submitButton.disabled = false;
                        submitButton.innerHTML = 'Submit';
                    });
            } else {
                // If no webcam capture file, submit the form as usual
                form.submit();
            }
        }

        // Add an event listener to the "Create Student" button
        const submitButton = document.getElementById('submit-fr');
        submitButton.addEventListener('click', function (event) {
            // Prevent the default form submission
            event.preventDefault();

            // Call the function to handle form submission
            handleFormSubmission();
        });
    });
</script>
    
@endpush