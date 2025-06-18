document.addEventListener("DOMContentLoaded", () => {
    const video = document.getElementById('webcam');
    const canvas = document.getElementById('canvas');
    const photoInput = document.getElementById('webcam_photo');
    const captureBtn = document.getElementById('capture-btn');
    const previewImg = document.getElementById('preview');

    // Start webcam
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({ video: true })
            .then((stream) => {
                video.srcObject = stream;
                video.play();
            })
            .catch((err) => {
                console.warn("Camera access denied or not supported.");
            });
    }

    // Capture image on button click
    captureBtn.addEventListener('click', () => {
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        canvas.getContext('2d').drawImage(video, 0, 0);
        const imageData = canvas.toDataURL('image/png');
        photoInput.value = imageData;
        previewImg.src = imageData;
        previewImg.style.display = "block";
    });
});