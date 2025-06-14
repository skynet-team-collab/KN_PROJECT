  const video = document.getElementById('video');
  const canvas = document.getElementById('canvas');
  const capturedImage = document.getElementById('capturedImage');

  navigator.mediaDevices.getUserMedia({ video: true })
    .then(stream => {
      video.srcObject = stream;
    })
    .catch(err => {
      alert('Camera access denied or not available.');
    });

  function capturePhoto() {
    const context = canvas.getContext('2d');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    context.drawImage(video, 0, 0, canvas.width, canvas.height);
    
    const dataURL = canvas.toDataURL('image/png');
    capturedImage.src = dataURL;
    capturedImage.style.display = 'block';
  }

  document.getElementById('muleOwnerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert("Form submitted (dummy). All fields are filled correctly.");
  });